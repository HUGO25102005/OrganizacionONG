<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    
    <!-- Sección: Recursos disponibles -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Recursos disponibles</h2>
    
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
    </div>
    

    <!-- Sección: Visualización de gráficos de flujo de caja -->
    <div class="mb-6">
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
    </div>
    

    <!-- Sección: Asignación de recursos -->
    <div class="mt-[30px] overflow-x-auto">
        <h3 class="text-xl font-semibold mb-[10px]">Asignación de recursos</h3>
        <table class="w-full bg-white rounded-[20px] shadow-md min-w-[600px]">
            <thead>
                <tr class="bg-[#BBDEFB] text-center">
                    <th class="p-[15px] ">Nombre del programa</th>
                    <th class="p-[15px] ">Impartidor</th>
                    <th class="p-[15px] ">Total de beneficiarios inscritos</th>
                    <th class="p-[15px] ">Recursos asignados</th>
                    <th class="p-[15px] ">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                <tr class="border-b text-center">
                    <td class="p-[15px] ">Ayuda para Escuelas</td>
                    <td class="p-[15px] ">Ernesto Jimenez</td>
                    <td class="p-[15px] ">100</td>
                    <td class="p-[15px] ">$10,000</td>
                    <td class="p-[15px] flex justify-center space-x-4">
                        <span class="bg-green-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-green-300">
                            <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Aprobar"></i>
                        </span>
                        <span class="bg-red-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-red-300">
                            <i class='bx bx-x-circle text-2xl text-red-500 cursor-pointer' title="Rechazar"></i>
                        </span>
                        <span class="bg-blue-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-300">
                            <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                        </span>
                    </td>                        
                </tr>
            </tbody>                     
            
        </table>            
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