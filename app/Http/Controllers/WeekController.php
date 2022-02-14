<?php

namespace App\Http\Controllers;
use App\Week;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\WeekService;

class WeekController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var WeekService
     */
    public $WeekService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(WeekService $weekService)
    {
        $this->WeekService = $weekService;
    }

        /**
     * Return the list of Weeks
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->WeekService->obtainWeeks());
    }

        /**
         * Create one new Week
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->WeekService->createWeek($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Week
     * @return Illuminate\Http\Response
     */
    public function show($week)
    {
        return $this->successResponse($this->WeekService->obtainWeek($week));
        
    }

    /**
     * Update an existing Week
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $week)
    {
        return $this->successResponse($this->WeekService->editWeek($request->all(), $week));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($week)
    {
        return $this->successResponse($this->WeekService->deleteWeek($week));
    }

    //
}
