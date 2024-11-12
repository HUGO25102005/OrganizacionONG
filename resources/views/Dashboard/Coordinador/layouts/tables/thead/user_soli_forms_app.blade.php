<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-2xl font-semibold  text-center">Filtros</h2>
    <form action="{{route('coordinador.beneficiarios', ['seccion' => 2]) }}" method="POST" class="flex flex-wrap items-center">
        <!-- Filtro de rol (Administrador o Coordinador) -->
        @csrf
        @method('GET')
        <!-- Filtro de día de inicio -->
        
        <div class="w-full md:w-48 flex flex-col md:flex-row items-center md:space-x-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select id="estado" name="estado"
                class="md:mt-0 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transform transition-transform duration-200 hover:scale-105">
                <option value="0" {{ $estado == '0' ? 'selected' : '' }}>Todos</option>
                <option value="3" {{ $estado == '3' ? 'selected' : '' }}>Solicitudes</option>
                <option value="4" {{ $estado == '4' ? 'selected' : '' }}>Cancelados</option>
            </select>
        </div>
        <!-- Botón de aplicar filtros -->
        <div class="mt-4 md:mt-0">
            <button id="filterButton" type="submit"
                class="ml-6 mb-6 w-full sm:w-auto px-4 py-2 mt-6 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-transform duration-200 hover:scale-105 sm:hover:scale-110">
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
