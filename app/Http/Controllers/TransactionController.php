<?php

namespace App\Http\Controllers;
use App\Dealer_invoice;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var TransactionService
     */
    public $dealer_invoiceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TransactionService $dealer_invoiceService)
    {
        $this->dealer_invoiceService = $dealer_invoiceService;
    }

        /**
     * Return the list of Dealer_invoices
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->dealer_invoiceService->obtainDealer_invoices());
    }

        /**
         * Create one new Dealer_invoice
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->dealer_invoiceService->createDealer_invoice($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Dealer_invoice
     * @return Illuminate\Http\Response
     */
    public function show($dealer_invoice)
    {
        return $this->successResponse($this->dealer_invoiceService->obtainDealer_invoice($dealer_invoice));
        
    }

    /**
     * Update an existing Dealer_invoice
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $dealer_invoice)
    {
        return $this->successResponse($this->dealer_invoiceService->editDealer_invoice($request->all(), $dealer_invoice));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($dealer_invoice)
    {
        return $this->successResponse($this->dealer_invoiceService->deleteDealer_invoice($dealer_invoice));
    }

    //
}
