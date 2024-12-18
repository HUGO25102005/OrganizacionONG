<div class="relative bg-[#F6F8FF] max-w-[1450px] w-full h-auto my-5 p-5 shadow-lg rounded-2xl mx-auto">
    <div class="flex flex-wrap justify-between items-center mb-5">
        <h2 class="text-2xl font-semibold">Donaciones</h2>
        {{-- <button class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600">
            Crear Nueva Campaña
        </button> --}}
    </div>

    <!-- Contenedor Grid para organizar los rectángulos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
        
        <!-- Rectángulo 1 -->
        <div class="bg-white h-auto rounded-lg shadow-md p-4">
            <div class="h-full flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Total disponible:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $monto_disponible }}</p>
                    <p>Monto total: ${{ $monto_total_donaciones }}</p>
                </div>
                <div>
                    <i class='bx bx-wallet text-4xl text-[#4CAF50]'></i>
                </div>
            </div>
        </div>

        <!-- Rectángulo 2 -->
        <div class="bg-white h-auto rounded-lg shadow-md p-4">
            <div class="h-full flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Dinero usado:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $monto_usado }}</p>
                </div>
                <div>
                    <i class='bx bxs-wallet-alt text-4xl text-[#FF9800]'></i>
                </div>
            </div>
        </div>

        <!-- Cuadrado grande -->
        <div class="bg-white h-auto rounded-lg shadow-md row-span-2 p-4 lg:col-span-1 lg:row-span-2">
            <div class="h-full p-4">
                <h3 class="text-gray-700 text-xl font-semibold text-center mb-4">Top Donadores <i class='bx bxs-crown text-[#FFC107]'></i></h3>
                <div class="flex justify-between font-semibold mb-2 text-black">
                    <span>Nombre</span>
                    <span>Monto</span>
                </div>
                <ul class="space-y-2">
                    @foreach ($topDonadantes as $donacion)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-800">{{ $donacion->donante->getFullName() }}</span>
                            <span class="text-gray-600 font-bold">${{ $donacion->total_donado }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Rectángulo 3 -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="h-full flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Dinero recaudado la última semana:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $total_donaciones_semana }}</p>
                </div>
                <div>
                    <i class='bx bx-credit-card text-4xl text-[#FFC107]'></i>
                </div>
            </div>
        </div>

        <!-- Rectángulo 4 -->
        <div class="bg-white h-auto rounded-lg shadow-md p-4">
            <div class="h-full flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Dinero recaudado el último mes:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $total_donaciones_mes }}</p>
                </div>
                <div>
                    <i class='bx bxs-bank text-4xl text-[#2196F3]'></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla Últimas Donaciones -->
    <div class="bg-white w-full lg:w-[1380px] mx-auto h-auto rounded-lg mt-6 shadow-md overflow-x-auto p-4">
        <div class="bg-[#BBDEFB] text-center text-lg rounded-lg text-black w-full h-10 flex items-center justify-center mb-4">
            <p>Últimas donaciones</p>
        </div>

        <table class="w-full text-center">
            <thead class="bg-[#BBDEFB] rounded-lg text-black">
                <tr>
                    <th class="py-2 px-4">Nombre</th>
                    <th class="py-2 px-4">Correo Electrónico</th>
                    <th class="py-2 px-4">País</th>
                    <th class="py-2 px-4">Fecha Registro</th>
                    <th class="py-2 px-4">Monto</th>
                </tr>
            </thead>
            <tbody class="text-black">
                @foreach ($total_donaciones as $donacion)
                    <tr class="border-b border-gray-300">
                        <td class="py-2 px-4">{{ $donacion->donante->getFullName() }}</td>
                        <td class="py-2 px-4">{{ $donacion->donante->email }}</td>
                        <td class="py-2 px-4">{{ $donacion->donante->country_code }}</td>
                        <td class="py-2 px-4">{{ \Carbon\Carbon::parse($donacion->created_at)->format('d-m-Y') }}</td>
                        <td class="py-2 px-4">${{ $donacion->monto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $total_donaciones->links() }}

    <div class="fixed bottom-5 right-5 z-100">
        <a href="{{ route('admin.chat') }}">
            <button
                class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                <i class='bx bx-message-square-dots text-2xl'></i>
            </button>
        </a>
    </div>
</div>

    <!--
        <div
            class="bg-gradient-to-r from-[#2A334B] via-[#46567E] to-[#2A334B] w-full max-w-[1480px] h-[225px] mt-[20px] rounded-[15px] flex justify-center items-center">
            <div class="bg-[#F2F8FF] w-full max-w-[1360px] h-[208px] rounded-[15px]">
                <div class="flex justify-between">
                    <!-- Título "Gestionar" -->
    <!--                   <h3 class="text-[42px] mt-[70px] ml-[210px]">Gestionar</h3>
                    @if ($errors->any())
<div class="bg-red-500 text-white p-4 mb-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
                            </ul>
                        </div>
@endif

                    <!-- Contenedor de botones -->
    <!--                      <div class="flex flex-col space-y-4 mr-[40px] mt-[20px]">
                        <!-- Primer botón -->
    <!--                          <a href="#">
                            <div
                                class="bg-[#CCE4FF] w-[600px] h-[70px] rounded-[12px] flex items-center justify-center transition-transform duration-300 hover:scale-105">
                                <p class="text-center text-[20px]">Solicitudes de donación</p>
                                <x-modal-form :btnTitulo="'Nueva Convocatoria'" :tituloModal="'Agrega Nueva Convocatoria'" :router="route('convocatoria.store')" :btnDanger="'Cancelar'"
                                    :btnSuccess="'Confirmar'">
                                    <!-- Nombre -->
    <!--                                    <x-input-form-modal :name="'nombre'" :labelText="'Nombre:'" :type="'text'"
                                        :id="'nombre'" :placeholder="'Nombre: '" :maxLength="'255'" required>
                                    </x-input-form-modal>

                                    <!-- Descripción -->
    <!--                                    <x-input-form-modal :name="'descripcion'" :labelText="'Descripción:'" :type="'text'"
                                        :id="'descripcion'" :placeholder="'Descripción: '" required>
                                    </x-input-form-modal>

                                    <!-- Fecha de Inicio -->
    <!--                                    <x-input-form-modal :name="'fecha_inicio'" :labelText="'Fecha de Inicio:'" :type="'date'"
                                        :id="'fecha_inicio'" required :value="old('fecha_inicio')"  :placeholder="'Fecha'"/>

                                    <!-- Fecha de Fin -->
    <!--                                    <x-input-form-modal :name="'fecha_fin'" :labelText="'Fecha de Fin:'" :type="'date'"
                                        :id="'fecha_fin'" required :value="old('fecha_fin')" :placeholder="'Fecha'"/>

                                    <!-- Objetivo -->
    <!--                                    <x-input-form-modal :name="'objetivo'" :labelText="'Objetivo:'" :type="'text'"
                                        :id="'objetivo'" placeholder="Objetivo: " required>
                                    </x-input-form-modal>

                                    <!-- Comentarios -->
    <!--                                    <x-input-form-modal :name="'comentarios'" :labelText="'Comentarios:'" :type="'text'"
                                        :id="'comentarios'" placeholder="Comentarios: " required>
                                    </x-input-form-modal>



                                </x-modal-form>
                            </div>
                        </a>

                        <!-- Segundo botón -->
    <!--                    <a href="#">
                            <div
                                class="bg-[#CCE4FF] w-[600px] h-[70px] rounded-[12px] flex items-center justify-center transition-transform duration-300 hover:scale-105">
                                <p class="text-center text-[20px]">Gestionar no sé</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>
-->
<<<<<<< HEAD
=======

>>>>>>> feature-manuel
