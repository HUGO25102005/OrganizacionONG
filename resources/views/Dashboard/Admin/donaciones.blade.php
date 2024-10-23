<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <div class="flex space-x-4">
            <a href="{{ route('admin.donaciones', ['seccion' => 1]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] cursor-pointer hover:text-white p-2 rounded leading-tight {{ $seccion == 1 ? 'bg-slate-400' : 'bg-slate-200' }}">
                    {{ __('Donaciones') }}
                </h2>
            </a>
            <a href="{{ route('admin.donaciones', ['seccion' => 2]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] cursor-pointer hover:text-white p-2 rounded leading-tight {{ $seccion == 2 ? 'bg-slate-400' : 'bg-slate-200' }}">
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
            @include('Dashboard.Admin.layouts.sections.donaciones-info');
        @break

        @case(2)
            @include('Dashboard.Admin.layouts.sections.donaciones-campañas');
        @break

        @default
    @endswitch


</x-app-layout>
