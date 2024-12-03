@php
    // Arreglo de colores
    $colores = ['border-red-400', 'border-blue-400', 'border-green-400', 'border-yellow-400'];
@endphp

<div class="mb-6">
    <h2 class="text-2xl text-center mt-4 font-bold mb-4">Programas disponibles</h2>
    <br> 
    <!-- Contenedor principal del carrusel -->
    <div class="overflow-hidden relative">
        <!-- Carrusel con desplazamiento horizontal -->
        <div id="carousel" class="flex space-x-6 overflow-x-auto mb-12 snap-x snap-mandatory scroll-smooth transition-transform duration-500 ease-in-out">
            @foreach ($programas as $programa)
                <div class="bg-white min-w-[250px] sm:min-w-[300px] p-6 rounded-lg shadow-lg border-l-8 {{ $colores[$loop->index % count($colores)] }} snap-center">
                    <h3 class="text-lg font-bold mb-2">{{ $programa->nombre_programa }}</h3>
                    <p class="text-gray-500 mb-2">Impartido por: <span class="font-semibold">{{ $programa->voluntario->trabajador->user->name. ' ' .$programa->voluntario->trabajador->user->apellido_paterno }}</span></p>
                    <p class="text-gray-500 mb-2">Total Beneficiarios: <span class="font-semibold">{{ $programa->getTotalBeneficiarios() }}</span></p>
                    <p class="text-gray-500 mb-2">Recursos Asignados: <span class="font-semibold">${{ number_format($programa->presupuesto->monto) }}</span></p>
                </div>
            @endforeach
        </div>

        <!-- Indicadores del carrusel -->
        <div id="indicators" class="flex items-center justify-center mt-4 space-x-2">
            <!-- Los indicadores se generan dinámicamente con JavaScript -->
        </div>
    </div>
    
    <!-- Sección: Visualización de gráficos de flujo de caja -->
    <br>
    <!-- Gráficos en un contenedor flex -->
    <div class="flex flex-col lg:flex-row space-y-4 lg:space-y-0 lg:space-x-4">
        <!-- Gráfico 1: Estatus Programas Educativos -->
        <div class="w-full lg:w-1/2 flex flex-col items-center mx-auto"> <!-- Quitar mx-auto si uso las dos graficas -->
            <h3 class="text-center font-bold mb-4">Gráfico del estatus</h3>
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                <canvas id="incomeChart"></canvas>
            </div>
        </div>
        
{{--         <!-- Gráfico 2: Estatus de Beneficiarios -->
        <div class="w-full lg:w-1/2 flex flex-col items-center">
            <h3 class="text-center font-bold mb-4">Gráfico de la modalidad</h3>
            <div class="w-full h-64 bg-gray-100 flex items-center justify-center">
                <canvas id="expenseChart"></canvas>
            </div>
        </div> --}}
    </div>
</div>
    
<br><br><br><br>
<!-- Sección: Asignación de recursos -->
<div class="container w-full mb-5 flex relative">
    <form id="search-form" class="absolute right-6 bottom-2">
        <input type="text" id="search" name="search" placeholder="Buscar"
            class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
        <i class="bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        <input type="hidden" name="estado" value="{{ $estado }}"> <!-- Mantiene el estado actual -->
    </form>
</div>

<div class="content w-full px-2 sm:px-4 lg:px-6">
    <!-- Administradores Tab -->
    <div id="administradores" class="tab-content active">

        @include('Dashboard.Coordinador.layouts.tables.thead.programas_list_forms_app')
        
        <div class="overflow-x-auto">   
            <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                <thead class="bg-[#BBDEFB] text-black">
                    @switch($estado)
                        @case(0)
                            @include('Dashboard.Coordinador.layouts.tables.thead.th_todosP')
                            @break
                        @case(2)
                            @include('Dashboard.Coordinador.layouts.tables.thead.th_inactivo')                            
                            @break
                        @case(4)
                            @include('Dashboard.Coordinador.layouts.tables.thead.th_todosP')                            
                            @break
                        @case(5)
                            @include('Dashboard.Coordinador.layouts.tables.thead.th_terminado')                            
                            @break
                    @endswitch
                </thead>
                <tbody id="programas-tbody">
                    @switch($estado)
                        @case(0)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_todosP')
                            @break
                        @case(2)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_inactivoP')                            
                            @break
                        @case(4)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_activo_p')                            
                            @break
                        @case(5)
                            @include('Dashboard.Coordinador.layouts.tables.tbody.tb_terminado')                            
                            @break
                    @endswitch
                </tbody>                     
            </table>
        </div>
        <div class="mt-2" id="lista">
            @if($datos and $estado != 0)
                {{ $datos->links() }}
            @endif
            @if ($programassearch and $estado == 0)
                {{ $programassearch->links() }}
            @endif  
        </div>
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
    const slideWidth = 100; // Ajusta según el ancho de cada tarjeta
    const itemsPerIndicator = 3; // Cada indicador representará tres programas
    const totalSlides = Math.ceil(programas.length / itemsPerIndicator);

    let currentIndex = 0;

    // Crear los indicadores según el número de slides
    function createIndicators() {
        for (let i = 0; i < totalSlides; i++) {
            const indicator = document.createElement('button');
            indicator.classList.add('indicator', 'w-3', 'h-3', 'rounded-full', 'bg-gray-500', 'transition-all', 'duration-300');
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
                indicator.classList.add('w-8', 'bg-gray-500'); // Indicador activo
                indicator.classList.remove('w-3', 'bg-gray-200');
            } else {
                indicator.classList.add('w-3', 'bg-gray-500'); // Indicador inactivo
                indicator.classList.remove('w-8', 'bg-gray-200');
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

<!-- Script para generar los gráficos -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Ingresos Mensuales
    const ctxIncome = document.getElementById('incomeChart').getContext('2d');
    const incomeChart = new Chart(ctxIncome, {
        type: 'bar',
        data: {
            labels: ['Solicitud', 'Aprobado', 'Activo', 'Inactivo', 'Terminado', 'Cancelado'], // Meses
            datasets: [{
                label: 'Estatus de Programas Educativos',
                data: [ {{ $programas_solicitados }}, {{ $programas_aprobados }}, {{ $programas_activos }}, {{ $programas_inactivos }}, {{ $programas_terminados }}, {{ $programas_cancelados }}], // Valores de ingresos
                backgroundColor: ['#4CAF50'],
                borderColor: ['#596475'],
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

/*     // Gráfico de Gastos Mensuales
    const ctxExpense = document.getElementById('expenseChart').getContext('2d');
    const expenseChart = new Chart(ctxExpense, {
        type: 'bar',
        data: {
            labels: ['Presencial', 'Virtual'], // Meses
            datasets: [{
                label: 'Modalidad',
                data: [0, 0], // Valores de gastos
                backgroundColor: ['#1E96FC'],
                borderColor: ['#596475'],
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
    }); */
</script>

<script>
    document.getElementById('search').addEventListener('click', function () {
        // Guarda la posición de scroll actual
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // Restaura la posición de scroll después de recargar la página
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollPosition') !== null) {
            window.scrollTo(0, localStorage.getItem('scrollPosition'));
            localStorage.removeItem('scrollPosition'); // Elimina el valor después de restaurarlo
        }
    });
</script>

<script>
    document.getElementById('lista').addEventListener('click', function () {
        // Guarda la posición de scroll actual
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // Restaura la posición de scroll después de recargar la página
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollPosition') !== null) {
            window.scrollTo(0, localStorage.getItem('scrollPosition'));
            localStorage.removeItem('scrollPosition'); // Elimina el valor después de restaurarlo
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('#search');
    const searchForm = document.querySelector('#search-form');
    const tbody = document.querySelector('#programas-tbody');

    // Escucha cambios en el input de búsqueda
    searchInput.addEventListener('input', () => {
        const formData = new FormData(searchForm);
        const url = "{{ route('coordinador.programas.searchp') }}";

        fetch(url + '?' + new URLSearchParams(formData), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
        .then(response => {
            if (!response.ok) throw new Error('Error al buscar programas.');
            return response.json();
        })
        .then(data => {
            // Reemplaza el contenido del tbody con los resultados
            tbody.innerHTML = data.html;
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>