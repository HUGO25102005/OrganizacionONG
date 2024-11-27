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
        <div id="slider" class="flex mt-20 mb-20 flex-nowrap overflow-x-auto snap-x snap-mandatory gap-4 py-4">
            <!-- Imagen 1 -->
            <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
                <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro1.jpg') }}" alt="Programa 1">
                <div class="p-4">
                    <h2 class="font-bold text-lg text-gray-800">Programa 1</h2>
                    <p class="text-gray-600 text-sm">Descripción breve del programa 1.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn1">
                        Ver más
                    </button>
                </div>
            </div>
            <!-- Modal -->
            <x-programas-modal :title="'Programa 1'" 
                :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
                :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
                :dateinit="'16/10/2024'" 
                :dateEnd="'16/12/2024'" 
                :modalId="'modal1'" 
            />
            <!-- Imagen 1 -->
            <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
                <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro1.jpg') }}" alt="Programa 1">
                <div class="p-4">
                    <h2 class="font-bold text-lg text-gray-800">Programa 1</h2>
                    <p class="text-gray-600 text-sm">Descripción breve del programa 1.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn1">
                        Ver más
                    </button>
                </div>
            </div>
            <!-- Modal -->
            <x-programas-modal :title="'Programa 1'" 
                :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
                :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
                :dateinit="'16/10/2024'" 
                :dateEnd="'16/12/2024'" 
                :modalId="'modal1'" 
            />
            
            <!-- Repite para las demás imágenes -->
            <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
                <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro2.jpg') }}" alt="Programa 2">
                <div class="p-4">
                    <h2 class="font-bold text-lg text-gray-800">Programa 2</h2>
                    <p class="text-gray-600 text-sm">Descripción breve del programa 2.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn2">
                        Ver más
                    </button>
                </div>
            </div>
            <!-- Modal -->
            <x-programas-modal :title="'Programa 2'" 
                :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
                :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
                :dateinit="'16/10/2024'" 
                :dateEnd="'16/12/2024'" 
                :modalId="'modal2'" 
            />
            <!-- Repite para las demás imágenes -->
            <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
                <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro2.jpg') }}" alt="Programa 2">
                <div class="p-4">
                    <h2 class="font-bold text-lg text-gray-800">Programa 2</h2>
                    <p class="text-gray-600 text-sm">Descripción breve del programa 2.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn2">
                        Ver más
                    </button>
                </div>
            </div>
            <!-- Modal -->
            <x-programas-modal :title="'Programa 2'" 
                :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
                :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
                :dateinit="'16/10/2024'" 
                :dateEnd="'16/12/2024'" 
                :modalId="'modal2'" 
            />
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

<section class="flex flex-col-reverse lg:flex-row-reverse items-center justify-between bg-[#f7f9fc] h-auto lg:h-[65vh] px-6 lg:px-[10%] py-8 relative">
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
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
    PayPal.Donation.Button({
        env: 'sandbox', // Cambiar a 'production' para entorno real
        hosted_button_id: 'ZL8G9R6KRJUSN',
        image: {
            src: "{{ asset('images/donar.png') }}",
            alt: 'Donar con el botón PayPal',
            title: 'PayPal - La forma más fácil y segura de pagar en línea!',
        },
        style: {
            shape: 'pill', // Forma del botón
            height: 45,    // Altura del botón
        }
    }).render('#donate-button');
</script>
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
