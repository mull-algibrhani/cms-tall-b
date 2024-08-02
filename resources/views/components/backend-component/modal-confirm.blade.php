<!-- Danger Modal -->
<div x-data="{ isOpen: false, itemId: null, itemName: '' }"
 @open-confirm-modal.window="isOpen = true; itemId = $event.detail.itemId ; itemName = $event.detail.itemName"
 @close-confirm-modal.window="isOpen = false" @confirm-delete.window="$wire.delete(itemId); isOpen = false">
 <div x-cloak x-show="isOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="isOpen"
  @keydown.esc.window="isOpen = false" @click.self="isOpen = false"
  class="fixed inset-0 z-30 flex items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
  role="dialog" aria-modal="true" aria-labelledby="dangerModalTitle">
  <!-- Modal Dialog -->
  <div x-show="isOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
   x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
   class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
   <!-- Dialog Header -->
   <div
    class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 px-4 py-2 dark:border-slate-700 dark:bg-slate-900/20">
    <div class="flex items-center justify-center rounded-full bg-red-600/20 text-red-600 p-1">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6" aria-hidden="true">
      <path fill-rule="evenodd"
       d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
       clip-rule="evenodd" />
     </svg>
    </div>
    <button @click="isOpen = false" aria-label="close modal">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none"
      stroke-width="1.4" class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
     </svg>
    </button>
   </div>
   <!-- Dialog Body -->
   <div class="px-4 text-center">
    <h3 id="dangerModalTitle" class="mb-2 font-semibold tracking-wide text-black dark:text-white">Delete Confirmation
    </h3>
    <p>Are you sure you want to delete this <span x-text="itemName" class="font-bold"></span> ? This action cannot be
     undone.</p>
   </div>
   <div class="border-slate-300 dark:border-slate-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
    <button @click="$dispatch('confirm-delete', { itemId: itemId })" type="button"
     class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
     Delete
    </button>
    <button @click="$dispatch('close-confirm-modal')" type="button"
     class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
     Cancel
    </button>
   </div>
  </div>
 </div>
</div>
<!-- Danger Modal End -->