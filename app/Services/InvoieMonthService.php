<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class InvoieMonthService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Invoie_month service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Invoie_month service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Invoie_months from the Invoie_month service
     * @return string
     */
    public function obtainInvoie_months()
    {
        return $this->performRequest('GET', '/invoie-months');
    }

    /**
     * Create one Invoie_month using the Invoie_month service
     * @return string
     */
    public function createInvoie_month($data)
    {
        return $this->performRequest('POST', '/invoie-months', $data);
    }

    /**
     * Obtain one single Invoie_month from the Invoie_month service
     * @return string
     */
    public function obtainInvoie_month($invoie_month)
    {
        return $this->performRequest('GET', "/invoie-months/{$invoie_month}");
    }

    /**
     * Update an instance of Invoie_month using the Invoie_month service
     * @return string
     */
    public function editInvoie_month($data, $invoie_month)
    {
        return $this->performRequest('PUT', "/invoie-months/{$invoie_month}", $data);
    }

    /**
     * Remove a single Invoie_month using the Invoie_month service
     * @return string
     */
    public function deleteInvoie_month($invoie_month)
    {
        return $this->performRequest('DELETE', "/invoie-months/{$invoie_month}");
    }
}