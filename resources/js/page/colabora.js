import { getValueRequired } from "./../generalsFunctions";
(function () {

    document.addEventListener("DOMContentLoaded", () => {
        let dynamicUserId = null; // Variable para almacenar el ID del usuario con correo

        // Elementos comunes
        const donationTypeInputs = document.querySelectorAll('input[name="donation_type"]');
        const anonymousInfo = document.getElementById("anonymous-info");
        const emailContainer = document.getElementById("donor-email-container");
        const continueButton = document.getElementById("continue-button");

        // Función para manejar animaciones de visibilidad
        const toggleElement = (element, show) => {
            if (!element) return;
            element.classList.toggle("hidden", !show);
            element.classList.toggle("opacity-0", !show);
            element.classList.toggle("translate-y-4", !show);
            element.classList.toggle("scale-95", !show);
            element.classList.toggle("opacity-100", show);
            element.classList.toggle("translate-y-0", show);
            element.classList.toggle("scale-100", show);
        };

        // Configuración del botón PayPal
        const renderPayPalButton = (containerSelector) => {
            const container = document.querySelector(containerSelector);
            if (!container) {
                console.error(`Contenedor no encontrado: ${containerSelector}`);
                return;
            }

            container.innerHTML = ''; // Limpia contenedor
            container.classList.remove("pointer-events-none");
            container.style.opacity = "1";

            console.log(`Renderizando botón PayPal en: ${containerSelector}`);
            const image = new Image();
            image.src = imageUrl;
            PayPal.Donation.Button({
                env: "sandbox", // Cambiar a 'production' en entornos reales
                hosted_button_id: "BNH9DUN6KARHS",
                image: {
                    src: image.src,
                    alt: "Donar con PayPal",
                    title: "PayPal - Seguro y fácil",
                },
                onClick: validateBeforeSubmit,
                onComplete: handleTransactionComplete,
            }).render(containerSelector);
        };

        // Validación previa
        const validateBeforeSubmit = () => {
            const selectedType = document.querySelector('input[name="donation_type"]:checked');
            if (!selectedType) {
                alert("Selecciona un tipo de donación.");
                return false;
            }
            if (selectedType.value === "with_email" && !document.getElementById("donor-email").value.trim()) {
                alert("Por favor, ingresa un correo.");
                return false;
            }
            return true;
        };

        // Manejo de la transacción
        const handleTransactionComplete = (params) => {
            console.log("Transacción completada:", params);

            const divProcesar = document.getElementById('routerProcesarDonacion');
            const url = divProcesar.getAttribute('data-url');
            const correo = document.getElementById('donor-email').value.trim();
            const nombre = document.getElementById('first_name').value.trim();
            const apellido = document.getElementById('last_name').value.trim();
            const codigoPais = document.getElementById('country_code').value.trim();

            const { tx, st, amt, cc } = params;

            // Determinar el ID del usuario
            const isAnonymous = document.querySelector('input[name="donation_type"]:checked').value === "anonymous";
            const userId = isAnonymous ? 2 : dynamicUserId;

            const data = {
                transaction_id: tx,
                status: st,
                amount: amt,
                currency: cc,
                id_donante: userId,
                correo: correo,
                first_name: nombre,
                last_name: apellido,
                country_code: codigoPais
            };

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify(data),
            })
                .then((response) => response.json())
                .then((result) => {
                    console.log('Respuesta del servidor:', result);
                    alert('¡Donación procesada correctamente!');
                })
                .catch((error) => {
                    console.error('Error al enviar la solicitud:', error);
                    alert('Hubo un error al procesar la donación. Por favor, intenta nuevamente.');
                });
        };

        // Manejo del cambio de tipo de donación
        const handleDonationTypeChange = (value) => {
            const isAnonymous = value === "anonymous";

            toggleElement(anonymousInfo, isAnonymous);
            toggleElement(emailContainer, !isAnonymous);

            continueButton.disabled = isAnonymous;
            continueButton.classList.toggle("hidden", isAnonymous);

            const btnRenderClass = isAnonymous ? "#donate-button-anonimo" : "#donate-button-perfil";
            renderPayPalButton(btnRenderClass);
        };

        // Inicialización de eventos
        donationTypeInputs.forEach((input) => {
            input.addEventListener("change", (e) => handleDonationTypeChange(e.target.value));
        });

        const initialSelection = document.querySelector('input[name="donation_type"]:checked');
        if (initialSelection) {
            handleDonationTypeChange(initialSelection.value);
        }

        // Función para comprobar el correo y manejar el donante
        function comprobarCorreoDonante() {
            const btnDONAR = document.querySelector('#donate-button')
            btnDONAR.click();
        }

        window.comprobarCorreoDonante = comprobarCorreoDonante;
    });

})();

