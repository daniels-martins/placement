<?php

use App\Models\Application;
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
        Schema::create('post_student', function (Blueprint $table) {
           $table->unsignedBigInteger('post_id');
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreignIdFor(Application::class, 'application_id'); //pivot
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
        Schema::dropIfExists('post_student');
    }
};
