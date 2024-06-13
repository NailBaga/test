<?php

namespace app\models\export\type;

use PhpOffice\PhpSpreadsheet\Spreadsheet;


abstract class Export
{
    protected $cellMap = [];
    protected $outputFilePath;
    protected $type;
    protected $data;
    protected $baseWriter;
    protected $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
        $baseWriter = $this->getBaseWriter();
        $this->baseWriter = new $baseWriter($this->spreadsheet);
    }
    /**
     * @return mixed
     */
    public function getOutputFilePath()
    {
        return $this->outputFilePath;
    }

    public function getType()
    {
        return $this->outputFilePath;
    }

    public function write(array $data): void
    {
        $this->cellMap = $data;
        $this->spreadsheet->getActiveSheet()->fromArray($this->cellMap);
        $file = tempnam(sys_get_temp_dir(), 'export');
        $this->outputFilePath = $file;
        $this->baseWriter->save($file);
    }

    abstract public function getBaseWriter(): string;
}
