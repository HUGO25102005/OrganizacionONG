@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/colabora.css'])
@endsection
@section('content')


   
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <style>
        @keyframes slide-in {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    
        .animate-slide-in {
            animation: slide-in 0.8s ease-out forwards;
        }
    </style>
    
    <section class="h-screen w-full overflow-hidden relative">
      <!-- Carrusel principal -->
      <div id="carousel" class="relative h-full w-full">
        <!-- Slides -->
        <div class="carousel-items flex transition-transform duration-500 ease-in-out h-full">
            <!-- Slide 1 -->
            <div class="carousel-item relative w-full flex-shrink-0 h-full">
                <img src="{{ asset('images/img1.jpg') }}" class="w-full h-full object-cover" alt="Educación Transformadora">
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                <div class="absolute top-[10%] left-[5%] md:top-[15%] md:left-[10%] w-[90%] md:w-[50%] lg:w-[45%] text-white space-y-6">
                    <h2 class="text-3xl sm:text-4xl text-blue-500 lg:text-6xl font-bold leading-tight">
                        Educación Transformadora
                    </h2>
                    <p class="text-lg font-semibold sm:text-xl lg:text-2xl">
                        Innovación en el aprendizaje
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl leading-relaxed">
                        Un enfoque moderno para formar profesionistas con habilidades del siglo XXI, a través de recursos educativos innovadores y accesibles.
                    </p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item relative w-full flex-shrink-0 h-full">
                <img src="{{ asset('images/img3.jpg') }}" class="w-full h-full object-cover" alt="Aprendizaje Global">
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                <div class="absolute top-[10%] left-[5%] md:top-[15%] md:left-[10%] w-[90%] md:w-[50%] lg:w-[45%] text-white space-y-6">
                    <h2 class="text-3xl sm:text-4xl text-blue-500 lg:text-6xl font-bold leading-tight">
                        Aprendizaje Global
                    </h2>
                    <p class="text-lg font-semibold sm:text-xl lg:text-2xl">
                        Conexiones sin fronteras
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl leading-relaxed">
                        Colaboramos internacionalmente para promover la inclusión educativa, conectando estudiantes y educadores de todo el mundo.
                    </p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item relative w-full flex-shrink-0 h-full">
                <img src="{{ asset('images/img_2.jpg') }}" class="w-full h-full object-cover" alt="Impacto Educativo">
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                <div class="absolute top-[10%] left-[5%] md:top-[15%] md:left-[10%] w-[90%] md:w-[50%] lg:w-[45%] text-white space-y-6">
                    <h2 class="text-3xl sm:text-4xl text-blue-500  lg:text-6xl font-bold leading-tight">
                        Impacto Educativo
                    </h2>
                    <p class="text-lg font-semibold sm:text-xl lg:text-2xl">
                        Cambiando vidas
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl leading-relaxed">
                        A través de la educación, transformamos comunidades y creamos oportunidades para un futuro más equitativo y prometedor.
                    </p>
                </div>
            </div>
            <!-- Slide 4 -->
            <div class="carousel-item relative w-full flex-shrink-0 h-full">
                <img src="{{ asset('images/img_3.jpg') }}" class="w-full h-full object-cover" alt="Compromiso Docente">
                <div class="absolute inset-0 bg-black bg-opacity-30"></div>
                <div class="absolute top-[10%] left-[5%] md:top-[15%] md:left-[10%] w-[90%] md:w-[50%] lg:w-[45%] text-white space-y-6">
                    <h2 class="text-3xl sm:text-4xl lg:text-6xl text-blue-500 font-bold leading-tight">
                        Compromiso Docente
                    </h2>
                    <p class="text-lg font-semibold sm:text-xl lg:text-2xl">
                        Inspirando el futuro
                    </p>
                    <p class="text-base sm:text-lg lg:text-xl  leading-relaxed">
                        Nuestros docentes son agentes de cambio que inspiran y guían a los estudiantes hacia un aprendizaje transformador.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    
      <!-- Thumbnails -->
      <div class="absolute bottom-2 md:bottom-4 right-2 md:right-4 flex gap-2 sm:gap-4 z-0">
        <div class="thumbnail-item w-[50px] h-[70px] sm:w-[70px] sm:h-[100px] md:w-[100px] md:h-[140px] flex-shrink-0 cursor-pointer">
          <img src="{{ asset('images/img1.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Thumbnail 1">
        </div>
        <div class="thumbnail-item w-[50px] h-[70px] sm:w-[70px] sm:h-[100px] md:w-[100px] md:h-[140px] flex-shrink-0 cursor-pointer">
          <img src="{{ asset('images/img3.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Thumbnail 2">
        </div>
        <div class="thumbnail-item w-[50px] h-[70px] sm:w-[70px] sm:h-[100px] md:w-[100px] md:h-[140px] flex-shrink-0 cursor-pointer">
          <img src="{{ asset('images/img_2.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Thumbnail 3">
        </div>
        <div class="thumbnail-item w-[50px] h-[70px] sm:w-[70px] sm:h-[100px] md:w-[100px] md:h-[140px] flex-shrink-0 cursor-pointer">
          <img src="{{ asset('images/img_3.jpg') }}" class="w-full h-full object-cover rounded-lg" alt="Thumbnail 4">
        </div>
      </div>
    
     <!-- Controles de navegación -->
    <div class="absolute bottom-10 left-10 flex gap-2 sm:gap-4 z-10">
        <button id="prev" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-800 bg-opacity-50 hover:bg-opacity-50 text-white font-bold hover:bg-gray-700">
          &lt;
        </button>
        <button id="next" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-gray-800 bg-opacity-50 hover:bg-opacity-50 text-white font-bold hover:bg-gray-700">
          &gt;
        </button>
      </div>
      
    </section>
    
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const carousel = document.querySelector("#carousel .carousel-items");
        const slides = document.querySelectorAll(".carousel-item");
        const prevButton = document.querySelector("#prev");
        const nextButton = document.querySelector("#next");
        const slideInterval = 5000; // Cambia cada 5 segundos automáticamente
        let currentIndex = 0;
        let autoSlide;
    
        const resetAnimations = () => {
          slides.forEach((slide) => {
            const texts = slide.querySelectorAll("h2, p");
            texts.forEach((text) => {
              text.classList.remove("animate-slide-in");
            });
          });
        };
    
        const playAnimations = (slide) => {
          const texts = slide.querySelectorAll("h2, p");
          texts.forEach((text, index) => {
            text.style.animationDelay = `${index * 0.4}s`;
            text.classList.add("animate-slide-in");
          });
        };
    
        const updateCarousel = () => {
          carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
          resetAnimations();
          playAnimations(slides[currentIndex]);
        };
    
        const resetAutoSlide = () => {
          clearInterval(autoSlide);
          autoSlide = setInterval(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            updateCarousel();
          }, slideInterval);
        };
    
        nextButton.addEventListener("click", () => {
          currentIndex = (currentIndex + 1) % slides.length;
          updateCarousel();
          resetAutoSlide();
        });
    
        prevButton.addEventListener("click", () => {
          currentIndex = (currentIndex - 1 + slides.length) % slides.length;
          updateCarousel();
          resetAutoSlide();
        });
    
        // Auto-slide inicial
        autoSlide = setInterval(() => {
          currentIndex = (currentIndex + 1) % slides.length;
          updateCarousel();
        }, slideInterval);
    
        playAnimations(slides[currentIndex]); // Animación inicial
      });
    </script>
    
    <section class="valores neumorphic-section scroll-animation bg-[#efeff9] text-[#262D34] text-center px-8 py-8">
        <div class=" val_font w-full max-w-7xl mx-auto rounded-[32px] bg-[#ffffff] shadow-[10px_10px_20px_#d1d9e6,-10px_-10px_20px_#ffffff] p-8 flex flex-col justify-between items-center overflow-hidden">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 text-center">
                Se parte de nuestro equipo
            </h1>
            <p class="paragraph mb-20 px-8 md:px-20 lg:px-40 text-justify">
                Nuestra plataforma está dedicada a brindar acceso gratuito a la educación para todas las personas, sin importar su situación. Estos son los valores que guían nuestro trabajo:
            </p>
            <div class="valores-grid flex flex-wrap justify-around gap-8">
                <div class="valor-item max-w-[280px] p-5 rounded-[16px] bg-[#f6f7ff] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10">
                    <h3 class="text-2xl font-semibold mb-4">Se parte de esta experiencia</h3>
                    <p class="text-md font-semibold text-[#262D34] text-justify">
                        Toma cursos de tu interés de forma gratuita.
                    </p>
                    <img src="{{ asset('images/estudiante.png') }}" alt="Estudiante" class="neumorphic-img h-48 mb-6">
                    <button class="btn-neumorphic" onclick="openModal('myModal')">Solicita un curso</button>
                </div>
                <div class="valor-item max-w-[280px] p-5 rounded-[16px] bg-[#f6f7ff] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10">
                    <h3 class="text-2xl font-semibold mb-10">Se parte de nuestro soporte de docentes</h3>
                    <p class="text-md font-semibold text-[#262D34] text-justify">
                        Toma cursos de tu interés de forma gratuita.
                    </p>
                    <img src="{{ asset('images/mtro.png') }}" alt="Docente" class="neumorphic-img mb-6">
                    <button class="btn-neumorphic" onclick="openModal('volunteerModal')">Únete como docente</button>
                </div>
                <div class="valor-item max-w-[280px] p-5 rounded-[16px] bg-[#f6f7ff] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10">
                    <h3 class="text-2xl font-semibold mb-2">Se parte de nuestro soporte de coordinación</h3>
                    <p class="text-md font-semibold text-[#262D34] text-justify">
                        Toma cursos de tu interés de forma gratuita.
                    </p>
                    <img src="{{ asset('images/coordinador.png') }}" alt="Coordinador" class="neumorphic-img mb-6">
                        <button class="btn-neumorphic" onclick="openModal('coordinatorModal')">Únete como coordinador</button>
                </div>
                
            </div>
        </div>
    </section>
    <style>.btn-neumorphic {
        padding: 12px 24px;
        background: #efeff9;
        color: #333;
        border-radius: 24px;
        box-shadow: 6px 6px 12px #d1d9e6, -6px -6px 12px #ffffff;
        transition: all 0.3s ease-in-out;
    }
    
    .btn-neumorphic:hover {
        box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
    }</style>
    



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
