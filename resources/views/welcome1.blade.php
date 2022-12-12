<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mt-5 bg-green-200">
   <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-center items-center ">
         <img src='/storage/fuoye-bg.png' alt="">
      </div>

      <div class="p-6 ">

         <div class="p-14 ">
            <div class="hidden  px-6 py-4 sm:block">
               @auth
               <div class="">

               </div>
               <a href="{{ url('/dashboard') }}"
                  class="p-10 bg-red-300 text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
               @else

               @if (Route::has('register'))

               @endif
               @endauth
            </div>
         </div>
         @auth
         <div class="flex justify-around cursor-pointer">
            <div class="bg-green-300 p-14">
               <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                  <a href="{{ url('/dashboard') }}"
                     class="p-10 bg-red-300 text-sm text-gray-700 dark:text-gray-500">Dashboard</a>
               </div>
            </div>
         </div>
         @else
         <div class="flex justify-evenly ">
            <div class="bg-green-300 p-7">
               <div class="mt-2 cursor-pointer text-gray-600 dark:text-gray-400 text-sm">
                  <a href="{{ route('register') }}"
                     class="ml-4 text-sm text-gray-700 dark:text-gray-500">Register</a>
               </div>
            </div>

            <div class="bg-green-300 p-7 cursor-pointer">
               <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Log in</a>

               </div>
            </div>
         </div>
         @endauth
      </div>
   </div>

</body>

</html>