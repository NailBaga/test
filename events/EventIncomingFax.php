<?php

namespace app\events;


use app\models\entities\Fax;
use Yii;

class EventIncomingFax implements  EventBody
{
    const EVENT_INCOMING_FAX = 'incoming_fax';

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
        return Yii::t('app', 'incoming fax');
    }
}