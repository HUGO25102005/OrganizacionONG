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
              <div class="slider-item snap-center flex-shrink-0 w-[300px] md:w-[400px]] lg:w-[20%] rounded-md bg-gray-100 shadow-lg">
                  <img class="w-full h-[50%] object-cover rounded-t-md" src="{{ asset('images/centro1.jpg') }}">
                  <div class="p-4 h[50%]">
                      <h2 class="font-bold text-lg text-gray-800 text-center"> {{ $programa->nombre_programa }} </h2>
                      <br>
                      <p class="text-gray-500 mb-2">Encargado: <span class="font-semibold">{{ $programa->voluntario->trabajador->user->name. ' ' .$programa->voluntario->trabajador->user->apellido_paterno }}</span></p>
                      <p class="text-gray-500 mb-2">Inscritos: <span class="font-semibold">{{ $programa->getTotalBeneficiarios() }}</span></p>
                      <p class="text-gray-500 mb-2">Objetivo: <span class="font-semibold">{{ $programa->objetivos }}</span></p>
                      {{-- <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn1">
                          Ver más
                      </button> --}}
                  </div>
              </div>
            @endforeach
        </div>
    </section>
<style>#slider {
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


<section class="flex flex-col-reverse mb-20 lg:flex-row-reverse items-center justify-between bg-[#f7f9fc] h-auto lg:h-[65vh] px-6 lg:px-[10%] py-8 relative">
    <!-- Imagen -->
    <div class="relative max-w-full lg:max-w-[40%] lg:absolute lg:bottom-0 lg:left-0">
        <img src="{{ asset('images/estudiante.png') }}" alt="Persona con laptop"
            class="w-full h-auto mt-20 rounded-lg lg:pl-[120px] mb-6 lg:mb-0">
    </div>
    <!-- Contenido -->
    <div class="w-full lg:w-[50%] flex flex-col justify-center text-left">
        <h1 class="text-3xl lg:text-4xl font-bold text-slate-700 mb-4">
            Ayuda a promover la educación y la superación.
        </h1>
        <p class="text-base lg:text-lg text-slate-700 text-justify leading-relaxed mb-6">
            Las donaciones permitirían asegurar el suministro de materiales esenciales y facilitar la implementación de
            talleres y capacitaciones educativas.
        </p>
        <!-- Botón de donar con PayPal -->
        <div id="donate-button-container" class="flex justify-center lg:justify-start relative">
            <div id="donate-button"></div>
        </div>
    </div>
</section>

<!-- Script de PayPal -->
<!--<a href="donar.html"><img class="donate-img" src="./img/donar.png" alt="Donar"></a>-->
    {{-- <div id="donate-button-container"></div>
    <div id="donate-button"></div>
    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
    <script>
        PayPal.Donation.Button({
            env: 'production',
            hosted_button_id: 'M66DWADBGCNAG',
            style: {
                shape: 'pill',
            },
            image: {
                src: "{{ asset('images/donar.png') }}",
                alt: 'Donar con el botón PayPal',
                title: 'PayPal - La más segura y sencilla manera de pagar en linea!',
            },
            onComplete: function (data) {
                // Extraer los datos relevantes
                console.log('Donación completada:', data);

                // Realizar una solicitud AJAX o Fetch
                /* fetch('/procesar-donacion', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al procesar la donación.');
                    }
                    return response.json();
                })
                .then(result => {
                    console.log('Resultado del servidor:', result);
                    alert('¡Gracias por tu donación!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un problema al procesar tu donación.');
                }); */
                fetch('{{ url('/page/donar/procesar-donacion') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(result => {
                        console.log('Resultado del servidor:', result);
                        alert('¡Gracias por tu donación!');
                    })
                    .catch(error => {
                        console.error('Error al procesar la solicitud:', error);
                        alert('Hubo un problema. Por favor, intenta nuevamente.');
                    });
            }
                
        }).render('#donate-button');
    </script> --}}

    <!-- Botón de donar con sandbox -->
    <div id="donate-button-container">
        <div id="donate-button"></div>
        <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
        <script>
            PayPal.Donation.Button({
                env: 'sandbox',
                hosted_button_id: 'BNH9DUN6KARHS',
                image: {
                    src: "{{ asset('images/donar.png') }}",
                    alt: 'Donar con el botón PayPal',
                    title: 'PayPal - La forma más fácil y segura de pagar en línea!',
                },
                onComplete: function (params) {
                    console.log('Transacción completada:', params);

                    // Configurar datos enviados al servidor
                    const payload = {
                        transaction_id: params.tx,
                        status: params.st,
                        amount: params.amt,
                        currency: params.cc,
                    };

                    console.log('Enviando datos al servidor:', payload);

                    fetch('{{ route('paypal.procesarDonacion') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(payload),
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
                },
            }).render('#donate-button');
        </script>
    </div>
<style>
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
        transition: transform 0.2s ease-in-out; /* Efecto de zoom al pasar el mouse */
    }
    
    #donate-button:hover {
      transform: scale(1.03); /* Aumenta el tamaño al pasar el mouse */
    }</style>

@endsection
