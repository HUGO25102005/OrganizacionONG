<div>
    <div x-data="{ open: false }">
        <!-- Botón para abrir el modal -->
        <button @click="open = true" class="{{ $classButton }}">
<<<<<<< HEAD
            <i class='bx bx-show'></i>
=======
            <i class='bx bx-show text-black text-2xl bg-blue-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-500'></i>
>>>>>>> 08762f89dda1e4f821e89fd993db7e4fea1d9b4f
        </button>

        <!-- Modal -->
        <div x-show="open" x-transition class="fixed inset-0 bg-gray-800 bg-opacity-30 flex justify-center items-center"
            @click.away="open = false" style="display: none;">
            <!-- Contenedor de la carta con scroll en Y -->
            <div class="max-w-5xl mx-auto mt-10 bg-white shadow-md rounded-lg overflow-y-auto max-h-screen p-8">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
