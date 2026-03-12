<nav class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*')">
                        {{ __('Settings') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.external-links.index')" :active="request()->routeIs('admin.external-links.*')">
                        {{ __('External Links') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.ekk-scores.index')" :active="request()->routeIs('admin.ekk-scores.*')">
                        {{ __('EKK Scores') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.kerja-samas.index')" :active="request()->routeIs('admin.kerja-samas.*')">
                        {{ __('Kerja Sama') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.dokumentasis.index')" :active="request()->routeIs('admin.dokumentasis.*')">
                        {{ __('Dokumentasi') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- User Info + Logout (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 sm:gap-4">
                <span class="text-sm font-medium text-gray-500">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-sm font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 hover:text-red-700 transition-all">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        Log Out
                    </button>
                </form>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div id="mobile-menu" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*')">
                {{ __('Settings') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.external-links.index')" :active="request()->routeIs('admin.external-links.*')">
                {{ __('External Links') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.ekk-scores.index')" :active="request()->routeIs('admin.ekk-scores.*')">
                {{ __('EKK Scores') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.kerja-samas.index')" :active="request()->routeIs('admin.kerja-samas.*')">
                {{ __('Kerja Sama') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.dokumentasis.index')" :active="request()->routeIs('admin.dokumentasis.*')">
                {{ __('Dokumentasi') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings (Mobile) -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 px-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-all">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
