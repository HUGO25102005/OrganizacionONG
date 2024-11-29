<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 rounded inline-block px-4 py-2 cursor-pointer transition-transform duration-200 hover:scale-110">
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
                <p class="text-3xl font-bold text-green-600">${{ number_format($monto_disponible, 2) }}</p>
                <p class="text-sm text-gray-500">Monto total: ${{ number_format($total_ingresos, 2) }}</p>
            </div>


            <!-- Dinero usado -->
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-2">Dinero usado:</h3>
                <p class="text-3xl font-bold text-red-600">${{ number_format($monto_usado, 2) }}</p>
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
                        @if ($ultimas_donaciones->isEmpty())
                            <tr>
                                <td>No hay donaciones</td>
                            </tr>
                        @else
                            @foreach ($ultimas_donaciones as $donacion)
                                <tr>
                                    <td>{{ $donacion->donante->getFullName() }}</td>
                                    <td class="text-right">${{ $donacion->monto }}</td>
                                </tr>
                            @endforeach
                        @endif
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
                        @foreach ($convocatorias as $conv)
                            <tr>
                                <td>{{ $conv->titulo }}</td>
                                <td class="text-right">{{ $conv->cantarticulos }} {{ $conv->producto->nombre }}</td>
                            </tr>
                        @endforeach
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

        <div class="fixed bottom-5 right-5 z-100">
            <a href="{{ route('admin.chat') }}">
                <button
                    class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                    <i class='bx bx-message-square-dots text-2xl'></i>
                </button>
            </a>
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
                labels: ['Campañas Activas', 'Campañas Finalizadas', 'Campañas Canceladas'],
                datasets: [{
                    label: 'Datos de Campañas',
                    data: [{{ $convocatoriasActivas }}, {{ $convocatoriasFinalizadas }},
                        {{ $convocatoriasCanceladas }}
                    ],
                    backgroundColor: ['#4CAF50', '#FF9800', '#2196F3'],
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
        // Datos pasados desde PHP
        const labels = @json($labels); // Etiquetas dinámicas
        const data = @json($data); // Datos dinámicos

        // Configurar el gráfico
        const incomeChart = new Chart(ctxIncome, {
            type: 'bar',
            data: {
                labels: labels, // Etiquetas dinámicas
                datasets: [{
                    label: 'Ingresos Mensuales',
                    data: data, // Datos dinámicos
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
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