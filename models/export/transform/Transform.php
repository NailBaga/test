<?php

namespace app\models\export\transform;

interface Transform
{
    public function getTransformData(array $data): array;

}
