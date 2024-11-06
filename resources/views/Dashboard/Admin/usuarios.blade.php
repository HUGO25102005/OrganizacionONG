<x-app-layout>
<<<<<<< HEAD
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
=======
        <div class="alert alert-success">
            <x-alerts-component />
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
        </div>
        
    <x-slot name="header">
<<<<<<< HEAD
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
=======
        <div class="flex flex-col md:flex-row md:space-x-7 items-center space-y-4 md:space-y-0">
            <div class="w-full md:w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['rol' => 'Administrador', 'seccion' => 1]) }}">
                    <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Lista de Usuarios') }}
                    </h2>
                </a>
            </div>
            
            <div class="w-full md:w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                    <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Solicitudes') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[95%] md:max-w-[1450px] h-auto my-6 p-4 md:p-8 shadow-lg rounded-2xl mx-auto">
        @if ($seccion == 1)
            @include('Dashboard.Admin.layouts.sections.usuarios-list')
        @else
            @include('Dashboard.Admin.layouts.sections.usuarios-solicitudes')
        @endif
    </div>
</x-app-layout>
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
