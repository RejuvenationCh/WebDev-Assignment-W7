<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/theme.js') }}"></script>
    <title>@yield('title', 'Chris Brilianto Chandra')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="bg-white text-slate-900 dark:bg-neutral-900 dark:text-slate-50">
    @include('partials.navbar')
    @yield('content')
    @include('partials.footer')
</body>
</html>
