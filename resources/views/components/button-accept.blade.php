    <div x-data="{ open: false }">
        <!-- Botón de eliminación que abre el modal -->
        <button @click="open = true" class="text-black text-2xl bg-green-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-green-500">
            <i class='bx bx-check-circle'></i>
        </button>   

        <!-- Modal de confirmación -->
        <div x-show="open" x-transition class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center"
            @click.away="open = false" style="display: none;">
            <div class="bg-white rounded-3xl p-8 w-[800px] max-h-[80vh] shadow-lg overflow-y-auto" @click.stop>
                <!-- Título del modal -->
                <h2 class="text-2xl font-bold mb-6 text-center text-[#2A334B]">{{ $tituloModal }}</h2>

                <!-- Formulario de confirmación de eliminación -->
                <form class="space-y-4 text-black" action="{{ $router }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- ID oculto del objeto a eliminar -->
                    <input type="hidden" name="id" value="{{ $itemId }}">

                    <!-- Mensaje de alerta -->
                    <p class="text-center text-xl"><b>{!! $messageAlert !!}</b></p>
                    <br><br>
                    <!-- Botones de acción -->
                    <div class="flex justify-end mt-6">
                        <!-- Botón para cancelar -->
                        <button @click="open = false" type="button"
                            class="bg-gray-300 py-2 px-4 rounded-full flex items-center mr-4">
                            <i class='bx bx-x text-xl'></i>
                            <span>Cancelar</span>
                        </button>
                        <!-- Botón para confirmar eliminación -->
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-full flex items-center">
                            <i class='bx bx-check-circle'></i>
                            <span>Confirmar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>