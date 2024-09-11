
@extends('Login.layouts.login')

@section('forms')

    <div class="w-[350px] h-[400px] bg-gray-200 rounded-lg shadow-md p-8">
        <h2 class="text-2xl text-center text-gray-800 mb-2">Bienvenido Trabajador</h2>
        <h4 class="text-lg text-center text-gray-500 mb-8">Inicie sesión</h4>

        <form class="space-y-6" method="POST" action="{{ route('loginTrabajador.authenticate') }}">
            <div class="relative">
                <i class="fa-regular fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="text" id="correo" name="correo" placeholder="Correo" required class="w-full p-3 pl-10 rounded-lg bg-gray-100 border-none shadow-inner focus:outline-none">
            </div>

            <div class="relative">
                <i class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input type="password" id="password" name="password" placeholder="Contraseña" required class="w-full p-3 pl-10 rounded-lg bg-gray-100 border-none shadow-inner focus:outline-none">
            </div>

            <button type="submit" class="w-full p-3 text-white bg-blue-900 rounded-lg shadow-inner transition-transform transform hover:scale-105 focus:outline-none">Iniciar Sesión</button>
        </form>
    </div>
        
@endsection