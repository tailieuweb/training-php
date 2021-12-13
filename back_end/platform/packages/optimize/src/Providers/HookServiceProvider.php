<?php

namespace Botble\Optimize\Providers;

use Illuminate\Support\ServiceProvider;
use Throwable;

class HookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        add_filter(BASE_FILTER_AFTER_SETTING_CONTENT, [$this, 'addSetting'], 27);
    }

    /**
     * @param null $data
     * @return string
     * @throws Throwable
     */
    public function addSetting($data = null)
    {
        return $data . view('packages/optimize::setting')->render();
    }
}
