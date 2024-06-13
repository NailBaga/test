<?php

use app\models\entities\Customer;

/** @var $model \app\models\search\HistorySearch */
echo $this->render('_item_statuses_change', [
    'model' => $model,
    'oldValue' => Customer::getTypeTextByType($model->getDetailOldValue('type')),
    'newValue' => Customer::getTypeTextByType($model->getDetailNewValue('type'))
]);