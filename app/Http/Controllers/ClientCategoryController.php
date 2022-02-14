<?php

namespace App\Http\Controllers;
use App\ClientCategory;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\ClientCategoryService;

class ClientCategoryController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the clients microservice
     * @var ClientCategoryService
     */
    public $clientCategoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientCategoryService $clientCategoryService)
    {
        $this->clientCategoryService = $clientCategoryService;
    }

        /**
     * Return the list of categories
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->clientCategoryService->obtainCategories());
    }

        /**
         * Create one new category
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        return $this->successResponse($this->clientCategoryService->createCategory($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one category
     * @return Illuminate\Http\Response
     */
    public function show($category)
    {
        return $this->successResponse($this->clientCategoryService->obtainCategory($category));
        
    }

    /**
     * Update an existing category
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        return $this->successResponse($this->clientCategoryService->editCategory($request->all(), $category));
        
    }

    /**
     * Remove an existing client
     * @return Illuminate\Http\Response
     */
    public function destroy($category)
    {
        return $this->successResponse($this->clientCategoryService->deleteCategory($category));
    }

    //
}
