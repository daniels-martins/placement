<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Application;
use Illuminate\Http\Request;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $job_listings = auth()->user()->getCoyHR()->posts;
      $this_coy_listings_id = auth()->user()->getCoyHR()->posts()->pluck('id');
      // dd($this_coy_listings_id);
      $coy_applications = Application::whereIn('post_id',  $this_coy_listings_id)->get();
      return view('coy_posts.index', compact('coy_applications'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create(Request $request)
   {
      return view('coy_posts.main');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      // Note no validation here
      // dd($request->except(['_token']));
      if (auth()->user()->getCoyHR()->posts()->create($request->except(['_token'])))
         return back()->with('status', 'job-listing-created-successfully');
      dd('Oops! We could not store a new post');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function show(Post $post)
   {
      //
      dd('display a post');
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function edit(Post $post)
   {
      return view('coy_posts.edit_main', compact('post'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Post $post)
   {
      // dd('effectively edit a post');
      if ($post->update($request->except(['_token', '_method'])))
         return back()->with('status', 'job-listing-updated');
      return back()->with('status', 'job-listing-update-failed');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Post  $post
    * @return \Illuminate\Http\Response
    */
   public function destroy(Post $post)
   {
      dd('delete a post');
   }
}
