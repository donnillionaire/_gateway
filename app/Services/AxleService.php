<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AxleService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Axle service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Axle service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of Axles from the Axle service
     * @return string
     */
    public function obtainAxles()
    {
        return $this->performRequest('GET', '/axles');
    }

    /**
     * Create one Axle using the Axle service
     * @return string
     */
    public function createAxle($data)
    {
        return $this->performRequest('POST', '/axles', $data);
    }

    /**
     * Obtain one single Axle from the Axle service
     * @return string
     */
    public function obtainAxle($Axle)
    {
        return $this->performRequest('GET', "/axles/{$Axle}");
    }

    /**
     * Update an instance of Axle using the Axle service
     * @return string
     */
    public function editAxle($data, $Axle)
    {
        return $this->performRequest('PUT', "/axles/{$Axle}", $data);
    }

    /**
     * Remove a single Axle using the Axle service
     * @return string
     */
    public function deleteAxle($Axle)
    {
        return $this->performRequest('DELETE', "/axles/{$Axle}");
    }
}