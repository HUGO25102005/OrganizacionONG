<!-- Sección: Visualización de gráficos de flujo de caja -->
<div class="mb-6">
    <h2 class="text-2xl text-center font-bold mb-4">Beneficiarios</h2>
    <br>
    <!-- Gráficos en un contenedor flex -->
    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
        <!-- Gráfico 1: Estatus Programas Educativos -->
        <div class="w-full lg:w-1/2 flex flex-col items-center">
            <h3 class="text-center font-bold mb-4">Gráfico del estatus</h3>
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                <canvas id="beneficiariosstChart"></canvas>
            </div>
        </div>
        
        <!-- Gráfico 2: Estatus de Beneficiarios -->
        <div class="w-full lg:w-1/2 flex flex-col items-center">
            <h3 class="text-center font-bold mb-4">Gráfico del nivel educativo</h3>
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                <canvas id="beneficiariostChart"></canvas>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de programas
        const ctx = document.getElementById('beneficiariosstChart').getContext('2d');
        const beneficiariosstChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Activo', 'Inactivo', 'Solicitado', 'Cancelado'],
                datasets: [{
                    label: ' Cantidad de Beneficiarios',
                    data: [ {{ $total_BA }}, {{ $total_BI }}, {{ $total_BSO }}, {{ $total_BC }}],
                    backgroundColor: ['#4CAF50'],
                    borderColor: ['#596475'],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    
        // Gráfico de beneficiarios
        const ctxIncome = document.getElementById('beneficiariostChart').getContext('2d');
        const beneficiariostChart = new Chart(ctxIncome, {
            type: 'bar',
            data: {
                labels: ['Primaria', 'Secundaria', 'Bachillerato', 'Universidad'],
                datasets: [{
                    label: ' Cantidad de Beneficiarios',
                    data: [ {{$total_BP}}, {{$total_BS}}, {{$total_BB}}, {{$total_BU}} ],
                    backgroundColor: ['#1E96FC'],
                    borderColor: ['#596475'],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
<br><br><br><br>

<div class="container w-full mb-5 flex relative">
    <form id="search-form" class="absolute right-6 bottom-2">
        <input type="text" id="search" name="search" placeholder="Buscar"
            class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('search', request()->input('search')) }}" />
        <i class="bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        <input type="hidden" name="estado" value="{{ $estado }}">
    </form>
</div>

<div class="content w-full px-2 sm:px-4 lg:px-6">
    <!-- Administradores Tab -->
    <div id="administradores" class="tab-content active">
        {{-- Encabezado table CONDICION DE MODALS Y FORMS --}}
        @include('Dashboard.Coordinador.layouts.tables.thead.user_list_forms_app')
        {{-- FIN CONDICION DE MODALS Y FORMS --}}

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
                
                <tbody id="beneficiarios-tbody">
                    @switch($estado)
                        @case(0)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_todos')
                            @break
                        @case(1)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_activo')                            
                            @break
                        @case(2)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_inactivo')                            
                            @break    
                    @endswitch
                </tbody>
            </table>
        </div>
        <div class="mt-2" id="lista">
            @if($datos and $estado != 0)
                {{ $datos->links() }}
            @endif
            @if ($beneficiariosearch and $estado == 0)
                {{ $beneficiariosearch->links() }}
            @endif 
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

<script>
    document.getElementById('lista').addEventListener('click', function () {
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('#search');
    const searchForm = document.querySelector('#search-form');
    const tbody = document.querySelector('#beneficiarios-tbody');

    // Escucha cambios en el input de búsqueda
    searchInput.addEventListener('input', () => {
        const formData = new FormData(searchForm);
        const url = "{{ route('coordinador.beneficiarios.searchb') }}";

        fetch(url + '?' + new URLSearchParams(formData), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
        .then(response => {
            if (!response.ok) throw new Error('Error al buscar programas.');
            return response.json();
        })
        .then(data => {
            // Reemplaza el contenido del tbody con los resultados
            tbody.innerHTML = data.html;
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
