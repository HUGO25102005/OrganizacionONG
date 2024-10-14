<div>
    <div x-data="{ open: false }">
        <button @click="open = true"
            class="add-admin-button flex items-center bg-[#2A334B] text-white py-2 px-4 rounded-full shadow-md hover:bg-gray-100 transition duration-200">
            <i class='bx bx-user-plus mr-2'></i> {{ $btnTitulo }} <!-- Correcto: camelCase -->
        </button>
    
        <!-- Modal -->
        <div x-show="open" x-transition class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center"
            @click.away="open = false" style="display: none;">
            <div class="bg-white rounded-3xl p-8 w-[800px] max-h-[80vh] shadow-lg overflow-y-auto">
                <h2 class="text-2xl font-bold mb-6 text-center text-[#2A334B]">{{ $tituloModal }}</h2>
                <form class="space-y-4 text-black" action="{{ $router }}" method="POST">
                    
                    @csrf
                    
                    {{ $slot }}
    
                    <div class="flex justify-start mt-6">
                        <button @click="open = false" type="button"
                            class="bg-gray-300 py-2 px-4 rounded-full flex items-center mr-4">
                            <i class='bx bx-x text-xl'></i>
                            <span>{{ $btnDanger }}</span>
                        </button>
                        <button type="submit"
                            class="bg-green-500 text-white py-2 px-4 rounded-full flex items-center">
                            <i class='bx bx-user-plus text-xl'></i>
                            <span>{{ $btnSuccess }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
