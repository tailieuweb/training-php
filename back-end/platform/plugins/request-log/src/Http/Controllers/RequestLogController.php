<?php

namespace Botble\RequestLog\Http\Controllers;

use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Traits\HasDeleteManyItemsTrait;
use Botble\RequestLog\Repositories\Interfaces\RequestLogInterface;
use Botble\RequestLog\Tables\RequestLogTable;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class RequestLogController extends BaseController
{

    use HasDeleteManyItemsTrait;

    /**
     * @var RequestLogInterface
     */
    protected $requestLogRepository;

    /**
     * RequestLogController constructor.
     * @param RequestLogInterface $requestLogRepository
     */
    public function __construct(RequestLogInterface $requestLogRepository)
    {
        $this->requestLogRepository = $requestLogRepository;
    }

    /**
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Throwable
     */
    public function getWidgetRequestErrors(Request $request, BaseHttpResponse $response)
    {
        $limit = (int)$request->input('paginate', 10);
        $requests = $this->requestLogRepository->getModel()->paginate($limit);

        return $response
            ->setData(view('plugins/request-log::widgets.request-errors', compact('requests', 'limit'))->render());
    }

    /**
     * @param RequestLogTable $dataTable
     * @return Factory|View
     * @throws Throwable
     */
    public function index(RequestLogTable $dataTable)
    {
        page_title()->setTitle(trans('plugins/request-log::request-log.name'));

        return $dataTable->renderTable();
    }

    /**
     * @param Request $request
     * @param $id
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $log = $this->requestLogRepository->findOrFail($id);
            $this->requestLogRepository->delete($log);

            event(new DeletedContentEvent(REQUEST_LOG_MODULE_SCREEN_NAME, $request, $log));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $ex) {
            return $response
                ->setError()
                ->setMessage($ex->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        return $this->executeDeleteItems(
            $request,
            $response,
            $this->requestLogRepository,
            REQUEST_LOG_MODULE_SCREEN_NAME
        );
    }

    /**
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function deleteAll(BaseHttpResponse $response)
    {
        $this->requestLogRepository->getModel()->truncate();

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
