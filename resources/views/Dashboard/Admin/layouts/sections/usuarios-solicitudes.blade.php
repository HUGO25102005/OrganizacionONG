
<div class="container w-full mb-5">
    <h2 class="text-center font-semibold text-2xl md:text-3xl">
        Solicitudes de Trabajadores
    </h2>
</div>

<div class="content w-full px-2 sm:px-4 lg:px-6">
    <!-- Administradores Tab -->
    <div id="administradores" class="tab-content active">
        {{-- Encabezado table Filtros --}}
        @include('Dashboard.Admin.layouts.tables.thead.user_soli_forms_app')
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
                            @include('Dashboard.Admin.layouts.tables.tbody.tb_user_solicitudes')
                        @break  
                        @default
                    @endswitch
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $datos->links() }}
    </div>
</div>
