<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        
        <div class="flex items-center justify-between space-x-7">
            <div class="flex items-center">
                <a href="#">
                    <h2 class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] hover:text-white p-2 rounded leading-tight {{ request()->routeIs('presupuesto') ? 'border-b-4 border-indigo-500' : '' }}">
                        {{ __('Solicitud de presupuesto') }}
                    </h2>
                </a>
                <a href="#">
                    <h2 class="font-semibold text-xl text-gray-800 hover:bg-[#2A334B] hover:text-white p-2 rounded leading-tight {{ request()->routeIs('programas') ? 'border-b-4 border-indigo-500' : '' }}">
                        {{ __('Programas') }}
                    </h2>
                </a>
            </div>
            <div class="">        
                <a href="{{ route('pdf.generar') }}">
                    <i class='bx bxs-file-pdf' style="transform: scale(2.5)"></i>
                </a> 
            </div>
        </div>
    </x-slot>


    <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl">Programas educativos</h1>
            <form action="{{ route('admin.programas') }}" method="GET" id="search-form" class="flex items-center">
                <div class="relative"> <!-- Eliminar el margen -->
                    <input type="text" name='search' placeholder="Buscar"
                        class="bg-gray-200 text-gray-700 rounded-full px-4 py-2 pl-10 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <i class='bx bx-search absolute left-2 top-1/2 transform -translate-y-1/2 text-gray-500'></i>
                </div>
            </form>
        </div>
        <div class="bg-[#232B47] p-5 rounded-[15px] mt-[20px]">
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-[#232B47]"> <!-- Mantener el fondo en el thead -->
                        <tr class="text-black">
                            <th class="bg-gray-100 rounded-tl-[15px] px-3 py-1 text-center">Nombre</th>
                            <th class="bg-gray-100 px-4 py-2 text-center ml-2">Impartidor</th>
                            <th class="bg-gray-100 px-4 py-2 text-center ml-2">Fecha Incio</th>
                            <th class="bg-gray-100 px-4 py-2 text-center ml-2">Fecha Termino</th>
                            <th class="bg-gray-100 px-4 py-2 text-center ml-2">Estado</th>
                            <th class="bg-gray-100 rounded-tr-[15px] px-4 py-2 text-center ml-2">Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="mt-5"> <!-- Agregar margen superior en tbody -->
                        @foreach ($programas as $programa)
                            <tr class="bg-[#4a607a] rounded-lg">
                                <td class="px-4 py-2 {{ $loop->last ? 'rounded-bl-lg' : '' }} text-white text-lg text-center">{{ $programa->nombre_programa }}
                                </td>
                                <td class="px-4 py-2 text-white text-lg text-center">{{ $programa->voluntario->trabajador->user->name }}</td>
                                <td class="px-4 py-2 text-white text-lg text-center">{{ \Carbon\Carbon::parse($programa->fecha_inicio)->format('d-m-Y') }}</td>
                                <td class="px-4 py-2 text-white text-lg text-center">{{ \Carbon\Carbon::parse($programa->fecha_termino)->format('d-m-Y') }}</td>
                                <td class="px-4 py-2 text-white text-lg text-center">{{ $programa->estado == 1 ? 'activo' : 'inactivo' }}</td>
                                <td class="py-3 px-4 {{ $loop->last ? 'rounded-br-lg' : ''}} text-center">
                                    <i class='bx bx-show text-xl cursor-pointe text-center'></i>
                                    <a href="pro2.html">
                                        <i class='bx bx-edit text-xl cursor-pointer ml-4'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Puedes agregar más filas aquí -->
                    </tbody>
                </table>
            </div>
            <div class="mt-2">
                {{ $programas->links() }}
            </div>
           
        </div>
        
        <div class="fixed bottom-5 right-5 z-100">
            <a href="{{ route('admin.chat') }}">
                <button
                    class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                    <i class='bx bx-message-square-dots text-2xl'></i>
                </button>
            </a>
        </div>
    </div>

    
    
</div>
    </div>

    <x-support-widget :roles="['Coordinador']" />
    
</x-app-layout>
