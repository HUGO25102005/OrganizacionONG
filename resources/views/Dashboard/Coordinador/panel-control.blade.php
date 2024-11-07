<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>


    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] px-12 shadow-lg rounded-[30px]">
    
        <!-- Contenedor principal para alinear los elementos horizontalmente -->
        <div class="flex flex-wrap gap-8 mt-8 mb-4 items-start">
            
            <!-- Gráfico de Campañas Activas -->
            <div class="bg-white w-1/2 shadow-md p-6 rounded-lg" style="height: 320px;">
                <h3 class="text-lg font-bold mb-4">Gráfico de Programas Activos</h3>
                <div style="max-width: 700px; max-height: 400px;">
                    <canvas id="campaignChart"></canvas>
                </div>
            </div>
    
            <!-- Programas y Beneficiarios Activos -->
            <div class="grid w-96 gap-8 mb-8">
                <!-- Programas -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-detail text-blue-400 text-4xl'></i>
                        <button class="flex items-center justify-center w-8 h-8 border-4 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full text-lg font-bold">
                            <i class='bx bx-right-arrow-alt'></i>
                        </button>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-blue-400">24</p>
                    <h3 class="text-lg font-bold mb-2">PROGRAMAS</h3> 
                </div>
    
                <!-- Beneficiarios Activos -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-user text-green-500 text-4xl'></i>
                        <button class="flex items-center justify-center w-8 h-8 border-4 border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full text-lg font-bold">
                            <i class='bx bx-right-arrow-alt'></i>
                        </button>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-green-500">24</p>
                    <h3 class="text-lg font-bold mb-2">BENEFICIARIOS ACTIVOS</h3> 
                </div>
            </div>
    
            <!-- Programas y Beneficiarios Pendientes -->
            <div class="grid w-56 gap-8 mb-8">
                <!-- Programas Pendientes -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-detail text-blue-400 text-4xl'></i>
                        <button class="flex items-center justify-center w-8 h-8 border-4 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full text-lg font-bold">
                            <i class='bx bx-right-arrow-alt'></i>
                        </button>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-blue-400">15</p>
                    <h3 class="text-lg font-bold mb-2">SOLICITUDES</h3> 
                </div>
    
                <!-- Beneficiarios Pendientes -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-user text-green-500 text-4xl'></i>
                        <button class="flex items-center justify-center w-8 h-8 border-4 border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full text-lg font-bold">
                            <i class='bx bx-right-arrow-alt'></i>
                        </button>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-green-500">18</p>
                    <h3 class="text-lg font-bold mb-2">SOLICITUDES</h3> 
                </div>
            </div>
    
        </div>
    
        <!-- Fila intermedia: Últimas Donaciones y Campañas Activas -->
        <div class="grid grid-cols-2 px gap-2 mb-8">
            
            <!-- Tabla de Beneficiarios Activos -->
            <div class="bg-white shadow-md w-full p-6 rounded-lg h-[250px] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4 flex justify-center bg-[#BBDEFB] rounded-lg">Beneficiarios Activos</h3>
                <table class="w-full">
                    <thead class="bg-[#BBDEFB]">
                        <tr>
                            <th class="text-left">Nombre</th>
                            <th class="text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Ernesto</td><td class="text-right"><i class='bx bx-check' ></i></td></tr>
                        <tr><td>Isa</td><td class="text-right"><i class='bx bx-check' ></i></td></tr>
                        <tr><td>Manuel</td><td class="text-right"><i class='bx bx-check' ></i></td></tr>
                        <tr><td>Karen</td><td class="text-right"><i class='bx bx-check' ></i></td></tr>
                        <tr><td>Carlos</td><td class="text-right"><i class='bx bx-check' ></i></td></tr>
                    </tbody>
                </table>
            </div>
    
            <!-- Segundo gráfico al lado de la tabla -->
            <div class="bg-white shadow-md w-full ml-8 p-6 rounded-lg" style="height: 250px;">
                <h3 class="text-lg font-bold mb-4">Gráfico de Actividad de Beneficiarios</h3>
                <div style="max-width: 700px; max-height: 400px;">
                    <canvas id="campaignChart"></canvas>
                </div>
            </div>
    
        </div>
    
    </div>
    
    <!-- Script para las gráficas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de Campañas Activas
        const ctx = document.getElementById('campaignChart').getContext('2d');
        const campaignChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Campañas Activas 1', 'Campañas Activas 2', 'Campañas Activas 3', 'Campañas Activas 4'],
                datasets: [{
                    label: 'Datos de Campañas',
                    data: [8, 23, 15, 35],
                    backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#FFC107'],
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
    
        // Gráfico de Ingresos Mensuales
        const ctxIncome = document.getElementById('incomeChart').getContext('2d');
        const incomeChart = new Chart(ctxIncome, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Ingresos Mensuales',
                    data: [12000, 15000, 10000, 17000, 20000, 25000],
                    backgroundColor: 'rgba(54, 162, 235, 1)',
                    borderColor: 'rgba(54, 162, 235, 1)',
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
</x-app-layout>