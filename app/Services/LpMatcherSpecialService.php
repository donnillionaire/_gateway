<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class LpMatcherSpecialService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Lp_matcher_special service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Lp_matcher_special service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Lp_matcher_specials from the Lp_matcher_special service
     * @return string
     */
    public function obtainLp_matcher_specials()
    {
        return $this->performRequest('GET', '/lp-matcher-specials');
    }

    /**
     * Create one Lp_matcher_special using the Lp_matcher_special service
     * @return string
     */
    public function createLp_matcher_special($data)
    {
        return $this->performRequest('POST', '/lp-matcher-specials', $data);
    }

    /**
     * Obtain one single Lp_matcher_special from the Lp_matcher_special service
     * @return string
     */
    public function obtainLp_matcher_special($lp_matcher_special)
    {
        return $this->performRequest('GET', "/lp-matcher-specials/{$lp_matcher_special}");
    }

    /**
     * Update an instance of Lp_matcher_special using the Lp_matcher_special service
     * @return string
     */
    public function editLp_matcher_special($data, $lp_matcher_special)
    {
        return $this->performRequest('PUT', "/lp-matcher-specials/{$lp_matcher_special}", $data);
    }

    /**
     * Remove a single Lp_matcher_special using the Lp_matcher_special service
     * @return string
     */
    public function deleteLp_matcher_special($lp_matcher_special)
    {
        return $this->performRequest('DELETE', "/lp-matcher-specials/{$lp_matcher_special}");
    }
}