<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AccountService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Account service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Account service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Accounts from the Account service
     * @return string
     */
    public function obtainAccounts()
    {
        return $this->performRequest('GET', '/accounts');
    }

    /**
     * Create one Account using the Account service
     * @return string
     */
    public function createAccount($data)
    {
        return $this->performRequest('POST', '/accounts', $data);
    }

    /**
     * Obtain one single Account from the Account service
     * @return string
     */
    public function obtainAccount($account)
    {
        return $this->performRequest('GET', "/accounts/{$account}");
    }

    /**
     * Update an instance of Account using the Account service
     * @return string
     */
    public function editAccount($data, $account)
    {
        return $this->performRequest('PUT', "/accounts/{$account}", $data);
    }

    /**
     * Remove a single Account using the Account service
     * @return string
     */
    public function deleteAccount($account)
    {
        return $this->performRequest('DELETE', "/accounts/{$account}");
    }
}