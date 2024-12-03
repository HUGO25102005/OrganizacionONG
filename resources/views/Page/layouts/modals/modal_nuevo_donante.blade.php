<!-- Modal con Grid Layout -->
<div id="modal-crear-donante"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden transition-opacity duration-300 ease-in-out">
    <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-3xl">
        <!-- Encabezado del Modal -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 text-center">Agregar Nuevo Donante</h2>
            <p class="text-sm text-gray-500 text-center">Por favor, completa la información requerida para continuar.</p>
        </div>

        <!-- Formulario -->
        <form id="formCrearDonante" action="/crear-donante" method="POST" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Campo Email -->
            <div>
                <input type="email" id="email" name="email"
                    class="block w-full p-4 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring focus:ring-blue-300 focus:border-blue-500"
                    placeholder="Correo Electrónico" required>
            </div>


           
            <!-- Botones de Acción -->
            <div class="col-span-1 sm:col-span-2 flex justify-end">
                <button type="button" onclick="cerrarModal()"
                    class="mr-4 bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300">
                    Cancelar
                </button>
                <div id="donate-button-container" class="w-full flex justify-center mt-6">
                    <div id="donate-button-perfil" class="opacity-50 pointer-events-none">
                        <!-- Aquí se renderizará el botón de PayPal -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function cerrarModal() {
        const modal = document.getElementById('modal-crear-donante');
        modal.classList.add('hidden');
        modal.classList.remove('opacity-100');
    }
</script>
