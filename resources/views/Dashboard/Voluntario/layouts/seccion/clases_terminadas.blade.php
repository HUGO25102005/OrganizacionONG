<div
    class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-xl rounded-[30px] flex flex-col lg:flex-row gap-8">
    <!-- Dropdown de Clases Terminadas -->
    <div class="w-full lg:w-1/6">
        <div class="flex items-center justify-between lg:justify-start cursor-pointer text-[#5A78A5] whitespace-nowrap mb-4 font-semibold hover:text-[#1E3A5F]"
            onclick="toggleDropdown()">
            <div class="flex items-center">
                <i id="dropdownIcon" class='bx bx-chevron-up mr-2'></i>
                <span class="text-xl">Clases Terminadas</span>
            </div>
            <!-- Icono solo visible en dispositivos móviles -->
            <i class="bx bx-menu text-2xl lg:hidden"></i>
        </div>
        <div id="dropdown">
            <ul class="space-y-2 text-[#4A5568]">
                @foreach ($claFinalizadas as $clase)
                    <li onclick="mostrarInfoClase('{{ $clase->nombre_programa }}')"
                        class="flex items-center space-x-2 bg-[#E0EFFF] hover:bg-[#C7DCFF] p-2 rounded-lg cursor-pointer transition duration-200 shadow-sm border border-[#B3D1FF]">
                        <i class='bx bx-book-content text-[#1E3A5F]'></i>
                        <span>{{ $clase->nombre_programa }}</span>
                    </li>
                @endforeach
                
            </ul>
        </div>
    </div>

    <!-- Contenedor de Información y Reportes -->
    <div id="informacionClase" class="w-full lg:w-5/6 bg-[#FFFFFF] p-8 rounded-2xl shadow-md border border-[#D0E4FF]">
        <h2 id="tituloClase" class="text-3xl font-semibold mb-4 text-[#1E3A5F]">Clases terminadas</h2>
        <p id="descripcionClase" class="text-[#000000] mb-6 text-lg">Aquí se mostrará la descripción y los reportes de
            la clase seleccionada.</p>
        <div id="reportesClase" class="space-y-4">
            <!-- Reportes de la clase seleccionada -->
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdown");
        const dropdownIcon = document.getElementById("dropdownIcon");

        // Alternar la clase `hidden` para mostrar/ocultar
        dropdown.classList.toggle("hidden");

        // Cambiar el ícono según el estado del dropdown
        if (dropdown.classList.contains("hidden")) {
            dropdownIcon.classList.remove("bx-chevron-up");
            dropdownIcon.classList.add("bx-chevron-down");
        } else {
            dropdownIcon.classList.remove("bx-chevron-down");
            dropdownIcon.classList.add("bx-chevron-up");
        }
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
                <h3 class="text-xl font-semibold">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes comprendieron bien los conceptos básicos de etiquetas HTML.</p>
            </div>
        `;
        } else if (clase === "Introducción a CSS") {
            tituloClase.textContent = "Introducción a CSS";
            descripcionClase.textContent =
                "Este curso enseña los fundamentos de CSS para diseñar páginas web atractivas.";

            reportesClase.innerHTML = `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes aprendieron a aplicar estilos básicos con CSS.</p>
            </div>
        `;
        } else if (clase === "JavaScript Avanzado") {
            tituloClase.textContent = "JavaScript Avanzado";
            descripcionClase.textContent =
                "En este curso, los estudiantes profundizan en conceptos avanzados de JavaScript.";

            reportesClase.innerHTML = `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 1</h3>
                <p class="text-[#4A5568]">Comprendieron conceptos de programación asíncrona y manejo de promesas.</p>
            </div>
        `;
        }
    }
</script>
