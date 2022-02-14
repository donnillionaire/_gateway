<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ModuleService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the module service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the module service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of Modules from the module service
     * @return string
     */
    public function obtainModules()
    {
        return $this->performRequest('GET', '/modules');
    }

    /**
     * Create one module using the module service
     * @return string
     */
    public function createModule($data)
    {
        return $this->performRequest('POST', '/modules', $data);
    }

    /**
     * Obtain one single module from the module service
     * @return string
     */
    public function obtainModule($module)
    {
        return $this->performRequest('GET', "/modules/{$module}");
    }

    /**
     * Update an instance of module using the module service
     * @return string
     */
    public function editModule($data, $module)
    {
        return $this->performRequest('PUT', "/modules/{$module}", $data);
    }

    /**
     * Remove a single module using the module service
     * @return string
     */
    public function deleteModule($module)
    {
        return $this->performRequest('DELETE', "/modules/{$module}");
    }
}