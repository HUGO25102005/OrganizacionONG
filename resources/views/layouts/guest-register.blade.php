<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center items-center min-h-screen m-0 bg-cover bg-center"
    style="background-image: url('{{ asset('storage/image/fofondo3.jpg') }}');">

    <div class="relative w-[90vw] h-[90vh] md:w-[700px] md:h-[800px] flex justify-center items-center">
        <div class="absolute w-[100vw] h-[100vh] md:w-[850px] md:h-[950px] bg-white shadow-lg flex justify-center items-center" style="clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);">

            <div class="w-[80vw] h-auto md:w-[400px] md:h-auto bg-[#DDE3E7] rounded-[3%] shadow-[0px_0px_15px_1px_rgba(105,105,105,1)] flex flex-col justify-center items-center p-5">

                <h2 class="text-2xl mb-2 text-gray-800 text-center">Bienvenido</h2>
                <h4 class="text-lg mb-4 text-gray-500 text-center">Inicie sesión</h4>

                <!-- Aquí se insertarán los formularios desde otros archivos -->
                <div class="w-full space-y-4">
                    {{ $slot }}
                </div>

            </div>
        </div>
    </div>
</body>

</html>
