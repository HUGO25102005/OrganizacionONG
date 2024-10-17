<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-xl font-semibold mb-4 text-center">Filtros</h2>
    <div class="flex flex-wrap items-center">
        <!-- Filtro de rol (Administrador o Coordinador) -->
        <div class="flex-1 mr-2">
            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
            <select id="rol" name="rol"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione rol</option>
                <option value="administrador">Administrador</option>
                <option value="coordinador">Coordinador</option>
            </select>
        </div>

        <!-- Filtro de día de inicio -->
        <div class="flex-1 mx-2">
            <label for="fecha-inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" id="fecha-inicio" name="fecha-inicio"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Filtro de día de fin -->
        <div class="flex-1 mx-2">
            <label for="fecha-fin" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
            <input type="date" id="fecha-fin" name="fecha-fin"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Filtro de estado -->
        <div class="flex-1 mx-2">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <select id="estado" name="estado"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccione estado</option>
                <option value="aprobado">Aprobado</option>
                <option value="cancelado">Cancelado</option>
                <option value="solicitado">Solicitado</option>
            </select>
        </div>

        <!-- Botón de aplicar filtros -->
        <div class="mx-2">
            <button type="submit"
                class="w-full px-4 py-2 bg-indigo-600 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Aplicar Filtros
            </button>
        </div>
    </div>
</div>
