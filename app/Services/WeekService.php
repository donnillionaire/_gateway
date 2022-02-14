<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class WeekService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Week service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Week service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Weeks from the Week service
     * @return string
     */
    public function obtainWeeks()
    {
        return $this->performRequest('GET', '/weeks');
    }

    /**
     * Create one Week using the Week service
     * @return string
     */
    public function createWeek($data)
    {
        return $this->performRequest('POST', '/weeks', $data);
    }

    /**
     * Obtain one single Week from the Week service
     * @return string
     */
    public function obtainWeek($Week)
    {
        return $this->performRequest('GET', "/weeks/{$Week}");
    }

    /**
     * Update an instance of Week using the Week service
     * @return string
     */
    public function editWeek($data, $Week)
    {
        return $this->performRequest('PUT', "/weeks/{$Week}", $data);
    }

    /**
     * Remove a single Week using the Week service
     * @return string
     */
    public function deleteWeek($Week)
    {
        return $this->performRequest('DELETE', "/weeks/{$Week}");
    }
}