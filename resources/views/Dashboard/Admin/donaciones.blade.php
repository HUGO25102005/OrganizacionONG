<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <div class="flex space-x-4">
            <a href="{{ route('admin.donaciones', ['seccion' => 1]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] cursor-pointer hover:text-white p-2 rounded leading-tight {{ $seccion == 1 ? 'bg-slate-400' : 'bg-slate-200' }}">
                    {{ __('Donaciones') }}
                </h2>
            </a>
            <a href="{{ route('admin.donaciones', ['seccion' => 2]) }}">
                <h2
                    class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] cursor-pointer hover:text-white p-2 rounded leading-tight {{ $seccion == 2 ? 'bg-slate-400' : 'bg-slate-200' }}">
                    {{ __('Campañas de recaudación') }}
                </h2>
            </a>
            @if ($seccion == 2)
                {{-- <div class="">
                    <a href="{{ route('pdf.generar') }}">
                        <i class='bx bxs-file-pdf' style="transform: scale(2.5)"></i>
                    </a>
                </div> --}}
            @endif
        </div>
    </x-slot>


<<<<<<< HEAD
    
<!-- Modal (Formulario de nueva campaña) -->
<div id="modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50 flex">
    <div class="bg-white w-full max-w-[600px] p-[20px] rounded-lg shadow-lg relative">
        <!-- Botón de cerrar -->
        <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <i class='bx bx-x text-3xl'></i>
        </button>
    </div>
</div>
   
        
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
     
    
=======
    @switch($seccion)
        @case(1)
            @include('Dashboard.Admin.layouts.sections.donaciones-info');
        @break

        @case(2)
            @include('Dashboard.Admin.layouts.sections.donaciones-campañas');
        @break

        @default
    @endswitch

>>>>>>> 45d939c1340c01618035bc32001c06e66e455d73

</x-app-layout>
