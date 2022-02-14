<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ContactService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the contact service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the contact service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of contacts from the contact service
     * @return string
     */
    public function obtainContacts()
    {
        return $this->performRequest('GET', '/contacts');
    }

    /**
     * Create one contact using the contact service
     * @return string
     */
    public function createContact($data)
    {
        return $this->performRequest('POST', '/contacts', $data);
    }

    /**
     * Obtain one single contact from the contact service
     * @return string
     */
    public function obtainContact($contact)
    {
        return $this->performRequest('GET', "/contacts/{$contact}");
    }

    /**
     * Update an instance of contact using the contact service
     * @return string
     */
    public function editContact($data, $contact)
    {
        return $this->performRequest('PUT', "/contacts/{$contact}", $data);
    }

    /**
     * Remove a single contact using the contact service
     * @return string
     */
    public function deleteContact($contact)
    {
        return $this->performRequest('DELETE', "/contacts/{$contact}");
    }
}