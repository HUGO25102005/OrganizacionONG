<!-- Contenedor principal de Clases disponibles -->
<div id="clasesContainer"
    class="bg-[#f6f8ff] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px] transition-all duration-500 ease-in-out">
    <h2 class="text-3xl font-semibold mb-6 text-[#1E3A5F]">Clases inscritas</h2>

    <!-- Contenedor del botón desplegable y los cuadros -->
    <div class="flex flex-col md:flex-row items-start space-y-2 md:space-y-0 md:space-x-6">

        <div id="detallesClase" data-url="{{ route('ben.detallesClase') }}"></div>
        <!-- Cuadros de información de clases -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 w-full">
            <!-- Cuadro de información 1 -->
            @php
                $coloresKeys = array_keys($colores); // Obtiene las claves de los colores
            @endphp

            @foreach ($ofertaClases as $c)
                @php
                    $color = $colores[$coloresKeys[array_rand($coloresKeys)]]; // Selecciona un color aleatorio
                @endphp

                <div
                    class="bg-white p-6 rounded-lg shadow-md border-t-4 {{ $color['border'] }} hover:shadow-lg hover:scale-105 transition-transform duration-300">
                    <img src="ruta_de_la_imagen_1.jpg" alt="Imagen 1" class="w-full h-32 object-cover rounded-md mb-4">
                    <h3 class="text-lg font-semibold {{ $color['bg'] }} p-2 rounded-md {{ $color['text'] }}">
                        {{ $c->nombre_programa }}
                    </h3>
                    <p class="text-gray-700 mt-2 break-words">
                        @if (strlen($c->descripcion) > 60)
                            {{ \Illuminate\Support\Str::limit($c->descripcion, 60) }}
                        @else
                            {{ $c->descripcion }}
                        @endif
                    </p>
                    <button onclick="mostrarSoloDetalles({{ $c->id }})"
                        class="mt-6 px-4 py-2 {{ $color['bg'] }} text-white font-semibold rounded-full text-sm {{ $color['hover'] }} hover:scale-105 transition duration-200">
                        Ver más
                    </button>
                </div>
            @endforeach



        </div>
    </div>
</div>

@vite(['resources/js/ofertas_beneficiario.js'])
