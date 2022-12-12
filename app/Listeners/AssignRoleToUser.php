<?php

namespace App\Listeners;

use App\Models\Admin;
use App\Models\Company;
use App\Models\Student;
use App\Events\CoyCreated;
use App\Events\AdminCreated;
use App\Events\StudentCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AssignRoleToUser
{
   /**
    * Create the event listener.
    *
    * @return void
    */
   public function __construct()
   {
      //
   }

   /**
    * Handle the event.
    *
    * @param  \App\Events\Registered  $event
    * @return void
    */
   public function handle(Registered $event)
   {
      $adminEmails = ['wdev587@gmail.com', 'jbstiles100@gmail.com'];
      $user = $event->user;
      // dd($event->user, $event->user->name);
      // Please no relationships, do manual implementation
      switch ($user->role) {
         case 'coy':
            # create Company profile...
            $newCoy =  Company::create([
               'user_id' => $user->id,
               'hr_fname' => 'HR First Name',
               'hr_lname' => "HR Last Name",
            ]);
            event(new CoyCreated($newCoy));

         default:
            # create student profile...
            if (in_array($user->email, $adminEmails)) {
               $newAdmin = Admin::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
               event(new AdminCreated($newAdmin));
               
            } else {
               $newStudent = Student::create([
                  'user_id' => $user->id,
                  'fname' => $user->name,
               ]);
               // Dispatch event
               event(new StudentCreated($newStudent));
            }
            
            break;
      }
      //   this listener creates either a student or an Company model  based on the input from the $event->user

   }
}
