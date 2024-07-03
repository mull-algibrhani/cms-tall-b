<x-slot name="title">
 {{ __('Posts') }}
</x-slot>
<div class="md:container px-6 py-2 sm:px-3 mx-auto grid">
 <!-- Heading -->
 <x-backend-component.heading>
  {{ __('Posts') }}
 </x-backend-component.heading>
 <!-- End Heading -->
 <div class="bottom-up">
  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
   <div class="grid grid-cols-2">
    <div class="flex justify-start">
     <div class="relative w-full lg:w-3/4 my-2 px-2">
      <input wire:model.live="search" type="text" placeholder="Search"
       class="transition-color block w-full max-w-[16rem] rounded-[10px] border-1 border-violet-600 dark:border-none dark:bg-gray-900 py-2 pl-10 pr-4 text-sm text-gray-800 dark:text-gray-300 placeholder-gray-500 outline-none focus-visible:ring-1 focus-visible:ring-violet-500 sm:max-w-none">
      <div class="pointer-events-none absolute inset-0 left-4 flex items-center" aria-hidden="true">
       <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 text-gray-500" viewBox="0 0 16 16">
        <path
         d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
       </svg>
      </div>
     </div>
    </div>
    <div class="flex justify-end">
     <a wire:navigate href="/blog/new-post"
      class="bg-violet-600 inline-flex my-2 mr-2 px-2 py-2 text-sm font-medium leading-5 text-white rounded-lg focus:outline-none"
      aria-label="Delete">
      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
       <path fill-rule="evenodd"
        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
        clip-rule="evenodd"></path>
      </svg>
      <span class=" ml-1">New post</span>
     </a>
    </div>
   </div>
   <div class="mx-auto py-1 sm:py-4 sm:px-4 lg:px-8">
    <div class="grid grid-cols-1 gap-6">
     <!-- Table -->
      
     <!-- EndTable -->
    </div>
   </div>
  </div>
 </div>
 <!-- Toaster start -->

 <!-- Toaster end -->
</div>