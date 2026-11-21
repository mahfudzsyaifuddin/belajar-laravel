<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login SIM-Surat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-slate-100 to-indigo-100 text-slate-800 antialiased min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white border border-slate-200/90 rounded-2xl shadow-md p-7">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
            <span class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-gradient-to-tr from-blue-700 to-indigo-600 text-white shadow-sm shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </span>
            <div>
                <h1 class="text-xl font-bold text-slate-900">Login SIM-Surat</h1>
                <p class="text-xs text-slate-500 mt-0.5">Masuk menggunakan akun Anda untuk mengakses sistem</p>
            </div>
        </div>

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
                @error('email')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">Password</label>
                <input id="password" type="password" name="password"
                       class="w-full rounded-xl border border-slate-300 px-3.5 py-2 text-sm text-slate-900 focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-600/20">
                @error('password')
                    <p class="text-xs font-medium text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full py-2.5 px-4 rounded-xl bg-gradient-to-r from-blue-700 to-indigo-600 hover:from-blue-800 hover:to-indigo-700 text-white text-sm font-semibold shadow-sm transition cursor-pointer">
                Login
            </button>
        </form>
    </div>
</body>
</html>