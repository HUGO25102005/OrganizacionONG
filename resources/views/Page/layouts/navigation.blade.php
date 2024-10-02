<div class="navbar">
    <div class="logo">
            <img src="{{ asset('images/logo_n.png') }}" alt="Logo" onclick="window.location.href='{{route('conocenos.index')}}'">
        </a>
    </div>
    <ul class="links">
        <li><a href="{{route('conocenos.index')}}">CONÓCENOS</a></li>
        <li><a href="{{route('transparencia.index')}}">TRANSPARENCIA</a></li>
        <li><a href="{{route('nuestro-trabajo.index')}}">NUESTRO TRABAJO</a></li>
        <li><a href="{{route('colabora.index')}}">COLABORA</a></li>
    </ul>
    <div class="user">
            <a href="{{route('donar.index')}}"><img class="usr_img" src="{{ asset('images/donar.png') }}" alt="Donar"></a>
    </div>
</div> 

