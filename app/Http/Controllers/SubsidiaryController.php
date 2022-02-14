<?php

namespace App\Http\Controllers;
use App\Subsidiary;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\SubsidiaryService;

class SubsidiaryController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the subsidiary  microservice
     * @var SubsidiaryService
     */
    public $subsidiaryService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubsidiaryService $subsidiaryService)
    {
        $this->subsidiaryService = $subsidiaryService;
    }

        /**
     * Return the list of subsidiary
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->subsidiaryService->obtainSubsidiaries($request->all()));
    }

        /**
         * Create one new subsidiary
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->subsidiaryService->createSubsidiary($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one subsidiary
     * @return Illuminate\Http\Response
     */
    public function show($subsidiary)
    {
        return $this->successResponse($this->subsidiaryService->obtainSubsidiary($subsidiary));
    }

    /**
     * Update an existing subsidiary
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $subsidiary)
    {
        return $this->successResponse($this->subsidiaryService->editSubsidiary($request->all(), $subsidiary));
    }

    /**
     * Remove an existing subsidiary
     * @return Illuminate\Http\Response
     */
    public function destroy($subsidiary)
    {
        return $this->successResponse($this->subsidiaryService->deleteSubsidiary($subsidiary));
    }

    //
}
