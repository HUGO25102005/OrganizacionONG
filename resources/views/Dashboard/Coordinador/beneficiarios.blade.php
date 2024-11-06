<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>
    
<x-slot name="header">
    <div class="flex flex-col md:flex-row md:space-x-7 items-center space-y-4 md:space-y-0">
        <div class="w-full md:w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
            <a href="{{ route('coordinador.beneficiarios', ['rol' => 'Coordinador', 'seccion' => 1]) }}">
                <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                    {{ __('Lista de Usuarios') }}
                </h2>
            </a>
        </div>
        
        <div class="w-full md:w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
            <a href="{{ route('coordinador.beneficiarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                    {{ __('Solicitudes') }}
                </h2>
            </a>
        </div>
    </div>
</x-slot>

<div class="bg-[#F6F8FF] w-full max-w-[95%] md:max-w-[1450px] h-auto my-6 p-4 md:p-8 shadow-lg rounded-2xl mx-auto">
    @if ($seccion == 1)
        @include('Dashboard.Coordinador.layouts.sections.usuarios-list')
    @else
        @include('Dashboard.Coordinador.layouts.sections.usuarios-solicitudes')
    @endif
</div>
</x-app-layout>
