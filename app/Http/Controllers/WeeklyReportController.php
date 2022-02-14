<?php

namespace App\Http\Controllers;
use App\Weekly_report;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\WeeklyReportService;

class WeeklyReportController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Weekly_reportService
     */
    public $Weekly_reportService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Weekly_reportService $weekly_reportService)
    {
        $this->Weekly_reportService = $weekly_reportService;
    }

        /**
     * Return the list of Weekly_reports
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Weekly_reportService->obtainWeekly_reports());
    }

        /**
         * Create one new Weekly_report
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Weekly_reportService->createWeekly_report($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Weekly_report
     * @return Illuminate\Http\Response
     */
    public function show($weekly_report)
    {
        return $this->successResponse($this->Weekly_reportService->obtainWeekly_report($weekly_report));
        
    }

    /**
     * Update an existing Weekly_report
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $weekly_report)
    {
        return $this->successResponse($this->Weekly_reportService->editWeekly_report($request->all(), $weekly_report));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($weekly_report)
    {
        return $this->successResponse($this->Weekly_reportService->deleteWeekly_report($weekly_report));
    }

    //
}
