<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
 <div @click="open = ! open">
  {{ $trigger }}
 </div>

 <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
  x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
  x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" style="display: none;"
  @click="open = false" {{ $attributes }}>
  <div
   class="text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
   {{ $content }}
  </div>
 </div>
</div>