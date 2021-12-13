<?php

namespace Botble\Language\Commands;

use Illuminate\Foundation\Console\RouteCacheCommand;
use Illuminate\Routing\RouteCollection;
use Language;

class RouteTranslationsCacheCommand extends RouteCacheCommand
{
    /**
     * @var string
     */
    protected $name = 'route:trans:cache';

    /**
     * @var string
     */
    protected $description = 'Create a route cache file for faster route registration for all locales';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('route:trans:clear');

        $this->cacheRoutesPerLocale();

        $this->info('Routes cached successfully for all locales!');
    }

    /**
     * Cache the routes separately for each locale.
     */
    protected function cacheRoutesPerLocale()
    {
        // Store the default routes cache,
        // this way the Application will detect that routes are cached.
        $allLocales = Language::getSupportedLanguagesKeys();

        array_push($allLocales, null);

        foreach ($allLocales as $locale) {

            if (Language::hideDefaultLocaleInURL() && $locale == Language::getCurrentLocale()) {
                continue;
            }

            $routes = $this->getFreshApplicationRoutesForLocale($locale);

            if (count($routes) == 0) {
                $this->error('Your application doesn\'t have any routes.');
                return;
            }

            foreach ($routes as $route) {
                $route->prepareForSerialization();
            }

            $this->files->put(
                $this->makeLocaleRoutesPath($locale), $this->buildRouteCacheFile($routes)
            );
        }
    }

    /**
     * Boot a fresh copy of the application and get the routes for a given locale.
     *
     * @param string|null $locale
     * @return \Illuminate\Routing\RouteCollection
     */
    protected function getFreshApplicationRoutesForLocale($locale = null)
    {
        if ($locale === null) {
            return $this->getFreshApplicationRoutes();
        }

        $key = Language::getEnvRoutingKey();

        putenv($key . '=' . $locale);

        $routes = $this->getFreshApplicationRoutes();

        putenv($key . '=');

        return $routes;
    }

    /**
     * Build the route cache file.
     *
     * @param  \Illuminate\Routing\RouteCollection $routes
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildRouteCacheFile(RouteCollection $routes)
    {
        $stub = $this->files->get(realpath(__DIR__ . '/../../stubs/routes.stub'));

        return str_replace(
            [
                '{{routes}}',
                '{{translatedRoutes}}',
            ],
            [
                base64_encode(serialize($routes)),
                Language::getSerializedTranslatedRoutes(),
            ],
            $stub
        );
    }

    /**
     * Returns whether a given locale is supported.
     *
     * @param string $locale
     * @return bool
     */
    protected function isSupportedLocale($locale)
    {
        return in_array($locale, Language::getSupportedLanguagesKeys());
    }

    /**
     * @param string $locale
     * @return string
     */
    protected function makeLocaleRoutesPath($locale = '')
    {
        $path = $this->laravel->getCachedRoutesPath();

        if (!$locale) {
            return $path;
        }

        return substr($path, 0, -4) . '_' . $locale . '.php';
    }
}
