<?php

namespace Botble\DevTool\Commands;

use EmailHandler;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Throwable;

class TestSendMailCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:mail:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test send mail';

    /**
     * Execute the console command.
     *
     * @throws Throwable
     */
    public function handle()
    {
        $content = file_get_contents(core_path('setting/resources/email-templates/test.tpl'));
        EmailHandler::send($content, 'Test mail!', null, [], true);

        $this->info('Done!');
    }
}
