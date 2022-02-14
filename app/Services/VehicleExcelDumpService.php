<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class VehicleExcelDumpService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Vehicle Excel dump service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Vehicle Excel dump service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of VehicleExcelDumps from the Vehicle Excel dump service
     * @return string
     */
    public function obtainVehicleExcelDumps()
    {
        return $this->performRequest('GET', '/vehicle-dumps');
    }

    /**
     * Create one Vehicle Excel dump using the Vehicle Excel dump service
     * @return string
     */
    public function createVehicleExcelDump($data)
    {
        return $this->performRequest('POST', '/vehicle-dumps', $data);
    }

    /**
     * Obtain one single Vehicle Excel dump from the Vehicle Excel dump service
     * @return string
     */
    public function obtainVehicleExcelDump($Dump)
    {
        return $this->performRequest('GET', "/vehicle-dumps/{$Dump}");
    }

    /**
     * Update an instance of Vehicle Excel dump using the Vehicle Excel dump service
     * @return string
     */
    public function editVehicleExcelDump($data, $Dump)
    {
        return $this->performRequest('PUT', "/vehicle-dumps/{$Dump}", $data);
    }

    /**
     * Remove a single Vehicle Excel dump using the Vehicle Excel dump service
     * @return string
     */
    public function deleteVehicleExcelDump($Dump)
    {
        return $this->performRequest('DELETE', "/vehicle-dumps/{$Dump}");
    }
}