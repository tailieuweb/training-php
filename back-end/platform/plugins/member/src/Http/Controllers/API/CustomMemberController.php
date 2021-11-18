<?php

namespace Botble\Member\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Botble\Base\Http\Responses\CustomResult;
use Botble\Member\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class CustomMemberController extends Controller
{
    private $result;
    // Construct
    function __construct()
    {
        $this->result = CustomResult::getInstance();
    }

    /** LOGIN */
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                'email'       => 'required|max:60|min:6|email',
                'password'    => 'required|max:60|min:6',
            ]);
            if ($validator->fails()) {
                return response($this->result->setError('Some field is not true !!'));
            }
            $validated = ['email' => $request->email, 'password' => $request->password];
            if (auth('member')->attempt($validated)) {
                if (!auth('member')->user()->confirmed_at) {
                    return response($this->result->setError('This account hasn\'t active'));
                }
                $memberLocation = "member_" . auth('member')->user()->id;
                // Create Token
                $token = auth('member')->user()->createToken($memberLocation)->accessToken;

                return response($this->result->setData($token));
            }
            return response($this->result->setError('Wrong at email or password'));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /** LOGOUT */
    function logout(Request $request)
    {
        $member_id = $request->user()->id;
        // Clear all token
        DB::table('oauth_access_tokens')
            ->where('user_id', $member_id)
            ->update(['revoked' => 1]);
        return response($this->result->setData('Logout successful'));
    }


    /** MEMBER REGISTER */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                'first_name'       => 'required|min:2|max:60',
                'last_name'        => 'required|min:4|max:60',
                'description'      => 'nullable|max:60',
                'gender'           => 'required|integer|in:1,2',
                'email'            => 'required|email|min:6',
                'password'         => 'required|min:6|max:60',
                'confirm_password' => 'required|min:6|max:60',
                'dob'              => 'nullable|date',
                'phone'            => 'required|min:10|numeric',
            ]);
            if ($validator->fails()) {
                return response($this->result->setError('Some field is not true !!'));
            }
            // Check Password
            if ($request->password != $request->confirm_password) {
                return response($this->result->setError('Password and confirm password is not same'));
            }
            // Check Email Exist
            $checkEmail = Member::where('email', $request->email)->first();
            if ($checkEmail) {
                return response($this->result->setError('This email has been used !!'));
            }
            // Insert Data
            $member = Member::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'description' => $request->description,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'dob' => $request->dob,
                'phone' => $request->phone,
            ]);
            // Add Avatar Link and Token
            $member->avatar = $this->get_url_sever() . '/storage/members/member.png';
            $token = Hash::make(Str::random(32));
            $member->email_verify_token = $token;
            $member->save();
            // Sent mail
            $to_name = "Admin";
            $to_email = $member->email;
            $data = array(
                "fullName" => $member->first_name . " " . $member->last_name,
                "url_verify" => $this->get_url_sever() . '/api/v1/member-active-account?email_verify_token=' . $token,
            );

            Mail::send('emails.confirm', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('Verify Email'); //send this mail with subject
                $message->from($to_email, $to_name); //send from this mail
            });
            return response($this->result->setData([
                'message' => 'Registered successfully! We sent an email to you to verify your account!',
                'member'  => $member
            ]));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /** ACTIVE ACCOUNT */
    public function activeAccount(Request $request)
    {
        // Get value in request
        $email_verify_token = $request->email_verify_token;
        $isSuccess = false;
        // Get Member
        $member = Member::where('email_verify_token', $email_verify_token)->first();
        if ($member) {
            $isSuccess = true;
            // Get date
            $date = $this->getDatetimeVietNamNow();
            // Set value
            $member->email_verify_token = null;
            $member->confirmed_at = $date;
            $member->save();
        }
        $email = $member ? $member->email : NULL;
        $fullName = $member ? $member->first_name . ' ' . $member->last_name : NULL;
        $data = [
            "isSuccess" => $isSuccess,
            "email" => $email,
            "fullName" => $fullName
        ];
        return view('emails.activeAccount', $data);
    }

    /** SEND CODE RESET PASSWORD */
    public function sentCodeResetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                'email' => 'required|email|min:6'
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Some field is not true !!'));
            }
            // Check Email Exist
            $member = Member::where('email', $request->email)->first();
            if (!$member) {
                return response($this->result->setError('This Email is not exist'));
            }
            // Add Token
            $codeReset = Str::random(8);
            $member->email_verify_token = $codeReset;
            $member->save();
            // Sent mail
            $to_name = "Admin";
            $to_email = $member->email;
            $data = array(
                "fullName" => $member->first_name . " " . $member->last_name,
                "code" => $codeReset
            );
            Mail::send('emails.sendCodeResetPassword', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('Forget Password'); //send this mail with subject
                $message->from($to_email, $to_name); //send from this mail
            });
            return response($this->result->setData("The code was send to email '" . $member->email . "'"));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /** RESET PASSWORD */
    function resetPassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'code'              => 'required|min:8',
                'new_password'      => 'required|min:6|max:60',
                'confirm_password'  => 'required|min:6|max:60',
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Some field is not true'));
            }
            // Password and re password
            if ($request->new_password != $request->confirm_password) {
                return response($this->result->setError('New Password and Confirm Password is not same !!'));
            }
            // Get Code
            $code = $request->code;
            // Find Member
            $member = Member::where('email_verify_token', $code)->first();
            if (!$member) {
                return response($this->result->setError('Wrong at your code !!'));
            }
            $member->email_verify_token = null;
            $member->password = bcrypt($request->new_password);
            $member->save();
            return response($this->result->setData('Reset Password SuccessfulLy'));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /**
     * Get Member Profile
     * */
    public function getProfile(Request $request)
    {
        try {
            $member = $request->user();
            return response($this->result->setData($member));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /** UPDATE MEMBER AVATAR */
    private function updateMemberAvatar(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'avatar' => 'required|image|mimes:jpg,jpeg,png',
            ]);
            if ($validator->fails()) {
                return false;
            }
            $member = $request->user();
            $get_image = $request->file('avatar');
            $img = explode('/', $member->avatar);
            $img = end($img);
            if ($img != "member.png") {
                $destinationPath = 'upload/member/' . $img;
                if (file_exists($destinationPath)) {
                    unlink($destinationPath);
                }
            }
            $avatar_name = 'member_' . $member->id . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('storage/members', $avatar_name);
            $url = $this->get_url_sever() . '/storage/members/' . $avatar_name;
            $member->avatar = $url;
            $member->save();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /** UPDATE MEMBER PROFILE */
    public function updateMemberProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->input(), [
                'first_name'  => 'required|max:120|min:2',
                'last_name'   => 'required|max:120|min:2',
                'phone'       => 'required|max:15|min:8',
                'dob'         => 'required|date',
                'gender'      => 'required|integer|in:1,2',
                'description' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Some Field is not true !!'));
            }
            if ($request->avatar) {
                $checkAvatar = $this->updateMemberAvatar($request);
                if (!$checkAvatar) {
                    return response($this->result->setError('Some thing wrong at the avatar !!'));
                }
            }
            $member = $request->user();
            // Update information
            $member->first_name = $request->first_name;
            $member->last_name = $request->last_name;
            $member->phone = $request->phone;
            $member->dob = $request->dob;
            $member->gender = $request->gender;
            $member->description = $request->description;
            $member->save();
            return response($this->result->setData($member));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    /** UPDATE MEMBER PASSWORD */
    public function updateMemberPassword(Request $request){
        try {
            $validator = Validator::make($request->input(), [
                'old_password'  => 'required|max:60|min:6',
                'new_password'  => 'required|max:60|min:6',
                'confirm_new_password'  => 'required|max:60|min:6'
            ]);

            if ($validator->fails()) {
                return response($this->result->setError('Some Field is not true !!'));
            }
            if ($request->new_password != $request->confirm_new_password) {
                return response($this->result->setError('Wrong at confirm password !!'));
            }
            $member = $request->user();
            if (!password_verify($request->old_password, $member->password)){
                return response($this->result->setError('Wrong at old password !!'));
            }
            // Update password
            $member->password = bcrypt($request->new_password);
            $member->save();
            $this->logout($request);
            return response($this->result->setData('Update Password Success, Please Login with new password !!'));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }


    // Get datetime Viet Nam Now
    private function getDatetimeVietNamNow()
    {
        // Get date
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        return date('Y/m/d H:i:s', time());
    }
    //Get URL Sever
    function get_url_sever()
    {
        $server_name = $_SERVER['SERVER_NAME'];

        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $port = ":$_SERVER[SERVER_PORT]";
        } else {
            $port = '';
        }

        if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
            $scheme = 'https';
        } else {
            $scheme = 'http';
        }
        return $scheme . '://' . $server_name . $port;
    }
}
