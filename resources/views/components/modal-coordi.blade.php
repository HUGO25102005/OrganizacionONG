<div x-data="{ open: false }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true"
        class="add-admin-button flex items-center bg-[#2A334B] text-white py-2 px-4 rounded-full shadow-md hover:bg-gray-100 transition duration-200">
        <i class='bx bx-user-plus mr-2'></i> Nuevo Coordinador
    </button>

    <!-- Modal -->
    <div x-show="open" x-transition class="fixed inset-0 bg-gray-800 bg-opacity-30 flex justify-center items-center"
        @click.away="open = false" style="display: none;">

        <div class="bg-white rounded-3xl p-8 w-[800px] max-h-[80vh] shadow-lg overflow-y-auto">
            <h2 class="text-2xl font-bold mb-6 text-center text-[#2A334B]">Agregar Coordinador</h2>
            <form class="space-y-4" action="{{ route('user.store') }}" method="POST">
                @csrf

                <input type="hidden" name="Rol" value="{{ $tipo }}">
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-user text-white'></i>
                    </div>
                    <input type="text" placeholder="Nombre completo" name="name"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-envelope text-white'></i>
                    </div>
                    <input type="email" placeholder="Correo electrónico" name="email"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-lock-alt text-white'></i>
                    </div>
                    <input type="password" placeholder="Contraseña" name="password"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-calendar text-white'></i>
                    </div>
                    <input type="text" placeholder="Fecha de nacimiento (dd/mm/aaaa)" name="Fecha_Nacimiento"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-user-pin'></i> <!-- Icono para género -->
                    </div>
                    <select name="Genero" id=""
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                        <option value="" selected disabled>Elige una Opcion</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-phone text-white'></i>
                    </div>
                    <input type="tel" placeholder="Teléfono" name="Telefono"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-map text-white'></i>
                    </div>
                    <input type="text" placeholder="País" name="Pais"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-map text-white'></i>
                    </div>
                    <input type="text" placeholder="Estado" name="Estado"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-map text-white'></i>
                    </div>
                    <input type="text" placeholder="Municipio" name="Municipio"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-map text-white'></i>
                    </div>
                    <input type="text" placeholder="Dirección" name="Direccion"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>
                {{-- <!-- Identificación Oficial -->
                <div class="relative">
                    <div class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-id-card text-white'></i>
                    </div>
                    <input type="text" placeholder="Identificación Oficial" name="Identificacion_Oficial"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200" required>
                </div> --}}

                <!-- Experiencia Previa -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-briefcase text-white'></i>
                    </div>
                    <input type="text" placeholder="Experiencia Previa" name="Experiencia_Previa"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Habilidades y Conocimientos -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-star text-white'></i>
                    </div>
                    <input type="text" placeholder="Habilidades y Conocimientos" name="Habilidades_Conocimientos"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Experiencia Laboral -->
                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-briefcase text-white'></i>
                    </div>
                    <input type="text" placeholder="Experiencia Laboral" name="Experiencia_Laboral"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div> --}}

                <!-- Experiencia en Sector Educativo -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-school text-white'></i>
                    </div>
                    <input type="text" placeholder="Experiencia en Sector Educativo"
                        name="Experiencia_Sector_Educativo"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Habilidades Clave -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-cog text-white'></i>
                    </div>
                    <input type="text" placeholder="Habilidades Clave" name="Habilidades_Clave"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Idiomas -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-globe text-white'></i>
                    </div>
                    <input type="text" placeholder="Idiomas" name="Idiomas"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Función Clave -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-target-lock text-white'></i>
                    </div>
                    <input type="text" placeholder="Función Clave" name="Funcion_Clave"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Área de Supervisión -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-area text-white'></i>
                    </div>
                    <input type="text" placeholder="Área de Supervisión" name="Area_Supervision"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>

                <!-- Capacidad de Manejo de Equipos -->
                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-cog text-white'></i>
                    </div>
                    <input type="text" placeholder="Capacidad de Manejo de Equipos"
                        name="Capacidad_Manejo_Equipos"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div> --}}

                <!-- Conocimientos de Herramientas -->
                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-tools text-white'></i>
                    </div>
                    <input type="text" placeholder="Conocimientos de Herramientas"
                        name="Conocimientos_Herramientas"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        required>
                </div>
                <!-- Botón para cerrar el modal -->
                <div class="flex justify-between mt-6">
                    <button @click="open = false" type="button" id="cancelarModal"
                        class="flex items-center space-x-2 bg-gray-500 text-white py-2 px-6 rounded-full hover:bg-red-600 transition duration-200">
                        <i class='bx bx-x text-xl'></i>
                        <span>Cancelar</span>
                    </button>
                    <button type="submit"
                        class="flex items-center space-x-2 bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700 transition duration-200">
                        <i class='bx bx-user-plus text-xl'></i>
                        <span>Agregar</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
