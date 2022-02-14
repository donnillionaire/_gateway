<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class MemberSearchLogService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the Member_search_log service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the Member_search_log service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        
        $this->baseUri = config('services.citations.base_uri');
        $this->secret = config('services.citations.secret');
    }
    

    /**
     * Obtain the full list of Member_search_logs from the Member_search_log service
     * @return string
     */
    public function obtainMember_search_logs()
    {
        return $this->performRequest('GET', '/member_search_log');
    }

    /**
     * Create one Member_search_log using the Member_search_log service
     * @return string
     */
    public function createMember_search_log($data)
    {
        return $this->performRequest('POST', '/member_search_log', $data);
    }

    /**
     * Obtain one single Member_search_log from the Member_search_log service
     * @return string
     */
    public function obtainMember_search_log($member_search_log)
    {
        return $this->performRequest('GET', "/member_search_log/{$member_search_log}");
    }

    /**
     * Update an instance of Member_search_log using the Member_search_log service
     * @return string
     */
    public function editMember_search_log($data, $member_search_log)
    {
        return $this->performRequest('PUT', "/member_search_log/{$member_search_log}", $data);
    }

    /**
     * Remove a single Member_search_log using the Member_search_log service
     * @return string
     */
    public function deleteMember_search_log($member_search_log)
    {
        return $this->performRequest('DELETE', "/member_search_log/{$member_search_log}");
    }
}