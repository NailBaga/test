<?php

namespace app\controllers;

use app\models\export\DownloadService;
use app\models\export\type\ExportFactory;
use app\models\export\type\ExportType;
use app\models\export\transform\TransformExportHistory;
use app\models\search\HistorySearch;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new HistorySearch();

        return $this->render('index', [
            'model' => $model,
            'linkExport' => Url::to(array_merge(['site/export'], ['exportType' => ExportType::CSV], Yii::$app->getRequest()->getQueryParams())),
            'dataProvider' => $model->search(Yii::$app->request->queryParams)
        ]);
    }

    public function actionExport(string $exportType)
    {
        $model = new HistorySearch();
        $activeDataProvider = $model->search(Yii::$app->request->queryParams);
        $downloadService = new DownloadService(
            ExportFactory::create($exportType),
            new TransformExportHistory()
        );
        $downloadService->write($activeDataProvider->query->all());
        return Yii::$app->getResponse()->sendFile($downloadService->getOutputFilePath(), "history.{$exportType}");
    }
}
