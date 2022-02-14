<?php

namespace App\Http\Controllers;
use App\SubDepartment;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SubDepartmentService;
use App\Services\DepartmentService;

class SubDepartmentController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the sub department  microservice
     * @var SubDepartmentService
     */
    public $subDepartmentService;
    /**
     * The service to consume the department microservice
     * @var DepartmentController
     */
    public $departmentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubDepartmentService $subDepartmentService, DepartmentService $departmentService)
    {
        $this->subDepartmentService = $subDepartmentService;
        $this->departmentService = $departmentService;
    }

        /**
     * Return the list of sub dept
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->subDepartmentService->obtainSubDepartments($request->all()));
    }

        /**
         * Create one new sub dept
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        //check if department exist
        $this->departmentService->obtainDepartment($request->dept_id);
        return $this->successResponse($this->subDepartmentService->createSubDepartment($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one sub department
     * @return Illuminate\Http\Response
     */
    public function show($sub_dept)
    {
        return $this->successResponse($this->subDepartmentService->obtainSubDepartment($sub_dept));
    }

    /**
     * Update an existing sub department
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $sub_dept)
    {
        return $this->successResponse($this->subDepartmentService->editSubDepartment($request->all(), $sub_dept));
    }

    /**
     * Remove an existing sub department
     * @return Illuminate\Http\Response
     */
    public function destroy($sub_dept)
    {
        return $this->successResponse($this->subDepartmentService->deleteSubDepartment($sub_dept));
    }

    //
}
