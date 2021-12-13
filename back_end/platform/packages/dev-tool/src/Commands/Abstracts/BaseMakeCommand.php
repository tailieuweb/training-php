<?php

namespace Botble\DevTool\Commands\Abstracts;

use Botble\Base\Supports\MountManager;
use File;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use League\Flysystem\Adapter\Local as LocalAdapter;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\Filesystem;

abstract class BaseMakeCommand extends Command
{
    /**
     * Search and replace all occurrences of ‘Module’
     * in all files with the name of the new module.
     * @param string $pattern
     * @param string $location
     * @param null $stub
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws FileNotFoundException
     */
    public function searchAndReplaceInFiles(string $pattern, string $location, $stub = null): bool
    {
        $replacements = $this->replacements($pattern);

        if (File::isFile($location)) {
            if (!$stub) {
                $stub = File::get($this->getStub());
            }

            $replace = $this->getReplacements($pattern) + $this->baseReplacements($pattern);

            $content = str_replace(array_keys($replace), $replace, $stub);

            File::put($location, $content);
            return true;
        }

        $manager = new MountManager([
            'directory' => new Filesystem(new LocalAdapter($location)),
        ]);

        foreach ($manager->listContents('directory://', true) as $file) {
            if ($file['type'] === 'file') {
                $content = str_replace(
                    array_keys($replacements),
                    array_values($replacements),
                    $manager->read('directory://' . $file['path'])
                );

                $manager->put('directory://' . $file['path'], $content);
            }
        }

        return true;
    }

    /**
     * @param string $replaceText
     * @return array
     */
    public function replacements(string $replaceText): array
    {
        return array_merge($this->baseReplacements($replaceText), $this->getReplacements($replaceText));
    }

    /**
     * @param string $replaceText
     * @return array
     */
    public function baseReplacements(string $replaceText): array
    {
        return [
            '{-name}'        => strtolower($replaceText),
            '{name}'         => Str::snake(str_replace('-', '_', $replaceText)),
            '{+name}'        => Str::camel($replaceText),
            '{++name}'       => str_replace('_', ' ', Str::snake(str_replace('-', '_', $replaceText))),
            '{names}'        => Str::plural(Str::snake(str_replace('-', '_', $replaceText))),
            '{Names}'        => ucfirst(Str::plural(Str::snake(str_replace('-', '_', $replaceText)))),
            '{++Names}'      => str_replace('_', ' ',
                ucfirst(Str::plural(Str::snake(str_replace('-', '_', $replaceText))))),
            '{-names}'       => Str::plural($replaceText),
            '{NAME}'         => strtoupper(Str::snake(str_replace('-', '_', $replaceText))),
            '{Name}'         => ucfirst(Str::camel($replaceText)),
            '.stub'          => '.php',
            '{migrate_date}' => now()->format('Y_m_d_His'),
            '{type}'         => 'package',
            '{types}'        => 'packages',
        ];
    }

    /**
     * @param string $replaceText
     * @return array
     */
    abstract public function getReplacements(string $replaceText): array;

    /**
     * @return string
     */
    abstract public function getStub(): string;

    /**
     * Rename models and repositories.
     * @param string $location
     * @return boolean
     */
    public function renameFiles(string $pattern, string $location): bool
    {
        $paths = scan_folder($location);

        if (empty($paths)) {
            return false;
        }

        foreach ($paths as $path) {
            $path = $location . DIRECTORY_SEPARATOR . $path;

            $newPath = $this->transformFileName($pattern, $path);
            rename($path, $newPath);

            $this->renameFiles($pattern, $newPath);
        }

        return true;
    }

    /**
     * Rename file in path.
     *
     * @param string $path
     * @return string
     */
    public function transformFileName(string $pattern, string $path): string
    {
        $replacements = $this->replacements($pattern);

        return str_replace(
            array_keys($replacements),
            array_values($replacements),
            $path
        );
    }

    /**
     * Generate the module in Modules directory.
     * @param string $from
     * @param string $to
     * @throws FileNotFoundException
     */
    protected function publishStubs(string $from, string $to): void
    {
        $this->createParentDirectory(File::dirname($to));

        if (File::isDirectory($from)) {
            $this->publishDirectory($from, $to);
        } else {
            File::copy($from, $to);
        }
    }

    /**
     * Create the directory to house the published files if needed.
     *
     * @param string $path
     * @return void
     */
    protected function createParentDirectory(string $path): void
    {
        if (!File::isDirectory($path) && !File::isFile($path)) {
            File::makeDirectory($path, 0755, true);
        }
    }

    /**
     * Publish the directory to the given directory.
     *
     * @param string $from
     * @param string $to
     * @return void
     * @throws FileNotFoundException
     */
    protected function publishDirectory(string $from, string $to): void
    {
        $manager = new MountManager([
            'from' => new Filesystem(new LocalAdapter($from)),
            'to'   => new Filesystem(new LocalAdapter($to)),
        ]);

        foreach ($manager->listContents('from://', true) as $file) {
            if ($file['type'] === 'file' && (!$manager->has('to://' . $file['path']) || ($this->hasOption('force') && $this->option('force')))) {
                $manager->put('to://' . $file['path'], $manager->read('from://' . $file['path']));
            }
        }
    }
}
