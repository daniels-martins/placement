<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens, HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'email',
      'role',
      'password',
   ];


   /**
    * Check if the user is a student or learner
    */
   public function isLearner()
   {
      return $this->role == 'student';
   }

   /**
    * Check if the user is an employer or Company
    */
   public function isCoy()
   {
      return $this->role == 'coy';
   }
   /**
    * Check if the user is an employer or Company
    */
   public function isEmployer()
   {
      return $this->isCoy();
   }

   /**
    * Check if the user is an admin
    */
   public function isAdmin()
   {
      return $this->role == 'admin';
   }


   public function role()
   {
      return $this->role == 'coy' ? 'company' : $this->role;
   }
  
  
   /**
    * get the user fullname
    */
   public function fullname()
   {
      if ($this->isLearner())
         return $this->getStudent('fname') . ' ' . $this->getStudent('lname');


      else if ($this->isCoy())
         return $this->getCoyHR('fname') . ' ' . $this->getStudent('lname');


      else if ($this->isAdmin())
         return $this->getAdmin('fname') . ' ' . $this->getStudent('lname');
   }


   // manual relationships

   /**
    * Get the student associated with this user
    */
   public function getStudent(string $attr = null)
   {
      $student = Student::where('user_id', $this->id)->first();
      $student_attr = $student[$attr];
      // if attribute is requested, then get the required attr, else get the whole student object data
      return $attr ?  $student_attr : $student;
   }



      /**
    * Get all the jobs for every user(student)
    */
    public function getJobs(string $coy_id = null)
    {
      // get from a particular company
      if ($coy_id > 0) {
         return $company = Company::where('user_id', $coy_id)->first()->posts;
         // if attribute is requested, then get the required attr, else get the whole company object data
      }
      return Post::all();
      
    }



   /**
    * Get the coy associated with this user
    */
    public function getCoyHR(string $attr = null)
    {
       $company = Company::where('user_id', $this->id)->first();
       $company_attr = $company[$attr];
       // if attribute is requested, then get the required attr, else get the whole company object data
       return $attr ?  $company_attr : $company;
    }

    
   /**
    * Get the admin associated with this user
    */
   public function getAdmin(string $attr = null)
   {
      $admin = Admin::where('user_id', $this->id)->first();
      $admin_attr = $admin[$attr];
      // if attribute is requested, then get the required attr, else get the whole admin object data
      return $attr ?  $admin_attr : $admin;
   }




   // eloquent


   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast.
    *
    * @var array<string, string>
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];
}
