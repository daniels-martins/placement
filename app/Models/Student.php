<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
   use HasFactory;
   protected $guarded = ['id'];


   public function posts()
   {
      return $this->belongsToMany(Post::class, 'post_student');
   }



   /**
    * Interact with the user's dob.
    *
    * @return \Illuminate\Database\Eloquent\Casts\Attribute
    */
   protected function dob(): Attribute
   {
      return Attribute::make(
         get: fn ($value) => (new Carbon($value))->format('d-m-Y'),
         set: fn ($value) => (new Carbon($value))->format('y-m-d'),
      );
   }


    /**
    * This user has many job applications
    */
    public function applications()
    {
       return $this->hasMany(Application::class);
    }
}
