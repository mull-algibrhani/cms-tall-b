@props(['disabled' => false, 'placeholder' => ''])

<input {{ $disabled ? 'disabled' : '' }} placeholder="{{ $placeholder }}" {!! $attributes->merge(['class' =>
'border-gray-300 dark:border-gray-700
dark:bg-gray-900 dark:text-gray-300 focus:border-violet-500 dark:focus:border-violet-600 focus:ring-violet-500
dark:focus:ring-violet-600 rounded-md shadow-sm']) !!}>