<?php

namespace app\models\export\type;

use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;


class ExportPdf extends Export
{
    public function getBaseWriter(): string
    {
       return Mpdf::class;
    }
}
