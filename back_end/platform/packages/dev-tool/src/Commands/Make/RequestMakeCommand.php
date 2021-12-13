<?php

namespace Botble\DevTool\Commands\Make;

use Botble\DevTool\Commands\Abstracts\BaseMakeCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Str;

class RequestMakeCommand extends BaseMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:make:request {name : The table that you want to create} {module : module name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a request';

    /**
     * Execute the console command.
     *
     * @throws \League\Flysystem\FileNotFoundException
     * @throws FileNotFoundException
     */
    public function handle()
    {
        if (!preg_match('/^[a-z0-9\-\_]+$/i', $this->argument('name'))) {
            $this->error('Only alphabetic characters are allowed.');
            return 1;
        }

        $name = $this->argument('name');
        $path = platform_path(strtolower($this->argument('module')) . '/src/Http/Requests/' . ucfirst(Str::studly($name)) . 'Request.php');

        $this->publishStubs($this->getStub(), $path);
        $this->renameFiles($name, $path);
        $this->searchAndReplaceInFiles($name, $path);
        $this->line('------------------');

        $this->info('Created successfully <comment>' . $path . '</comment>!');

        return 0;
    }

    /**
     * {@inheritDoc}
     */
    public function getStub(): string
    {
        return __DIR__ . '/../../../stubs/module/src/Http/Requests/{Name}Request.stub';
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
