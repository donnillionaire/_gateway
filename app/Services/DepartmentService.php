<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class DepartmentService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the department service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the department service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of departments from the department service
     * @return string
     */
    public function obtainDepartments()
    {
        return $this->performRequest('GET', '/departments');
    }

    /**
     * Create one department using the department service
     * @return string
     */
    public function createDepartment($data)
    {
        return $this->performRequest('POST', '/departments', $data);
    }

    /**
     * Obtain one single department from the department service
     * @return string
     */
    public function obtainDepartment($dept)
    {
        return $this->performRequest('GET', "/departments/{$dept}");
    }

    /**
     * Update an instance of department using the department service
     * @return string
     */
    public function editDepartment($data, $dept)
    {
        return $this->performRequest('PUT', "/departments/{$dept}", $data);
    }

    /**
     * Remove a single department using the department service
     * @return string
     */
    public function deleteDepartment($dept)
    {
        return $this->performRequest('DELETE', "/departments/{$dept}");
    }
}