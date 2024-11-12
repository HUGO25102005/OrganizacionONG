<div class="bg-white p-4 rounded-lg shadow-md mb-6">
    <h2 class="text-2xl font-semibold  text-center">Filtros</h2>
    <div class="flex flex-wrap items-center justify-between mb-4 mt-4 space-y-4 md:space-y-0">
        <div class="flex flex-col md:flex-row items-center space-x-6 space-y-4 md:space-y-0 w-full md:w-auto">
            <!-- Formulario de filtros -->
            <form action="{{ route('coordinador.programas') }}" method="POST" class="flex flex-col md:flex-row items-center md:space-x-6 w-full md:w-auto">
                @csrf
                @method('GET')

                <!-- Filtro de estado -->
                <div class="w-full md:w-48 flex flex-col md:flex-row items-center md:space-x-4">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select id="estado" name="estado"
                        class="mt-1 md:mt-0 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transform transition-transform duration-200 hover:scale-105">
                        <option value="0">Todos</option>
                        <option value="4">Activo</option>
                        <option value="5">Terminado</option>
                        <option value="3">Aprovado</option>
                        <option value="2">En revisión</option>
                    </select>
                </div>

                <!-- Botón de aplicar filtro -->
                <div class="mt-4 md:mt-0">
                    <button id="filterButton" type="submit"
                        class="px-4 py-2 bg-blue-400 text-white font-medium rounded-md shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transform transition-transform duration-200 hover:scale-110">
                        Aplicar Filtros
                    </button>
                </div>
            </form>

            <!-- Botón para abrir el modal, alineado a la derecha -->
            <button id="openModalBtn" class="ml-auto flex items-center bg-blue-100 text-gray-800 font-semibold rounded-full px-4 py-2 shadow-md">
                <i class='bx bx-user-plus mr-2'></i>
                Nuevo Beneficiario
            </button>

            <!-- Modal -->
            <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white w-1/2 p-6 rounded-lg shadow-lg max-h-[80vh] overflow-y-auto">
                    <h3 class="text-xl font-semibold mb-4">Agregar Nuevo Programa</h3>

                    <!-- Formulario dentro del modal -->
                    <form>
                        <!-- Nombre -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Programa</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="name" name="name" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Apellido Paterno -->
                        <div class="mb-4">
                            <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Coordinador encargado</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="coordinador_encargado" name="apellido_paterno"  maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Apellido Materno -->
                        <div class="mb-4">
                            <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="descripcion" name="descripcion"  maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-4">
                            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Objetivo</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="objetivo" name="objetivo" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Tipo de público</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="tipo" name="tipo_publico" maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Duración</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="duracion" name="duracion"  required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="date" id="fecha_init" name="fecha_init" placeholder="Confirmar contraseña" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- País -->
                        <div class="mb-4">
                            <label for="pais" class="block text-sm font-medium text-gray-700">Fecha de termino</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="date" id="fecha_term" name="fecha_term" maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Estado -->
                        <div class="mb-4">
                            <label for="estado" class="block text-sm font-medium text-gray-700">Recursos necesarios</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="estado" name="estado"  maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Municipio -->
                        <div class="mb-4">
                            <label for="municipio" class="block text-sm font-medium text-gray-700">Resultados esperados</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="municipio" name="municipio"  maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Código Postal -->
                        <div class="mb-4">
                            <label for="cp" class="block text-sm font-medium text-gray-700">Presupuesto</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="cp" name="cp"  maxlength="100" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="mb-4">
                            <label for="direccion" class="block text-sm font-medium text-gray-700">Beneficiarios estimados</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="direccion" name="direccion"  maxlength="255" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-4">
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Indicadores de cumplimiento</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="telefono" name="telefono"  maxlength="20" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-4">
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Comentarios adicionales</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="telefono" name="telefono"  maxlength="20" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>
                        <!-- Teléfono -->
                        <div class="mb-4">
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Fecha de registro de actividad</label>
                            <div class="flex items-center bg-gray-100 rounded-full p-2">
                                <input type="text" id="telefono" name="telefono" maxlength="20" required class="bg-transparent flex-1 border-none outline-none text-black px-2" />
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end gap-2 mt-4">
                            <button type="button" id="closeModalBtn" class="bg-gray-500 text-white px-4 py-2 rounded-full hover:bg-gray-600">Cancelar</button>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Scripts para abrir y cerrar el modal
    const modal = document.getElementById('modal');
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');

    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
</script>

<script>
    document.getElementById('filterButton').addEventListener('click', function () {
        // Guarda la posición de scroll actual
        localStorage.setItem('scrollPosition', window.scrollY);
    });

    // Restaura la posición de scroll después de recargar la página
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollPosition') !== null) {
            window.scrollTo(0, localStorage.getItem('scrollPosition'));
            localStorage.removeItem('scrollPosition'); // Elimina el valor después de restaurarlo
        }
    });
</script>