
<!--terminados-->
<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex space-x-7 items-center">
            <div class="w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['rol' => 'Administrador', 'seccion' => 1]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('En Proceso') }}
                    </h2>
                </a>
            </div>
            
            <div class="w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Terminados') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>    

<!-- Contenedor principal -->
    <!--clases terminadas ben-->

<!-- Contenedor principal -->
<div id="clasesTerminadasContainer"
class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-xl rounded-[30px] transition-all duration-500 ease-in-out">
<h2 class="text-3xl font-semibold mb-6 text-[#1E3A5F]">Clases Terminadas</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Clase 1 -->
    <div onclick="mostrarReportes('Codeando fácil')"
        class="cursor-pointer bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-400 hover:shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="ruta_de_la_imagen_html.jpg" alt="HTML Básico"
            class="w-full h-32 object-cover rounded-md mb-4">
        <h3 class="text-lg font-semibold bg-[#E0EFFF] p-2 rounded-md text-blue-700">Codeando fácil</h3>
        <p class="text-gray-700 mt-2">Aprende los fundamentos básicos de programación para dar tus primeros pasos
            en el mundo de la tecnología.</p>
    </div>
    <!-- Clase 2 -->
    <div onclick="mostrarReportes('Aprendiendo código')"
        class="cursor-pointer bg-white p-6 rounded-lg shadow-md border-t-4 border-green-400 hover:shadow-lg hover:scale-105 transition-transform duration-300">
        <img src="ruta_de_la_imagen_css.jpg" alt="CSS"
            class="w-full h-32 object-cover rounded-md mb-4">
        <h3 class="text-lg font-semibold bg-[#C8E6C9] p-2 rounded-md text-green-700">Aprendiendo código</h3>
        <p class="text-gray-700 mt-2">Profundiza en conocimientos avanzados para aplicar programación a
            proyectos reales y mejorar tus habilidades</p>
    </div>
</div>
</div>

<!-- Contenedor de reportes de clase -->
<div id="reportesClaseContainer"
class="hidden opacity-0 transform scale-90 bg-[#F6F8FF] p-8 rounded-lg shadow-xl w-full max-w-[1450px] h-auto my-8 transition-all duration-500 ease-in-out">
<h2 id="tituloClase" class="text-3xl font-semibold mb-6 text-[#1E3A5F]">Reportes de la Clase</h2>
<p id="descripcionClase" class="text-[#4A5568] mb-4">Descripción de la clase seleccionada.</p>
<div id="reportes" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Contenido dinámico de reportes -->
</div>
<button onclick="volverAClases()"
    class="mt-6 px-6 py-3 bg-[#4A90E2] text-white rounded-full font-semibold text-lg hover:bg-[#357ABD] hover:scale-105 transition-transform duration-300 shadow-lg">
    Volver a Clases
</button>
</div>

<script>
function mostrarReportes(clase) {
const clasesTerminadasContainer = document.getElementById("clasesTerminadasContainer");
const reportesClaseContainer = document.getElementById("reportesClaseContainer");
const tituloClase = document.getElementById("tituloClase");
const descripcionClase = document.getElementById("descripcionClase");
const reportes = document.getElementById("reportes");

// Ocultar clasesTerminadasContainer con animación
clasesTerminadasContainer.classList.remove("opacity-100", "scale-100");
clasesTerminadasContainer.classList.add("opacity-0", "scale-90");

// Mostrar reportes después de la animación
setTimeout(() => {
    clasesTerminadasContainer.classList.add("hidden");
    reportesClaseContainer.classList.remove("hidden", "opacity-0", "scale-90");
    reportesClaseContainer.classList.add("opacity-100", "scale-100");

    // Configurar contenido dinámico
    if (clase === "Codeando fácil") {
        tituloClase.textContent = "Codeando fácil";
        descripcionClase.textContent = "Este curso cubre los fundamentos de HTML para principiantes.";
        reportes.innerHTML = `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF]">
                <h3 class="text-xl font-semibold mb-2">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes comprendieron bien los conceptos básicos de etiquetas HTML.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF]">
                <h3 class="text-xl font-semibold mb-2">Reporte 2</h3>
                <p class="text-[#4A5568]">La mayoría completó satisfactoriamente el proyecto final.</p>
            </div>`;
    } else if (clase === "Aprendiendo código") {
        tituloClase.textContent = "Aprendiendo código";
        descripcionClase.textContent = "Este curso enseña los fundamentos de CSS para diseñar páginas web atractivas.";
        reportes.innerHTML = `
            <div class="bg-[#E8F5E9] p-6 rounded-lg shadow-md border border-[#A5D6A7]">
                <h3 class="text-xl font-semibold mb-2">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes aprendieron a aplicar estilos básicos con CSS.</p>
            </div>
            <div class="bg-[#E8F5E9] p-6 rounded-lg shadow-md border border-[#A5D6A7]">
                <h3 class="text-xl font-semibold mb-2">Reporte 2</h3>
                <p class="text-[#4A5568]">Realizaron ejercicios de flexbox y responsive design.</p>
            </div>`;
    }
}, 300); // Tiempo de duración de la animación
}

function volverAClases() {
const reportesClaseContainer = document.getElementById("reportesClaseContainer");
const clasesTerminadasContainer = document.getElementById("clasesTerminadasContainer");

// Ocultar reportesClaseContainer con animación
reportesClaseContainer.classList.remove("opacity-100", "scale-100");
reportesClaseContainer.classList.add("opacity-0", "scale-90");

// Mostrar clasesTerminadasContainer después de la animación
setTimeout(() => {
    reportesClaseContainer.classList.add("hidden");
    clasesTerminadasContainer.classList.remove("hidden");
    clasesTerminadasContainer.classList.remove("opacity-0", "scale-90");
    clasesTerminadasContainer.classList.add("opacity-100", "scale-100");
}, 300); // Tiempo de duración de la animación
}
</script>

</x-app-layout>