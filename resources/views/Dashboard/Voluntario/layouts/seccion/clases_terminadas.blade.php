<!-- Contenedor principal -->
<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-xl rounded-[30px] flex flex-col lg:flex-row gap-8">
    
    <!-- Dropdown de Clases Terminadas -->
    <div class="w-full lg:w-1/6">
        <div class="flex items-center justify-between lg:justify-start cursor-pointer text-[#5A78A5] whitespace-nowrap mb-4 font-semibold hover:text-[#1E3A5F]" onclick="toggleDropdown()">
            <div class="flex items-center">
                <i class='bx bx-chevron-down mr-2 text-2xl'></i>
                <span class="text-xl">Clases Terminadas</span>
            </div>
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

    <!-- Contenedor de Información y Reportes con scroll -->
    <div id="informacionClase" class="w-full lg:w-5/6 bg-[#FFFFFF] p-8 rounded-2xl shadow-md border border-[#D0E4FF]">
        <h2 id="tituloClase" class="text-3xl font-semibold mb-4 text-[#1E3A5F]">Clases terminadas</h2>
        <p id="descripcionClase" class="text-[#000000] mb-6 text-lg">Aquí se mostrará la descripción y los reportes de la clase seleccionada.</p>
        
        <!-- Contenedor de reportes con barra de desplazamiento -->
        <div id="reportesClase" class="space-y-4 max-h-[300px] overflow-y-auto">
            <!-- Reportes de la clase seleccionada -->
        </div>
    </div>
</div>

<!-- Modal con scroll -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg w-full max-w-md p-6 shadow-lg max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h3 class="text-2xl font-semibold text-[#1E3A5F]">Crear Reporte</h3>
            <button onclick="toggleModal()" class="text-gray-500 hover:text-gray-700">
                <i class="bx bx-x text-2xl"></i>
            </button>
        </div>

        <!-- Formulario del modal -->
        <form>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="fecha_informe">Fecha del Informe</label>
                <input type="date" id="fecha_informe" name="fecha_informe" class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="resumen_informe">Resumen del Informe</label>
                <textarea id="resumen_informe" name="resumen_informe" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="cumplimiento_indicadores">Cumplimiento de Indicadores</label>
                <textarea id="cumplimiento_indicadores" name="cumplimiento_indicadores" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="desafios_encontrados">Desafíos Encontrados</label>
                <textarea id="desafios_encontrados" name="desafios_encontrados" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="recomendaciones">Recomendaciones</label>
                <textarea id="recomendaciones" name="recomendaciones" rows="3" class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="comentarios_adicionales">Comentarios Adicionales</label>
                <textarea id="comentarios_adicionales" name="comentarios_adicionales" rows="3" class="w-full p-2 border border-gray-300 rounded-lg"></textarea>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="toggleModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">Cancelar</button>
                <button type="submit" class="bg-[#4A90E2] text-white px-4 py-2 rounded-lg">Guardar Reporte</button>
            </div>
        </form>
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
    
    const botonCrearReporte = `
        <button onclick="toggleModal()" class="bg-[#4A90E2] text-white px-4 py-2 rounded-lg shadow-md mb-4 font-semibold self-start">Crear Reporte</button>
    `;

    if (clase === "Curso de HTML Básico") {
        tituloClase.textContent = "Curso de HTML Básico";
        descripcionClase.textContent = "Este curso cubre los fundamentos de HTML para principiantes.";
        
        reportesClase.innerHTML = botonCrearReporte + `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes comprendieron bien los conceptos básicos de etiquetas HTML.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 2</h3>
                <p class="text-[#4A5568]">La mayoría completó satisfactoriamente el proyecto final.</p>
            </div>
        `;
    } else if (clase === "Introducción a CSS") {
        tituloClase.textContent = "Introducción a CSS";
        descripcionClase.textContent = "Este curso enseña los fundamentos de CSS para diseñar páginas web atractivas.";
        
        reportesClase.innerHTML = botonCrearReporte + `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 1</h3>
                <p class="text-[#4A5568]">Los estudiantes aprendieron a aplicar estilos básicos con CSS.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 2</h3>
                <p class="text-[#4A5568]">Realizaron ejercicios de flexbox y responsive design.</p>
            </div>
        `;
    } else if (clase === "JavaScript Avanzado") {
        tituloClase.textContent = "JavaScript Avanzado";
        descripcionClase.textContent = "En este curso, los estudiantes profundizan en conceptos avanzados de JavaScript.";
        
        reportesClase.innerHTML = botonCrearReporte + `
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 1</h3>
                <p class="text-[#4A5568]">Comprendieron conceptos de programación asíncrona y manejo de promesas.</p>
            </div>
            <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                <h3 class="text-xl font-semibold">Reporte 2</h3>
                <p class="text-[#4A5568]">Los proyectos finales incluyeron funcionalidades dinámicas avanzadas.</p>
            </div>
        `;
    }
}

function toggleModal() {
    const modal = document.getElementById("modal");
    modal.classList.toggle("hidden");
}
</script>
