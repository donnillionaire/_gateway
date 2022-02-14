<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ClientLogService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the client logs service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the client logs service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of Client Logs from the client logs service
     * @return string
     */
    public function obtainClientLogs()
    {
        return $this->performRequest('GET', '/client-logs');
    }

    /**
     * Create one client logs using the client logs service
     * @return string
     */
    public function createClientLog($data)
    {
        return $this->performRequest('POST', '/client-logs', $data);
    }

    /**
     * Obtain one single client logs from the client logs service
     * @return string
     */
    public function obtainClientLog($client_log)
    {
        return $this->performRequest('GET', "/client-logs/{$client_log}");
    }

    /**
     * Update an instance of client logs using the client logs service
     * @return string
     */
    public function editClientLog($data, $client_log)
    {
        return $this->performRequest('PUT', "/client-logs/{$client_log}", $data);
    }

    /**
     * Remove a single client logs using the Asset service
     * @return string
     */
    public function deleteClientLog($client_log)
    {
        return $this->performRequest('DELETE', "/client-logs/{$client_log}");
    }
}