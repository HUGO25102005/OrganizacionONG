<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 rounded inline-block px-4 py-2">
            {{ __('Panel de Control') }}
        </h2>

    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-6xl m-12 mx-auto h-auto  px-12 shadow-lg rounded-[30px]">
    
        <!-- Contenedor principal para alinear los elementos horizontalmente -->
        <div class="flex flex-wrap gap-8 mt-8 mb-4 items-start">
            
            <!-- Gráfico de Campañas Activas -->
{{--             <div class="bg-white w-1/2 shadow-md p-6 rounded-lg" style="height: 320px;">
                <h3 class="text-lg font-bold mb-4">Gráfico de Programas Educativos</h3>
                <div style="max-width: 700px; max-height: 400px;">
                    <canvas id="programasChart"></canvas> --}}


            <div class="bg-white w-full lg:w-1/2 shadow-md p-6 rounded-lg h-[320px]">
                <h3 class="text-center font-bold mb-4">Gráfico del estatus de Programas Educativos</h3>
                <div class="max-w-[700px] max-h-[400px]">
                    <canvas id="programasChart"></canvas>
                </div>
            </div>
    
            <!-- Programas y Beneficiarios Activos -->
            <div class="grid gap-8 w-full lg:w-[230px] mb-8 cuadros">
                <!-- Programas -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-detail text-blue-400 text-4xl'></i>
                        <a href="{{ route('coordinador.programas', ['seccion' => 1]) }}">
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-blue-400">{{ $total_PA }}</p>
                    <h3 class="text-lg font-bold mb-2">PROGRAMAS</h3> 
                </div>
    
                <!-- Beneficiarios Activos -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-user text-green-500 text-4xl'></i>
                        <a href="{{ route('coordinador.beneficiarios', ['rol' => 'Coordinador', 'seccion' => 1]) }}">
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    
{{--                     <p class="text-3xl font-bold mt-4 text-green-500">{{ $total_BA }}</p>
                    <h3 class="text-lg font-bold mb-2">BENEFICIARIOS ACTIVOS</h3>  --}}
                    <p class="text-3xl font-bold mt-4 text-green-500">{{ $total_BA }}</p>
                    <h3 class="text-lg font-bold mb-2">BENEFICIARIOS</h3>
                </div>
            </div>
    
            <!-- Programas y Beneficiarios Pendientes -->
            <div class="grid gap-8 w-full lg:w-[230px] mb-8 c">
                <!-- Programas Pendientes -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-detail text-blue-400 text-4xl'></i>
                        <a href="{{ route('coordinador.programas', ['seccion' => 2]) }}">
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-blue-400">{{ $solicitudes_P }}</p>
                    <h3 class="text-lg font-bold mb-2">SOLICITUDES</h3> 
                </div>
    
                <!-- Beneficiarios Pendientes -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-user text-green-500 text-4xl'></i>
                        <a href="{{ route('coordinador.beneficiarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">                 
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-green-500">{{ $total_BSO }}</p>
                    <h3 class="text-lg font-bold mb-2">SOLICITUDES</h3> 
                </div>
            </div>
    
        </div>
    
        <!-- Fila intermedia: Últimas Donaciones y Campañas Activas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            
            <!-- Tabla de Beneficiarios Activos -->
            <div class="bg-white shadow-md w-full p-6 rounded-lg h-[250px] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4 flex justify-center bg-[#BBDEFB] rounded-lg">Beneficiarios Activos</h3>
                <table class="w-full">
                    <thead class="bg-[#BBDEFB]">
                        <tr>
                            <th class="text-center rounded-l-lg">Nombre</th>
                            <th class="text-center rounded-r-lg">Estatus</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiarios as $beneficiario)
                            <tr>
                                <td class="text-center">{{ $beneficiario->user->getFullName() }}</td>
                                <td class="text-center">{{ $beneficiario->getEstadoDescripcion() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <!-- Segundo gráfico al lado de la tabla -->
{{--             <div class="bg-white shadow-md ml-8 p-6 rounded-lg" style="height: 250px; width: 640px">
                <h3 class="text-lg font-bold mb-4">Gráfico de Beneficiarios</h3>
                <div style="max-width: 600px; max-height: 400px;">
                    <canvas id="beneficiariosChart"></canvas> --}}

            <div class="bg-white shadow-md p-6 rounded-lg h-[250px]">
                <h3 class="text-center font-bold mb-4">Gráfico del estatus de Beneficiarios</h3>
                <div class="max-w-[700px] max-h-[400px]">
                    <canvas id="beneficiariosChart"></canvas>
                </div>
            </div>
    
        </div>
    
    </div>
    
    
    <!-- Script para las gráficas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de programas
        const ctx = document.getElementById('programasChart').getContext('2d');
        const programasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Solicitud', 'En Revision', 'Aprovado', 'Activo', 'Terminado', 'Cancelado'],
                datasets: [{
                    label: ' Cantidad de Programas',
                    data: [ {{ $total_PS }}, {{ $total_PR }}, {{ $total_PAP }}, {{ $total_PA }}, {{ $total_PT }}, {{ $total_PC }}],
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
        const ctxIncome = document.getElementById('beneficiariosChart').getContext('2d');
        const beneficiariosChart = new Chart(ctxIncome, {
            type: 'bar',
            data: {
                labels: ['Activo', 'Inactivo', 'Solicitado', 'Cancelado'],
                datasets: [{
                    label: ' Cantidad de Beneficiarios',
                    data: [ {{ $total_BA }}, {{ $total_BI }}, {{ $total_BSO }}, {{ $total_BSU }} ],
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
</x-app-layout>