<button
 {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-2 py-2 bg-violet-600 dark:bg-violet-600 border border-violet-600 dark:border-violet-600 rounded-lg font-semibold text-sm text-gray-200 dark:text-gray-200 tracking-widest shadow-sm hover:opacity-75 focus:outline-none disabled:opacity-50 transition ease-in-out duration-150']) }}>
 {{ $slot }}
</button>