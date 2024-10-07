@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/page.css'])
@endsection
@section('content')
    <section class="cont_video" id="home">
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

    <section class="valores">
        <div class="val_font">
            <h2>Nuestros valores</h2>
            <p class="paragraph">Nuestra plataforma está dedicada a brindar acceso gratuito a la educación
                para todas las personas, sin importar su situación. A través de cursos y centros comunitarios,
                buscamos promover la educación digital y el desarrollo intelectual de cada ser humano. Estos son
                los valores que guían nuestro trabajo:</p>

            <div class="valores-grid">
                <div class="valor-item">
                    <h3>Empatía</h3>
                    <p>Nos esforzamos por entender las necesidades de quienes más lo necesitan. Trabajamos para
                        ofrecer educación que sea accesible, inclusiva y adaptada a las circunstancias de cada persona,
                        con el fin de contribuir a su desarrollo personal y profesional.
                    </p>
                </div>
                <div class="valor-item">
                    <h3>Integridad</h3>
                    <p>Actuamos con honestidad y ética en todo lo que hacemos. Nuestros programas educativos se
                        gestionan de manera responsable, siempre garantizando que nuestros beneficiarios reciban
                        un servicio de calidad y sin fines de lucro.</p>
                </div>
                <div class="valor-item">
                    <h3>Solidaridad</h3>
                    <p>Creemos en la importancia de unir esfuerzos para generar un impacto real en la sociedad.
                        Nos comprometemos a trabajar en colaboración con comunidades, voluntarios y socios para hacer
                        que la educación sea una herramienta accesible para todos.
                    </p>
                </div>
                <div class="valor-item">
                    <h3>Transparencia</h3>
                    <p>Nos comprometemos a ser claros en nuestras acciones, decisiones y el uso de recursos.
                        Mantenemos un diálogo abierto con nuestros beneficiarios y colaboradores para garantizar
                        que todos los aspectos de nuestra labor sean visibles y accesibles.</p>
                </div>
                <div class="valor-item">
                    <h3>Compromiso social</h3>
                    <p>Estamos dedicados a mejorar la vida de las personas a través de la educación gratuita.
                        Reconocemos la importancia de nuestra misión y trabajamos incansablemente para contribuir
                        al progreso social y reducir la brecha educativa.</p>
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
        <a href="donar.html"><img class="donate-button" src="{{ asset('images/donar.png') }}"></a>
    </section>
@endsection
