<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TransactionService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Dealer_invoice service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Dealer_invoice service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Dealer_invoices from the Dealer_invoice service
     * @return string
     */
    public function obtainDealer_invoices()
    {
        return $this->performRequest('GET', '/transactions');
    }

    /**
     * Create one Dealer_invoice using the Dealer_invoice service
     * @return string
     */
    public function createDealer_invoice($data)
    {
        return $this->performRequest('POST', '/transactions', $data);
    }

    /**
     * Obtain one single Dealer_invoice from the Dealer_invoice service
     * @return string
     */
    public function obtainDealer_invoice($dealer_invoice)
    {
        return $this->performRequest('GET', "/transactions/{$dealer_invoice}");
    }

    /**
     * Update an instance of Dealer_invoice using the Dealer_invoice service
     * @return string
     */
    public function editDealer_invoice($data, $dealer_invoice)
    {
        return $this->performRequest('PUT', "/transactions/{$dealer_invoice}", $data);
    }

    /**
     * Remove a single Dealer_invoice using the Dealer_invoice service
     * @return string
     */
    public function deleteDealer_invoice($dealer_invoice)
    {
        return $this->performRequest('DELETE', "/transactions/{$dealer_invoice}");
    }
}