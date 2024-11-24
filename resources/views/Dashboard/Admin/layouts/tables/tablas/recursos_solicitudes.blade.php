<div id="urlUpdateTableSoli" data-url="{{ route('tabla.actuSoli') }}"></div>
<table class="w-full bg-white rounded-[20px] shadow-md min-w-[600px]" id="tablaSolicituides">
    <thead>
        <tr class="bg-[#BBDEFB] text-center">
            <th class="p-[15px] ">Nombre del programa</th>
            <th class="p-[15px] ">Impartidor</th>
            <th class="p-[15px] ">Total de beneficiarios esperados</th>
            <th class="p-[15px] ">Recursos solicitados</th>
            <th class="p-[15px] ">Estado</th>
            <th class="p-[15px] ">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($soliRecursos as $soli)
            <tr class="border-b text-center">
                <td class="p-[15px] ">{{ $soli->nombre_programa }}</td>
                <td class="p-[15px] ">{{ $soli->voluntario->trabajador->user->name }}</td>
                <td class="p-[15px] ">{{ $soli->beneficiarios_estimados }}</td>
                <td class="p-[15px] ">${{ $soli->presupuesto->monto }}</td>
                <td class="p-[15px] ">
                    @if (!$soli->presupuesto->aprobacionPresupuestos->isEmpty())
                        @foreach ($soli->presupuesto->aprobacionPresupuestos as $aprobacion)
                            @if ($aprobacion->si_no)
                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Aceptado</span>
                            @else
                                <span
                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Rechazado</span>
                            @endif
                        @endforeach
                    @else
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">En
                            espera</span>
                    @endif
                </td>
                <td class="p-[15px] flex justify-center space-x-4">
                    {{-- Botón de acción solo si no hay aprobación de presupuesto --}}

                    @if ($soli->presupuesto->aprobacionPresupuestos->isEmpty())
                        <x-button-accept :messageAlert="'¿Estás seguro que deseas aceptar la solicitud con el monto de: <b>$' .
                            $soli->presupuesto->monto .
                            '</b> del programa: ' .
                            $soli->nombre_programa .
                            '?'" :router="route('tabla.aceptarRecurso')"
                            :itemId="$soli->presupuesto->id" :tituloModal="'Confirmar Solicitud'" />
                        <x-button-trash :messageAlert="'¿Estás seguro de que deseas rechazar la solicitud con el monto de: <b>$' .
                            $soli->presupuesto->monto .
                            '</b> del programa: ' .
                            $soli->nombre_programa .
                            '?'" :router="route('tabla.rechazarRecurso')"
                            :itemId="$soli->presupuesto->id" :tituloModal="'Confirmar Eliminación'" />
                    @endif

                </td>
            </tr>
        @endforeach

    </tbody>

    
</table>
<div class="mt-2">
    {{ $soliRecursos->links() }}
</div>
