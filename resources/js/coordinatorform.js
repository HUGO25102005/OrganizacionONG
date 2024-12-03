import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
    function coordinatorForm() {
        const formulario = document.getElementById('coordinadorForm')
        const nombre = getValueRequired('co_name');
        const apellido_paterno = getValueRequired('co_apellido_paterno');
        const apellido_materno = getValueRequired('co_apellido_materno');
        const email = getValueRequired('co_email');
        const genero = getValueRequired('co_genero');
        const fecha_nacimiento = getValueRequired('co_fecha_nacimiento');
        const telefono = getValueRequired('co_telefono');
        const direccion = getValueRequired('co_direccion');
        const pais = getValueRequired('co_pais');
        const estado = getValueRequired('co_estado');
        const municipio = getValueRequired('co_municipio');
        const cp = getValueRequired('co_cp');
        const hora_inicio = getValueRequired('co_hora_inicio');
        const hora_fin = getValueRequired('co_hora_fin');

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
            hora_inicio === false ||
            hora_fin === false
        ) {
            messageMandatory();
            return;
        }

        formulario.submit();
        // const url = formulario.getAttribute('action');
        // console.log(url)

        // const data = {
        //     name: nombre,
        //     apellido_paterno: apellido_paterno,
        //     apellido_materno: apellido_materno,
        //     email: email,
        //     genero: genero,
        //     fecha_nacimiento: fecha_nacimiento,
        //     telefono: telefono,
        //     direccion: direccion,
        //     pais: pais,
        //     estado: estado,
        //     municipio : municipio,
        //     cp: cp,
        //     hora_inicio: hora_inicio,
        //     hora_fin: hora_fin
        // };

        // console.log(data)

        // fetch(url, {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        //     },
        //     body: JSON.stringify(data),
        // })
        //     .then((response) => {
        //         if (!response.ok) {
        //             throw new Error('Error en la respuesta del servidor');
        //         }
        //         return response.json();
        //     }) 

        //     .then ((res) => {
        //         console.log(res)
        //         const {data, message, success} = res;
        //         if (success) {
        //             messageSendSuccess(message);

        //             document.querySelector('#co_name').value = '';
        //             document.querySelector('#co_apellido_paterno').value = '';
        //             document.querySelector('#co_apellido_materno').value = '';
        //             document.querySelector('#co_email').value = '';
        //             document.querySelector('#co_genero').value = '';
        //             document.querySelector('#co_fecha_nacimiento').value = '';
        //             document.querySelector('#co_pais').value = '';
        //             document.querySelector('#co_direccion').value = '';
        //             document.querySelector('#co_estado').value = '';
        //             document.querySelector('#co_municipio').value = '';
        //             document.querySelector('#co_cp').value = '';
        //             document.querySelector('#co_hora_inicio').value = '';
        //             document.querySelector('#co_hora_fin').value = '';
        //             cerrarModal();
        //         }
        //     })
    }
    window.coordinatorForm = coordinatorForm;
})()