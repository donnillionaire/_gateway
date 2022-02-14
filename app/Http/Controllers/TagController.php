<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\TagService;

class TagController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the tags microservice
     * @var TagService
     */
    public $tagService;

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

        /**
     * Return the list of tags
     * @return Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse($this->tagService->obtainTags($request->all()));
    }

        /**
         * Create one new tag
         * @return Illuminate\Http\Response
         */
    public function store(Request $request)
    {
        
        return $this->successResponse($this->tagService->createTags($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Obtains and show one tag
     * @return Illuminate\Http\Response
     */
    public function show($tag)
    {
        return $this->successResponse($this->tagService->obtainTag($tag));
        
    }

    /**
     * Update an existing tag
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $tag)
    {
        return $this->successResponse($this->tagService->editTag($request->all(), $tag));
        
    }

    /**
     * Remove an existing tag
     * @return Illuminate\Http\Response
     */
    public function destroy($tag)
    {
        return $this->successResponse($this->tagService->deleteTag($tag));
    }

    //
}
