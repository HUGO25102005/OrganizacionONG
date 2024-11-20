
import {
    addHTML,
    getValue,
    getValueRequired,
    hideElement,
    resetInput,
    showElement,
    submitForm,
    showJsonErrors
} from './generalsFunctions.js';

(function () {

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
            alert('Por favor, complete todos los campos obligatorios.');
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
            body: data,
        })
            .then((response) => response.json())
            .then((responseData) => {
                if (responseData.success) {
                

                    
                } else {
                    alert('Error al crear la clase.');
                    console.error('Error:', responseData.message);
                }
            })
            .catch((error) => {
                console.error('Error en la solicitud:', error);
                alert('Ocurrió un error al enviar la información.');
            });
    }

    function addActividadesByClass() {
        const id_programa = getValueRequired('id_programa');
        const nombre = getValueRequired('nombreActividad');
        const fecha_actividad = getValueRequired('fechaActividad');
        const descripcion_actividad = getValueRequired('descripcionActividad');
        const resultados_actividad = getValueRequired('resultadosActividad');
        const comentarios_adicionales = getValueRequired('comentariosAdicionalesActividad');

        // Validar datos requeridos
        if (nombre === false || fecha_actividad === false || descripcion_actividad === false) {
            alert('Por favor, complete los campos obligatorios.');
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
                if (responseData.success) {
                    alert('Actividad registrada exitosamente.');
                    console.log('Actividad registrada:', responseData);
                } else {
                    alert('Error al registrar la actividad.');
                    console.error('Error:', responseData.message);
                }
            })
            .catch((error) => {
                console.error('Error en la solicitud:', error);
                alert('Ocurrió un error al enviar la actividad.');
            });
    }

    function addTuplaTableActividades() {

        const url = document.getElementById('btnAddActividades').getAttribute('data-url');
    }

    //* declaro funciones para usar en cualquier archivo
    window.sendFormNewClass = sendFormNewClass;
    window.resetInput = resetInput;
    window.submitForm = submitForm;
    window.addHTML = addHTML;
    window.showElement = showElement;
    window.addActividadesByClass = addActividadesByClass;
    window.showJsonErrors = showJsonErrors;
})();