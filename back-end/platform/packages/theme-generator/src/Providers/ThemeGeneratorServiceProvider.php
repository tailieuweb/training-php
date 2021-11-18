<?php

namespace Botble\ThemeGenerator\Providers;

use Illuminate\Support\ServiceProvider;

class ThemeGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(CommandServiceProvider::class);
    }
}
