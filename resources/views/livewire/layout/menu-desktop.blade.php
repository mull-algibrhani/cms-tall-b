<aside id="scrolbar-none"
 class="z-20 h-full w-56  overflow-y-auto hidden sm:block bg-white dark:bg-gray-900 flex-shrink-0"
 x-show="$store.openSide" x-transition:enter="transition ease-out duration-300"
 x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
 x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100"
 x-transition:leave-end="opacity-0 transform -translate-x-20">
 <div class="h-full">
  <x-backend-component.list-menu />
 </div>
</aside>