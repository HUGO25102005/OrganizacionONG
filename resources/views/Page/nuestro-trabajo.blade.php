@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/nuestro_trabajo.css'])
@endsection
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Wallpoet&display=swap');

    /* Personalización de Tailwind para incluir la fuente Wallpoet */
    .font-wallpoet {
        font-family: 'Wallpoet', sans-serif;
    }
</style>
<section id="nuestro-trabajo" class="relative w-full h-screen flex justify-center items-center overflow-hidden">
    <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover">
      <source src="{{asset('images/font_2.mp4')}}" type="video/mp4">
    </video>
    <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    <h1 class="absolute text-white text-4xl md:text-5xl lg:text-8xl font-sans font-bold text-center top-1/4 px-5">
      Nuestro recorido
    </h1>
    <div class="absolute bottom-0 left-0 w-full h-3/5 bg-gradient-to-t from-black opacity-50"></div>
  </section>
  
  <section id="rutinas" class=" flex flex-col items-center rounded-t-3xl pt-0 pb-12 h-auto">
    <h1 class="text-gray-800 text-3xl md:text-4xl lg:text-5xl font-bold text-center mt-10 mb-10">
      CONSTRUCCIÓN DE COMUNITARIOS
    </h1>
    <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl">
      <div class="relative w-64 h-80 rounded-lg shadow-lg bg-white flex items-end overflow-hidden transition-transform duration-500 hover:translate-y-2">
        <img src="{{asset('images/const1.jpg')}}" class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-90"></div>
        <div class="relative z-10 p-4 text-white text-center">
          <h3 class="text-xl font-semibold">Valle Paraiso</h3>
        </div>
      </div>
      <div class="relative w-64 h-80 rounded-lg shadow-lg bg-white flex items-end overflow-hidden transition-transform duration-500 hover:translate-y-2">
        <img src="{{asset('images/const2.jpg')}}" class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-90"></div>
        <div class="relative z-10 p-4 text-white text-center">
          <h3 class="text-xl font-semibold">Colomos</h3>
        </div>
      </div>
      <div class="relative w-64 h-80 rounded-lg shadow-lg bg-white flex items-end overflow-hidden transition-transform duration-500 hover:translate-y-2">
        <img src="{{asset('images/const3.jpg')}}" class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-90"></div>
        <div class="relative z-10 p-4 text-white text-center">
          <h3 class="text-xl font-semibold">Santiago</h3>
        </div>
      </div>
    </div>
  </section>




  <br>
  <!-- Imágenes interactivas -->
  <section class="w-full h-auto bg-cover bg-center scroll-animation flex overflow-hidden flex-col items-center justify-center">
    <h1 class="text-gray-800 text-3xl md:text-4xl lg:text-5xl font-bold text-center mt-6">
      Programas Finalizados
    </h1>
    <div id="slider" class="flex mt-6 mb-20 flex-nowrap overflow-x-auto snap-x snap-mandatory gap-4 ml-8 mr-8 py-4">
        <!-- Imagen 1 -->
        @foreach ($programas as $programa)
          <div class="slider-item snap-center flex-shrink-0 w-[300px] md:w-[400px]] lg:w-[20%] rounded-md bg-gray-100 shadow-lg">
              <img class="w-full h-[50%] object-cover rounded-t-md" src="{{ asset('images/centro1.jpg') }}">
              <div class="p-4 h[50%]">
                  <h2 class="font-bold text-lg text-gray-800 text-center"> {{ $programa->nombre_programa }} </h2>
                  <br>
                  <p class="text-gray-500 mb-2">Encargado: <span class="font-semibold">{{ $programa->voluntario->trabajador->user->name. ' ' .$programa->voluntario->trabajador->user->apellido_paterno }}</span></p>
                  <p class="text-gray-500 mb-2">Estudiantes: <span class="font-semibold">{{ $programa->getTotalBeneficiarios() }}</span></p>
                  <p class="text-gray-500 mb-2">Objetivo: <span class="font-semibold">{{ $programa->objetivos }}</span></p>
                  {{-- <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn1">
                      Ver más
                  </button> --}}
              </div>
          </div>
        @endforeach
        <!-- Modal -->
        {{-- <x-programas-modal :title="'Programa 1'" 
            :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
            :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
            :dateinit="'16/10/2024'" 
            :dateEnd="'16/12/2024'" 
            :modalId="'modal1'" 
        /> --}}
        <!-- Imagen 1 -->
            {{-- <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
              <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro1.jpg') }}" alt="Programa 1">
              <div class="p-4">
                  <h2 class="font-bold text-lg text-gray-800">Programa 1</h2>
                  <p class="text-gray-600 text-sm">Descripción breve del programa 1.</p> --}}
                {{-- <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn1">
                    Ver más
                </button> --}}
            {{-- </div>
        </div> --}}
        <!-- Modal -->
        {{-- <x-programas-modal :title="'Programa 1'" 
            :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
            :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
            :dateinit="'16/10/2024'" 
            :dateEnd="'16/12/2024'" 
            :modalId="'modal1'" 
        /> --}}
        
        <!-- Repite para las demás imágenes -->
        {{-- <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
            <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro2.jpg') }}" alt="Programa 2">
            <div class="p-4">
                <h2 class="font-bold text-lg text-gray-800">Programa 2</h2>
                <p class="text-gray-600 text-sm">Descripción breve del programa 2.</p> --}}
                {{-- <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn2">
                    Ver más
                </button> --}}
            {{-- </div>
        </div> --}}
        <!-- Modal -->
        {{-- <x-programas-modal :title="'Programa 2'" 
            :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
            :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
            :dateinit="'16/10/2024'" 
            :dateEnd="'16/12/2024'" 
            :modalId="'modal2'" 
        /> --}}
        <!-- Repite para las demás imágenes -->
        {{-- <div class="slider-item snap-center flex-shrink-0 w-[90%] md:w-[45%] lg:w-[30%] rounded-md bg-gray-100 shadow-lg">
            <img class="w-full h-48 object-cover rounded-t-md" src="{{ asset('images/centro2.jpg') }}" alt="Programa 2">
            <div class="p-4">
                <h2 class="font-bold text-lg text-gray-800">Programa 2</h2>
                <p class="text-gray-600 text-sm">Descripción breve del programa 2.</p> --}}
                {{-- <button class="openModalBtn mt-2 px-4 py-2 bg-slate-700 text-white rounded-full" id="openModalBtn2">
                    Ver más
                </button> --}}
            {{-- </div>
        </div> --}}
        <!-- Modal -->
        {{-- <x-programas-modal :title="'Programa 2'" 
            :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" 
            :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" 
            :dateinit="'16/10/2024'" 
            :dateEnd="'16/12/2024'" 
            :modalId="'modal2'" 
        /> --}}
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



 <!-- Sección de Referencias -->
<section id="referencias" class="flex flex-col items-center rounded-t-3xl pt-0 pb-12 h-auto">
    <h1 class="text-gray-800 text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-8">
      EJEMPLOS A SEGUIR
    </h1>
    <div class="flex flex-wrap justify-center gap-6 w-full max-w-6xl">
      <!-- Card 1 -->
      <div class="relative w-64 h-80 rounded-lg shadow-lg bg-white overflow-hidden">
        <img src="{{asset('images/graduada1.jpg')}}" class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/40 via-gray-900/20 to-transparent text-white">
          <h3 class="text-lg font-bold">Daniela Villaseñor</h3>
          <p class="text-sm mt-2">
            Beneficiaria recibiendo su título universitario gracias a los programas promovidos.
          </p>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="relative w-64 h-80 rounded-lg shadow-lg bg-white overflow-hidden">
        <img src="{{asset('images/graduado2.jpg')}}" class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/40 via-gray-900/20 to-transparent text-white">
          <h3 class="text-lg font-bold">Roberto Suarez</h3>
          <p class="text-sm mt-2">
            Uno de nuestros alumnos ejemplares, acreditando su título universitario.
          </p>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="relative w-64 h-80 rounded-lg shadow-lg bg-white overflow-hidden">
        <img src="{{asset('images/graduada3.jpg')}}" class="absolute top-0 left-0 w-full h-full object-cover rounded-lg">
        <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/40 via-gray-900/20 to-transparent text-white">
          <h3 class="text-lg font-bold">Lorena Hernandez</h3>
          <p class="text-sm mt-2">
            Calificó en su doctorado impecablemente con los programas InspireUp.
          </p>
        </div>
      </div>
    </div>
  </section>

  <button id="scrollButton"
      class="fixed bottom-4 right-4 z-10 items-center justify-center bg-white text-black rounded-full text-lg font-semibold w-14 h-14 cursor-pointer transition-all duration-300 ease-in-out border border-black shadow-none hover:-translate-y-1 hover:-translate-x-0.5 hover:shadow-[2px_5px_0_0_black] active:translate-y-0.5 active:translate-x-0.25 active:shadow-none">
      <i id="scrollIcon" class='bx bxs-chevron-down'></i>
  </button>
  
<style>/* Estilo inicial de los elementos con animación */
    .scroll-animation {
        opacity: 0;
        transform: translateY(50px); /* Desplazamiento inicial */
        transition: opacity 0.6s ease-out, transform 0.6s ease-out; /* Transición suave */
    }
    
    /* Estilo cuando el elemento es visible */
    .scroll-animation.visible {
        opacity: 1;
        transform: translateY(0); /* Retorna a su posición original */
    }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const scrollElements = document.querySelectorAll(".scroll-animation");
    
            const elementInView = (el, dividend = 1) => {
                const elementTop = el.getBoundingClientRect().top;
                return (
                    elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
                );
            };
    
            const displayScrollElement = (element) => {
                element.classList.add("visible");
            };
    
            const handleScrollAnimation = () => {
                scrollElements.forEach((el) => {
                    if (elementInView(el, 1.25) && !el.classList.contains("visible")) {
                        displayScrollElement(el);
                    }
                });
            };
    
            window.addEventListener("scroll", () => {
                handleScrollAnimation();
            });
        });
    </script>
  
@endsection
