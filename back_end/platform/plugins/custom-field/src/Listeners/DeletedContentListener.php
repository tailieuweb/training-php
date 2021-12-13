<?php

namespace Botble\CustomField\Listeners;

use Botble\Base\Events\DeletedContentEvent;
use CustomField;
use Exception;

class DeletedContentListener
{

    /**
     * Handle the event.
     *
     * @param DeletedContentEvent $event
     * @return void
     */
    public function handle(DeletedContentEvent $event)
    {
        try {
            CustomField::deleteCustomFields($event->data);
        } catch (Exception $exception) {
            info($exception->getMessage());
        }
    }
}
