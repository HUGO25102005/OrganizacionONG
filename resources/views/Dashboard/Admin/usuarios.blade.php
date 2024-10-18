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
                    class="font-semibold text-xl text-gray-800 hover:bg-slate-400 hover:text-white p-2 rounded leading-tight {{ $seccion == 1 ? 'bg-slate-400' : 'bg-slate-200' }}">
                    {{ __('Lista de Usuarios') }}
                </h2>
            </a>
            </a>
            <a href="{{ route('admin.usuarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-slate-400 hover:text-white p-2 rounded leading-tight {{ $seccion == 2 ? 'bg-slate-400' : 'bg-slate-200' }}">
                    {{ __('Solicitudes') }}
                </h2>
            </a>
        </div>
    </x-slot>

    @if ($seccion == 1)
        @include('Dashboard.Admin.layouts.sections.usuarios-list');
    @else
        @include('Dashboard.Admin.layouts.sections.usuarios-solicitudes');
    @endif

</x-app-layout>
