@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/transparencia.css'])
@endsection
@section('content')
    <!-- carrusel -->
    <section class="carrusel-noticias">
        <div class="carrusel">
            <!-- list item -->
            <div class="list">
                <div class="item">
                    <img src="{{ asset('images/img1.jpg') }}">
                    <div class="contenido">
                        <div class="title">Educación Transformadora</div>
                        <div class="topic">Innovadora</div>
                        <div class="des">
                            <!-- lorem 50 -->
                            Una fuente de recursos para superarse día con día con el fin de formar profesionistas
                            ejemplares.
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/img3.jpg') }}">
                    <div class="contenido">
                        <div class="title">Despertar Femenino</div>
                        <div class="topic">Rebelión</div>
                        <div class="des">
                            Las mujeres comenzaron a derrocar la dictadura, conseguir
                            la mejora de los salarios.
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('images/img_2.jpg') }}">
                    <div class="contenido">
                        <div class="title">Historia en las Urnas</div>
                        <div class="topic">Pioneras</div>
                        <div class="des">
                            En 1955 por primera vez las mujeres
                            participaron en una elección federal.
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/img_3.jpg')}}">
                    <div class="contenido">
                        <div class="title">Lo Personal es Político</div>
                        <div class="topic">Sororidad</div>
                        <div class="des">
                            1971 nace el contingente
                            Mujeres en Acción Solidaria (MAS), primer acercamiento con los movimientos
                            feministas.
                        </div>
                    </div>
                </div>
            </div>
            <!-- list thumnail -->
            <div class="thumbnail">
                <div class="item">
                    <img src="{{asset('images/img1.jpg')}}">
                    <div class="contenido">
                        <div class="title">
                            Educación Transformadora
                        </div>
                        <div class="description">
                            Innovadora
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/img3.jpg')}}">
                    <div class="contenido">
                        <div class="title">
                            Planes Educativos
                        </div>
                        <div class="description">
                            Rebelión
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/img_2.jpg')}}">
                    <div class="contenido">
                        <div class="title">
                            Formación Academica
                        </div>
                        <div class="description">
                            Educación
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('images/img_3.jpg')}}">
                    <div class="contenido">
                        <div class="title">
                            Lo Personal es Político
                        </div>
                        <div class="description">
                            Sororidad
                        </div>
                    </div>
                </div>
            </div>
            <!-- next prev --
            
                        <div class="arrows">
                            <button id="prev">&lt;</button>
                            <button id="next">&gt;</button>
                        </div>
                        <!-- time running -->
            <div class="time"></div>
        </div>
    </section>




    <section class="sect2">
        <div class="statistics">
            <div class="stat-item">
                <h2 class="count" data-count="0">0</h2>
                <p>Pesos hemos recibido por parte de donantes durante este programa para ayudarnos a crear un futuro.</p>
                <i class='bx bx-donate-heart'></i>
            </div>
            <div class="stat-item">
                <h2 class="count" data-count="0">0</h2>
                <p>Personas han colaborado con (Nombre de la asociación). En total, 186.000 eran donantes.</p>
                <i class='bx bx-group'></i>
            </div>
            <div class="stat-item">
                <h2 class="count" data-count="0">0</h2>
                <p>Países en los que hemos trabajado, llevando oportunidades de futuro a los más jóvenes.</p>
                <i class='bx bx-world'></i>
            </div>
        </div>
    </section>
@endsection
