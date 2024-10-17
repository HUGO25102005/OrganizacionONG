<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <div class="flex space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] cursor-pointer hover:text-white p-2 rounded leading-tight">
                {{ __('Donaciones') }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] cursor-pointer hover:text-white p-2 rounded leading-tight">
                {{ __('Campañas de recaudación') }}
            </h2>
        </div>
    </x-slot>

    <div class="relative bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
        <div class="flex justify-between items-center mb-[20px]">
            <h2 class="text-2xl font-semibold">Campañas de Recaudación</h2>
            <button class="bg-blue-500 text-white px-[20px] py-[10px] rounded-lg hover:bg-blue-600">
                Crear Nueva Campaña
            </button>
        </div>
        
        <!-- Contenedor principal usando flex para los cuadros y la gráfica -->
        <div class="flex flex-wrap gap-[20px]">
            <!-- Columna izquierda: Cuadros de información -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] flex-1">
                <!-- Resumen de la campaña -->
                <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                    <h3 class="text-lg font-semibold mb-[10px]">Campañas Activas</h3>
                    <p class="text-4xl font-bold">8</p>
                    <p class="text-sm text-gray-500">Total en curso actualmente</p>
                </div>
                
                <!-- Progreso de la recaudación -->
                <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                    <h3 class="text-lg font-semibold mb-[10px]">Artículos Recaudados</h3>
                    <p class="text-4xl font-bold">23</p>
                    <p class="text-sm text-gray-500">meta: 50 artículos</p>
                    <div class="bg-gray-200 rounded-full h-[10px] mt-[10px]">
                        <div class="bg-green-500 h-[10px] rounded-full" style="width: 50%;"></div>
                    </div>
                </div>
                
                <!-- Campañas finalizadas -->
                <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                    <h3 class="text-lg font-semibold mb-[10px]">Campañas Finalizadas</h3>
                    <p class="text-4xl font-bold">15</p>
                    <p class="text-sm text-gray-500">Desde el inicio del año</p>
                </div>
                
                <!-- Total de voluntarios -->
                <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                    <h3 class="text-lg font-semibold mb-[10px]">Total de donantes</h3>
                    <p class="text-4xl font-bold">35</p>
                    <p class="text-sm text-gray-500">donantes que han participado</p>
                </div>
            </div>
            
            <!-- Columna derecha: Gráfica -->
            <div class="bg-white p-[20px] rounded-[20px] shadow-md flex-1 max-w-[600px]">
                <h3 class="text-lg font-semibold mb-[10px]">Campañas</h3>
                <canvas id="campaignChart" class="w-full h-[400px]"></canvas>
            </div>
        </div>
    
        <!-- Sección de detalles de las campañas -->
        <div class="mt-[30px]">
            <h3 class="text-xl font-semibold mb-[10px]">Detalles de Campañas</h3>
            <table class="w-full bg-white rounded-[20px] shadow-md">
                <thead>
                    <tr class="bg-[#BBDEFB] text-center">
                        <th class="p-[15px] ">Nombre de la Campaña</th>
                        <th class="p-[15px] ">Recaudación Actual</th>
                        <th class="p-[15px] ">Objetivo</th>
                        <th class="p-[15px] ">Acciones</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr class="border-b text-center">
                        <td class="p-[15px] ">Ayuda para Escuelas</td>
                        <td class="p-[15px] ">$5,000</td>
                        <td class="p-[15px] ">$10,000</td>
                        <td class="p-[15px]  flex justify-center space-x-4">
                            <i class='bx bx-edit text-2xl text-gray-700 cursor-pointer' title="Editar"></i> 
                            <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i> 
                            <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Estado: activo"></i> 
                            <i class='bx bxs-file-pdf text-2xl cursor-pointer' title="Archivo PDF"></i> 
                        </td>
                    </tr>
                </tbody>
            </table>            
        </div>
    </div>
    
    <!-- Script para la gráfica -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('campaignChart').getContext('2d');
        const campaignChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Campañas Activas', 'Campañas Activas', 'Campañas Activas', 'Campañas Activas'],
                datasets: [{
                    label: 'Datos de Campañas',
                    data: [8, 23, 15, 35],
                    backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#FFC107'],
                    borderColor: ['#388E3C', '#F57C00', '#1976D2', '#FFA000'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
     
    

</x-app-layout>
