<?php

use App\Http\Middleware\HR;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Company_HR_ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');
});




require __DIR__ . '/auth.php';



/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
*/
// Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified', 'student'])->name('dashboard');

Route::get('dashboard', function () {
   $job_listings = auth()->user()->getJobs();
   return view('dashboard', compact('job_listings'));
})->middleware(['auth', 'verified', 'student'])->name('dashboard');



Route::middleware(['auth', 'student'])->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'student'])->group(function () {
   Route::patch('/student', [StudentController::class, 'update'])->name('student.update');
   Route::delete('/student', [StudentController::class, 'destroy'])->name('student.destroy');
});


Route::middleware(['auth', 'student'])->group(function () {
   Route::get('/application', [ApplicationController::class, 'index'])->name('application.index');
   Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');
   Route::delete('/application', [ApplicationController::class, 'destroy'])->name('application.destroy');
});



/*
|--------------------------------------------------------------------------
| Employee / Company Recruiter / HR Routes
|--------------------------------------------------------------------------
|
*/

Route::get('dashboard2', function () {
   $job_listings = auth()->user()->getCoyHR()->posts;
   return view('dashboard2', compact('job_listings'));
})->middleware(['auth', 'verified', 'hr'])->name('dashboard2');

// in a nutshell, the company registers an account and then a company profile is created for them (linked to their user account)
// this coy profile then contains information about the hr that is in charge of their affairs
// company as a registered user
Route::middleware(['auth', 'hr'])->group(function () {
   Route::get('/company/profile', [CompanyController::class, 'edit'])->name('coy_hr_profile.edit');

   Route::patch('/company', [CompanyController::class, 'update'])->name('company.update');
   Route::delete('/company', [CompanyController::class, 'destroy'])->name('company.destroy');
});

// internal coy info relating to hr
Route::middleware(['auth', 'hr'])->group(function () {
   Route::patch('company/profile', [Company_HR_ProfileController::class, 'update'])->name('coy_hr_profile.update');
   Route::delete('company/profile', [Company_HR_ProfileController::class, 'destroy'])->name('coy_hr_profile.destroy');
});

// company 
Route::middleware(['auth'])->group(function () {
   Route::get('application', [ApplicationController::class, 'index'])->name('application.index');
   Route::post('application', [ApplicationController::class, 'store'])->name('application.store');
   Route::delete('application', [ApplicationController::class, 'destroy'])->name('application.destroy');
});


// company jobs
Route::middleware(['auth', 'hr'])->group(function () {
   Route::get('post', [PostController::class, 'index'])->name('coy-post.index');
   Route::get('post/create', [PostController::class, 'create'])->name('coy-post.create');
   Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('coy-post.edit');
   Route::post('post', [PostController::class, 'store'])->name('coy-post.store');
   Route::patch('post/{post}', [PostController::class, 'update'])->name('coy-post.update');
   Route::delete('post/{post}', [PostController::class, 'destroy'])->name('coy-post.destroy');
});
