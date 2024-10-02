@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/nuestro_trabajo.css'])
@endsection
@section('content')
<section class="cont_video" id="home">
    <video autoplay loop muted plays-inline class="back-video">
        <source src="{{asset('imges/font_2.mp4')}}" type="video/mp4">
    </video>
</section>

<section class="rutinas" id="rutinas">
    <h1> CONSTRUCCIÓN DE COMUNITARIOS</h1>
    <div class="cards">
        <div class="card">
            <img src="{{asset('imges/const1.jpg')}}">
            <div class="info">
                <h3>Valle Paraiso</h3>
                
            </div>
        </div>
        <div class="card">
            <img src="{{asset('imges/const2.jpg')}}">
            <div class="info">
                <h3>Los patos</h3>
            
            </div>
        </div>
        <div class="card">
            <img src="{{asset('imges/const3.jpg')}}">
            <div class="info">
                <h3>Santiago</h3>
               
            </div>
        </div>
    </div>
</section>


<section class="sect4">
    <div class="carousel">
        <div class="carousel-slide">
            <img src="{{asset('imges/centro1.jpg')}}" alt="Imagen 1">
            <div class="carousel-text">
               
            </div>
        </div>
        <div class="carousel-slide">
            <img src="{{asset('imges/centro2.jpg')}}" alt="Imagen 2">
            <div class="carousel-text">
            
            </div>
        </div>
        <div class="carousel-slide">
            <img src="{{asset('imges/img_3.jpg')}}" alt="Imagen 3">
            <div class="carousel-text">
                
            </div>
        </div>
    </div>
    <div class="carousel-buttons">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
</section>


<section class="rutinas" id="rutinas">
    <h1>REFERENCIAS</h1>
    <div class="cards">
        <div class="card">
            <img src="{{asset('imges/graduada1.jpg')}}">
            <div class="info">
                <h3>Daniela Villaseñor</h3>
                <p>Beneficiaria recibiendo su titulo universitario. Gracias a las acreditaciones de los programas que se promueven.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{asset('imges/graduado2.jpg')}}">
            <div class="info">
                <h3>Roberto Suarez</h3>
                <p>Uno de nuestros alumnos ejemplares, acreditando su titulo universitario.</p>
            </div>
        </div>
        <div class="card">
            <img src="{{asset('imges/graduada3.jpg')}}">
            <div class="info">
                <h3>Lorena Hernandez</h3>
                <p>Calificó en su doctorado impecablemento con la ayuda de los progamas en InspireUp.</p>
            </div>
        </div>
    </div>
</section>
@endsection
