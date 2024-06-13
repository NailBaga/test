<?php

use app\models\search\HistorySearch;

/** @var $model HistorySearch */
echo $this->render('_item_common', [
    'user' => $model->user,
    'body' => \app\events\EventFactoryCreator::getEvent($model)->getEventText()  . ($model->task->title ?? ''),
    'iconClass' => 'fa-check-square bg-yellow',
    'footerDatetime' => $model->ins_ts,
    'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
]);

