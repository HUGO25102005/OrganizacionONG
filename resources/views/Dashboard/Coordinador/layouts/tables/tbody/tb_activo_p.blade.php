<tr class="border-b text-center">
    <td class="p-[15px] ">Ayuda para Escuelas</td>
    <td class="p-[15px] ">Ernesto Jimenez</td>
    <td class="p-[15px] ">100</td>
    <td class="p-[15px] ">Virtual</td>
    <td class="p-[15px] ">$10,000</td>
    <td class="p-[15px] ">Activo</td>
    <td class="p-[15px] flex justify-center space-x-4">
        <button class="bg-blue-100 w-10 h-10 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-300 flex items-center justify-center" onclick="openModal()">
            <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
        </button>

        <!-- Modal -->
        <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden" id="modalOverlay">
            <div class="bg-white rounded-lg p-6 w-full max-h-[80vh] max-w-lg overflow-y-auto shadow-lg">
                <!-- Modal Header -->
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Detalle del Programa</h2>

                <!-- Formulario dentro del modal -->
                <form>
                    <!-- Nombre -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Programa</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="name" name="name" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Coordinador encargado -->
                    <div class="mb-4">
                        <label for="coordinador_encargado" class="block text-sm font-medium text-gray-700">Coordinador encargado</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="coordinador_encargado" name="apellido_paterno" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="descripcion" name="descripcion" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Objetivo -->
                    <div class="mb-4">
                        <label for="objetivo" class="block text-sm font-medium text-gray-700">Objetivo</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="objetivo" name="objetivo" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Tipo de público -->
                    <div class="mb-4">
                        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo de público</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="tipo" name="tipo_publico" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Duración -->
                    <div class="mb-4">
                        <label for="duracion" class="block text-sm font-medium text-gray-700">Duración</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="duracion" name="duracion" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Fecha de inicio -->
                    <div class="mb-4">
                        <label for="fecha_init" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="date" id="fecha_init" name="fecha_init" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Fecha de término -->
                    <div class="mb-4">
                        <label for="fecha_term" class="block text-sm font-medium text-gray-700">Fecha de término</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="date" id="fecha_term" name="fecha_term" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Recursos necesarios -->
                    <div class="mb-4">
                        <label for="recursos" class="block text-sm font-medium text-gray-700">Recursos necesarios</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="recursos" name="estado" maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Resultados esperados -->
                    <div class="mb-4">
                        <label for="resultados" class="block text-sm font-medium text-gray-700">Resultados esperados</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="resultados" name="municipio" maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Presupuesto -->
                    <div class="mb-4">
                        <label for="presupuesto" class="block text-sm font-medium text-gray-700">Presupuesto</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="presupuesto" name="cp" maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Beneficiarios estimados -->
                    <div class="mb-4">
                        <label for="beneficiarios" class="block text-sm font-medium text-gray-700">Beneficiarios estimados</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="beneficiarios" name="direccion" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Indicadores de cumplimiento -->
                    <div class="mb-4">
                        <label for="indicadores" class="block text-sm font-medium text-gray-700">Indicadores de cumplimiento</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="indicadores" name="telefono" maxlength="20" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Comentarios adicionales -->
                    <div class="mb-4">
                        <label for="comentarios" class="block text-sm font-medium text-gray-700">Comentarios adicionales</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="comentarios" name="telefono" maxlength="20" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>

                    <!-- Fecha de registro de actividad -->
                    <div class="mb-4">
                        <label for="fecha_registro" class="block text-sm font-medium text-gray-700">Fecha de registro de actividad</label>
                        <div class="flex items-center bg-gray-100 rounded-full p-2">
                            <input type="text" id="fecha_registro" name="telefono" maxlength="20" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                        </div>
                    </div>





                <!-- Modal Footer -->
                <div class="mt-6 text-right">
                    <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Cerrar</button>
                </div>
            </form>
        </div>



        <script>
            // Función para abrir el modal
            function openModal() {
                document.getElementById('modalOverlay').classList.remove('hidden');
            }

            // Función para cerrar el modal
            function closeModal() {
                document.getElementById('modalOverlay').classList.add('hidden');
            }
        </script>



        <span class="bg-blue-200 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-600">
            <i class='bx bx-detail text-2xl text-blue-500 cursor-pointer' title="Aprobar"></i>
        </span>
    </td>                        
</tr>