@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/donar.css'])
@endsection
@section('content')
    <section class="cont_video" id="home">
        <h1>InspireUp</h1>
        <video autoplay loop muted plays-inline class="back-video">
            <source src="{{ asset('images/donar.mp4') }}" type="video/mp4">
        </video>
    </section>

    <!-- Imágenes interactivas -->
    <!-- Slider con imágenes interactivas -->
    <section class="w-full h-[55vh] bg-cover bg-center bg-fixed flex flex-col items-center justify-center">
        <div id="slider" class="flex items-center gap-[21px] overflow-hidden relative">
            <!-- Imagen 1 -->
            <div
                class="slider-img relative w-[110px] min-h-[315px] h-[180px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/centro1.jpg') }}" alt="1" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md transition-transform duration-1000 ease-in-out">
                    Programa 1</h1>
                <div class="absolute bottom-[20px] left-[20px] hidden details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 1</h2>
                    <p class="text-white mt-2">Descripción breve del programa 1.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn1">Ver
                        más</button>
                </div>
            </div>

            <!-- Modal -->
            <x-programas-modal :title="'Programa 1'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'¡El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'16/10/2024'" :dateEnd="'16/12/2024'"
                :modalId="'modal1'" />



            <!-- Imagen 2 -->
            <div
                class="slider-img relative w-[110px] min-h-[315px] h-[260px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/centro2.jpg') }}" alt="2" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md transition-transform duration-1000 ease-in-out">
                    Programa 2</h1>
                <div class="absolute bottom-[20px] left-[20px] hidden details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 2</h2>
                    <p class="text-white mt-2">Descripción breve del programa 2.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn2">Ver
                        más</button>
                </div>
            </div>

            <!-- Modal -->
            <x-programas-modal :title="'Programa 2'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'16/10/2024'" :dateEnd="'16/12/2024'"
                :modalId="'modal2'" />

            <!-- Imagen 3 -->
            <div
                class="slider-img relative w-[110px] min-h-[315px] h-[315px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/graduada1.jpg') }}"
                    alt="3" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md transition-transform duration-1000 ease-in-out">
                    Programa 3</h1>
                <div class="absolute bottom-[20px] left-[20px] hidden details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 3</h2>
                    <p class="text-white mt-2">Descripción breve del programa 3.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn3">Ver
                        más</button>
                </div>
            </div>

            <!-- Modal -->
            <x-programas-modal :title="'Programa 3'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'16/10/2024'"
                :dateEnd="'16/12/2024'" :modalId="'modal3'" />

            <!-- Imagen 4 (activa por defecto) -->
            <div
                class="slider-img active relative w-[366px] min-h-[315px] h-[350px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/graduada3.jpg') }}"
                    alt="4" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md hidden transition-transform duration-1000 ease-in-out">
                    Programa 4</h1>
                <div class="absolute bottom-[20px] left-[20px] details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 4</h2>
                    <p class="text-white mt-2">Descripción breve del programa 4.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn4">Ver
                        más</button>
                </div>
            </div>

            <!-- Modal -->
            <x-programas-modal :title="'Programa 4'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'16/10/2024'"
                :dateEnd="'16/12/2024'" :modalId="'modal4'" />

            <!-- Imagen 5 -->
            <div
                class="slider-img relative w-[110px] min-h-[315px] h-[315px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/graduado2.jpg') }}"
                    alt="5" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md transition-transform duration-1000 ease-in-out">
                    Programa 5</h1>
                <div class="absolute bottom-[20px] left-[20px] hidden details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 5</h2>
                    <p class="text-white mt-2">Descripción breve del programa 5.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn5">Ver
                        más</button>
                </div>
            </div>


            <!-- Modal -->
            <x-programas-modal :title="'Programa 5'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'16/10/2024'"
                :dateEnd="'16/12/2024'" :modalId="'modal5'" />

            <!-- Imagen 6 -->
            <div
                class="slider-img relative w-[110px] min-h-[315px] h-[260px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/centro2.jpg') }}" alt="6" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md transition-transform duration-1000 ease-in-out">
                    Programa 6</h1>
                <div class="absolute bottom-[20px] left-[20px] hidden details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 6</h2>
                    <p class="text-white mt-2">Descripción breve del programa 6.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn6">Ver
                        más</button>
                </div>
            </div>

            <!-- Modal -->
            <x-programas-modal :title="'Programa 6'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'2024/10/16'"
                :dateEnd="'2024/12/16'" :modalId="'modal6'" />

            <!-- Imagen 7 -->
            <div
                class="slider-img relative w-[110px] min-h-[315px] h-[260px] rounded-md cursor-pointer transition-all duration-700 ease-in-out">
                <img class="w-full h-full object-cover rounded-md" src="{{ asset('images/centro1.jpg') }}" alt="7" />
                <h1
                    class="absolute top-[40%] left-[-15%] transform rotate-[270deg] font-bold text-2xl text-white uppercase shadow-md transition-transform duration-1000 ease-in-out">
                    Programa 7</h1>
                <div class="absolute bottom-[20px] left-[20px] hidden details">
                    <h2 class="font-bold text-3xl text-white uppercase shadow-md transition-all duration-1000 ease-in-out">
                        Programa 7</h2>
                    <p class="text-white mt-2">Descripción breve del programa 7.</p>
                    <button class="openModalBtn mt-2 px-4 py-2 bg-white text-black rounded-full" id="openModalBtn7">Ver
                        más</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <x-programas-modal :title="'Programa 7'" :content="'¡Nuestro programa educativo en modalidad virtual está diseñado para adaptarse a tu estilo de vida. Te permite elegir tu horario de estudio, brindándote la flexibilidad necesaria para compaginar tus responsabilidades diarias. Además, contarás con asistencia virtual disponible las 24 horas, lista para apoyarte en cualquier momento.!'" :objetive="'El objetivo de este programa es transformar tu aprendizaje en una experiencia cómoda y accesible, permitiéndote desarrollar tus habilidades y conocimientos de manera efectiva, sin las limitaciones de un horario fijo.'" :dateinit="'16/10/2024'" :dateEnd="'16/12/2024'"
            :modalId="'modal7'" />

        <!-- Botones circulares indicadores -->
        <div id="slider-indicators" class="flex mt-4 space-x-2">
            <!-- Los botones se generarán dinámicamente con JS -->
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliderImages = document.querySelectorAll('.slider-img');
            let currentIndex = 3; // Imagen 4 es la activa por defecto (índice 3)
            const totalSlides = sliderImages.length;
            const intervalTime = 3000; // 3 segundos entre cambios automáticos
            let autoSlide;

            // Crear indicadores circulares
            const sliderIndicators = document.getElementById('slider-indicators');
            sliderImages.forEach((img, index) => {
                const indicator = document.createElement('div');
                indicator.classList.add('w-3', 'h-3', 'bg-gray-400', 'rounded-full', 'cursor-pointer',
                    'transition-all', 'duration-500');
                if (index === currentIndex) {
                    indicator.classList.add('bg-slate-900');
                }
                indicator.addEventListener('click', () => {
                    clearInterval(autoSlide);
                    changeSlide(index);
                });
                sliderIndicators.appendChild(indicator);
            });

            const changeSlide = (index) => {
                sliderImages.forEach((slide, i) => {
                    slide.classList.remove('active');
                    slide.style.width = '110px';
                    slide.style.height = slide.getAttribute('class').includes('h-[315px]') ? '315px' :
                        slide.getAttribute('class').includes('h-[260px]') ? '260px' : '180px';
                    slide.querySelector('h1').style.display = 'block';
                    slide.querySelector('.details').style.display = 'none';
                    sliderIndicators.children[i].classList.remove('bg-slate-900');
                    sliderIndicators.children[i].classList.add('bg-gray-400');
                });

                sliderImages[index].classList.add('active');
                sliderImages[index].style.width = '366px';
                sliderImages[index].style.height = '350px';
                sliderImages[index].querySelector('h1').style.display = 'none';
                sliderImages[index].querySelector('.details').style.display = 'block';
                sliderIndicators.children[index].classList.add('bg-slate-900');
                sliderIndicators.children[index].classList.remove('bg-gray-400');

                currentIndex = index;
            };

            autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalSlides;
                changeSlide(currentIndex);
            }, intervalTime);
        });
    </script>


    <section class="third-section">
        <!-- Imagen de unirse -->
        <div class="third-section-image">
            <img src="{{ asset('images/estudiante.png') }}" alt="Persona con laptop">
        </div>
        <!-- Contenido y botón para unirse -->
        <div class="third-section-content">
            <h1>Ayuda a promover la educación y la superación.</h1>
            <p class="text-justify text-slate-900">Las donaciones permitirían asegurar el suministro de materiales
                esenciales y facilitar la implementación de talleres y capacitaciones educativas. De este modo, nuestra ONG
                podría empoderar a las comunidades que atendemos, promoviendo su desarrollo personal y profesional y
                contribuyendo a la construcción de un futuro más equitativo y próspero.</p>

            <!--<a href="donar.html"><img class="donate-img" src="./img/donar.png" alt="Donar"></a>-->
            <div id="donate-button-container"></div>
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
                    }
                }).render('#donate-button');
            </script>
        </div>
        </div>
    </section>
@endsection
