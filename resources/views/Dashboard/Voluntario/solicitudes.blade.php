<!--Nueva clase-->

<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex space-x-7 items-center">
            <div class="w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['rol' => 'Administrador', 'seccion' => 1]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Nueva Solicitud') }}
                    </h2>
                </a>
            </div>
            
            <div class="w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Mis Solicitudes') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[40px] shadow-lg rounded-[30px] flex gap-10">
    
        <!-- Sección Izquierda: Formulario -->
        <div class="w-1/2 bg-white p-[30px] shadow-md rounded-[20px]">
            <h2 class="text-2xl font-semibold mb-[20px] text-gray-800">Nueva clase</h2>
            
            <!-- Formulario -->
            <form class="space-y-[20px]">
                <!-- Nombre del Programa -->
                <div>
                    <label for="nombrePrograma" class="block text-sm font-medium text-gray-600 mb-[5px]">Nombre de la clase</label>
                    <input type="text" id="nombrePrograma" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Ingresa el nombre del clase">
                </div>
                
                <!-- Descripción -->
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-600 mb-[5px]">Descripción</label>
                    <textarea id="descripcion" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Descripción del clase" rows="4"></textarea>
                </div>
                
                <!-- Presupuesto -->
                <div>
                    <label for="presupuesto" class="block text-sm font-medium text-gray-600 mb-[5px]">Presupuesto</label>
                    <input type="number" id="presupuesto" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Presupuesto en MXN">
                </div>
                
                <!-- Botón de Enviar -->
                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold p-[15px] rounded-lg hover:from-blue-600 hover:to-indigo-600 transition ease-in-out duration-200">
                    Enviar solicitud
                </button>
            </form>
        </div>
    
    </div>
    
    
</x-app-layout>