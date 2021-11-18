<?php

namespace Botble\RequestLog\Commands;

use Botble\RequestLog\Repositories\Interfaces\RequestLogInterface;
use Illuminate\Console\Command;
use Throwable;

class RequestLogClearCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:request-logs:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all request error logs';

    /**
     * @var RequestLogInterface
     */
    protected $requestLogRepository;

    /**
     * RequestLogClearCommand constructor.
     * @param RequestLogInterface $requestLogRepository
     */
    public function __construct(RequestLogInterface $requestLogRepository)
    {
        parent::__construct();
        $this->requestLogRepository = $requestLogRepository;
    }

    /**
     * Execute the console command.
     *
     * @throws Throwable
     */
    public function handle()
    {
        $this->info('Processing...');
        $count = $this->requestLogRepository->count();
        $this->requestLogRepository->getModel()->truncate();
        $this->info('Done. Deleted ' . $count . ' records!');
    }
}
