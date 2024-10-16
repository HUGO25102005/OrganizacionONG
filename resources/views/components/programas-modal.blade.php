<div id="{{ $modalId }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white w-[90%] md:w-[50%] lg:w-[50%] p-6 rounded-lg shadow-lg relative h-auto md:h-[95%]">
        
        <div class="modal-content bg-white p-8 rounded-lg shadow-lg relative flex flex-col gap-8">
            <!-- Título -->
            <h2 class="text-2xl font-semibold mb-6">{{ $title }}</h2>
        
            <!-- Textarea Nombre Completo -->
            <div class="w-full">
                <label for="full_name" class="block text-lg font-semibold mb-2 text-gray-800">Descripción</label>
                <textarea id="full_name" rows="3" class="w-full p-4 bg-blue-50 h-44 rounded-md shadow-inner border-none focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none" disabled>
                    {{ $content }}
                </textarea>
            </div>

            <!-- Textarea Días Disponibles -->
            <div class="w-full">
                <label for="available_days" class="block text-lg font-semibold mb-2 text-gray-800">Objetivo</label>
                <textarea id="available_days" rows="3" class="w-full p-4 bg-blue-50 h-44 rounded-md shadow-inner border-none focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none" disabled>
                    {{ $objetive }}
                </textarea>
            </div>
                    
            <!-- Input Fecha de Inicio -->
            <div class="flex gap-8">
                <!-- Input Fecha de Inicio -->
                <div class="w-full">
                    <label for="birth_date" class="block text-lg font-semibold mb-2 text-gray-800">Fecha de inicio</label>
                    <input type="date" id="birth_date" class="w-full p-2 bg-blue-50 rounded-full shadow-inner border-none focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ $dateinit }}" disabled>
                </div>
            
                <!-- Input Fecha de Término -->
                <div class="w-full">
                    <label for="preferred_time" class="block text-lg font-semibold mb-2 text-gray-800">Fecha de término</label>
                    <input type="date" id="preferred_time" class="w-full p-2 bg-blue-50 rounded-full shadow-inner border-none focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ $dateEnd }}" disabled>
                </div>
            </div>
            

            <!-- Botón de cerrar -->
            <button id="closeModalBtn" class="absolute top-3 right-3 px-4 py-2 bg-slate-900 text-white hover:text-gray-700 rounded-full transition">
                &#x2715;
            </button>
        </div>

    </div>
</div>


<script>
    document.querySelectorAll('.openModalBtn').forEach(button => {
    button.addEventListener('click', function() {
        const modalId = this.id.replace('openModalBtn', 'modal');
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    });
});

// Cerrar el modal cuando se hace clic en el botón de cerrar
// Cerrar el modal cuando se hace clic en el botón de cerrar
document.querySelectorAll('#closeModalBtn').forEach(closeBtn => {
        closeBtn.addEventListener('click', function() {
            const modal = closeBtn.closest('.fixed');
            if (modal) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
