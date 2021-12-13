<?php

namespace Botble\RequestLog\Listeners;

use Botble\RequestLog\Events\RequestHandlerEvent;
use Botble\RequestLog\Models\RequestLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RequestHandlerListener
{
    /**
     * @var RequestLog
     */
    public $requestLog;

    /**
     * @var Request
     */
    protected $request;

    /**
     * RequestHandlerListener constructor.
     * @param RequestLog $requestLog
     * @param Request $request
     */
    public function __construct(RequestLog $requestLog, Request $request)
    {
        $this->requestLog = $requestLog;
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param RequestHandlerEvent $event
     * @return boolean
     */
    public function handle(RequestHandlerEvent $event)
    {
        try {
            $url = $this->request->fullUrl();

            if (Str::contains($url, '.js.map')) {
                return false;
            }

            $this->requestLog = RequestLog::firstOrNew([
                'url'         => Str::limit($url, 120),
                'status_code' => $event->code,
            ]);

            if ($referrer = $this->request->header('referrer')) {
                $referrers = (array)$this->requestLog->referrer ?: [];
                $referrers[] = $referrer;
                $this->requestLog->referrer = $referrers;
            }

            if (Auth::check()) {
                if (!is_array($this->requestLog->user_id)) {
                    $this->requestLog->user_id = [Auth::id()];
                } else {
                    $this->requestLog->user_id = array_unique(
                        array_merge($this->requestLog->user_id, [Auth::id()])
                    );
                }
            }

            if (!$this->requestLog->exists) {
                $this->requestLog->count = 1;
            } else {
                $this->requestLog->count += 1;
            }

            return $this->requestLog->save();
        } catch (Exception $exception) {
            info($exception->getMessage());
            return false;
        }
    }
}
