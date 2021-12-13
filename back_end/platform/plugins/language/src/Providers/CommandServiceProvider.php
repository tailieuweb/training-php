<?php

namespace Botble\Language\Providers;

use Botble\Language\Commands\RouteTranslationsCacheCommand;
use Botble\Language\Commands\RouteTranslationsClearCommand;
use Botble\Language\Commands\SyncOldDataCommand;
use Illuminate\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (version_compare(get_cms_version(), '7.0') > 0) {
            $this->commands([
                SyncOldDataCommand::class,
                RouteTranslationsClearCommand::class,
                RouteTranslationsCacheCommand::class,
            ]);
        } else {
            $this->commands([
                SyncOldDataCommand::class,
            ]);
        }
    }
}
