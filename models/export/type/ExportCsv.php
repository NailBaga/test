<?php

namespace app\models\export\type;

use PhpOffice\PhpSpreadsheet\Writer\Csv;


class ExportCsv extends Export
{
    public function getBaseWriter(): string
    {
        return Csv::class;
    }
}
