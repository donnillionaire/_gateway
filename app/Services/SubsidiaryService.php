<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class SubsidiaryService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the subsidiary service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the subsidiary service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of Subsidiaries from the subsidiary service
     * @return string
     */
    public function obtainSubsidiaries()
    {
        return $this->performRequest('GET', '/subsidiaries');
    }

    /**
     * Create one subsidiary using the subsidiary service
     * @return string
     */
    public function createSubsidiary($data)
    {
        return $this->performRequest('POST', '/subsidiaries', $data);
    }

    /**
     * Obtain one single subsidiary from the subsidiary service
     * @return string
     */
    public function obtainSubsidiary($subsidiary)
    {
        return $this->performRequest('GET', "/subsidiaries/{$subsidiary}");
    }

    /**
     * Update an instance of subsidiary using the subsidiary service
     * @return string
     */
    public function editSubsidiary($data, $subsidiary)
    {
        return $this->performRequest('PUT', "/subsidiaries/{$subsidiary}", $data);
    }

    /**
     * Remove a single subsidiary using the subsidiary service
     * @return string
     */
    public function deleteSubsidiary($subsidiary)
    {
        return $this->performRequest('DELETE', "/subsidiaries/{$subsidiary}");
    }
}