@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/page.css'])
@endsection
@section('content')
    <section class="cont_video" id="conocenos">
        <h1>La educación sin barreras emerge</h1>
        <video autoplay loop muted plays-inline class="back-video">
            <source src="{{ asset('images/font.mp4') }}" type="video/mp4">
        </video>
    </section>


    <section class="sect2">
        <div class="slider">
            <input type="radio" name="slider" id="s1" checked>
            <input type="radio" name="slider" id="s2">
            <input type="radio" name="slider" id="s3">

            <div class="buttons">
                <label for="s1"></label>
                <label for="s2"></label>
                <label for="s3"></label>
            </div>

            <div class="content_slider">
                <div class="firstsld">
                    <h1>¿Quiénes somos?</h1>
                    <p>(Nombre de la asociación) somos una organización internacional
                        donde generamos oportunidades de futuro para la juventud.
                        Apoyamos a las personas más vulnerables, facilitando el acceso a
                        la educación. Garantizando entornos centros educativos, basados
                        en el programa, cerrando la brecha digital.
                    </p>
                </div>
                <div class="secndsld">
                    <h1>Nuestro Objetivo</h1>
                    <p>(Nombre de la asociación) somos una organización internacional
                        donde generamos oportunidades de futuro para la juventud.
                        Apoyamos a las personas más vulnerables, facilitando el acceso a
                        la educación. Garantizando entornos centros educativos, basados
                        en el programa, cerrando la brecha digital.
                    </p>
                </div>
                <div class="trdsld">
                    <h1>¿Quiénes lo conforman?</h1>
                    <p>(Nombre de la asociación) somos una organización internacional
                        donde generamos oportunidades de futuro para la juventud.
                        Apoyamos a las personas más vulnerables, facilitando el acceso a
                        la educación. Garantizando entornos centros educativos, basados
                        en el programa, cerrando la brecha digital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="cont_video" id="home">

        <video autoplay loop muted plays-inline class="back-video">
            <source src="{{ asset('images/font_reversa.mp4') }}" type="video/mp4">
        </video>

        <div class="statistics">
            <div class="stat-item">
                <h2 class="count" data-count="767282756">0</h2>
                <p>Pesos hemos recibido por parte de donantes durante este programa para ayudarnos a crear un futuro.
                </p>
                <i class='bx bx-donate-heart'></i>
            </div>
            <div class="stat-item">
                <h2 class="count" data-count="200000">0</h2>
                <p>Donaciones hemos recibido en InspireUp. Todas dirijidas a la mejora de este programa.</p>
                <i class='bx bx-group'></i>
            </div>
            <div class="stat-item">
                <h2 class="count" data-count="28">0</h2>
                <p>Países en los que hemos trabajado, llevando oportunidades de futuro a los más jóvenes.</p>
                <i class='bx bx-world'></i>
            </div>
        </div>

    </section>

    
    <section class="valores bg-[#efeff9] text-[#262D34] text-center px-8 py-8">
        <div class="val_font w-full max-w-7xl mx-auto rounded-[32px] bg-[#ffffff] shadow-[10px_10px_20px_#d1d9e6,-10px_-10px_20px_#ffffff] p-8 flex flex-col justify-between items-center overflow-hidden">
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
    
    
    
    
    


    <section class="sect4">
        <div class="carousel">
            <div class="carousel-slide">
                <img src="{{ asset('images/img1.jpg') }}" alt="Imagen 1">
                <div class="carousel-text">
                    <p>En InspireUp, somos una organización
                        internacional comprometida con generar oportunidades
                        de futuro para la juventud. Brindamos apoyo a las personas
                        más vulnerables, facilitando el acceso gratuito a la educación
                        para que puedan desarrollarse y construir un futuro mejor.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('images/img3.jpg') }}" alt="Imagen 2">
                <div class="carousel-text">
                    <p>En InspireUp, promovemos el acceso equitativo
                        a las herramientas tecnológicas. Nuestra misión es proporcionar
                        a los jóvenes de comunidades vulnerables los recursos y
                        habilidades digitales que necesitan para prosperar en un
                        mundo cada vez más conectado.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="{{ asset('images/img_3.jpg') }}" alt="Imagen 3">
                <div class="carousel-text">
                    <p>En InspireUp, trabajamos para
                        fortalecer el tejido social a través de programas
                        que promueven el bienestar comunitario. Ayudamos
                        a jóvenes en situación de riesgo a superar
                        barreras económicas y sociales, ofreciéndoles
                        oportunidades para mejorar su calidad de vida.</p>
                </div>
            </div>
        </div>
        <div class="carousel-buttons">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </section>




    <section class="parallax">
        <h1>Educación sin barreras</h1>
        <img src="{{ asset('images/image-removebg-preview_1.png') }}" alt="Laptop con libro" class="parallax-image">
        <img src="{{ asset('images/image-removebg-preview_2.png') }}" alt="Laptop con libro" class="parallax-image">
        <a href="donar"><img class="donate-button" src="{{ asset('images/donar.png') }}"></a>
    </section>
@endsection
