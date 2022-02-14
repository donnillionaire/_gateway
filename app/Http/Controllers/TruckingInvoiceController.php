<?php

namespace App\Http\Controllers;
use App\Trucking_invoice;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TruckingInvoiceService;

class TruckingInvoiceController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var Trucking_invoiceService
     */
    public $Trucking_invoiceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Trucking_invoiceService $trucking_invoiceService)
    {
        $this->Trucking_invoiceService = $trucking_invoiceService;
    }

        /**
     * Return the list of Trucking_invoices
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->Trucking_invoiceService->obtainTrucking_invoices());
    }

        /**
         * Create one new Trucking_invoice
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->Trucking_invoiceService->createTrucking_invoice($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Trucking_invoice
     * @return Illuminate\Http\Response
     */
    public function show($trucking_invoice)
    {
        return $this->successResponse($this->Trucking_invoiceService->obtainTrucking_invoice($trucking_invoice));
        
    }

    /**
     * Update an existing Trucking_invoice
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $trucking_invoice)
    {
        return $this->successResponse($this->Trucking_invoiceService->editTrucking_invoice($request->all(), $trucking_invoice));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($trucking_invoice)
    {
        return $this->successResponse($this->Trucking_invoiceService->deleteTrucking_invoice($trucking_invoice));
    }

    //
}
