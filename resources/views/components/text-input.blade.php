@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm']) }}>
