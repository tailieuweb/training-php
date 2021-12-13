<?php

namespace Botble\Member\Http\Controllers;

use App\Http\Controllers\Controller;
use Botble\ACL\Traits\RegistersUsers;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Member\Models\Member;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SeoHelper;
use Theme;
use URL;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = null;

    /**
     * @var MemberInterface
     */
    protected $memberRepository;

    /**
     * Create a new controller instance.
     *
     * @param MemberInterface $memberRepository
     */
    public function __construct(MemberInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function showRegistrationForm()
    {
        SeoHelper::setTitle(__('Register'));

        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }

        Theme::breadcrumb()
            ->add(__('Home'), route('public.index'))
            ->add(__('Register'), route('public.member.register'));

        return view('plugins/member::auth.register');
    }

    /**
     * Confirm a user with a given confirmation code.
     *
     * @param int $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @param MemberInterface $memberRepository
     * @return BaseHttpResponse
     */
    public function confirm($id, Request $request, BaseHttpResponse $response, MemberInterface $memberRepository)
    {
        if (!URL::hasValidSignature($request)) {
            abort(404);
        }

        $member = $memberRepository->findOrFail($id);

        $member->confirmed_at = now();
        $this->memberRepository->createOrUpdate($member);

        $this->guard()->login($member);

        return $response
            ->setNextUrl(route('public.member.dashboard'))
            ->setMessage(trans('plugins/member::member.confirmation_successful'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return auth('member');
    }

    /**
     * Resend a confirmation code to a user.
     *
     * @param \Illuminate\Http\Request $request
     * @param MemberInterface $memberRepository
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function resendConfirmation(Request $request, MemberInterface $memberRepository, BaseHttpResponse $response)
    {
        $member = $memberRepository->getFirstBy(['email' => $request->input('email')]);
        if (!$member) {
            return $response
                ->setError()
                ->setMessage(__('Cannot find this account!'));
        }

        $this->sendConfirmationToUser($member);

        return $response
            ->setMessage(trans('plugins/member::member.confirmation_resent'));
    }

    /**
     * Send the confirmation code to a user.
     *
     * @param Member $member
     */
    protected function sendConfirmationToUser($member)
    {
        // Notify the user
        $notificationConfig = config('plugins.member.general.notification');
        if ($notificationConfig) {
            $notification = app($notificationConfig);
            $member->notify($notification);
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function register(Request $request, BaseHttpResponse $response)
    {
        $this->validator($request->input())->validate();

        event(new Registered($member = $this->create($request->input())));

        if (setting('verify_account_email', config('plugins.member.general.verify_email'))) {
            $this->sendConfirmationToUser($member);
            return $this->registered($request, $member)
                ?: $response->setNextUrl($this->redirectPath())
                    ->setMessage(trans('plugins/member::member.confirmation_info'));
        }

        $member->confirmed_at = now();
        $this->memberRepository->createOrUpdate($member);
        $this->guard()->login($member);
        return $this->registered($request, $member)
            ?: $response->setNextUrl($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:120',
            'last_name'  => 'required|max:120',
            'email'      => 'required|email|max:255|unique:members',
            'password'   => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Member
     */
    protected function create(array $data)
    {
        return $this->memberRepository->create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVerify()
    {
        return view('plugins/member::auth.verify');
    }
}
