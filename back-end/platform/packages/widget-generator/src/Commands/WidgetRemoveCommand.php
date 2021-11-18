<?php

namespace Botble\WidgetGenerator\Commands;

use Botble\Widget\Repositories\Interfaces\WidgetInterface;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Theme;

class WidgetRemoveCommand extends Command
{

    use ConfirmableTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'cms:widget:remove
        {name : The widget that you want to remove}
        {--force : Force to remove widget without confirmation}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a widget';

    /**
     * @var Filesystem
     */
    protected $files;

    /**
     * @var WidgetInterface
     */
    protected $widgetRepository;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $files
     * @param WidgetInterface $widgetRepository
     */
    public function __construct(Filesystem $files, WidgetInterface $widgetRepository)
    {
        $this->files = $files;
        $this->widgetRepository = $widgetRepository;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return boolean
     */
    public function handle()
    {
        if (!$this->confirmToProceed('Are you sure you want to permanently delete?', true)) {
            return 1;
        }

        $widget = $this->getWidget();
        $path = $this->getPath();

        if (!$this->files->isDirectory($path)) {
            $this->error('Widget "' . $widget . '" is not existed.');
            return 1;
        }

        try {
            $this->files->deleteDirectory($path);
            $this->widgetRepository->deleteBy([
                'widget_id' => Str::studly($widget) . 'Widget',
                'theme'     => Theme::getThemeName(),
            ]);

            $this->info('Widget "' . $widget . '" has been deleted.');
        } catch (Exception $exception) {
            $this->info($exception->getMessage());
        }

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
}
