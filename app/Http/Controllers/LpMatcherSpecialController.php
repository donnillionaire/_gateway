<?php

namespace App\Http\Controllers;
use App\Lp_matcher_special;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\LpMatcherSpecialService;

class LpMatcherSpecialController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Lp_matcher_specialService
     */
    public $Lp_matcher_specialService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LpMatcherSpecialService $lp_matcher_specialService)
    {
        $this->Lp_matcher_specialService = $lp_matcher_specialService;
    }

        /**
     * Return the list of Lp_matcher_specials
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Lp_matcher_specialService->obtainLp_matcher_specials());
    }

        /**
         * Create one new Lp_matcher_special
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Lp_matcher_specialService->createLp_matcher_special($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Lp_matcher_special
     * @return Illuminate\Http\Response
     */
    public function show($lp_matcher_special)
    {
        return $this->successResponse($this->Lp_matcher_specialService->obtainLp_matcher_special($lp_matcher_special));
        
    }

    /**
     * Update an existing Lp_matcher_special
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $lp_matcher_special)
    {
        return $this->successResponse($this->Lp_matcher_specialService->editLp_matcher_special($request->all(), $lp_matcher_special));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($lp_matcher_special)
    {
        return $this->successResponse($this->Lp_matcher_specialService->deleteLp_matcher_special($lp_matcher_special));
    }

    //
}
