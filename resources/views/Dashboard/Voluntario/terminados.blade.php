
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
<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-xl rounded-[30px] flex flex-col lg:flex-row gap-8">
    
    <!-- Dropdown de Clases Terminadas -->
    <div class="w-full lg:w-1/6">
        <div class="flex items-center justify-between lg:justify-start cursor-pointer text-[#5A78A5] whitespace-nowrap mb-4 font-semibold hover:text-[#1E3A5F]" onclick="toggleDropdown()">
            <div class="flex items-center">
                <i class='bx bx-chevron-down mr-2 text-2xl'></i>
                <span class="text-xl">Clases Terminadas</span>
            </div>
            <!-- Icono solo visible en dispositivos móviles -->
            <i class="bx bx-menu text-2xl lg:hidden"></i>
        </div>
        <div id="dropdown" class="space-y-2 hidden lg:block">
            <ul class="space-y-2 text-[#4A5568]">
                <li onclick="mostrarInfoClase('Curso de HTML Básico')" class="flex items-center space-x-2 bg-[#E0EFFF] hover:bg-[#C7DCFF] p-2 rounded-lg cursor-pointer transition duration-200 shadow-sm border border-[#B3D1FF]">
                    <i class='bx bx-book-content text-[#1E3A5F]'></i>
                    <span>Curso de HTML Básico</span>
                </li>
                <li onclick="mostrarInfoClase('Introducción a CSS')" class="flex items-center space-x-2 bg-[#E0EFFF] hover:bg-[#C7DCFF] p-2 rounded-lg cursor-pointer transition duration-200 shadow-sm border border-[#B3D1FF]">
                    <i class='bx bx-palette text-[#1E3A5F]'></i>
                    <span>Introducción a CSS</span>
                </li>
                <li onclick="mostrarInfoClase('JavaScript Avanzado')" class="flex items-center space-x-2 bg-[#E0EFFF] hover:bg-[#C7DCFF] p-2 rounded-lg cursor-pointer transition duration-200 shadow-sm border border-[#B3D1FF]">
                    <i class='bx bx-code-alt text-[#1E3A5F]'></i>
                    <span>JavaScript Avanzado</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Contenedor de Información y Reportes -->
    <div id="informacionClase" class="w-full lg:w-5/6 bg-[#FFFFFF] p-8 rounded-2xl shadow-md border border-[#D0E4FF]">
        <h2 id="tituloClase" class="text-3xl font-semibold mb-4 text-[#1E3A5F]">Clases terminadas</h2>
        <p id="descripcionClase" class="text-[#000000] mb-6 text-lg">Aquí se mostrará la descripción y los reportes de la clase seleccionada.</p>
        <div id="reportesClase" class="space-y-4">
            <!-- Reportes de la clase seleccionada -->
        </div>
    </div>
</div>

<script>
function toggleDropdown() {
    const dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("hidden");
}
function mostrarInfoClase(clase) {
    const tituloClase = document.getElementById("tituloClase");
    const descripcionClase = document.getElementById("descripcionClase");
    const reportesClase = document.getElementById("reportesClase");

    // Información según la clase seleccionada
    if (clase === "Curso de HTML Básico") {
        tituloClase.textContent = "Curso de HTML Básico";
        descripcionClase.textContent = "Este curso cubre los fundamentos de HTML para principiantes.";

        reportesClase.innerHTML = `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#FFFFF]">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes comprendieron bien los conceptos básicos de etiquetas HTML.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#00000]">Reporte 2</h3>
                <p class="text-[#4A5568]">La mayoría completó satisfactoriamente el proyecto final.</p>
            </div>
        `;
    } else if (clase === "Introducción a CSS") {
        tituloClase.textContent = "Introducción a CSS";
        descripcionClase.textContent = "Este curso enseña los fundamentos de CSS para diseñar páginas web atractivas.";

        reportesClase.innerHTML = `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#00000]">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes aprendieron a aplicar estilos básicos con CSS.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#00000]">Reporte 2</h3>
                <p class="text-[#4A5568]">Realizaron ejercicios de flexbox y responsive design.</p>
            </div>
        `;
    } else if (clase === "JavaScript Avanzado") {
        tituloClase.textContent = "JavaScript Avanzado";
        descripcionClase.textContent = "En este curso, los estudiantes profundizan en conceptos avanzados de JavaScript.";

        reportesClase.innerHTML = `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#00000]">Reporte 1</h3>
                <p class="text-[#4A5568]">Comprendieron conceptos de programación asíncrona y manejo de promesas.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold text-[#00000]">Reporte 2</h3>
                <p class="text-[#4A5568]">Los proyectos finales incluyeron funcionalidades dinámicas avanzadas.</p>
            </div>
        `;
    }
}
</script>

</x-app-layout>