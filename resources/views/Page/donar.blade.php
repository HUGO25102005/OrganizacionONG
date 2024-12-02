@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/donar.css'])
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
    <section class="w-full h-auto bg-cover bg-center flex overflow-hidden flex-col items-center justify-center">
        <div id="slider" class="flex mt-20 mb-20 flex-nowrap overflow-x-auto snap-x snap-mandatory gap-4 ml-8 mr-8 py-4">
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
                        <p class="text-gray-500 mb-2">Inscritos: <span
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
        class="flex flex-col-reverse mb-20 lg:flex-row-reverse items-center justify-between bg-[#f7f9fc] h-auto lg:h-[65vh] px-6 lg:px-[10%] py-8 relative">
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
            <div class="flex flex-col items-center lg:items-start p-6 bg-white rounded-lg shadow-lg w-full lg:w-4/5">
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
                        <div id="donate-button-container" class="w-full flex justify-center mt-6">
                            <div id="donate-button-anonimo" class="opacity-50 pointer-events-none">
                                <!-- Aquí se renderizará el botón de PayPal -->
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
                        <form action="{{ route('donante.comprobarCorreo') }}" method="" class="mb-4"
                            id="formCorreoDonante">
                            @csrf
                            <label for="donor-email" class="block text-sm font-medium text-gray-700 mb-2">Correo
                                electrónico:</label>
                            <input type="email" id="donor-email"
                                class="block w-full p-3 border border-gray-300 rounded focus:ring focus:ring-blue-300"
                                placeholder="Ingresa tu correo">
                        </form>
                    </div>
                </div>

                <!-- Botón Continuar -->
                <button id="continue-button" onclick="comprobarCorreoDonante()"
                    class="hidden w-full mt-6 p-3 bg-blue-500 text-white font-bold rounded-lg shadow-lg disabled:opacity-50 disabled:pointer-events-none transition-opacity duration-300 ease-in-out"
                    disabled>
                    Continuar
                </button>
            </div>
        </div>

        <div id="routerProcesarDonacion" class="hidden" data-url="{{ route('paypal.procesarDonacion') }}"></div>
    </section>

    @include('Page.layouts.modals.modal_nuevo_donante')
    <!-- Botón de PayPal -->
    {{-- --}}

    <!-- Botón de donar con sandbox -->
    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let dynamicUserId = null; // Variable para almacenar el ID del usuario con correo

            // Elementos comunes
            const donationTypeInputs = document.querySelectorAll('input[name="donation_type"]');
            const anonymousInfo = document.getElementById("anonymous-info");
            const emailContainer = document.getElementById("donor-email-container");
            const continueButton = document.getElementById("continue-button");

            // Función para manejar animaciones de visibilidad
            const toggleElement = (element, show) => {
                if (!element) return;
                element.classList.toggle("hidden", !show);
                element.classList.toggle("opacity-0", !show);
                element.classList.toggle("translate-y-4", !show);
                element.classList.toggle("scale-95", !show);
                element.classList.toggle("opacity-100", show);
                element.classList.toggle("translate-y-0", show);
                element.classList.toggle("scale-100", show);
            };

            // Configuración del botón PayPal
            const renderPayPalButton = (containerSelector) => {
                const container = document.querySelector(containerSelector);
                if (!container) {
                    console.error(`Contenedor no encontrado: ${containerSelector}`);
                    return;
                }

                container.innerHTML = ''; // Limpia contenedor
                container.classList.remove("pointer-events-none");
                container.style.opacity = "1";

                console.log(`Renderizando botón PayPal en: ${containerSelector}`);
                PayPal.Donation.Button({
                    env: "sandbox", // Cambiar a 'production' en entornos reales
                    hosted_button_id: "BNH9DUN6KARHS",
                    image: {
                        src: "{{ asset('images/donar.png') }}",
                        alt: "Donar con PayPal",
                        title: "PayPal - Seguro y fácil",
                    },
                    onClick: validateBeforeSubmit,
                    onComplete: handleTransactionComplete,
                }).render(containerSelector);
            };

            // Validación previa
            const validateBeforeSubmit = () => {
                const selectedType = document.querySelector('input[name="donation_type"]:checked');
                if (!selectedType) {
                    alert("Selecciona un tipo de donación.");
                    return false;
                }
                if (selectedType.value === "with_email" && !document.getElementById("donor-email").value
                    .trim()) {
                    alert("Por favor, ingresa un correo.");
                    return false;
                }
                return true;
            };

            // Manejo de la transacción
            const handleTransactionComplete = (params) => {
                console.log("Transacción completada:", params);

                const divProcesar = document.getElementById('routerProcesarDonacion');
                const url = divProcesar.getAttribute('data-url');
                console.log(url);

                const {
                    tx,
                    st,
                    amt,
                    cc
                } = params;

                // Determinar el ID del usuario
                const isAnonymous = document.querySelector('input[name="donation_type"]:checked').value ===
                    "anonymous";
                const userId = isAnonymous ? 2 : dynamicUserId; // ID 1 para anónimo

                const data = {
                    transaction_id: tx,
                    status: st,
                    amount: amt,
                    currency: cc,
                    id_donante: userId, // Agregar el ID del usuario
                };

                console.log('Enviando datos al servidor:', data);

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                        },
                        body: JSON.stringify(data),
                    })
                    .then((response) => response.json())
                    .then((result) => {
                        console.log('Respuesta del servidor:', result);
                        alert('¡Donación procesada correctamente!');
                    })
                    .catch((error) => {
                        console.error('Error al enviar la solicitud:', error);
                        alert('Hubo un error al procesar la donación. Por favor, intenta nuevamente.');
                    });
            };

            // Función para manejar el cambio de tipo de donación
            const handleDonationTypeChange = (value) => {
                const isAnonymous = value === "anonymous";

                toggleElement(anonymousInfo, isAnonymous);
                toggleElement(emailContainer, !isAnonymous);

                continueButton.disabled = isAnonymous;
                continueButton.classList.toggle("hidden", isAnonymous);

                const btnRenderClass = isAnonymous ? "#donate-button-anonimo" : "#donate-button-perfil";
                renderPayPalButton(btnRenderClass);
            };

            // Inicialización de eventos
            donationTypeInputs.forEach((input) => {
                input.addEventListener("change", (e) => handleDonationTypeChange(e.target.value));
            });

            const initialSelection = document.querySelector('input[name="donation_type"]:checked');
            if (initialSelection) {
                handleDonationTypeChange(initialSelection.value);
            }

            // Función para comprobar correo y obtener ID dinámico
            window.comprobarCorreoDonante = () => {
                const form = document.getElementById('formCorreoDonante');
                const correo = document.getElementById('donor-email').value.trim();
                const url = form.getAttribute('action');
                
                const emailForm = document.querySelector('#email');
                const fistName = document.querySelector('#first_name');
                const lastName = document.querySelector('#last_name');
                const countryCode = document.querySelector('#country_code');

                const data = {
                    email: correo
                };

                fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content'),
                        },
                        body: JSON.stringify(data),
                    })
                    .then((response) => {
                        if (!response.ok) throw new Error('Error en la respuesta del servidor');
                        return response.json();
                    })
                    .then(({
                        donante,
                        exists
                    }) => {
                        if (exists) {
                            dynamicUserId = donante.id; // Guardar el ID dinámico del usuario
                            console.log("Usuario existente:", donante);
                            const {
                                email,
                                first_name,
                                last_name,
                                country_code
                            } = donante;

                            emailForm.value = email;
                            fistName.value = first_name;
                            lastName.value = last_name;
                            countryCode.value = country_code;

                            abrirModalNuevoDonante();
                        } else {
                            dynamicUserId = null;
                            console.log("Usuario nuevo. ID no asignado.");
                            emailForm.value = '';
                            fistName.value = '';
                            lastName.value = '';
                            countryCode.value = '';
                            abrirModalNuevoDonante();
                        }
                    })
                    .catch((error) => console.error('Error al verificar el correo:', error));
            };

            function abrirModalNuevoDonante() {
                const modal = document.getElementById('modal-crear-donante');
                modal.classList.remove('hidden');
                modal.classList.add('opacity-100');
            }

            function cerrarModal() {
                const modal = document.getElementById('modal-crear-donante');
                modal.classList.add('hidden');
                modal.classList.remove('opacity-100');
            }

        });
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
@endsection

@vite(['resources/js/page/colabora.js'])
