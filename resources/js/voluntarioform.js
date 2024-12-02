import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
    function voluntarioForm(){
        const formulario = document.getElementById('nuevoVoluntario')
        const nombre = getValueRequired('vol_name');
        const  apellido_paterno = getValueRequired('vol_apellido_paterno');
        const  apellido_materno = getValueRequired('vol_apellido_materno');
        const  email = getValueRequired('vol_email');
        const  genero = getValueRequired('vol_genero');
        const  fecha_nacimiento = getValueRequired('vol_fecha_nacimiento');
        const  telefono = getValueRequired('vol_telefono');
        const  direccion = getValueRequired('vol_direccion');
        const  pais = getValueRequired('vol_pais');
        const  estado = getValueRequired('vol_estado');
        const  municipio = getValueRequired('vol_municipio');
        const  cp = getValueRequired('vol_cp');
        const  dias_disponibles = getValueRequired('vol_dias_dispo');
        const  preferencia_colabo = getValueRequired('vol_preferencia_colabo');
        const  experiencia_previa = getValueRequired('vol_experencia_previa');
        const  habilidades = getValueRequired('vol_habilidades');
        const  area = getValueRequired('vol_area');
        const  hrs_dedicadas_semana = getValueRequired('vol_hrs_dedicadas_semana');
        const  fecha_inicio = getValueRequired('vol_fecha_inicio');
        const  fecha_termino = getValueRequired('vol_fecha_termino');

        console.log('Nombre:', nombre);
        console.log('Apellido Paterno:', apellido_paterno);
        console.log('Apellido Materno:', apellido_materno);
        console.log('Email:', email);
        console.log('Género:', genero);
        console.log('Fecha de Nacimiento:', fecha_nacimiento);
        console.log('Teléfono:', telefono);
        console.log('Dirección:', direccion);
        console.log('País:', pais);
        console.log('Estado:', estado);
        console.log('Municipio:', municipio);
        console.log('Código Postal:', cp);
        console.log('Días Disponibles:', dias_disponibles);
        console.log('Preferencia de Colaboración:', preferencia_colabo);
        console.log('Experiencia Previa:', experiencia_previa);
        console.log('Habilidades:', habilidades);
        console.log('Área:', area);
        console.log('Horas Dedicadas por Semana:', hrs_dedicadas_semana);
        console.log('Fecha de Inicio:', fecha_inicio);
        console.log('Fecha de Término:', fecha_termino);
        



            //Validar datos requeridos
          if (
                nombre === false ||
                apellido_paterno === false ||
                apellido_materno === false ||
                email === false ||
                genero === false ||
                fecha_nacimiento === false ||
                telefono === false ||
                direccion === false ||
                pais === false ||
                estado === false ||
                municipio === false || 
                cp === false ||
                dias_disponibles === false ||
                preferencia_colabo == false ||
                experiencia_previa === false ||
                habilidades === false ||
                area === false ||
                hrs_dedicadas_semana === false ||
                fecha_inicio === false ||
                fecha_termino === false

            ) {
                messageMandatory();
                return;
            }
            formulario.submit();

            /* const url = formulario.getAttribute('action');
            console.log(url)
    
            const data = {
                name: nombre,
                apellido_paterno: apellido_paterno,
                apellido_materno: apellido_materno,
                email: email,
                genero: genero,
                fecha_nacimiento: fecha_nacimiento,
                telefono: telefono,
                direccion: direccion,
                pais: pais,
                estado: estado,
                municipio : municipio,
                cp: cp,
                dias_dispo: dias_disponibles,
                preferencia_colabo: preferencia_colabo,
                experiencia_previa: experiencia_previa,
                habilidades: habilidades,
                area: area,
                hrs_dedicadas_semana: hrs_dedicadas_semana,
                fecha_inicio: fecha_inicio,
                fecha_termino: fecha_termino
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
    
                .then ((res) => {
                    console.log(res)
                    const {data, message, success} = res;
                    if (success) {
                        messageSendSuccess(message);
    
                        document.querySelector('#vol_name').value = '';
                        document.querySelector('#vol_apellido_paterno').value = '';
                        document.querySelector('#vol_apellido_materno').value = '';
                        document.querySelector('#vol_email').value = '';
                        document.querySelector('#vol_genero').value = '';
                        document.querySelector('#vol_fecha_nacimiento').value = '';
                        document.querySelector('#vol_telefono').value = '';
                        document.querySelector('#vol_direccion').value = '';
                        document.querySelector('#vol_pais').value = '';
                        document.querySelector('#vol_estado').value = '';
                        document.querySelector('#vol_municipio').value = '';
                        document.querySelector('#vol_cp').value = '';
                        document.querySelector('#vol_dias_dispo').value = '';
                        document.querySelector('#vol_preferencia_colabo').value = '';
                        document.querySelector('#vol_experiencia_previa').value = '';
                        document.querySelector('#vol_habilidades').value = '';
                        document.querySelector('#vol_area').value = '';
                        document.querySelector('#vol_hrs_dedicadas_semana').value = '';
                        document.querySelector('#vol_fecha_incio').value = '';
                        document.querySelector('#vol_fecha_termino').value = '';
                        cerrarModal();
                    }
                }) */
            }
        window.voluntarioForm = voluntarioForm;
})()