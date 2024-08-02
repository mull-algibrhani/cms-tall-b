<button
 {{ $attributes->merge(['type' => 'submit', 'class' => 'uppercase inline-flex items-center px-2 py-2 bg-violet-600 dark:bg-violet-600 border border-violet-600 dark:border-violet-600 rounded-lg font-semibold text-sm text-gray-200 dark:text-gray-200 tracking-widest shadow-sm hover:opacity-75 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2 dark:focus:ring-offset-violet-800 disabled:opacity-75 transition ease-in-out duration-150']) }}>
 {{ $slot }}
</button>