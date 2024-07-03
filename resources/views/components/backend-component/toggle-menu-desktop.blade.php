<!-- Hamburger Menu Mobile -->
<div class="hidden sm:flex justify-center items-center">
 <button @click="openSide = ! openSide"
  class="flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-300 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-300 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
  <x-icons.side-open x-show="openSide" class="h-6 w-6 text-gray-500 dark:text-gray-300" />
  <x-icons.side-close x-show=" ! openSide" class="h-6 w-6 text-gray-500 dark:text-gray-300" />
 </button>
</div>
<!-- End Hamburger Menu Mobile -->