@extends('Page.layouts.app')

@section('content')
    <section class="cont_video" id="home">
        <h1>Transparencia</h1>
        <video autoplay loop muted plays-inline class="back-video">
            <source src="{{asset('images/font.mp4')}}" type="video/mp4">
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
            <source src="{{ asset('images/font_reversa.mov') }}" type="video/mp4">
        </video>

        <div class="statistics">
            <div class="stat-item">
                <h2 class="count" data-count="767282756">0</h2>
                <p>pesos hemos recibido por parte de donantes durante este programa para ayudarnos a crear un futuro.
                </p>
                <i class='bx bx-donate-heart'></i>
            </div>
            <div class="stat-item">
                <h2 class="count" data-count="200000">0</h2>
                <p>personas han colaborado con (Nombre de la asociación). En total, 186.000 eran donantes.</p>
                <i class='bx bx-group'></i>
            </div>
            <div class="stat-item">
                <h2 class="count" data-count="28">0</h2>
                <p>países en los que hemos trabajado, llevando oportunidades de futuro a los más jóvenes.</p>
                <i class='bx bx-world'></i>
            </div>
        </div>

    </section>

    <section class="valores">
        <div class="val_font">
            <h2>Nuestros valores</h2>
            <p class="paragraph">Estamos comprometidos con ser transparentes, honestos, refrendando nuestra misión
                principal que
                es el apoyo con programas educativos, mediante la impartición de cursos y centros comunitarios
                para fomentar la educación digital y el desarrollo intelectual de cada ser humano</p>

            <div class="valores-grid">
                <div class="valor-item">
                    <h3>Empatía</h3>
                    <p>Estamos comprometidos con ser transparentes, honestos, refrendando nuestra misión</p>
                </div>
                <div class="valor-item">
                    <h3>Integridad</h3>
                    <p>Estamos comprometidos con ser transparentes, honestos, refrendando nuestra misión</p>
                </div>
                <div class="valor-item">
                    <h3>Solidaridad</h3>
                    <p>Estamos comprometidos con ser transparentes, honestos, refrendando nuestra misión</p>
                </div>
                <div class="valor-item">
                    <h3>Transparencia</h3>
                    <p>Estamos comprometidos con ser transparentes, honestos, refrendando nuestra misión</p>
                </div>
                <div class="valor-item">
                    <h3>Compromiso social</h3>
                    <p>Estamos comprometidos con ser transparentes, honestos, refrendando nuestra misión</p>
                </div>
            </div>
        </div>


    </section>


    <section class="sect4">
        <div class="carousel">
            <div class="carousel-slide">
                <img src="{{asset('images/img1.jpg')}}" alt="Imagen 1">
                <div class="carousel-text">
                    <p>Se le da apoyo a(Nombre de la asociación)
                        somos una organización internacional donde
                        generamos oportunidades de futuro para la
                        juventud. Apoyamos a las personas más vulnerables,
                        facilitando el acceso a la educación.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="{{asset('images/img3.jpg')}}" alt="Imagen 2">
                <div class="carousel-text">
                    <p>Se le da apoyo a(Nombre de la asociación)
                        somos una organización internacional donde
                        generamos oportunidades de futuro para la
                        juventud. Apoyamos a las personas más vulnerables,
                        facilitando el acceso a la educación.</p>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="{{asset('images/img_3.jpg')}}" alt="Imagen 3">
                <div class="carousel-text">
                    <p>Se le da apoyo a(Nombre de la asociación)
                        somos una organización internacional donde
                        generamos oportunidades de futuro para la
                        juventud. Apoyamos a las personas más vulnerables,
                        facilitando el acceso a la educación.</p>
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
        <img src="{{asset('images/image-removebg-preview_1.png')}}" alt="Laptop con libro" class="parallax-image">
        <img src="{{asset('images/image-removebg-preview_2.png')}}" alt="Laptop con libro" class="parallax-image">
        <a href="donar.html"><img class="donate-button" src="{{asset('images/donar.png')}}"></a>
    </section>
@endsection
