<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<header class="bg-white dark:bg-gray-800 border-b border-gray-400 dark:border-gray-700">
 <!-- Primary Navigation Menu -->
 <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="flex justify-between h-16">
   <div class="flex">
    <!-- Hamburger Menu Mobile -->
    <x-backend-component.toggle-menu-desktop />
    <!-- End Hamburger Menu Mobile -->
    <!-- Hamburger Menu Mobile -->
    <x-backend-component.toggle-menu-mobile />
    <!-- End Hamburger Menu Mobile -->

    <!-- Navigation Links Dashboard -->
    <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
     <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
      {{ __('Dashboard') }}
     </x-nav-link>
    </div>
    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
     <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
      {{ __('Dashboard 2') }}
     </x-nav-link>
    </div> -->
    <!-- End Navigation Links Dashboard -->
   </div>

   <ul class="pl-4 flex items-center justify-center flex-shrink-0 space-x-5 md:space-x-4 lg:space-x-8">
    <!-- Start Notification -->
    <x-backend-component.notification />
    <!-- End Notification -->
    <!-- Settings Dropdown Profile -->
    <x-backend-component.dropdown-profile />
    <!-- End Settings Dropdown Profile -->
   </ul>

  </div>
 </div>


</header>