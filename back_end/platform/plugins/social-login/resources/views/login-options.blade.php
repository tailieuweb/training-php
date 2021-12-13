@if (setting('social_login_facebook_enable', false) || setting('social_login_google_enable', false) || setting('social_login_github_enable', false) || setting('social_login_linkedin_enable', false))
    <div class="login-options">
        <br>
        <p style="font-size: 14px">{{ __('Login with social networks') }}</p>
        <ul class="social-icons">
            @if (setting('social_login_facebook_enable', false))
                <li>
                    <a class="social-icon-color facebook" data-original-title="facebook"
                       href="{{ route('auth.social', 'facebook') }}"></a>
                </li>
            @endif
            @if (setting('social_login_google_enable', false))
                <li>
                    <a class="social-icon-color googleplus" data-original-title="Google Plus"
                       href="{{ route('auth.social', 'google') }}"></a>
                </li>
            @endif
            @if (setting('social_login_github_enable', false))
                <li>
                    <a class="social-icon-color github" data-original-title="Github"
                       href="{{ route('auth.social', 'github') }}"></a>
                </li>
            @endif
            @if (setting('social_login_linkedin_enable', false))
                <li>
                    <a class="social-icon-color linkedin" data-original-title="linkedin"
                       href="{{ route('auth.social', 'linkedin') }}"></a>
                </li>
            @endif
        </ul>
    </div>
@endif
