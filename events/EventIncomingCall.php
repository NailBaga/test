<?php

namespace app\events;

use app\models\Call;
use Yii;

class EventIncomingCall implements  EventBody
{
    const EVENT_INCOMING_CALL = 'incoming_call';

    public $call;

    public function __construct(?Call $call)
    {
        $this->call = $call;
    }

    public function getBody()
    {
        return ($this->call ? $this->call->totalStatusText . ($this->call->getTotalDisposition(false) ? " <span class='text-grey'>" . $this->call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');

    }

    public function getEventText()
    {
        return Yii::t('app', 'incoming call');
    }
}