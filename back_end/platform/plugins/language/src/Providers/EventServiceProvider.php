<?php

namespace Botble\Language\Providers;

use Artisan;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Language\Listeners\ActivatedPluginListener;
use Botble\Language\Listeners\CreatedContentListener;
use Botble\Language\Listeners\DeletedContentListener;
use Botble\Language\Listeners\ThemeRemoveListener;
use Botble\Language\Listeners\UpdatedContentListener;
use Botble\PluginManagement\Events\ActivatedPluginEvent;
use Botble\Theme\Events\ThemeRemoveEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdatedContentEvent::class => [
            UpdatedContentListener::class,
        ],
        CreatedContentEvent::class => [
            CreatedContentListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
        ThemeRemoveEvent::class    => [
            ThemeRemoveListener::class,
        ],
        ActivatedPluginEvent::class    => [
            ActivatedPluginListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();

        if (version_compare(get_cms_version(), '7.0') > 0) {
            Event::listen(['cache:cleared'], function () {
                Artisan::call('route:trans:clear');
            });
        }
    }
}
