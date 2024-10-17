@foreach ($datos as $usuario)
    <tr class="border-b border-gray-300">
        <td class="py-3 px-4 text-center">{{ $usuario->user->name }}</td>
        <td class="py-3 px-4 text-center">{{ $usuario->user->email }}</td>
        <td class="py-3 px-4 text-center">{{ $usuario->getTipoRolUsuario() }}</td>
        <td class="py-3 px-4 text-center">{{ $usuario->getEstadoDescripcion() }}</td>
        <td class="py-3 px-4 text-center">
            <div class="inline-flex items-center">
                <x-modal-view-info :classButton="'mr-2 text-blue-500 text-xl hover'">
                    <!-- Encabezado con foto -->
                    <header class="mb-6 border-b border-gray-200 pb-4 flex items-center">
                        <!-- Campo para la foto -->
                        <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden mr-6">
                            <!-- Reemplazar por la imagen real -->
                            <img src="https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg"
                                alt="Foto del usuario" class="w-full h-full object-cover">
                        </div>
                        <!-- Título del modal -->
                        <h1 class="text-3xl font-bold text-[#2A334B]">Administrador</h1>
                    </header>

                    <!-- Información del usuario en estilo de credencial -->
                    <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Usuario</h4> <!-- Encabezado -->
                    <section class="mb-6 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-600 mb-1">Nombre del Adminstrador: </label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->getFullName() }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Correo Electrónico:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->email }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Dirección:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->direccion }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Teléfono:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->telefono }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Fecha:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->fecha_nacimiento }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">País:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->pais }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Estado:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->estado }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Municipio:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->municipio }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Código Postal (CP):</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->cp }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Dirección:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->direccion }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Género:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->user->genero }}
                            </div>
                        </div>
                        
                        
                    </section>
                    {{-- separacion --}}
                    <hr class="my-4 border-gray-300"> <!-- Línea separadora -->
                    <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Trabajador</h4> <!-- Encabezado -->
                    {{-- separacion --}}
                    <section class="mb-6 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-600 mb-1">Estado del Trabajador:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{ $usuario->estado == 1 ? 'Activo' : 'Deshabilitado'}}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Hora de Inicio:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{$usuario->hora_inicio}}
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Hora de Fin:</label>
                            <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                {{$usuario->hora_fin}}
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

                <button class="delete-button text-red-500 text-xl">
                    <i class='bx bx-trash'></i>
                </button>
            </div>
        </td>
    </tr>
@endforeach
