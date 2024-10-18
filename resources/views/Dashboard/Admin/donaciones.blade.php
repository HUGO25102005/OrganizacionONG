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
            <button id="openModalBtn" class="bg-blue-500 text-white px-[20px] py-[10px] rounded-lg hover:bg-blue-600">
                Crear Nueva Campaña
            </button>
        </div>

    
    <!-- Modal (Formulario de nueva campaña) -->
<!-- Modal (Formulario de nueva campaña) -->
<div id="modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50 flex">
    <div class="bg-white w-full max-w-[600px] p-[20px] rounded-lg shadow-lg relative">
        <!-- Botón de cerrar -->
        <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class='bx bx-x text-3xl'></i>
        </button>

        <h2 class="text-2xl font-semibold mb-[20px]">Crear Nueva Campaña</h2>

        <form action="/campaigns/store" method="POST" class="space-y-4">
            <div>
                <label for="campaignName" class="block text-lg font-semibold mb-2">
                    <i class='bx bx-edit-alt'></i> Nombre de la campaña
                </label>
                <input type="text" id="campaignName" name="campaignName" 
                       class="w-full p-[10px] border rounded-lg" 
                       placeholder="Ingresa el nombre de la campaña" required>
            </div>

            <div>
                <label for="description" class="block text-lg font-semibold mb-2">
                    <i class='bx bx-align-left'></i> Descripción
                </label>
                <textarea id="description" name="description" rows="4" 
                          class="w-full p-[10px] border rounded-lg" 
                          placeholder="Describe brevemente la campaña" required></textarea>
            </div>

            <div>
                <label for="donationType" class="block text-lg font-semibold mb-2">
                    <i class='bx bx-package'></i> Tipo de donación
                </label>
                <select id="donationType" name="donationType" 
                        class="w-full p-[10px] border rounded-lg" required>
                    <option value="" disabled selected>Selecciona el tipo de donación</option>
                    <option value="fisica">Donaciones físicas</option>
                    <option value="monetaria">Donaciones monetarias</option>
                </select>
            </div>

            <div>
                <label for="goal" class="block text-lg font-semibold mb-2">
                    <i class='bx bx-target-lock'></i> Meta de la campaña (opcional)
                </label>
                <input type="number" id="goal" name="goal" 
                       class="w-full p-[10px] border rounded-lg" 
                       placeholder="Establece una meta (opcional)">
            </div>

            <div>
                <label for="startDate" class="block text-lg font-semibold mb-2">
                    <i class='bx bx-calendar'></i> Fecha de inicio
                </label>
                <input type="date" id="startDate" name="startDate" 
                       class="w-full p-[10px] border rounded-lg" required>
            </div>

            <div>
                <label for="endDate" class="block text-lg font-semibold mb-2">
                    <i class='bx bx-calendar'></i> Fecha de finalización
                </label>
                <input type="date" id="endDate" name="endDate" 
                       class="w-full p-[10px] border rounded-lg" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-[20px] py-[10px] rounded-lg hover:bg-green-600">
                    <i class='bx bx-save'></i> Guardar Campaña
                </button>
            </div>
        </form>
    </div>
</div>

    <script>
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });
    
    document.getElementById('closeModalBtn').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });
    
    // Cierra el modal si el usuario hace clic fuera del contenido del modal
    window.addEventListener('click', function(event) {
        var modal = document.getElementById('modal');
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
    </script>    
        
        <!-- Contenedor principal -->
        <div class="flex flex-wrap gap-[20px]">
            <!-- Columna izquierda -->
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
            
            <!-- Gráfica -->
            <div class="bg-white p-[20px] rounded-[20px] shadow-md flex-1 max-w-[600px]">
                <h3 class="text-lg font-semibold mb-[10px]">Campañas</h3>
                <canvas id="campaignChart" class="w-full h-[400px]"></canvas>
            </div>
        </div>
    
        <!-- Sección de detalles -->
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
                        <td class="p-[15px] flex justify-center space-x-4">
                            <span class="bg-yellow-200 p-2 rounded-full">
                                <i class='bx bx-edit text-2xl text-gray-700 cursor-pointer' title="Editar"></i>
                            </span>
                            <span class="bg-blue-200 p-2 rounded-full">
                                <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                            </span>
                            <span class="bg-green-200 p-2 rounded-full">
                                <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Estado: activo"></i>
                            </span>
                            <span class="bg-red-200 p-2 rounded-full">
                                <i class='bx bxs-file-pdf text-2xl cursor-pointer' title="Archivo PDF"></i>
                            </span>
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
