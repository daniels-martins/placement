<?php

namespace App\Providers;

use App\Listeners\AssignRoleToUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\GenerateRandomSchoolRecords;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
   /**
    * The event to listener mappings for the application.
    *
    * @var array<class-string, array<int, class-string>>
    */
   protected $listen = [
      Registered::class => [
         SendEmailVerificationNotification::class,
         AssignRoleToUser::class,
      ],

      // for Various roles
      
      StudentCreated::class => [
         GenerateRandomSchoolRecords::class,
      ],

      StudentCreated::class => [
         GenerateRandomSchoolRecords::class,
      ],

      StudentCreated::class => [
         GenerateRandomSchoolRecords::class,
      ]
   ];

   /**
    * Register any events for your application.
    *
    * @return void
    */
   public function boot()
   {
      //
   }

   /**
    * Determine if events and listeners should be automatically discovered.
    *
    * @return bool
    */
   public function shouldDiscoverEvents()
   {
      return false;
   }
}