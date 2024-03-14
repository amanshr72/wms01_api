@php
    $typeClasses = [
        'success' => 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400',
        'danger' => 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400',
    ];

    $typeClass = $typeClasses[$type] ?? '';
@endphp

@if(session()->has($type))
    <div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm rounded-lg', 'role' => 'alert']) . ' ' . $typeClass }}>
        <span class="font-medium">{{ ucfirst($type) }} alert!</span> {{ session($type) }}
        {{ $slot }}
    </div>
@endif