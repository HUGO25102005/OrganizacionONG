import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
    function beneficiarioform(){
        const formulario = document.getElementById('beneform')
        const nombre = getValueRequired('ben_nombre');
        const  apellido_paterno = getValueRequired('ben_apellido_paterno');
        const  apellido_materno = getValueRequired('ben_apellido_materno');
        const  email = getValueRequired('ben_email');
        const  genero = getValueRequired('ben_genero');
        const  fecha_nacimiento = getValueRequired('ben_fecha_nacimiento');
        const  telefono = getValueRequired('ben_telefono');
        const  direccion = getValueRequired('ben_direccion');
        const  pais = getValueRequired('ben_pais');
        const  estado = getValueRequired('ben_estado');
        const  municipio = getValueRequired('ben_municipio');
        const  cp = getValueRequired('ben_cp');
        const  nivel_educativo = getValueRequired('ben_nivel_educativo');
        const  ocupacion = getValueRequired('ben_ocupacion');
        const  num_dependientes = getValueRequired('ben_num_dependientes');
        const  ingresos_mensuales = getValueRequired('ben_ingresos_mensuales');



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
                nivel_educativo === false ||
                ocupacion === false ||
                num_dependientes === false ||
                ingresos_mensuales === false

            ) {
                messageMandatory();
                return;
            }
            formulario.submit();


            /* const url = formulario.getAttribute('action');
            console.log(url)
    
            const data = {
                nombre: nombre,
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
                nivel_educativo: nivel_educativo,
                ocupacion: ocupacion,
                num_dependientes: num_dependientes,
                ingresos_mensuales: ingresos_mensuales
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
    
                        document.querySelector('#ben_nombre').value = '';
                        document.querySelector('#ben_apellido_paterno').value = '';
                        document.querySelector('#ben_apellido_materno').value = '';
                        document.querySelector('#ben_email').value = '';
                        document.querySelector('#ben_genero').value = '';
                        document.querySelector('#ben_fecha_nacimiento').value = '';
                        document.querySelector('#ben_pais').value = '';
                        document.querySelector('#ben_direccion').value = '';1
                        document.querySelector('#ben_estado').value = '';
                        document.querySelector('#ben_municipio').value = '';
                        document.querySelector('#ben_cp').value = '';
                        document.querySelector('#ben_nivel_educativo').value = '';
                        document.querySelector('#ben_ocupacion').value = '';
                        document.querySelector('#ben_num_dependientes').value = '';
                        document.querySelector('#ben_ingresos_mensuales').value = '';

                        cerrarModal();
                    }
                }) */
            }
        window.beneficiarioform = beneficiarioform;
})()