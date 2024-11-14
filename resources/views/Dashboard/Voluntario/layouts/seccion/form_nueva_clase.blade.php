<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[40px] shadow-lg rounded-[30px] flex gap-10">
    
    <!-- Sección Izquierda: Formulario -->
    <div class="w-[1450px] bg-white p-[30px] shadow-md rounded-[20px]">
        <h2 class="text-2xl font-semibold mb-[20px] text-gray-800">Nueva clase</h2>
        
        <!-- Formulario -->
        <form class="space-y-[20px]">
            <!-- Nombre del Programa -->
            <div>
                <label for="nombrePrograma" class="block text-sm font-medium text-gray-600 mb-[5px]">Nombre de la clase</label>
                <input type="text" id="nombrePrograma" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Ingresa el nombre del clase">
            </div>
            
            <!-- Descripción -->
            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-600 mb-[5px]">Descripción</label>
                <textarea id="descripcion" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Descripción del clase" rows="4"></textarea>
            </div>
            
            <!-- Presupuesto -->
            <div>
                <label for="presupuesto" class="block text-sm font-medium text-gray-600 mb-[5px]">Presupuesto</label>
                <input type="number" id="presupuesto" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Presupuesto en MXN">
            </div>

            <!-- Objetivos -->
            <div class="mt-4">
                <label for="objetivos" class="block text-sm font-medium text-gray-600 mb-[5px]">Objetivos</label>
                <textarea id="objetivos" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Describe los objetivos"></textarea>
            </div>

            <!-- Público Objetivo -->
            <div class="mt-4">
                <label for="publicoObjetivo" class="block text-sm font-medium text-gray-600 mb-[5px]">Público Objetivo</label>
                <input type="text" id="publicoObjetivo" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Especifica el público objetivo">
            </div>

            <!-- Duración -->
            <div class="mt-4">
                <label for="duracion" class="block text-sm font-medium text-gray-600 mb-[5px]">Duración</label>
                <input type="text" id="duracion" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Duración estimada">
            </div>

            <!-- Fecha de Inicio -->
            <div class="mt-4">
                <label for="fechaInicio" class="block text-sm font-medium text-gray-600 mb-[5px]">Fecha de Inicio</label>
                <input type="date" id="fechaInicio" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Fecha de Término -->
            <div class="mt-4">
                <label for="fechaTermino" class="block text-sm font-medium text-gray-600 mb-[5px]">Fecha de Término</label>
                <input type="date" id="fechaTermino" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Recursos Necesarios -->
            <div class="mt-4">
                <label for="recursosNecesarios" class="block text-sm font-medium text-gray-600 mb-[5px]">Recursos Necesarios</label>
                <textarea id="recursosNecesarios" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Lista los recursos necesarios"></textarea>
            </div>

            <!-- Resultados Esperados -->
            <div class="mt-4">
                <label for="resultadosEsperados" class="block text-sm font-medium text-gray-600 mb-[5px]">Resultados Esperados</label>
                <textarea id="resultadosEsperados" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Describe los resultados esperados"></textarea>
            </div>

            <!-- Beneficiarios Estimados -->
            <div class="mt-4">
                <label for="beneficiariosEstimados" class="block text-sm font-medium text-gray-600 mb-[5px]">Beneficiarios Estimados</label>
                <input type="number" id="beneficiariosEstimados" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Cantidad de beneficiarios">
            </div>

            <!-- Indicadores de Cumplimiento -->
            <div class="mt-4">
                <label for="indicadoresCumplimiento" class="block text-sm font-medium text-gray-600 mb-[5px]">Indicadores de Cumplimiento</label>
                <textarea id="indicadoresCumplimiento" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Describe los indicadores de cumplimiento"></textarea>
            </div>

            <!-- Comentarios Adicionales -->
            <div class="mt-4">
                <label for="comentariosAdicionales" class="block text-sm font-medium text-gray-600 mb-[5px]">Comentarios Adicionales</label>
                <textarea id="comentariosAdicionales" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Añade comentarios adicionales"></textarea>
            </div>

            <!-- Sección Separada de Presupuesto -->
            <div class="border-t-2 border-gray-400 mt-8 pt-6">
                <h3 class="text-xl font-semibold mb-[15px] text-gray-800">Presupuesto</h3>
                
                <!-- Modo de Presupuesto -->
                <div class="mt-4">
                    <label for="montopresupuesto" class="block text-sm font-medium text-gray-600 mb-[5px]">Monto de Presupuesto</label>
                    <input type="number" id="montopresupuesto" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Especifica el modo de presupuesto">
                </div>

                <!-- Motivo de Presupuesto -->
                <div class="mt-4">
                    <label for="motivoPresupuesto" class="block text-sm font-medium text-gray-600 mb-[5px]">Motivo de Presupuesto</label>
                    <textarea id="motivoPresupuesto" class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Describe el motivo del presupuesto"></textarea>
                </div>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold p-[15px] rounded-lg hover:from-blue-600 hover:to-indigo-600 transition ease-in-out duration-200 mt-8">
                Enviar solicitud
            </button>
        </form>
    </div>

</div>
