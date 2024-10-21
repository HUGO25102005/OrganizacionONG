<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <div class="flex space-x-7 items-center">
            <a href="{{ route('admin.usuarios', ['tipo' => 'Administrador', 'seccion' => 1]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] hover:text-white p-2 rounded leading-tight {{ request()->routeIs('admin.usuarios') && request('seccion') == 1 ? 'border-b-2 border-black' : '' }}">
                    {{ __('Lista de Usuarios') }}
                </h2>
            </a>
            </a>
            <a href="{{ route('admin.usuarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] hover:text-white p-2 rounded leading-tight {{ request()->routeIs('admin.usuarios') && request('seccion') == 2 ? 'border-b-2 border-black' : '' }}">
                    {{ __('Solicitudes') }}
                </h2>
            </a>
        </div>
        <div class="relative" title="Generar pdf de Usuarios del sitio web">    
            <div class="absolute bottom-0 right-0">
                <a href="{{ route('pdf.generar_All') }}">
                    <i class="bx bxs-file-pdf text-4xl"></i> <!-- Cambia el tamaño del ícono aquí -->
                </a> 
            </div>
        </div>
    </x-slot>

    @if ($seccion == 1)
        @include('Dashboard.Admin.layouts.sections.usuarios-list');
    @else
        @include('Dashboard.Admin.layouts.sections.usuarios-solicitudes');
    @endif
</x-app-layout>
