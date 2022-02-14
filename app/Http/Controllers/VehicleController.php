<?php

namespace App\Http\Controllers;
use App\Vehicle;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\VehicleService;

class VehicleController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the Vehicles microservice
     * @var VehicleService
     */
    public $vehicleService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

        /**
     * Return the list of Vehicles
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->vehicleService->obtainVehicles($request->all()));
    }

        /**
         * Create one new Vehicle
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->vehicleService->createVehicles($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Vehicle
     * @return Illuminate\Http\Response
     */
    public function show($vehicle)
    {
        return $this->successResponse($this->vehicleService->obtainVehicle($vehicle));
        
    }

    /**
     * Update an existing Vehicle
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $vehicle)
    {
        return $this->successResponse($this->vehicleService->editVehicle($request->all(), $vehicle));
        
    }

    /**
     * Remove an existing Vehicle
     * @return Illuminate\Http\Response
     */
    public function destroy($vehicle)
    {
        return $this->successResponse($this->vehicleService->deleteVehicle($vehicle));
    }

    //
}
