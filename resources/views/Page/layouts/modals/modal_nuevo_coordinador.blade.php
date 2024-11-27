<div x-data="{ open: false, tab: 'personal' }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true" class="experience-donate">
        <img src="{{ asset('images/unirme.png') }}" alt="Unirme" class="donate-img w-28 h-22">
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
                <h4 class="text-lg font-semibold text-red-500">Solicitud a Coordinador</h4>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700">Cerrar</button>
            </div>

            <!-- Navegación de tabs -->
            <div class="p-4">
                <div class="border-b border-gray-200">
                    <nav class="flex space-x-4" aria-label="Tabs">
                        <button @click="tab = 'personal'"
                            :class="{ 'border-b-2 border-blue-500 text-blue-500': tab === 'personal' }"
                            class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
                            Datos Personales
                        </button>
                    </nav>
                </div>
            </div>
            

            <!-- Contenido del formulario -->
            <form action="{{ route('coord.store') }}" method="POST" class="p-4">
                @csrf

                <div class="relative mt-1 overflow-hidden">
                    <div class="flex transition-transform ease-in-out duration-500"
                        :style="{
                            transform: tab === 'personal' ? 'translateX(0%)' : 'translateX(0%)'
                        }">
                        <!-- Datos Personales -->
                        <div x-show="tab === 'personal'" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="w-full px-4 space-y-4 flex-shrink-0">
                            <div class="grid grid-cols-2 gap-4 p-4 bg-gray-100 rounded-lg">
                                <div class="mb-4">
                                    <input type="text" name="name" placeholder="Nombre"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="apellido_paterno" placeholder="Apellido Paterno"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="apellido_materno" placeholder="Apellido Materno"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" placeholder="Correo electrónico"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <label for="genero" class="block text-gray-700 font-bold mb-2">Género</label>
                                    <select name="genero" id="genero"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_nacimiento" class="block text-gray-700 font-bold mb-2">Fecha
                                        Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>

                                <div class="mb-4">
                                    <input type="tel" name="telefono" placeholder="Teléfono"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="direccion" placeholder="Dirección"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <!-- País -->
                                <div class="mb-4">
                                    <input type="text" name="pais" placeholder="País"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required maxlength="100">
                                </div>

                                <!-- Estado -->
                                <div class="mb-4">
                                    <input type="text" name="estado" placeholder="Estado"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required maxlength="100">
                                </div>

                                <!-- Municipio -->
                                <div class="mb-4">
                                    <input type="text" name="municipio" placeholder="Municipio"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required maxlength="100">
                                </div>

                                <!-- Código Postal -->
                                <div class="mb-4">
                                    <input type="text" name="cp" placeholder="Código Postal"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required minlength="5">
                                </div>

                                {{--    Hora inicio  --}}

                                <div class="mb-4">
                                    <label for="hora_inicio" class="block text-gray-700 font-medium mb-2">Hora de
                                        inicio</label>
                                    <input type="time" id="hora_inicio" name="hora_inicio"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>

                                {{-- hora fin --}}
                                <div class="mb-4">
                                    <label for="hora_fin" class="block text-gray-700 font-medium mb-2">Hora de
                                        inicio</label>
                                    <input type="time" id="hora_fin" name="hora_fin"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                                <input type="hidden" id="password" name="password" value="12345678">
                                <input type="hidden" id="password_confirmation" name="password_confirmation" value="12345678">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-6">
                    <button type="submit"
                        class="bg-blue-600 text-white rounded-lg px-6 py-2 hover:bg-blue-500">Enviar</button>
                    <button type="button" @click="open = false"
                        class="text-red-600 hover:underline">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
