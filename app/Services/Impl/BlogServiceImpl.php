<?php


namespace App\Services\Impl;


use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogServiceImpl implements BlogService
{

    public function getBlogs()
    {
        return Blog::with('author')->get();
    }

    public function getBlog($id)
    {
        $blog = Blog::with('author')->find($id);

        if (!$blog) {
            throw new \Exception('Запись не найдена :(');
        }

        return $blog;
    }

    public function storeBlog(Request $request)
    {
        $blog = new Blog();

        $blog = $this->fillBlog($blog, $request);

        $blog->author_id = Auth::id();

        $blog->save();

        return $blog;
    }

    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            throw new \Exception('Запись не найдена :(');
        }

        $blog = $this->fillBlog($blog, $request);

        $blog->save();

        return $blog;
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            throw new \Exception('Запись не найдена :(');
        }

        $blog->delete();

        return 'Успешно :)';
    }

    public function fillBlog(Blog $blog, $request)
    {
        $blog->fill($request->only([
            'title',
            'text'
        ]));

        return $blog;
    }
}
