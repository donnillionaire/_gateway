<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class DepartmentsGroupingService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the departments grouping service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the departments grouping service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of departments groupings from the departments grouping service
     * @return string
     */
    public function obtainDepartmentsGroupings()
    {
        return $this->performRequest('GET', '/departments-groupings');
    }

    /**
     * Create one departments grouping using the departments grouping service
     * @return string
     */
    public function createDepartmentsGrouping($data)
    {
        return $this->performRequest('POST', '/departments-groupings', $data);
    }

    /**
     * Obtain one single departments grouping from the departments grouping service
     * @return string
     */
    public function obtainDepartmentsGrouping($group)
    {
        return $this->performRequest('GET', "/departments-groupings/{$group}");
    }

    /**
     * Update an instance of departments grouping using the departments grouping service
     * @return string
     */
    public function editDepartmentsGrouping($data, $group)
    {
        return $this->performRequest('PUT', "/departments-groupings/{$group}", $data);
    }

    /**
     * Remove a single departments grouping using the departments grouping service
     * @return string
     */
    public function deleteDepartmentsGrouping($group)
    {
        return $this->performRequest('DELETE', "/departments-groupings/{$group}");
    }
}