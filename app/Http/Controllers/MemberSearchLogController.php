<?php

namespace App\Http\Controllers;
use App\Member_search_log;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\MemberSearchLogService;

class MemberSearchLogController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Member_search_logService
     */
    public $Member_search_logService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Member_search_logService $member_search_logService)
    {
        $this->Member_search_logService = $member_search_logService;
    }

        /**
     * Return the list of Member_search_logs
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Member_search_logService->obtainMember_search_logs());
    }

        /**
         * Create one new Member_search_log
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Member_search_logService->createMember_search_log($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Member_search_log
     * @return Illuminate\Http\Response
     */
    public function show($member_search_log)
    {
        return $this->successResponse($this->Member_search_logService->obtainMember_search_log($member_search_log));
        
    }

    /**
     * Update an existing Member_search_log
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $member_search_log)
    {
        return $this->successResponse($this->Member_search_logService->editMember_search_log($request->all(), $member_search_log));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($member_search_log)
    {
        return $this->successResponse($this->Member_search_logService->deleteMember_search_log($member_search_log));
    }

    //
}
