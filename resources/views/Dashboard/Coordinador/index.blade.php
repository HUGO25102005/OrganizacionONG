{{-- <x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
     --}}

<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>

    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
        
        <div class="flex justify-center items-center gap-[30px] pb-[10px]"> 
            <h1 class="text-[45px] font-sans font-medium">Bienvenido</h1>
        </div>
        <div class="flex justify-center items-center gap-[30px] pb-[10px]"> 
            <h2 class="text-[24px] font-sans font-extralight">Buen día, {{ session('name') }}!</h2>
        </div>
        <div class="flex justify-center items-center gap-[10px] pb-[10px]">
            <img src="{{ asset('images/logo_n.png') }}" alt="Logo" class="w-[100px] h-[100px]">
        </div>
        <div class="flex justify-center items-center gap-[10px] pb-[10px]"> 
            <h3 class="text-[15px] font-sans font-[100]">By InnovateSoft</h3>
        </div>
        
        
    </div>
</x-app-layout>