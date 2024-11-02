<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-xl font-semibold mb-4 text-center">Filtros</h2>
    <form action="{{route('admin.usuarios', ['seccion' => 2]) }}" method="POST" class="flex flex-wrap items-center">
        <!-- Filtro de rol (Administrador o Coordinador) -->
        @csrf
        @method('GET')
        <div class="flex-1 mr-2">
            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
            <select id="rol" name="rol"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-transform duration-200 hover:scale-110">
                <option value="Administrador" {{ $rol == 'Administrador' ? 'selected' : ''}}>Administrador</option>
                <option value="Coordinador" {{ $rol == 'Coordinador' ? 'selected' : ''}}>Coordinador</option>
            </select>
        </div>

        <!-- Filtro de día de inicio -->
        <div class="flex-1 mx-2">
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-transform duration-200 hover:scale-110"
                value="{{$fecha_inicio}}">
        </div>

        <!-- Filtro de día de fin -->
        <div class="flex-1 mx-2">
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-transform duration-200 hover:scale-110"
                value="{{$fecha_fin}}">
        </div>
        <!-- Botón de aplicar filtros -->
        <div class="mx-2 sm:mx-4 md:mx-6 lg:mx-8 my-4">
            <button type="submit"
                class="w-full sm:w-auto px-4 py-2 bg-indigo-600 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-transform duration-200 hover:scale-105 sm:hover:scale-110">
                Aplicar Filtros
            </button>
        </div>        
    </form>
</div>
