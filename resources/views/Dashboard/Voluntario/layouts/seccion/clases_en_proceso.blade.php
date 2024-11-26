<div id="clasesContainer" class="bg-[#f6f8ff] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    <h2 class="text-3xl font-semibold ml-[5%] md:ml-[15%] text-[#00796b]">Clases aprobadas</h2>
    <hr class="border-t border-[#80cbc4] mt-2 mb-4">

    <!-- Contenedor del botón desplegable y los cuadros -->
    <div class="flex flex-col md:flex-row items-start space-y-2 md:space-y-0 md:space-x-6">
        <!-- Sección del botón desplegable -->
        <div>
            <div class="flex items-center cursor-pointer text-[#00796b] whitespace-nowrap hover:text-[#004d40]"
                onclick="toggleDropdown()">
                <i id="dropdownIcon" class='bx bx-chevron-up mr-2'></i>
                <span class="font-medium">Mis clases</span>
            </div>
            <div id="dropdown" class="mt-4">
                <ul class="space-y-2 text-gray-600">
                    @foreach ($misProgramas as $programa)
                        <li onclick="mostrarSoloDetalles('{{ $programa->id }}')"
                            class="flex items-center space-x-3 bg-[#ffecb3] hover:bg-[#ffe082] p-4 rounded-lg cursor-pointer transition duration-200 shadow-md border border-[#ffb300] w-full md:w-56">
                            <i class='bx bxs-book'></i>
                            <span class="truncate">{{ $programa->nombre_programa }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div id='routerDetallesClase' data-url="{{ route('vol.detallesClaseV') }}"></div>
        <!-- Cuadros de información de clases -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            <!-- Cuadro de información 1 -->
            @php
                $coloresKeys = array_keys($colores); // Obtén las claves de los colores
            @endphp

            @foreach ($misProgramas as $programa)
                @php
                    $color = $colores[$coloresKeys[array_rand($coloresKeys)]]; // Selecciona un color aleatorio
                @endphp

                <div
                    class="bg-white p-6 rounded-lg shadow-md border-t-4 {{ $color['border'] }} hover:shadow-lg transition duration-300">
                    <img src="ruta_de_la_imagen_1.jpg" alt="Imagen 1" class="w-full h-32 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-semibold {{ $color['bg'] }} p-2 rounded-md {{ $color['text'] }}">
                        {{ $programa->nombre_programa }}
                    </h3>
                    <p class="text-gray-700 mt-2 break-words">
                        @if (strlen($programa->descripcion) > 60)
                            {{ \Illuminate\Support\Str::limit($programa->descripcion, 60) }}
                        @else
                            {{ $programa->descripcion }}
                        @endif
                    </p>
                    <button onclick="mostrarSoloDetalles('{{ $programa->id }}')"
                        class="mt-6 px-4 py-2 {{ $color['bg'] }} text-white font-semibold rounded-full text-sm {{ $color['hover'] }} transition duration-200">
                        Ver detalles
                    </button>
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- Contenedor de detalles, inicialmente oculto -->
<div id="detalles"
    class="hidden bg-[#f6f8ff] p-8 rounded-lg shadow-xl mb-6 w-full max-w-[1450px] h-auto my-8 transition-all duration-300 ease-in-out">
    <h2 id="detallesTitulo" class="text-3xl font-semibold mb-6 text-[#388e3c]">Detalles de la Clase</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Cuadro de información adicional -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
            <!-- Título -->
            <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Detalles de la Actividad</h3>

            <input type="hidden" id="idProgramaDetalles" name="idProgramaDetalles" value="">
            <!-- Descripción -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-[#2e7d32]">Descripción</h4>
                <p id="descripcionActividad" class="text-gray-700 text-lg break-words"></p>
            </div>

            <!-- Duración y Presupuesto (dos columnas) -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Duración</h4>
                    <p id="duracionActividad" class="text-gray-700 font-medium text-lg"></p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Presupuesto</h4>
                    <p id="presupuestoActividad" class="text-gray-700 font-medium text-lg"></p>
                </div>
            </div>

            <!-- Objetivo y publico objetivo -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Objetivo</h4>
                    <p id="objetivoActividad" class="text-gray-700 font-medium text-lg break-words"></p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Público dirigido</h4>
                    <p id="publicObjetivo" class="text-gray-700 font-medium text-lg"></p>
                </div>
            </div>

            <!-- Fechas -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Fecha de inicio</h4>
                    <p id="fechaInicio" class="text-gray-700 font-medium text-lg"></p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Fecha de término</h4>
                    <p id="fechaTermino" class="text-gray-700 font-medium text-lg"></p>
                </div>
            </div>

            <!-- Recursos Necesarios -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-[#2e7d32]">Recursos Necesarios</h4>
                <p id="recursosNecesarios" class="text-gray-700 text-lg break-words"></p>
            </div>

            <!-- Estado y beneficiarios-->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Estado de actividad</h4>
                    <p id="estadoActividad" class="text-gray-700 font-medium text-lg"></p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Beneficiarios estimados</h4>
                    <p id="beneficiariosEstimados" class="text-gray-700 font-medium text-lg"></p>
                </div>
            </div>

            <!-- Resultados Esperados -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-[#2e7d32]">Resultados Esperados</h4>
                <p id="resultadosEsperados" class="text-gray-700 text-lg break-words"></p>
            </div>

            <!-- Indicadores de Cumplimiento -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-[#2e7d32]">Indicadores de Cumplimiento</h4>
                <p id="indicadoresCumplimiento" class="text-gray-700 text-lg break-words"></p>
            </div>

            <!-- Comentarios Adicionales -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold text-[#2e7d32]">Comentarios Adicionales</h4>
                <p id="comentariosAdicionales" class="text-gray-700 text-lg break-words"></p>
            </div>

            <!-- Fecha de Registro  e instructor-->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Fecha de registro</h4>
                    <p id="fechaRegistro" class="text-gray-700 font-medium text-lg"></p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-[#2e7d32]">Instructor</h4>
                    <p id="instructorActividad" class="text-gray-700 font-medium text-lg">
                        {{ auth()->user()->trabajador->user->name }}
                    </p>
                </div>
            </div>
        </div>


        <!-- Cuadro de lista de estudiantes -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
            <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]"><i class='bx bxs-group mr-2'></i>Lista de Estudiantes
            </h3>
            <ul id="listaEstudiantes" class="space-y-4 text-gray-700">
                <!-- Contenido dinámico según la clase -->
            </ul>
        </div>
    </div>

    <div class="flex justify-start space-x-4 mt-8">
        <button onclick="cerrarDetalles()"
            class="px-8 py-3 bg-green-500 text-white rounded-full font-semibold text-lg hover:bg-[#388e3c] transition duration-200 ease-in-out shadow-lg">
            Cerrar
        </button>
        <button onclick="abrirModal()"
            class="px-8 py-3 bg-red-500 text-white rounded-full font-semibold text-lg hover:bg-[#d32f2f] transition duration-200 ease-in-out shadow-lg">
            Terminar
        </button>
    </div>

    <!-- Modal para Reporte -->
    <div id="modalReporte"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden opacity-0 transition-opacity duration-300">
        <div id="modalContent"
            class="relative w-full max-w-6xl bg-white p-8 rounded-lg shadow-lg overflow-y-auto max-h-screen transform scale-95 transition-transform duration-300">
            <!-- Botón para cerrar el modal -->
            <button type="button" onclick="cerrarModal()"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                ✕
            </button>

            <!-- Título con fecha -->
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-3xl font-bold text-center">Reporte de la Actividad</h3>
                <!-- Fecha al lado derecho -->
                <div>
                    <label for="fechaHoy" class="text-lg font-medium text-gray-700">Fecha:</label>
                    <input type="date" id="fecha_informe" name="fecha_informe" value="{{ date('Y-m-d') }}"
                        class="bg-transparent border-none p-0 text-gray-700 cursor-default focus:ring-0 focus:outline-none"
                        readonly disabled>
                </div>
            </div>

            <!-- Formulario -->
            <div id="formReporte">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div id="routerInformes" data-url="{{ route('vol.terminarClase') }}"></div>
                    <!-- Resumen del Informe -->
                    <div class="col-span-1 lg:col-span-2">
                        <label for="resumenInforme" class="block text-lg font-medium text-gray-700 mb-2">Resumen del
                            Informe</label>
                        <textarea id="resumenInforme" name="resumen_informe" onfocus="resetInput('resumenInforme')"
                            class="w-full border rounded-lg p-3 text-gray-700 shadow focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                            rows="3"></textarea>
                    </div>

                    <!-- Cumplimiento de Indicadores -->
                    <div>
                        <label for="cumplimientoIndicadores"
                            class="block text-lg font-medium text-gray-700 mb-2">Cumplimiento de Indicadores</label>
                        <textarea id="cumplimientoIndicadores" name="cumplimiento_indicadores"
                            onfocus="resetInput('cumplimientoIndicadores')"
                            class="w-full border rounded-lg p-3 text-gray-700 shadow focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                            rows="3"></textarea>
                    </div>

                    <!-- Desafíos Encontrados -->
                    <div>
                        <label for="desafiosEncontrados" class="block text-lg font-medium text-gray-700 mb-2">Desafíos
                            Encontrados</label>
                        <textarea id="desafiosEncontrados" name="desafios_encontrados" onfocus="resetInput('desafiosEncontrados')"
                            class="w-full border rounded-lg p-3 text-gray-700 shadow focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                            rows="3"></textarea>
                    </div>

                    <!-- Recomendaciones -->
                    <div class="col-span-1 lg:col-span-2">
                        <label for="recomendaciones"
                            class="block text-lg font-medium text-gray-700 mb-2">Recomendaciones</label>
                        <textarea id="recomendaciones" name="recomendaciones" onfocus="resetInput('recomendaciones')"
                            class="w-full border rounded-lg p-3 text-gray-700 shadow focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                            rows="3"></textarea>
                    </div>
                    <!-- Descripción del Reporte -->
                    <div class="col-span-1 lg:col-span-2">
                        <label for="descripcionReporte"
                            class="block text-lg font-medium text-gray-700 mb-2">Descripción del Reporte</label>
                        <textarea id="descripcionReporte" name="descripcion_reporte" onfocus="resetInput('descripcionReporte')"
                            class="w-full border rounded-lg p-3 text-gray-700 shadow focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                            rows="4"></textarea>
                    </div>

                    <!-- Comentarios Adicionales -->
                    <div class="col-span-1 lg:col-span-2">
                        <label for="comentariosAdicionales"
                            class="block text-lg font-medium text-gray-700 mb-2">Comentarios Adicionales</label>
                        <textarea id="comentariosAdicionalesInformes" name="comentarios_adicionales"
                            class="w-full border rounded-lg p-3 text-gray-700 shadow focus:ring-2 focus:ring-blue-500 focus:outline-none transition duration-200 ease-in-out"
                            rows="3"></textarea>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end gap-4 mt-6">
                    <!-- Botón para cerrar -->
                    <button type="button" onclick="cerrarModal()"
                        class="px-6 py-3 bg-gray-300 text-gray-700 rounded-full font-medium hover:bg-gray-400">
                        Cancelar
                    </button>
                    <!-- Botón para enviar -->
                    <button onclick="enviarInforme({{ auth()->user()->id }})"
                        class="px-6 py-3 bg-green-500 text-white rounded-full font-semibold hover:bg-[#388e3c]">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
    function abrirModal() {
        const modal = document.getElementById('modalReporte');
        const modalContent = document.getElementById('modalContent');

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
        }, 10);
    }

    function cerrarModal() {
        const modal = document.getElementById('modalReporte');
        const modalContent = document.getElementById('modalContent');

        modal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>

@vite(['resources/js/mis_clases.js'])
