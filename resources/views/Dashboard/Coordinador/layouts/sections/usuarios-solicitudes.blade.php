
<div class="container w-full mb-5">
    <h2 class="text-center font-semibold text-2xl md:text-3xl">
        Solicitudes de Trabajadores
    </h2>
</div>

<div class="content w-full px-2 sm:px-4 lg:px-6">
    <!-- Administradores Tab -->
    <div id="administradores" class="tab-content active">
        {{-- Encabezado table Filtros --}}
        @include('Dashboard.Coordinador.layouts.tables.thead.user_soli_forms_app')
        {{-- FIN Filtros --}}

        <div class="overflow-x-auto">
            <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                <thead class="bg-[#BBDEFB] text-black">
                    <tr>
                        <th class="py-3 px-2 md:px-4 rounded-l-lg">Nombre completo</th>
                        <th class="py-3 px-2 md:px-4">Correo electrónico</th>
                        <th class="py-3 px-2 md:px-4">Rol Solicitado</th>
                        <th class="py-3 px-2 md:px-4">Estado</th>
                        <th class="py-3 px-2 md:px-4 rounded-r-lg">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @switch($estado)
                        @case('3')
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_user_solicitudes')
                        @break  
                        @default
                    @endswitch
                </tbody>
            </table>
        </div>
    </div>

    <!-- Coordinadores Tab -->
    <div id="coordinadores" class="tab-content">
        <div class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-4 md:px-6 rounded-lg">
            <h2 class="admin-title text-lg md:text-xl">Lista de coordinadores</h2>
            <button class="add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-3 md:px-4 rounded-full shadow-md hover:bg-gray-100">
                <i class='bx bx-user-plus mr-2'></i> Agregar coordinador
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                <thead class="bg-[#2A334B] text-white">
                    <tr>
                        <th class="py-3 px-2 md:px-4">Número</th>
                        <th class="py-3 px-2 md:px-4">Nombre completo</th>
                        <th class="py-3 px-2 md:px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="py-3 px-2 md:px-4 text-center">1</td>
                        <td class="py-3 px-2 md:px-4 text-center">Juan Pérez</td>
                        <td class="py-3 px-2 md:px-4 text-center">
                            <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                            <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Voluntarios Tab -->
    <div id="voluntarios" class="tab-content">
        <div class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-4 md:px-6 rounded-lg">
            <h2 class="admin-title text-lg md:text-xl">Lista de voluntarios</h2>
            <button class="add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-3 md:px-4 rounded-full hover:bg-gray-100">
                <i class='bx bx-user-plus mr-2'></i> Agregar voluntario
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                <thead class="bg-[#2A334B] text-white">
                    <tr>
                        <th class="py-3 px-2 md:px-4">Número</th>
                        <th class="py-3 px-2 md:px-4">Nombre completo</th>
                        <th class="py-3 px-2 md:px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="py-3 px-2 md:px-4 text-center">1</td>
                        <td class="py-3 px-2 md:px-4 text-center">Ana Gómez</td>
                        <td class="py-3 px-2 md:px-4 text-center">
                            <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                            <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Beneficiarios Tab -->
    <div id="beneficiarios" class="tab-content">
        <div class="admin-header flex justify-between items-center bg-[#2A334B] text-white py-4 px-4 md:px-6 rounded-lg">
            <h2 class="admin-title text-lg md:text-xl">Lista de beneficiarios</h2>
            <button class="add-admin-button flex items-center bg-white text-[#2A334B] py-2 px-3 md:px-4 rounded-full hover:bg-gray-100">
                <i class='bx bx-user-plus mr-2'></i> Agregar beneficiario
            </button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                <thead class="bg-[#2A334B] text-white">
                    <tr>
                        <th class="py-3 px-2 md:px-4">Número</th>
                        <th class="py-3 px-2 md:px-4">Nombre completo</th>
                        <th class="py-3 px-2 md:px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-300">
                        <td class="py-3 px-2 md:px-4 text-center">1</td>
                        <td class="py-3 px-2 md:px-4 text-center">Luis Martínez</td>
                        <td class="py-3 px-2 md:px-4 text-center">
                            <button class="mr-2 text-blue-500 text-xl"><i class='bx bx-show'></i></button>
                            <button class="delete-button text-red-500 text-xl"><i class='bx bx-trash'></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        {{ $datos->links() }}
    </div>
</div>
