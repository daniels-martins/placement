<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         My {{ thisRoute() }}s
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

               <div href="#"
                  class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                  <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                     Job1, Expert Needed </h5>
                  <small class="font-normal text-gray-700 dark:text-gray-400">
                     Here's what happened with your learning system.
                  </small>
                  <small>
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi voluptatibus eum sunt,
                     libero earum repellendus doloremque quos. Iusto rem temporibus facilis voluptatibus accusantium at,
                     et recusandae, quae officiis magni ipsam in excepturi dolor aut, dolores commodi ea quaerat
                     pariatur quod
                     dolorum sapiente. Reprehenderit aperiam nam itaque autem odit nesciunt a ipsam, provident nisi
                     quibusdam repellat
                     nulla aliquam, dolor beatae...
                  </small>
                  <div
                     class="w-28 mt-7 pl-4 overflow-none cursor-pointer rounded-sm text-white bg-green-600">
                     <span class="inline">   Applied  &#10004; </span>
                  </div>
               </div>

               <div href="#"
               class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
               <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                  Job2, Expert Needed </h5>
               <small class="font-normal text-gray-700 dark:text-gray-400">
                  Here's what happened with your learning system.
               </small>
               <small>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi voluptatibus eum sunt,
                  libero earum repellendus doloremque quos. Iusto rem temporibus facilis voluptatibus accusantium at,
                  et recusandae, quae officiis magni ipsam in excepturi dolor aut, dolores commodi ea quaerat
                  pariatur quod
                  dolorum sapiente. Reprehenderit aperiam nam itaque autem odit nesciunt a ipsam, provident nisi
                  quibusdam repellat
                  nulla aliquam, dolor beatae...
               </small>
               <div
               class="w-28 mt-7 pl-4 overflow-none cursor-pointer rounded-sm text-white bg-green-600">
               <span class="inline">   Applied  &#10004; </span>
            </div>
            </div>

               <div href="#"
                  class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                  <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                     Job3, Expert Needed </h5>
                     <small class="font-normal text-gray-700 dark:text-gray-400">
                        Here's what happened with your learning system.
                     </small>
                     <small>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi voluptatibus eum sunt,
                        libero earum repellendus doloremque quos. Iusto rem temporibus facilis voluptatibus accusantium at,
                        et recusandae, quae officiis magni ipsam in excepturi dolor aut, dolores commodi ea quaerat
                        pariatur quod
                        dolorum sapiente. Reprehenderit aperiam nam itaque autem odit nesciunt a ipsam, provident nisi
                        quibusdam repellat
                        nulla aliquam, dolor beatae...
                     </small>
                     <div
                     class="w-28 mt-7 pl-4 overflow-none cursor-pointer rounded-sm text-white bg-green-600">
                     <span class="inline">   Applied  &#10004; </span>
                  </div>
               </div>

               <div href="#"
                  class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                  <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                     Job4, Expert Needed </h5>
                     <small class="font-normal text-gray-700 dark:text-gray-400">
                        Here's what happened with your learning system.
                     </small>
                     <small>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi voluptatibus eum sunt,
                        libero earum repellendus doloremque quos. Iusto rem temporibus facilis voluptatibus accusantium at,
                        et recusandae, quae officiis magni ipsam in excepturi dolor aut, dolores commodi ea quaerat
                        pariatur quod
                        dolorum sapiente. Reprehenderit aperiam nam itaque autem odit nesciunt a ipsam, provident nisi
                        quibusdam repellat
                        nulla aliquam, dolor beatae...
                     </small>
                     <div
                     class="w-28 mt-7 pl-4 overflow-none cursor-pointer rounded-sm text-white bg-green-600">
                     <span class="inline">   Applied  &#10004; </span>
                  </div>
               </div>

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