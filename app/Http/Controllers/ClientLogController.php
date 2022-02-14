<?php

namespace App\Http\Controllers;
use App\ClientLog;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClientLogService;

class ClientLogController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clientLogs microservice
     * @var ClientLogService
     */
    public $clientLogService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientLogService $clientLogService)
    {
        $this->clientLogService = $clientLogService;
    }

        /**
     * Return the list of logs
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->clientLogService->obtainClientLogs());
    }

        /**
         * Create one new client log
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->clientLogService->createClientLog($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one client log
     * @return Illuminate\Http\Response
     */
    public function show($client_log)
    {
        return $this->successResponse($this->clientLogService->obtainClientLog($client_log));
        
    }

    /**
     * Update an existing client log
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $client_log)
    {
        return $this->successResponse($this->clientLogService->editClientLog($request->all(), $client_log));
        
    }

    /**
     * Remove an existing client log
     * @return Illuminate\Http\Response
     */
    public function destroy($client_log)
    {
        return $this->successResponse($this->clientLogService->deleteClientLog($client_log));
    }

    //
}
