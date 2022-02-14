<?php

namespace App\Http\Controllers;
use App\State;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\StateService;

class StateController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the states microservice
     * @var StateService
     */
    public $stateService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

        /**
     * Return the list of states
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->stateService->obtainStates());
    }

        /**
         * Create one new state
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->stateService->createStates($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one state
     * @return Illuminate\Http\Response
     */
    public function show($state)
    {
        return $this->successResponse($this->stateService->obtainState($state));
        
    }

    /**
     * Update an existing state
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $state)
    {
        return $this->successResponse($this->stateService->editState($request->all(), $state));
        
    }

    /**
     * Remove an existing state
     * @return Illuminate\Http\Response
     */
    public function destroy($state)
    {
        return $this->successResponse($this->stateService->deleteState($state));
    }

    //
}
