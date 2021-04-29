<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        return response($this->blogService->getBlogs());
    }

    public function show($id)
    {
        try {
            return response($this->blogService->getBlog($id), 200);
        }catch (\Exception $e) {
            return response($e->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        return response($this->blogService->storeBlog($request), 200);
    }

    public function update(Request $request, $id)
    {
        try{
            return response($this->blogService->updateBlog($request, $id), 200);
        }catch (\Exception $e) {
            return response($e->getMessage(), 404);
        }
    }

    public function destroy($id)
    {
        try {
            return response($this->blogService->deleteBlog($id), 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 404);
        }
    }
}
