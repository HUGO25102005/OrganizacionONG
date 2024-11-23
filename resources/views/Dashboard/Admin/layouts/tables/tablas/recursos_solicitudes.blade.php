<div id="urlUpdateTableSoli" data-url="{{route('tabla.actuSoli')}}"></div>
<table class="w-full bg-white rounded-[20px] shadow-md min-w-[600px]" id="tablaSolicituides">
    <thead>
        <tr class="bg-[#BBDEFB] text-center">
            <th class="p-[15px] ">Nombre del programa</th>
            <th class="p-[15px] ">Impartidor</th>
            <th class="p-[15px] ">Total de beneficiarios inscritos</th>
            <th class="p-[15px] ">Recursos solicitados</th>
            <th class="p-[15px] ">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($soliRecursos as $soli)
            <tr class="border-b text-center">
                <td class="p-[15px] ">{{$soli->nombre_programa}}</td>
                <td class="p-[15px] ">{{ $soli->voluntario->trabajador->user->name }}</td>
                <td class="p-[15px] ">{{ $soli->beneficiarios_estimados }}</td>
                <td class="p-[15px] ">${{ $soli->presupuesto->monto }}</td>
                <td class="p-[15px] flex justify-center space-x-4">
                    <span class="bg-green-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-green-300">
                        <i class='bx bx-check-circle text-2xl text-green-500 cursor-pointer' title="Aprobar"></i>
                    </span>
                    <span class="bg-red-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-red-300">
                        <i class='bx bx-x-circle text-2xl text-red-500 cursor-pointer' title="Rechazar"></i>
                    </span>
                    <span class="bg-blue-100 p-2 rounded-full transition duration-300 ease-in-out hover:bg-blue-300">
                        <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
