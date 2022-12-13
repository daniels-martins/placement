<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $student = auth()->user()->getStudent();
      $student_applications = Application::where('student_id', Auth::user()->getStudent('id'))
         ->get();

      // dd($student->posts);
      return view('applications.index', compact('student', 'student_applications'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(Post $post)
   {
      // dd($post);
      return view('applications.create', compact('post'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request, Post $post)
   {
      $requestData = $request->except(['_token', '_method']);

      $post = Post::find($request->post);
      $duplicateStudentApplication = Application::where('student_id', Auth::user()->getStudent('id'))
         ->where('post_id', $post->id)->first();
      // dd($duplicateStudentApplication->id, 'really');
      if ($request->user()->isLearner() and !empty($duplicateStudentApplication->id) ) {
         return back()->with('status', 'application-already-exists');
      }
      if ($request->user()->isLearner()) {
         $student_id = $request->user()->getStudent('id');
         // dd('fish');
         $newApp = Application::create([
            'cv_url' => $requestData['cv_url'],
            'cover_letter' => $requestData['cover_letter'],
            'post_id' => $post->id,
            'student_id' => $student_id
         ]);
         if ($newApp) {
            // dd('newApp created');

            if ($post->students()->attach($request->student_id)) dd('it happened');

            return back()->with('status', 'application-created-successfully');
         } else return back()->with('status', 'application-created-failed');
      } else {
         dd('store a new student applications for this student'); # code...
      }

      // Applications are tied to 
      // Application()


   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function show(Application $application)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function edit(Application $application)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Application $application)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Application  $application
    * @return \Illuminate\Http\Response
    */
   public function destroy(Application $application)
   {
      //
      dd('delete a student\'s application for a post or job listing');
   }
}
