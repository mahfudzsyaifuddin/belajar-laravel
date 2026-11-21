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
        <a href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
    </nav>
    <hr>
    <main>@yield('content')</main>
</body>
</html>