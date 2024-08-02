@props(['value','sup'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
 <span class="flex items-center">
  {{ $value ?? $slot }}
  <sup class="text-red-600 dark:text-red-400 text-sm font-semibold">{{ $sup ?? $slot }}</sup>
 </span>
</label>