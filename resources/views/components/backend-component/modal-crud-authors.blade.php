<!-- Modal CRUD -->
<div x-init="$dispatch('open-modal')" class="md:container px-3 py-2 grid">
  <div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 px-4 py-2 dark:border-slate-700 dark:bg-slate-800">
    <h3 class="font-semibold tracking-wide text-black dark:text-white">
      @if($action === 'create')
      Add Author
      @elseif($action === 'edit')
      Edit Author
      @else
      View Author
      @endif
    </h3>
    <button wire:click="closeModal()" aria-label="close modal">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>

  <div class="p-2">
    <div class="flex justify-center items-center pt-3">
      <div class="flex flex-col items-center">
        <label class="mb-1 font-medium text-sm text-gray-600 dark:text-gray-300">Avatar</label>
        <div class="relative w-24 h-24">

          <img src="{{ $this->getPhotoUrl() }}" alt="Avatar" class="w-full h-full rounded-full object-cover border-2 border-violet-600">

          <input wire:model="photo" id="photo" type="file" accept="image/*" @if($action==='view' ) disabled @endif class="absolute inset-0 w-full h-full opacity-0 @if($action !=='view' ) cursor-pointer @endif">
        </div>
        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 mt-5 gap-5">
      <div>
        <x-input-label for="name" :value="__('Name')" :sup="__('*')" />
        <x-text-input wire:model="name" id="name" type="text" class="mt-1 flex w-full placeholder:text-sm" :placeholder="$action === 'view' ? '' : __('Name')" wire:model.blur="name" :disabled="$action === 'view'" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="email" :value="__('Email address')" :sup="__('*')" />
        <x-text-input wire:model="email" id="email" type="email" class="mt-1 flex w-full placeholder:text-sm" :placeholder="$action === 'view' ? '' : __('example@email.com')" wire:model.blur="email" :disabled="$action === 'view'" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
    </div>

    <div class="mt-6">
      <x-input-label for="bio" :value="__('Biografi')" :sup="__('*')" />
      <div wire:ignore class="focus:ring focus:ring-violet-600">
        <x-text-area wire:model="bio" name="bio" id="editor" :class="$action === 'view' || $action === 'edit' ? 'w-full h-48' : 'w-full h-28'" :placeholder="$action === 'view' ? '' : __('Type your bio')" :disabled="$action === 'view'">{{ $bio }}
        </x-text-area>
      </div>
      <div wire:ignore id="word-count" class="font-medium text-sm text-gray-600 dark:text-gray-300">
      </div>
      <x-input-error :messages="$errors->get('bio')" class="mt-2" />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 mt-5 gap-5">
      <div>
        <x-input-label for="facebook_link" :value="__('Facebook link')" />
        <x-text-input wire:model="facebook_link" id="facebook_link" type="url" wire:model.blur="facebook_link" :disabled="$action === 'view'" class="mt-1 flex w-full placeholder:text-sm" :placeholder="$action === 'view' ? '' : __('https://www.facebook.com/example')" />
        <x-input-error :messages="$errors->get('facebook_link')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="instagram_link" :value="__('Instagram link')" />
        <x-text-input wire:model="instagram_link" id="instagram_link" type="url" wire:model.blur="instagram_link" :disabled="$action === 'view'" class="mt-1 flex w-full placeholder:text-sm" :placeholder="$action === 'view' ? '' : __('https://www.instagram.com/example')" />
        <x-input-error :messages="$errors->get('instagram_link')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="x_link" :value="__('X link')" />
        <x-text-input wire:model="x_link" id="x_link" type="url" wire:model.blur="x_link" class="mt-1 flex w-full placeholder:text-sm" :disabled="$action === 'view'" :placeholder="$action === 'view' ? '' : __('https://x.com/example')" />
        <x-input-error :messages="$errors->get('x_link')" class="mt-2" />
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
  </div>
</div>
<!-- Modal CRUD End -->