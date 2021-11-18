<?php

namespace Botble\Member\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Member\Http\Requests\API\ResendEmailVerificationRequest;
use Botble\Member\Http\Requests\API\VerifyEmailRequest;
use Botble\Member\Notifications\ConfirmEmailNotification;
use Botble\Member\Repositories\Interfaces\MemberInterface;
use Hash;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Str;

class VerificationController extends Controller
{
    /**
     * @var MemberInterface
     */
    protected $memberRepository;

    /**
     * AuthenticationController constructor.
     *
     * @param MemberInterface $memberRepository
     */
    public function __construct(MemberInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * Verify email
     *
     * Mark the authenticated user's email address as verified.
     *
     * @bodyParam email string required The email of the user.
     * @bodyParam token string required The token to verify user's email.
     *
     * @group Authentication
     *
     * @param VerifyEmailRequest $request
     * @param BaseHttpResponse $response
     *
     * @return BaseHttpResponse
     */
    public function verify(VerifyEmailRequest $request, BaseHttpResponse $response)
    {
        $member = $this
            ->memberRepository
            ->getFirstBy([
                'email' => $request->input('email'),
            ]);

        if (!$member) {
            return $response
                ->setError()
                ->setMessage(__('User not found!'))
                ->setCode(404);
        }

        if (!Hash::check($request->input('token'), $member->email_verify_token)) {
            return $response
                ->setError()
                ->setMessage(__('Token is invalid or expired!'));
        }

        if (!$member->markEmailAsVerified()) {
            return $response
                ->setError()
                ->setMessage(__('Has error when verify email!'));
        }

        event(new Verified($member));

        $member->email_verify_token = null;
        $this->memberRepository->createOrUpdate($member);

        return $response
            ->setMessage(__('Verify email successfully!'));
    }

    /**
     * Resend email verification
     *
     * Resend the email verification notification.
     *
     * @bodyParam email string required The email of the user.
     *
     * @group Authentication
     *
     * @param ResendEmailVerificationRequest $request
     * @param BaseHttpResponse $response
     *
     * @return BaseHttpResponse
     */
    public function resend(ResendEmailVerificationRequest $request, BaseHttpResponse $response)
    {
        $member = $this
            ->memberRepository
            ->getFirstBy([
                'email' => $request->input('email'),
            ]);

        if (!$member) {
            return $response
                ->setError()
                ->setMessage(__('User not found!'))
                ->setCode(404);
        }

        if ($member->hasVerifiedEmail()) {
            return $response
                ->setError()
                ->setMessage(__('This user has verified email'));
        }

        $token = Hash::make(Str::random(32));

        $member->email_verify_token = $token;
        $member->save();

        $member->notify(new ConfirmEmailNotification($token));

        return $response
            ->setMessage(__('Resend email verification successfully!'));
    }
}
