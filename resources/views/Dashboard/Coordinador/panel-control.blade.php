<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 rounded inline-block px-4 py-2">
            {{ __('Panel de Control') }}
        </h2>

    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-6xl m-12 mx-auto h-auto  px-12 shadow-lg rounded-[30px]">
    
        <!-- Contenedor principal para alinear los elementos horizontalmente -->
        <div class="flex flex-wrap gap-8 mt-8 mb-4 items-start">
            
            <!-- Gráfico de Campañas Activas -->
{{--             <div class="bg-white w-1/2 shadow-md p-6 rounded-lg" style="height: 320px;">
                <h3 class="text-lg font-bold mb-4">Gráfico de Programas Educativos</h3>
                <div style="max-width: 700px; max-height: 400px;">
                    <canvas id="programasChart"></canvas> --}}


            <div class="bg-white w-full lg:w-1/2 shadow-md p-6 rounded-lg h-[320px]">
                <h3 class="text-center font-bold mb-4">Gráfico del estatus de Programas Educativos</h3>
                <div class="max-w-[700px] max-h-[400px]">
                    <canvas id="programasChart"></canvas>
                </div>
            </div>
    
            <!-- Programas y Beneficiarios Activos -->
            <div class="grid gap-8 w-full lg:w-[230px] mb-8 cuadros">
                <!-- Programas -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-detail text-blue-400 text-4xl'></i>
                        <a href="{{ route('coordinador.programas', ['seccion' => 1]) }}">
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-blue-400">{{ $total_PA }}</p>
                    <h3 class="text-lg font-bold mb-2">PROGRAMAS</h3> 
                </div>
    
                <!-- Beneficiarios Activos -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-user text-green-500 text-4xl'></i>
                        <a href="{{ route('coordinador.beneficiarios', ['rol' => 'Coordinador', 'seccion' => 1]) }}">
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    
{{--                     <p class="text-3xl font-bold mt-4 text-green-500">{{ $total_BA }}</p>
                    <h3 class="text-lg font-bold mb-2">BENEFICIARIOS ACTIVOS</h3>  --}}
                    <p class="text-3xl font-bold mt-4 text-green-500">{{ $total_BA }}</p>
                    <h3 class="text-lg font-bold mb-2">BENEFICIARIOS</h3>
                </div>
            </div>
    
            <!-- Programas y Beneficiarios Pendientes -->
            <div class="grid gap-8 w-full lg:w-[230px] mb-8 c">
                <!-- Programas Pendientes -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-detail text-blue-400 text-4xl'></i>
                        <a href="{{ route('coordinador.programas', ['seccion' => 2]) }}">
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-blue-400 text-blue-400 hover:bg-blue-400 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-blue-400">{{ $solicitudes_P }}</p>
                    <h3 class="text-lg font-bold mb-2">SOLICITUDES</h3> 
                </div>
    
                <!-- Beneficiarios Pendientes -->
                <div class="bg-white shadow-md p-2 px-6 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class='bx bx-user text-green-500 text-4xl'></i>
                        <a href="{{ route('coordinador.beneficiarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">                 
                            <button class="flex items-center justify-center w-8 h-8 border-4 border-green-500 text-green-500 hover:bg-green-500 hover:text-white rounded-full text-lg font-bold">
                                <i class='bx bx-right-arrow-alt'></i>
                            </button>
                        </a>
                    </div>
                    <p class="text-3xl font-bold mt-4 text-green-500">{{ $total_BSO }}</p>
                    <h3 class="text-lg font-bold mb-2">SOLICITUDES</h3> 
                </div>
            </div>
    
        </div>
    
        <!-- Fila intermedia: Últimas Donaciones y Campañas Activas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            
            <!-- Tabla de Beneficiarios Activos -->
            <div class="bg-white shadow-md w-full p-6 rounded-lg h-[250px] overflow-y-auto">
                <h3 class="text-lg font-bold mb-4 flex justify-center bg-[#BBDEFB] rounded-lg">Beneficiarios Activos</h3>
                <table class="w-full">
                    <thead class="bg-[#BBDEFB]">
                        <tr>
                            <th class="text-center rounded-l-lg">Nombre</th>
                            <th class="text-center rounded-r-lg">Estatus</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($beneficiarios as $beneficiario)
                            <tr>
                                <td class="text-center">{{ $beneficiario->user->getFullName() }}</td>
                                <td class="text-center">{{ $beneficiario->getEstadoDescripcion() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <!-- Segundo gráfico al lado de la tabla -->
{{--             <div class="bg-white shadow-md ml-8 p-6 rounded-lg" style="height: 250px; width: 640px">
                <h3 class="text-lg font-bold mb-4">Gráfico de Beneficiarios</h3>
                <div style="max-width: 600px; max-height: 400px;">
                    <canvas id="beneficiariosChart"></canvas> --}}

            <div class="bg-white shadow-md p-6 rounded-lg h-[250px]">
                <h3 class="text-center font-bold mb-4">Gráfico del estatus de Beneficiarios</h3>
                <div class="max-w-[700px] max-h-[400px]">
                    <canvas id="beneficiariosChart"></canvas>
                </div>
            </div>
    
        </div>

<!-- Botón flotante de soporte -->
<div class="fixed bottom-5 right-5 z-50">
    <button onclick="toggleSupport()" class="bg-slate-700 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-slate-600 flex items-center justify-center">
        <i class='bx bx-message-square-dots text-2xl'></i>
    </button>
</div>

<!-- Contenedor del widget de soporte -->
<div id="supportWidget" class="fixed bottom-16 right-5 w-96 h-[600px] bg-white p-5 rounded-lg shadow-lg hidden flex flex-col space-y-3 z-50">
    <!-- Encabezado del widget con botón de cierre y reset -->
    <div class="flex justify-between items-center border-b pb-2">
        <h2 class="text-lg font-semibold text-blue-500">InspireUp - Soporte</h2>
        <div class="flex items-center space-x-2">
            <!-- Botón de reinicio del chat -->
            <button onclick="resetChat()" class="text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-rotate-right text-xl"></i>
            </button>
            <!-- Botón de cierre -->
            <button onclick="toggleSupport()" class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
    </div>

    <div class="flex-1 overflow-y-auto space-y-4 max-h-[450px] p-2">
        <!-- Mensaje de bienvenida del soporte -->
        <div class="bg-gray-100 p-2 items-center justify-items rounded-full shadow max-w-xs">
            <p class="text-sm text-gray-700">¡Hola! ¿En qué podemos ayudarte?</p>
        </div>
        <!-- Espacio para los mensajes -->
        <div id="chatContainer" class="space-y-4"></div>
    </div>

    <!-- Formulario para enviar el mensaje -->
    <form id="supportForm" onsubmit="sendMessage(event)" class="flex items-center space-x-2 pt-2 border-t">
        <textarea name="message" id="userMessage" placeholder="Escribe tu mensaje..." class="w-full p-3 border rounded-full focus:outline-none focus:border-blue-500 resize-none" rows="1"></textarea>
        <button type="submit" class="bg-blue-500 text-white h-10 w-10 rounded-full hover:bg-blue-600 flex items-center justify-center">
            <i class="fa-solid fa-check text-xl"></i> <!-- Icono de check para enviar -->
        </button>
    </form>
</div>

<script>
    function toggleSupport() {
        var widget = document.getElementById('supportWidget');
        widget.classList.toggle('hidden');
    }

    function resetChat() {
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.innerHTML = '';
        // Mensaje inicial de bienvenida tras el reset
        const welcomeMessage = document.createElement('div');
        welcomeMessage.classList.add('bg-gray-100', 'p-3', 'rounded-lg', 'shadow', 'max-w-xs');
        welcomeMessage.innerHTML = '<p class="text-sm text-gray-700">¡Hola! ¿En qué podemos ayudarte?</p>';
        chatContainer.appendChild(welcomeMessage);
    }

    function sendMessage(event) {
        event.preventDefault();
        const chatContainer = document.getElementById('chatContainer');
        const userMessage = document.getElementById('userMessage').value;

        // Crear la burbuja del mensaje del usuario
        if (userMessage.trim() !== "") {
            const messageBubble = document.createElement('div');
            messageBubble.classList.add('bg-blue-500', 'text-white', 'p-2', 'rounded-full', 'shadow', 'self-end', 'max-w-xs');
            messageBubble.innerHTML = `<p class="text-sm">${userMessage}</p>`;

            // Agregar el mensaje al contenedor del chat
            chatContainer.appendChild(messageBubble);

            // Limpiar el campo de texto y desplazar al último mensaje
            document.getElementById('userMessage').value = '';
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    }
</script>



    
    </div>
    
    
    <!-- Script para las gráficas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Gráfico de programas
        const ctx = document.getElementById('programasChart').getContext('2d');
        const programasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Solicitud', 'En Revision', 'Aprovado', 'Activo', 'Terminado', 'Cancelado'],
                datasets: [{
                    label: ' Cantidad de Programas',
                    data: [ {{ $total_PS }}, {{ $total_PR }}, {{ $total_PAP }}, {{ $total_PA }}, {{ $total_PT }}, {{ $total_PC }}],
                    backgroundColor: ['#4CAF50'],
                    borderColor: ['#596475'],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    
        // Gráfico de beneficiarios
        const ctxIncome = document.getElementById('beneficiariosChart').getContext('2d');
        const beneficiariosChart = new Chart(ctxIncome, {
            type: 'bar',
            data: {
                labels: ['Activo', 'Inactivo', 'Solicitado', 'Cancelado'],
                datasets: [{
                    label: ' Cantidad de Beneficiarios',
                    data: [ {{ $total_BA }}, {{ $total_BI }}, {{ $total_BSO }}, {{ $total_BSU }} ],
                    backgroundColor: ['#1E96FC'],
                    borderColor: ['#596475'],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>