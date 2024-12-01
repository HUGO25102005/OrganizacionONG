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
    style="background-image: url('{{ asset('/images/fofondo3.jpeg') }}');">

    <a href="{{ route('conocenos.index') }}" 
        class="absolute top-8 left-8 bg-white text-black py-2 px-4 rounded-lg shadow hover:bg-gray-200 transition">
        <i class="fas fa-arrow-left"></i><b>&nbsp; Página principal</b>
    </a>
    
    <div class="relative w-[90vw] h-[90vh] md:w-[630px] md:h-[720px] flex justify-center items-center">
        <!-- Hexágono de fondo con el logo arriba -->
        <div class="absolute w-[80vw] h-[80vh] md:w-[630px] md:h-[740px] shadow-lg flex flex-col justify-center items-center" 
             style="clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
                    background-color: #f6f6fe;">
            
            <!-- Logo centrado arriba en el hexágono -->
            <div class="absolute top-[-40px] md:top-[70px] w-[70px] h-[70px] md:w-[80px] md:h-[80px] flex items-center justify-center rounded-full">
                <img src="{{ asset('/images/logo_n.png') }}" alt="Logo" class="w-full h-full object-cover">
            </div>

    
            <!-- Caja de inicio de sesión -->
            <div class="w-[80vw] h-[50vh] md:w-[350px] md:h-[400px] bg-[#DDE3E7] rounded-[3%] shadow-[0px_0px_15px_1px_rgba(105,105,105,1)] flex flex-col justify-center items-center"  
                 style="background-color: #efeff9; box-shadow: 0px 3px 6px rgba(117, 148, 202, 0.391); margin-top: 40px;">
                
                <h2 class="text-2xl mb-2 text-gray-800 text-center">Bienvenido</h2>
                <h4 class="text-lg mb-8 text-gray-500 text-center">Inicie sesión</h4>
                {{ $slot }}
            </div>
        </div>
    </div>
    
</body>

</html>


