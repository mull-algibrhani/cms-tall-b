<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Title -->
 <title>{{ $title ?? config('app.name') }}</title>
 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased transition-colors duration-700">
 <div class="flex h-screen bg-gray-200 dark:bg-gray-900">
  <div x-data :class="$store.openSide && 'block'">
   <!-- Sidebar Destop-->
   <livewire:layout.menu-desktop />
  </div>
  <div class="flex flex-col flex-1 w-full" x-data="{open: false}">
   <!-- Header -->
   <livewire:layout.header />
   <!-- Menu Mobile-->
   <livewire:layout.menu-mobile />
   <!-- Page Content -->
   <main id="style-scrolbar" class="h-full overflow-y-auto">
    {{ $slot }}
   </main>
   <!-- Toaster start -->
   @if (session()->has('success'))
   <x-backend-component.toaster-success />
   @endif
   @if (session()->has('error'))
   <x-backend-component.toaster-error />
   @endif
   <!-- Toaster End -->
  </div>
 </div>
 @stack('scripts')
</body>

</html>