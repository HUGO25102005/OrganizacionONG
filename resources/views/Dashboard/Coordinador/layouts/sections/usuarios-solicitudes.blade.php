
<div class="container w-full mb-5 flex items-center justify-between relative">
    <h2 class="text-center ml-20 font-semibold text-2xl mb-2 flex-grow">
        Solicitudes de Beneficiarios
    </h2>
    <form action="{{ route('coordinador.beneficiarios') }}" method="GET" id="search-form" class="absolute right-6">
        <input type="hidden" name="seccion" value="{{ request()->seccion ?? 2 }}">
        <input type="text" id="search" name="search" placeholder="Buscar"
            class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('search', request()->input('search')) }}" />
        <i class="bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
    </form>
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
                        <th class="py-3 px-2 md:px-4 rounded-l-lg">Número</th>
                        <th class="py-3 px-2 md:px-4">Nombre completo</th>
                        <th class="py-3 px-2 md:px-4">Correo electrónico</th>
                        <th class="py-3 px-2 md:px-4">Nivel Educativo</th>
                        <th class="py-3 px-2 md:px-4">Estado</th>
                        <th class="py-3 px-2 md:px-4 rounded-r-lg">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @switch($estado)
                        @case('0')
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_todosSC')
                        @break  
                        @case('3')
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_solicitado')
                        @break  
                        @case('4')
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_cancelado')
                        @break  
                    @endswitch
                </tbody>
            </table>
        </div>
    </div>

    @if ($datos)
        {{ $datos->links() }}
    @endif
    @if ($beneficiariosearch2)
        {{ $beneficiariosearch2->links() }}
    @endif
</div>


<script>
    document.getElementById('search').addEventListener('click', function () {
        // Guarda la posición de scroll actual
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // Restaura la posición de scroll después de recargar la página
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollPosition') !== null) {
            window.scrollTo(0, localStorage.getItem('scrollPosition'));
            localStorage.removeItem('scrollPosition'); // Elimina el valor después de restaurarlo
        }
    });
</script>