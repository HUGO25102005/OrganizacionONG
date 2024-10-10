<div>
    <div x-data="{ open: false }">
        <button @click="open = true"
            class="add-admin-button flex items-center bg-[#2A334B] text-white py-2 px-4 rounded-full shadow-md hover:bg-gray-100 transition duration-200">
            <i class='bx bx-user-plus mr-2'></i> {{ $btnTitulo }} <!-- Correcto: camelCase -->
        </button>
    
        <!-- Modal -->
        <div x-show="open" x-transition class="fixed inset-0 bg-gray-800 bg-opacity-30 flex justify-center items-center"
            @click.away="open = false" style="display: none;">
            <div class="bg-white rounded-3xl p-8 w-[800px] max-h-[80vh] shadow-lg overflow-y-auto">
                <h2 class="text-2xl font-bold mb-6 text-center text-[#2A334B]">{{ $tituloModal }}</h2>
                <form class="space-y-4" action="{{ $router }}" method="POST">
                    @csrf
                    
                    {{ $slot }}
    
                    <div class="flex justify-between mt-6">
                        <button @click="open = false" type="button"
                            class="flex items-center space-x-2 bg-gray-500 text-white py-2 px-6 rounded-full hover:bg-red-600 transition duration-200">
                            <i class='bx bx-x text-xl'></i>
                            <span>{{ $btnDanger }}</span>
                        </button>
                        <button type="submit"
                            class="flex items-center space-x-2 bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700 transition duration-200">
                            <i class='bx bx-user-plus text-xl'></i>
                            <span>{{ $btnSuccess }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
