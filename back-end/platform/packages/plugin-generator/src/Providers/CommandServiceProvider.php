<?php

namespace Botble\PluginGenerator\Providers;

use Botble\PluginGenerator\Commands\PluginCreateCommand;
use Botble\PluginGenerator\Commands\PluginListCommand;
use Botble\PluginGenerator\Commands\PluginMakeCrudCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PluginListCommand::class,
                PluginCreateCommand::class,
                PluginMakeCrudCommand::class,
            ]);
        }
    }
}
