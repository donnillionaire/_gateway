<?php

namespace App\Http\Controllers;
use App\DepartmentsGrouping;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\DepartmentsGroupingService;

class DepartmentsGroupingController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the module  microservice
     * @var DepartmentsGroupingService
     */
    public $departmentsGroupingService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DepartmentsGroupingService $departmentsGroupingService)
    {
        $this->departmentsGroupingService = $departmentsGroupingService;
    }

        /**
     * Return the list of category
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->departmentsGroupingService->obtainDepartmentsGroupings());
    }

        /**
         * Create one new groups
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->departmentsGroupingService->createDepartmentsGrouping($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one groups
     * @return Illuminate\Http\Response
     */
    public function show($dept_group)
    {
        return $this->successResponse($this->departmentsGroupingService->obtainDepartmentsGrouping($dept_group));
    }

    /**
     * Update an existing groups
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $dept_group)
    {
        return $this->successResponse($this->departmentsGroupingService->editDepartmentsGrouping($request->all(), $dept_group));
    }

    /**
     * Remove an existing groups
     * @return Illuminate\Http\Response
     */
    public function destroy($dept_group)
    {
        return $this->successResponse($this->departmentsGroupingService->deleteDepartmentsGrouping($dept_group));
    }

    //
}
