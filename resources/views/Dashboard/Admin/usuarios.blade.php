<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div
        class="bg-[#F6F8FF] w-full max-w-[1600px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px] flex flex-col items-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container w-full mb-5">
            <h2 class="text-center font-semibold text-3xl">
                Lista de {{ $tipo }}{{ $tipo === 'Administrador' || $tipo === 'Coordinador' ? 'es' : 's' }}
            </h2>
        </div>




        <div class="content w-full">
            <!-- Administradores Tab -->
            <div id="administradores" class="tab-content active">
                <div
                    class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-6 rounded-lg">
                    <a href="{{ route('admin.usuarios', ['tipo' => 'Administrador']) }}"
                        class="tab-a {{ $tipo === 'Administrador' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
                        Administradores
                    </a>
                    <a href="{{ route('admin.usuarios', ['tipo' => 'Coordinador']) }}"
                        class="tab-a {{ $tipo === 'Coordinador' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
                        Coordinadores
                    </a>
                    <a href="{{ route('admin.usuarios', ['tipo' => 'Voluntario']) }}"
                        class="tab-a {{ $tipo === 'Voluntario' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
                        Voluntarios
                    </a>
                    <a href="{{ route('admin.usuarios', ['tipo' => 'Beneficiario']) }}"
                        class="tab-a {{ $tipo === 'Beneficiario' ? 'active' : '' }} add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
                        Beneficiarios
                    </a>
                    @switch($tipo)
                        @case('Administrador')
                            <x-modal-form 
                                :btnTitulo="'Nuevo Administrador'" 
                                :tituloModal="'Agrega Nuevo Administrador'" 
                                :router="route('admin.store')" 
                                :btnDanger="'Cancelar'"
                                :btnSuccess="'Confirmar'">
                                
                                <div class="relative">
                                    <div
                                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                                        <i class='bx bx-group text-white'></i> <!-- Icono para referencias laborales -->
                                    </div>
                                    <input type="text" placeholder="Referencias laborales" name="Referencias_Laborales"
                                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                                </div>
                
                                <div class="relative">
                                    <div
                                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                                        <i class='bx bx-comment-detail text-white'></i> <!-- Icono para motivo en sector educativo -->
                                    </div>
                                    <textarea type="text" placeholder="Motivo en sector educativo"
                                        class="text-black pl-10 pr-4 py-2 w-full rounded bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                                        name="Motivo_Sector_Educativo" id="" cols="30" rows="1"></textarea>
                
                                </div>
                            </x-modal-form>
                        @break

                        @case('Coordinador')
                            @include('components.modal-coordi')
                        @break

                        @case('Voluntario')
                            @include('components.modal-volunt')
                        @break

                        @default
                            <p>No se ha seleccionado un tipo válido.</p>
                    @endswitch



                </div>

                <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                    <thead class="bg-[#2A334B] text-white ">
                        <tr>
                            <th class="py-3 px-4 rounded-l-lg">Número</th>
                            <th class="py-3 px-4">Nombre completo</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4 rounded-r-lg">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @switch($tipo)
                            @case('Administrador')
                                @include('Dashboard.Admin.layouts.tables.tbody_admins')
                            @break

                            @case('Coordinador')
                                @include('Dashboard.Admin.layouts.tables.tbody_admins')
                            @break

                            @case('Voluntario')
                                @include('Dashboard.Admin.layouts.tables.tbody_admins')
                            @break

                            @case('Beneficiario')
                                @include('Dashboard.Admin.layouts.tables.tbody_admins')
                            @break

                            @default
                        @endswitch
                    </tbody>
                </table>
            </div>

            <!-- Coordinadores Tab -->
            <div id="coordinadores" class="tab-content">
                <div
                    class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-6 rounded-lg">
                    <h2 class="admin-title">Lista de coordinadores</h2>
                    <button
                        class="add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full shadow-md hover:bg-gray-100">
                        <i class='bx bx-user-plus mr-2'></i> Agregar coordinador
                    </button>
                </div>

                <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                    <thead class="bg-[#2A334B] text-white">
                        <tr>
                            <th class="py-3 px-4">Número</th>
                            <th class="py-3 px-4">Nombre completo</th>
                            <th class="py-3 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-300">
                            <td class="py-3 px-4 text-center">1</td>
                            <td class="py-3 px-4 text-center">Juan Pérez</td>
                            <td class="py-3 px-4 text-center">
                                <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                                <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Voluntarios Tab -->
            <div id="voluntarios" class="tab-content">
                <div
                    class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-6 rounded-lg">
                    <h2 class="admin-title text-lg">Lista de voluntarios</h2>
                    <button
                        class="add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-fullover:bg-gray-100">
                        <i class='bx bx-user-plus mr-2'></i> Agregar voluntario
                    </button>
                </div>

                <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg border-collapse">
                    <thead class="bg-[#2A334B] text-white">
                        <tr>
                            <th class="py-3 px-4">Número</th>
                            <th class="py-3 px-4">Nombre completo</th>
                            <th class="py-3 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-300">
                            <td class="py-3 px-4 text-center">1</td>
                            <td class="py-3 px-4 text-center">Ana Gómez</td>
                            <td class="py-3 px-4 text-center">
                                <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                                <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Beneficiarios Tab -->
            <div id="beneficiarios" class="tab-content">
                <div
                    class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-6 rounded-lg">
                    <h2 class="admin-title text-lg">Lista de beneficiarios</h2>
                    <button
                        class="add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-4 rounded-full hover:bg-gray-100">
                        <i class='bx bx-user-plus mr-2'></i> Agregar beneficiario
                    </button>
                </div>

                <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg ">
                    <thead class="bg-[#2A334B] text-white">
                        <tr>
                            <th class="py-3 px-4">Número</th>
                            <th class="py-3 px-4">Nombre completo</th>
                            <th class="py-3 px-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-300">
                            <td class="py-3 px-4 text-center">1</td>
                            <td class="py-3 px-4 text-center">Luis Martínez</td>
                            <td class="py-3 px-4 text-center">
                                <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                                <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{ $datos->links() }}
        </div>
    </div>
    </div>
</x-app-layout>
