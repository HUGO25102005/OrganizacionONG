import { getValueRequired, messageMandatory, messageSendSuccess, resetInput } from "./generalsFunctions";

(function () {
    function editarConvo() {
        const formulario = document.getElementById('formUp')
        const titulo = getValueRequired('edit_titulo');
        const descripcion = getValueRequired('edit_descripcion');
        const fecha_incio = getValueRequired('edit_fecha_inicio');
        const fecha_fin = getValueRequired('edit_fecha_fin');
        const objetivo = getValueRequired('edit_objetivo');
        const comentarios = getValueRequired('edit_comentarios');
        const nombre = getValueRequired('edit_nombre');
        const descript = getValueRequired('edit_descript');
        const cantarticulos = getValueRequired('edit_cantarticulos');

        //Validar datos requeridos
        if (
            titulo === false ||
            descripcion === false ||
            fecha_incio === false ||
            fecha_fin === false ||
            objetivo === false ||
            comentarios === false ||
            nombre === false ||
            descript === false ||
            cantarticulos === false 
        ) {
            messageMandatory();
            return;
        }

         const url = formulario.getAttribute('action');
         console.log(url)

         const data = {
             titulo: titulo,
             descripcion: descripcion,
             fecha_incio: fecha_incio,
             fecha_fin: fecha_fin,
             objetivo: objetivo,
             comentarios: comentarios,
             nombre: nombre,
             descript: descript,
             cantarticulos: cantarticulos,
         };

         console.log(data)

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

                     document.querySelector('#edit_titulo').value = '';
                     document.querySelector('#edit_descripcion').value = '';
                     document.querySelector('#edit_fecha_incio').value = '';
                     document.querySelector('#edit_fecha_fin').value = '';
                     document.querySelector('#edit_objetivo').value = '';
                     document.querySelector('#edit_comentarios').value = '';
                     document.querySelector('#edit_nombre').value = '';
                     document.querySelector('#edit_descript').value = '';
                     document.querySelector('#edit_cantarticulos').value = '';
                     cerrarModal();
                 }
             })
    }
    window.editarConvo = editarConvo;
    window.resetInput = resetInput;
})()