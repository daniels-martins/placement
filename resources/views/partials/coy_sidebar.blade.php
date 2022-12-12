<div class="col-span-1 ">
   <a href="{{ route('dashboard2') }}" class="block max-w-sm p-6 bg-white border 
   border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
   dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('dashboard2'))  bg-gray-400 @endif   ">
      Dashboard
   </a>

   <a href="{{route('coy_hr_profile.edit')}}" class="block max-w-sm p-6 bg-white border 
   border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
   dark:border-gray-700 dark:hover:bg-gray-700
   @if (request()->routeIs('coy_hr_profile.edit'))  bg-gray-400 @endif   ">
      Update Company Information
   </a>


   <a href="{{ route('coy-post.index') }}" 
   class="block max-w-sm p-6 bg-white border
    border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
    dark:border-gray-700 dark:hover:bg-gray-700
   @if (request()->routeIs('coy-post.index'))  bg-gray-400 @endif   ">
      {{ Auth::user()->name }} Applications
   </a>



   <a href="{{ route('coy-post.create') }}" class="block max-w-sm p-6 bg-white border border-gray-200 
   rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      &#10133; Create a New Job Listing
   </a>




</div>