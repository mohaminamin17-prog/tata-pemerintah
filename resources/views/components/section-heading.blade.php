@props(['title', 'subtitle' => null, 'center' => true])

<div class="mb-12 {{ $center ? 'text-center' : '' }}">
    <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-4xl">
        {{ $title }}
    </h2>
    <div class="mt-4 h-1.5 w-24 bg-primary {{ $center ? 'mx-auto' : '' }} rounded-full"></div>
    @if($subtitle)
        <p class="mt-6 text-lg text-slate-600 dark:text-slate-400 max-w-2xl {{ $center ? 'mx-auto' : '' }}">
            {{ $subtitle }}
        </p>
    @endif
</div>
