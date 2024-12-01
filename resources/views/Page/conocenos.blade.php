@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/page.css'])
@endsection
@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Wallpoet&display=swap');

    /* Personalización de Tailwind para incluir la fuente Wallpoet */
    .font-wallpoet {
        font-family: 'Wallpoet', sans-serif;
    }
</style>

<section class="relative w-full h-[113vh] flex justify-center items-center overflow-hidden" id="conocenos">
    <h1 class="absolute text-white  text-5xl sm:text-3xl md:text-8xl text-center z-10 m-0 px-5 top-[25%] font-wallpoet font-normal">
        La educación sin barreras emerge
    </h1>
    
    <video autoplay loop muted plays-inline class="absolute w-full h-full object-cover">
        <source src="{{ asset('images/font.mp4') }}" type="video/mp4">
    </video>
    <div class="absolute bottom-0 left-0 w-full h-[60%] z-10"></div>
</section>


<section class="sect2 relative h-[53vh] text-gray-800 px-8 py-8 overflow-hidden">
    <div class="slider relative h-full w-full">
        <!-- Radio inputs -->
        <input type="radio" name="slider" id="s1" class="hidden" checked>
        <input type="radio" name="slider" id="s2" class="hidden">
        <input type="radio" name="slider" id="s3" class="hidden">

        <!-- Buttons -->
        <div class="buttons absolute bottom-2 left-1/2 transform -translate-x-1/2 flex gap-3 z-10">
            <label for="s1" class="btn-neumorphic cursor-pointer w-6 h-6 rounded-full transition-all duration-300"></label>
            <label for="s2" class="btn-neumorphic cursor-pointer w-6 h-6 rounded-full transition-all duration-300"></label>
            <label for="s3" class="btn-neumorphic cursor-pointer w-6 h-6 rounded-full transition-all duration-300"></label>
        </div>

        <!-- Slides Container -->
        <div class="neumorphic-container val_font w-full h-[38vh] mt-6 max-w-7xl mx-auto rounded-[32px] overflow-hidden" style="background-color: #f9f9ff">
            <div class="content_slider flex transition-transform duration-500 ease-in-out w-full">
                <!-- Slide 1 -->
                <div class="slide flex flex-col justify-center items-center text-center w-full h-full px-4">
                    <h1 class="text-2xl sm:text-2xl md:text-4xl font-bold mb-4 leading-tight">
                        ¿Quiénes somos?
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-justify leading-relaxed max-w-[60%]">
                        Somos una organización comprometida a brindar oportunidades. Nos dedicamos a apoyar a las personas más vulnerables mediante el acceso a la educación y el desarrollo de competencias esenciales.
                    </p>
                </div>
                <!-- Slide 2 -->
                <div class="slide flex flex-col justify-center items-center text-center w-full h-full px-4">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4 leading-tight">
                        Nuestro Objetivo
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-justify leading-relaxed max-w-[60%]">
                        Nuestra meta principal es contribuir al desarrollo integral con iniciativas que fomenten la educación. En InspireUp, nos esforzamos por eliminar las barreras que impiden el acceso a la educación de calidad.
                    </p>
                </div>
                <!-- Slide 3 -->
                <div class="slide flex flex-col justify-center items-center text-center w-full h-full px-4">
                    <h1 class="text-2xl sm:text-2xl md:text-4xl font-bold mb-4 leading-tight">
                        ¿Quiénes lo conforman?
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-justify leading-relaxed max-w-[60%]">
                        Nuestra comunidad incluye educadores, mentores, especialistas en tecnología y miembros activos que trabajan juntos para garantizar tener un impacto positivo y duradero.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const buttons = document.querySelectorAll(".buttons label");
        const slider = document.querySelector(".content_slider");
        const slides = document.querySelectorAll(".slide");

        buttons.forEach((button, index) => {
            button.addEventListener("click", () => {
                // Cambiar el transform del slider para mover al slide correspondiente
                slider.style.transform = `translateX(-${index * 100}%)`;

                // Manejar la opacidad de los slides para asegurar visibilidad correcta
                slides.forEach((slide, slideIndex) => {
                    slide.style.opacity = slideIndex === index ? "1" : "0";
                });
            });
        });
    });
</script>

<style>
    /* Ajuste del contenedor general */
    .neumorphic-container {
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
    }

    /* Contenedor del carrusel */
    .content_slider {
        display: flex;
        width: 300%; /* Espacio para los 3 slides */
    }

    /* Configuración de cada slide */
    .slide {
        flex: 0 0 100%; /* Cada slide ocupa todo el ancho */
        height: 100%; /* Ajusta la altura de los slides */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0; /* Oculta los slides por defecto */
        transition: opacity 0.5s ease-in-out; /* Transición suave */
    }

    /* Slide visible por defecto */
    .slide:first-child {
        opacity: 1;
    }

    /* Botones neumorfismo */
    .btn-neumorphic {
        background: #ffffff;
        box-shadow: inset 4px 4px 8px #d1d9e6, inset -4px -4px 8px #ffffff;
    }

    .btn-neumorphic:hover {
        background-color: #bcc2cd;
    }
</style>

  


   
    <section class="relative w-full h-screen overflow-hidden" id="home">
        <video autoplay loop muted plays-inline class="absolute w-full h-full object-cover" ">
            <source src="{{ asset('images/font_reversa.mp4') }}" type="video/mp4">
        </video>
    
        <div class="absolute flex justify-around items-start text-center px-5 md:top-[65%] top-[55%] z-10 w-full">
            <!-- Item 1 -->
            <div class="text-white flex flex-col items-center w-1/3">
                <i class="bx bx-donate-heart mb-2 text-5xl"></i>
                <h2 class="text-4xl font-bold mt-2 mb-2 transition-all ease-in-out duration-500">{{ $suma_monto }}</h2>
                <p class="text-base font-medium md:text-lg leading-6">
                    Hemos recibido de donantes. 
                </p>
            </div>
            <!-- Item 2 -->
            <div class="text-white flex flex-col items-center w-1/3">
                <i class="bx bx-group mb-2 text-5xl"></i>
                <h2 class="text-4xl font-bold mt-2 mb-2 transition-all ease-in-out duration-500">{{ $cantidad_donaciones }}</h2>
                <p class="text-base font-medium md:text-lg leading-6">
                    Donaciones hemos recibido en InspireUp. 
                </p>
            </div>
            
        </div>
    </section>
    
    
    
    
    
    <section class="valores bg-[#efeff9] scroll-animation text-[#262D34] text-center px-8 py-8">
        <div class="val_font w-full max-w-7xl mx-auto rounded-[32px] py-8 bg-[#ffffff] shadow-[10px_10px_20px_#d1d9e6,-10px_-10px_20px_#ffffff] p-8 flex flex-col justify-between items-center overflow-hidden">
            <h2 class="text-4xl font-bold mt-8 mb-12">Nuestros valores</h2>
            <p class="paragraph mb-20 px-8 md:px-20 lg:px-40 text-justify">
                Nuestra plataforma está dedicada a brindar acceso gratuito a la educación para todas las personas, sin importar su situación. Estos son los valores que guían nuestro trabajo:
            </p>
            <div class="valores-grid flex flex-wrap justify-around gap-8">
                <div class="valor-item max-w-[230px] p-5 rounded-[16px]  shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10" style="background-color: rgb(246, 247, 255)">
                    <i class="bx bx-heart text-4xl text-[#262D34] mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-4">Empatía</h3>
                    <p class="text-md font-medium text-[#262D34] text-justify">
                        Nos esforzamos por entender las necesidades de quienes más lo necesitan.
                    </p>
                </div>
               
                <div class="valor-item max-w-[230px] p-5 rounded-[16px] bg-[#efeff2] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10" style="background-color: rgb(246, 247, 255)">
                    <i class="bx bx-group text-4xl text-[#262D34] mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-4">Solidaridad</h3>
                    <p class="text-md font-medium text-[#262D34] text-justify">
                        Creemos en la importancia de unir esfuerzos para generar un impacto real en la sociedad.
                    </p>
                </div>
                <div class="valor-item max-w-[230px] p-5 rounded-[16px] bg-[#efeff2] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10" style="background-color: rgb(246, 247, 255)">
                    <i class="bx bx-show text-4xl text-[#262D34] mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-4">Transparencia</h3>
                    <p class="text-md font-medium text-[#262D34] text-justify">
                        Nos comprometemos a ser claros en nuestras acciones, decisiones y el uso de recursos.
                    </p>
                </div>
                <div class="valor-item max-w-[230px] p-5 rounded-[16px] bg-[#efeff2] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff] transition-all duration-300 transform mb-10" style="background-color: rgb(246, 247, 255)">
                    <i class="bx bx-world text-4xl text-[#262D34] mb-4"></i>
                    <h3 class="text-2xl font-semibold mb-4">Compromiso social</h3>
                    <p class="text-md font-medium text-[#262D34] text-justify">
                        Estamos dedicados a mejorar la vida de las personas a través de la educación gratuita.
                    </p>
                </div>
            </div>
        </div>
    </section>

    
    
   

    <section class="relative flex justify-center items-center w-full h-[100vh] bg-[#efeff9]">
        <h1 class="text-center text-[#0B237A] text-[10vw] font-wallpoet font-normal z-[1] relative m-0">
            Educación sin barreras
        </h1>
        <img src="{{ asset('images/image-removebg-preview_1.png') }}" alt="Laptop con libro"
            class="absolute w-[200%] h-auto top-[35%] left-[32%] -translate-y-1/2 max-w-[30%] z-0">
        <img src="{{ asset('images/image-removebg-preview_2.png') }}" alt="Laptop con libro"
            class="absolute  w-[200%] h-auto top-[45%] left-[32%] -translate-y-1/2 max-w-[30%] z-0">
        <a href="donar">
            <img src="{{ asset('images/donar.png') }}"
                class="absolute w-[250px] h-[100px] rounded-full mt-[35vh] px-[30px] py-[10px] left-1/2 -translate-x-1/2 -translate-y-1/2 z-2 cursor-pointer transition-transform duration-200 hover:scale-105">
        </a>
    </section>



    <section class="sect4 flex flex-col w-full scroll-animation h-[90vh] bg-[#efeff9] px-8 py-8 justify-center items-center text-white text-center relative">
        <div class="carousel w-full max-w-7xl mx-auto overflow-hidden rounded-[32px] relative">
            <div class="carousel-track flex transition-transform duration-500 ease-in-out">
                <div class="carousel-slide flex-shrink-0 w-full relative">
                    <img src="{{ asset('images/img1.jpg') }}" alt="Imagen 1" class="w-full h-auto object-cover">
                </div>
                <div class="carousel-slide flex-shrink-0 w-full">
                    <img src="{{ asset('images/img_3.jpg') }}" alt="Imagen 2" class="w-full h-auto object-cover">
                </div>
                <div class="carousel-slide flex-shrink-0 w-full">
                    <img src="{{ asset('images/img3.jpg') }}" alt="Imagen 3" class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
        <!-- Botones de control -->
        <div class="flex items-center gap-6 mb-10 mt-8">
            <button id="controlButton" class="play-pause-btn h-[50px] w-[50px] flex items-center justify-center rounded-full bg-[#f5f5f5] shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff]">
                <i class="bx bx-play text-black text-2xl"></i>
            </button>
            <div class="dots flex items-center gap-3 bg-[#f5f5f5] px-6 py-4 rounded-full shadow-[6px_6px_12px_#d1d9e6,-6px_-6px_12px_#ffffff]">
                <div class="dot h-[10px] w-[50px] bg-gray-400 rounded-full overflow-hidden">
                    <div class="progress h-full bg-black rounded-full" style="width: 0%;"></div>
                </div>
                <div class="dot h-[10px] w-[50px] bg-gray-400 rounded-full overflow-hidden">
                    <div class="progress h-full bg-black rounded-full" style="width: 0%;"></div>
                </div>
                <div class="dot h-[10px] w-[50px] bg-gray-400 rounded-full overflow-hidden">
                    <div class="progress h-full bg-black rounded-full" style="width: 0%;"></div>
                </div>
            </div>
        </div>
    </section>
    
    <button id="scrollButton"
        class="fixed bottom-4 right-4 z-10 items-center justify-center bg-white text-black rounded-full text-lg font-semibold w-14 h-14 cursor-pointer transition-all duration-300 ease-in-out border border-black shadow-none hover:-translate-y-1 hover:-translate-x-0.5 hover:shadow-[2px_5px_0_0_black] active:translate-y-0.5 active:translate-x-0.25 active:shadow-none">
        <i id="scrollIcon" class='bx bxs-chevron-down'></i>
    </button>

    <style>
        /* Estilo para eliminar el borde azul por defecto */
        button {
            outline: none; /* Elimina el borde azul */
            border: none;  /* Asegura que no haya ningún borde */
        }
    
        button:focus {
            outline: none; /* Elimina cualquier borde que aparezca al enfocarse */
        }
    </style>

    <script>
        // Variables del carrusel
        const track = document.querySelector('.carousel-track');
        const slides = Array.from(document.querySelectorAll('.carousel-slide'));
        const progressBars = document.querySelectorAll('.progress');
        const controlButton = document.getElementById('controlButton');
        const controlIcon = controlButton.querySelector('i');
        let currentIndex = 0;
        let interval;
        let isPaused = true;
    
        // Posicionar slides correctamente
        slides.forEach((slide, index) => {
            slide.style.left = `${index * 100}%`;
        });
    
        // Mostrar slide actual y actualizar indicadores
        function showSlide(index) {
            track.style.transform = `translateX(-${index * 100}%)`;
            progressBars.forEach((bar) => {
                bar.style.width = '0%';
                bar.style.transition = '';
            });
    
            if (!isPaused) {
                const activeBar = progressBars[index];
                activeBar.style.transition = 'width 3s linear';
                activeBar.style.width = '100%';
            }
        }
    
        // Iniciar el carrusel
        function startCarousel() {
            isPaused = false;
            controlIcon.classList.replace('bx-play', 'bx-pause');
    
            showSlide(currentIndex); // Asegura que el slide actual se muestre correctamente
            resumeIndicators();
    
            interval = setInterval(() => {
                currentIndex++;
                if (currentIndex >= slides.length) {
                    clearInterval(interval);
                    controlIcon.classList.replace('bx-pause', 'bx-reset');
                    currentIndex = slides.length - 1; // Mantenerse en el último slide
                } else {
                    showSlide(currentIndex);
                }
            }, 3000);
        }
    
        // Pausar/reiniciar el carrusel
        controlButton.addEventListener('click', () => {
            if (controlIcon.classList.contains('bx-pause')) {
                isPaused = true;
                controlIcon.classList.replace('bx-pause', 'bx-play');
                clearInterval(interval);
                pauseIndicators();
            } else if (controlIcon.classList.contains('bx-reset')) {
                isPaused = false;
                controlIcon.classList.replace('bx-reset', 'bx-pause');
                currentIndex = 0;
                showSlide(currentIndex);
                startCarousel();
            } else {
                startCarousel();
            }
        });
    
        // Pausar la animación de indicadores
        function pauseIndicators() {
            progressBars.forEach((bar) => {
                const computedWidth = window.getComputedStyle(bar).width;
                bar.style.width = computedWidth;
                bar.style.transition = '';
            });
        }
    
        // Reanudar la animación de indicadores
        function resumeIndicators() {
            progressBars.forEach((bar, i) => {
                if (i === currentIndex) {
                    bar.style.transition = 'width 3s linear';
                    bar.style.width = '100%';
                }
            });
        }
    
        // Inicializar el carrusel
        showSlide(currentIndex);
    </script>
    


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
