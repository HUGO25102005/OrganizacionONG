@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/donar.css'])
@endsection
@section('content')
    <section class="cont_video" id="home">
        <h1>InspireUp</h1>
        <video autoplay loop muted plays-inline class="back-video">
            <source src="{{asset('images/donar.mp4')}}" type="video/mp4">
        </video>
    </section>

    <section class="third-section">
        <!-- Imagen de unirse -->
        <div class="third-section-image">
            <img src="{{ asset('images/estudiante.png')}}" alt="Persona con laptop">
        </div>
        <!-- Contenido y botón para unirse -->
        <div class="third-section-content">
            <h1>Ayuda a promover la educación y la superación.</h1>

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
                        src: './img/donar.png',
                        alt: 'Donar con el botón PayPal',
                        title: 'PayPal - La más segura y sencilla manera de pagar en linea!',
                    }
                }).render('#donate-button');
            </script>
        </div>
        </div>
    </section>
@endsection
