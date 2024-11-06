<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 rounded inline-block px-4 py-2 cursor-pointer transition-transform duration-200 hover:scale-110">
            {{ __('Panel de Control') }}
        </h2>

    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
        <!-- Título -->
        <h2 class="text-2xl font-bold mb-6">Donaciones</h2>
    
        <!-- Fila superior: Total disponible y Dinero usado -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Total disponible -->
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-2">Total disponible:</h3>
                <p class="text-3xl font-bold text-green-600">$1234</p>
                <p class="text-sm text-gray-500">Monto total: $11,200</p>
            </div>
    
            <!-- Dinero usado -->
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-2">Dinero usado:</h3>
                <p class="text-3xl font-bold text-red-600">$500</p>
            </div>
        </div>
    
        <!-- Fila intermedia: Últimas Donaciones y Campañas Activas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Últimas Donaciones (expandido para 10 registros) -->
            <div class="bg-white shadow-md p-6 rounded-lg h-[250px] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4 flex justify-center bg-[#BBDEFB] rounded-lg">Últimas Donaciones</h3>
                <table class="w-full">
                    <thead class="bg-[#BBDEFB]">
                        <tr>
                            <th class="text-left">Nombre</th>
                            <th class="text-right">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Ernesto</td><td class="text-right">$1500</td></tr>
                        <tr><td>Isa</td><td class="text-right">$1200</td></tr>
                        <tr><td>Juan</td><td class="text-right">$900</td></tr>
                        <tr><td>Ana</td><td class="text-right">$800</td></tr>
                        <tr><td>Carlos</td><td class="text-right">$700</td></tr>
                    </tbody>
                </table>
            </div>
    
            <!-- Campañas Activas con metas -->
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-4 flex justify-center bg-[#BBDEFB] rounded-lg">Campañas Activas</h3>
                <table class="w-full">
                    <thead class="bg-[#BBDEFB]">
                        <tr>
                            <th class="text-left">Campaña</th>
                            <th class="text-right">Meta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Campaña A</td><td class="text-right">$5000</td></tr>
                        <tr><td>Campaña B</td><td class="text-right">$10000</td></tr>
                        <tr><td>Campaña C</td><td class="text-right">$7500</td></tr>
                        <tr><td>Campaña D</td><td class="text-right">$12000</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    
        <!-- Fila inferior: Gráficas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Gráfico de Campañas Activas -->
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-4">Gráfico de Campañas Activas</h3>
                <div style="max-width: 700px; max-height: 400px;">
                    <canvas id="campaignChart"></canvas>
                </div>
            </div>
    
            <!-- Gráfico de Ingresos Mensuales -->
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-4">Gráfico de Ingresos Mensuales</h3>
                <div style="max-width: 700px; max-height: 400px;">
                    <canvas id="incomeChart"></canvas>
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