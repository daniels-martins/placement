<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * 
 * This model represents the Job listings for various companies
 * 
 * 
 * 
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


   public function students()
   {
      return $this->hasMany(Student::class);
   }


   public function company(){
      return $this->belongsTo(Company::class);
   }

}
