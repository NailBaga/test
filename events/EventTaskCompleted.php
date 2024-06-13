<?php

namespace app\events;

use app\models\Task;
use Yii;

class EventTaskCompleted implements EventBody
{
    const EVENT_COMPLETED_TASK = 'completed_task';

    public $task;

    public function __construct(?Task $task)
    {
        $this->task = $task;
    }

    public function getBody()
    {
        return $this->getEventText() . ':'. ($this->task->title ?? '');
    }

    public function getEventText()
    {
        return Yii::t('app', 'Task completed_task');
    }
}