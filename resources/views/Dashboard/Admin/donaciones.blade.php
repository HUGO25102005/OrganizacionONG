<x-app-layout>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donaciones') }}
        </h2>
    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
        <div
            class="bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] w-full max-w-[1480px] h-[300px] flex justify-center items-center rounded-[15px]">
            <!-- Contenido aquí -->

            <!-- Contenido aquí -->

            <div
                class="bg-[#F2F8FF] w-full max-w-[1360px] h-[280px] rounded-[10px] p-[20px] grid grid-cols-1 sm:grid-cols-2 gap-[40px] items-center">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start ml-4 sm:ml-[120px]">
                        <h3 class="text-[24px]">Dinero total de donaciones:</h3>
                        <p class="text-[24px] ml-[105px]">${{ $monto_total_donaciones }}</p>
                    </div>
                    <i class='bx bx-money-withdraw icono text-6xl'></i>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start ml-4 sm:ml-[175px]">
                        <h3 class="text-[24px]">Donaciones recibidas:</h3>
                        <p class="text-[24px] ml-[105px]">{{ $total_donaciones }}</p>
                    </div>
                    <i class='bx bxs-donate-heart icono text-6xl'></i>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start ml-4 sm:ml-[80px]">
                        <h3 class="text-[24px]">Dinero recaudado la última semana:</h3>
                        <p class="text-[24px] ml-[140px]">${{ 0 }}</p>
                    </div>
                    <i class='bx bxs-dollar-circle icono text-6xl'></i>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start ml-4 sm:ml-[95px]">
                        <h3 class="text-[24px]">Donaciones recibidas la última semana:</h3>
                        <p class="text-[24px] ml-[195px]">{{ $total_donaciones_semana }}</p>
                    </div>
                    <i class='bx bxs-dollar-circle icono text-6xl'></i>
                </div>
            </div>

        </div>
        <div
            class="bg-gradient-to-r from-[#2A334B] via-[#46567E] to-[#2A334B] w-full max-w-[1480px] h-[225px] mt-[20px] rounded-[15px] flex justify-center items-center">
            <div class="bg-[#F2F8FF] w-full max-w-[1360px] h-[208px] rounded-[15px]">
                <div class="flex justify-between">
                    <!-- Título "Gestionar" -->
                    <h3 class="text-[42px] mt-[70px] ml-[210px]">Gestionar</h3>
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
                    <div class="flex flex-col space-y-4 mr-[40px] mt-[20px]">
                        <!-- Primer botón -->
                        <a href="#">
                            <div
                                class="bg-[#CCE4FF] w-[600px] h-[70px] rounded-[12px] flex items-center justify-center transition-transform duration-300 hover:scale-105">
                                <p class="text-center text-[20px]">Solicitudes de donación</p>
                                <x-modal-form :btnTitulo="'Nueva Convocatoria'" :tituloModal="'Agrega Nueva Convocatoria'" :router="route('convocatoria.store')" :btnDanger="'Cancelar'"
                                    :btnSuccess="'Confirmar'">
                                    <!-- Nombre -->
                                    <x-input-form-modal :name="'nombre'" :labelText="'Nombre:'" :type="'text'"
                                        :id="'nombre'" :placeholder="'Nombre: '" :maxLength="'255'" required>
                                    </x-input-form-modal>

                                    <!-- Descripción -->
                                    <x-input-form-modal :name="'descripcion'" :labelText="'Descripción:'" :type="'text'"
                                        :id="'descripcion'" :placeholder="'Descripción: '" required>
                                    </x-input-form-modal>

                                    <!-- Fecha de Inicio -->
                                    <x-input-form-modal :name="'fecha_inicio'" :labelText="'Fecha de Inicio:'" :type="'date'"
                                        :id="'fecha_inicio'" required :value="old('fecha_inicio')"  :placeholder="'Fecha'"/>

                                    <!-- Fecha de Fin -->
                                    <x-input-form-modal :name="'fecha_fin'" :labelText="'Fecha de Fin:'" :type="'date'"
                                        :id="'fecha_fin'" required :value="old('fecha_fin')" :placeholder="'Fecha'"/>

                                    <!-- Objetivo -->
                                    <x-input-form-modal :name="'objetivo'" :labelText="'Objetivo:'" :type="'text'"
                                        :id="'objetivo'" placeholder="Objetivo: " required>
                                    </x-input-form-modal>

                                    <!-- Comentarios -->
                                    <x-input-form-modal :name="'comentarios'" :labelText="'Comentarios:'" :type="'text'"
                                        :id="'comentarios'" placeholder="Comentarios: " required>
                                    </x-input-form-modal>



                                </x-modal-form>
                            </div>
                        </a>

                        <!-- Segundo botón -->
                        <a href="#">
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
</x-app-layout>
