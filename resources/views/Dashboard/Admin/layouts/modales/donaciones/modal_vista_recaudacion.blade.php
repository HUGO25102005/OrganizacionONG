<div x-data="{ open: false }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true"
        class="bg-blue-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-300 hover:text-white">
        <i class='bx bx-show text-2xl cursor-pointer' title="Visualizar"></i>
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
                <h4 class="text-lg font-semibold text-red-500">Convocatoria</h4>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">Cerrar</button>
            </div>

            <!-- Contenido del modal con tabs -->
            <div class="p-4">

                <!-- Contenedor para los contenidos de cada tab con transición horizontal -->
                <div class="relative mt-4 overflow-hidden">
                    <div class="flex transition-transform ease-in-out duration-500">
                        <!-- Información de Convocatoria -->
                        <div class="w-full px-4 space-y-4 flex-shrink-0">
                            <div class="grid grid-cols-2 gap-4 p-4 bg-gray-100 rounded-lg">
                                <!-- Título -->
                                <div class="col-span-2">
                                    <label for="titulo" class="block text-sm font-medium text-gray-700">Título de la
                                        Convocatoria:</label>
                                    <p id="titulo"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->titulo ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Descripción -->
                                <div class="col-span-2">
                                    <label for="descripcion"
                                        class="block text-sm font-medium text-gray-700">Descripción:</label>
                                    <p id="descripcion"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->descripcion ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Fecha de Inicio -->
                                <div>
                                    <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de
                                        Inicio:</label>
                                    <p id="fecha_inicio"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->fecha_inicio ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Fecha de Fin -->
                                <div>
                                    <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha de
                                        Fin:</label>
                                    <p id="fecha_fin"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->fecha_fin ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Estado -->
                                <div>
                                    <label for="estado"
                                        class="block text-sm font-medium text-gray-700">Estado:</label>
                                    <p id="estado"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->estado ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Cantidad de Artículos -->
                                <div>
                                    <label for="cantarticulos" class="block text-sm font-medium text-gray-700">Cantidad
                                        de Artículos:</label>
                                    <p id="cantarticulos"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->cantarticulos ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Objetivo -->
                                <div class="col-span-2">
                                    <label for="objetivo"
                                        class="block text-sm font-medium text-gray-700">Objetivo:</label>
                                    <p id="objetivo"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->objetivo ?? 'No disponible' }}
                                    </p>
                                </div>

                                <!-- Comentarios -->
                                <div class="col-span-2">
                                    <label for="comentarios"
                                        class="block text-sm font-medium text-gray-700">Comentarios:</label>
                                    <p id="comentarios"
                                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-white">
                                        {{ $conv->comentarios ?? 'No disponible' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer del modal -->
            <div class="flex justify-end p-4 border-t border-gray-200">
                <button @click="open = false" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cerrar</button>
                <button onclick="submitFormulario('formRecaudacion{{ $conv->id }}')"
                    class="bg-green-500 text-white px-4 py-2 rounded">Guardar
                    Valoración</button>
            </div>
        </div>
    </div>
</div>
