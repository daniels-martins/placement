<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ thisRoute() }}
      </h2>
   </x-slot>

   <div class="p-12">
      <div class="grid grid-cols-5 grid-flow-col gap-4">
         {{-- side bar --}}
         @include('partials.student_sidebar')
         {{-- main content --}}
         <div class="col-span-4 rounded-lg">

            <div href="#"
               class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
               <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                  Welcome, {{ ucfirst(auth()->user()->fullname()) }} </h5>
               <p class="font-normal text-gray-700 dark:text-gray-400"> Here are new jobs available for you.</p>
            </div>

            <div class="p-10 grid gap-4 bg-gray-200 rounded-lg">

               @foreach ($job_listings as $job)
               <div
                  class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                  <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                     {{ $job->job_title }}, {{ $job->location }} </h5>
                  <small class="font-normal text-gray-700 dark:text-gray-400">
                     {{ $job->title }}
                  </small>
                  <small>
                     {{ $job->responsibilities }}
                     {{ $job->details }}


                     {{ $job->pay_info }}

                  </small>
                  <div class="w-16 px-2 mt-7 cursor-pointer rounded-sm text-white bg-blue-600">
                     <a href="{{ route('application.create', $job->id) }}"> Apply</a>
                  </div>
               </div>
               @endforeach


               {{-- <div class="flex gap-3">
                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">Total Users.</p>
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">21 Learner</h5>
                  </a>

                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">Average Learning time.</p>
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">42 Minutes</h5>
                  </a>

                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">Average Access time.</p>
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">52 Minutes</h5>
                  </a>
               </div> --}}

            </div>
         </div>

      </div>

   </div>
</x-app-layout>