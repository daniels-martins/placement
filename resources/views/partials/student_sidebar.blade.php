<div class="col-span-1 ">
   <a href="{{ route('dashboard') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('dashboard'))  bg-gray-400 @endif   ">
      Dashboard
   </a>
   <a href="{{route('profile.edit')}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('profile.edit'))  bg-gray-400 @endif   ">
      Update Student Information
   </a>
   <a href="{{ route('application.index') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('application.index'))  bg-gray-400 @endif   ">
      My Applications
   </a>

</div>
