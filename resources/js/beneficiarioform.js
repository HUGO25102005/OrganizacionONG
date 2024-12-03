import { getValueRequired, messageMandatory, messageSendSuccess, resetInput } from "./generalsFunctions";

(function () {
    function beneficiarioform() {
        const formulario = document.getElementById('beneform')
        const nombre = getValueRequired('ben_nombre');
        const apellido_paterno = getValueRequired('ben_apellido_paterno');
        const apellido_materno = getValueRequired('ben_apellido_materno');
        const email = getValueRequired('ben_email');
        const genero = getValueRequired('ben_genero');
        const fecha_nacimiento = getValueRequired('ben_fecha_nacimiento');
        const telefono = getValueRequired('ben_telefono');
        const direccion = getValueRequired('ben_direccion');
        const pais = getValueRequired('ben_pais');
        const estado = getValueRequired('ben_estado');
        const municipio = getValueRequired('ben_municipio');
        const cp = getValueRequired('ben_cp');
        const nivel_educativo = getValueRequired('ben_nivel_educativo');
        const ocupacion = getValueRequired('ben_ocupacion');
        const num_dependientes = getValueRequired('ben_num_dependientes');
        const ingresos_mensuales = getValueRequired('ben_ingresos_mensuales');



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

    }
    
    window.resetInput = resetInput;
    window.beneficiarioform = beneficiarioform;
})()