<?php

namespace Botble\Optimize\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class PageSpeed
{
    /**
     * Apply rules.
     *
     * @param string $buffer
     * @return string
     */
    abstract public function apply($buffer);

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response $response
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ($response instanceof Response) {
            if (!$this->shouldProcessPageSpeed($request)) {
                return $response;
            }

            $html = $response->getContent();
            $newContent = $this->apply($html);

            return $response->setContent($newContent);
        }

        return $response;
    }

    /**
     * Replace content response.
     *
     * @param array $replace
     * @param string $buffer
     * @return string
     */
    protected function replace(array $replace, $buffer)
    {
        return preg_replace(array_keys($replace), array_values($replace), $buffer);
    }

    /**
     * Check Laravel Page Speed is enabled or not
     *
     * @return bool
     */
    protected function isEnable()
    {
        return setting('optimize_page_speed_enable', false);
    }

    /**
     * Should Process
     *
     * @param Request $request
     * @return bool
     */
    protected function shouldProcessPageSpeed($request)
    {
        $patterns = config('packages.optimize.general.skip', []);
        $patterns = empty($patterns) ? [] : $patterns;

        if (!$this->isEnable()) {
            return false;
        }

        foreach ($patterns as $pattern) {
            if ($request->is($pattern)) {
                return false;
            }
        }

        return true;
    }
}
