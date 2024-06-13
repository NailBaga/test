<?php

namespace app\events;


use app\models\entities\Sms;
use Yii;

class EventOutgoingSms implements  EventBody
{
    const EVENT_OUTGOING_SMS = 'outgoing_sms';

    public $sms;

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    public function getBody()
    {
        return $this->sms->message ? $this->sms->message : '';
    }

    public function getEventText()
    {
        return Yii::t('app', 'Outgoing message');
    }
}