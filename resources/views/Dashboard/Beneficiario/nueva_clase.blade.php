<!--solicitudes-->

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
        <table class="w-full bg-white shadow-md rounded-lg overflow-x-auto text-center">
            <thead class="bg-[#BBDEFB] text-black font-semibold">
                <tr>
                    <th class="px-3 py-4">Id</th>
                    <th class="px-6 py-4">Nombre</th>
                    <th class="px-6 py-4">Fecha envío</th>
                    <th class="px-6 py-4">Estado</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr class="border-b hover:bg-blue-50">
                    <td class="px-3 py-4 text">1</td>
                    <td class="px-6 py-4">Aprendiendo divertido</td>
                    <td class="px-6 py-4">2024-10-15</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Aceptado</span>
                    </td>
                </tr>
                <tr class="border-b hover:bg-blue-50">
                    <td class="px-3 py-4">2</td>
                    <td class="px-6 py-4">Follando</td>
                    <td class="px-6 py-4">2024-10-20</td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">En espera</span>
                    </td>
                </tr>
                <tr class="hover:bg-blue-50">
                    <td class="px-3 py-4">3</td>
                    <td class="px-6 py-4">Código al aire libre</td>
                    <td class="px-6 py-4">2024-10-25</td>
                    <td class="px-6 py-4">
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Rechazado</span>
                    </td>
                </tr>
            </tbody>
        </table>   
        
        <div class="fixed bottom-5 right-5 z-100">
            <a href="{{ route('ben.chat') }}">
                <button
                    class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                    <i class='bx bx-message-square-dots text-2xl'></i>
                </button>
            </a>
        </div>
    
    </div>
</x-app-layout>