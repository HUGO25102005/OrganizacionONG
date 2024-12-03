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
                <h4 class="text-lg font-semibold text-red-500">Solicitud a Voluntariado</h4>
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
                        <button @click="tab = 'tecnicos'"
                            :class="{ 'border-b-2 border-blue-500 text-blue-500': tab === 'tecnicos' }"
                            class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
                            Datos Técnicos
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Contenido del formulario -->
            <form action="{{ route('vol.store') }}" id="nuevoVoluntario" method="POST" class="p-4">
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
                                    <input type="text" value="{{ old('name') }}" id="vol_name" name="name"
                                        placeholder="Nombre" onfocus="resetInput('vol_name')"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('apellido_paterno') }}"
                                        onfocus="resetInput('vol_apellido_paterno')" id="vol_apellido_paterno"
                                        name="apellido_paterno" placeholder="Apellido Paterno"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('apellido_materno') }}"
                                        onfocus="resetInput('vol_apellido_materno')" id="vol_apellido_materno"
                                        name="apellido_materno" placeholder="Apellido Materno"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="email" value="{{ old('email') }}" id="vol_email" name="email"
                                        onfocus="resetInput('vol_email')" placeholder="Correo electrónico"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <label for="genero" class="block text-gray-700 font-bold mb-2">Género</label>
                                    <select name="genero" value="{{ old('genero') }}" id="vol_genero"
                                        onfocus="resetInput('vol_genero')"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" disabled selected>Selecciona una opción</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_nacimiento" class="block text-gray-700 font-bold mb-2">Fecha
                                        Nacimiento</label>
                                    <input type="date" value="{{ old('fecha_nacimiento') }}"
                                        onfocus="resetInput('vol_fecha_nacimiento')" id="vol_fecha_nacimiento"
                                        name="fecha_nacimiento"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="tel" value="{{ old('telefono') }}" id="vol_telefono"
                                        name="telefono" onfocus="resetInput('vol_telefono')" placeholder="Teléfono"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('direccion') }}" id="vol_direccion"
                                        name="direccion" onfocus="resetInput('vol_direccion')"
                                        placeholder="Dirección"
                                        class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('pais') }}" id="vol_pais" name="pais"
                                        onfocus="resetInput('vol_pais')" placeholder="País"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="100">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('estado') }}" id="vol_estado"
                                        name="estado" onfocus="resetInput('vol_estado')" placeholder="Estado"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="100">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('municipio') }}" id="vol_municipio"
                                        name="municipio" onfocus="resetInput('vol_municipio')"
                                        placeholder="Municipio"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="100">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('cp') }}" id="vol_cp" name="cp"
                                        onfocus="resetInput('vol_cp')" placeholder="Código Postal"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        maxlength="5">
                                </div>
                            </div>

                        </div>

                        <!-- Datos Técnicos -->
                        <div x-show="tab === 'tecnicos'" x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="w-full px-4 space-y-4 flex-shrink-0">
                            <div class="grid grid-cols-2 gap-4 p-4 bg-gray-100 rounded-lg">
                                <div class="mb-4">
                                    <input type="text" value="{{ old('dias_disponibles') }}" id="vol_dias_dispo"
                                        onfocus="resetInput('vol_dias_dispo')" name="dias_disponibles"
                                        placeholder="Días disponibles"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('preferencia_colaboracion') }}"
                                        id="vol_preferencia_colabo" onfocus="resetInput('vol_preferencia_colabo')"
                                        name="preferencia_colaboracion" placeholder="Preferencia de colaboración"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('experiencia_previa') }}"
                                        id="vol_experencia_previa" onfocus="resetInput('vol_experencia_previa')"
                                        name="experiencia_previa" placeholder="Experiencia previa"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('habilidades_conocimientos') }}"
                                        id="vol_habilidades" onfocus="resetInput('vol_habilidades')"
                                        name="habilidades_conocimientos" placeholder="Habilidades y conocimientos"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="text" value="{{ old('area_interes') }}" id="vol_area"
                                        onfocus="resetInput('vol_area')" name="area_interes"
                                        placeholder="Área de interés"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <input type="number" value="{{ old('hrs_dedicadas_semana') }}"
                                        id="vol_hrs_dedicadas_semana" onfocus="resetInput('vol_hrs_dedicadas_semana')"
                                        name="hrs_dedicadas_semana" min="1" max="40"
                                        placeholder="Horas dedicadas por semana"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_inicio" class="block text-gray-700 font-medium mb-2">Fecha de
                                        inicio</label>
                                    <input type="date" value="{{ old('fecha_incio') }}" id="vol_fecha_inicio"
                                        onfocus="resetInput('vol_fecha_inicio')" name="fecha_inicio"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">
                                    <label for="fecha_termino" class="block text-gray-700 font-medium mb-2">Fecha de
                                        termino</label>
                                    <input type="date" value="{{ old('fecha_termino') }}" id="vol_fecha_termino"
                                        onfocus="resetInput('vol_fecha_termino')" name="fecha_termino"
                                        class="w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-between mt-6">
                    <button onclick="voluntarioForm()"
                        class="bg-blue-600 text-white rounded-lg px-6 py-2 hover:bg-blue-500">Enviar</button>
                    <button type="button" @click="open = false"
                        class="text-red-600 hover:underline">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/voluntarioform.js'])
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('nuevoVoluntario');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario
            console.log('El formulario ha sido prevenido de ser enviado.');
            // Aquí puedes agregar lógica adicional, como validaciones o alertas
        });
    });
</script>
