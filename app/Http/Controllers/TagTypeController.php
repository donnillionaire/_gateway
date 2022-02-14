<?php

namespace App\Http\Controllers;
use App\TagType;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TagTypeService;

class TagTypeController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the tag Types microservice
     * @var TagTypeService
     */
    public $tagService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TagTypeService $tagService)
    {
        $this->tagTypeService = $tagService;
    }

        /**
     * Return the list of tag Types
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->tagTypeService->obtainTagTypes());
    }

        /**
         * Create one new tag type
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->tagTypeService->createTagTypes($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one tag type
     * @return Illuminate\Http\Response
     */
    public function show($tag)
    {
        return $this->successResponse($this->tagTypeService->obtainTagType($tag));
        
    }

    /**
     * Update an existing tag type
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        return $this->successResponse($this->tagTypeService->editTagType($request->all(), $tag));
        
    }

    /**
     * Remove an existing tag type
     * @return Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        return $this->successResponse($this->tagTypeService->deleteTagType($tag));
    }

    //
}
