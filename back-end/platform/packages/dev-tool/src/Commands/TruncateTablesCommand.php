<?php

namespace Botble\DevTool\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;

class TruncateTablesCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'cms:truncate:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate tables';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        Schema::disableForeignKeyConstraints();
        foreach ($tableNames as $name) {
            if (in_array($name, ['migrations', 'users', 'settings', 'activations'])) {
                continue;
            }
            DB::table($name)->truncate();
        }

        $this->info('Truncate tables successfully!');
    }
}
