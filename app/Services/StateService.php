<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class StateService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the State service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the State service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of States from the State service
     * @return string
     */
    public function obtainStates()
    {
        return $this->performRequest('GET', '/states');
    }

    /**
     * Create one State using the State service
     * @return string
     */
    public function createState($data)
    {
        return $this->performRequest('POST', '/states', $data);
    }

    /**
     * Obtain one single State from the State service
     * @return string
     */
    public function obtainState($State)
    {
        return $this->performRequest('GET', "/states/{$State}");
    }

    /**
     * Update an instance of State using the State service
     * @return string
     */
    public function editState($data, $State)
    {
        return $this->performRequest('PUT', "/states/{$State}", $data);
    }

    /**
     * Remove a single State using the Asset service
     * @return string
     */
    public function deleteState($State)
    {
        return $this->performRequest('DELETE', "/states/{$State}");
    }
}