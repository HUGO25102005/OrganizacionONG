@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/donar.css', 'resources/js/terminosCondiciones.js'])
@endsection
@section('content')
    <section id="home" class="relative w-full h-screen flex flex-col justify-center items-center overflow-hidden">
        <h1 class="text-4xl sm:text-6xl md:text-7xl leading-tight text-white uppercase mb-6 z-10 animate-colorChange">
            InspireUp
        </h1>
        <video autoplay loop muted plays-inline class="absolute top-0 left-0 w-full h-full object-cover">
            <source src="{{ asset('images/donar.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    </section>

    <style>
        @keyframes colorChange {
            0% {
                color: #c4e0ff;
            }

            50% {
                color: #022794;
            }

            100% {
                color: #cbdafa;
            }
        }

        .animate-colorChange {
            animation: colorChange 5s infinite alternate;
        }
    </style>


    <!-- Imágenes interactivas -->
    <section class="w-full h-auto bg-cover bg-center flex overflow-hidden flex-col items-center justify-center mt-20">
        <h1 class="text-gray-800 text-3xl md:text-4xl lg:text-5xl font-bold text-center">
            Programas en curso
          </h1>
        <div id="slider" class="flex mt-6 mb-20 flex-nowrap overflow-x-auto snap-x snap-mandatory gap-4 ml-8 mr-8 py-4">
            <!-- Imagen 1 -->
            @foreach ($programas as $programa)
                <div
                    class="slider-item snap-center flex-shrink-0 w-[300px] md:w-[400px]] lg:w-[20%] rounded-md bg-gray-100 shadow-lg">
                    <img class="w-full h-[50%] object-cover rounded-t-md" src="{{ asset('images/centro1.jpg') }}">
                    <div class="p-4 h[50%]">
                        <h2 class="font-bold text-lg text-gray-800 text-center"> {{ $programa->nombre_programa }} </h2>
                        <br>
                        <p class="text-gray-500 mb-2">Encargado: <span
                                class="font-semibold">{{ $programa->voluntario->trabajador->user->name . ' ' . $programa->voluntario->trabajador->user->apellido_paterno }}</span>
                        </p>
                        <p class="text-gray-500 mb-2">Estudiantes: <span
                                class="font-semibold">{{ $programa->getTotalBeneficiarios() }}</span></p>
                        <p class="text-gray-500 mb-2">Objetivo: <span
                                class="font-semibold">{{ $programa->objetivos }}</span></p>
                        {{-- <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn1">
                          Ver más
                      </button> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <style>
        #slider {
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }

        .slider-item {
            flex: 0 0 auto;
        }

        .openModalBtn {
            transition: background-color 0.3s ease;
        }

        .openModalBtn:hover {
            background-color: #405584;
        }
    </style>


    <section
        class="flex flex-col-reverse mb-20 lg:flex-row-reverse items-center justify-between bg-[#f7f9fc] h-auto px-6 lg:px-[10%] py-8 relative">
        <!-- Imagen -->
        <div class="relative max-w-full lg:max-w-[40%] lg:absolute lg:bottom-0 lg:left-0">
            <img src="{{ asset('images/estudiante.png') }}" alt="Persona con laptop"
                class="w-full h-auto mt-20 rounded-lg lg:pl-[120px] mb-6 lg:mb-0">
        </div>
        <!-- Contenido -->
        <div class="w-full lg:w-[50%] flex flex-col justify-center text-left">
            <!-- Encabezado principal -->
            <h1 class="text-3xl lg:text-4xl font-bold text-slate-700 mb-4">
                Ayuda a promover la educación y la superación.
            </h1>
            <p class="text-base lg:text-lg text-slate-700 text-justify leading-relaxed mb-6">
                Las donaciones permitirían asegurar el suministro de materiales esenciales y facilitar la implementación de
                talleres y capacitaciones educativas.
            </p>

            <!-- Contenedor del formulario -->
            <div class="flex flex-col items-center lg:items-start p-6 bg-white rounded-lg shadow-lg w-full lg">
                <!-- Título del formulario -->
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center lg:text-left">Elige cómo deseas hacer tu
                    donación</h2>

                <!-- Selección de tipo de donación -->
                <div id="donation-type" class="mb-6 w-full">
                    <p class="text-lg font-medium text-gray-700 mb-4">Selecciona una opción para continuar:</p>
                    <div class="flex flex-col space-y-3">
                        <!-- Donación anónima -->
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="donation_type" value="anonymous" class="mr-3 accent-blue-500">
                            <span class="text-gray-700">
                                <strong>Donar de forma anónima:</strong> Tu nombre y correo no serán registrados, y tu
                                donación será completamente anónima.
                            </span>

                        </label>

                        <!-- Donación con registro -->
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="donation_type" value="with_email" class="mr-3 accent-blue-500">
                            <span class="text-gray-700">
                                <strong>Donar con registro:</strong> Ingresa tu correo para recibir un recibo y
                                actualizaciones sobre tu contribución.
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Contenedor dinámico -->
                <div id="dynamic-content" class="w-full transition-all duration-500 ease-in-out">
                    <!-- Contenido para donación anónima -->
                    <div id="anonymous-info"
                        class="hidden opacity-0 transform translate-y-4 scale-95 transition-all duration-500 ease-out">
                        <p class="text-sm text-gray-600 mb-4">
                            Has elegido donar de forma <strong>anónima</strong>. Tu contribución será completamente privada
                            y no recibirás un recibo.
                        </p>
                        <div class="relative w-full mb-5 flex items-center gap-4">
                            <!-- Checkbox con estilo neumorphism -->
                            <label class="relative flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden accept-terms">
                                <div class="w-6 h-6 bg-gray-100 rounded-lg shadow-md flex items-center justify-center transition-all duration-300 transform hover:scale-110 checkbox-container"
                                     style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff; border: 2px solid #dbe8fc;">
                                    <!-- Icono de palomita -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white opacity-0 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </label>
                            <a href="#" class="link-terminos">Acepto los <strong>Términos y Condiciones</strong></a>
                        </div>    
                        <button onclick="comprobarCorreoDonante('anonimo')"
                            class="submit-button w-full bg-blue-500 text-white font-bold py-4 rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out text-lg disabled:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-500" disabled>
                            Donar
                        </button>
                        <div class="hidden">
                            <div id="donate-button-container" class="w-full flex justify-center mt-6">
                                <div id="donate-button-anonimo" class="opacity-50 pointer-events-none">
                                    <!-- Aquí se renderizará el botón de PayPal -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input para correo -->
                    <div id="donor-email-container"
                        class="hidden opacity-0 transform translate-y-4 scale-95 transition-all duration-500 ease-out">
                        <p class="text-sm text-gray-600 mb-2">
                            Ingresa tu correo para recibir un recibo de tu donación y actualizaciones sobre cómo estamos
                            utilizando tu apoyo.
                        </p>
                        <form action="{{ route('donante.comprobarCorreo') }}" method="" class="space-y-4"
                            id="formCorreoDonante">
                            @csrf
                            <!-- Campo Correo Electrónico -->
                            <div>
                                <label for="donor-email" class="block text-sm font-medium text-gray-700 mb-1">Correo
                                    Electrónico</label>
                                <input type="email" id="donor-email" name="donor-email"
                                    onfocus="resetInput('donor-email')"
                                    class="block w-full p-4 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring focus:ring-blue-300 focus:border-blue-500"
                                    placeholder="Ingresa tu correo" required />
                            </div>

                            <!-- Campo Nombre -->
                            <div>
                                <label for="first_name"
                                    class="block text-sm font-medium text-gray-700 mb-1">Nombre(s)</label>
                                <input type="text" id="first_name" name="first_name" onfocus="resetInput('first_name')"
                                    class="block w-full p-4 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring focus:ring-blue-300 focus:border-blue-500"
                                    placeholder="Ingresa tu nombre" required />
                            </div>

                            <!-- Campo Apellido -->
                            <div>
                                <label for="last_name"
                                    class="block text-sm font-medium text-gray-700 mb-1">Apellido(s)</label>
                                <input type="text" id="last_name" name="last_name" onfocus="resetInput('last_name')"
                                    class="block w-full p-4 border border-gray-300 rounded-lg placeholder-gray-400 focus:ring focus:ring-blue-300 focus:border-blue-500"
                                    placeholder="Ingresa tu apellido" required />
                            </div>

                            <!-- Campo Código del País -->
                            <label for="country_code" class="block text-sm font-medium text-gray-700 mb-1">País de
                                procedencia</label>
                            <select id="country_code" name="country_code" onfocus="resetInput('country_code')"
                                class="block w-full p-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500"
                                required>
                                <!-- Opciones generadas dinámicamente -->
                                <option value="" disabled selected>Selecciona una opcion</option>
                            </select>
                        </form>
                        <div class="relative w-full mb-2 flex items-center gap-4 mt-6">
                            <!-- Checkbox con estilo neumorphism -->
                            <label class="relative flex items-center cursor-pointer">
                                <input type="checkbox" class="hidden accept-terms">
                                <div class="w-6 h-6 bg-gray-100 rounded-lg shadow-md flex items-center justify-center transition-all duration-300 transform hover:scale-110 checkbox-container"
                                     style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff; border: 2px solid #dbe8fc;">
                                    <!-- Icono de palomita -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white opacity-0 check-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </label>
                            <a href="#" class="link-terminos">Acepto los <strong>Términos y Condiciones</strong></a>
                        </div>
                        <br>
                    </div>
                </div>

                <!-- Botón Continuar -->
                <button id="continue-button" onclick="comprobarCorreoDonante()"
                    class="submit-button w-full bg-blue-500 text-white font-bold py-4 rounded-lg shadow-md hover:bg-blue-600 focus:ring focus:ring-blue-300 focus:outline-none transition duration-300 ease-in-out text-lg disabled:bg-gray-300 disabled:cursor-not-allowed disabled:text-gray-500" disabled>
                    Continuar
                </button>
            </div>
        </div>

        <div id="routerProcesarDonacion" class="hidden" data-url="{{ route('paypal.procesarDonacion') }}"></div>
        <div id="enviarCorreoDonante" class="hidden" data-url="{{ route('donante.enviarCorreo') }}"></div>
    </section>

    @include('Page.layouts.modals.modal_nuevo_donante')
    <!-- Botón de PayPal -->
    {{-- --}}

    <!-- Botón de donar con sandbox -->

    <button id="scrollButton"
        class="fixed bottom-4 right-4 z-10 bg-white text-black rounded-full items-center justify-center text-lg font-semibold w-14 h-14 cursor-pointer transition-all duration-300 ease-in-out border border-black shadow-none hover:-translate-y-1 hover:-translate-x-0.5 hover:shadow-[2px_5px_0_0_black] active:translate-y-0.5 active:translate-x-0.25 active:shadow-none">
        <i id="scrollIcon" class='bx bxs-chevron-down'></i>
    </button>

    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        const imageUrl = "{{ asset('images/donar.png') }}";
    </script>
    <style>
        #modal-crear-donante {
            opacity: 0;
            pointer-events: none;
        }

        #modal-crear-donante.opacity-100 {
            opacity: 1;
            pointer-events: auto;
        }

        .donate-img {
            width: 150px;
            height: auto;
            border-radius: 50%;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .donate-img:hover {
            transform: scale(1.1);
        }

        /* Botón donación */

        #donate-button {
            position: absolute;
            height: 65px;
            width: 160px;
            transition: transform 0.2s ease-in-out;
            /* Efecto de zoom al pasar el mouse */
        }

        #donate-button:hover {
            transform: scale(1.03);
            /* Aumenta el tamaño al pasar el mouse */
        }

        .hidden {
            opacity: 0;
            transform: translateY(-20px);
            display: none;
        }

        .hidden.show {
            opacity: 1;
            transform: translateY(0);
            display: block;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
    // Seleccionar todos los checkboxes con clase "accept-terms"
            document.querySelectorAll('.accept-terms').forEach((checkbox, index) => {
                const submitButton = document.querySelectorAll('.submit-button')[index];
                const checkboxContainer = document.querySelectorAll('.checkbox-container')[index];
                const checkIcon = document.querySelectorAll('.check-icon')[index];

                // Inicializa el estado del botón al cargar la página
                if (!checkbox.checked) {
                    submitButton.disabled = true; // Asegúrate de que el botón esté deshabilitado
                    submitButton.classList.add('disabled:bg-gray-300', 'disabled:text-gray-500');
                    submitButton.classList.remove('bg-blue-600', 'text-white');
                }

                // Evento para habilitar/deshabilitar el botón al cambiar el estado del checkbox
                checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                        submitButton.disabled = false; // Habilita el botón
                        submitButton.classList.remove('disabled:bg-gray-300', 'disabled:text-gray-500');
                        submitButton.classList.add('bg-blue-600', 'text-white');

                        // Cambia el estilo del checkbox
                        checkboxContainer.style.backgroundColor = '#22c55e'; // Verde
                        checkboxContainer.style.border = '2px solid #16a34a'; // Verde oscuro
                        checkIcon.classList.remove('opacity-0'); // Muestra la palomita
                    } else {
                        submitButton.disabled = true; // Deshabilita el botón
                        submitButton.classList.remove('bg-blue-600', 'text-white');
                        submitButton.classList.add('disabled:bg-gray-300', 'disabled:text-gray-500');

                        // Restaura el estilo del checkbox
                        checkboxContainer.style.backgroundColor = '#f3f4f6'; // Gris
                        checkboxContainer.style.border = '2px solid #dbe8fc'; // Azul claro
                        checkIcon.classList.add('opacity-0'); // Oculta la palomita
                    }
                });
            });
        });


    </script>
@endsection

@vite(['resources/js/page/colabora.js'])
