<?php

namespace Botble\RequestLog;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Dashboard\Repositories\Interfaces\DashboardWidgetInterface;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function remove()
    {
        Schema::dropIfExists('request_logs');
        app(DashboardWidgetInterface::class)->deleteBy(['name' => 'widget_request_errors']);
    }
}
