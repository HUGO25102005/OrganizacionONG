<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        
        <div class="flex items-center justify-between space-x-7">
            <div class="flex items-center">
                <a href="{{route('admin.recursos', ['seccion' => 1])}} ">
                    <h2 class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] hover:text-white p-2 rounded leading-tight {{ $seccion == 1 ? 'bg-slate-400' : 'bg-slate-200' }}">
                        {{ __('Recursos') }}
                    </h2>
                </a>
                <a href="{{route('admin.recursos', ['seccion' => 2]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] hover:text-white p-2 rounded leading-tight {{ $seccion == 2 ? 'bg-slate-400' : 'bg-slate-200' }}">
                        {{ __('Solicitud de presupuesto') }}
                    </h2>
                </a>
            </div>
            
        </div>
    </x-slot>


    @switch($seccion)
        @case(1)
            @include('Dashboard.Admin.layouts.sections.recursos-disponibles');
        @break

        @case(2)
            @include('Dashboard.Admin.layouts.sections.recursos-programas');
        @break

        @default
    @endswitch

</x-app-layout>
