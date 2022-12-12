<?php

use App\Models\Post;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('applications', function (Blueprint $table) {
         // $table->id();
         $table->unsignedBigInteger('id'); //try later
         // accepted file types include docx, and pdf;
         $table->string('cv_url'); //they can upload a file or a link their online cv
         $table->text('cover_letter')->nullable();
         // foreign keys
         $table->foreignIdFor(Student::class);
         $table->foreignIdFor(Post::class);
         // primary keys
         $table->primary(['id', 'student_id', 'post_id']); //try later
         // alternative method for primary keys
         // $table->string('student_id_post_id')
         //    ->virtualAs('concat(student_id,post_id)')
         //    ->index();
         $table->timestamps();
      });
      DB::statement('ALTER TABLE applications MODIFY id INTEGER NOT NULL AUTO_INCREMENT');
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('applications');
   }
};
