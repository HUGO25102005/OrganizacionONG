<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex items-center justify-between space-x-7">
            <div class="flex space-x-7 items-center">
                <a href="{{ route('coordinador.programas', ['seccion' => 1]) }}">
                    <h2 class="font-semibold text-xl flex justify-center items-center text-gray-800 hover:bg-gray-100 transition-transform duration-200 hover:scale-110 hover:text-black p-2 rounded leading-tight min-w-[200px] {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }}">
                        {{ __('Programas Educativos') }}
                    </h2>
                </a>
                <a href="{{ route('coordinador.programas', ['seccion' => 2]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 hover:bg-gray-100 hover:text-black p-2 transition-transform duration-200 hover:scale-110 rounded leading-tight min-w-[200px] {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }}">
                        {{ __('Solicitud de Programas') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>
    


    <div class="bg-[#F6F8FF] w-full max-w-[95%] md:max-w-[1450px] h-auto my-6 p-4 md:p-8 shadow-lg rounded-2xl mx-auto">
        @switch($seccion)
            @case(1)
                @include('Dashboard.Coordinador.layouts.sections.programas_list')
            @break

            @case(2)
                @include('Dashboard.Coordinador.layouts.sections.programas_solicitudes')
            @break
        @endswitch
        
        <div class="fixed bottom-5 right-5 z-100">
            <a href="{{ route('coordinador.chat') }}">
                <button 
                    class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                    <i class='bx bx-message-square-dots text-2xl'></i>
                </button>
            </a>
        </div>
    </div>
</x-app-layout>