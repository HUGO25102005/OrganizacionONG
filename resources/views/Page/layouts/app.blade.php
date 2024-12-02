<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo.png"') }}">

    <!-- Scripts -->
    @yield('importaciones')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dashboard.css', 'resources/js/scroll.js', 'resources/js/terminosCondiciones.js'])

    <title>Pi</title>
</head>

<body>
    <div id="contenido-dinamico" class="fixed inset-0 bg-white z-[100] hidden overflow-auto"></div>
    <header>
        @include('Page.layouts.navigation')
    </header>

    <div class="alert alert-success">
        <x-alerts-component />
    </div>
    
    @yield('content')

    <!-----------footer------------->

    <section class="footer">

        @include('Page.layouts.footer')

    </section>

</body>

