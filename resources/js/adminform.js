import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
    function adminForm() {
        console.log('hola');
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

        return;
        // formulario.submit();
    }

    window.adminForm = adminForm;
})();