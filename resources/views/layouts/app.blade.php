<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIM-Surat')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('surat-masuk.index') }}">Surat Masuk</a> |
        <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a> |
        @auth
            <span>Masuk sebagai: {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display: inline">
            @csrf
            <button type="submit">Keluar</button>
            </form>
        @endauth
    </nav>
    <hr>
    <main>@yield('content')</main>
</body>
</html>