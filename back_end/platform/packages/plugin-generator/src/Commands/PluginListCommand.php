<?php

namespace Botble\PluginGenerator\Commands;

use File;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Arr;

class PluginListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:plugin:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all plugins information';

    /**
     * Execute the console command.
     * @throws FileNotFoundException
     */
    public function handle()
    {
        $header = [
            'Name',
            'Alias',
            'Version',
            'Provider',
            'Status',
            'Author',
        ];
        $result = [];

        $plugins = scan_folder(plugin_path());
        if (!empty($plugins)) {
            $installed = get_active_plugins();
            foreach ($plugins as $plugin) {
                if (!File::exists(plugin_path($plugin . '/plugin.json'))) {
                    continue;
                }

                $content = get_file_data(plugin_path($plugin . '/plugin.json'));
                if (!empty($content)) {
                    $result[] = [
                        Arr::get($content, 'name'),
                        $plugin,
                        Arr::get($content, 'version'),
                        Arr::get($content, 'provider'),
                        in_array($plugin, $installed) ? '✓ active' : '✘ inactive',
                        Arr::get($content, 'author'),
                    ];
                }
            }
        }

        $this->table($header, $result);
    }
}
