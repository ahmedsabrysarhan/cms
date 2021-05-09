<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CheckCat
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
        // Code
        $count = Category::all()->count();
        if( $count == 0 ){
            session()->flash('alert', 'You must create at least 1 category');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
