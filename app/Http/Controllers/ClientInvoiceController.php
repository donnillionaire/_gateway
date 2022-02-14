<?php 

namespace App\Http\Controllers;
use App\Client_invoice;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClientInvoiceService;

class ClientInvoiceController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var ClientInvoiceService
     */
    public $client_invoiceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientInvoiceService $client_invoiceService)
    {
        $this->client_invoiceService = $client_invoiceService;
    }

        /**
     * Return the list of Client_invoices
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->client_invoiceService->obtainClient_invoices());
    }

        /**
         * Create one new Client_invoice
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->client_invoiceService->createClient_invoice($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Client_invoice
     * @return Illuminate\Http\Response
     */
    public function show($client_invoice)
    {
        return $this->successResponse($this->client_invoiceService->obtainClient_invoice($client_invoice));
        
    }

    /**
     * Update an existing Client_invoice
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $client_invoice)
    {
        return $this->successResponse($this->client_invoiceService->editClient_invoice($request->all(), $client_invoice));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($client_invoice)
    {
        return $this->successResponse($this->client_invoiceService->deleteClient_invoice($client_invoice));
    }

    //
}
