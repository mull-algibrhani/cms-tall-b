@props([
'name',
'show' => false,
'maxWidth' => '4xl'
])

@php
$maxWidth = [
'sm' => 'sm:max-w-sm',
'md' => 'sm:max-w-md',
'lg' => 'sm:max-w-lg',
'xl' => 'sm:max-w-xl',
'2xl' => 'sm:max-w-2xl',
'3xl' => 'sm:max-w-3xl',
'4xl' => 'sm:max-w-4xl',
][$maxWidth];
@endphp

<div x-data="{ isOpen: false }" x-cloak x-show="isOpen" x-transition.opacity.duration.200ms
 x-trap.inert.noscroll="isOpen" @keydown.esc.window="isOpen = false" @open-modal.window="isOpen = true; $nextTick(() => { 
         if(document.getElementById('editor')) {
             initializeEditor();
         }
     })" @close-modal.window="isOpen = false"
 class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 bg-black/20 backdrop-blur-md items-center justify-center"
 role="dialog" aria-modal="true" aria-labelledby="ModalCrud" id="style-scrolbar">
 <div x-show="isOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
  x-transition:enter-start="opacity-0 scale-y-0" x-transition:enter-end="opacity-100 scale-y-100"
  class="mb-6 sm:w-full {{ $maxWidth }} sm:mx-auto flex flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300">
  {{$slot}}
 </div>
</div>