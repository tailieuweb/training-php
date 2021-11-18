<?php

namespace Botble\SocialLogin\Providers;

use Illuminate\Support\ServiceProvider;
use SocialService;
use Theme;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (setting('social_login_enable', false)) {
            add_filter(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, [$this, 'addLoginOptions'], 25, 2);
        }
    }

    /**
     * @param string $html
     * @param string $module
     * @return null|string
     * @throws \Throwable
     */
    public function addLoginOptions($html, string $module)
    {
        if (!SocialService::isSupportedModule($module)) {
            return $html;
        }

        if (defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
            Theme::asset()
                ->usePath(false)
                ->add('social-login-css', asset('vendor/core/plugins/social-login/css/social-login.css'), [], [],
                    '1.0.0');
        }

        return $html . view('plugins/social-login::login-options')->render();
    }
}
