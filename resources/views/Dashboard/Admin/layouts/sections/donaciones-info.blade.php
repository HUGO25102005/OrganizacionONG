<div class="relative bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-[20px]">
        <h2 class="text-2xl font-semibold">Donaciones</h2>
        {{-- <button class="bg-blue-500 text-white px-[20px] py-[10px] rounded-lg hover:bg-blue-600">
            Crear Nueva Campaña
        </button> --}}
    </div>

    <!-- Contenedor Grid para organizar los rectángulos -->
    <div class="grid grid-cols-3 gap-6 p-4">
        
    <!-- Contenedor Grid para organizar los rectángulos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
        <!-- Rectángulos según el diseño -->
        <div class="bg-white h-[150px] rounded-lg shadow-md p-4">
            <div class="h-full w-full rounded-lg flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Total disponible:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $monto_disponible }}</p>
                    <p>Monto total: ${{ $monto_total_donaciones }}</p>
                </div>
                <div>
                    <i class='bx bx-wallet text-4xl text-[#4CAF50]'></i>
                </div>
            </div>
        </div>


    
        <div class="bg-white h-[150px] rounded-lg shadow-md p-4">
            <div class="h-full w-full rounded-lg flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Dinero usado:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $monto_usado }}</p>
                </div>
                <div>
                    <i class='bx bxs-wallet-alt text-4xl text-[#FF9800]'></i>
                </div>
            </div>
        </div>


        <!-- Cuadrado grande -->
        <div class="bg-white h-[340px] rounded-lg shadow-md row-span-2 p-4">
            <div class="h-full w-full rounded-lg p-4">
                <h3 class="text-gray-700 text-xl font-semibold text-center mb-4">Top Donadores <i
                        class='bx bxs-crown text-[#FFC107]'></i> </h3>
                <div class="flex justify-between font-semibold mb-2 text-black">
                    <span>Nombre</span>
                    <span>Monto</span>
                </div>
                <ul class="space-y-2">
                    @foreach ($topDonadantes as $donacion)
                        <li class="flex justify-between items-center">
                            <span class="text-gray-800">{{$donacion->donante->getFullName()}}</span>
                            <span class="text-gray-600 font-bold">${{$donacion->total_donado}}</span>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>


        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="bg-white h-full w-full rounded-lg flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Dinero recaudado la última semana:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $total_donaciones_semana }}</p>
                </div>
                <div>
                    <i class='bx bx-credit-card text-4xl text-[#FFC107]'></i>
                </div>
            </div>
        </div>


        <div class="bg-white h-[150px] rounded-lg shadow-md p-4">
            <div class="h-full w-full rounded-lg flex justify-between items-center p-4">
                <div>
                    <p class="text-gray-700 text-lg font-semibold">Dinero recaudado el último mes:</p>
                    <p class="text-gray-900 text-2xl font-bold">${{ $total_donaciones_mes }}</p>
                </div>
                <div>
                    <i class='bx bxs-bank text-4xl text-[#2196F3]'></i>
                </div>
            </div>
        </div>

        <div class="h-full w-full rounded-lg">
            <div class="bg-white w-[1380px] h-[290px] p-[20px] rounded-[15px] mt-[20px]">
                <!-- Título de la tabla -->
                <div class="bg-[#BBDEFB] text-center text-[20px] rounded-[15px] text-black w-full h-[35px] mx-auto">
                    <p>Últimas donaciones</p>
                </div>

                <!-- Tabla de donaciones -->
                <div class="mt-6 text-[#D9D9D9]">
                    <table class="w-full text-center"> <!-- Alinea el texto al centro -->
                        <thead class="bg-[#BBDEFB] rounded-[15px] text-black">
                            <tr>
                                <th class="py-2 px-4 w-1/5">Nombre</th>
                                <th class="py-2 px-4 w-1/5">Correo Electrónico</th>
                                <th class="py-2 px-4 w-1/5">País</th>
                                <th class="py-2 px-4 w-1/5">Fecha Registro</th>
                                <th class="py-2 px-4 w-1/5">Monto</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            @foreach ($total_donaciones as $donacion)
                                <tr class="border-b border-gray-600">
                                    <td class="py-2 px-4">{{ $donacion->donante->getFullName() }}</td>
                                    <td class="py-2 px-4">{{ $donacion->donante->email }}</td>
                                    <td class="py-2 px-4">{{ $donacion->donante->country_code }}</td>
                                    <td class="py-2 px-4">
                                        {{ \Carbon\Carbon::parse($donacion->created_at)->format('d-m-Y') }}</td>
                                    <td class="py-2 px-4">${{ $donacion->monto }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{ $total_donaciones->links() }}