<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            <x-alerts-component severity="error" title="Error" message=" Hola mundo " />
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-danger">
            <x-alerts-component severity="success" title="Success" message=" Adios mundo " />
        </div>
    @endif


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session()->has('name'))
                        <h1>Bienvenido {{ session('name') }}</h1>
                        <h2>Rol: {{ session('rol') }}</h2>
                    @endif
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
