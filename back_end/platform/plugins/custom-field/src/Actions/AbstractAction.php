<?php

namespace Botble\CustomField\Actions;

abstract class AbstractAction
{
    /**
     * @param string $message
     * @param array|null $data
     * @return array
     */
    protected function error($message = null, array $data = null): array
    {
        if (!$message) {
            $message = trans('plugins/custom-field::base.error_occurred');
        }
        return response_with_messages($message, true, 500, $data);
    }

    /**
     * @param string $message
     * @param array|null $data
     * @return array
     */
    protected function success($message = null, array $data = null): array
    {
        if (!$message) {
            $message = trans('plugins/custom-field::base.request_completed');
        }
        return response_with_messages(
            $message,
            false,
            !$data ? 200 : 201,
            $data
        );
    }
}
