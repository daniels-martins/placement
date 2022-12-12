<?php

/**
 * Get the Current Route Name or Base name of the current url
 */
function thisRoute()
{
   $url =  str_replace('_', ' ', basename(url()->current()));
   $name = $url;
   $url = strtolower($url);
   // $url = strtolower();
   switch ($url) {
      case 'dashboard':
         $name = 'Student Dashboard';
         break;
      case 'dashboard3':
         $name = 'Admin Dashboard';
         break;
      case 'dashboard2':
         $name = 'Company Dashboard';
         break;
      default:
         # code...
         break;
   }

   return ucwords($name);
}
