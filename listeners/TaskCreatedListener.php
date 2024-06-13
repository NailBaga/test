<?php

namespace app\listeners;

use app\events\EventTaskCreated;
use app\models\entities\History;
use app\models\entities\Task;
use app\repositories\HistoryRepository;

class TaskCreatedListener
{
    private $task;
    private $historyRepository;

    public function __construct(Task $task, HistoryRepository $historyRepository)
    {

        $this->task = $task;
        $this->historyRepository = $historyRepository;
    }

    public function handle(EventTaskCreated $event): void
    {
        $history = History::create(
            (new \DateTimeImmutable())->format('Y-m-d H:i:s'),
            $this->task->customer,
            $this->task->user,
            'Task'
        );
        $this->historyRepository->save($history);
    }


}