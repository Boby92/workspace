<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Buyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if(!Auth::check())
      {
        return redirect()->route('login');
      }

      $userRole = Auth::user()->role;

      // Admin
      if($userRole === 1)
      {
        return redirect()->route('admin.dashboard');
      }
      // Seller
      elseif ($userRole === 2)
      {
        return redirect()->route('seller.dashboard');
      }
      // Buyer
      elseif ($userRole === 3)
      {
        return $next($request);
      }
    }
}
