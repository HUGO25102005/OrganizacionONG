<!--Mis clases--->

<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex space-x-7 items-center">
            <div class="w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('ben.misClases', ['rol' => 'Beneficiario', 'seccion' => 1]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('En Proceso') }}
                    </h2>
                </a>
            </div>
            
            <div class="w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('ben.misClases', ['seccion' => 2]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Terminados') }}
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

<!-- Contenedor principal de Clases disponibles -->
<div id="clasesContainer"
    class="bg-[#f6f8ff] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px] transition-all duration-500 ease-in-out">
    <h2 class="text-3xl font-semibold mb-6 text-[#1E3A5F]">Clases inscritas</h2>

    <!-- Contenedor del botón desplegable y los cuadros -->
    <div class="flex flex-col md:flex-row items-start space-y-2 md:space-y-0 md:space-x-6">

        <!-- Cuadros de información de clases -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            <!-- Cuadro de información 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-orange-400 hover:shadow-lg hover:scale-105 transition-transform duration-300">
                <img src="ruta_de_la_imagen_1.jpg" alt="Imagen 1" class="w-full h-32 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold bg-[#ffcc80] p-2 rounded-md text-orange-700">Codeando fácil</h3>
                <p class="text-gray-700 mt-2">Aprende los fundamentos básicos de programación para dar tus primeros pasos
                    en el mundo de la tecnología.</p>
                <button onclick="mostrarSoloDetalles('Codeando fácil')"
                    class="mt-6 px-4 py-2 bg-orange-500 text-white font-semibold rounded-full text-sm hover:bg-[#ff5722] hover:scale-105 transition duration-200">
                    Ver más
                </button>
            </div>

            <!-- Cuadro de información 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-400 hover:shadow-lg hover:scale-105 transition-transform duration-300">
                <img src="ruta_de_la_imagen_2.jpg" alt="Imagen 2" class="w-full h-32 object-cover rounded-md mb-4">
                <h3 class="text-lg font-semibold bg-[#bbdefb] p-2 rounded-md text-blue-700">Aprendiendo código</h3>
                <p class="text-gray-700 mt-2">Profundiza en conocimientos avanzados para aplicar programación a
                    proyectos reales y mejorar tus habilidades.</p>
                <button onclick="mostrarSoloDetalles('Aprendiendo código')"
                    class="mt-6 px-4 py-2 bg-blue-500 text-white font-semibold rounded-full text-sm hover:bg-[#2196f3] hover:scale-105 transition duration-200">
                    Ver más
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor de detalles, inicialmente oculto -->
<div id="detalles"
    class="hidden opacity-0 transform scale-90 bg-[#f6f8ff] p-8 rounded-lg shadow-xl mb-6 w-full max-w-[1450px] h-auto my-8 transition-all duration-500 ease-in-out">
    <h2 id="detallesTitulo" class="text-3xl font-semibold mb-6 text-[#388e3c]">Detalles de la Clase</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Cuadro de información adicional -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
            <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Lo que aprenderás</h3>
            <p id="descripcionActividad" class="text-gray-700 mb-6 text-lg">Descripción de la actividad.</p>
            <p id="duracionActividad" class="text-gray-700 mb-2 font-medium text-lg"></p>
            <p id="instructorActividad" class="text-gray-700 font-medium text-lg"></p>
        </div>

        <!-- Cuadro de objetivos esperados -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-[#a5d6a7]">
            <h3 class="text-2xl font-semibold mb-4 text-[#2e7d32]">Objetivos esperados</h3>
            <p id="objetivosClase" class="text-gray-700 text-lg leading-relaxed">
                <!-- Contenido dinámico según la clase -->
            </p>
        </div>
    </div>

    <button onclick="cerrarDetalles()"
        class="mt-8 px-8 py-3 bg-green-500 text-white rounded-full font-semibold text-lg hover:bg-[#388e3c] hover:scale-105 transition duration-200 ease-in-out shadow-lg">
        Volver
    </button>
</div>

<script>
    function mostrarSoloDetalles(clase) {
        const clasesContainer = document.getElementById("clasesContainer");
        const detalles = document.getElementById("detalles");
    
        // Aplicar animación de ocultación a clasesContainer
        clasesContainer.classList.remove("opacity-100", "scale-100");
        clasesContainer.classList.add("opacity-0", "scale-90");
    
        // Mostrar detalles después de la animación de clasesContainer
        setTimeout(() => {
            clasesContainer.classList.add("hidden");
            detalles.classList.remove("hidden", "opacity-0", "scale-90");
            detalles.classList.add("opacity-100", "scale-100");
    
            // Configurar el contenido dinámico según la clase seleccionada
            const detallesTitulo = document.getElementById("detallesTitulo");
            const descripcionActividad = document.getElementById("descripcionActividad");
            const duracionActividad = document.getElementById("duracionActividad");
            const instructorActividad = document.getElementById("instructorActividad");
            const objetivosClase = document.getElementById("objetivosClase");
    
            if (clase === "Codeando fácil") {
                detallesTitulo.textContent = "Codeando fácil";
                descripcionActividad.textContent =
                    "Curso introductorio a la programación para aprender los conceptos básicos y comenzar a codificar.";
                duracionActividad.textContent = "Duración: 1.5 horas";
                instructorActividad.textContent = "Instructor: Carlos Pérez";
                objetivosClase.textContent =
                    "Al finalizar esta clase, serás capaz de comprender los fundamentos básicos de la programación y aplicar conceptos iniciales en tus primeros programas.";
            } else if (clase === "Aprendiendo código") {
                detallesTitulo.textContent = "Aprendiendo código";
                descripcionActividad.textContent =
                    "Curso avanzado de programación para profundizar en temas avanzados y proyectos prácticos.";
                duracionActividad.textContent = "Duración: 2 horas";
                instructorActividad.textContent = "Instructor: Laura Gómez";
                objetivosClase.textContent =
                    "En esta clase, aprenderás a manejar técnicas avanzadas de programación, trabajar en proyectos reales y desarrollar habilidades prácticas en la resolución de problemas complejos.";
            }
        }, 300); // Tiempo equivalente a la duración de la animación
    }
    
    function cerrarDetalles() {
        const clasesContainer = document.getElementById("clasesContainer");
        const detalles = document.getElementById("detalles");
    
        // Aplicar animación de ocultación a detalles
        detalles.classList.remove("opacity-100", "scale-100");
        detalles.classList.add("opacity-0", "scale-90");
    
        // Mostrar clasesContainer después de la animación de detalles
        setTimeout(() => {
            detalles.classList.add("hidden");
            clasesContainer.classList.remove("hidden");
            clasesContainer.classList.remove("opacity-0", "scale-90");
            clasesContainer.classList.add("opacity-100", "scale-100");
        }, 300); // Tiempo equivalente a la duración de la animación
    }
    </script>
    

</x-app-layout>