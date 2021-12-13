<?php

namespace Botble\WidgetGenerator\Commands;

use Botble\DevTool\Commands\Abstracts\BaseMakeCommand;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Support\Str;
use League\Flysystem\FileNotFoundException;
use Theme;

class WidgetCreateCommand extends BaseMakeCommand
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'cms:widget:create {name : The widget that you want to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new widget';

    /**
     * @var File
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param File $files
     */
    public function __construct(File $files)
    {
        $this->files = $files;

        parent::__construct();
    }

    /**
     * @return bool
     * @throws FileNotFoundException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        $widget = $this->getWidget();
        $path = $this->getPath();

        if ($this->files->isDirectory($path)) {
            $this->error('Widget "' . $widget . '" is already exists.');
            return 1;
        }

        $this->publishStubs($this->getStub(), $path);
        $this->searchAndReplaceInFiles($widget, $path);
        $this->renameFiles($widget, $path);

        $this->info('Widget "' . $widget . '" has been created in ' . $path . '.');

        return 0;
    }

    /**
     * Get the theme name.
     *
     * @return string
     */
    protected function getWidget(): string
    {
        return strtolower($this->argument('name'));
    }

    /**
     * Get the destination view path.
     *
     * @return string
     */
    protected function getPath(): string
    {
        return theme_path(Theme::getThemeName() . '/widgets/' . $this->getWidget());
    }

    /**
     * {@inheritDoc}
     */
    public function getStub(): string
    {
        return __DIR__ . '/../../stubs';
    }

    /**
     * {@inheritDoc}
     */
    public function getReplacements(string $replaceText): array
    {
        return [
            '{widget}' => strtolower($replaceText),
            '{Widget}' => Str::studly($replaceText),
        ];
    }
}
