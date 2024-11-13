<div class="relative bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-[20px]">
        <h2 class="text-2xl font-semibold mb-2 sm:mb-0">Campañas de Recaudación</h2>
        <button id="openModalBtn" class="bg-blue-500 text-white px-[20px] py-[10px] rounded-lg hover:bg-blue-600">
            Crear Nueva Campaña
        </button>
    </div>

    <!-- Modal (Formulario de nueva campaña) -->
    <div id="modal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-50 z-50 flex">
        <div class="bg-white w-full max-w-[600px] p-[20px] rounded-lg shadow-lg relative">
            <button id="closeModalBtn" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                <i class='bx bx-x text-3xl'></i>
            </button>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="flex flex-col lg:flex-row gap-[20px]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] flex-1">
            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Campañas Activas</h3>
                <p class="text-4xl font-bold">{{$convocatoriasActivas}}</p>
                <p class="text-sm text-gray-500">Total en curso actualmente</p>
            </div>

            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Artículos Recaudados</h3>
                <p class="text-4xl font-bold">23</p>
                <p class="text-sm text-gray-500">meta: 50 artículos</p>
                <div class="bg-gray-200 rounded-full h-[10px] mt-[10px]">
                    <div class="bg-green-500 h-[10px] rounded-full" style="width: 50%;"></div>
                </div>
            </div>

            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Campañas Finalizadas</h3>
                <p class="text-4xl font-bold">{{ $convocatoriasFinalizadas }}</p>
                <p class="text-sm text-gray-500">Desde el inicio del año</p>
            </div>

            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Total de donantes</h3>
                <p class="text-4xl font-bold">35</p>
                <p class="text-sm text-gray-500">donantes que han participado</p>
            </div>
        </div>

        <!-- Gráfica -->
        <div class="bg-white p-[20px] rounded-[20px] shadow-md flex-1 w-full lg:max-w-[600px]">
            <h3 class="text-lg font-semibold mb-[10px]">Campañas</h3>
            <canvas id="campaignChart" class="w-full h-[300px] sm:h-[400px]"></canvas>
        </div>
    </div>

    <!-- Sección de detalles -->
    <div class="mt-[30px] overflow-x-auto">
        <h3 class="text-xl font-semibold mb-[10px]">Detalles de Campañas</h3>
        <table class="w-full bg-white rounded-[20px] shadow-md">
            <thead>
                <tr class="bg-[#BBDEFB] text-center">
                    <th class="p-[15px]">Nombre de la Campaña</th>
                    <th class="p-[15px]">Recaudación Actual</th>
                    <th class="p-[15px]">Objetivo</th>
                    <th class="p-[15px]">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b text-center">
                    <td class="p-[15px]">Ayuda para Escuelas</td>
                    <td class="p-[15px]">$5,000</td>
                    <td class="p-[15px]">$10,000</td>
                    <td class="p-[15px] flex justify-center space-x-2 sm:space-x-4">
                        <span class="bg-yellow-100 p-2 rounded-full hover:bg-yellow-300 hover:text-white">
                            <i class='bx bx-edit text-2xl cursor-pointer' title="Editar"></i>
                        </span>
                        <span class="bg-blue-100 p-2 rounded-full hover:bg-blue-300 hover:text-white">
                            <i class='bx bx-show text-2xl cursor-pointer' title="Visualizar"></i>
                        </span>
                        <span class="bg-green-100 p-2 rounded-full hover:bg-green-300 hover:text-white">
                            <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Estado: activo"></i>
                        </span>
                        <span class="bg-red-100 p-2 rounded-full hover:bg-red-300 hover:text-white">
                            <i class='bx bxs-file-pdf text-2xl cursor-pointer' title="Archivo PDF"></i>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('campaignChart').getContext('2d');
    const campaignChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Campañas Activas', 'Campañas Finalizadas', 'Campañas Canceladas'],
            datasets: [{
                label: 'Datos de Campañas',
                data: [{{$convocatoriasActivas}}, {{ $convocatoriasFinalizadas }}, 15],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#FFC107'],
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
