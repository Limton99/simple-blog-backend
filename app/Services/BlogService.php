<?php


namespace App\Services;



use Illuminate\Http\Request;

interface BlogService
{
    public function getBlogs();
    public function getBlog($id);
    public function storeBlog(Request $request);
    public function updateBlog(Request $request, $id);
    public function deleteBlog($id);
}
