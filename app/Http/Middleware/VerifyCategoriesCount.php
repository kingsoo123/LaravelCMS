<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() === 0){
            session()->flash('error', 'Sorry you can only create a post if category is not empty');
            return redirect(route('categories.index'));
        }

        return $next($request);
    }
}
