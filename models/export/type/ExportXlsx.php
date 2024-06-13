<?php

namespace app\models\export\type;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExportXlsx extends Export
{
    public function getBaseWriter(): string
    {
       return Xlsx::class;
    }
}
