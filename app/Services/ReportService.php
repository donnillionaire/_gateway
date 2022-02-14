<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ReportService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Trucking_invoice service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Trucking_invoice service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Trucking_invoices from the Trucking_invoice service
     * @return string
     */
    public function obtainTrucking_invoices()
    {
        return $this->performRequest('GET', '/report-invoices');
    }

    /**
     * Create one Trucking_invoice using the Trucking_invoice service
     * @return string
     */
    public function createTrucking_invoice($data)
    {
        return $this->performRequest('POST', '/report-invoices', $data);
    }

    /**
     * Obtain one single Trucking_invoice from the Trucking_invoice service
     * @return string
     */
    public function obtainTrucking_invoice($trucking_invoice)
    {
        return $this->performRequest('GET', "/report-invoices/{$trucking_invoice}");
    }

    /**
     * Update an instance of Trucking_invoice using the Trucking_invoice service
     * @return string
     */
    public function editTrucking_invoice($data, $trucking_invoice)
    {
        return $this->performRequest('PUT', "/report-invoices/{$trucking_invoice}", $data);
    }

    /**
     * Remove a single Trucking_invoice using the Trucking_invoice service
     * @return string
     */
    public function deleteTrucking_invoice($trucking_invoice)
    {
        return $this->performRequest('DELETE', "/report-invoices/{$trucking_invoice}");
    }
}