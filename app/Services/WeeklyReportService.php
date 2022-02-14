<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class WeeklyReportService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Weekly_report service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Weekly_report service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Weekly_reports from the Weekly_report service
     * @return string
     */
    public function obtainWeekly_reports()
    {
        return $this->performRequest('GET', '/weekly-reports');
    }

    /**
     * Create one Weekly_report using the Weekly_report service
     * @return string
     */
    public function createWeekly_report($data)
    {
        return $this->performRequest('POST', '/weekly-reports', $data);
    }

    /**
     * Obtain one single Weekly_report from the Weekly_report service
     * @return string
     */
    public function obtainWeekly_report($weekly_report)
    {
        return $this->performRequest('GET', "/weekly-reports/{$weekly_report}");
    }

    /**
     * Update an instance of Weekly_report using the Weekly_report service
     * @return string
     */
    public function editWeekly_report($data, $weekly_report)
    {
        return $this->performRequest('PUT', "/weekly-reports/{$weekly_report}", $data);
    }

    /**
     * Remove a single Weekly_report using the Weekly_report service
     * @return string
     */
    public function deleteWeekly_report($weekly_report)
    {
        return $this->performRequest('DELETE', "/weekly-reports/{$weekly_report}");
    }
}