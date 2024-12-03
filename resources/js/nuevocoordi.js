import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
    function nuevocoordi() {
        const formulario = document.getElementById('nuevoCoordinador');
        
        // Campos del formulario
        const nombre = getValueRequired('name');
        const apellido_paterno = getValueRequired('apellido_paterno');
        const apellido_materno = getValueRequired('apellido_materno');
        const fecha_nacimiento = getValueRequired('fecha_nacimiento');
        const email = getValueRequired('email');
        const password = getValueRequired('password');
        const password_confirmation = getValueRequired('password_confirmation');
        const pais = getValueRequired('pais');
        const estado = getValueRequired('estado');
        const municipio = getValueRequired('municipio');
        const cp = getValueRequired('cp');
        const direccion = getValueRequired('direccion');
        const genero = getValueRequired('genero');
        const telefono = getValueRequired('telefono');
        const hora_inicio = getValueRequired('hora_inicio');
        const hora_fin = getValueRequired('hora_fin');

        // Validar campos requeridos
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

        // Opción con fetch (descomentar si se desea usar)
        /*
        const url = formulario.getAttribute('action');
        const data = {
            name: nombre,
            apellido_paterno: apellido_paterno,
            apellido_materno: apellido_materno,
            fecha_nacimiento: fecha_nacimiento,
            email: email,
            password: password,
            password_confirmation: password_confirmation,
            pais: pais,
            estado: estado,
            municipio: municipio,
            cp: cp,
            direccion: direccion,
            genero: genero,
            telefono: telefono,
            hora_inicio: hora_inicio,
            hora_fin: hora_fin
        };

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

        //             document.querySelector('#name').value = '';
        //             document.querySelector('#apellido_paterno').value = '';
        //             document.querySelector('#apellido_materno').value = '';
        //             document.querySelector('#fecha_nacimiento').value = '';
        //             document.querySelector('#email').value = '';
        //             document.querySelector('#password').value = '';
        //             document.querySelector('#password_confirmation').value = '';
        //             document.querySelector('#pais').value = '';
        //             document.querySelector('#estado').value = '';
        //             document.querySelector('#municipio').value = '';
        //             document.querySelector('#cp').value = '';
        //             document.querySelector('#direccion').value = '';
        //             document.querySelector('#genero').value = '';
        //             document.querySelector('#telefono').value = '';       
        //             document.querySelector('#hora_inicio').value = '';
        //             document.querySelector('#hora_fin').value = '';
        //             cerrarModal();
        //         }
        //     })*/
    }

    window.nuevocoordi = nuevocoordi;
})();
