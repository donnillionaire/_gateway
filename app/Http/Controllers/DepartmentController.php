<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DepartmentService;
use App\Services\ClientService;

class DepartmentController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the department microservice
     * @var DepartmentController
     */
    public $departmentService;
    /**
     * The service to consume the clients microservice
     * @var ClientService
     */
    public $clientService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentService $departmentService, ClientService $clientService)
    {
        $this->departmentService = $departmentService;
        $this->clientService = $clientService;
    }

        /**
     * Return the list of category
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->departmentService->obtainDepartments($request->all()));
    }

        /**
         * Create one new department
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        //check if client exist
        $this->clientService->obtainClient($request->client_id);
        
        return $this->successResponse($this->departmentService->createDepartment($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one department
     * @return Illuminate\Http\Response
     */
    public function show($dept)
    {
        return $this->successResponse($this->departmentService->obtainDepartment($dept));
    }

    /**
     * Update an existing department
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $dept)
    {
        return $this->successResponse($this->departmentService->editDepartment($request->all(), $dept));
    }

    /**
     * Remove an existing department
     * @return Illuminate\Http\Response
     */
    public function destroy($dept)
    {
        return $this->successResponse($this->departmentService->deleteDepartment($dept));
    }

    //
}
