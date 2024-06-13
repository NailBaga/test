<?php

namespace app\repositories;

use app\dispatchers\EventDispatcher;
use app\models\entities\History;

class HistoryRepository
{
    private $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function save(History $history): void
    {
        if (!$history->save()) {
            throw new \RuntimeException('Saving error.');
        }
        $this->dispatcher->dispatchAll($history->releaseEvents());
    }

}