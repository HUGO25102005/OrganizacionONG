<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">

    <!-- Sección: Recursos disponibles -->
    {{-- <div class="mb-6"> --}}
    {{-- <h2 class="text-2xl font-bold mb-4">Recursos disponibles</h2> --}}

    <!-- Tarjetas de recursos disponibles -->
    {{-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Tarjeta 1 -->
            <div class="bg-white p-6 pl-10 rounded-lg shadow-md border-l-4 border-yellow-500">
                <h3 class="text-lg font-bold mb-2">Programa A</h3>
                <p class="text-gray-500 mb-2">Total Beneficiarios: <span class="font-semibold">150</span></p>
                <p class="text-gray-500 mb-2">Recursos Asignados: <span class="font-semibold">$50,000</span></p>
            </div>
            
            <!-- Tarjeta 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-800">
                <h3 class="text-lg font-bold mb-2">Programa B</h3>
                <p class="text-gray-500 mb-2">Total Beneficiarios: <span class="font-semibold">200</span></p>
                <p class="text-gray-500 mb-2">Recursos Asignados: <span class="font-semibold">$75,000</span></p>
            </div>
    
            <!-- Tarjeta 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-800">
                <h3 class="text-lg font-bold mb-2">Programa C</h3>
                <p class="text-gray-500 mb-2">Total Beneficiarios: <span class="font-semibold">100</span></p>
                <p class="text-gray-500 mb-2">Recursos Asignados: <span class="font-semibold">$30,000</span></p>
            </div>
    
            <!-- Tarjeta 4 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-800">
                <h3 class="text-lg font-bold mb-2">Programa D</h3>
                <p class="text-gray-500 mb-2">Total Beneficiarios: <span class="font-semibold">250</span></p>
                <p class="text-gray-500 mb-2">Recursos Asignados: <span class="font-semibold">$100,000</span></p>
            </div>
        </div> --}}
    {{-- </div> --}}


    <!-- Sección: Visualización de gráficos de flujo de caja -->
    {{-- <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Visualización de gráficos de flujo de caja</h2>
        <p>Gráficos comparativos entre ingresos y gastos mensuales o anuales.</p>
        
        <!-- Gráficos en un contenedor flex -->
        <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
            <!-- Gráfico 1: Ingresos mensuales -->
            <div class="w-full lg:w-1/2 h-64 bg-gray-100 flex items-center justify-center">
                <canvas id="incomeChart" class="w-full h-full"></canvas>
            </div>
            
            <!-- Gráfico 2: Gastos mensuales -->
            <div class="w-full lg:w-1/2 h-64 bg-gray-100 flex items-center justify-center">
                <canvas id="expenseChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div> --}}


    <!-- Sección: Asignación de recursos -->
    <div class="bg-[#F6F8FF] p-4 rounded-lg shadow-md mb-6 overflow-x-auto">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-center font-semibold text-2xl md:text-3xl">Solicitudes de Recursos</h3>
            <form action="{{ route('tabla.actuSoli') }}" method="GET" id="search-form" class="flex items-center">
                @csrf
                <div class="relative">
                    <input type="text" name="search"
                        placeholder="Buscar por nombre del programa, impartido por, beneficiarios o recursos"
                        class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500'></i>
                </div>
            </form>
        </div>


        @include('Dashboard.Admin.layouts.tables.tablas.recursos_solicitudes')

    </div>

    <div class="fixed bottom-5 right-5 z-100">
        <a href="{{ route('admin.chat') }}">
            <button
                class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                <i class='bx bx-message-square-dots text-2xl'></i>
            </button>
        </a>
    </div>
</div>

<!-- Script para generar los gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        updateTableSolicitudes();
    });
    document.getElementById('search-form').addEventListener('input', () => {
        event.preventDefault(); // Evitar el envío del formulario de manera tradicional
        updateTableSolicitudes();
    });
    document.getElementById('search-form').addEventListener('submit', (event) => {
        event.preventDefault(); // Previene el envío tradicional del formulario
        updateTableSolicitudes(); // Llama a la función para actualizar la tabla
    });

    // Gráfico de Ingresos Mensuales
    const ctxIncome = document.getElementById('incomeChart').getContext('2d');
    const incomeChart = new Chart(ctxIncome, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'], // Meses
            datasets: [{
                label: 'Ingresos Mensuales',
                data: [12000, 15000, 10000, 17000, 20000, 25000], // Valores de ingresos
                backgroundColor: 'rgba(54, 162, 235, 1)', // Azul sólido
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de Gastos Mensuales
    const ctxExpense = document.getElementById('expenseChart').getContext('2d');
    const expenseChart = new Chart(ctxExpense, {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'], // Meses
            datasets: [{
                label: 'Gastos Mensuales',
                data: [10000, 8000, 12000, 9000, 14000, 18000], // Valores de gastos
                backgroundColor: 'rgba(255, 99, 132, 1)', // Rojo sólido
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@vite(['resources/js/recursos-disponibles.js'])
