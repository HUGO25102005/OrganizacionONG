<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-xl font-semibold text-center mb-4">Filtros</h2>
    <form action="{{ route('admin.usuarios', ['seccion' => 2]) }}" method="POST" class="flex flex-wrap items-center">
        @csrf
        @method('GET')
        
        <!-- Filtro de día de inicio -->
        <div class="flex-1 mx-2 w-80">
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-transform duration-200 hover:scale-110" />
        </div>

        <!-- Filtro de día de fin -->
        <div class="flex-1 mx-2 w-80">
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-transform duration-200 hover:scale-110" />
        </div>

        <!-- Botón de aplicar filtros -->
        <div class="mx-2 mt-6">
            <button id="filterButton" type="submit"
                class="w-full sm:w-auto px-4 py-2 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-transform duration-200 hover:scale-105">
                Aplicar Filtros
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('filterButton').addEventListener('click', function () {
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
