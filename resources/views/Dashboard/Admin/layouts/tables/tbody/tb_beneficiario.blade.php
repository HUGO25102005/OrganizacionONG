@foreach ($datos as $beneficiario)
    <tr class="border-b border-gray-300">
        <td class="py-3 px-4 text-center">{{ $beneficiario->id }}</td>
        <td class="py-3 px-4 text-center">{{ $beneficiario->user->name }}</td>
        <td class="py-3 px-4 text-center">{{ $beneficiario->user->email }}</td>
        <td class="py-3 px-4 text-center">
            @switch($beneficiario->estado)
                @case(1)
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Activo</span>
                @break

                @case(2)
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Desactivado</span>
                @break

                @case(3)
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Solicitado</span>
                @break

                @case(4)
                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Suspendido</span>
                @break
            @endswitch

        </td>
        <td class="py-3 px-4 text-center">
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
                    <h1 class="text-3xl font-bold text-[#2A334B]">Administrador</h1>
                </header>

                <!-- Información del usuario en estilo de credencial -->
                <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Usuario</h4> <!-- Encabezado -->
                <section class="mb-6 grid grid-cols-2 gap-4 text-left">
                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Nombre del Administrador:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->getFullName() }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Correo Electrónico:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->email }}
                        </div>
                    </div>


                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Dirección:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->direccion }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Teléfono:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->telefono }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Fecha:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->fecha_nacimiento }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">País:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->pais }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Estado:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->estado }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Municipio:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->municipio }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Código Postal (CP):</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->cp }}
                        </div>
                    </div>

                    <div class="w-[250px]">
                        <label class="block text-gray-600 mb-1">Género:</label>
                        <div class="border border-gray-400 rounded-lg py-2 px-3 bg-blue-50 text-black truncate">
                            {{ $beneficiario->user->genero }}
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
        </td>
    </tr>
@endforeach
