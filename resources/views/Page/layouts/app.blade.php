<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo.png"') }}">

    <!-- Scripts -->
    @yield('importaciones')

    <title>Pi</title>
</head>

<body>
    <header>
        @include('Page.layouts.navigation')
    </header>

    
    @yield('content')

    <!-----------footer------------->

    <section class="footer">

        @include('Page.layouts.footer')

    </section>

</body>
