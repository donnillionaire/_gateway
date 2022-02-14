<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TagTypeService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Tag Type service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Tag Type service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of TagT ypes from the Tag Type service
     * @return string
     */
    public function obtainTagTypes()
    {
        return $this->performRequest('GET', '/tag-types');
    }

    /**
     * Create one Tag Type using the Tag Type service
     * @return string
     */
    public function createTagType($data)
    {
        return $this->performRequest('POST', '/tag-types', $data);
    }

    /**
     * Obtain one single Tag Type from the Tag Type service
     * @return string
     */
    public function obtainTagType($Tag_type)
    {
        return $this->performRequest('GET', "/tag-types/{$Tag_type}");
    }

    /**
     * Update an instance of Tag Type using the Tag Type service
     * @return string
     */
    public function editTagType($data, $Tag_type)
    {
        return $this->performRequest('PUT', "/tag-types/{$Tag_type}", $data);
    }

    /**
     * Remove a single Tag Type using the Asset service
     * @return string
     */
    public function deleteTagType($Tag_type)
    {
        return $this->performRequest('DELETE', "/tag-types/{$Tag_type}");
    }
}