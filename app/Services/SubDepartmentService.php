<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class SubDepartmentService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the sub department service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the sub department service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of sub-departments from the sub department service
     * @return string
     */
    public function obtainSubDepartments()
    {
        return $this->performRequest('GET', '/sub-departments');
    }

    /**
     * Create one sub department using the sub department service
     * @return string
     */
    public function createSubDepartment($data)
    {
        return $this->performRequest('POST', '/sub-departments', $data);
    }

    /**
     * Obtain one single sub department from the sub department service
     * @return string
     */
    public function obtainSubDepartment($sub_dept)
    {
        return $this->performRequest('GET', "/sub-departments/{$sub_dept}");
    }

    /**
     * Update an instance of sub department using the sub department service
     * @return string
     */
    public function editSubDepartment($data, $sub_dept)
    {
        return $this->performRequest('PUT', "/sub-departments/{$sub_dept}", $data);
    }

    /**
     * Remove a single sub department using the sub department service
     * @return string
     */
    public function deleteSubDepartment($sub_dept)
    {
        return $this->performRequest('DELETE', "/sub-departments/{$sub_dept}");
    }
}