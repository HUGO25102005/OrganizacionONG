<div x-data="{ open: false }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true"
        class="bg-green-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-green-300 hover:text-white">
        <i class='bx bx-plus text-2xl' title="Registrar Donacion"></i>
    </button>

    <!-- Modal -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-cloak>
        <div
            class="bg-white rounded-lg shadow-lg max-w-4xl w-full overflow-y-auto max-h-[80vh] transform transition-all">
            <!-- Encabezado del modal -->
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h4 class="text-lg font-semibold text-red-500">Recaudación</h4>
                <button @click="open = false"
                    class="text-gray-500 hover:text-gray-700">Cerrar</button>
            </div>

            <!-- Contenido del modal con tabs -->
            <div class="p-4">

                <!-- Contenedor para los contenidos de cada tab con transición horizontal -->
                <form method="POST" action="{{ route('recaudacion.store', ['id_programa' => $conv->id] ) }}"
                    id="formRecaudacion{{$conv->id}}">
                    @csrf
                    <div class="relative mt-4 overflow-hidden">
                        <div class="flex transition-transform ease-in-out duration-500"
                        
                            <input type="hidden">
                            <!-- Información de Convocatoria -->
                            <div class="w-full px-4 space-y-4 flex-shrink-0">
                                <div
                                    class="grid grid-cols-2 gap-4 p-4 bg-gray-100 rounded-lg">
                                    <!-- Título -->
                                    <div class="col-span-2">
                                        <label for="cantidad"
                                            class="block text-sm font-medium text-gray-700">Cantidad de Articulos:</label>
                                        <input type="number" id="cantidad"
                                            name="cantidad"
                                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                            placeholder="Cantidad de articulos que recibes" required>
                                    </div>

                                    <!-- Descripción -->
                                    <div class="col-span-2">
                                        <label for="comentarios"
                                            class="block text-sm font-medium text-gray-700">Comentarios:</label>
                                        <textarea id="comentarios" name="comentarios" class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                                            placeholder="Comentarios acerca de la donacion" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer del modal -->
            <div class="flex justify-end p-4 border-t border-gray-200">
                <button @click="open = false"
                    class="bg-red-500 text-white px-4 py-2 rounded mr-2">Cerrar</button>
                <button onclick="submitFormulario('formRecaudacion{{$conv->id}}')"
                    class="bg-green-500 text-white px-4 py-2 rounded">Guardar
                    Valoración</button>
            </div>
        </div>
    </div>
</div>