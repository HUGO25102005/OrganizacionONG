<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[40px] shadow-lg rounded-[30px] flex gap-10">
    <table class="w-full bg-white shadow-md rounded-lg overflow-x-auto text-center">
        <thead class="bg-[#BBDEFB] text-black font-semibold">
            <tr>
                <th class="px-3 py-4">Número</th>
                <th class="px-6 py-4">Nombre</th>
                <th class="px-6 py-4">Fecha envío</th>
                <th class="px-6 py-4">Información</th>
                <th class="px-6 py-4">Presupuesto</th>
                <th class="px-6 py-4">Estado</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($misSolicitudes as $soli)
                <tr class="hover:bg-blue-50">
                    <td class="px-3 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $soli->nombre_programa }}</td>
                    <td class="px-6 py-4">{{ $soli->created_at->format('d-m-y') }}</td>
                    <td class="px-6 py-4">

                        @if ($soli->aprobacionContenidos == null)
                            <span class="bg-yellow-100 text-black-700 px-3 py-1 rounded-full text-sm font-semibold">Solicitado</span>
                            @elseif ($soli->aprobacionContenidos->si_no == 1)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Aprobada</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Rechazada</span>
                        @endif



                    </td>
                    <td class="px-6 py-4">

                        @if ($soli->aprobacionPresupuestos == null)
                            <span
                                class="bg-yellow-100 text-black-700 px-3 py-1 rounded-full text-sm font-semibold">${{ $soli->presupuesto->monto }}</span>
                            @elseif ($soli->aprobacionPresupuestos->si_no == 1)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">${{ $soli->presupuesto->monto }}</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">${{ $soli->presupuesto->monto }}</span>
                        @endif


                    </td>
                    <td class="px-6 py-4">
                        @if ($soli->estado == 6)
                            <span
                                class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Rechazado</span>
                        @elseif ($soli->estado == 3)
                            <span
                                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">En aprobación</span>
                        @elseif ($soli->estado == 1)
                            @if ($soli->tiene_aprobacion_contenido == 0 || $soli->tiene_aprobacion_presupuesto == 0)
                                <span
                                    class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">En
                                    espera</span>
                            @else
                                <span
                                    class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Solicitado</span>
                            @endif
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="fixed bottom-5 right-5 z-100">
        <a href="{{ route('vol.chat') }}">
            <button
                class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                <i class='bx bx-message-square-dots text-2xl'></i>
            </button>
        </a>
    </div>
</div>

{{ $misSolicitudes->links() }}
