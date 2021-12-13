<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
     */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
     */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before'             => function (Theme $theme) {

        },
        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme'  => function (Theme $theme) {
            // You may use this event to set up your assets.

            $version = '5.17';

            $theme->asset()->container('footer')->usePath()->add('jquery', 'plugins/jquery/jquery.min.js');
            $theme->asset()->container('footer')->usePath()
                ->add('bootstrap-js', 'plugins/bootstrap/js/bootstrap.min.js', ['jquery']);

            $theme->asset()->container('footer')->usePath()
                ->add('custom', 'js/custom.min.js', ['jquery'], [], $version);

            $theme->asset()->container('footer')->usePath()->add('ripple.js', 'js/ripple.js', ['jquery'], [], $version);

            $theme->asset()->usePath()->add('bootstrap-css', 'plugins/bootstrap/css/bootstrap.min.css');
            $theme->asset()->usePath()->add('font-awesome', 'plugins/font-awesome/css/font-awesome.min.css');
            $theme->asset()->usePath()->add('ionicons', 'plugins/ionicons/css/ionicons.min.css');
            $theme->asset()->usePath()->add('style', 'css/style.css', [], [], $version);

            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post', 'index'], function (\Botble\Shortcode\View\View $view) {
                    $view->withShortcodes();
                });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function (Theme $theme) {
            },
        ],
    ],
];
