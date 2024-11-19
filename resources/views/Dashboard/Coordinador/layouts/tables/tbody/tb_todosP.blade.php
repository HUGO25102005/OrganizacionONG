@foreach($programassearch as $programa) 
    <tr class="border-b border-gray-300">
        <td class="py-3 px-4 text-center"> {{ $programa->nombre_programa }} </td>
        <td class="py-3 px-4 text-center"> {{ $programa->voluntario->trabajador->user->getFullName() }} </td>
        <td class="py-3 px-4 text-center"> {{ $programa->getTotalBeneficiarios() }} </td>
        <td class="py-3 px-4 text-center"> ${{ number_format($programa->presupuesto->monto) }} </td>
        <td class="py-3 px-4 text-center"> {{ $programa->getEstado() }} </td>
    {{--     <td class="py-3 px-4 text-center">Activo</td> --}}
        <td class="py-3 px-4 text-center">
            {{-- <span class="bg-blue-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-300">
                <i class='bx bx-show text-2xl text-gray-700 cursor-pointer' title="Visualizar"></i>
            </span>
            <span class="bg-blue-200 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-blue-600">
                <i class='bx bx-detail text-2xl text-blue-500 cursor-pointer' title="Aprobar"></i>
            </span>
            <span class="bg-red-100 w-10 h-10 p-1 rounded-full transition duration-300 ease-in-out hover:bg-red-300">
                <i class='bx bx-x-circle text-2xl text-red-500 cursor-pointer' title="Rechazar"></i>
            </span> --}}
        </td>                        
    </tr>
@endforeach 