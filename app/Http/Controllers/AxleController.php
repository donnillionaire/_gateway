<?php

namespace App\Http\Controllers;
use App\Axle;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AxleService;

class AxleController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the axles microservice
     * @var AxleService
     */
    public $axleService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AxleService $axleService)
    {
        $this->axleService = $axleService;
    }

        /**
     * Return the list of axles
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->axleService->obtainAxles());
    }

        /**
         * Create one new axle
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->axleService->createAxles($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one axle
     * @return Illuminate\Http\Response
     */
    public function show($axle)
    {
        return $this->successResponse($this->axleService->obtainAxle($axle));
        
    }

    /**
     * Update an existing axle
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $axle)
    {
        return $this->successResponse($this->axleService->editAxle($request->all(), $axle));
        
    }

    /**
     * Remove an existing axle
     * @return Illuminate\Http\Response
     */
    public function destroy($axle)
    {
        return $this->successResponse($this->axleService->deleteAxle($axle));
    }

    //
}
