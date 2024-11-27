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
            <div class="w-full lg:w-1/2 h-64 bg-white flex items-center justify-center">
                <canvas id="incomeChart" class="w-full h-full"></canvas>
            </div>
            
            <!-- Gráfico 2: Gastos mensuales -->
            <div class="w-full lg:w-1/2 h-64 bg-white flex items-center justify-center">
                <canvas id="expenseChart" class="w-full h-full"></canvas>
            </div>
        </div>
    </div>
    

    <!-- Sección: Asignación de recursos -->
    <div class="mt-[30px] overflow-x-auto">
        <div class="flex justify-between mb-4 items-center">
            <h3 class="text-xl font-semibold">Programas Educativos</h3>
            <form action="{{ route('coordinador.programas') }}" method="GET" id="search-form" class="relative">
                <input type="text" name="search" placeholder="Buscar"
                    class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <i class="bx bx-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </form>
        </div>

        <div class="flex items-center justify-between w-full">
            <!-- Formulario de filtros -->
            <form action="{{ route('admin.usuarios') }}" method="POST" class="flex flex-col md:flex-row items-center md:space-x-6 w-full md:w-auto">
                @csrf
                @method('GET')
        
                <!-- Filtro de estado -->
                <div class="w-full md:w-48 flex flex-col md:flex-row items-center md:space-x-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="estado" name="estado"
                        class="mt-1 md:mt-0 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transform transition-transform duration-200 hover:scale-105">
                        <option value="1">Todos</option>
                        <option value="2">Activo</option>
                        <option value="3">Inactivo</option>
                    </select>
                </div>
        
                <!-- Botón de aplicar filtro -->
                <div class="mt-4 md:mt-0">
                    <button id="filterButton" type="submit"
                        class="px-4 py-2 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transform transition-transform duration-200 hover:scale-110">
                        Aplicar Filtros
                    </button>
                </div>
            </form>
        
            <!-- Botón para abrir el modal, alineado a la derecha -->
            <button id="openModalBtn" class="ml-auto flex items-center bg-blue-100 text-gray-800 font-semibold rounded-full px-4 py-2 shadow-md">
                <i class='bx bx-user-plus mr-2'></i>
                Nuevo Programa
            </button>
        </div>
        
       

        
        
        <table class="w-full mt-4 bg-white rounded-[20px] shadow-md min-w-[600px]">
            <thead>
                <tr class="bg-[#BBDEFB] text-center">
                    <th class="p-[15px]">Nombre del programa</th>
                    <th class="p-[15px]">Impartidor</th>
                    <th class="p-[15px]">Total de beneficiarios inscritos</th>
                    <th class="p-[15px]">Tipo</th>
                    <th class="p-[15px]">Recursos asignados</th>
                    <th class="p-[15px]">Estado</th>
                    <th class="p-[15px]">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                <tr class="border-b text-center">
                    <td class="p-[15px]">Ayuda para Escuelas</td>
                    <td class="p-[15px]">Ernesto Jimenez</td>
                    <td class="p-[15px]">100</td>
                    <td class="p-[15px]">Virtual</td>
                    <td class="p-[15px]">$10,000</td>
                    <td class="p-[15px]">Activo</td>
                    <td class="p-[15px] flex justify-center space-x-4">
                        <!-- Botón para abrir el modal -->
                        <button class="bg-blue-100 w-10 h-10 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-300 flex items-center justify-center" onclick="openModal()">
                            <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                        </button>
                        <!-- Botón que abre el modal de seguimiento -->
                        <button onclick="openTrackingModal()" class="bg-blue-200 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-600">
                            <i class='bx bx-detail text-2xl text-blue-500 cursor-pointer' title="Seguimiento"></i>
                        </button>

                    </td>                        
                </tr>
                <tr class="border-b text-center">
                    <td class="p-[15px] ">Ayuda para Escuelas</td>
                    <td class="p-[15px] ">Ernesto Jimenez</td>
                    <td class="p-[15px] ">100</td>
                    <td class="p-[15px] ">Virtual</td>
                    <td class="p-[15px] ">$10,000</td>
                    <td class="p-[15px] ">Activo</td>
                    <td class="p-[15px] flex justify-center space-x-4">
                        <button class="bg-blue-100 w-10 h-10 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-300 flex items-center justify-center" onclick="openModal()">
                            <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                        </button>
                        <button onclick="openTrackingModal()" class="bg-blue-200 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-600">
                            <i class='bx bx-detail text-2xl text-blue-500 cursor-pointer' title="Seguimiento"></i>
                        </button>
                        <span class="bg-red-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-red-300">
                            <i class='bx bx-x-circle text-2xl text-red-500 cursor-pointer' title="Rechazar"></i>
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



<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white w-1/2 p-6 rounded-lg shadow-lg max-h-[80vh] overflow-y-auto">
        <h3 class="text-2xl font-semibold mb-4">Agregar Nuevo Programa</h3>

        <!-- Formulario dentro del modal -->
        <form>

            <!-- Nombre del Programa y Coordinador Encargado (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Programa</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="name" name="name" placeholder="Nombre del Programa" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
                <div class="flex-1">
                    <label for="coordinador_encargado" class="block text-sm font-medium text-gray-700">Coordinador encargado</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="coordinador_encargado" name="coordinador_encargado" placeholder="Coordinador encargado" maxlength="255" required class="bg-transparent flex-1 border-none rounded-full outline-none text-black px-2 py-2" />
                    </div>
                </div>
            </div>

            <!-- Descripción, Objetivo, Recursos necesarios, Resultados esperados, Indicadores de cumplimiento, Comentarios adicionales (Textareas) -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción" required class="bg-transparent flex-1 border-none rounded-md outline-none text-black px-2 py-2 h-20 resize-none"></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="objetivo" class="block text-sm font-medium text-gray-700">Objetivo</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="objetivo" name="objetivo" placeholder="Objetivo" required class="bg-transparent flex-1 border-none rounded-md outline-none text-black px-2 py-2 h-20 resize-none"></textarea>
                </div>
            </div>

            <!-- Tipo de público y Duración (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de público</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="tipo" name="tipo_publico" placeholder="Tipo de público" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
                <div class="flex-1">
                    <label for="duracion" class="block text-sm font-medium text-gray-700">Duración</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="time" id="duracion" name="duracion" placeholder="Duración" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
            </div>

            <!-- Fecha de inicio y Fecha de termino (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="fecha_init" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="date" id="fecha_init" name="fecha_init" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
                <div class="flex-1">
                    <label for="fecha_term" class="block text-sm font-medium text-gray-700">Fecha de término</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="date" id="fecha_term" name="fecha_term" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
            </div>


            <div class="mb-4">
                <label for="recursos_necesarios" class="block text-sm font-medium text-gray-700">Recursos necesarios</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="recursos_necesarios" name="recursos_necesarios" placeholder="Recursos necesarios" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="resultados_esperados" class="block text-sm font-medium text-gray-700">Resultados esperados</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="resultados_esperados" name="resultados_esperados" placeholder="Resultados esperados" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"></textarea>
                </div>
            </div>

            <!-- Presupuesto y Beneficiarios estimados (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="presupuesto" class="block text-sm font-medium text-gray-700">Presupuesto</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="number" id="presupuesto" name="presupuesto" placeholder="Presupuesto" maxlength="100" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
                <div class="flex-1">
                    <label for="beneficiarios_estimados" class="block text-sm font-medium text-gray-700">Beneficiarios estimados</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="number" id="beneficiarios_estimados" name="beneficiarios_estimados" placeholder="Beneficiarios estimados" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="indicadores_de_cumplimiento" class="block text-sm font-medium text-gray-700">Indicadores de cumplimiento</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="indicadores_de_cumplimiento" name="indicadores_de_cumplimiento" placeholder="Indicadores de cumplimiento" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="comentarios_adicionales" class="block text-sm font-medium text-gray-700">Comentarios adicionales</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="comentarios_adicionales" name="comentarios_adicionales" placeholder="Comentarios adicionales" required class="bg-transparent flex-1 rounded-md border-none outline-none text-black px-2 py-2 h-20 resize-none"></textarea>
                </div>
            </div>

            <!-- Fecha de registro de actividad (input de una sola columna) -->
            <div class="mb-4">
                <label for="fecha_registro" class="block text-sm font-medium text-gray-700">Fecha de registro de actividad</label>
                <div class="flex items-center bg-gray-100 rounded-full">
                    <input type="date" id="fecha_registro" name="fecha_registro" placeholder="Fecha de registro de actividad" maxlength="20" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" />
                </div>
            </div>


            <!-- Botones -->
            <div class="flex justify-end gap-2 mt-4">
                <button type="button" id="closeModalBtn" class="bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-600">Cancelar</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">Guardar</button>
            </div>

        </form>
    </div>
</div>


<script>
    // Scripts para abrir y cerrar el modal
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
</script>





<!-- Modal -->
<div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden" id="modalOverlay">
    <div class="bg-white w-1/2 p-6 rounded-lg shadow-lg max-h-[80vh] overflow-y-auto relative">
        <!-- Modal Header -->
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Detalle del Programa</h2>

        <!-- Formulario dentro del modal -->
        <form>

            <!-- Nombre del Programa y Coordinador Encargado (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Programa</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="name" name="name" placeholder="Nombre del Programa" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
                <div class="flex-1">
                    <label for="coordinador_encargado" class="block text-sm font-medium text-gray-700">Coordinador encargado</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="coordinador_encargado" name="coordinador_encargado" placeholder="Coordinador encargado" maxlength="255" required class="bg-transparent flex-1 border-none rounded-full outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
            </div>

            <div class="flex-1 mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Estado</label>
                <div class="flex items-center bg-gray-100 rounded-full">
                    <input type="text" id="name" name="name" placeholder=" Estado " maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                </div>
            </div>

            <!-- Descripción, Objetivo, Recursos necesarios, Resultados esperados, Indicadores de cumplimiento, Comentarios adicionales (Textareas) -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción" required class="bg-transparent flex-1 border-none rounded-md outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="objetivo" class="block text-sm font-medium text-gray-700">Objetivo</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="objetivo" name="objetivo" placeholder="Objetivo" required class="bg-transparent flex-1 border-none rounded-md outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <!-- Tipo de público y Duración (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de público</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="tipo" name="tipo_publico" placeholder="Tipo de público" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
                <div class="flex-1">
                    <label for="duracion" class="block text-sm font-medium text-gray-700">Duración</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="time" id="duracion" name="duracion" placeholder="Duración" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
            </div>

            <!-- Fecha de inicio y Fecha de termino (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="fecha_init" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="date" id="fecha_init" name="fecha_init" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
                <div class="flex-1">
                    <label for="fecha_term" class="block text-sm font-medium text-gray-700">Fecha de término</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="date" id="fecha_term" name="fecha_term" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
            </div>


            <div class="mb-4">
                <label for="recursos_necesarios" class="block text-sm font-medium text-gray-700">Recursos necesarios</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="recursos_necesarios" name="recursos_necesarios" placeholder="Recursos necesarios" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="resultados_esperados" class="block text-sm font-medium text-gray-700">Resultados esperados</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="resultados_esperados" name="resultados_esperados" placeholder="Resultados esperados" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <!-- Presupuesto y Beneficiarios estimados (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="presupuesto" class="block text-sm font-medium text-gray-700">Presupuesto</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="number" id="presupuesto" name="presupuesto" placeholder="Presupuesto" maxlength="100" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
                <div class="flex-1">
                    <label for="beneficiarios_estimados" class="block text-sm font-medium text-gray-700">Beneficiarios estimados</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="number" id="beneficiarios_estimados" name="beneficiarios_estimados" placeholder="Beneficiarios estimados" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="indicadores_de_cumplimiento" class="block text-sm font-medium text-gray-700">Indicadores de cumplimiento</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="indicadores_de_cumplimiento" name="indicadores_de_cumplimiento" placeholder="Indicadores de cumplimiento" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="comentarios_adicionales" class="block text-sm font-medium text-gray-700">Comentarios adicionales</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="comentarios_adicionales" name="comentarios_adicionales" placeholder="Comentarios adicionales" required class="bg-transparent flex-1 rounded-md border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <!-- Fecha de registro de actividad (input de una sola columna) -->
            <div class="mb-4">
                <label for="fecha_registro" class="block text-sm font-medium text-gray-700">Fecha de registro de actividad</label>
                <div class="flex items-center bg-gray-100 rounded-full">
                    <input type="date" id="fecha_registro" name="fecha_registro" placeholder="Fecha de registro de actividad" maxlength="20" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2"disabled />
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="mt-6 text-right">
                <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar</button>
            </div>
                    
            
        </form> 
    </div>
</div>

<script>
// Función para abrir el modal
function openModal() {
document.getElementById('modalOverlay').classList.remove('hidden');
}

// Función para cerrar el modal
function closeModal() {
document.getElementById('modalOverlay').classList.add('hidden');
}
</script>


<!-- Modal de seguimiento -->
<div id="trackingModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white w-1/2 p-6 rounded-lg shadow-lg max-h-[80vh] overflow-y-auto relative">
        

        <!-- Título del modal -->
        <h3 class="text-2xl font-semibold mb-4">Formulario de Seguimiento</h3>

        <!-- Formulario dentro del modal -->
        <form>

            <!-- Nombre del Programa y Coordinador Encargado (2 inputs por fila) -->
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Programa</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="name" name="name" placeholder="Nombre del Programa" maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
                <div class="flex-1">
                    <label for="coordinador_encargado" class="block text-sm font-medium text-gray-700">Coordinador encargado</label>
                    <div class="flex items-center bg-gray-100 rounded-full">
                        <input type="text" id="coordinador_encargado" name="coordinador_encargado" placeholder="Coordinador encargado" maxlength="255" required class="bg-transparent flex-1 border-none rounded-full outline-none text-black px-2 py-2" disabled/>
                    </div>
                </div>
            </div>

            <!-- Fecha de registro de actividad (input de una sola columna) -->
            <div class="mb-4">
                <label for="fecha_registro" class="block text-sm font-medium text-gray-700">Fecha de registro del informe</label>
                <div class="flex items-center bg-gray-100 rounded-full">
                    <input type="date" id="fecha_registro" name="fecha_registro" placeholder="Fecha de registro de actividad" maxlength="20" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2"disabled />
                </div>
            </div>

            <div class="flex-1 mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Estado</label>
                <div class="flex items-center bg-gray-100 rounded-full">
                    <input type="text" id="name" name="name" placeholder=" Estado " maxlength="255" required class="bg-transparent rounded-full flex-1 border-none outline-none text-black px-2 py-2" disabled/>
                </div>
            </div>

            <!-- Descripción, Objetivo, Recursos necesarios, Resultados esperados, Indicadores de cumplimiento, Comentarios adicionales (Textareas) -->
            <div class="mb-4">
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Informe</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción" required class="bg-transparent flex-1 border-none rounded-md outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="indicadores_de_cumplimiento" class="block text-sm font-medium text-gray-700">Indicadores de cumplimiento</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="indicadores_de_cumplimiento" name="indicadores_de_cumplimiento" placeholder="Indicadores de cumplimiento" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="objetivo" class="block text-sm font-medium text-gray-700">Desafios encontrados</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="objetivo" name="objetivo" placeholder="Objetivo" required class="bg-transparent flex-1 border-none rounded-md outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="recursos_necesarios" class="block text-sm font-medium text-gray-700">Recomendaciones</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="recursos_necesarios" name="recursos_necesarios" placeholder="Recursos necesarios" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            <div class="mb-4">
                <label for="recursos_necesarios" class="block text-sm font-medium text-gray-700">Comentarios adicionales</label>
                <div class="flex items-center bg-gray-100 rounded-md">
                    <textarea id="recursos_necesarios" name="recursos_necesarios" placeholder="Recursos necesarios" required class="bg-transparent rounded-md flex-1 border-none outline-none text-black px-2 py-2 h-20 resize-none"disabled></textarea>
                </div>
            </div>

            

            <!-- Modal Footer -->
            <div class="mt-6 text-right">
                <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar</button>
            </div>
                    
            
        </form> 
    </div>
</div>

<script>
    // Función para abrir el modal de seguimiento
    function openTrackingModal() {
        document.getElementById('trackingModal').classList.remove('hidden');
    }

    // Función para cerrar el modal de seguimiento
    function closeTrackingModal() {
        document.getElementById('trackingModal').classList.add('hidden');
    }
</script>