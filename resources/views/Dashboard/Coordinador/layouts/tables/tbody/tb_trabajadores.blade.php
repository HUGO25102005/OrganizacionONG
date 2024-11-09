@foreach ($datos as $user)
    <tr class="border-b border-gray-300">
        <td class="py-3 px-4 text-center">{{ $user->trabajador->user->name }}</td>
        <td class="py-3 px-4 text-center">{{ $user->trabajador->user->email }}</td>
        <td class="py-3 px-4 text-center">Licenciatura</td>
        <td class="py-3 px-4 text-center">{{ $user->trabajador->getEstadoDescripcion() }}</td>
        <td class="py-3 px-4 text-center">
            <div class="inline-flex items-center">
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
                    <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Usuario</h4> <!-- Encabezado -->
                    <section class="mb-6 grid grid-cols-2 gap-4 text-left">
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Nombre del Administrador:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->getFullName() }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Correo Electrónico:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->email }}
                            </div>
                        </div>
                        
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Dirección:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->direccion }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Teléfono:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->telefono }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Fecha:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->fecha_nacimiento }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">País:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->pais }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Estado:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->estado }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Municipio:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->municipio }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Código Postal (CP):</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->cp }}
                            </div>
                        </div>
                        
                        <div class="w-[250px]">
                            <label class="block text-gray-600 mb-1">Género:</label>
                            <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                                {{ $user->trabajador->user->genero }}
                            </div>
                        </div>
                        
                    </section>
                    
                    <!-- Botón de cerrar modal alineado a la izquierda -->
                    <div class="flex justify-start mt-6">
                        <button @click="open = false" type="button"
                            class="flex items-center space-x-2 bg-[#60a2ff] text-white py-2 px-6 rounded-full hover:bg-blue-800 transition duration-200">
                            <i class='bx bx-x text-xl'></i>
                            <span>Cerrar</span>
                        </button>
                    </div>
                </x-modal-view-info>
                <!-- Botón de rechazar -->
                <button class="bg-red-100 w-10 h-10 flex items-center justify-center rounded-full transition duration-300 ease-in-out hover:bg-red-300" title="Rechazar">
                    <i class='bx bx-x-circle text-2xl text-red-500'></i>
                </button>

                
                @if ($user->trabajador->estado != 2)
                    @if ($user->trabajador->id != auth()->user()->trabajador->id)
                        <x-button-trash :messageAlert="'¿Estás seguro de que deseas eliminar al usuario ' . $user->trabajador->user->name . '?'" :router="route('admin.desactivar')" :itemId="$user->trabajador->id" :tituloModal="'Confirmar Eliminación'" />
                    @endif
                @endif

                @if ($user->trabajador->estado == 2)
                    <x-button-accept :messageAlert="'¿Estás seguro que deseas ACTIVAR al usuario <b>' .
                        $user->trabajador->user->name .
                        '</b> ?'" :router="route('admin.aceptarSolicitudTrabajador')"
                        :itemId="$user->trabajador->id" :tituloModal="'Confirmar Solicitud'" title="Activar Usuario" />
                @endif

            </div>
        </td>
    </tr>
@endforeach
