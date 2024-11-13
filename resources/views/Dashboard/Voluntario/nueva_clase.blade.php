<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-7 items-center">
            <div class="w-full md:w-48 p-2 rounded {{ $seccion == 1 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['rol' => 'Administrador', 'seccion' => 1]) }}">
                    <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Nueva Solicitud') }}
                    </h2>
                </a>
            </div>
            
            <div class="w-full md:w-48 p-2 rounded {{ $seccion == 2 ? 'bg-gray-100' : 'bg-white' }} hover:text-black flex justify-center items-center">
                <a href="{{ route('admin.usuarios', ['tipo' => 'Solicitudes', 'seccion' => 2]) }}">
                    <h2 class="font-semibold text-lg md:text-xl text-gray-800 leading-tight text-center transition-transform duration-200 hover:scale-110">
                        {{ __('Mis Solicitudes') }}
                    </h2>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] md:p-[40px] shadow-lg rounded-[30px] flex flex-col gap-5 md:gap-10">
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden text-center">
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
                        <td class="px-3 py-4">1</td>
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
        </div>
    </div>
</x-app-layout>
