<div class="container w-full mb-5">
    <h2 class="text-center font-semibold text-2xl md:text-3xl">
        Lista de Usuarios
    </h2>
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

