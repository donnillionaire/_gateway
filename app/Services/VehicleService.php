<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class VehicleService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Vehicle service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Vehicle service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of Vehicles from the Vehicle service
     * @return string
     */
    public function obtainVehicles()
    {
        return $this->performRequest('GET', '/vehicles');
    }

    /**
     * Create one Vehicle using the Vehicle service
     * @return string
     */
    public function createVehicle($data)
    {
        return $this->performRequest('POST', '/vehicles', $data);
    }

    /**
     * Obtain one single Vehicle from the Vehicle service
     * @return string
     */
    public function obtainVehicle($vehicle)
    {
        return $this->performRequest('GET', "/vehicles/{$vehicle}");
    }

    /**
     * Update an instance of Vehicle using the Vehicle service
     * @return string
     */
    public function editVehicle($data, $vehicle)
    {
        return $this->performRequest('PUT', "/vehicles/{$vehicle}", $data);
    }

    /**
     * Remove a single Vehicle using the Vehicle service
     * @return string
     */
    public function deleteVehicle($vehicle)
    {
        return $this->performRequest('DELETE', "/vehicles/{$vehicle}");
    }
}