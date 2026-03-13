@props(['title', 'description', 'icon', 'link', 'color' => 'indigo'])

@php
    $colorClasses = [
        'indigo' => 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400 border-indigo-100',
        'blue' => 'bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 border-blue-100',
        'teal' => 'bg-teal-50 text-teal-600 dark:bg-teal-900/30 dark:text-teal-400 border-teal-100',
        'amber' => 'bg-amber-50 text-amber-600 dark:bg-amber-900/30 dark:text-amber-400 border-amber-100',
    ];
    $accentColor = [
        'indigo' => 'bg-indigo-600',
        'blue' => 'bg-blue-600',
        'teal' => 'bg-teal-600',
        'amber' => 'bg-amber-600',
    ];
    $currentColorClass = $colorClasses[$color] ?? $colorClasses['indigo'];
    $currentAccentColor = $accentColor[$color] ?? $accentColor['indigo'];
@endphp

<div class="group p-8 rounded-2xl border border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900/50 hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
    <div class="size-14 rounded-2xl {{ $currentColorClass }} flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
        <span class="material-symbols-outlined text-3xl">{{ $icon }}</span>
    </div>
    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">{{ $title }}</h3>
    <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed mb-6 line-clamp-3">
        {{ $description }}
    </p>
    <div class="h-1.5 w-12 {{ $currentAccentColor }} rounded-full mb-6 group-hover:w-full transition-all duration-500"></div>
    <a href="{{ $link }}" class="inline-flex items-center text-sm font-bold text-primary hover:gap-2 transition-all">
        Lihat Detail 
        <span class="material-symbols-outlined text-base ml-1">arrow_right_alt</span>
    </a>
</div>
