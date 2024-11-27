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
                $fondosSvg = [
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <rect width="100%" height="100%" fill="#f8b400"/>
                        <circle cx="50" cy="50" r="40" fill="#ff5722"/>
                    </svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <rect width="100%" height="100%" fill="#8e44ad"/>
                        <polygon points="50,0 100,100 0,100" fill="#3498db"/>
                    </svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <rect width="100%" height="100%" fill="#2ecc71"/>
                        <line x1="0" y1="0" x2="100" y2="100" stroke="#27ae60" stroke-width="5"/>
                    </svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <rect width="100%" height="100%" fill="#e74c3c"/>
                        <ellipse cx="50" cy="50" rx="40" ry="20" fill="#c0392b"/>
                    </svg>',
                ];
            @endphp

            @foreach ($ofertaClases as $c)
                @php
                    $color = $colores[$coloresKeys[array_rand($coloresKeys)]]; // Selecciona un color aleatorio
                    $fondoSvg = $fondosSvg[array_rand($fondosSvg)];
                @endphp

                <div
                    class="bg-white p-6 rounded-lg shadow-md border-t-4 {{ $color['border'] }} hover:shadow-lg hover:scale-105 transition-transform duration-300">
                    <div class="relative w-full h-32 rounded-md overflow-hidden mb-4">
                        {!! $fondoSvg !!}
                    </div>
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
