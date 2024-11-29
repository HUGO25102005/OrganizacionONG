<x-app-layout>
    <div class="alert alert-success">
        <x-alerts-component />
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight bg-gray-100 rounded inline-block px-4 py-2">
            {{ __('Planeación') }}
        </h2>
    </x-slot>

    <div class="bg-[#F6F8FF] w-full max-w-[95%] md:max-w-[1450px] h-auto my-6 p-4 md:p-8 shadow-lg rounded-2xl mx-auto">
        <div class="content w-full px-2 sm:px-4 lg:px-6">
            <div id="administradores" class="tab-content active">
                <a href="{{ route('coordinador.programas') }}" class="inline-block bg-blue-400 text-white py-2 px-4 rounded-full hover:bg-blue-500">
                    <i class='bx bx-left-arrow-alt'></i>
                </a>

                <!-- Título -->
                <h2 class="text-2xl text-center mt-4 font-bold mb-4">{{ $programa->nombre_programa }}</h2>
                <div class="overflow-x-auto">
                    <table class="admin-table w-full mt-6 bg-[#F6F8FF] rounded-lg">
                        <thead class="bg-[#BBDEFB] text-black">
                            <tr>
                                <th class="py-3 px-2 md:px-4 rounded-l-lg">Número</th>
                                <th class="py-3 px-2 md:px-4">Nombre</th>
                                <th class="py-3 px-2 md:px-4">Fecha estimada de realización</th>
                                <th class="py-3 px-2 md:px-4">Descripción</th>
                                <th class="py-3 px-2 md:px-4 rounded-r-lg">Comentarios adicionales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programaData as $planeacion)
                                <tr class="border-b border-gray-300">
                                    <td class="py-3 px-4 text-center"> {{ $loop->iteration }} </td>
                                    <td class="py-3 px-4 text-center"> {{ $planeacion->nombre }} </td>
                                    <td class="py-3 px-4 text-center"> {{ \Carbon\Carbon::parse($planeacion->fecha_actividad)->format('d-m-Y') }} </td>
                                    <td class="py-3 px-4 text-center"> {{ $planeacion->descripcion_actividad }} </td>
                                    <td class="py-3 px-4 text-center"> {{ $planeacion->comentarios_adicionales }} </td>     
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
