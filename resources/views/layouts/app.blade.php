<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Images host - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main>
        @yield('content')
    </main>

    <footer>
        @vite('resources/js/scripts.js')
    </footer>
</body>
</html>
