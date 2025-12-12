@props(['title', 'value', 'icon', 'color' => 'blue', 'trend' => null])

@php
    $colorClasses = [
        'blue' => 'from-blue-500 to-blue-600',
        'green' => 'from-green-500 to-green-600',
        'yellow' => 'from-yellow-500 to-yellow-600',
        'red' => 'from-red-500 to-red-600',
        'purple' => 'from-purple-500 to-purple-600',
        'indigo' => 'from-indigo-500 to-indigo-600',
    ];
    
    $bgColorClasses = [
        'blue' => 'from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 border-blue-200 dark:border-blue-800',
        'green' => 'from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 border-green-200 dark:border-green-800',
        'yellow' => 'from-yellow-50 to-yellow-100 dark:from-yellow-900/20 dark:to-yellow-800/20 border-yellow-200 dark:border-yellow-800',
        'red' => 'from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 border-red-200 dark:border-red-800',
        'purple' => 'from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 border-purple-200 dark:border-purple-800',
        'indigo' => 'from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 border-indigo-200 dark:border-indigo-800',
    ];
    
    $gradient = $colorClasses[$color] ?? $colorClasses['blue'];
    $bgGradient = $bgColorClasses[$color] ?? $bgColorClasses['blue'];
@endphp

<div class="bg-gradient-to-br {{ $bgGradient }} rounded-xl p-6 border shadow-sm hover:shadow-md transition-shadow duration-300">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">
                {{ $title }}
            </p>
            <p class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ $value }}
            </p>
            @if($trend)
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    {{ $trend }}
                </p>
            @endif
        </div>
        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br {{ $gradient }} rounded-xl flex items-center justify-center shadow-lg">
            {!! $icon !!}
        </div>
    </div>
</div>