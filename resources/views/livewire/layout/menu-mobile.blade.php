<div x-data :class="{'block': open, 'hidden': ! open}" class="hidden" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20">
 <!-- Backdrop Menu Mobile -->
 <div @click="open = false" class="fixed h-full w-full bg-slate-800 opacity-30 sm:hidden z-10" x-show="open" x-transition:enter="transition ease-out duration-600" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20">
 </div>
 <!-- End Backdrop Menu Mobile -->
 <!-- Responsive Navigation Menu Mobile -->
 <div class="fixed h-full w-2/3 z-20">
  <x-backend-component.list-menu />
 </div>
 <!-- End Responsive Navigation Menu Mobile -->
</div>