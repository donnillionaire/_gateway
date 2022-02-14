<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LpMatcherService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the lp_matcher service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the lp_matcher service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of lp_matchers from the lp_matcher service
     * @return string
     */
    public function obtainLp_matchers()
    {
        return $this->performRequest('GET', '/lp-matchers');
    }

    /**
     * Create one lp_matcher using the lp_matcher service
     * @return string
     */
    public function createlp_matcher($data)
    {
        return $this->performRequest('POST', '/lp-matchers', $data);
    }

    /**
     * Obtain one single lp_matcher from the lp_matcher service
     * @return string
     */
    public function obtainLp_matcher($lp_matcher)
    {
        return $this->performRequest('GET', "/lp-matchers/{$lp_matcher}");
    }

    /**
     * Update an instance of lp_matcher using the lp_matcher service
     * @return string
     */
    public function editLp_matcher($data, $lp_matcher)
    {
        return $this->performRequest('PUT', "/lp-matchers/{$lp_matcher}", $data);
    }

    /**
     * Remove a single lp_matcher using the lp_matcher service
     * @return string
     */
    public function deleteLp_matcher($lp_matcher)
    {
        return $this->performRequest('DELETE', "/lp-matchers/{$lp_matcher}");
    }
}