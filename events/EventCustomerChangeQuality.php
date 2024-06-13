<?php

namespace app\events;

use app\models\Customer;
use app\models\History;
use Yii;

class EventCustomerChangeQuality implements  EventBody
{
    const EVENT_CUSTOMER_CHANGE_QUALITY = 'customer_change_quality';

    public $history;

    public function __construct(History $history)
    {
        $this->history = $history;
    }

    public function getBody()
    {
        return $this->getEventText() .
            (Customer::getQualityTextByQuality($this->history->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($this->history->getDetailNewValue('quality')) ?? "not set");
    }

        public function getEventText()
    {
        return Yii::t('app', 'Property changed');
    }
}