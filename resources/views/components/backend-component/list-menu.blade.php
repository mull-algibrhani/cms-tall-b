<div class="bg-white dark:bg-gray-800 dark:border-gray-700 shadow-md h-full">
  <a href="/dashboard" wire:navigate class=" mb-3 flex justify-center border-b bg-white dark:bg-gray-800 border-gray-400 dark:border-gray-700" aria-label="Logo">
    <x-backend-component.application-logo class="w-28 h-12 mt-2 mb-2 text-violet-600 dark:text-violet-300 hover:text-violet-700 dark:hover:text-violet-500" />
  </a>
  <x-backend-component.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
      <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L4.047 3.339 8 7.293l3.954-3.954L9.049.435zm3.61 3.611L8.708 8l3.954 3.954 2.904-2.905c.58-.58.58-1.519 0-2.098l-2.904-2.905zm-.706 8.614L8 8.708l-3.954 3.954 2.905 2.904c.58.58 1.519.58 2.098 0l2.905-2.904zm-8.614-.706L7.292 8 3.339 4.046.435 6.951c-.58.58-.58 1.519 0 2.098z" />
    </svg>
    <span class="ml-4">
      {{ __('Dashboard') }}</span>
  </x-backend-component.nav-link>
  <x-backend-component.dropdown-menu-blog />
</div>