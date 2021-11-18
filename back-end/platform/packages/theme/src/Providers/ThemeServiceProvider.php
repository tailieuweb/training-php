<?php

namespace Botble\Theme\Providers;

use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Theme\Commands\ThemeActivateCommand;
use Botble\Theme\Commands\ThemeAssetsPublishCommand;
use Botble\Theme\Commands\ThemeAssetsRemoveCommand;
use Botble\Theme\Commands\ThemeRemoveCommand;
use Botble\Theme\Commands\ThemeRenameCommand;
use Botble\Theme\Contracts\Theme as ThemeContract;
use Botble\Theme\Http\Middleware\AdminBarMiddleware;
use Botble\Theme\Theme;
use File;
use Html;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Theme as ThemeFacade;

class ThemeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        /**
         * @var Router $router
         */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', AdminBarMiddleware::class);

        Helper::autoload(__DIR__ . '/../../helpers');

        $this->app->bind(ThemeContract::class, Theme::class);

        $this->commands([
            ThemeActivateCommand::class,
            ThemeRemoveCommand::class,
            ThemeAssetsPublishCommand::class,
            ThemeAssetsRemoveCommand::class,
            ThemeRenameCommand::class,
        ]);
    }

    public function boot()
    {
        $this->setNamespace('packages/theme')
            ->loadAndPublishConfigurations(['general', 'permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web'])
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-core-appearance',
                    'priority'    => 996,
                    'parent_id'   => null,
                    'name'        => 'packages/theme::theme.appearance',
                    'icon'        => 'fa fa-paint-brush',
                    'url'         => '#',
                    'permissions' => [],
                ])
                ->registerItem([
                    'id'          => 'cms-core-theme',
                    'priority'    => 1,
                    'parent_id'   => 'cms-core-appearance',
                    'name'        => 'packages/theme::theme.name',
                    'icon'        => null,
                    'url'         => route('theme.index'),
                    'permissions' => ['theme.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-core-theme-option',
                    'priority'    => 4,
                    'parent_id'   => 'cms-core-appearance',
                    'name'        => 'packages/theme::theme.theme_options',
                    'icon'        => null,
                    'url'         => route('theme.options'),
                    'permissions' => ['theme.options'],
                ])
                ->registerItem([
                    'id'          => 'cms-core-appearance-custom-css',
                    'priority'    => 5,
                    'parent_id'   => 'cms-core-appearance',
                    'name'        => 'packages/theme::theme.custom_css',
                    'icon'        => null,
                    'url'         => route('theme.custom-css'),
                    'permissions' => ['theme.custom-css'],
                ]);

            if (config('packages.theme.general.enable_custom_js')) {
                dashboard_menu()
                    ->registerItem([
                        'id'          => 'cms-core-appearance-custom-js',
                        'priority'    => 6,
                        'parent_id'   => 'cms-core-appearance',
                        'name'        => 'packages/theme::theme.custom_js',
                        'icon'        => null,
                        'url'         => route('theme.custom-js'),
                        'permissions' => ['theme.custom-js'],
                    ]);
            }

            admin_bar()
                ->registerLink(trans('packages/theme::theme.name'), route('theme.index'), 'appearance')
                ->registerLink(trans('packages/theme::theme.theme_options'), route('theme.options'), 'appearance');
        });

        $this->app->booted(function () {
            $file = public_path(ThemeFacade::path() . '/css/style.integration.css');
            if (File::exists($file)) {
                ThemeFacade::asset()
                    ->container('after_header')
                    ->usePath()
                    ->add('theme-style-integration-css', 'css/style.integration.css', [], [], filectime($file));
            }

            if (config('packages.theme.general.enable_custom_js')) {
                if (setting('custom_header_js')) {
                    add_filter(THEME_FRONT_HEADER, function ($html) {
                        $headerJS = setting('custom_header_js');

                        if (empty($headerJS)) {
                            return $html;
                        }

                        if (!Str::contains($headerJS, '<script>') || !Str::contains($headerJS, '</script>')) {
                            $headerJS = Html::tag('script', $headerJS);
                        }

                        return $html . $headerJS;
                    }, 15);
                }

                if (setting('custom_body_js')) {
                    add_filter(THEME_FRONT_BODY, function ($html) {
                        $bodyJS = setting('custom_body_js');

                        if (empty($bodyJS)) {
                            return $html;
                        }

                        if (!Str::contains($bodyJS, '<script>') || !Str::contains($bodyJS, '</script>')) {
                            $bodyJS = Html::tag('script', $bodyJS);
                        }

                        return $html . $bodyJS;
                    }, 15);
                }

                if (setting('custom_footer_js')) {
                    add_filter(THEME_FRONT_FOOTER, function ($html) {
                        $footerJS = setting('custom_footer_js');

                        if (empty($footerJS)) {
                            return $html;
                        }

                        if (!Str::contains($footerJS, '<script>') || !Str::contains($footerJS, '</script>')) {
                            $footerJS = Html::tag('script', $footerJS);
                        }

                        return $html . $footerJS;
                    }, 15);
                }
            }

            $this->app->register(HookServiceProvider::class);
        });

        $this->app->register(ThemeManagementServiceProvider::class);
    }
}
