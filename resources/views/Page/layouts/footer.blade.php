<footer class="bg-[#232323] h-[30vh] relative flex flex-col items-center justify-center">
    <div class="relative h-full w-full max-w-6xl flex flex-col items-center justify-between p-4">
        <!-- Logo e imagen -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo_n.png') }}" alt="Logo" class="h-[60px] cursor-pointer"
                onclick="window.location.href='{{ route('conocenos.index') }}'">
            <h2 class="text-[40px] font-light text-[#b2ebf9]">InspireUp</h2>
        </div>

        <!-- Separador -->
        <div class="w-full h-[1px] bg-[#e3e3e4] my-4"></div>

        <!-- Links -->
        <nav class="flex space-x-8">
            <a href="{{ route('conocenos.index') }}"
                class="text-[13px] text-[#9a9a9a] font-light hover:text-white transition-colors duration-300">Inicio</a>
            <a href="{{ route('nuestro-trabajo.index') }}"
                class="text-[13px] text-[#9a9a9a] font-light hover:text-white transition-colors duration-300">Experiencias</a>
            <a href="{{ route('colabora.index') }}"
                class="text-[13px] text-[#9a9a9a] font-light hover:text-white transition-colors duration-300">Únete</a>
        </nav>

        <!-- Botón "Iniciar Sesión" con efecto neumorphism -->
        <button
            class="mt-4 w-[150px] h-[40px] bg-[#232323] text-white rounded-lg shadow-[4px_4px_8px_#1a1a1a,-4px_-4px_8px_#2e2e2e] hover:shadow-[inset_4px_4px_8px_#1a1a1a,inset_-4px_-4px_8px_#2e2e2e] transition-shadow duration-300">
            Iniciar Sesión
        </button>

        <!-- Texto -->
        <p class="text-[#9a9a9a] text-[11px] font-light text-center mt-4">
            &copy; 2024 InspireUp - All Rights Reserved
        </p>
    </div>
</footer>

