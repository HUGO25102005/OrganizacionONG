import { getValueRequired } from "./../generalsFunctions";
(function () {

    function tipoDonacion(){

    }

    // function comprobarCorreoDonante() {
    //     const form = document.getElementById('formCorreoDonante');
    //     const correo = getValueRequired('donor-email');
    //     const url = form.getAttribute('action');

    //     const emailForm = document.querySelector('#email');
    //     const fistName = document.querySelector('#first_name');
    //     const lastName = document.querySelector('#last_name');
    //     const countryCode = document.querySelector('#country_code');


    //     const data = {
    //         email: correo
    //     };

    //     fetch(url, {
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    //         },
    //         body: JSON.stringify(data),
    //     })
    //         .then((response) => {
    //             if (!response.ok) {
    //                 throw new Error('Error en la respuesta del servidor');
    //             }
    //             return response.json();
    //         })
    //         .then((response) => {
    //             const { donante, exists } = response;

    //             if (exists) {

    //                 console.log(donante);

    //                 const {
    //                     email, 
    //                     first_name,
    //                     last_name,
    //                     country_code
    //                 } = donante;

    //                 emailForm.value = email;
    //                 fistName.value = first_name;
    //                 lastName.value = last_name;
    //                 countryCode.value = country_code;

    //                 abrirModalNuevoDonante();

    //             } else {
    //                 emailForm.value = '';
    //                 fistName.value = '';
    //                 lastName.value = '';
    //                 countryCode.value = '';
    //                 abrirModalNuevoDonante();
    //             }
    //         });
    // }


    window.comprobarCorreoDonante = comprobarCorreoDonante;
    window.abrirModalNuevoDonante = abrirModalNuevoDonante;
    window.cerrarModal = cerrarModal;
    window.tipoDonacion = tipoDonacion;
})();

