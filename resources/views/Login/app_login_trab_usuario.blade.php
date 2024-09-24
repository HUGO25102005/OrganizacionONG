
@extends('Login.layouts.login')

@section('forms')


    <!-- Contenedor para la selección de tipo de usuario -->
    <div class="w-[350px] bg-gray-200 rounded-lg shadow-md p-8 mb-6">
        @csrf
        <h2 class="text-2xl text-center text-gray-800 mb-4">¿Cómo quieres acceder?</h2>
        <div class="flex justify-between">
            <a href="{{ route('Trabajador.index') }}"
            class="w-[48%] py-3 text-center text-white bg-blue-700 rounded-lg shadow-md hover:bg-blue-800 focus:outline-none">
            Trabajador
            </a>
            <a href="{{ route('Beneficiario.index') }}"
            class="w-[48%] py-3 text-center text-white bg-green-700 rounded-lg shadow-md hover:bg-green-800 focus:outline-none">
            Beneficiario
            </a>
        </div>
    </div>

        
@endsection

