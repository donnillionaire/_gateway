<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ReportTypeService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Report_type service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Report_type service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Report_types from the Report_type service
     * @return string
     */
    public function obtainReport_types()
    {
        return $this->performRequest('GET', '/report_type');
    }

    /**
     * Create one Report_type using the Report_type service
     * @return string
     */
    public function createReport_type($data)
    {
        return $this->performRequest('POST', '/report_type', $data);
    }

    /**
     * Obtain one single Report_type from the Report_type service
     * @return string
     */
    public function obtainReport_type($report_type)
    {
        return $this->performRequest('GET', "/report_type/{$report_type}");
    }

    /**
     * Update an instance of Report_type using the Report_type service
     * @return string
     */
    public function editReport_type($data, $report_type)
    {
        return $this->performRequest('PUT', "/report_type/{$report_type}", $data);
    }

    /**
     * Remove a single Report_type using the Report_type service
     * @return string
     */
    public function deleteReport_type($report_type)
    {
        return $this->performRequest('DELETE', "/report_type/{$report_type}");
    }
}