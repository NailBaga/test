<?php

namespace app\events;

use app\models\entities\Task;
use Yii;

class EventTaskCreated implements EventBody
{
    const EVENT_CREATED_TASK = 'created_task';

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
        return Yii::t('app', 'Task created');
    }
}