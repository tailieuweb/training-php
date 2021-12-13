<?php

namespace Botble\DevTool\Commands;

use Botble\DevTool\Commands\Abstracts\BaseMakeCommand;
use File;
use Illuminate\Support\Str;
use League\Flysystem\FileNotFoundException;

class PackageMakeCrudCommand extends BaseMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:package:make:crud {package : The package name} {name : CRUD name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a CRUD inside a package';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws FileNotFoundException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (!preg_match('/^[a-z0-9\-]+$/i', $this->argument('package')) || !preg_match('/^[a-z0-9\-]+$/i',
                $this->argument('name'))) {
            $this->error('Only alphabetic characters are allowed.');
            return 1;
        }

        $package = strtolower($this->argument('package'));
        $location = package_path($package);

        if (!File::isDirectory($location)) {
            $this->error('Plugin named [' . $package . '] does not exists.');
            return 1;
        }

        $name = strtolower($this->argument('name'));

        $this->publishStubs($this->getStub(), $location);
        $this->removeUnusedFiles($location);
        $this->renameFiles($name, $location);
        $this->searchAndReplaceInFiles($name, $location);
        $this->line('------------------');
        $this->line('<info>The CRUD for package </info> <comment>' . $package . '</comment> <info>was created in</info> <comment>' . $location . '</comment><info>, customize it!</info>');
        $this->line('------------------');
        $this->call('cache:clear');

        $replacements = [
            'config/permissions.stub',
            'helpers/constants.stub',
            'routes/web.stub',
            'src/Providers/{Module}ServiceProvider.stub',
        ];

        foreach ($replacements as $replacement) {
            $this->line('Add below code into ' . $this->replacementSubModule(null,
                    str_replace(base_path(), '', $location) . '/' . $replacement));
            $this->info($this->replacementSubModule($replacement));
        }

        return 0;
    }

    /**
     * {@inheritDoc}
     */
    public function getStub(): string
    {
        return __DIR__ . '/../../../dev-tool/stubs/module';
    }

    /**
     * @param string $location
     */
    protected function removeUnusedFiles(string $location)
    {
        $files = [
            'config/permissions.stub',
            'helpers/constants.stub',
            'routes/web.stub',
            'src/Providers/{Module}ServiceProvider.stub',
        ];

        foreach ($files as $file) {
            File::delete($location . '/' . $file);
        }
    }

    /**
     * @param string $file
     * @param null $content
     * @return string
     */
    protected function replacementSubModule(string $file = null, $content = null): string
    {
        $name = strtolower($this->argument('name'));

        if ($file && empty($content)) {
            $content = file_get_contents($this->getStub() . '/../sub-module/' . $file);
        }

        $replace = $this->getReplacements($name) + $this->baseReplacements($name);

        return str_replace(array_keys($replace), $replace, $content);
    }

    /**
     * {@inheritDoc}
     */
    public function getReplacements(string $replaceText): array
    {
        $module = strtolower($this->argument('package'));

        return [
            '{-module}'  => strtolower($module),
            '{module}'   => Str::snake(str_replace('-', '_', $module)),
            '{+module}'  => Str::camel($module),
            '{modules}'  => Str::plural(Str::snake(str_replace('-', '_', $module))),
            '{Modules}'  => ucfirst(Str::plural(Str::snake(str_replace('-', '_', $module)))),
            '{-modules}' => Str::plural($module),
            '{MODULE}'   => strtoupper(Str::snake(str_replace('-', '_', $module))),
            '{Module}'   => ucfirst(Str::camel($module)),
        ];
    }
}
