<?php

namespace app\models\export\type;


class ExportFactory
{
    public static function create(string $type): Export
    {
        switch ($type) {
            case ExportType::CSV:
                return new ExportCsv();
            case ExportType::PDF:
                return new ExportPdf();
            case ExportType::XLSX:
                return new ExportXlsx();
            default:
                throw new \Exception('Не реализовано');
        }
    }
}
