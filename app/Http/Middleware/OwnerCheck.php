<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OwnerCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $articleId = $request->segments()[2];

        if(Auth::user() && Blog::find($articleId)->isOwner())
        {
            return $next($request);
        }

        return response('Это не твоя запись :)',401);
    }
}
