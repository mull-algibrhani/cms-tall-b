<x-slot name="title">
 {{ __('Categorys') }}
</x-slot>
<div class="md:container px-6 py-2 sm:px-3 mx-auto grid">
 <!-- Heading -->
 <x-backend-component.heading>
  {{ __('Categorys') }}
 </x-backend-component.heading>
 <!-- End Heading -->
 <!-- Main -->
 <div class="bottom-up">
  <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-lg">
   <div class="grid grid-cols-2">
    <!-- Seaching -->
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
    <!-- End Seaching -->
    <!-- Button Open Modal -->
    <div class="flex justify-end">
     <x-backend-component.button wire:click.prevent="openModal('create')" class="my-2 mr-2">
      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
       <path fill-rule="evenodd"
        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
        clip-rule="evenodd"></path>
      </svg>
      <span class="ml-1">{{ __('Add Category') }}</span>
     </x-backend-component.button>
    </div>
    <!-- Button Open Modal -->
   </div>
   <!-- Main Table -->
   <div class="mx-auto py-1 sm:py-4 sm:px-4 lg:px-8">
    <div class="grid grid-cols-1 gap-6">
     <!-- Table -->
     <div class="bottom-up w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
       @if($datacategorys->count() > 0)
       <table class="w-full whitespace-no-wrap">
        <thead>
         <tr
          class="text-sm font-semibold tracking-wide text-left text-gray-600  uppercase border-b border-gray-300 dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3"></th>
          <th class="px-4 py-3">Category</th>
          <th class="px-4 py-3">Action</th>
         </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-300 dark:divide-gray-700 dark:bg-gray-800">
         @foreach($datacategorys as $index => $item)
         <tr class="text-gray-600 dark:text-gray-400">
          <td class="px-4 py-3">
           <div class="flex items-center text-xs md:text-sm">
            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
             <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
            </div>
            <div>
             <p class="font-semibold">
              {{ ($datacategorys->currentPage() - 1) * $datacategorys->perPage() + $index + 1 }}
             </p>
            </div>
           </div>
          </td>
          <td class="px-4 py-3">
           <div class="flex items-center text-xs md:text-sm">
            <div>
             <p class="font-semibold">
              {{$item->category_name}}
             </p>
            </div>
           </div>
          </td>
          <td class="px-4 py-3 text-xs">
           <div class="flex items-center space-x-3">
            <button wire:click.prevent="openModal('view', {{ $item->id }})" type="button"
             class="flex items-center justify-between px-2 py-1 font-medium leading-5 text-white transition-colors duration-150 bg-violet-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
             <svg class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
              <path fill-rule="evenodd"
               d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
               clip-rule="evenodd" />
             </svg>
             <span>View</span>
            </button>
            <button wire:click.prevent="openModal('edit', {{ $item->id }})" type="button"
             class="flex items-center justify-between px-2 py-1 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-700 hover:bg-green-700 focus:outline-none focus:shadow-outline-yellow">
             <svg class="w-3 h-3 mr-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path
               d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
              </path>
             </svg>
             <span>Edit</span>
            </button>
            <button
             @click="$dispatch('open-confirm-modal', { itemId: {{ $item->id }} , itemName: '{{ $item->category_name }}' })"
             class="confirdeletepartner flex items-center justify-between px-2 py-1 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
             <svg class="w-3 h-3 mr-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
               d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
               clip-rule="evenodd"></path>
             </svg>
             <span>Delete</span>
            </button>
           </div>
          </td>
         </tr>
         @endforeach
        </tbody>
       </table>
       {{ $datacategorys->links() }}
       @else
       <div class="flex justify-center py-4 text-gray-500 dark:text-gray-400">
        <p>Data Not Found.</p>
       </div>
       @endif
      </div>
     </div>
     <!-- EndTable -->
    </div>
   </div>
   <!-- End Main Table -->
  </div>
 </div>
 <!-- End Main -->
 <!-- Modal Form -->

 <x-backend-component.modal-animation wire:key="modal-crud-authors">
  @if ($isModalOpen)
  <x-backend-component.modal-crud-category :action="$action" :name="$category_name" :isModalOpen="$isModalOpen" />
  @endif
 </x-backend-component.modal-animation>
 <!-- Modal Konfirmasi -->
 <x-backend-component.modal-confirm wire:key="modal-confim-category" />
 <!-- End Modal Konfirmasi -->

 <!-- End Modal Form -->