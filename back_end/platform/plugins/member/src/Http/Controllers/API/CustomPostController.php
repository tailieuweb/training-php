<?php

namespace Botble\Member\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Botble\Base\Http\Responses\CustomResult;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Member\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class CustomPostController extends Controller
{
    private $result;
    // Construct
    function __construct()
    {
        $this->result = CustomResult::getInstance();
    }

    // Get top 10 Feature Post Hot- (Danh)
    function getFeaturePosts()
    {
        try {
            $posts  = Post::select('posts.*', 'members.avatar as authorAvatar')
                ->join('members', 'members.id', '=', 'posts.author_id')
                ->orderByDesc('views')
                ->limit(10)
                ->get();
            return response($this->result->setData($posts));
        } catch (Exception $ex) {
            return response($this->result->setError($ex->getMessage()));
        }
    }

    // Login
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

    // Register
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
            // Add Token
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

    // Active Account
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
