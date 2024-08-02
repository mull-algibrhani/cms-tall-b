@assets
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
<style>
  .ck-editor__editable[role="textbox"] {
    /* editing area */
    min-height: 200px;
  }
</style>
@endassets

<x-slot name="title">
  {{ __('Add Authors') }}
</x-slot>
<div class="md:container px-6 py-2 sm:px-3 mx-auto grid" x-data="{ bio: @entangle('bio'), wordCount: 0 }" x-init="$watch('bio', value => wordCount = countWords(value))">
  <form wire:submit.prevent="store" class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-center sm:text-start">
      {{ __('Create Author') }}
    </h2>
    <div class="flex justify-center items-center pt-3">
      <div class="flex flex-col items-center">
        <label class="mb-1 font-medium text-sm text-gray-700 dark:text-gray-300">Avatar</label>
        <div class="relative w-24 h-24">
          @if ($photo)
          <img src="{{ $photo->temporaryUrl() }}" alt="Avatar" class="w-full h-full rounded-full object-cover border-2 border-violet-600">
          @else
          <img src='https://via.placeholder.com/128' alt="Avatar" class="w-full h-full rounded-full object-cover border-2 border-violet-600">
          @endif
          <input wire:model="photo" id="photo" type="file" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        </div>
        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
      </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 mt-5 gap-5">
      <div>
        <x-input-label for="name" :value="__('Name')" :sup="__('*')" />
        <x-text-input wire:model="name" id="name" type="text" class="mt-1 flex w-full placeholder:text-sm" placeholder="{{ __('Name') }}" wire:model.blur="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="email" :value="__('Email address')" :sup="__('*')" />
        <x-text-input wire:model="email" id="email" type="email" class="mt-1 flex w-full placeholder:text-sm" placeholder="{{ __('example@email.com') }}" wire:model.blur="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
    </div>

    <div class="mt-6">
      <x-input-label for="bio" :value="__('Biografi')" :sup="__('*')" />
      <div wire:ignore class="focus:ring focus:ring-violet-600">
        <textarea wire:model="bio" name="bio" id="editor" placeholder="{{ __('Type your bio') }}" class="h-28 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">{{ $bio }}</textarea>
      </div>
      <div wire:ignore id="word-count" class="font-medium text-sm text-gray-700 dark:text-gray-300"></div>
      <p>Jumlah kata Alpine: <span x-text="wordCount"></span></p>
      <x-input-error :messages="$errors->get('bio')" class="mt-2" />
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 mt-5 gap-5">
      <div>
        <x-input-label for="facebook_link" :value="__('Facebook link')" />
        <x-text-input wire:model="facebook_link" id="facebook_link" type="url" wire:model.blur="facebook_link" class="mt-1 flex w-full placeholder:text-sm" placeholder="{{ __('https://www.facebook.com/example') }}" />
        <x-input-error :messages="$errors->get('facebook_link')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="instagram_link" :value="__('Instagram link')" />
        <x-text-input wire:model="instagram_link" id="instagram_link" type="url" wire:model.blur="instagram_link" class="mt-1 flex w-full placeholder:text-sm" placeholder="{{ __('https://www.instagram.com/example') }}" />
        <x-input-error :messages="$errors->get('instagram_link')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="x_link" :value="__('X link')" />
        <x-text-input wire:model="x_link" id="x_link" type="url" wire:model.blur="x_link" class="mt-1 flex w-full placeholder:text-sm" placeholder="{{ __('https://x.com/example') }}" />
        <x-input-error :messages="$errors->get('x_link')" class="mt-2" />
      </div>
    </div>

    <div class="mt-6 flex justify-center sm:justify-end">
      <x-backend-component.save-button>
        {{ __('Save') }}
      </x-backend-component.save-button>

      <x-backend-component.cancel-button x-on:click="$dispatch('close')" class="ms-3">
        {{ __('Cancel') }}
      </x-backend-component.cancel-button>
    </div>
  </form>
</div>
<script>
  function countWords(str) {
    // Mengubah entitas HTML menjadi karakter biasa
    const decodedStr = str.replace(/&nbsp;/g, ' ');
    // Menghapus tag HTML
    const cleanStr = decodedStr.replace(/<[^>]*>/g, ' ');
    // Menghapus spasi berlebih dan newline
    const normalizedStr = cleanStr.replace(/\s+/g, ' ').trim();
    // Menghitung kata yang tidak kosong
    return normalizedStr ? normalizedStr.split(' ').filter(word => word.length > 0).length : 0;
  }
</script>
@script
<script>
  CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
      toolbar: {
        items: ['selectAll', 'bold', 'italic', 'underline', 'strikethrough', 'alignment', 'removeFormat', 'bulletedList',
          'numberedList',
          'todoList', 'outdent', 'indent', 'fontColor', 'highlight', 'specialCharacters', 'link', 'undo',
          'redo',
        ],
        shouldNotGroupWhenFull: true
      },
      indentBlock: {
        offset: 17,
        unit: 'px'
      },
      list: {
        properties: {
          styles: true,
          startIndex: true,
          reversed: true
        }
      },
      placeholder: 'Type your biografi',
      htmlSupport: {
        allow: [{
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }]
      },
      htmlEmbed: {
        showPreviews: true
      },
      link: {
        decorators: {
          addTargetToExternalLinks: true,
          defaultProtocol: 'https://',
        }
      },
      removePlugins: [
        // 'ExportPdf',
        // 'ExportWord',
        'CKBox',
        'CKFinder',
        'EasyImage',
        // 'Base64UploadAdapter',
        'RealTimeCollaborativeComments',
        'RealTimeCollaborativeTrackChanges',
        'RealTimeCollaborativeRevisionHistory',
        'PresenceList',
        'Comments',
        'TrackChanges',
        'TrackChangesData',
        'RevisionHistory',
        'Pagination',
        'WProofreader',
        'MathType'
      ]

    })
    .then(editor => {
      const wordCountPlugin = editor.plugins.get('WordCount');
      const wordCountWrapper = document.getElementById('word-count');

      wordCountWrapper.appendChild(wordCountPlugin.wordCountContainer);
      editor.model.document.on('change:data', () => {
        //  console.log(editor.getData());
        $wire.set('bio', editor.getData());
      });
    })
    .catch(error => {
      console.error('CKEditor Error:', error);
    });
</script>
@endscript