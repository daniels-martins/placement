<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */
   public function handle(Request $request, Closure $next)
   {
      if (!$request->user()->isAdmin()){

         if ($request->user()->isLearner()) {
            return redirect()->route('dashboard');
         }

         if ($request->user()->isCoy()) {
            return redirect()->route('dashboard2');
         }
      }
      return $next($request);
   }
}
