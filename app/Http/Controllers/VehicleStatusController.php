<?php

namespace App\Http\Controllers;
use App\VehicleStatus;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\StateService;

class VehicleStatusController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the states microservice
     * @var VehicleStatusService
     */
    public $vehicleStatusService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VehicleStatusService $vehicleStatusService)
    {
        $this->vehicleStatusService = $vehicleStatusService;
    }

        /**
     * Return the list of states
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->vehicleStatusService->obtainStates());
    }

        /**
         * Create one new status
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->vehicleStatusService->createStates($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one status
     * @return Illuminate\Http\Response
     */
    public function show($status)
    {
        return $this->successResponse($this->vehicleStatusService->obtainState($status));
        
    }

    /**
     * Update an existing status
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $status)
    {
        return $this->successResponse($this->vehicleStatusService->editState($request->all(), $status));
        
    }

    /**
     * Remove an existing status
     * @return Illuminate\Http\Response
     */
    public function destroy($status)
    {
        return $this->successResponse($this->vehicleStatusService->deleteState($status));
    }

    //
}
