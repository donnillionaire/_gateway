<?php

namespace App\Http\Controllers;
use App\Module;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ModuleService;

class ModuleController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the module  microservice
     * @var ModuleService
     */
    public $moduleService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ModuleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

        /**
     * Return the list of category
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->moduleService->obtainModules());
    }

        /**
         * Create one new module
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->moduleService->createModule($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one module
     * @return Illuminate\Http\Response
     */
    public function show($module)
    {
        return $this->successResponse($this->moduleService->obtainModule($module));
    }

    /**
     * Update an existing module
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $module)
    {
        return $this->successResponse($this->moduleService->editModule($request->all(), $module));
    }

    /**
     * Remove an existing module
     * @return Illuminate\Http\Response
     */
    public function destroy($module)
    {
        return $this->successResponse($this->moduleService->deleteModule($module));
    }

    //
}
