import { getValueRequired, messageMandatory, messageSendSuccess } from "./generalsFunctions";

(function () {
   function formNuevaCampania(){
        const formulario = document.getElementById('form');
        const titulo = getValueRequired('titulo');
        const descripcion = getValueRequired('descripcion');
        const fecha_inicio = getValueRequired('fecha_inicio');
        const fecha_fin = getValueRequired('fecha_fin');
        const objetivo = getValueRequired('objetivo');
        const comentarios = getValueRequired('comentarios');
        const nombre_articulo = getValueRequired('nombre');
        const descript = getValueRequired('descript');
        const cantarticulos = getValueRequired('cantarticulos');

        //Validar datos requeridos
        if (
            descripcion === false ||
            fecha_inicio === false ||
            fecha_fin === false ||
            objetivo === false ||
            comentarios === false ||
            nombre_articulo === false ||
            descript === false ||
            cantarticulos === false ||
            titulo === false 
        ) {
            messageMandatory();
            return;
        }
        
        const url = formulario.getAttribute('action');
        console.log(url)

        const data = {
            titulo: titulo,
            descripcion: descripcion,
            fecha_inicio: fecha_inicio,
            fecha_fin: fecha_fin,
            fecha_inicio: fecha_inicio,
            objetivo: objetivo,
            comentarios: comentarios,
            nombre: nombre_articulo,
            descript: descript,
            cantarticulos: cantarticulos,
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

                    document.querySelector('#descripcion').value = '';
                    document.querySelector('#fecha_inicio').value = '';
                    document.querySelector('#fecha_fin').value = '';
                    document.querySelector('#objetivo').value = '';
                    document.querySelector('#comentarios').value = '';
                    document.querySelector('#nombre').value = '';
                    document.querySelector('#descript').value = '';
                    document.querySelector('#cantarticulos').value = '';
                    document.querySelector('#titulo').value = '';
                    cerrarModal();
                }
            })

        function cerrarModal(){
            const btn = document.getElementById('btnModalCerrar');
            btn.click();
        }
   }
    window.formNuevaCampania = formNuevaCampania;
})();