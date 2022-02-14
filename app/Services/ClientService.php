<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ClientService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the client service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the client service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of Clients from the client service
     * @return string
     */
    public function obtainClients()
    {
        return $this->performRequest('GET', '/clients');
    }

    /**
     * Create one client using the client service
     * @return string
     */
    public function createClient($data)
    {
        return $this->performRequest('POST', '/clients', $data);
    }

    /**
     * Obtain one single client from the client service
     * @return string
     */
    public function obtainClient($client)
    {
        return $this->performRequest('GET', "/clients/{$client}");
    }

    /**
     * Update an instance of client using the client service
     * @return string
     */
    public function editClient($data, $client)
    {
        return $this->performRequest('PUT', "/clients/{$client}", $data);
    }

    /**
     * Remove a single client using the client service
     * @return string
     */
    public function deleteClient($client)
    {
        return $this->performRequest('DELETE', "/clients/{$client}");
    }
}