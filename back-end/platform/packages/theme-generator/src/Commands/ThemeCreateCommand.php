<?php

namespace Botble\ThemeGenerator\Commands;

use Botble\DevTool\Commands\Abstracts\BaseMakeCommand;
use Botble\Theme\Commands\Traits\ThemeTrait;
use Botble\Theme\Services\ThemeService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Support\Str;

class ThemeCreateCommand extends BaseMakeCommand
{

    use ThemeTrait;

    /**
     * @var ThemeService
     */
    public $themeService;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'cms:theme:create
        {name : The theme that you want to create}
        {--path= : Path to theme directory}
    ';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate theme structure';
    /**
     * @var File
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @param File $files
     * @param ThemeService $themeService
     */
    public function __construct(File $files, ThemeService $themeService)
    {
        parent::__construct();
        $this->files = $files;
        $this->themeService = $themeService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \League\Flysystem\FileNotFoundException
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $theme = $this->getTheme();
        $path = $this->getPath();

        if ($this->files->isDirectory($path)) {
            $this->error('Theme "' . $theme . '" is already exists.');
            return 1;
        }

        $this->publishStubs($this->getStub(), $path);

        if ($this->files->isDirectory($this->getStub())) {
            $screenshot = __DIR__ . '/../../resources/assets/images/' . rand(1, 5) . '.png';
            $this->files->copy($screenshot, $path . '/screenshot.png');
        }

        $this->searchAndReplaceInFiles($theme, $path);
        $this->renameFiles($theme, $path);

        $this->themeService->publishAssets($theme);

        $this->info('Theme "' . $theme . '" has been created.');

        return 0;
    }

    /**
     * {@inheritDoc}
     */
    public function getStub(): string
    {
        return __DIR__ . '/../../stubs';
    }

    /**
     * @param string $replaceText
     * @return array
     */
    public function baseReplacements(string $replaceText): array
    {
        return ['.js.stub' => '.js'] + parent::baseReplacements($replaceText);
    }

    /**
     * {@inheritDoc}
     */
    public function getReplacements(string $replaceText): array
    {
        return [
            '{theme}' => strtolower($replaceText),
            '{Theme}' => Str::studly($replaceText),
        ];
    }
}
