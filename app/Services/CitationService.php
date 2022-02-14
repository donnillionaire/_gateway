<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CitationService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Citation service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Citation service
     * @var string
     */
    public $secret;

    public function __construct()
    {
       
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }

    /**
     * Obtain the full list of Citation from the Citation service
     * @return string
     */
    public function obtainCitations()
    {
        return $this->performRequest('GET', '/citations');
    }

    /**
     * Create one Citation using the Citation service
     * @return string
     */
    public function createCitation($data)
    {
        return $this->performRequest('POST', '/citations', $data);
    }

    /**
     * Obtain one single Citation from the Citation service
     * @return string
     */
    public function obtainCitation($Citation)
    {
        return $this->performRequest('GET', "/citations/{$Citation}");
    }

    /**
     * Update an instance of Citation using the Citation service
     * @return string
     */
    public function editCitation($data, $Citation)
    {
        return $this->performRequest('PUT', "/citations/{$Citation}", $data);
    }

    /**
     * Remove a single Citation using the Citation service
     * @return string
     */
    public function deleteCitation($Citation)
    {
        return $this->performRequest('DELETE', "/citations/{$Citation}");
    }
}