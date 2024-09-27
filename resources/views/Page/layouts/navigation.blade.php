<div class="navbar">
    <div class="logo">
            <img src="{{ asset('images/logo_n.png') }}" alt="Logo" onclick="window.location.href='{{route('conocenos.index')}}'">
        </a>
    </div>
    <ul class="links">
        <li><a href="{{route('conocenos.index')}}">CONÓCENOS</a></li>
        <li><a href="{{route('transparencia.index')}}">TRANSPARENCIA</a></li>
        <li><a href="{{route('experiencias.index')}}">EXPERIENCIAS</a></li>
        <li><a href="{{route('colabora.index')}}">COLABORA</a></li>
    </ul>
    <div class="user">
        <img class="usr_img" src="{{ asset('images/donar.png') }}" onclick="window.location.href='{{route('donar.index')}}'">
    </div>
</div> 

