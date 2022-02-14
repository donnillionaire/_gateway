<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AccountBalanceService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Account_balance service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Account_balance service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }

    /**
     * Obtain the full list of Account_balances from the Account_balance service
     * @return string
     */
    public function obtainAccount_balances()
    {
        return $this->performRequest('GET', '/accounts-balances');
    }

    /**
     * Create one Account_balance using the Account_balance service
     * @return string
     */
    public function createAccount_balance($data)
    {
        return $this->performRequest('POST', '/accounts-balances', $data);
    }

    /**
     * Obtain one single Account_balance from the Account_balance service
     * @return string
     */
    public function obtainAccount_balance($account_balance)
    {
        return $this->performRequest('GET', "/accounts-balances/{$account_balance}");
    }

    /**
     * Update an instance of Account_balance using the Account_balance service
     * @return string
     */
    public function editAccount_balance($data, $account_balance)
    {
        return $this->performRequest('PUT', "/accounts-balances/{$account_balance}", $data);
    }

    /**
     * Remove a single Account_balance using the Account_balance service
     * @return string
     */
    public function deleteAccount_balance($account_balance)
    {
        return $this->performRequest('DELETE', "/accounts-balances/{$account_balance}");
    }
}