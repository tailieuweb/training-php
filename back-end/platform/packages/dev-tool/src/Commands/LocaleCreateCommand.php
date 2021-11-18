<?php

namespace Botble\DevTool\Commands;

use File;
use Illuminate\Console\Command;

class LocaleCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:locale:create {locale : The locale to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new locale';

    /**
     * @return int
     */
    public function handle()
    {
        if (!preg_match('/^[a-z0-9\-]+$/i', $this->argument('locale'))) {
            $this->error('Only alphabetic characters are allowed.');
            return 1;
        }

        $defaultLocale = resource_path('lang/en');
        if (File::exists($defaultLocale)) {
            File::copyDirectory($defaultLocale, resource_path('lang/' . $this->argument('locale')));
            $this->info('Created: ' . resource_path('lang/' . $this->argument('locale')));
        }

        $this->createLocaleInPath(resource_path('lang/vendor/core'));
        $this->createLocaleInPath(resource_path('lang/vendor/packages'));
        $this->createLocaleInPath(resource_path('lang/vendor/plugins'));

        return 0;
    }

    /**
     * @param string $path
     * @return int|void
     */
    protected function createLocaleInPath(string $path)
    {
        if (!File::isDirectory($path)) {
            return 0;
        }

        $folders = File::directories($path);

        foreach ($folders as $module) {
            foreach (File::directories($module) as $locale) {
                if (File::name($locale) == 'en') {
                    File::copyDirectory($locale, $module . '/' . $this->argument('locale'));
                    $this->info('Created: ' . $module . '/' . $this->argument('locale'));
                }
            }
        }

        return count($folders);
    }
}
