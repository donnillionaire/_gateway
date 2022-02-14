<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ClientCategoryService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the category service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the category service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.clients.base_uri');
        $this->secret = config('services.clients.secret');
    }

    /**
     * Obtain the full list of categories from the client category service
     * @return string
     */
    public function obtainCategories()
    {
        return $this->performRequest('GET', '/client-category');
    }

    /**
     * Create one category using the Client category service
     * @return string
     */
    public function createCategory($data)
    {
        return $this->performRequest('POST', '/client-category', $data);
    }

    /**
     * Obtain one single category from the client category service
     * @return string
     */
    public function obtainCategory($category)
    {
        return $this->performRequest('GET', "/client-category/{$category}");
    }

    /**
     * Update an instance of category using the client category service
     * @return string
     */
    public function editCategory($data, $category)
    {
        return $this->performRequest('PUT', "/client-category/{$category}", $data);
    }

    /**
     * Remove a single category using the client category service
     * @return string
     */
    public function deleteCategory($category)
    {
        return $this->performRequest('DELETE', "/client-category/{$category}");
    }
}