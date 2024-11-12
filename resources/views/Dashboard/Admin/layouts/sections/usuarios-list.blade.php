<div class="flex items-center justify-between mb-6">
    <h2 class="text-center font-semibold text-2xl md:text-3xl">
        Lista de Usuarios
    </h2>
    <form action="{{ route('admin.usuarios') }}" method="GET" id="search-form" class="flex items-center">
        <div class="relative"> <!-- Eliminar el margen -->
            <input type="text" name='search' placeholder="Buscar"
                class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500'></i>
        </div>
    </form>
</div>

<div class="content w-full px-2 sm:px-4 lg:px-6">
    <!-- Administradores Tab -->
    <div id="administradores" class="tab-content active">
        {{-- Encabezado table CONDICION DE MODALS Y FORMS --}}
        @include('Dashboard.Admin.layouts.tables.thead.user_list_forms_app')
        {{-- FIN CONDICION DE MODALS Y FORMS --}}

        <div class="overflow-x-auto">
            <table class="admin-table w-full mt-6 bg-white rounded-lg">
                <thead class="bg-[#bbdefb] text-black">
                    <tr>
                        <th class="py-3 px-2 md:px-4 rounded-l-lg">Número</th>
                        <th class="py-3 px-2 md:px-4">Nombre completo</th>
                        <th class="py-3 px-2 md:px-4">Correo electrónico</th>
                        <th class="py-3 px-2 md:px-4">Estado</th>
                        <th class="py-3 px-2 md:px-4 rounded-r-lg">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($rol != 'Beneficiario')
                        @include('Dashboard.Admin.layouts.tables.tbody.tb_trabajadores')
                    @else
                        @include('Dashboard.Admin.layouts.tables.tbody.tb_beneficiario')
                    @endif
                </tbody>
            </table>
        </div>

        {{ $datos->links() }}
</div>

