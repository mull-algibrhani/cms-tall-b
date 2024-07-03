<!-- Settings Dropdown Profile -->
<li class="sm:flex sm:items-center sm:ms-6">
 <x-backend-component.dropdown class="absolute right-1 top-2 w-56 p-2 mt-8 space-y-2">
  <x-slot name="trigger">
   <x-backend-component.avatar />
  </x-slot>

  <x-slot name="content">
   <div class="grid grid-cols-1 divide-y divide-gray-300 dark:divide-gray-500 ">
    <div class="p-2">
     <div class="flex justify-center items-center space-x-2">
      <p class="text-sm capitalize font-semibold text-gray-500 dark:text-gray-300">{{auth()->user()->name}}</p>
     </div>
     <div class="flex justify-center items-center space-x-2">
      <p class="flex font-medium text-sm text-gray-500">{{ auth()->user()->email }}</p>
     </div>

    </div>
    <div class="font-semibold p-1">
     <x-backend-component.dropdown-link :href="route('profile')" wire:navigate class="flex">
      <x-icons.person-circle class="h-5 w-5 text-gray-500 dark:text-gray-300 mr-2" />
      {{ __('Profile') }}
     </x-backend-component.dropdown-link>
    </div>
    <div class="font-semibold p-1">
     <button wire:click="logout" class="w-full text-start">
      <x-backend-component.dropdown-link class="flex">
       <x-icons.box-logout class="h-5 w-5 text-gray-500 dark:text-gray-300 mr-2" />
       {{ __('Logout') }}
      </x-backend-component.dropdown-link>
     </button>
    </div>
    <div class=" grid grid-flow-col justify-center space-x-2 p-2" x-data="{
        menu: false,
        theme: localStorage.theme,
        darkMode() {
            this.theme = 'dark';
            localStorage.theme = 'dark';
            this.setDarkClass();
        },
        lightMode() {
            this.theme = 'light';
            localStorage.theme = 'light';
            this.setDarkClass();
        },
        systemMode() {
            this.theme = undefined;
            localStorage.removeItem('theme');
            this.setDarkClass();
        },
        setDarkClass() {
            const isDark = this.theme === 'dark' || (!this.theme && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        },
    }" @click.outside="menu = false">
     <div class="flex space-x-2 mx-2">
      <!-- Button Light mode Theme -->
      <button
       class="flex items-center gap-3 px-4 py-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800"
       :class="theme === 'light' ? 'text-yellow-500 bg-gray-300 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400'"
       @click="lightMode()">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="h-5 w-5">
        <path stroke-linecap="round" stroke-linejoin="round"
         d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z">
        </path>
       </svg>
      </button>
      <!-- End Button Light mode Theme -->

      <!-- Button Darkmode Theme -->
      <button
       class="flex items-center gap-3 px-4 py-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800"
       :class="theme === 'dark' ? 'dark:text-violet-500 bg-gray-800' : 'text-gray-500 dark:text-gray-400'"
       @click="darkMode()">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="h-5 w-5">
        <path stroke-linecap="round" stroke-linejoin="round"
         d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z">
        </path>
       </svg>
      </button>
      <!-- End Button Darkmode Theme -->
      <!-- Button System Theme -->
      <button
       class="flex items-center gap-3 px-4 py-2 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800"
       :class="theme === undefined ? 'bg-gray-200 text-green-600 dark:text-green-500 dark:bg-gray-800' : 'text-gray-500 dark:text-gray-400'"
       @click="systemMode()">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="h-5 w-5">
        <path stroke-linecap="round" stroke-linejoin="round"
         d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25">
        </path>
       </svg>
      </button>
      <!-- End Button System Theme -->
     </div>

    </div>
   </div>
  </x-slot>
 </x-backend-component.dropdown>
</li>
<!-- End Settings Dropdown Profile -->