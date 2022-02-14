<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TagService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Tag service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Tag service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.assets.base_uri');
        $this->secret = config('services.assets.secret');
    }

    /**
     * Obtain the full list of Tags from the Tag service
     * @return string
     */
    public function obtainTags()
    {
        return $this->performRequest('GET', '/tags');
    }

    /**
     * Create one Tag using the Tag service
     * @return string
     */
    public function createTag($data)
    {
        return $this->performRequest('POST', '/tags', $data);
    }

    /**
     * Obtain one single Tag from the Tag service
     * @return string
     */
    public function obtainTag($Tag)
    {
        return $this->performRequest('GET', "/tags/{$Tag}");
    }

    /**
     * Update an instance of Tag using the Tag service
     * @return string
     */
    public function editTag($data, $Tag)
    {
        return $this->performRequest('PUT', "/tags/{$Tag}", $data);
    }

    /**
     * Remove a single Tag using the Asset service
     * @return string
     */
    public function deleteTag($Tag)
    {
        return $this->performRequest('DELETE', "/tags/{$Tag}");
    }
}