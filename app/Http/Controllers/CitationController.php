<?php

namespace App\Http\Controllers;
use App\ClientCitation;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CitationService;

class CitationController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var CitationService
     */
    public $citationService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CitationService $citationService)
    {
        $this->citationService = $citationService;
    }

        /**
     * Return the list of Citations
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->citationService->obtainCitations());
    }

        /**
         * Create one new Citation
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->citationService->createCitation($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one Citation
     * @return Illuminate\Http\Response
     */
    public function show($citation)
    {
        return $this->successResponse($this->citationService->obtainCitation($citation));
        
    }

    /**
     * Update an existing Citation
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $citation)
    {
        return $this->successResponse($this->citationService->editCitation($request->all(), $citation));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($citation)
    {
        return $this->successResponse($this->citationService->deleteCitation($citation));
    }

    //
}
