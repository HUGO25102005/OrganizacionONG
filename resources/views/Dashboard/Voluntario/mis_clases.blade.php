<!--Mis clases--->

<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex space-x-7 items-center">
            <div
                class="w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('vol.misClases', ['seccion' => 1]) }}">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('En Proceso') }}
                    </h2>
                </a>
            </div>

            <div
                class="w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('vol.misClases', ['seccion' => 2]) }}">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Terminados') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>

    @if ($seccion == 1)
        @include('Dashboard.Voluntario.layouts.seccion.clases_en_proceso')
    @else
        @include('Dashboard.Voluntario.layouts.seccion.clases_terminadas')
    @endif

</x-app-layout>
