<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex items-center justify-between space-x-7">
            <div class="flex space-x-7 items-center">
                <a href="{{ route('coordinador.programas', ['seccion' => 1]) }}">
                    <h2 class="font-semibold text-xl flex justify-center items-center text-gray-800 hover:bg-gray-100 transition-transform duration-200 hover:scale-110 hover:text-black p-2 rounded leading-tight min-w-[200px] {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }}">
                        {{ __('Recursos') }}
                    </h2>
                </a>
                <a href="{{ route('coordinador.programas', ['seccion' => 2]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 hover:bg-gray-100 hover:text-black p-2 transition-transform duration-200 hover:scale-110 rounded leading-tight min-w-[200px] {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }}">
                        {{ __('Solicitud de presupuesto') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>
    



    @switch($seccion)
        @case(1)
            @include('Dashboard.Coordinador.layouts.sections.recursos-disponibles');
        @break

        @case(2)
            @include('Dashboard.Coordinador.layouts.sections.recursos-programas');
        @break

        @default
    @endswitch

</x-app-layout>