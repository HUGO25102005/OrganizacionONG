<div x-data="{ open: false }">
    <!-- Botón para abrir el modal -->
    <button @click="open = true"
        class="add-admin-button flex items-center bg-[#2A334B] text-white py-2 px-4 rounded-full shadow-md hover:bg-gray-100transition duration-200">
        <i class='bx bx-user-plus mr-2'></i> Nuevo Voluntario
    </button>

    <!-- Modal -->
    <div x-show="open" x-transition class="fixed inset-0 bg-gray-800 bg-opacity-30 flex justify-center items-center"
        @click.away="open = false" style="display: none;">

        <div class="bg-white rounded-3xl p-8 w-[800px] max-h-[80vh] shadow-lg overflow-y-auto">
            <!-- Ajustar el ancho aquí -->
            <h2 class="text-2xl font-bold mb-6 text-center text-[#2A334B]">Agregar Voluntario</h2>
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

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-id-card text-white'></i> <!-- Icono para identificación oficial -->
                    </div>
                    <input type="text" placeholder="Identificación Oficial" name="Identificacion_Oficial"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

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

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-briefcase text-white'></i> <!-- Icono para experiencia previa -->
                    </div>
                    <input type="text" placeholder="Experiencia previa" name="Experiencia_Previa"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-briefcase text-white'></i> <!-- Icono para experiencia laboral -->
                    </div>
                    <input type="text" placeholder="Experiencia laboral" name="Experiencia_Laboral"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-check-square text-white'></i> <!-- Icono para habilidades -->
                    </div>
                    <input type="text" placeholder="Habilidades y conocimientos" name="Habilidades_Conocimientos"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-check-square text-white'></i> <!-- Icono para habilidades clave -->
                    </div>
                    <input type="text" placeholder="Habilidades clave" name="Habilidades_Clave"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-briefcase text-white'></i> <!-- Icono para experiencia en sector educativo -->
                    </div>
                    <input type="text" placeholder="Experiencia en sector educativo"
                        name="Experiencia_Sector_Educativo"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-language text-white'></i> <!-- Icono para idiomas -->
                    </div>
                    <input type="text" placeholder="Idiomas" name="Idiomas"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-key text-white'></i> <!-- Icono para función clave -->
                    </div>
                    <input type="text" placeholder="Función clave" name="Funcion_Clave"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-wrench text-white'></i> <!-- Icono para área de supervisión -->
                    </div>
                    <input type="text" placeholder="Área de supervisión" name="Area_Supervision"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-tool text-white'></i> <!-- Icono para capacidad de manejo de equipos -->
                    </div>
                    <input type="text" placeholder="Capacidad de manejo de equipos"
                        name="Capacidad_Manejo_Equipos"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-tool text-white'></i> <!-- Icono para conocimientos de herramientas -->
                    </div>
                    <input type="text" placeholder="Conocimientos de herramientas"
                        name="Conocimientos_Herramientas"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-plane text-white'></i> <!-- Icono para disponibilidad de viajes -->
                    </div>
                    <input type="text" placeholder="Disponibilidad para viajes" name="Disponibilidad_Viajes"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-heart text-white'></i> <!-- Icono para compromiso con ONG -->
                    </div>
                    <input type="text" placeholder="Compromiso con ONG" name="Compromiso_ONG"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-group text-white'></i> <!-- Icono para referencias laborales -->
                    </div>
                    <input type="text" placeholder="Referencias laborales" name="Referencias_Laborales"
                        class="text-black pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div>

                <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-comment-detail text-white'></i> <!-- Icono para motivo en sector educativo -->
                    </div>
                    <textarea type="text" placeholder="Motivo en sector educativo"
                        class="text-black pl-10 pr-4 py-2 w-full rounded bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200"
                        name="Motivo_Sector_Educativo" id="" cols="30" rows="1"></textarea>

                </div>

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-comment-detail text-white'></i> <!-- Icono para comentarios adicionales -->
                    </div>
                    <input type="text" placeholder="Comentarios adicionales" name="Comentarios_Adicionales"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}

                {{-- <div class="relative">
                    <div
                        class="absolute left-1 top-1/2 transform -translate-y-1/2 w-8 h-8 bg-[#2A334B] rounded-full flex items-center justify-center">
                        <i class='bx bx-check-circle text-white'></i> <!-- Icono para declaración de veracidad -->
                    </div>
                    <input type="text" placeholder="Declaración de veracidad" name="Declaracion_Veracidad"
                        class="pl-10 pr-4 py-2 w-full rounded-full bg-[#F1F3F5] focus:outline-none border border-gray-300 focus:border-[#2A334B] transition duration-200">
                </div> --}}
                <!-- Botón de enviar -->
                <div class="flex justify-between mt-6">
                    <button @click="open = false" type="button" id="cancelarModal"
                        class="flex items-center space-x-2 bg-red-500 text-white py-2 px-6 rounded-full hover:bg-red-600 transition duration-200">
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
