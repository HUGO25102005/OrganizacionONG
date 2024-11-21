<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex space-x-4">
            <a href="{{ route('admin.donaciones', ['seccion' => 1]) }}">
                <h2
                    class="font-semibold text-xl flex justify-center items-center transition-transform duration-200 hover:scale-110 text-gray-800 hover:bg-gray-100 cursor-pointer hover:text-black p-2 rounded leading-tight min-w-[200px] {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }}">
                    {{ __('Donaciones') }}
                </h2>
            </a>
            <a href="{{ route('admin.donaciones', ['seccion' => 2]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-gray-100 transition-transform duration-200 hover:scale-110 cursor-pointer hover:text-black p-2 rounded leading-tight min-w-[200px] {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }}">
                    {{ __('Campañas de recaudación') }}
                </h2>
            </a>
            @if ($seccion == 2)
                {{-- <div class="">
                    <a href="{{ route('pdf.generar') }}">
                        <i class='bx bxs-file-pdf' style="transform: scale(2.5)"></i>
                    </a>
                </div> --}}
            @endif
        </div>
    </x-slot>


    @switch($seccion)
        @case(1)
            @include('Dashboard.Admin.layouts.sections.donaciones-info')
        @break

        @case(2)
            @include('Dashboard.Admin.layouts.sections.donaciones-campañas')
        @break

        @default
    @endswitch

    <x-support-widget :roles="['Coordinador']" />
    
</x-app-layout>
