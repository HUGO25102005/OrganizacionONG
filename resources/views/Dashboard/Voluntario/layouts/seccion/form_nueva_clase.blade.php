<div class="bg-[#F6F8FF] w-full max-w-[1450px] h-auto my-[20px] p-[40px] shadow-lg rounded-[30px] flex gap-10">
    <!-- Sección Izquierda: Formulario -->
    <div class="w-[1450px] bg-white p-[30px] shadow-md rounded-[20px]">
        <h2 class="text-2xl font-semibold mb-[20px] text-gray-800">Nueva clase</h2>

        <div class="space-y-[20px]">

            <!-- Nombre del Programa -->
            <div x-data="{ tab: 'informacion' }" id="divTab">
                <!-- Navegación de tabs -->
                <div class="mb-6" id="NavForm">
                    <nav class="flex space-x-4" aria-label="Tabs">
                        <button @click="tab = 'informacion'" id="btn-informacion"
                            :class="{ 'border-b-2 border-blue-500 text-blue-500': tab === 'informacion' }"
                            class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
                            Información
                        </button>
                        <button @click="tab = 'presupuesto'" id="btn-presupuesto"
                            :class="{ 'border-b-2 border-blue-500 text-blue-500': tab === 'presupuesto' }"
                            class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none">
                            Presupuesto
                        </button>
                        <button @click="tab = 'actividades'" id="btn-actividades"
                            :class="{ 'border-b-2 border-blue-500 text-blue-500': tab === 'actividades' }"
                            class="px-3 py-2 font-medium text-gray-500 hover:text-blue-500 focus:outline-none"
                            disabled='true'>
                            Actividades
                        </button>
                    </nav>
                </div>

                <form action="{{ route('vol.storeProgramaEducativo') }}" method="POST" id="formNewClass">
                    @csrf
                    <div x-show="tab === 'informacion'" x-transition>
                        <div>
                            <label for="nombrePrograma" class="block text-sm font-medium text-gray-600 mb-[5px]">Nombre
                                de
                                la
                                clase</label>
                            <input type="text" id="nombrePrograma" name='nombre_programa'
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Ingresa el nombre del clase" onfocus="resetInput('nombrePrograma')"
                                required>
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="descripcion"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Descripción</label>
                            <textarea id="descripcion" name="descripcion"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Descripción del clase" rows="4" onfocus="resetInput('descripcion')" required></textarea>
                        </div>

                        <!-- Objetivos -->
                        <div class="mt-4">
                            <label for="objetivos"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Objetivos</label>
                            <textarea id="objetivos" name="objetivos"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Describe los objetivos" onfocus="resetInput('objetivos')" required></textarea>
                        </div>

                        <!-- Público Objetivo -->
                        <div class="mt-4">
                            <label for="publicoObjetivo"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Público
                                Objetivo</label>
                            <input type="text" id="publicoObjetivo" name="publico_objetivo"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Especifica el público objetivo" onfocus="resetInput('publicoObjetivo')"
                                required>
                        </div>

                        {{-- <!-- Duración -->
                        <div class="mt-4">
                            <label for="duracion"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Duración</label>
                            <input type="number" id="duracion" name="duracion"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Duración estimada en semanas" onfocus="resetInput('duracion')" required>
                        </div> --}}

                        <!-- Fecha de Inicio -->
                        <div class="mt-4">
                            <label for="fechaInicio" class="block text-sm font-medium text-gray-600 mb-[5px]">Fecha de
                                Inicio</label>
                            <input type="date" id="fechaInicio" name="fecha_inicio"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                onfocus="resetInput('fechaInicio')" required>
                        </div>

                        <!-- Fecha de Término -->
                        <div class="mt-4">
                            <label for="fechaTermino" class="block text-sm font-medium text-gray-600 mb-[5px]">Fecha de
                                Término</label>
                            <input type="date" id="fechaTermino" name="fecha_termino"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                onfocus="resetInput('fechaTermino')" required>
                        </div>

                        <!-- Recursos Necesarios -->
                        <div class="mt-4">
                            <label for="recursosNecesarios"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Recursos
                                Necesarios</label>
                            <textarea id="recursosNecesarios" name="recursos_necesarios"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Lista los recursos necesarios" onfocus="resetInput('recursosNecesarios')" required></textarea>
                        </div>

                        <!-- Resultados Esperados -->
                        <div class="mt-4">
                            <label for="resultadosEsperados"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Resultados
                                Esperados</label>
                            <textarea id="resultadosEsperados" name="resultados_esperados"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Describe los resultados esperados" onfocus="resetInput('resultadosEsperados')" required></textarea>
                        </div>

                        <!-- Beneficiarios Estimados -->
                        <div class="mt-4">
                            <label for="beneficiariosEstimados"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Beneficiarios Estimados</label>
                            <input type="number" id="beneficiariosEstimados" name="beneficiarios_estimados"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Cantidad de beneficiarios" onfocus="resetInput('beneficiariosEstimados')"
                                required>
                        </div>

                        <!-- Indicadores de Cumplimiento -->
                        <div class="mt-4">
                            <label for="indicadoresCumplimiento"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Indicadores de
                                Cumplimiento</label>
                            <textarea id="indicadoresCumplimiento" name="indicadores_cumplimiento"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Describe los indicadores de cumplimiento" onfocus="resetInput('indicadoresCumplimiento')" required></textarea>
                        </div>

                        <!-- Comentarios Adicionales -->
                        <div class="mt-4">
                            <label for="comentariosAdicionales"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Comentarios
                                Adicionales</label>
                            <textarea id="comentariosAdicionales" name="comentarios_adicionales"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Añade comentarios adicionales" onfocus="resetInput('comentariosAdicionales')" required></textarea>
                        </div>
                    </div>

                    <!-- Sección Separada de Presupuesto -->
                    <div x-show="tab === 'presupuesto'" x-transition>

                        <!-- Modo de Presupuesto -->
                        <div class="mt-4">
                            <label for="montopresupuesto"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Monto
                                de
                                Presupuesto</label>
                            <input type="number" id="montoPresupuesto" name="monto_presupuesto"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Especifica el monto de presupuesto"
                                onfocus="resetInput('montoPresupuesto')" required>
                        </div>

                        <!-- Motivo de Presupuesto -->
                        <div class="mt-4">
                            <label for="motivoPresupuesto"
                                class="block text-sm font-medium text-gray-600 mb-[5px]">Motivo
                                de
                                Presupuesto</label>
                            <textarea id="motivoPresupuesto" name="motivo_presupuesto"
                                class="w-full p-[15px] border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                placeholder="Describe el motivo del presupuesto" onfocus="resetInput('motivoPresupuesto')" required></textarea>
                        </div>
                    </div>
                </form>
                <!-- Sección Actividades -->
                <div x-show="tab === 'actividades'" x-transition>
                    <div class="space-y-4" id="FormNewActividad">

                        {{-- * Etiquetas hidden de control  --}}
                        <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" name="id_programa" id="id_programa" value="0">
                        <div id="routerTablaActividades" data-url="{{ route('vol.cargarActividadesEnTabla') }}"></div>
                        {{-- * fIN Etiquetas hidden de control  --}}

                        <div>
                            <label for="nombreActividad" class="block text-sm font-medium text-gray-700">Nombre de la
                                Actividad</label>
                            <input type="text" id="nombreActividad" name="nombre" onfocus="resetInput('nombre')"
                                maxlength="70" placeholder="Ingrese el nombre de la actividad"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>


                        <div>
                            <label for="fecha_actividad" class="block text-sm font-medium text-gray-700">Fecha de la
                                Actividad</label>
                            <input type="date" id="fecha_actividad" name="fecha_actividad"
                                onfocus="resetInput('fecha_actividad')"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label for="descripcion_actividad"
                                class="block text-sm font-medium text-gray-700">Descripción de la Actividad</label>
                            <textarea id="descripcion_actividad" name='descripcion-actividad' onfocus="resetInput('descripcion_actividad')"
                                rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                placeholder="Descripción de la actividad"></textarea>
                        </div>
                        <div>
                            <label for="resultados_actividad"
                                class="block text-sm font-medium text-gray-700">Resultados de la Actividad</label>
                            <textarea id="resultados_actividad" name="resultados_actividad" onfocus="resetInput('resultados_actividad')"
                                rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                placeholder="Resultados obtenidos de la actividad"></textarea>
                        </div>
                        <div>
                            <label for="comentarios_adicionales"
                                class="block text-sm font-medium text-gray-700">Comentarios Adicionales</label>
                            <textarea id="comentarios_adicionales" name="comentarios_adicionales" rows="4"
                                onfocus="resetInput('comentarios_adicionales')" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                                placeholder="Comentarios adicionales"></textarea>
                        </div>
                        <div>
                            <button onclick="addActividadesByClass()" data-url="{{ route('vol.storeActividades') }}"
                                id="btnAddActividades"
                                class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold p-[15px] rounded-lg hover:from-blue-600 hover:to-indigo-600 transition ease-in-out duration-200 mt-8">
                                Agregar Actividad
                            </button>
                        </div>
                    </div>
                    <!-- Tabla para mostrar las actividades -->
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-blue-600 mb-4">Actividades Registradas</h4>
                        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="px-6 py-3 font-medium text-gray-700 border-b">#</th>
                                    <th class="px-6 py-3 font-medium text-gray-700 border-b">Tema</th>
                                    <th class="px-6 py-3 font-medium text-gray-700 border-b">Fecha de Actividad</th>
                                    <th class="px-6 py-3 font-medium text-gray-700 border-b">Descripción de la
                                        Actividad
                                    </th>
                                    <th class="px-6 py-3 font-medium text-gray-700 border-b">Resultados de la Actividad
                                    </th>
                                    <th class="px-6 py-3 font-medium text-gray-700 border-b">Comentarios Adicionales
                                    </th>
                                </tr>
                            </thead>
                            <tbody id='tablaActividades'>
                                <!-- Ejemplo de fila de actividad -->
                                @include('Dashboard.Voluntario.layouts.tr_tablas.filas_actividades', ['actividades' => $actividades])
                                <!-- Más filas de actividades pueden ser agregadas dinámicamente -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="left text-right" id="btnConfirm">
                <!-- Botón de Enviar -->
                <span onclick="sendFormNewClass('formNewClass')"
                    class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-semibold p-[15px] rounded-lg hover:from-blue-600 hover:to-indigo-600 transition ease-in-out duration-200 mt-8">
                    Enviar solicitud
                </span>
            </div>
        </div>
    </div>
    <div class="fixed bottom-5 right-5 z-100">
        <a href="{{ route('vol.chat') }}">
            <button
                class="bg-blue-400 text-white p-3 h-12 w-12 rounded-full shadow-lg hover:bg-blue-300 flex items-center justify-center">
                <i class='bx bx-message-square-dots text-2xl'></i>
            </button>
        </a>
    </div>
</div>

@vite(['resources/js/formNewClass.js'])


