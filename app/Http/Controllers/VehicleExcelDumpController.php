<?php

namespace App\Http\Controllers;
use App\VehicleExcelDump;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\VehicleExcelDumpService;

class VehicleExcelDumpController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the states microservice
     * @var VehicleExcelDumpService
     */
    public $stateService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VehicleExcelDumpService $stateService)
    {
        $this->stateService = $stateService;
    }

        /**
     * Return the list of states
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->stateService->obtainVehicleExcelDumps());
    }

        /**
         * Create one new vehicle excel dump
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->stateService->createVehicleExcelDumps($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one vehicle excel dump
     * @return Illuminate\Http\Response
     */
    public function show($dump)
    {
        return $this->successResponse($this->stateService->obtainVehicleExcelDump($dump));
        
    }

    /**
     * Update an existing vehicle excel dump
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $dump)
    {
        return $this->successResponse($this->stateService->editVehicleExcelDump($request->all(), $dump));
        
    }

    /**
     * Remove an existing vehicle excel dump
     * @return Illuminate\Http\Response
     */
    public function destroy($dump)
    {
        return $this->successResponse($this->stateService->deleteVehicleExcelDump($dump));
    }

    //
}
