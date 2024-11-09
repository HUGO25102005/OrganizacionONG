<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    
    <!-- Sección: Recursos disponibles -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Programas disponibles</h2>
    
        <!-- Contenedor principal del carrusel -->
<!-- Contenedor principal del carrusel -->
<div class="overflow-hidden relative">
    <!-- Carrusel con desplazamiento horizontal -->
    <div id="carousel" class="flex space-x-6 overflow-x-auto mb-12 snap-x snap-mandatory scroll-smooth transition-transform duration-500 ease-in-out">
        @foreach ($programas as $programa)
            <div class="bg-white min-w-[250px] sm:min-w-[300px] p-6 rounded-lg shadow-md border-l-4 border-{{ $programa->color }} snap-center">
                <h3 class="text-lg font-bold mb-2">{{ $programa->nombre }}</h3>
                <p class="text-gray-500 mb-2">Total Beneficiarios: <span class="font-semibold">{{ $programa->beneficiarios }}</span></p>
                <p class="text-gray-500 mb-2">Recursos Asignados: <span class="font-semibold">${{ number_format($programa->recursos) }}</span></p>
            </div>
        @endforeach
    </div>

    <!-- Indicadores del carrusel -->
    <div id="indicators" class="flex items-center justify-center mt-4 space-x-2">
        <!-- Los indicadores se generan dinámicamente con JavaScript -->
    </div>
</div>


<style>
    /* Oculta la barra de desplazamiento */
#carousel {
    scrollbar-width: none; /* Firefox */
}

#carousel::-webkit-scrollbar {
    display: none; /* Chrome, Safari y Edge */
}

</style>
<script>
    const carousel = document.getElementById('carousel');
    const indicatorsContainer = document.getElementById('indicators');
    const programas = @json($programas); // Convertir los datos de programas en JSON
    const slideWidth = 400; // Ajusta según el ancho de cada tarjeta
    const itemsPerIndicator = 3; // Cada indicador representará tres programas
    const totalSlides = Math.ceil(programas.length / itemsPerIndicator);

    let currentIndex = 0;

    // Crear los indicadores según el número de slides
    function createIndicators() {
        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.createElement('button');
            indicator.classList.add('indicator', 'w-3', 'h-3', 'rounded-full', 'bg-gray-300', 'transition-all', 'duration-300');
            indicator.addEventListener('click', () => {
                currentIndex = i;
                updateCarousel();
            });
            indicatorsContainer.appendChild(indicator);
        }
        updateIndicators();
    }

    // Actualizar los indicadores visualmente
    function updateIndicators() {
        const indicators = document.querySelectorAll('.indicator');
        indicators.forEach((indicator, index) => {
            if (index === currentIndex) {
                indicator.classList.add('w-8', 'bg-black'); // Indicador activo
                indicator.classList.remove('w-3', 'bg-gray-300');
            } else {
                indicator.classList.add('w-3', 'bg-gray-300'); // Indicador inactivo
                indicator.classList.remove('w-8', 'bg-black');
            }
        });
    }

    // Mover el carrusel y actualizar los indicadores
    function updateCarousel() {
        const targetScrollPosition = currentIndex * slideWidth * itemsPerIndicator;
        carousel.scrollTo({
            left: targetScrollPosition,
            behavior: 'smooth'
        });
        updateIndicators();
    }

    // Auto-scroll del carrusel
    function autoScroll() {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }

    createIndicators();
    setInterval(autoScroll, 3000); // Cambia de tarjeta cada 3 segundos
</script>



    </div>
    

    <!-- Sección: Visualización de gráficos de flujo de caja -->
    <div class="mb-6">
        <h2 class="text-2xl text-center font-bold mb-4">Nivel de exito de Programas Educativos</h2>
        <br>
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
        <h3 class="text-xl font-semibold mb-[10px]">Programas Educativos</h3>
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
                        <span class="bg-green-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-green-300">
                            <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Aprobar"></i>
                        </span>
                        <span class="bg-red-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-red-300">
                            <i class='bx bx-x-circle text-2xl text-red-500 cursor-pointer' title="Rechazar"></i>
                        </span>
                        <span class="bg-blue-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-300">
                            <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                        </span>
                    </td>                        
                </tr>
            </tbody>                     
            
        </table>            
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
            labels: ['Solicitud', 'En Revisión', 'Aprovado', 'Activo', 'Terminado', 'Cancelado'], // Meses
            datasets: [{
                label: 'Estatus de Programas Educativos',
                data: [0, 0, 0, 0, 0, 0], // Valores de ingresos
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
            labels: ['Presencial', 'Virtual'], // Meses
            datasets: [{
                label: 'Modalidad',
                data: [0, 0], // Valores de gastos
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