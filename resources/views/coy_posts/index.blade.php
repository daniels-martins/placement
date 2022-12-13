<?php use App\Models\Post; ?>
<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ thisRoute() }}
      </h2>
   </x-slot>

   <div class="p-12">
      <div class="grid grid-cols-5 grid-flow-col gap-4">
         {{-- side bar --}}
         @include('partials.coy_sidebar')
         {{-- main content --}}
         <div class="col-span-4 rounded-lg">

            <div
               class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
               <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                  Welcome, {{ ucfirst(auth()->user()->fullname()) }} </h5>
               <p class="font-normal text-gray-700 dark:text-gray-400"> <strong>{{ Auth::user()->name }} </strong>Job
                  Listings and Applications Overview.</p>
            </div>

            <div class="p-10 grid gap-4 bg-gray-200 rounded-lg">
               @foreach ($coy_applications as $ad)
               @php
               $post = Post::find($ad->post_id);
               @endphp
               <div href="#"
                  class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                  <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                     {{ $post->job_title }}, Expert Needed </h5>
                  <small class="font-normal text-gray-700 dark:text-gray-400">
                     {{ $post->keywords }}.
                  </small>
                  <small>
                     {{ $post->responsibilities }}.
                     {{ $post->details }}.
                     {{ $post->requirements }}.
                  </small>
                  <div class="flex">
                     <div class="w-32 mt-7 px-3 cursor-hand rounded-sm text-white bg-green-600" title="click to view">{{ rand(10,100) }} applicants</div>
                  </div>
               </div>
               @endforeach

            </div>
         </div>

      </div>

   </div>
</x-app-layout>