<?php

use App\Models\User;
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
      Schema::create('admins', function (Blueprint $table) {
         $table->id();
         $table->string('fname', 20)->nullable();
         $table->string('lname', 20)->nullable();


         // foreign keys
         $table->foreignIdFor(User::class);
         
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('admins');
   }
};
