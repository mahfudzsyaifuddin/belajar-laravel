<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIM-Surat')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-100 via-blue-50/40 to-indigo-50/50 text-slate-800 antialiased min-h-screen flex flex-col">
    <nav class="bg-white/95 backdrop-blur border-b border-slate-200/80 sticky top-0 z-20 shadow-2xs">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
            <div class="flex items-center gap-5 sm:gap-7">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2.5 text-lg font-extrabold tracking-tight text-slate-900">
                    <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-tr from-blue-700 to-indigo-600 text-white shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <span class="bg-gradient-to-r from-blue-800 to-indigo-600 bg-clip-text text-transparent">SIM-Surat</span>
                </a>

                <div class="flex items-center gap-1 sm:gap-1.5 text-sm font-medium">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg transition {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-xs' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('surat-masuk.index') }}"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg transition {{ request()->routeIs('surat-masuk.*') ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-xs' : 'text-slate-600 hover:bg-blue-50 hover:text-blue-700' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <span>Surat Masuk</span>
                    </a>

                    <a href="{{ route('surat-keluar.index') }}"
                       class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg transition {{ request()->routeIs('surat-keluar.*') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-xs' : 'text-slate-600 hover:bg-indigo-50 hover:text-indigo-700' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        <span>Surat Keluar</span>
                    </a>
                </div>
            </div>

            @auth
                <div class="flex items-center gap-2.5 text-sm">
                    <span class="hidden sm:inline-flex items-center gap-1.5 bg-blue-50 text-blue-800 border border-blue-200/80 px-3 py-1 rounded-full text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>{{ auth()->user()->role ?? auth()->user()->name }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline m-0">
                        @csrf
                        <button type="submit" title="Keluar"
                                class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold bg-rose-50 text-rose-700 hover:bg-rose-600 hover:text-white border border-rose-200 transition cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Keluar</span>
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <main class="max-w-5xl w-full mx-auto px-4 sm:px-6 py-8 flex-1">
        <div class="bg-white border border-slate-200/90 rounded-2xl shadow-sm p-6 sm:p-7">
            @yield('content')
        </div>
    </main>
</body>
</html>