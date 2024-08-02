<!-- Modal CRUD -->
<div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 px-4 py-2 dark:border-slate-700 dark:bg-slate-900/20">
 <h3 class="font-semibold tracking-wide text-black dark:text-white">
  @if($action === 'create')
  Add Category
  @elseif($action === 'edit')
  Edit Category
  @else
  View Category
  @endif
 </h3>
 <button wire:click="closeModal()" aria-label="close modal">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg>
 </button>
</div>
<div class="mt-2 px-4">
 <div>
  <x-input-label for="category_name" :value="__('Category Name')" :sup="__('*')" />
  <x-text-input wire:model="category_name" id="category_name" type="text" wire:model.blur="category_name" class="mt-1 flex w-full placeholder:text-sm @if($action !=='view' ) placeholder:hidden @endif" placeholder="{{ __('Type Post Category') }}" :disabled="$action === 'view'" />
  <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
 </div>
</div>
<div class="mt-6 flex justify-center sm:justify-end">
 <div class="border-slate-300 dark:border-slate-700 px-4 py-3 space-y-4 sm:px-4 sm:flex sm:flex-row-reverse sm:space-y-0">
  @if($action !== 'view')
  <button wire:loading.class="hidden" wire:click="save()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-violet-600 dark:bg-violet-600 border-violet-600 dark:border-violet-600 text-white focus:outline-none hover:opacity-75 disabled:opacity-50 transition ease-in-out duration-150 sm:ml-3 sm:w-auto sm:text-sm">
   @if($action === 'create') {{ __('Save') }} @else {{ __('Update') }} @endif
  </button>
  <div wire:loading.inline-flex wire:target="save()" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-violet-600 dark:bg-violet-600 opacity-75 transition ease-in-out duration-150 sm:ml-3 sm:w-auto sm:text-sm cursor-not-allowed" disabled="">
   @if($action === 'create') {{ __('Saving') }} @else {{ __('Updating') }} @endif
   <x-icons.loading-proccess />
  </div>
  @endif
  <button wire:click="closeModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
   @if($action === 'view') {{ __('Close') }} @else {{ __('Cancel') }}
   @endif
  </button>
 </div>
</div>
<!-- Modal CRUD End -->