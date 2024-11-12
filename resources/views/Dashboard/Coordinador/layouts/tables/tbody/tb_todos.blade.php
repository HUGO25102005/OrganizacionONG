@foreach ($beneficiariosearch as $beneficiario)
        <tr class="border-b border-gray-300">
            <td class="py-3 px-4 text-center">{{ $beneficiario->id }}</td>
            <td class="py-3 px-4 text-center">{{ $beneficiario->user->getFullName() }}</td>
            <td class="py-3 px-4 text-center">{{ $beneficiario->user->email }}</td>
            <td class="py-3 px-4 text-center">{{ $beneficiario->getNivelEducativo() }}</td>
            <td class="py-3 px-4"><div class="items-center h-8 justify-center flex
                @switch ($beneficiario->estado)
                    @case(1)
                        bg-green-100 rounded-full
                        @break
                    @case(2)
                        bg-gray-200 rounded-full
                        @break
                @endswitch
            "><b>{{ $beneficiario->getEstadoDescripcion() }}</b></div></td>
            <td class="py-3 px-4 text-center">
                <div class="inline-flex items-center">
                    @if ($beneficiario->estado != 2)
                        <x-modal-view-info :classButton="'mr-2 text-blue-500 text-xl'">
                            <!-- Encabezado con foto -->
                            <header class="mb-6 border-b border-gray-200 pb-4 flex items-center">
                                <!-- Campo para la foto -->
                                <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden mr-6">
                                    <!-- Reemplazar por la imagen real -->
                                    <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                        alt="Foto del usuario" class="w-full h-full object-cover">
                                </div>
                                <!-- Título del modal -->
                                <h1 class="text-3xl font-bold text-[#2A334B]">Beneficiario</h1>
                            </header>
        
                            <!-- Información del usuario en estilo de credencial -->
                            <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Beneficiario</h4> <!-- Encabezado -->
                            <section class="mb-6 grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-600 mb-1">Nombre del Adminstrador: </label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->getFullName() }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Correo Electrónico:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->email }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Dirección:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->direccion }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Teléfono:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->telefono }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Fecha:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->fecha_nacimiento }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">País:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->pais }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Estado:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->estado }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Municipio:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->municipio }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Código Postal (CP):</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->cp }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Dirección:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->direccion }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Género:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->getGenero() }}
                                    </div>
                                </div>
                            </section>
                        
                            <!-- Botón de cerrar modal alineado a la izquierda -->
                            <div class="flex justify-start mt-6">
                                <button @click="open = false" type="button"
                                    class="flex items-center space-x-2 bg-[#2A334B] text-white py-2 px-6 rounded-full hover:bg-red-600 transition duration-200">
                                    <i class='bx bx-x text-xl'></i>
                                    <span>Cerrar</span>
                                </button>
                            </div>
                        </x-modal-view-info>
                        <x-button-trash :messageAlert="'¿Estás seguro de que deseas eliminar al beneficiario?'" :router="route('coordinador.desactivar')" :itemId="$beneficiario->id" :tituloModal="'Confirmar Eliminación'" />                    
                    @endif
                    @if ($beneficiario->estado == 2)
                        <x-modal-view-info :classButton="'mr-2 text-blue-500 text-xl'">
                            <!-- Encabezado con foto -->
                            <header class="mb-6 border-b border-gray-200 pb-4 flex items-center">
                                <!-- Campo para la foto -->
                                <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden mr-6">
                                    <!-- Reemplazar por la imagen real -->
                                    <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                        alt="Foto del usuario" class="w-full h-full object-cover">
                                </div>
                                <!-- Título del modal -->
                                <h1 class="text-3xl font-bold text-[#2A334B]">Beneficiario</h1>
                            </header>
        
                            <!-- Información del usuario en estilo de credencial -->
                            <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Beneficiario</h4> <!-- Encabezado -->
                            <section class="mb-6 grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-600 mb-1">Nombre del Adminstrador: </label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->getFullName() }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Correo Electrónico:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->email }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Dirección:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->direccion }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Teléfono:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->telefono }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Nacimiento:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->fecha_nacimiento }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">País:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->pais }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Estado:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->estado }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Municipio:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->municipio }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Código Postal (CP):</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->cp }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Dirección:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->direccion }}
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-gray-600 mb-1">Género:</label>
                                    <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                        {{ $beneficiario->user->getGenero() }}
                                    </div>
                                </div>
                            </section>
                        
                            <!-- Botón de cerrar modal alineado a la izquierda -->
                            <div class="flex justify-start mt-6">
                                <button @click="open = false" type="button"
                                    class="flex items-center space-x-2 bg-[#2A334B] text-white py-2 px-6 rounded-full hover:bg-red-600 transition duration-200">
                                    <i class='bx bx-x text-xl'></i>
                                    <span>Cerrar</span>
                                </button>
                            </div>
                        </x-modal-view-info>
                        <x-button-accept :messageAlert="'¿Estás seguro que deseas activar al beneficiario?'" :router="route('coordinador.aceptarSolicitudBeneficiario')"
                        :itemId="$beneficiario->id" :tituloModal="'Confirmar Solicitud'" title="Activar Usuario" />
                    @endif
                </div>
            </td>
        </tr>
@endforeach