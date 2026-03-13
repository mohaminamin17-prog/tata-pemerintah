<x-guest-layout>
    <!-- Top Navigation -->
    <header class="w-full bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo Tojo Una-Una" class="h-10 w-auto object-contain">
                    <span class="text-slate-900 text-lg font-bold tracking-tight">Tapem Tojo Una-Una</span>
                </div>
                <div class="flex items-center">
                    <a class="text-slate-600 hover:text-[#1152d4] transition-colors text-sm font-medium flex items-center gap-1" href="{{ route('public.beranda') }}">
                        <span class="material-symbols-outlined text-[20px]">home</span>
                        Beranda
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center p-6 min-h-[calc(100vh-64px)]" style="background: linear-gradient(135deg, rgba(17,82,212,0.05) 0%, #f6f6f8 50%, rgba(17,82,212,0.05) 100%);">
        <div class="w-full max-w-md">
            <!-- Login Card -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-slate-200">
                <!-- Header Decoration -->
                <div class="h-2 bg-[#1152d4]"></div>
                <div class="p-8 sm:p-10">
                    <div class="text-center mb-8">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-[#1152d4]/10 mb-4">
                            <span class="material-symbols-outlined text-[#1152d4] text-4xl">admin_panel_settings</span>
                        </div>
                        <h1 class="text-2xl font-bold text-slate-900">Administrator Login</h1>
                        <p class="text-slate-500 text-sm mt-2">Masuk untuk mengelola data tata pemerintahan</p>
                    </div>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 p-3 bg-green-50 border border-green-200 rounded-lg text-sm text-green-700">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg">
                            <ul class="list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="email">Email</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-slate-400 text-[20px]">person</span>
                                </div>
                                <input class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#1152d4] focus:border-transparent transition-all sm:text-sm"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    placeholder="admin@tapem.go.id"
                                    required
                                    autofocus />
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1.5" for="password">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-slate-400 text-[20px]">lock</span>
                                </div>
                                <input class="block w-full pl-10 pr-3 py-3 border border-slate-300 rounded-lg bg-white text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-[#1152d4] focus:border-transparent transition-all sm:text-sm"
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="••••••••"
                                    required
                                    autocomplete="current-password" />
                            </div>
                        </div>

                        <!-- Remember Me & Forgot -->
                        <div class="flex items-center justify-end">
                            <!-- Remember Me removed for security fortification -->
                            @if (Route::has('password.request'))
                                <div class="text-sm">
                                    <a class="font-medium text-[#1152d4] hover:text-[#1152d4]/80 transition-colors" href="{{ route('password.request') }}">Lupa Password?</a>
                                </div>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <div>
                            <button type="submit" class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-[#1152d4] hover:bg-[#1152d4]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1152d4] transition-all">
                                <span class="material-symbols-outlined text-[20px]">login</span>
                                Masuk ke Dashboard
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Footer Info -->
                <div class="px-8 py-4 bg-slate-50 border-t border-slate-200 text-center">
                    <p class="text-xs text-slate-500">
                        © {{ date('Y') }} Bagian Tata Pemerintahan Kabupaten Tojo Una-Una
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Background Decoration -->
    <div class="fixed inset-0 -z-10 pointer-events-none overflow-hidden opacity-20">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#1152d4] rounded-full blur-[100px]"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-[#1152d4] rounded-full blur-[100px]"></div>
    </div>
</x-guest-layout>
