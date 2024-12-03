<div x-data="{ open: false, tab: 'informacion' }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true"
        class="bg-yellow-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-yellow-300 hover:text-white">
        <i class='bx bx-edit text-2xl cursor-pointer' title="Editar"></i>
    </button>
    <!-- Modal -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-cloak>
        <div
            class="bg-white rounded-lg shadow-lg max-w-4xl w-full overflow-y-auto max-h-[80vh] transform transition-all">
            <!-- Encabezado del modal -->
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h4 class="text-lg font-semibold text-red-500">Editar Campaña</h4>
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
                <form method="POST" action="{{ route('convocatoria.update', ['id_convocatoria' => $conv->id]) }}" id="formUp{{$conv->id}}">
                    @csrf
                    @method('PUT')
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
                                        <input type="text" id="edit_titulo" name="titulo"
                                            value="{{ old('titulo', $conv->titulo) }}"
                                            onfocus="resetInput('edit_titulo')"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                            placeholder="Ingrese el título" >
                                    </div>

                                    <!-- Descripción -->
                                    <div class="col-span-2">
                                        <label for="descripcion"
                                            class="block text-sm font-medium text-gray-700">Descripción:</label>
                                        <textarea id="edit_descripcion" name="descripcion" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                        onfocus="resetInput('edit_descripcion')"
                                        placeholder="Ingrese la descripción" >{{ old('descripcion', $conv->descripcion) }}
                                        </textarea>
                                    </div>

                                    <!-- Fecha de Inicio -->
                                    <div class="col-span-2">
                                        <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha
                                            de
                                            Inicio:</label>
                                        <input type="date" id="edit_fecha_inicio" name="fecha_inicio"
                                            onfocus="resetInput('edit_fecha_inicio')"
                                            value="{{ old('fecha_inicio', $conv->fecha_inicio) }}"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
                                    </div>

                                    <!-- Fecha de Fin -->
                                    <div class="col-span-2">
                                        <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de
                                            Fin:</label>
                                        <input type="date" id="edit_fecha_fin" name="fecha_fin"
                                        onfocus="resetInput('edit_fecha_fin')"
                                            value="{{ old('fecha_fin', $conv->fecha_fin) }}"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" >
                                    </div>

                                    <!-- Objetivo -->
                                    <div class="col-span-2">
                                        <label for="objetivo"
                                            class="block text-sm font-medium text-gray-700">Objetivo:</label>
                                        <textarea id="edit_objetivo" name="objetivo" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                        onfocus="resetInput('edit_objetivo')"
                                        placeholder="Ingrese el objetivo" >{{ old('objetivo', $conv->objetivo) }}</textarea>
                                    </div>

                                    <!-- Comentarios -->
                                    <div class="col-span-2">
                                        <label for="comentarios"
                                            class="block text-sm font-medium text-gray-700">Comentarios:</label>
                                        <textarea id="edit_comentarios" name="comentarios" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                        onfocus="resetInput('edit_comentarios')"
                                        placeholder="Ingrese comentarios adicionales">{{ old('comentarios', $conv->comentarios) }}</textarea>
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
                                        <input type="text" id="edit_nombre" name="nombre"
                                            value="{{ old('nombre', $conv->producto->nombre) }}"
                                            onfocus="resetInput('edit_nombre')"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                            placeholder="Ingrese el nombre del producto" >
                                    </div>

                                    <!-- Campo de textarea para 'descript' -->
                                    <div class="col-span-2">
                                        <label for="descript"
                                            class="block text-sm font-medium text-gray-700">Descripción:</label>
                                        <textarea id="edit_descript" name="descript" class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="3"
                                        onfocus="resetInput('edit_descript')"
                                        placeholder="Ingrese la descripción" >{{ old('descript', $conv->producto->descript) }}</textarea>
                                    </div>

                                    <!-- Cantidad de Artículos -->
                                    <div class="col-span-2">
                                        <label for="cantarticulos"
                                            class="block text-sm font-medium text-gray-700">Cantidad de
                                            Artículos:</label>
                                        <input type="number" id="edit_cantarticulos" name="cantarticulos"
                                        onfocus="resetInput('edit_cantarticulos')"
                                        value="{{ old('cantarticulos', $conv->cantarticulos) }}"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                            placeholder="Meta de productos en unidades, ejemplo: 10 unidades" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer del modal -->
            <div class="flex justify-end p-4 border-t border-gray-200">
                <button @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cerrar</button>
                <button onclick="editarConvo('formUp{{$conv->id}}')" class="bg-green-500 text-white px-4 py-2 rounded">Guardar
                    Cambios</button>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/editarconvo.js'])
