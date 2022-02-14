<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ClientInvoiceService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Client_invoice service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Client_invoice service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Client_invoices from the Client_invoice service
     * @return string
     */
    public function obtainClient_invoices()
    {
        return $this->performRequest('GET', '/client-invoices');
    }

    /**
     * Create one Client_invoice using the Client_invoice service
     * @return string
     */
    public function createClient_invoice($data)
    {
        return $this->performRequest('POST', '/client-invoices', $data);
    }

    /**
     * Obtain one single Client_invoice from the Client_invoice service
     * @return string
     */
    public function obtainClient_invoice($client_invoice)
    {
        return $this->performRequest('GET', "/client-invoices/{$client_invoice}");
    }

    /**
     * Update an instance of Client_invoice using the Client_invoice service
     * @return string
     */
    public function editClient_invoice($data, $client_invoice)
    {
        return $this->performRequest('PUT', "/client-invoices/{$client_invoice}", $data);
    }

    /**
     * Remove a single Client_invoice using the Client_invoice service
     * @return string
     */
    public function deleteClient_invoice($client_invoice)
    {
        return $this->performRequest('DELETE', "/client-invoices/{$client_invoice}");
    }
}