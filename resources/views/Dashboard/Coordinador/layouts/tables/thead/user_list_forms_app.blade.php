<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-2xl font-semibold  text-center">Filtros</h2>
    <div class="flex flex-wrap items-center justify-between mb-4 mt-4 space-y-4 md:space-y-0">
        <div class="flex flex-col md:flex-row items-center space-x-6 space-y-4 md:space-y-0 w-full md:w-auto">
            <!-- Filtro de rol -->
            <form action="{{ route('coordinador.beneficiarios') }}" method="POST" class="flex flex-col md:flex-row items-center md:space-x-6 w-full md:w-auto">
                @csrf
                @method('GET')

                <!-- Filtro de estado -->
                <div class="w-full md:w-48 flex flex-col md:flex-row items-center md:space-x-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="estado" name="estado"
                        class="mt-1 md:mt-0 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transform transition-transform duration-200 hover:scale-105">
                        <option value="0" {{ $estado == '0' ? 'selected' : '' }}>Todos</option>
                        <option value="1" {{ $estado == '1' ? 'selected' : '' }}>Activo</option>
                        <option value="2" {{ $estado == '2' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <!-- Botón de aplicar filtro -->
                <div class="mt-4 md:mt-0">
                    <button id="filterButton" type="submit"
                        class="px-4 py-2 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transform transition-transform duration-200 hover:scale-110">
                        Aplicar Filtros
                    </button>
                </div>
            </form>
        </div>
    </div>
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
