<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ExcelDumpService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Excel_dump service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Excel_dump service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Excel_dumps from the Excel_dump service
     * @return string
     */
    public function obtainExcel_dumps()
    {
        return $this->performRequest('GET', '/excel-dumps');
    }

    /**
     * Create one Excel_dump using the Excel_dump service
     * @return string
     */
    public function createExcel_dump($data)
    {
        return $this->performRequest('POST', '/excel-dumps', $data);
    }

    /**
     * Obtain one single Excel_dump from the Excel_dump service
     * @return string
     */
    public function obtainExcel_dump($excel_dump)
    {
        return $this->performRequest('GET', "/excel-dumps/{$excel_dump}");
    }

    /**
     * Update an instance of Excel_dump using the Excel_dump service
     * @return string
     */
    public function editExcel_dump($data, $excel_dump)
    {
        return $this->performRequest('PUT', "/excel-dumps/{$excel_dump}", $data);
    }

    /**
     * Remove a single Excel_dump using the Excel_dump service
     * @return string
     */
    public function deleteExcel_dump($excel_dump)
    {
        return $this->performRequest('DELETE', "/excel-dumps/{$excel_dump}");
    }
}