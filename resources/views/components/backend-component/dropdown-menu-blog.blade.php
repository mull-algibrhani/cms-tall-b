<ul>
 <li
  class="relative justify-center items-center px-6 pt-2 mx-2 my-2 rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-slate-900"
  x-data="{ postMenuOpen : false }">
  <span id="post"
   class="{{ request()->is('blog/*') ? '' : 'hidden' }} absolute inset-y-0 left-0 w-1 bg-violet-600 rounded-tr-lg rounded-br-lg"
   aria-hidden="true"></span>
  <button
   class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-violet-500 dark:hover:text-violet-400"
   @click="postMenuOpen = ! postMenuOpen" aria-haspopup="true">
   <span class="inline-flex items-center">
    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat-square-text"
     viewBox="0 0 16 16">
     <path
      d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
     <path
      d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
    </svg>
    <span class="ml-4">Blog</span>
   </span>
   <svg x-show="postMenuOpen" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
    class="bi bi-caret-down" viewBox="0 0 16 16" style="display: none;">
    <path
     d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
   </svg>
   <svg x-show="!postMenuOpen" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
    class="bi bi-caret-left" viewBox="0 0 16 16">
    <path
     d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z" />
   </svg>
  </button>
  <div x-show="postMenuOpen" x-transition class="from-left" style="display: none;">
   <ul
    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium rounded-md bg-gray-200 text-violet-700 dark:text-violet-400 dark:bg-gray-900"
    aria-label="submenu">
    <li class="px-2 py-1 transition-colors duration-150 hover:text-violet-400 dark:hover:text-violet-700">
     <a class="inline-flex w-full items-center" href="/blog/new-post" wire:navigate>
      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
       class="bi bi-pencil-square" viewBox="0 0 16 16">
       <path
        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
       <path fill-rule="evenodd"
        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
      </svg>
      <span class="ml-2">New post</span>
     </a>
    </li>
    <li class="px-2 py-1 transition-colors duration-150 hover:text-violet-400 dark:hover:text-violet-700">
     <a class="inline-flex w-full items-center" href="/blog/posts" wire:navigate>
      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-card-list"
       viewBox="0 0 16 16">
       <path
        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
       <path
        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
      </svg>
      <span class="ml-2">Posts</span>
     </a>
    </li>
    <li class="px-2 py-1 transition-colors duration-150 hover:text-violet-400 dark:hover:text-violet-700">
     <a class="inline-flex w-full items-center" href="/blog/drafts" wire:navigate>
      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-file-earmark-text"
       viewBox="0 0 16 16">
       <path
        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
       <path
        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
      </svg>
      <span class="ml-2">Drafts</span>
     </a>
    </li>
    <li class="px-2 py-1 transition-colors duration-150 hover:text-violet-400 dark:hover:text-violet-700">
     <a class="inline-flex w-full items-center" href="/blog/categorys" wire:navigate>
      <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list-check"
       viewBox="0 0 16 16">
       <path fill-rule="evenodd"
        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
      </svg>
      <span class="ml-2">Categorys</span>
     </a>
    </li>
    <li class="px-2 py-1 transition-colors duration-150 hover:text-violet-400 dark:hover:text-violet-700">
     <a class="inline-flex w-full items-center" href="/blog/archives" wire:navigate>
      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-journal-bookmark"
       viewBox="0 0 16 16">
       <path fill-rule="evenodd"
        d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
       <path
        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
       <path
        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
      </svg>
      <span class="ml-2">Archives</span>
     </a>
    </li>
    <li class="px-2 py-1 transition-colors duration-150 hover:text-violet-400 dark:hover:text-violet-700">
     <a class="inline-flex w-full items-center" href="/blog/authors" wire:navigate>
      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
       <path
        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
      </svg>
      <span class="ml-2">Authors</span>
     </a>
    </li>
   </ul>
  </div>
 </li>
</ul>