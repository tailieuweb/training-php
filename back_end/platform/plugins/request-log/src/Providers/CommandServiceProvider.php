<?php

namespace Botble\RequestLog\Providers;

use Botble\RequestLog\Commands\RequestLogClearCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RequestLogClearCommand::class,
            ]);
        }
    }
}
