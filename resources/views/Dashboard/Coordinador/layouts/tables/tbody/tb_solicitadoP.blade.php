@foreach ($datos as $programa)
    <tr class="border-b border-gray-300">
        <td class="py-3 px-4 text-center">{{ $loop->iteration }}</td>
        <td class="py-3 px-4 text-center">{{ $programa->nombre_programa }}</td>
        <td class="py-3 px-4 text-center">{{ $programa->voluntario->trabajador->user->getFullName() }}</td>
        <td class="py-3 px-4 text-center">{{ \Carbon\Carbon::parse($programa->fecha_inicio)->format('d-m-Y') }}</td>
        <td class="py-3 px-4 text-center">{{ \Carbon\Carbon::parse($programa->fecha_termino)->format('d-m-Y') }}</td>
        <td class="py-3 px-4 text-center">{{ $programa->getEstado() }}</td>
        <td class="py-3 px-4 text-center">
            <div class="inline-flex items-center">
                @if ($programa->estado == 1)
                    <x-modal-view-info :classButton="'mr-2 text-blue-500 text-xl'">
                        <h4 class="text-2xl font-semibold text-[#2A334B] mb-4">Datos del Programa</h4> <!-- Encabezado -->
                        <section class="mb-6 grid grid-cols-2 gap-4">
                            <!-- Primeros dos datos -->
                            <div>
                                <label class="block text-gray-600 mb-1">Encargado del Programa: </label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->voluntario->trabajador->user->getFullName() }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-600 mb-1">Nombre del programa:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->nombre_programa }}
                                </div>
                            </div>
            
                            <!-- Tercer dato (centrado) -->
                            <div class="col-span-2 text-center">
                                <label class="block text-gray-600 mb-1">Descripción:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->descripcion }}
                                </div>
                            </div>
            
                            <!-- Cuarto dato (centrado) -->
                            <div class="col-span-2 text-center">
                                <label class="block text-gray-600 mb-1">Objetivo(s):</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->objetivos }}
                                </div>
                            </div>
            
                            <!-- Datos 5 al 8 (uno al lado del otro) -->
                            <div>
                                <label class="block text-gray-600 mb-1">Dirigido a:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->publico_objetivo }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-600 mb-1">Duración estimada:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->duracion }} días
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-600 mb-1">Fecha estimada de inicio:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ \Carbon\Carbon::parse($programa->fecha_inicio)->format('d-m-Y') }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-600 mb-1">Fecha estimada de finalización:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ \Carbon\Carbon::parse($programa->fecha_termino)->format('d-m-Y') }}
                                </div>
                            </div>
            
                            <!-- Últimos 3 datos (centrados y solos) -->
                            <div class="col-span-2 text-center">
                                <label class="block text-gray-600 mb-1">Beneficiarios estimados:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->beneficiarios_estimados }}
                                </div>
                            </div>
                            <div class="col-span-2 text-center">
                                <label class="block text-gray-600 mb-1">Resultados esperados:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->resultados_esperados }}
                                </div>
                            </div>
                            <div class="col-span-2 text-center">
                                <label class="block text-gray-600 mb-1">Comentarios adicionales:</label>
                                <div class="border border-gray-300 rounded-md py-2 px-3 bg-gray-100 text-[#2A334B]">
                                    {{ $programa->comentarios_adicionales }}
                                </div>
                            </div>
                        </section>
                    
                        <!-- Botón de cerrar modal alineado a la izquierda -->
                        <div class="flex justify-end mt-6">
                            <button @click="open = false" type="button"
                                class="flex items-center space-x-2 bg-[#2A334B] text-white py-2 px-6 rounded-full hover:bg-red-600 transition duration-200">
                                <i class='bx bx-x text-xl'></i>
                                <span>Cerrar</span>
                            </button>
                        </div>
                    </x-modal-view-info>
                    <x-button-accept :messageAlert="'¿Estás seguro que deseas aceptar la solicitud?'" :router="route('coordinador.aceptarPrograma')"
                        :itemId="$programa->id" :tituloModal="'Confirmar Solicitud'"/>
                    <x-button-cancel :messageAlert="'¿Estás seguro de que deseas declinar la solicitud?'" :router="route('coordinador.cancelarPrograma')" :itemId="$programa->id" :tituloModal="'Confirmar Eliminación'" /> 
                @endif
            </div>     
        </td>
    </tr>
@endforeach