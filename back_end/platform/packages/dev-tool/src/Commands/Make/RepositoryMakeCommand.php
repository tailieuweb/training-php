<?php

namespace Botble\DevTool\Commands\Make;

use Botble\DevTool\Commands\Abstracts\BaseMakeCommand;
use File;
use Illuminate\Support\Str;
use League\Flysystem\FileNotFoundException;

class RepositoryMakeCommand extends BaseMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:make:repository {name : The table that you want to create} {module : module name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a repository';

    /**
     * Execute the console command.
     *
     * @throws FileNotFoundException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (!preg_match('/^[a-z0-9\-\_]+$/i', $this->argument('name'))) {
            $this->error('Only alphabetic characters are allowed.');
            return 1;
        }

        $name = $this->argument('name');

        $stub = $this->getStub();
        $path = $path = platform_path(strtolower($this->argument('module')) . '/src/Repositories');

        $this->publishFile($stub . '/Interfaces/{Name}Interface.stub', $path, $name, 'Interfaces', 'Interface.php');
        $this->publishFile($stub . '/Eloquent/{Name}Repository.stub', $path, $name, 'Eloquent', 'Repository.php');
        $this->publishFile($stub . '/Caches/{Name}CacheDecorator.stub', $path, $name, 'Caches', 'CacheDecorator.php');

        $this->line('------------------');

        $this->info('Created successfully <comment>' . $path . '</comment>!');

        return 0;
    }

    /**
     * @param string $stub
     * @param string $path
     * @param string $name
     * @param string $prefix
     * @param string $extension
     * @throws FileNotFoundException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function publishFile(string $stub, string $path, string $name, string $prefix, string $extension)
    {
        $path = $path . '/' . $prefix . '/' . ucfirst(Str::studly($name)) . $extension;

        $this->publishStubs($stub, $path);
        $this->renameFiles($stub, $path);
        $this->searchAndReplaceInFiles($name, $path, File::get($stub));
    }

    /**
     * {@inheritDoc}
     */
    public function getStub(): string
    {
        return __DIR__ . '/../../../stubs/module/src/Repositories';
    }

    /**
     * {@inheritDoc}
     */
    public function getReplacements(string $replaceText): array
    {
        $module = explode('/', $this->argument('module'));
        $module = strtolower(end($module));

        return [
            '{Module}' => ucfirst(Str::camel($module)),
        ];
    }
}
