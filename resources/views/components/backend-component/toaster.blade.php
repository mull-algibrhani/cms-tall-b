<div x-data="{ alert: false, message: '', type: '' }" x-cloak x-show="alert" x-init="
        window.addEventListener('showToast', (event) => {
            message = event.detail.message;
            type = event.detail.type;
            alert = true;
            setTimeout(() => alert = false, 5000);
        });
     " x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-full"
  x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-in duration-300"
  x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-full"
  class="fixed right-0 bottom-0 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
  role="alert">

  <!-- Icon berdasarkan type -->
  <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg" :class="{
            'text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200': type === 'success',
            'text-red-500 bg-red-100 dark:bg-red-600 dark:text-red-200': type === 'error'
         }">
    <!-- Icon success -->
    <svg x-show="type === 'success'" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="currentColor" viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
    </svg>

    <!-- Icon error -->
    <svg x-show="type === 'error'" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
      fill="currentColor" aria-hidden="true">
      <path fill-rule="evenodd"
        d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
        clip-rule="evenodd" />
    </svg>
  </div>

  <!-- Pesan -->
  <div class="ms-3 text-sm font-normal" x-text="message"></div>

  <!-- Tombol close -->
  <button @click="alert = false" type="button"
    class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
    </svg>
  </button>
</div>