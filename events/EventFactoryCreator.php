<?php

namespace app\events;

use app\models\entities\History;

class EventFactoryCreator
{
    public static function getEvent(History $model)
    {
        switch ($model->event) {
            case EventTaskCreated::EVENT_CREATED_TASK;
                return (new EventTaskCreated($model->task));
            case EventTaskCompleted::EVENT_COMPLETED_TASK:
                return (new EventTaskCompleted($model->task));
            case EventTaskUpdated::EVENT_UPDATED_TASK:
                return (new EventTaskUpdated($model->task));
            case EventIncomingSms::EVENT_INCOMING_SMS:
                return (new EventIncomingSms($model->sms));
            case EventOutgoingSms::EVENT_OUTGOING_SMS:
                return (new EventOutgoingSms($model->sms));
            case EventIncomingCall::EVENT_INCOMING_CALL:
                return (new EventIncomingCall($model->call));
            case EventOutgoingCall::EVENT_OUTGOING_CALL:
                return (new EventOutgoingCall($model->call));
            case EventIncomingFax::EVENT_INCOMING_FAX:
                return (new EventIncomingFax($model->fax));
            case EventOutgoingFax::EVENT_OUTGOING_FAX:
                return (new EventOutgoingFax($model->fax));
            case EventCustomerChangeType::EVENT_CUSTOMER_CHANGE_TYPE:
                return (new EventCustomerChangeType($model));
            case EventCustomerChangeQuality::EVENT_CUSTOMER_CHANGE_QUALITY:
                return (new EventCustomerChangeQuality($model));
        }
    }
}