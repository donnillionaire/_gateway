<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class VehicleStatusService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Vehicle Status service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Vehicle Status service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of Vehicle Statuses from the Vehicle Status service
     * @return string
     */
    public function obtainVehicleStatuses()
    {
        return $this->performRequest('GET', '/vehicle-status');
    }

    /**
     * Create one Vehicle Status using the Vehicle Status service
     * @return string
     */
    public function createVehicleStatus($data)
    {
        return $this->performRequest('POST', '/vehicle-status', $data);
    }

    /**
     * Obtain one single Vehicle Status from the Vehicle Status service
     * @return string
     */
    public function obtainVehicleStatus($Status)
    {
        return $this->performRequest('GET', "/vehicle-status/{$Status}");
    }

    /**
     * Update an instance of Vehicle Status using the Vehicle Status service
     * @return string
     */
    public function editVehicleStatus($data, $Status)
    {
        return $this->performRequest('PUT', "/vehicle-status/{$Status}", $data);
    }

    /**
     * Remove a single Vehicle Status using the Vehicle Status service
     * @return string
     */
    public function deleteVehicleStatus($Status)
    {
        return $this->performRequest('DELETE', "/vehicle-status/{$Status}");
    }
}