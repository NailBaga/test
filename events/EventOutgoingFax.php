<?php

namespace app\events;


use app\models\Fax;
use Yii;

class EventOutgoingFax implements  EventBody
{
    const EVENT_OUTGOING_FAX = 'outgoing_fax';

    public $fax;

    public function __construct(Fax $fax)
    {
        $this->fax = $fax;
    }

    public function getBody()
    {
        return $this->getEventText() ;
    }

    public function getEventText()
    {
        return Yii::t('app', 'outgoing fax');
    }
}