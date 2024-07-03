<div :class="{'block': open, 'hidden': ! open}">
 <!-- Backdrop Menu Mobile -->
 <div @click="open = false" class="fixed h-full w-full bg-slate-800 opacity-30 sm:hidden z-10">
 </div>
 <!-- End Backdrop Menu Mobile -->
 <!-- Responsive Navigation Menu Mobile -->
 <div class="fixed h-full w-2/3 z-20">
  <x-backend-component.list-menu />
 </div>
 <!-- End Responsive Navigation Menu Mobile -->
</div>