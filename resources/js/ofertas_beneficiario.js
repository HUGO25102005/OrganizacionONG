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

    function mostrarSoloDetalles(idClase) {
        const clasesContainer = document.getElementById("clasesContainer");
        const detalles = document.getElementById("detalles");

        // Ocultar el contenedor de clases con animación
        clasesContainer.classList.add("opacity-0", "scale-90");
        setTimeout(() => {
            clasesContainer.classList.add("hidden");
        }, 300); // Tiempo coincide con la duración de la transición

        // Mostrar los detalles con animación
        detalles.classList.remove("hidden");
        setTimeout(() => {
            detalles.classList.remove("opacity-0", "transform", "scale-90");
        }, 10); // Pequeño retraso para activar la transición

        // Obtener el contenedor de botones
        const botonesAccion = document.getElementById("botonesAccion");

        // Verificar si el botón ya existe para evitar duplicados
        let botonInscribirme = document.getElementById("botonInscribirme");
        if (!botonInscribirme) {
            // Crear el botón de inscribirme
            botonInscribirme = document.createElement("button");
            botonInscribirme.id = "botonInscribirme";
            botonInscribirme.textContent = "Inscribirme a la clase";
            botonInscribirme.className =
                "px-8 py-3 bg-blue-500 text-white rounded-full font-semibold text-lg hover:bg-blue-600 hover:scale-105 transition duration-200 ease-in-out shadow-lg";

            // Agregar evento al botón
            botonInscribirme.onclick = () => {
                inscribirmeClase(idClase); // Llama a una función para manejar la inscripción
            };

            // Agregar el botón al contenedor de botones
            botonesAccion.appendChild(botonInscribirme);
        }

        // Información del Programa
        const idPrograma = document.getElementById("idPrograma");
        const nombrePrograma = document.getElementById("nombrePrograma");
        const estadoPrograma = document.getElementById("estadoPrograma");
        const fechaRegistro = document.getElementById("fechaRegistro");

        // Lo que aprenderás
        const descripcionActividad = document.getElementById("descripcionActividad");
        const duracionActividad = document.getElementById("duracionActividad");
        const instructorActividad = document.getElementById("instructorActividad");

        // Objetivos esperados
        const objetivosClase = document.getElementById("objetivosClase");

        // Recursos necesarios
        const recursosNecesarios = document.getElementById("recursosNecesarios");

        // Beneficiarios y Resultados
        const beneficiariosEstimados = document.getElementById("beneficiariosEstimados");
        const resultadosEsperados = document.getElementById("resultadosEsperados");

        // Indicadores de cumplimiento
        const indicadoresCumplimiento = document.getElementById("indicadoresCumplimiento");

        // Comentarios adicionales
        const comentariosAdicionales = document.getElementById("comentariosAdicionales");

        // Presupuesto
        const presupuesto = document.getElementById("presupuesto");
        const motivoPresupuesto = document.getElementById("motivoPresupuesto");

        // Salones relacionados
        const listaEstudiantes = document.getElementById("salonesClase");

        const url = document.getElementById("detallesClase").getAttribute("data-url");
        const dataFetch = {
            id_clase: idClase,
        };

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify(dataFetch),
        })
            .then((res) => res.json())
            .then((response) => {
                const data = JSON.parse(response.data);

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
                    presupuesto,
                    salonesClase,
                } = data;

                let lista = "";

                if (Array.isArray(salonesClase) && salonesClase.length > 0) {
                    salonesClase.forEach((alumno) => {
                        lista += `<li><i class="bx bxs-user mr-2 text-yellow-600"></i> ${alumno.user.name}</li>`;
                    });
                } else {
                    lista += `<li>No hay alumnos registrados en la clase</li>`;
                }

                listaEstudiantes.innerHTML = lista;
                idPrograma.textContent = id;
                nombrePrograma.textContent = nombre_programa;
                estadoPrograma.textContent = estado;
                fechaRegistro.textContent = fecha_registro;

                descripcionActividad.textContent = descripcion;
                duracionActividad.textContent = `Duración: ${duracion}`;
                objetivosClase.textContent = objetivos;
                recursosNecesarios.textContent = recursos_necesarios;
                beneficiariosEstimados.textContent = beneficiarios_estimados;
                resultadosEsperados.textContent = resultados_esperados;
                indicadoresCumplimiento.textContent = indicadores_cumplimiento;
                comentariosAdicionales.textContent = comentarios_adicionales;
            });
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



        // Referencias a los elementos que necesitan ser limpiados
        const detallesTitulo = document.getElementById("detallesTitulo");
        const listaEstudiantes = document.getElementById("listaEstudiantes");
        const descripcionActividad = document.getElementById("descripcionActividad");
        const duracionActividad = document.getElementById("duracionActividad");
        const presupuestoActividad = document.getElementById("presupuestoActividad");
        const instructorActividad = document.getElementById("instructorActividad");
        const idPrograma = document.getElementById("idPrograma");
        const nombrePrograma = document.getElementById("nombrePrograma");
        const estadoPrograma = document.getElementById("estadoPrograma");
        const fechaRegistro = document.getElementById("fechaRegistro");
        const objetivosClase = document.getElementById("objetivosClase");
        const recursosNecesarios = document.getElementById("recursosNecesarios");
        const beneficiariosEstimados = document.getElementById("beneficiariosEstimados");
        const resultadosEsperados = document.getElementById("resultadosEsperados");
        const indicadoresCumplimiento = document.getElementById("indicadoresCumplimiento");
        const comentariosAdicionales = document.getElementById("comentariosAdicionales");

        // Limpiar contenido de los elementos
        detallesTitulo.textContent = "";
        listaEstudiantes.innerHTML = "";
        descripcionActividad.textContent = "";
        duracionActividad.textContent = "";
        presupuestoActividad.textContent = "";
        instructorActividad.textContent = "";
        idPrograma.textContent = "";
        nombrePrograma.textContent = "";
        estadoPrograma.textContent = "";
        fechaRegistro.textContent = "";
        objetivosClase.textContent = "";
        recursosNecesarios.textContent = "";
        beneficiariosEstimados.textContent = "";
        resultadosEsperados.textContent = "";
        indicadoresCumplimiento.textContent = "";
        comentariosAdicionales.textContent = "";
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
            });
            
        location.reload();
    }

    function inscribirmeClase(idClase) {
        const url = document.getElementById("routerInscribirmeClase").getAttribute("data-url");
        const dataFetch = {
            id_clase: idClase,
        };

        fetch(url, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            },
            body: JSON.stringify(dataFetch),
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.error) {
                    // Muestra el mensaje de error
                    messageSendError('Inscripción Fallida', data.error);
                } else if (data.message) {
                    // Muestra el mensaje de éxito
                    messageSendSuccess(data.message);
                } else {
                    // Manejo de caso inesperado
                    messageErrorRequest('Respuesta inesperada del servidor.');
                }
            })
            .catch((err) => {
                // Manejo de errores en la solicitud
                console.error('Error en la solicitud:', err);
                messageErrorRequest('Hubo un problema al conectar con el servidor.');
            });

        cerrarDetalles();
        location.reload();
    }


    window.toggleDropdown = toggleDropdown;
    window.mostrarSoloDetalles = mostrarSoloDetalles;
    window.cerrarDetalles = cerrarDetalles;
    window.enviarInforme = enviarInforme;
    window.resetInput = resetInput;
})();