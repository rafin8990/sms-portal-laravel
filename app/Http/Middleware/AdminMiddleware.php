<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('userId')) {
            $userId = Session::get('userId');
            $user = User::find($userId);
            if ($user &&  $user->role === 'admin') {
                return $next($request); 
            }
        }
        return redirect('/login')->with('error', 'You do not have permission in this privileges.');
    }
}
