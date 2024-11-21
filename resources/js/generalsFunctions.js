import Swal from 'sweetalert2';

const styleWarning = 'border-red-500 bg-red-100 focus:outline-none focus:ring-2 focus:ring-red-400 transition-all duration-300 ease-in-out';

export function getValue(idElement) {
    return document.getElementById(idElement).value;
}

export function getValueRequired(idElement) {

    const element = document.getElementById(idElement);

    if (!element.value) {
        element.classList.add(...styleWarning.split(' '))
        return false;
    } else {
        return element.value;
    }
}

export function resetInput(idElement) {

    const element = document.getElementById(idElement);
    element.classList.remove(...styleWarning.split(' '));
}

export function submitForm(idForm) {
    const form = document.getElementById(idForm);
    form.submit();
}

export function addHTML(idElement, content) {
    const label = document.getElementById(idElement)
    label.innerHTML += content;
}

export function hideElement(idElement) {
    const styleHide = 'hidden';
    const element = document.getElementById(idElement)
    element.classList.add(...styleHide.split(' '))
}

export function showElement(idElement) {
    const styleHide = 'hidden';
    const element = document.getElementById(idElement);
    element.classList.remove(...styleHide.split(' '));
}


//TODO: Message by action or response
export function messageMandatory() {
    Swal.fire({
        title: 'Faltan campos obligatorios',
        text: 'Por favor, complete todos los campos obligatorios.',
        iconHtml: '<i class="bx bx-error-circle" style="color: #e74c3c; font-size: 2.5rem;"></i>',
        customClass: {
            icon: 'swal-icon',
        },
        confirmButtonText: 'Aceptar',
    });
}

export function messageSendSuccess(message) {
    Swal.fire({
        title: message,
        text: 'Los datos se enviaron correctamente.',
        iconHtml: '<i class="bx bx-check-circle" style="color: #2ecc71; font-size: 2.5rem;"></i>',
        customClass: {
            icon: 'swal-icon',
        },
        confirmButtonText: 'Aceptar',
    });
}

export function messageSendError(message, response){
    Swal.fire({
        title: message,
        text: response || 'Hubo un problema con los datos enviados.',
        iconHtml: '<i class="bx bx-error" style="color: #e74c3c; font-size: 2.5rem;"></i>',
        customClass: {
            icon: 'swal-icon',
        },
        confirmButtonText: 'Aceptar',
    });
}

export function messageErrorRequest(errorMessage){
    Swal.fire({
        title: 'Error en la solicitud',
        text: errorMessage || 'No se pudo conectar con el servidor.',
        iconHtml: '<i class="bx bx-error" style="color: #e74c3c; font-size: 2.5rem;"></i>',
        customClass: {
            icon: 'swal-icon',
        },
        confirmButtonText: 'Aceptar',
    });
}

//TODO: Función para mostrar errores desde una respuesta JSON
export function showJsonErrors(errors) {
    const container = document.getElementById('json-errors-container');
    container.innerHTML = ''; // Limpiar errores anteriores
    for (const [field, messages] of Object.entries(errors)) {
        const alert = document.createElement('div');
        alert.className =
            'alert w-80 p-4 rounded-lg shadow-lg bg-red-100 border border-red-400 text-red-700 animate-fade-in';
        alert.innerHTML = `
            <button class="close-alert absolute top-2 right-2 text-lg font-bold text-gray-500 hover:text-gray-700">&times;</button>
            <div class="font-bold text-lg mb-1">Error en "${field}":</div>
            <ul class="list-disc pl-4">
                ${messages.map(msg => `<li>${msg}</li>`).join('')}
            </ul>
        `;
        container.appendChild(alert);

        // Cerrar al presionar el botón
        alert.querySelector('.close-alert').addEventListener('click', () => {
            // Eliminar el primer mensaje (el que aparece primero en la lista)
            const firstAlert = container.querySelector('.alert');
            if (firstAlert) {
                firstAlert.classList.add('animate-fade-out');
                setTimeout(() => firstAlert.remove(), 500);
            }
        });

        // Eliminar error después de 5 segundos si no se cierra manualmente
        setTimeout(() => {
            alert.classList.add('animate-fade-out');
            setTimeout(() => alert.remove(), 500);
        }, 5000); // 5 segundos
    }


}
