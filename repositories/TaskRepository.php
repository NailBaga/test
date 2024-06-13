<?php

namespace app\repositories;

use app\dispatchers\EventDispatcher;
use app\models\entities\Task;

class TaskRepository
{
    private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function save(Task $task): void
    {
        if (!$task->save()) {
            throw new \RuntimeException('Saving error.');
        }
        $this->dispatcher->dispatchAll($task->releaseEvents());
    }

    public function remove(Task $task): void
    {
        if (!$task->delete()) {
            throw new \RuntimeException('Removing error.');
        }
        $this->dispatcher->dispatchAll($task->releaseEvents());
    }
}