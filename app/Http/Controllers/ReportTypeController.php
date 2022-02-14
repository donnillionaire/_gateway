<?php

namespace App\Http\Controllers;
use App\Report_type;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ReportTypeService;

class ReportTypeController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Report_typeService
     */
    public $Report_typeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Report_typeService $report_typeService)
    {
        $this->Report_typeService = $report_typeService;
    }

        /**
     * Return the list of Report_types
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Report_typeService->obtainReport_types());
    }

        /**
         * Create one new Report_type
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Report_typeService->createReport_type($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Report_type
     * @return Illuminate\Http\Response
     */
    public function show($report_type)
    {
        return $this->successResponse($this->Report_typeService->obtainReport_type($report_type));
        
    }

    /**
     * Update an existing Report_type
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $report_type)
    {
        return $this->successResponse($this->Report_typeService->editReport_type($request->all(), $report_type));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($report_type)
    {
        return $this->successResponse($this->Report_typeService->deleteReport_type($report_type));
    }

    //
}
