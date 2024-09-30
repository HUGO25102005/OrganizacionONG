<body>
    <header>
        <nav class="navbar">
            <a href="#">Panel de Control</a>
            <a href="donaciones.html">Donaciones</a>
            <a href="programas.html">Programas</a>
            <a href="usuarios.html">Usuarios</a>
        </nav>
    </header>

    <main class="flex flex-col items-center">
        <div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[20px] shadow-lg rounded-[30px]">
            <div class="flex justify-start items-center gap-[30px] pb-[10px]">
                <h1 class="text-[32px]">Panel de control</h1>
                <div class="w-[1.5px] h-[50px] bg-black"></div>
                <h1 class="text-[24px]">Buen día, Ernesto!</h1>
            </div>

            <!-- Cuadrado uno -->
            <div
                class="bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] w-full max-w-[650px] h-[110px] p-[20px] rounded-[15px]">
                <div
                    class="bg-[#D9D9D9] w-full max-w-[610px] h-[90px] p-[20px] rounded-[15px] mt-[-10px] flex items-center justify-between">
                    <p class="ml-[55px] mt-[-30px]">Monto total por donaciones:</p>
                    <i class='bx bx-money text-7xl'></i> <!-- Cambia el ícono según sea necesario -->
                </div>
            </div>

            <!-- Cuadrado dos -->
            <div
                class="bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] w-full max-w-[650px] h-[390px] p-[20px] rounded-[15px] mt-[20px]">
                <!-- Título de la tabla -->
                <div
                    class="bg-[#232B47] text-center text-[20px] rounded-[15px] text-[#D9D9D9] w-full max-w-[450px] h-[35px] mx-auto">
                    <p>Últimas donaciones</p>
                </div>

                <!-- Tabla de donaciones -->
                <div class="mt-6 text-[#D9D9D9]">
                    <table class="w-full text-left">
                        <thead class="bg-[#232B47] rounded-[15px]">
                            <tr>
                                <th class="py-2 px-4">Nombre</th>
                                <th class="py-2 px-4">País</th>
                                <th class="py-2 px-4">Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-600">
                                <td class="py-2 px-4">Karen Arispe</td>
                                <td class="py-2 px-4">México</td>
                                <td class="py-2 px-4">$1,200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Cuadrados -->
            <div class="flex justify-end items-center gap-[30px] pb-[10px]">
                <div onclick="window.location.href='#'"
                    class="relative w-full max-w-[620px] h-[120px] p-[20px] rounded-[24px] bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] mt-[20px] lg:absolute lg:top-[130px] lg:left-[1000px] cursor-pointer hover:scale-105 transition-transform duration-300"
                    id="cuadrado1">
                    <div
                        class="bg-[#E0E9FF] w-full h-[90px] rounded-[14px] mt-[-5px] flex items-center justify-between">
                        <p class="ml-[55px] text-[20px]">Programas educativos en curso:</p>
                        <i class='bx bx-book-open text-7xl ml-auto mr-[20px]'></i>
                    </div>
                </div>

                <div onclick="window.location.href='#'"
                    class="relative w-full max-w-[620px] h-[120px] p-[20px] rounded-[24px] bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] mt-[20px] lg:absolute lg:top-[270px] lg:left-[1000px] cursor-pointer hover:scale-105 transition-transform duration-300"
                    id="cuadrado2">
                    <div class="bg-[#C2DEFF] w-full h-[90px] rounded-[14px] mt-[-5px] flex items-center">
                        <p class="ml-[55px] text-[20px]">Informes de seguimiento:</p>
                        <i class='bx bxs-bookmark-alt-minus text-7xl ml-auto mr-[20px]'></i>
                    </div>
                </div>

                <div onclick="window.location.href='#'"
                    class="relative w-full max-w-[620px] h-[120px] p-[20px] rounded-[24px] bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] mt-[20px] lg:absolute lg:top-[410px] lg:left-[1000px] cursor-pointer hover:scale-105 transition-transform duration-300"
                    id="cuadrado3">
                    <div class="bg-[#E0E9FF] w-full h-[90px] rounded-[14px] mt-[-5px] flex items-center">
                        <p class="ml-[55px] text-[20px]">Actividades registradas:</p>
                        <i class='bx bx-list-check text-7xl ml-auto mr-[20px]'></i>
                    </div>
                </div>

                <div onclick="window.location.href='#'"
                    class="relative w-full max-w-[620px] h-[120px] p-[20px] rounded-[24px] bg-gradient-to-r from-[#2A334B] via-[#46567E] via-[16%] via-[#546797] via-[31%] via-[#5B70A4] via-[47.5%] via-[#546797] via-[63%] via-[#46567E] via-[77.5%] to-[#2A334B] mt-[20px] lg:absolute lg:top-[550px] lg:left-[1000px] cursor-pointer hover:scale-105 transition-transform duration-300"
                    id="cuadrado4">
                    <div class="bg-[#C2DEFF] w-full h-[90px] rounded-[14px] mt-[-5px] flex items-center">
                        <p class="ml-[55px] text-[20px]">Total de beneficiarios:</p>
                        <i class='bx bxs-user-detail text-7xl ml-auto mr-[20px]'></i>
                    </div>
                </div>
            </div>


        </div>
    </main>
</body>

</html>
