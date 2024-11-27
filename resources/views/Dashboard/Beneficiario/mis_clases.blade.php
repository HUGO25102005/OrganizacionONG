<!--Mis clases--->

<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex space-x-7 items-center">
            <div
                class="w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('ben.misClases', ['rol' => 'Beneficiario', 'seccion' => 1]) }}">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Inscritas') }}
                    </h2>
                </a>
            </div>

            <div
                class="w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('ben.misClases', ['seccion' => 2]) }}">
                    <h2
                        class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Oferta') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>

    @if ($seccion == 1)
        @include('Dashboard.Beneficiario.layouts.secciones.inscritas')
    @else
        @include('Dashboard.Beneficiario.layouts.secciones.ofertas')
    @endif



    <!-- Contenedor de detalles, inicialmente oculto -->
    <div id="detalles"
        class="hidden opacity-0 transform scale-90 bg-[#f6f8ff] p-8 rounded-lg shadow-xl mb-6 w-full max-w-[1450px] h-auto my-8 transition-all duration-500 ease-in-out">
        <h2 id="detallesTitulo" class="text-3xl font-semibold mb-6 text-[#388e3c]">Detalles de la Clase</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Información del programa -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Información del Programa</h3>
                <p class="text-gray-700 mb-2 text-lg break-words"><span class="font-medium">ID:</span> <span
                        id="idPrograma"></span></p>
                <p class="text-gray-700 mb-2 text-lg break-words"><span class="font-medium">Nombre:</span> <span
                        id="nombrePrograma"></span></p>
                <p class="text-gray-700 mb-2 text-lg break-words"><span class="font-medium">Estado:</span> <span
                        id="estadoPrograma"></span></p>
                <p class="text-gray-700 mb-2 text-lg break-words"><span class="font-medium">Fecha de Registro:</span>
                    <span id="fechaRegistro"></span>
                </p>
            </div>

            <!-- Lo que aprenderás -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Lo que aprenderás</h3>
                <p id="descripcionActividad" class="text-gray-700 mb-6 text-lg break-words"></p>
                <p id="duracionActividad" class="text-gray-700 mb-2 font-medium text-lg break-words"><span
                        class="font-medium">Duración:</span> </p>
                <p id="instructorActividad" class="text-gray-700 font-medium text-lg break-words"><span
                        class="font-medium">Instructor:</span> </p>
            </div>

            <!-- Objetivos esperados -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Objetivos esperados</h3>
                <p id="objetivosClase" class="text-gray-700 text-lg leading-relaxed break-words"></p>
            </div>

            <!-- Recursos necesarios -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Recursos Necesarios</h3>
                <p id="recursosNecesarios" class="text-gray-700 text-lg leading-relaxed break-words"></p>
            </div>

            <!-- Beneficiarios y resultados -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Beneficiarios y Resultados</h3>
                <p class="text-gray-700 mb-2 text-lg break-words"><span class="font-medium">Beneficiarios
                        Estimados:</span> <span id="beneficiariosEstimados"></span></p>
                <p class="text-gray-700 mb-2 text-lg break-words"><span class="font-medium">Resultados Esperados:</span>
                    <span id="resultadosEsperados"></span>
                </p>
            </div>

            <!-- Indicadores de cumplimiento -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Indicadores de Cumplimiento</h3>
                <p id="indicadoresCumplimiento" class="text-gray-700 text-lg leading-relaxed break-words"></p>
            </div>

            <!-- Comentarios adicionales -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Comentarios Adicionales</h3>
                <p id="comentariosAdicionales" class="text-gray-700 text-lg leading-relaxed break-words"></p>
            </div>

            <!-- Salones relacionados -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
                <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]"><i class='bx bxs-group mr-2'></i>Lista de
                    Estudiantes</h3>
                <ul id="salonesClase" class="space-y-4 text-gray-700 text-lg leading-relaxed">
                    <!-- Los estudiantes se cargarán dinámicamente -->
                </ul>
            </div>
        </div>
        <div class="hidden" id="routerInscribirmeClase" data-url="{{route('ben.inscribirmeClase')}}"></div>
        <!-- Contenedor de botones -->
        <div id="botonesAccion" class="mt-8 flex flex-wrap gap-4">
            <!-- Botón de cerrar -->
            <button onclick="cerrarDetalles()"
                class="px-8 py-3 bg-green-500 text-white rounded-full font-semibold text-lg hover:bg-[#388e3c] hover:scale-105 transition duration-200 ease-in-out shadow-lg">
                Volver
            </button>
        </div>


    </div>

    <div class="fixed bottom-5 right-5 z-100">
        <a href="{{ route('ben.chat') }}">
            <button
                class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                <i class='bx bx-message-square-dots text-2xl'></i>
            </button>
        </a>
    </div>
</x-app-layout>
