<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        $user = User::findOrFail(auth()->id()) ;
        
        if (!$user->isAdmin) {
            return redirect()->route('login')->with('errorMessage','Please Login as an admin');
        }
        
        return $next($request);
    }
}
