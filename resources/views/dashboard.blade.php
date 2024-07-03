<x-app-layout>
 <x-slot name="title">
  {{ __('Dashboard') }}
 </x-slot>
 <div class="md:container px-6 py-2 sm:px-3 mx-auto grid">
  <!-- Heading -->
  <x-backend-component.heading>
   {{ __('Dashboard') }}
  </x-backend-component.heading>
  <!-- End Heading -->
  <div class="bottom-up">
   <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
    <p>Halaman Dashboard</p>
   </div>
  </div>
  <!-- Toaster start -->

  <!-- Toaster end -->
 </div>
</x-app-layout>