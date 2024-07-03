@props(['active'])

@php
$classes = ($active ?? false)
? ' absolute inset-y-0 left-0 w-1 bg-violet-600 rounded-tr-lg rounded-br-lg transition duration-150 ease-in-out'
: 'hidden transition duration-150 ease-in-out';
$classes1 = ($active ?? false)
? 'inline-flex items-center w-full text-violet-500 dark:text-violet-400 text-sm font-semibold'
: 'inline-flex items-center w-full text-sm transition-colors duration-150 hover:text-violet-500
dark:hover:text-violet-400 text-gray-600 dark:text-gray-300 font-semibold duration-150 ease-in-out';
@endphp
<!-- <span {{ $attributes->merge(['class' => $classes]) }}
 class="absolute inset-y-0 left-0 w-1 bg-violet-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
<a {{ $attributes}}>
 {{ $slot }}
</a> -->

<ul>
 <li
  class="flex justify-center items-center relative px-6 py-2 mx-2 my-2 rounded-md hover:bg-gray-300 dark:hover:bg-slate-900 ">
  <span {{ $attributes->merge(['class' => $classes]) }} aria-hidden="true"></span>
  <a {{ $attributes->merge(['class' => $classes1]) }} aria-hidden="true">
   {{ $slot }}
  </a>
 </li>
</ul>