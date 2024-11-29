import {
    addHTML,
    getValue,
    getValueRequired,
    hideElement,
    resetInput,
    showElement,
    submitForm,
    showJsonErrors,
    messageMandatory,
    messageSendSuccess,
    messageSendError,
    messageErrorRequest
} from './generalsFunctions.js';

(function () {

    function enableActividades() {
        //* esta funcion deshabilita los campos de informacion y presupuesto para solo
        //* habilitar el de actividades, esto para agregar actividades a la clase

        document.querySelector('#btn-informacion').setAttribute('disabled', true);
        document.querySelector('#btn-presupuesto').setAttribute('disabled', true);
        document.querySelector('#btn-actividades').removeAttribute('disabled');
        document.querySelector('#btn-actividades').click();
    }

    function disableActividades() {
        //* esta funcion deshabilita el campo de actividades y vuelve a informacion

        document.querySelector('#btn-informacion').removeAttribute('disabled');
        document.querySelector('#btn-presupuesto').removeAttribute('disabled');
        document.querySelector('#btn-actividades').setAttribute('disabled', true);
        document.querySelector('#btn-informacion').click();
    }

    function sendFormNewClass(idForm) {
        // Recopilar datos del formulario
        const nombre = getValueRequired('nombrePrograma');
        const descripcion = getValueRequired('descripcion');
        const objetivos = getValueRequired('objetivos');
        const publicoObjetivo = getValueRequired('publicoObjetivo');
        const fechaInicio = getValueRequired('fechaInicio');
        const fechaTermino = getValueRequired('fechaTermino');
        const recursosNecesarios = getValueRequired('recursosNecesarios');
        const resultadosEsperados = getValueRequired('resultadosEsperados');
        const beneficiariosEstimados = getValueRequired('beneficiariosEstimados');
        const indicadoresCumplimiento = getValueRequired('indicadoresCumplimiento');
        const comentariosAdicionales = getValueRequired('comentariosAdicionales');
        const montoPresupuesto = getValueRequired('montoPresupuesto');
        const motivoPresupuesto = getValueRequired('motivoPresupuesto');

        // Validar datos requeridos
        if (
            nombre === false ||
            descripcion === false ||
            objetivos === false ||
            publicoObjetivo === false ||
            fechaInicio === false ||
            fechaTermino === false ||
            recursosNecesarios === false ||
            resultadosEsperados === false ||
            beneficiariosEstimados === false ||
            indicadoresCumplimiento === false ||
            comentariosAdicionales === false ||
            montoPresupuesto === false ||
            motivoPresupuesto === false
        ) {
            messageMandatory();
            return;
        }

        // Enviar datos al servidor
        const form = document.getElementById(idForm);
        const url = form.getAttribute('action');
        const data = {
            nombre_programa: nombre,
            descripcion: descripcion,
            objetivos: objetivos,
            publico_objetivo: publicoObjetivo,
            fecha_inicio: fechaInicio,
            fecha_termino: fechaTermino,
            recursos_necesarios: recursosNecesarios,
            resultados_esperados: resultadosEsperados,
            beneficiarios_estimados: beneficiariosEstimados,
            indicadores_cumplimiento: indicadoresCumplimiento,
            comentarios_adicionales: comentariosAdicionales,
            monto_presupuesto: montoPresupuesto,
            motivo_presupuesto: motivoPresupuesto,
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then((responseData) => {

                const { success, id_programa } = responseData;

                if (success && id_programa) {

                    enableActividades();
                    addTuplaTableActividades();
                    document.querySelector('#btnConfirm').innerHTML = `
                                <span onclick="refreshWindow()"
                                    class="inline-block bg-red-500 text-white font-semibold p-[15px] rounded-lg hover:bg-red-600 transition ease-in-out duration-200 mt-8">
                                    Terminar Solicitud
                                </span>
                            `;


                    // Se da valor al campo de id_programa
                    document.querySelector('#id_programa').value = id_programa;

                    messageSendSuccess('Clase creada con éxito');

                } else {
                    messageSendError('Error al crear la clase', responseData.message);
                    console.error('Error:', responseData.message);
                }
            })
            .catch((error) => {

                messageErrorRequest(error.message);
                console.error('Error en la solicitud:', error);
            });
    }

    function cleanFormActividades() {
        document.querySelector('#nombreActividad').value = '';
        document.querySelector('#fecha_actividad').value = '';
        document.querySelector('#descripcion_actividad').value = '';
        document.querySelector('#resultados_actividad').value = '';
        document.querySelector('#comentarios_adicionales').value = '';
    }

    function addActividadesByClass() {

        const id_programa = getValueRequired('id_programa');
        const nombre = getValueRequired('nombreActividad');
        const fecha_actividad = getValueRequired('fecha_actividad');
        const descripcion_actividad = getValueRequired('descripcion_actividad');
        const resultados_actividad = getValueRequired('resultados_actividad');
        const comentarios_adicionales = getValue('comentarios_adicionales');

        // Validar datos requeridos
        if (nombre === false || fecha_actividad === false || descripcion_actividad === false ||
            resultados_actividad === false) {

            messageMandatory();
            return;
        }

        const url = document.getElementById('btnAddActividades').getAttribute('data-url');
        const data = {
            id_programa: id_programa,
            nombre: nombre,
            fecha_actividad: fecha_actividad,
            descripcion_actividad: descripcion_actividad,
            resultados_actividad: resultados_actividad,
            comentarios_adicionales: comentarios_adicionales,
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(data),
        })
            .then((response) => response.json())
            .then((responseData) => {
                const { success } = responseData
                if (success) {
                    addTuplaTableActividades();
                    messageSendSuccess('Actividad registrada exitosamente.');
                    cleanFormActividades();
                    console.log('Actividad registrada:', responseData);
                } else {
                    messageSendError('Error al registrar la actividad.', responseData.message)
                }
            })
            .catch((error) => {
                if(error.errors.fecha_actividad[0]){
                    messageSendError('Error al registrar la actividad.', error.errors.fecha_actividad[0])
                } else {
                    console.error('Error en la solicitud:', error);
                    messageErrorRequest('Ocurrió un error al enviar la actividad.');
                }
            });
    }

    async function addTuplaTableActividades() {

        const url = document.getElementById('routerTablaActividades').getAttribute('data-url');

        if (!url) {
            console.error('No se encontró la URL en el botón.');
            return;
        }

        // Obtener el ID del programa desde otro elemento (opcional)
        const idPrograma = document.getElementById('id_programa')?.value || null;

        try {
            // Hacer la solicitud fetch
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ id_programa: idPrograma }),
            });

            // Verificar si la respuesta es exitosa
            if (!response.ok) {
                throw new Error('Error al obtener las actividades.');
            }

            // Parsear la respuesta como JSON
            const data = await response.json();

            // Insertar el HTML recibido en el cuerpo de la tabla
            const tablaCuerpo = document.getElementById('tablaActividades');
            if (tablaCuerpo && data.html) {
                tablaCuerpo.innerHTML = data.html; // Agregar las filas al final del tbody
            } else {
                console.error('No se encontró el tbody o el HTML recibido está vacío.');
            }
        } catch (error) {
            console.error(error);
            alert('Ocurrió un error al intentar agregar actividades a la tabla.');
        }
    }

    function refreshWindow() {
        window.location.reload();
    }

    //* declaro funciones para usar en cualquier archivo
    window.sendFormNewClass = sendFormNewClass;
    window.resetInput = resetInput;
    window.submitForm = submitForm;
    window.addHTML = addHTML;
    window.showElement = showElement;
    window.addActividadesByClass = addActividadesByClass;
    window.showJsonErrors = showJsonErrors;
    window.enableActividades = enableActividades;
    window.disableActividades = disableActividades;
    window.cleanFormActividades = cleanFormActividades;
    window.addTuplaTableActividades = addTuplaTableActividades;
    window.refreshWindow = refreshWindow;
})();