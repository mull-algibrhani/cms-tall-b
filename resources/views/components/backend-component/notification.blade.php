<!-- Button menu Notification -->
<li class="relative" x-data="{ openNotificationsMenu: false }">
 <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-violet"
  @click="openNotificationsMenu = ! openNotificationsMenu " @keydown.escape="openNotificationsMenu = false"
  @click.outside="openNotificationsMenu = false" aria-label="Notifications" aria-haspopup="true">
  <x-icons.notification />
  <!-- Notification badge -->
  <span aria-hidden="true"
   class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
 </button>
 <!-- menu Notification -->
 <div x-show="openNotificationsMenu" x-transition:enter="transition ease-out duration-200"
  x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
  x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
  x-transition:leave-end="opacity-0 scale-95" style="display: none;">
  <div class="relative rounded-md ring-1 ring-black ring-opacity-5">
   <ul
    class="absolute right-0 -top-6 w-40 md:w-56 p-2 mt-8 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
    <li class="flex">
     <a
      class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800"
      href="#">
      <span>Messages</span>
      <span
       class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-300 bg-red-600 rounded-full">
       0
      </span>
     </a>
    </li>
    <li class="flex">
     <a
      class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md text-gray-500 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-800"
      href="#">
      <span>Info</span>
      <span
       class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-300 bg-red-600 rounded-full">
       0
      </span>
     </a>
    </li>
   </ul>
  </div>
 </div>
 <!-- menu Notification end -->
</li>
<!-- Button menu Notification end -->