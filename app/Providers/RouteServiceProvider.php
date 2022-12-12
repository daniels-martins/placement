<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
   /**
    * The path to the "home" route for your application.
    *
    * Typically, system admins are redirected here after authentication.
    *
    * @var string
    */
   public const ADMIN_HOME = '/dashboard3';



   /**
    * The path to the "home" route for your application.
    *
    * Typically, Companies, employers of labour are redirected here after authentication.
    *
    * Contains the company home page where jobs and applications are viewed from
    * jobs can be created here
    * @var string
    */

   public const COY_HOME = '/dashboard2';





   /**
    * The path to the "home" route for your application.
    *
    * Typically, students are redirected here after authentication.
    *
    * Contains the general student home page where jobs and applications are viewed from
    * jobs can be applied for here
    * @var string
    */
   public const HOME = '/dashboard';


   /**
    * Define your route model bindings, pattern filters, and other route configuration.
    *
    * @return void
    */
   public function boot()
   {
      $this->configureRateLimiting();

      $this->routes(function () {
         Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

         Route::middleware('web')
            ->group(base_path('routes/web.php'));
      });
   }

   /**
    * Configure the rate limiters for the application.
    *
    * @return void
    */
   protected function configureRateLimiting()
   {
      RateLimiter::for('api', function (Request $request) {
         return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
      });
   }
}
