<?php

namespace Botble\RequestLog\Repositories\Caches;

use Botble\Support\Repositories\Caches\CacheAbstractDecorator;
use Botble\RequestLog\Repositories\Interfaces\RequestLogInterface;

class RequestLogCacheDecorator extends CacheAbstractDecorator implements RequestLogInterface
{
}
