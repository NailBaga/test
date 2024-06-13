<?php

use app\widgets\HistoryList\HistoryList;

/* @var $this yii\web\View */
/* @var $dataProvider ActiveDataProvider */
/* @var $model HistorySearch */
/* @var $linkExport string */

$this->title = 'Americor Test';
?>

<div class="site-index">
  <?php
  echo $this->render('items/main', [
      'model' => $model,
      'linkExport' => $linkExport,
      'dataProvider' => $dataProvider
  ]);
  ?>

</div>
