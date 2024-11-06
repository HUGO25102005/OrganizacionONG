@extends('Page.layouts.app')
@section('importaciones')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/colabora.css'])
@endsection
@section('content')
    <section class="info" id="colabora">
        <h1><b>Se parte de nuestro equipo</b></h1>
        <img src="{{ asset('images/amigos.png') }}" alt="">
    </section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <section class="experience">
        <div class="content">
            <h1>Se parte de esta experiencia</h1>
            <p>Toma cursos de tu interés de forma gratuita</p>
            <!-- Botón para abrir el modal -->
            <button class="experience-donate" onclick="openModal()">
                <img src="{{ asset('images/unirme.png') }}" alt="Unirme" class="donate-img">
            </button>
        </div>
        <div class="image">
            <img src="{{ asset('images/estudiante.png') }}" alt="Persona con laptop">
        </div>
    </section>

    <section class="third-section">
        <!-- Imagen de unirse -->
        <div class="third-section-image">
            <img src="{{ asset('images/voluntario.png') }}" alt="Persona con laptop">
        </div>
        <!-- Contenido y botón para unirse -->
        <div class="third-section-content">
            <h1>Se parte de nuestro soporte de docentes</h1>
            <p>Toma cursos de tu interés de forma gratuita</p>
            <button class="experience-donate" onclick="openVolunteerModal()">
                <img src="{{ asset('images/unirme.png') }}" alt="Unirme" class="donate-img">
            </button>
        </div>
    </section>

    <section class="experience">
        <div class="content">
            <h1>Se parte de nuestro soporte de coordinación</h1>
            <p>Toma cursos de tu interés de forma gratuita</p>
            <!-- Botón para abrir el modal -->
            <button class="experience-donate" onclick="openCoordinatorModal()">
                <img src="{{ asset('images/unirme.png') }}" alt="Unirme" class="donate-img">
            </button>

        </div>
        <div class="image">
            <img src="{{ asset('images/coordinador.png') }}" alt="Persona con laptop">
        </div>
    </section>

    <!-- Modal para beneficiarios -->
    <div id="myModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-blue-50 rounded-lg p-6 w-full max-w-lg shadow-xl" style="width: 800px; height: 720px;">
            <h2 class="text-xl font-bold mb-4 text-[#3B3636]">Solicitud a beneficiario</h2>
            <!-- Formulario de entrada similar a la imagen -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Campo de entrada con ícono interno -->
                <div class="relative mb-4">
                    <i class='bx bx-user absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Nombre completo"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-buildings absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Municipio"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-calendar absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="date" placeholder="Fecha de nacimiento"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs placeholder:text-[#3B3636]">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-home absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Colonia"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-male-female absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Género"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-book absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Nivel educativo"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-id-card absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="CURP"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-briefcase absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Ocupación"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-heart absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Estado civil"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-dollar absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Ingresos mensuales"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-envelope absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="email" placeholder="Correo electrónico"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-group absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="number" placeholder="Cantidad de personas dependientes"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-phone-call absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="tel" placeholder="Teléfono"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-phone-call absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="tel" placeholder="Contacto de emergencia"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-group absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="País"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-link absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Relación con el contacto"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-map absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Estado"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <div class="relative mb-4">
                    <i class='bx bx-user absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Nombre de contacto de emergencia"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>

            </div>
            <!-- Botones de acción -->
            <div class="flex justify-end mt-6">
                <button class="bg-blue-100 text-black px-4 py-2 rounded-full mr-2 shadow-inner"
                    onclick="closeModal()">Cancelar</button>
                <button class="bg-[#063663] text-white px-4 py-2 rounded-full shadow-md">Enviar Solicitud</button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('myModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('myModal').classList.add('hidden');
        }
    </script>



    <!-- Modal para voluntario -->
    <!-- Modal para voluntario -->
    <div id="volunteerModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 z-50 bg-opacity-50 hidden">
        <form action="{{ route('vol.store') }}" method="POST" class="bg-white rounded-lg p-8 w-full max-w-4xl shadow-xl overflow-y-auto" style="max-height: 90vh;">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Solicitud a Voluntariado</h2>
            
            <!-- Formulario de entrada -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nombre completo -->
                <div class="mb-4">
                    <input type="text" name="name" placeholder="Nombre" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <div class="mb-4">
                    <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <div class="mb-4">
                    <input type="text" name="apellido_materno" placeholder="Apellido Materno" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Fecha de nacimiento -->
                <div class="mb-4">
                    <input type="date" name="fecha_nacimiento" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Correo electrónico -->
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Correo electrónico" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Días disponibles -->
                <div class="mb-4">
                    <input type="text" name="dias_disponibles" placeholder="Días disponibles" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Género -->
                <div class="mb-4">
                    <input type="text" name="genero" placeholder="Género" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Teléfono -->
                <div class="mb-4">
                    <input type="tel" name="telefono" placeholder="Teléfono" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Dirección -->
                <div class="mb-4">
                    <input type="text" name="direccion" placeholder="Dirección" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- País -->
                <div class="mb-4">
                    <input type="text" name="pais" placeholder="País" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Estado -->
                <div class="mb-4">
                    <input type="text" name="estado" placeholder="Estado" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Municipio -->
                <div class="mb-4">
                    <input type="text" name="municipio" placeholder="Municipio" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- CP -->
                <div class="mb-4">
                    <input type="number" name="cp" placeholder="Código Postal" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Preferencia de colaboración -->
                <div class="mb-4">
                    <input type="text" name="preferencia_colaboracion" placeholder="Preferencia de colaboración" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Experiencia previa -->
                <div class="mb-4">
                    <input type="text" name="experiencia_previa" placeholder="Experiencia previa" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Horario preferible -->
                <div class="mb-4">
                    <input type="text" name="horario_preferible" placeholder="Horario preferible" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Habilidades y conocimientos -->
                <div class="mb-4">
                    <input type="text" name="habilidades_conocimientos" placeholder="Habilidades y conocimientos" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
    
                <!-- Área de interés -->
                <div class="mb-4">
                    <input type="" name="area_interes" placeholder="Área de interés" class="w-full form-control py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 placeholder:text-gray-400">
                </div>
                
                <div class="mb-4">
                    <label for="fecha_inicio" class="block text-gray-700 font-bold mb-2">Fecha de inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                
                <div class="mb-4">
                    <label for="fecha_termino" class="block text-gray-700 font-bold mb-2">Fecha de término</label>
                    <input type="date" id="fecha_termino" name="fecha_termino" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                
                <div class="mb-4">
                    <label for="hrs_dedicadas_semana" class="block text-gray-700 font-bold mb-2">Horas dedicadas por semana</label>
                    <input type="number" id="hrs_dedicadas_semana" name="hrs_dedicadas_semana" min="1" max="40" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
            </div>
    
            <!-- Botones -->
            <div class="flex justify-between mt-6">
                <button type="submit" class="bg-blue-600 text-white rounded-lg px-6 py-2 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500">Enviar</button>
                <button type="button" onclick="closeModal()" class="text-red-600 hover:underline">Cancelar</button>
            </div>
        </form>
    </div>



    <!-- Scripts para abrir y cerrar el modal -->
    <script>
        function openModal() {
            document.getElementById("myModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("myModal").classList.add("hidden");
        }

        function openVolunteerModal() {
            document.getElementById("volunteerModal").classList.remove("hidden");
        }

        function closeVolunteerModal() {
            document.getElementById("volunteerModal").classList.add("hidden");
        }
    </script>


    <!-- Modal para Coordinador -->
    <div id="coordinatorModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-lg shadow-xl" style="width: 900px; height: 700px;">
            <h2 class="text-xl font-bold mb-4 text-[#3B3636]">Solicitud a Coordinador</h2>
            <!-- Formulario de entrada -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Nombre completo -->
                <div class="relative mb-4">
                    <i class='bx bx-user absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Nombre completo"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Habilidades clave -->
                <div class="relative mb-4">
                    <i class='bx bx-brain absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Habilidades clave"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Fecha de nacimiento -->
                <div class="relative mb-4">
                    <i class='bx bx-calendar absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="date" placeholder="Fecha de nacimiento"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs placeholder:text-[#3B3636]">
                </div>
                <!-- Idiomas -->
                <div class="relative mb-4">
                    <i class='bx bx-globe absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Idiomas"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Género -->
                <div class="relative mb-4">
                    <i class='bx bx-male-female absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Género"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Función clave -->
                <div class="relative mb-4">
                    <i class='bx bx-briefcase-alt absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Función clave"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Domicilio -->
                <div class="relative mb-4">
                    <i class='bx bx-home absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Domicilio"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Área de supervisión -->
                <div class="relative mb-4">
                    <i class='bx bx-map-pin absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Área de supervisión"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Teléfono -->
                <div class="relative mb-4">
                    <i class='bx bx-phone absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="tel" placeholder="Teléfono"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Capacidad de manejo de equipos -->
                <div class="relative mb-4">
                    <i class='bx bx-group absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Capacidad de manejo de equipos"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Correo electrónico -->
                <div class="relative mb-4">
                    <i class='bx bx-envelope absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="email" placeholder="Correo electrónico"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Conocimiento de herramientas -->
                <div class="relative mb-4">
                    <i class='bx bx-wrench absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Conocimiento de herramientas"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Especialización en cursos -->
                <div class="relative mb-4">
                    <i class='bx bx-book-open absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Especialización en cursos"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Disponibilidad de horario -->
                <div class="relative mb-4">
                    <i class='bx bx-time-five absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Disponibilidad de horario"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Experiencia laboral -->
                <div class="relative mb-4">
                    <i class='bx bx-history absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Experiencia laboral"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Disponibilidad de viajes -->
                <div class="relative mb-4">
                    <i class='bx bx-plane absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Disponibilidad de viajes"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
                <!-- Experiencia en sector educativo -->
                <div class="relative mb-4">
                    <i class='bx bx-book-reader absolute left-2 top-2.5 text-[#3B3636]'></i>
                    <input type="text" placeholder="Experiencia en sector educativo"
                        class="pl-4 py-2 bg-[#E6ECF8] rounded-full w-full drop-shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-[#3B3636] text-xs">
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button onclick="closeCoordinatorModal()"
                    class="bg-blue-100 text-black px-4 py-2 rounded-full mr-2 shadow-inner">Cerrar</button>
                <button class="bg-[#063663] text-white px-4 py-2 rounded-full shadow-md">Enviar Solicitud</button>
            </div>
        </div>
    </div>

    <script>
        // Función para abrir el modal de coordinador
        function openCoordinatorModal() {
            document.getElementById('coordinatorModal').classList.remove('hidden');
        }

        // Función para cerrar el modal de coordinador
        function closeCoordinatorModal() {
            document.getElementById('coordinatorModal').classList.add('hidden');
        }
    </script>
@endsection
