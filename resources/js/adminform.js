import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
    function adminForm() {
        const formulario = document.getElementById('adminForm');
        const nombre = getValueRequired('ad_name');
        const apellido_paterno = getValueRequired('ad_apellido_paterno');
        const apellido_materno = getValueRequired('ad_apellido_materno');
        const fecha_nacimiento = getValueRequired('ad_fecha_nacimiento');
        const email = getValueRequired('ad_email');
        const password = getValueRequired('ad_password');
        const password_confirmation = getValueRequired('ad_password_confirmation');
        const pais = getValueRequired('ad_pais');
        const estado = getValueRequired('ad_estado');
        const municipio = getValueRequired('ad_municipio');
        const cp = getValueRequired('ad_cp');
        const direccion = getValueRequired('ad_direccion');
        const genero = getValueRequired('ad_genero');
        const telefono = getValueRequired('ad_telefono');
        const hora_inicio = getValueRequired('ad_hora_inicio');
        const hora_fin = getValueRequired('ad_hora_fin');

        // Validar datos requeridos
        if (
            nombre === false ||
            apellido_paterno === false ||
            apellido_materno === false ||
            fecha_nacimiento === false ||
            email === false ||
            password === false ||
            password_confirmation === false ||
            pais === false ||
            estado === false ||
            municipio === false ||
            cp === false ||
            direccion === false ||
            genero === false ||
            telefono === false ||
            hora_inicio === false ||
            hora_fin === false
        ) {
            messageMandatory();
            return;
        }

        formulario.submit();

        // const url = formulario.getAttribute('action');
        // const data = {
        //     name: nombre,
        //     apellido_paterno: apellido_paterno,
        //     apellido_materno: apellido_materno,
        //     fecha_nacimiento: fecha_nacimiento,
        //     email: email,
        //     password: password,
        //     password_confirmation: password_confirmation,
        //     pais: pais,
        //     estado: estado,
        //     municipio: municipio,
        //     cp: cp,
        //     direccion: direccion,
        //     genero: genero,
        //     telefono: telefono,
        //     hora_inicio: hora_inicio,
        //     hora_fin: hora_fin
        // };

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

        //             document.querySelector('#ad_name').value = '';
        //             document.querySelector('#ad_apellido_paterno').value = '';
        //             document.querySelector('#ad_apellido_materno').value = '';
        //             document.querySelector('#ad_fecha_nacimiento').value = '';
        //             document.querySelector('#ad_email').value = '';
        //             document.querySelector('#ad_password').value = '';
        //             document.querySelector('#ad_password_confirmation').value = '';
        //             document.querySelector('#ad_pais').value = '';
        //             document.querySelector('#ad_estado').value = '';
        //             document.querySelector('#ad_municipio').value = '';
        //             document.querySelector('#ad_cp').value = '';
        //             document.querySelector('#ad_direccion').value = '';
        //             document.querySelector('#ad_genero').value = '';
        //             document.querySelector('#ad_telefono').value = '';       
        //             document.querySelector('#ad_hora_inicio').value = '';
        //             document.querySelector('#ad_hora_fin').value = '';
        //             cerrarModal();
        //         }
        //     })*/
    }

    window.adminForm = adminForm;
})();