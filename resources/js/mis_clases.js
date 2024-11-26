

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

        clasesContainer.classList.add("hidden");
        detalles.classList.remove("hidden");

        const detallesTitulo = document.getElementById("detallesTitulo");
        const listaEstudiantes = document.getElementById("listaEstudiantes");
        const descripcionActividad = document.getElementById("descripcionActividad");
        const duracionActividad = document.getElementById("duracionActividad");
        const presupuestoActividad = document.getElementById("presupuestoActividad");
        const instructorActividad = document.getElementById("instructorActividad");
        const objetivoActividad = document.getElementById("objetivoActividad");
        const publicObjetivo = document.getElementById("publicObjetivo");
        const fechaInicio = document.getElementById("fechaInicio");
        const fechaTermino = document.getElementById("fechaTermino");
        const recursosNecesarios = document.getElementById("recursosNecesarios");
        const estadoActividad = document.getElementById("estadoActividad");
        const resultadosEsperados = document.getElementById("resultadosEsperados");
        const beneficiariosEstimados = document.getElementById("beneficiariosEstimados");
        const indicadoresCumplimiento = document.getElementById("indicadoresCumplimiento");
        const comentariosAdicionales = document.getElementById("comentariosAdicionales");
        const fechaRegistro = document.getElementById("fechaRegistro");

    


        const url = document.getElementById("routerDetallesClase").getAttribute('data-url');
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
                const { detallesClase, listaAlumnos } = data;
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
                    console.log('hola');
                    listaAlumnos.forEach(alumno => {
                        // Supongamos que cada alumno tiene un nombre y un ID
                        lista += `<li><i class="bx bxs-user mr-2 text-yellow-600"></i> ${alumno.user.name}</li>`;
                    });
                } else {
                    lista += `<li>No hay alumnos registrados en la clase</li>`;
                }

                detallesTitulo.textContent = nombre_programa;
                listaEstudiantes.innerHTML = lista;
                descripcionActividad.textContent = descripcion;
                duracionActividad.textContent = `Duración: ${duracion} semanas`;
                presupuestoActividad.textContent = `Presupuesto: $${presupuesto.monto}`;
                objetivoActividad.textContent = objetivos;
                publicObjetivo.textContent = publico_objetivo;
                fechaInicio.textContent = fecha_inicio;
                fechaTermino.textContent = fecha_termino;
                recursosNecesarios.textContent = recursos_necesarios;
                estadoActividad.textContent = estado;
                resultadosEsperados.textContent = resultados_esperados;
                beneficiariosEstimados.textContent = beneficiarios_estimados;
                indicadoresCumplimiento.textContent = indicadores_cumplimiento;
                comentariosAdicionales.textContent = comentarios_adicionales;
                fechaRegistro.textContent = fecha_registro;
                // instructorActividad.textContent = "Instructor: Laura Gómez";
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
    }

    window.toggleDropdown = toggleDropdown;
    window.mostrarSoloDetalles = mostrarSoloDetalles;
    window.cerrarDetalles = cerrarDetalles;
})();