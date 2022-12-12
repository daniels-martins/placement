<?php

use App\Models\Company;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('job_title', 50)->default('Software Engineer Needed @ PyroTech');
            $table->string('keywords')->default('software engineer, php, python, javascript, node'); // required skills needed 
            $table->text('about_us')->default('solving real world problems'); //coy vision, mission and values
            $table->longText('responsibilities')->default('bulleted or ordered list of new employee responsibilities'); //job responsibilities

            $table->longText('details')->default('the story of the job secretary'); //job responsibilities

            $table->longText('requirements')->default('knowledge of html and css, ond, hnd, # masters is a plus'); //job responsibilities, the delimeter is #

            // debuggin of SW -develpment and build-updatin existing codebase //db implementation
            // develpment and build///
            // updatin existing codebase
            $table->text('pay_info')->default('pay is 100k/year '); //remuneration info
            $table->text('benefits')->default('cool benefits'); 
            $table->string('location')->default('Oye');

            $table->string('coy_website')->default('pyrotech.com.ng');
            
            // owner of the job listing
            $table->foreignIdFor(Company::class);
         
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
        Schema::dropIfExists('posts');
    }
};
