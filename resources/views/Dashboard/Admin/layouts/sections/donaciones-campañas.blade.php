<div class="relative bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    <div class="flex justify-between items-center mb-[20px]">
        <h2 class="text-2xl font-semibold">Campañas de Recaudación</h2>

        <div x-data="{ open: false, tab: 'informacion' }" x-init="$watch('open', value => document.body.classList.toggle('overflow-hidden', value))">
            <!-- Botón para abrir el modal -->
            <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">
                Nueva Campaña
            </button>

            <!-- Modal -->
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
                <div
                    class="bg-white rounded-lg shadow-lg max-w-4xl w-full overflow-y-auto max-h-[80vh] transform transition-all">
                    <!-- Encabezado del modal -->
                    <div class="flex justify-between items-center p-4 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-red-500">Nueva Campaña</h4>
                        <button @click="open = false" class="text-gray-500 hover:text-gray-700">Cerrar</button>
                    </div>

                    <!-- Contenido del modal con tabs -->
                    <div class="p-4">
                        <div class="border-b border-gray-200">
                            <nav class="flex space-x-4" aria-label="Tabs">
                                <button @click="tab = 'informacion'"
                                    :class="{ 'text-blue-500 border-b-2 border-blue-500': tab === 'informacion' }"
                                    class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
                                    Información Convocatoria
                                </button>
                                <button @click="tab = 'producto'"
                                    :class="{ 'text-blue-500 border-b-2 border-blue-500': tab === 'producto' }"
                                    class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
                                    Producto Solicitado
                                </button>
                            </nav>
                        </div>

                        <!-- Contenedor para los contenidos de cada tab con transición horizontal -->
                        <form method="POST" action="{{ route('convocatoria.store') }}" id="form">
                            @csrf
                            <div class="relative mt-4 overflow-hidden">
                                <div class="flex transition-transform ease-in-out duration-500"
                                    :style="{
                                        transform: tab === 'informacion' ? 'translateX(0%)' : 'translateX(-100%)'
                                    }">

                                    <!-- Información de Convocatoria -->
                                    <div class="w-full px-4 space-y-4 flex-shrink-0">
                                        <div class="grid grid-cols-2 gap-4 p-4 bg-gray-100 rounded-lg">
                                            <!-- Título -->
                                            <div class="col-span-2">
                                                <label for="titulo"
                                                    class="block text-sm font-medium text-gray-700">Título:</label>
                                                <input type="text" id="titulo" name="titulo"
                                                    value="{{ old('titulo') }}"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    placeholder="Ingrese el título" required>
                                                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                                            </div>

                                            <!-- Descripción -->
                                            <div class="col-span-2">
                                                <label for="descripcion"
                                                    class="block text-sm font-medium text-gray-700">Descripción:</label>
                                                <textarea id="descripcion" name="descripcion" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    placeholder="Ingrese la descripción" required>{{ old('descripcion') }}</textarea>
                                            </div>

                                            <!-- Fecha de Inicio -->
                                            <div class="col-span-2">
                                                <label for="fecha_inicio"
                                                    class="block text-sm font-medium text-gray-700">Fecha de
                                                    Inicio:</label>
                                                <input type="date" id="fecha_inicio" name="fecha_inicio"
                                                    value="{{ old('fecha_inicio') }}"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    required>
                                            </div>

                                            <!-- Fecha de Fin -->
                                            <div class="col-span-2">
                                                <label for="fecha_fin"
                                                    class="block text-sm font-medium text-gray-700">Fecha de
                                                    Fin:</label>
                                                <input type="date" id="fecha_fin" name="fecha_fin"
                                                    value="{{ old('fecha_fin') }}"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    required>
                                            </div>

                                            <!-- Objetivo -->
                                            <div class="col-span-2">
                                                <label for="objetivo"
                                                    class="block text-sm font-medium text-gray-700">Objetivo:</label>
                                                <textarea id="objetivo" name="objetivo" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    placeholder="Ingrese el objetivo" required>{{ old('objetivo') }}</textarea>
                                            </div>

                                            <!-- Comentarios -->
                                            <div class="col-span-2">
                                                <label for="comentarios"
                                                    class="block text-sm font-medium text-gray-700">Comentarios:</label>
                                                <textarea id="comentarios" name="comentarios" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    placeholder="Ingrese comentarios adicionales">{{ old('comentarios') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Producto Solicitado -->
                                    <div class="w-full px-4 space-y-4 flex-shrink-0">
                                        <div class="grid grid-cols-2 gap-4 p-4 bg-gray-100 rounded-lg">
                                            <!-- Campo de input para 'nombre' -->
                                            <div class="col-span-2">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre:</label>
                                                <input type="text" id="nombre" name="nombre"
                                                    value="{{ old('nombre') }}"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    placeholder="Ingrese el nombre del producto" required>
                                            </div>

                                            <!-- Campo de textarea para 'descript' -->
                                            <div class="col-span-2">
                                                <label for="descript"
                                                    class="block text-sm font-medium text-gray-700">Descripción:</label>
                                                <textarea id="descript" name="descript" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    rows="3" placeholder="Ingrese la descripción" required>{{ old('descript') }}</textarea>
                                            </div>

                                            <!-- Cantidad de Artículos -->
                                            <div class="col-span-2">
                                                <label for="cantarticulos"
                                                    class="block text-sm font-medium text-gray-700">Cantidad de
                                                    Artículos:</label>
                                                <input type="number" id="cantarticulos" name="cantarticulos"
                                                    value="{{ old('cantarticulos') }}"
                                                    class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                                    placeholder="Meta de productos en unidades, ejemplo: 10 unidades"
                                                    required>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Footer del modal -->
                    <div class="flex justify-end p-4 border-t border-gray-200">
                        <button @click="open = false" id="btnModalCerrar"
                            class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cerrar</button>
                        <button onclick="formNuevaCampania()"
                            class="bg-green-500 text-white px-4 py-2 rounded">Guardar
                            Campaña</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor principal -->
    <div class="flex flex-col lg:flex-row gap-[20px]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] flex-1">
            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Campañas Activas</h3>
                <p class="text-4xl font-bold">{{ $convocatoriasActivas }}</p>
                <p class="text-sm text-gray-500">Total en curso actualmente</p>
            </div>

            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Artículos Recaudados</h3>
                <p class="text-4xl font-bold">{{ $totProductRecaudados }}</p>
                <p class="text-sm text-gray-500">meta: {{ $totProductSolici }} artículos</p>
                <div class="bg-gray-200 rounded-full h-[10px] mt-[10px]">
                    <div class="bg-green-500 h-[10px] rounded-full" style="width: {{ $porcentajeRecaudacion }}%;">
                    </div>
                </div>
            </div>

            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Campañas Finalizadas</h3>
                <p class="text-4xl font-bold">{{ $convocatoriasFinalizadas }}</p>
                <p class="text-sm text-gray-500">Desde el inicio del año</p>
            </div>

            <div class="bg-white p-[20px] rounded-[20px] shadow-md">
                <h3 class="text-lg font-semibold mb-[10px]">Total de donaciones</h3>
                <p class="text-4xl font-bold">{{ $totRegisRecau }}</p>
                <p class="text-sm text-gray-500">donaciones de productos</p>
            </div>
        </div>

        <!-- Gráfica -->
        <div class="bg-white p-[20px] rounded-[20px] shadow-md flex-1 w-full lg:max-w-[600px]">
            <h3 class="text-lg font-semibold mb-[10px]">Campañas</h3>
            <canvas id="campaignChart" class="w-full h-[300px] sm:h-[400px]"></canvas>
        </div>
    </div>

    <!-- Sección de detalles -->
    <div class="mt-[30px] overflow-x-auto">
        <div class="flex items-center justify-between pb-4 bg-white p-4 rounded-lg shadow-md mb-6">

            <!-- Contenedor para Search (lado izquierdo) -->
            <div class="flex-1 flex justify-start">
                <div class="flex-shrink-0">
                    <h3 class="text-xl font-semibold">Detalles de Campañas</h3>
                </div>
            </div>

            <!-- Contenedor del Formulario de Filtros (centro) -->
            <div class="flex-1 flex justify-center">
                <form action="{{ route('admin.donaciones', ['seccion' => 2]) }}" method="POST"
                    class="flex items-center space-x-6">
                    @csrf
                    @method('GET')
                    <div class="w-48">
                        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select id="estado" name="estado"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transform transition-transform duration-200 hover:scale-105">
                            <option value="0" {{ $estado == 0 ? 'selected' : '' }}>Todos</option>
                            <option value="1" {{ $estado == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $estado == 2 ? 'selected' : '' }}>Finalizado</option>
                            <option value="3" {{ $estado == 3 ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <button id="filterButton" type="submit"
                            class="w-48 px-4 py-2 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transform transition-transform duration-200 hover:scale-110">
                            Aplicar Filtros
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contenedor del Título (lado derecho) -->
            <div class="flex-1 flex justify-end">
                
                <form action="{{ route('admin.donaciones', ['seccion' => 2]) }}" method="POST" id="search-form"
                    class="flex items-center space-x-6">
                    @csrf
                    @method('GET')
                    <div class="relative">
                        <input type="text" name='search' placeholder="Buscar"
                            class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        <i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500'></i>
                    </div>
                </form>
            </div>
        </div>

        <table class="w-full bg-white rounded-[20px] shadow-md ">
            <thead>
                <tr class="bg-[#BBDEFB] text-center">
                    <th class="p-[15px] ">Nombre de la Campaña</th>
                    <th class="p-[15px] ">Producto</th>
                    <th class="p-[15px] ">Recaudación Actual</th>
                    <th class="p-[15px] ">Objetivo</th>
                    <th class="p-[15px] ">Fecha Incio</th>
                    <th class="p-[15px] ">Fecha Fin</th>
                    <th class="p-[15px] ">Estado</th>
                    <th class="p-[15px] ">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($convocatorias as $conv)
                    <tr class="border-b text-center">
                        <td class="p-[15px] ">{{ $conv->titulo }}</td>
                        <td class="p-[15px] ">{{ $conv->productoSolicitado->nombre }}</td>
                        <td class="p-[15px] ">{{ $conv->artfaltantes }}</td>
                        <td class="p-[15px] ">{{ $conv->cantarticulos }}</td>
                        <td class="p-[15px] ">{{ \Carbon\Carbon::parse($conv->fecha_inicio)->format('d-m-Y') }}</td>
                        <td class="p-[15px] ">{{ \Carbon\Carbon::parse($conv->fecha_fin)->format('d-m-Y') }}</td>
                        <td class="p-[15px] ">
                            @switch($conv->estado)
                                @case(1)
                                    <span
                                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Activo</span>
                                @break

                                @case(2)
                                    <span
                                        class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Finalizado</span>
                                @break

                                @case(3)
                                    <span
                                        class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Cancelado</span>
                                @break
                            @endswitch
                        </td>
                        <td class="p-[15px]  flex justify-center space-x-3 ">

                            {{-- MODAL DE RECAUDACION --}}
                            @if ($conv->estado == 1)
                                @include('Dashboard.Admin.layouts.modales.donaciones.modal_recaudacion')
                            @endif


                            @include('Dashboard.Admin.layouts.modales.donaciones.modal_vista_recaudacion')

                            @if ($conv->estado == 1)
                                @if ($conv->isInPage != 1)
                                    <span onclick="submitFormulario('formCam{{ $conv->id }}')"
                                        class="bg-green-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-green-300 hover:text-white">
                                        <i class='bx bx-chevron-up-circle text-2xl text-green-500 cursor-pointer'
                                            title="Subir de página"></i>
                                    </span>
                                    <form class="hidden" id="formCam{{ $conv->id }}"
                                        action="{{ route('campanias.store', ['id_convocatoria' => $conv->id, 'id_administrador' => auth()->user()->trabajador->administrador->id]) }}"
                                        method="POST"> @csrf </form>
                                @else
                                    <span onclick="submitFormulario('formCamD{{ $conv->id }}')"
                                        class="bg-gray-200 p-2 rounded-full transition duration-300 ease-in-out hover:bg-gray-400 hover:text-white">
                                        <i class='bx bx-chevron-down-circle text-2xl text-gray-600 cursor-pointer'
                                            title="Bajar de página"></i>
                                    </span>

                                    <form class="hidden" id="formCamD{{ $conv->id }}"
                                        action="{{ route('campanias.destroy', $conv->id) }}"method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif

                                @include('Dashboard.Admin.layouts.modales.donaciones.modal_editar_convocatoria')
                            @endif

                            {{-- <span
                                class="bg-red-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-red-300 hover:text-white">
                                <i class='bx bxs-file-pdf text-2xl cursor-pointer' title="Archivo PDF"></i>
                            </span> --}}

                            @if ($conv->estado == 1)
                                <x-button-trash :messageAlert="'¿Estás seguro de que deseas eliminar la campaña ' . $conv->titulo . '?'" :router="route('convocatoria.desactivar')" :itemId="$conv->id"
                                    :tituloModal="'Confirmar Eliminación'" />
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
{{ $convocatorias->links() }}
@vite(['resources/js/donaciones_campanias.js'])
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('campaignChart').getContext('2d');
    const campaignChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Campañas Activas', 'Campañas Finalizadas', 'Campañas Canceladas'],
            datasets: [{
                label: 'Datos de Campañas',
                data: [{{ $convocatoriasActivas }}, {{ $convocatoriasFinalizadas }},
                    {{ $convocatoriasCanceladas }}
                ],
                backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#FFC107'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

{{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eveniet explicabo sint inventore voluptatem voluptates delectus unde numquam sed nam, velit qui iusto harum tempora. Cumque consequuntur non cum atque? --}}
{{--  --}}


<script>
    function submitFormulario(id) {
        // Seleccionamos el formulario usando su id
        document.getElementById(id).submit();
    }
</script>
