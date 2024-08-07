<?php

namespace App\Http\Middleware;


use App\Models\listings;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        
        $post=$request->route('listing');
        
        if (!$post) {
            abort(404);
        }
        $user=Auth::user();
        if($post->age_restriction){
            if($user->age<$post->age_restriction){
                return redirect('/')->with('message','Your age are not eligible to access this page');
            }   
        }
        return $next($request);
    }
}
