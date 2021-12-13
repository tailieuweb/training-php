<?php

namespace Botble\DevTool\Commands;

use Botble\Base\Supports\Helper;
use Illuminate\Support\Facades\DB;
use Exception;
use File;
use Illuminate\Console\Command;

class PackageRemoveCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:package:remove {name : The package name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a package in the /platform/packages directory.';

    public function handle()
    {
        if (!preg_match('/^[a-z0-9\-]+$/i', $this->argument('name'))) {
            $this->error('Only alphabetic characters are allowed.');
            return 1;
        }

        $package = strtolower($this->argument('name'));
        $location = package_path($package);

        if (!File::isDirectory($location)) {
            $this->error('This package is not existed!');
            return 1;
        }

        return $this->processRemove($package, $location);
    }

    /**
     * @param string $package
     * @param string $location
     * @return boolean
     * @throws Exception
     */
    protected function processRemove(string $package, string $location): bool
    {
        $migrations = [];
        foreach (scan_folder($location . '/database/migrations') as $file) {
            $migrations[] = pathinfo($file, PATHINFO_FILENAME);
        }

        DB::table('migrations')->whereIn('migration', $migrations)->delete();

        File::deleteDirectory($location);

        Helper::removeModuleFiles($package);

        $this->call('cache:clear');

        $this->line('<info>Removed package files successfully!</info>');

        $this->line('<info>Remove</info> <comment>"botble/' . $package . '": "*@dev"</comment> to composer.json then run <comment>composer update</comment> to remove this package!');

        return 0;
    }
}
