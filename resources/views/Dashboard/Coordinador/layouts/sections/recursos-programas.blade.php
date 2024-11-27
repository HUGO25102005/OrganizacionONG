<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl">Programas educativos</h1>
        <form action="{{ route('coordinador.programas') }}" method="GET" id="search-form" class="flex items-center">
            <div class="relative"> <!-- Eliminar el margen -->
                <input type="text" name='search' placeholder="Buscar"
                    class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500'></i>
            </div>
        </form>
    </div>
    
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
                <button type="submit"
                    class="w-full sm:w-auto px-4 py-2 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-transform duration-200 hover:scale-105">
                    Aplicar Filtros
                </button>
            </div>
        </form>
    </div>
    
    <div class="bg-white p-5 rounded-[15px] mt-[20px]">
        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-[#BBDEFB]"> <!-- Mantener el fondo en el thead -->
                    <tr class="text-black bg-[#BBDEFB]">
                        <th class="rounded-tl-[15px] px-3 py-1 text-center">Nombre</th>
                        <th class="px-4 py-2 text-center ml-2">Solicitante</th>
                        <th class="px-4 py-2 text-center ml-2">Fecha Incio</th>
                        <th class="px-4 py-2 text-center ml-2">Fecha Termino</th>
                        <th class="px-4 py-2 text-center ml-2">Modalidad</th>
                        <th class="rounded-tr-[15px] px-4 py-2 text-center ml-2">Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="mt-5"> <!-- Agregar margen superior en tbody -->
                    @foreach ($programas as $programa)
                        <tr class="bg-[#4a607a] rounded-lg">
                            <td class="px-4 py-2 {{ $loop->last ? 'rounded-bl-lg' : '' }} text-white text-lg text-center">{{ $programa->nombre_programa }}
                            </td>
                            <td class="px-4 py-2 text-white text-lg text-center">{{ $programa->voluntario->trabajador->user->name }}</td>
                            <td class="px-4 py-2 text-white text-lg text-center">{{ \Carbon\Carbon::parse($programa->fecha_inicio)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 text-white text-lg text-center">{{ \Carbon\Carbon::parse($programa->fecha_termino)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 text-white text-lg text-center">{{ $programa->estado == 1 ? 'activo' : 'inactivo' }}</td>
                            <td class="py-3 px-4 {{ $loop->last ? 'rounded-br-lg' : ''}} text-center">
                                <span class="bg-green-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-green-300">
                                    <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Aprobar"></i>
                                </span>
                                <span class="bg-red-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-red-300">
                                    <i class='bx bx-x-circle text-2xl text-red-500 cursor-pointer' title="Rechazar"></i>
                                </span>
                                <span class="bg-blue-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-300">
                                    <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                                </span>
                                <a href="pro2.html">
                                    <i class='bx bx-edit text-xl cursor-pointer ml-4'></i>
                                </a>
                            </td>
                        </tr>
                        
                    @endforeach
                    <!-- Puedes agregar más filas aquí -->
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $programas->links() }}
        </div>
       
    </div>

</div>



</div>
</div>