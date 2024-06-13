<?php

namespace app\events;

use app\models\entities\Task;
use Yii;

class EventTaskUpdated implements  EventBody
{
    const EVENT_UPDATED_TASK = 'updated_task';

    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getBody()
    {
        return $this->getEventText() . ':'. ($this->task->title ?? '');
    }

    public function getEventText()
    {
        return Yii::t('app', 'Task updated');
    }
}