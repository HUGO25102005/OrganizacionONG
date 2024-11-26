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

        <div id='routerDetallesClase' data-url="{{ route('vol.detallesClase') }}"></div>
        <!-- Cuadros de información de clases -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            <!-- Cuadro de información 1 -->
            @foreach ($misProgramas as $programa)
                <div
                    class="bg-white p-6 rounded-lg shadow-md border-t-4 border-orange-400 hover:shadow-lg transition duration-300">
                    <img src="ruta_de_la_imagen_1.jpg" alt="Imagen 1" class="w-full h-32 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-semibold bg-[#ffcc80] p-2 rounded-md text-orange-700">
                        {{ $programa->nombre_programa }}</h3>
                    <p class="text-gray-700 mt-2 break-words">

                        @if (strlen($programa->descripcion) > 60)
                            {{ \Illuminate\Support\Str::limit($programa->descripcion, 60) }}
                        @else
                            {{ $programa->descripcion }}
                        @endif

                    </p>
                    <button onclick="mostrarSoloDetalles('{{ $programa->id }}')"
                        class="mt-6 px-4 py-2 bg-orange-500 text-white font-semibold rounded-full text-sm hover:bg-[#ff5722] transition duration-200">
                        Ver detalles
                    </button>
                </div>
            @endforeach

            <!-- Cuadro de información 2 -->
            <div
                class="bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-400 hover:shadow-lg transition duration-300">
                <img src="ruta_de_la_imagen_2.jpg" alt="Imagen 2" class="w-full h-32 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold bg-[#bbdefb] p-2 rounded-md text-blue-700">Aprendiendo código</h3>
                <p class="text-gray-700 mt-2">Curso avanzado para profundizar en temas complejos de programación.</p>
                <button onclick="mostrarSoloDetalles('Aprendiendo código')"
                    class="mt-6 px-4 py-2 bg-blue-500 text-white font-semibold rounded-full text-sm hover:bg-[#2196f3] transition duration-200">
                    Ver detalles
                </button>
            </div>
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
            <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]"></h3>
            <p id="descripcionActividad" class="text-gray-700 mb-6 text-lg break-words" ></p>
            <p id="duracionActividad" class="text-gray-700 mb-2 font-medium text-lg"></p>
            <p id="presupuestoActividad" class="text-gray-700 mb-2 font-medium text-lg"></p>
            <p id="instructorActividad" class="text-gray-700 font-medium text-lg">Instructor:
                {{ auth()->user()->trabajador->user->name }}</p>
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

    <button onclick="cerrarDetalles()"
        class="mt-8 px-8 py-3 bg-green-500 text-white rounded-full font-semibold text-lg hover:bg-[#388e3c] transition duration-200 ease-in-out shadow-lg">
        Cerrar
    </button>
</div>

<script></script>

@vite(['resources/js/mis_clases.js'])
