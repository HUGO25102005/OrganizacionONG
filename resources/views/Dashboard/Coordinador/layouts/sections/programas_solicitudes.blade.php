<div class="container w-full mb-5 flex items-center justify-between relative">
    <h2 class="text-center font-semibold text-2xl mb-2 flex-grow">Programas educativos</h1>
    
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
        
        @include('Dashboard.Coordinador.layouts.tables.thead.programas_soli_forms_app')
        
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-[#BBDEFB]"> <!-- Mantener el fondo en el thead -->
                    <tr class="text-black bg-[#BBDEFB]">
                        <th class="rounded-tl-[15px] px-3 py-1 text-center">Nombre</th>
                        <th class="px-4 py-2 text-center ml-2">Solicitante</th>
                        <th class="px-4 py-2 text-center ml-2">Fecha Incio</th>
                        <th class="px-4 py-2 text-center ml-2">Fecha Termino</th>
                        <th class="px-4 py-2 text-center ml-2">Modalidad</th>
                        <th class="rounded-tr-[15px] px-4 py-2 text-center ml-2">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @switch($estado)
                            @case('0')
                                @include('Dashboard.Coordinador.layouts.tables.tbody.tb_todosPS')
                            @break  
                            @case('1')
                                @include('Dashboard.Coordinador.layouts.tables.tbody.tb_solicitadoP')
                            @break  
                            @case('6')
                                @include('Dashboard.Coordinador.layouts.tables.tbody.tb_canceladoP')
                            @break  
                        @endswitch
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $programas->links() }}
        </div>  
    </div>
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