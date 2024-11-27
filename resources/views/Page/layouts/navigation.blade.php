<style>
    /* Estilos adicionales */
    .hamburger .line {
        transition: all 0.3s ease;
    }

    .hamburger.open .line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger.open .line:nth-child(2) {
        opacity: 0;
    }

    .hamburger.open .line:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }


       /* Efecto Neumorphism */
       .neumorphism {
            box-shadow: 8px 8px 16px #19163b, -8px -8px 16px #343259;
            transition: all 0.3s ease-in-out;
        }

        .neumorphism-inset:hover {
            box-shadow: inset 4px 4px 8px #1a1a1a, inset -4px -4px 8px #2e2e2e;
            transform: scale(0.98);
        }
</style>
<!-- Navbar -->
<div
class="navbar fixed top-0 left-0 w-full z-50 flex items-center justify-between px-6 py-3 rounded-b-2xl">
<!-- Logo -->
<div class="logo flex items-center">
    <img src="{{ asset('images/logo_n.png') }}" alt="Logo"
        class="h-16 w-16 cursor-pointer neumorphism-inset"
        onclick="window.location.href='{{ route('conocenos.index') }}'">
</div>

<!-- Botón Hamburguesa -->
<button id="menu-toggle"
    class="hamburger lg:hidden flex items-center justify-center w-10 h-10 bg-[#232323] rounded-full neumorphism text-white">
    <i class='bx bx-menu text-2xl'></i>
</button>

<!-- Links (Notch) -->
<ul
    class="hidden lg:flex items-center gap-6 bg-[#222f48] rounded-[2.5rem] px-8 py-3 ">
    <li class="px-4 py-2 rounded-full neumorphism neumorphism-inset {{ $linkActive == 1 ? 'border-2 border-blue-100' : '' }}">
        <a class="text-white hover:text-blue-100 transition"
            href="{{ route('conocenos.index') }}">CONÓCENOS</a>
    </li>
    <li class="px-4 py-2 rounded-full neumorphism neumorphism-inset {{ $linkActive == 3 ? 'border-2 border-blue-100' : '' }}">
        <a class="text-white hover:text-blue-100 transition"
            href="{{ route('nuestro-trabajo.index') }}">NUESTRO TRABAJO</a>
    </li>
    <li class="px-4 py-2 rounded-full neumorphism neumorphism-inset {{ $linkActive == 4 ? 'border-2 border-blue-100' : '' }}">
        <a class="text-white hover:text-blue-100 transition"
            href="{{ route('colabora.index') }}">COLABORA</a>
    </li>
</ul>

<!-- Donar -->
<div class="hidden lg:flex items-center">
    <a href="{{ route('donar.index') }}">
        <img src="{{ asset('images/donar.png') }}" alt="Donar"
            class="h-16 w-auto hover:scale-105 transition-transform ">
    </a>
</div>

<!-- Menú desplegable para móviles -->
<ul id="mobile-menu"
    class="hidden absolute top-[70px] left-0 w-full bg-[#222f48] rounded-b-2xl neumorphism flex-col items-center gap-4 px-6 py-4">
    <li class="px-4 py-2 rounded-full ">
        <a class="text-white hover:text-blue-300 transition" href="{{ route('conocenos.index') }}">CONÓCENOS</a>
    </li>
    <li class="px-4 py-2 rounded-full">
        <a class="text-white hover:text-blue-300 transition" href="{{ route('transparencia.index') }}">TRANSPARENCIA</a>
    </li>
    <li class="px-4 py-2 rounded-full">
        <a class="text-white hover:text-blue-300 transition" href="{{ route('colabora.index') }}">COLABORA</a>
    </li>
    <li class="px-4 py-2 rounded-full">
        <a href="{{ route('donar.index') }}"><img src="{{ asset('images/donar.png') }}" alt="Donar"
                class="h-8 w-auto neumorphism-inset"></a>
    </li>
</ul>
</div>

<!-- Script para funcionalidad del menú -->
<script>
const menuToggle = document.getElementById("menu-toggle");
const mobileMenu = document.getElementById("mobile-menu");

menuToggle.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
    menuToggle.classList.toggle("open");
});
</script>