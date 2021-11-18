<?php

namespace Botble\PluginGenerator\Providers;

use Illuminate\Support\ServiceProvider;

class PluginGeneratorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(CommandServiceProvider::class);
    }
}
