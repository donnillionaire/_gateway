<?php

namespace App\Http\Controllers;
use App\Lp_matcher;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\LpMatcherService;

class LpMatcherController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Lp_matcherService
     */
    public $Lp_matcherService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LpMatcherService $lp_matcherService)
    {
        $this->Lp_matcherService = $lp_matcherService;
    }

        /**
     * Return the list of Lp_matchers
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Lp_matcherService->obtainLp_matchers());
    }

        /**
         * Create one new Lp_matcher
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Lp_matcherService->createLp_matcher($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Lp_matcher
     * @return Illuminate\Http\Response
     */
    public function show($lp_matcher)
    {
        return $this->successResponse($this->Lp_matcherService->obtainLp_matcher($lp_matcher));
        
    }

    /**
     * Update an existing Lp_matcher
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $lp_matcher)
    {
        return $this->successResponse($this->Lp_matcherService->editLp_matcher($request->all(), $lp_matcher));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($lp_matcher)
    {
        return $this->successResponse($this->Lp_matcherService->deleteLp_matcher($lp_matcher));
    }

    //
}
