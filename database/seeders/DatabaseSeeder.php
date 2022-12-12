<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      // \App\Models\User::factory(10)->create();

      //   Seed for student
      $this->seedStudent();
      // seed for coy
      $this->seedCoy();

      // seed for admin
      $this->seedAdmin();
   }



   public function seedStudent()
   {
      $user = \App\Models\User::factory()->create([
         'name' => 'Test User',
         'email' => 'test@example.com',
         'role' => 'student',
         'password' => Hash::make('password'),
      ]);
      event(new Registered($user));
   }

   public function seedCoy()
   {
      $user = \App\Models\User::factory()->create([
         'name' => 'Google Inc.',
         'email' => 'hr@google.com',
         'role' => 'coy',
         'password' => Hash::make('password'),
      ]);
      event(new Registered($user));
   }

   public function seedAdmin()
   {
      $user = \App\Models\User::factory()->create([
         'name' => 'admino',
         'email' => 'admin@studentplacement.com',
         'role' => 'admin',
         'password' => Hash::make('password'),
      ]);
      event(new Registered($user));
   }
}
