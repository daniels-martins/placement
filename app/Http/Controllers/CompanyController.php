<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Company  $company
    * @return \Illuminate\Http\Response
    */
   public function show(Company $company)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Company  $company
    * @return \Illuminate\Http\Response
    */
   public function edit(Company $company, Request $request)
   {
      //
      return view('coy_profile.edit', [
         'user' => $request->user(),
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Company  $company
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request)
   {
      // dd('about to update Google info');
      // remember the companies are registered as if they are humans
      // for readability, i will extract the variable
      $company_As_a_User =  $request->user();

      // this basically only changes the name and email fields.
      $company_As_a_User->update($request->except(['_token', '_method']));

      return back()->with('status', 'company-record-updated');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Company  $company
    * @return \Illuminate\Http\Response
    */
   public function destroy(Company $company)
   {
      //
      dd('about to delete Google info');
   }
}
