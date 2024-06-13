<?php

use app\models\search\HistorySearch;

/** @var $model HistorySearch */

$view = '_item_common';
if (preg_match('/^[^_]*_(.*)/', $model->event, $math)) {
    if (isset($math[1])) {
        $view = '_item_' . $math[1];
    }
}
echo $this->render($view, ['model' => $model]);
