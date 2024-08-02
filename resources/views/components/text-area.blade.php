@props(['disabled' => false, 'placeholder' => ''])
<textarea {{ $disabled ? 'disabled' : '' }} placeholder="{{ $placeholder }}" {!! $attributes->merge(['class' =>
'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm']) !!}>
{{ $slot }}
</textarea>