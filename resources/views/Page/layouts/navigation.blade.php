
<div class="navbar">
    <div class="logo">
            <img src="{{ asset('images/logo_n.png') }}" alt="Logo" onclick="window.location.href='{{route('conocenos.index')}}'">
        </a>
    </div>
    <ul class="links">
        <li><a class="{{ $linkActive == 1 ? 'active' : '' }}" href="{{route('conocenos.index')}}">CONÓCENOS</a></li>
        <li><a class="{{ $linkActive == 2 ? 'active' : '' }}" href="{{route('transparencia.index')}}">TRANSPARENCIA</a></li>
        <li><a class="{{ $linkActive == 3 ? 'active' : '' }}" href="{{route('nuestro-trabajo.index')}}">NUESTRO TRABAJO</a></li>
        <li><a class="{{ $linkActive == 4 ? 'active' : '' }}" href="{{route('colabora.index')}}">COLABORA</a></li>
    </ul>
    <div class="user {{ $linkActive == 5 ? '' : '' }}">
            <a href="{{route('donar.index')}}"><img class="usr_img" src="{{ asset('images/donar.png') }}" alt="Donar"></a>
    </div>
</div> 