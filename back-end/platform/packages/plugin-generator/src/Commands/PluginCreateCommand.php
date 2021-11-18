<?php

namespace Botble\PluginGenerator\Commands;

use Botble\DevTool\Commands\Abstracts\BaseMakeCommand;
use File;
use Illuminate\Support\Str;
use League\Flysystem\FileNotFoundException;

class PluginCreateCommand extends BaseMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:plugin:create {name : The plugin that you want to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a plugin in the /platform/plugins directory.';

    /**
     * Execute the console command.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws FileNotFoundException
     */
    public function handle()
    {
        if (!preg_match('/^[a-z0-9\-]+$/i', $this->argument('name'))) {
            $this->error('Only alphabetic characters are allowed.');
            return 1;
        }

        $plugin = strtolower($this->argument('name'));
        $location = plugin_path($plugin);

        if (File::isDirectory($location)) {
            $this->error('A plugin named [' . $plugin . '] already exists.');
            return 1;
        }

        $this->publishStubs($this->getStub(), $location);
        File::copy(__DIR__ . '/../../stubs/plugin.json', $location . '/plugin.json');
        File::copy(__DIR__ . '/../../stubs/Plugin.stub', $location . '/src/Plugin.php');
        $this->renameFiles($plugin, $location);
        $this->searchAndReplaceInFiles($plugin, $location);
        $this->removeUnusedFiles($location);
        $this->line('------------------');
        $this->line('<info>The plugin</info> <comment>' . $plugin . '</comment> <info>was created in</info> <comment>' . $location . '</comment><info>, customize it!</info>');
        $this->line('------------------');
        $this->call('cache:clear');

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
        File::delete($location . '/composer.json');
    }

    /**
     * {@inheritDoc}
     */
    public function getReplacements(string $replaceText): array
    {
        return [
            '{type}'     => 'plugin',
            '{types}'    => 'plugins',
            '{-module}'  => strtolower($replaceText),
            '{module}'   => Str::snake(str_replace('-', '_', $replaceText)),
            '{+module}'  => Str::camel($replaceText),
            '{modules}'  => Str::plural(Str::snake(str_replace('-', '_', $replaceText))),
            '{Modules}'  => ucfirst(Str::plural(Str::snake(str_replace('-', '_', $replaceText)))),
            '{-modules}' => Str::plural($replaceText),
            '{MODULE}'   => strtoupper(Str::snake(str_replace('-', '_', $replaceText))),
            '{Module}'   => ucfirst(Str::camel($replaceText)),
        ];
    }
}
