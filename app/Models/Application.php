<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = ['id', 'student_id', 'post_id'];

   //  protected $primaryKey = ['student_id_post_id'];





   // eloquent
    /**
    * This application belongs to a Student
    */
    public function applications()
    {
       return $this->belongsTo(Student::class);
    }

}
