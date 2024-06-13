<?php

namespace app\models\export;

use app\models\export\type\Export;
use app\models\export\transform\Transform;


class DownloadService
{
    private $export;
    private $transform;

    public function __construct(Export $export, Transform $transform)
    {
        $this->export = $export;
        $this->transform = $transform;
    }

    public function write(array $data): void
    {
        $data = $this->transform->getTransformData($data);
        $this->export->write($data);
    }

    public function getOutputFilePath()
    {
        return $this->export->getOutputFilePath();
    }
}
