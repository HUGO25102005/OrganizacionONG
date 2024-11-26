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
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdown");
        const dropdownIcon = document.getElementById("dropdownIcon");

        // Alternar la clase `hidden` para mostrar/ocultar
        dropdown.classList.toggle("hidden");

        // Cambiar el ícono según el estado del dropdown
        if (dropdown.classList.contains("hidden")) {
            dropdownIcon.classList.remove("bx-chevron-up");
            dropdownIcon.classList.add("bx-chevron-down");
        } else {
            dropdownIcon.classList.remove("bx-chevron-down");
            dropdownIcon.classList.add("bx-chevron-up");
        }
    }

    function mostrarInfoClase(idClase) {
        const tituloClase = document.getElementById("tituloClase");
        const descripcionClase = document.getElementById("descripcionClase");
        const reportesClase = document.getElementById("reportesClase");

        const url = document.getElementById("urlTerminadas").getAttribute('data-url');
        const dataFetch = {
            id_clase: idClase
        }
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(dataFetch),
        })
            .then(res => res.json())
            .then(response => {
                const data = JSON.parse(response.data);
                console.log(data);
                const { detallesClase, listaAlumnos, reporte } = data;
                const {
                    id,
                    nombre_programa,
                    descripcion,
                    objetivos,
                    publico_objetivo,
                    duracion,
                    fecha_inicio,
                    fecha_termino,
                    recursos_necesarios,
                    estado,
                    resultados_esperados,
                    beneficiarios_estimados,
                    indicadores_cumplimiento,
                    comentarios_adicionales,
                    fecha_registro,
                    presupuesto
                } = detallesClase;

                let lista = '';

                if (Array.isArray(listaAlumnos) && listaAlumnos.length > 0) {
                    // console.log('hola');
                    listaAlumnos.forEach(alumno => {
                        // Supongamos que cada alumno tiene un nombre y un ID
                        lista += `<li><i class="bx bxs-user mr-2 text-yellow-600"></i> ${alumno.user.name}</li>`;
                    });
                } else {
                    lista += `<li>No hay alumnos registrados en la clase</li>`;
                }

                const {
                    comentarios_Adicionales,
                    desafios_encontrados,
                    recomendaciones,
                    resumen_informe,
                } = reporte;

                tituloClase.textContent = nombre_programa;
                descripcionClase.textContent = descripcion;

                reportesClase.innerHTML = `
                    <div class="bg-[#EDF7FF] p-6 rounded-lg shadow-md border border-[#C7DCFF] transition duration-200 hover:shadow-lg">
                        <h3 class="text-xl font-semibold">Reporte Finalizacion</h3>
                        <p class="text-[#4A5568]">${resumen_informe}</p>
                    </div>
                `;
            })



    }

    function cerrarDetalles() {
        const clasesContainer = document.getElementById("clasesContainer");
        const detalles = document.getElementById("detalles");

        // Inicia animación para ocultar detalles
        detalles.classList.remove("opacity-100", "scale-100");
        detalles.classList.add("opacity-0", "scale-90");

        setTimeout(() => {
            detalles.classList.add("hidden");
            detalles.classList.remove("opacity-0", "scale-90");

            // Mostrar clasesContainer con animación de entrada
            clasesContainer.classList.remove("hidden");
            setTimeout(() => {
                clasesContainer.classList.add("opacity-100", "scale-100");
            }, 10); // Pequeño retraso para que se aplique la animación
        }, 300); // Duración de la animación de salida

        const detallesTitulo = document.getElementById("detallesTitulo");
        const listaEstudiantes = document.getElementById("listaEstudiantes");
        const descripcionActividad = document.getElementById("descripcionActividad");
        const duracionActividad = document.getElementById("duracionActividad");
        const presupuestoActividad = document.getElementById("presupuestoActividad");
        const instructorActividad = document.getElementById("instructorActividad");

        detallesTitulo.textContent = '';
        listaEstudiantes.innerHTML = '';
        descripcionActividad.textContent = '';
        duracionActividad.textContent = ``;
        presupuestoActividad.textContent = ``;
    }

    function enviarInforme(idTarb) {

        const idProgramaDetalles = getValue("idProgramaDetalles");
        const fechaInforme = getValue("fecha_informe");
        const trab = idTarb;
        const resumenInforme = getValueRequired('resumenInforme');
        const cumplimientoIndicadores = getValueRequired('cumplimientoIndicadores');
        const desafiosEncontrados = getValueRequired('desafiosEncontrados');
        const recomendaciones = getValueRequired('recomendaciones');
        const descripcionReporte = getValueRequired('descripcionReporte');
        const comentariosAdicionales = getValue('comentariosAdicionalesInformes'); // No es requerido, puedes manejarlo aparte

        if (
            idProgramaDetalles === false ||
            resumenInforme === false ||
            cumplimientoIndicadores === false ||
            desafiosEncontrados === false ||
            recomendaciones === false ||
            comentariosAdicionales === false ||
            descripcionReporte === false
        ) {
            messageMandatory();
            return;
        }

        const url = document.getElementById("routerInformes").getAttribute('data-url');

        const dataFetch = {
            id_programa_educativo: Number(idProgramaDetalles),
            fecha_informe: fechaInforme,
            id_trabajador: trab,
            resumen_informe: resumenInforme,
            cumplimiento_indicadores: cumplimientoIndicadores,
            desafios_encontrados: desafiosEncontrados,
            recomendaciones: recomendaciones,
            comentarios_adicionales: comentariosAdicionales,
            descripcion_reporte: descripcionReporte
        };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(dataFetch),
        })
            .then(res => res.json())
            .then(response => {
                const data = JSON.parse(response.data);
                // console.log(data);
                if (data == 'ok') {
                    messageSendSuccess('Clase finalizada exitosamente.');
                } else {
                    messageErrorRequest('Ocurrió un error al finalizar la clase.');
                }
                cerrarDetalles();
                location.reload();
            });

    }

    window.toggleDropdown = toggleDropdown;
    window.mostrarInfoClase = mostrarInfoClase;
    window.cerrarDetalles = cerrarDetalles;
    window.enviarInforme = enviarInforme;
    window.resetInput = resetInput;
})();