<?php

namespace App\Http\Controllers;
use App\Excel_dump;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ExcelDumpService;

class ExcelDumpController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Excel_dumpService
     */
    public $Excel_dumpService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ExcelDumpService $excel_dumpService)
    {
        $this->Excel_dumpService = $excel_dumpService;
    }

        /**
     * Return the list of Excel_dumps
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Excel_dumpService->obtainExcel_dumps());
    }

        /**
         * Create one new Excel_dump
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Excel_dumpService->createExcel_dump($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Excel_dump
     * @return Illuminate\Http\Response
     */
    public function show($excel_dump)
    {
        return $this->successResponse($this->Excel_dumpService->obtainExcel_dump($excel_dump));
        
    }

    /**
     * Update an existing Excel_dump
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $excel_dump)
    {
        return $this->successResponse($this->Excel_dumpService->editExcel_dump($request->all(), $excel_dump));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($excel_dump)
    {
        return $this->successResponse($this->Excel_dumpService->deleteExcel_dump($excel_dump));
    }

    //
}
