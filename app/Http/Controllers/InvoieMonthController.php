<?php

namespace App\Http\Controllers;
use App\Invoie_month;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\InvoieMonthService;

class InvoieMonthController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Invoie_monthService
     */
    public $Invoie_monthService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(InvoieMonthService $invoie_monthService)
    {
        $this->Invoie_monthService = $invoie_monthService;
    }

        /**
     * Return the list of Invoie_months
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Invoie_monthService->obtainInvoie_months());
    }

        /**
         * Create one new Invoie_month
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Invoie_monthService->createInvoie_month($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Invoie_month
     * @return Illuminate\Http\Response
     */
    public function show($invoie_month)
    {
        return $this->successResponse($this->Invoie_monthService->obtainInvoie_month($invoie_month));
        
    }

    /**
     * Update an existing Invoie_month
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $invoie_month)
    {
        return $this->successResponse($this->Invoie_monthService->editInvoie_month($request->all(), $invoie_month));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($invoie_month)
    {
        return $this->successResponse($this->Invoie_monthService->deleteInvoie_month($invoie_month));
    }

    //
}
