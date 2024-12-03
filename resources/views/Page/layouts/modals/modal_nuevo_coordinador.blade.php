<div x-data="{ open: false, tab: 'personal' }">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Botón para abrir el modal -->
    <button @click="open = true" class="experience-donate">
        <img src="{{ asset('images/unirme.png') }}" alt="Unirme" class="donate-img w-28 h-22">
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
            <form action="{{ route('coord.store') }}" id="coordinadorForm" method="POST" class="p-4">
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
                                    <input type="text" value="{{ old('name') }}" id="co_name" name="name"
                                        placeholder="Nombre" onfocus="resetInput('co_name')"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('apellido_paterno') }}" id="co_apellido_paterno"
                                        name="apellido_paterno" placeholder="Apellido Paterno"
                                        onfocus="resetInput('co_apellido_paterno')"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('apellido_materno') }}" id="co_apellido_materno"
                                        onfocus="resetInput('co_apellido_materno')" name="apellido_materno"
                                        placeholder="Apellido Materno"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="email" value="{{ old('email') }}" id="co_email" name="email"
                                        onfocus="resetInput('co_email')" placeholder="Correo electrónico"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <label for="genero" class="block text-gray-700 font-bold mb-2">Género</label>
                                    <select name="genero" id="co_genero" onfocus="resetInput('co_genero')"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" disabled {{ old('genero') == '' ? 'selected' : '' }}>
                                            Selecciona una opción</option>
                                        <option value="M" {{ old('genero') == 'M' ? 'selected' : '' }}>Masculino
                                        </option>
                                        <option value="F" {{ old('genero') == 'F' ? 'selected' : '' }}>Femenino
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_nacimiento" class="block text-gray-700 font-bold mb-2">Fecha
                                        Nacimiento</label>
                                    <input type="date" value="{{ old('fecha_nacimiento') }}"
                                        id="co_fecha_nacimiento" onfocus="resetInput('co_fecha_nacimiento')"
                                        name="fecha_nacimiento"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>

                                <div class="mb-4">
                                    <input type="tel" value="{{ old('telefono') }}" id="co_telefono"
                                        onfocus="resetInput('co_telefono')" name="telefono" placeholder="Teléfono"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('direccion') }}" id="co_direccion"
                                        onfocus="resetInput('co_direccion')" name="direccion" placeholder="Dirección"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>

                                <!-- País -->
                                <div class="mb-4">
                                    <input type="text" value="{{ old('pais') }}" id="co_pais" name="pais"
                                        onfocus="resetInput('co_pais')" placeholder="País"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="100">
                                </div>

                                <!-- Estado -->
                                <div class="mb-4">
                                    <input type="text" value="{{ old('estado') }}" id="co_estado" name="estado"
                                        onfocus="resetInput('co_estado')" placeholder="Estado"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="100">
                                </div>

                                <!-- Municipio -->
                                <div class="mb-4">
                                    <input type="text" value="{{ old('municipio') }}" id="co_municipio"
                                        onfocus="resetInput('co_municipio')" name="municipio" placeholder="Municipio"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="100">
                                </div>

                                <!-- Código Postal -->
                                <div class="mb-4">
                                    <input type="text" value="{{ old('cp') }}" id="co_cp" name="cp"
                                        onfocus="resetInput('co_cp')" placeholder="Código Postal"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="5">
                                </div>

                                {{-- Hora inicio --}}
                                <div class="mb-4">
                                    <label for="hora_inicio" class="block text-gray-700 font-medium mb-2">Hora de
                                        inicio</label>
                                    <input type="time" value="{{ old('hora_inicio') }}" id="co_hora_inicio"
                                        onfocus="resetInput('co_hora_inicio')" name="hora_inicio"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                {{-- Hora fin --}}
                                <div class="mb-4">
                                    <label for="hora_fin" class="block text-gray-700 font-medium mb-2">Hora de
                                        fin</label>
                                    <input type="time" value="{{ old('hora_fin') }}" id="co_hora_fin"
                                        onfocus="resetInput('co_hora_fin')" name="hora_fin"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <input type="hidden" id="password" name="password" value="12345678">
                                <input type="hidden" id="password_confirmation" name="password_confirmation"
                                    value="12345678">
                            </div>
                            <div class="relative w-full mb-5 flex items-center gap-4">
                                <!-- Checkbox con estilo neumorphism -->
                                <label class="relative flex items-center cursor-pointer">
                                    <input type="checkbox" class="hidden accept-terms">
                                    <div class="w-6 h-6 bg-gray-100 rounded-lg shadow-md flex items-center justify-center transition-all duration-300 transform hover:scale-110 checkbox-container"
                                         style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff; border: 2px solid #dbe8fc;">
                                        <!-- Icono de palomita -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white hidden check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </label>
                                <a href="#" class="link-terminos">Acepto los <strong>Términos y Condiciones</strong></a>
                            </div>    

                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-6">
                    <button onclick="coordinatorForm()"
                    class="submit-button bg-blue-600 text-white rounded-lg px-6 py-2 hover:bg-blue-500 disabled:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-500" disabled>Enviar</button>
                    <button type="button" @click="open = false"
                        class="text-red-600 hover:underline">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/coordinatorform.js'])
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('coordinadorForm');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario
            console.log('El formulario ha sido prevenido de ser enviado.');
            // Aquí puedes agregar lógica adicional, como validaciones o alertas
        });
    });
</script>
