<?php

namespace app\events;

use app\models\entities\Customer;
use app\models\entities\History;
use Yii;

class EventCustomerChangeType implements  EventBody
{
    const EVENT_CUSTOMER_CHANGE_TYPE = 'customer_change_type';

    public $history;

    public function __construct(History $history)
    {
        $this->history = $history;
    }

    public function getBody()
    {
        return $this->getEventText() .
            (Customer::getTypeTextByType($this->history->getDetailOldValue('type')) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($this->history->getDetailNewValue('type')) ?? "not set");
    }

    public function getEventText()
    {
        return Yii::t('app', 'Type changed');
    }
}