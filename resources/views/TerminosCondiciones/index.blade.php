@extends('TerminosCondiciones.layouts.app')

@section('titulo')
    <h1 class="text-3xl font-bold text-center mt-8">Términos y condiciones</h1>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8 flex">

    <button 
        id="volver"
        class="absolute top-8 left-8 bg-white text-black py-2 px-4 rounded-lg shadow hover:bg-gray-200 transition">
        <i class='bx bx-arrow-back'></i><b>&nbsp; Volver</b>
    </button>
    <!-- Menú de la izquierda con borde rojo y margen derecho -->
    <div class="w-1/3 border-r-2 border-red-500 pr-4 mr-4">
        <ul class="list-none bg-gray-100 p-4 rounded-lg shadow-lg" style="box-shadow: inset 5px 5px 10px #d1d1d1, inset -5px -5px 10px #ffffff;">
            <li class="mb-4 cursor-pointer w-auto text-center font-bold bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('identidad')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Identidad de InspireUp</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('aceptacion')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Aceptación de los Términos</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('servicios')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Servicios Ofrecidos</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('uso')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Uso de la Plataforma</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('propiedad')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Propiedad Intelectual</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('privacidad')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Aviso de Privacidad</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('donaciones')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Declaraciones sobre Donaciones</li>
            <li class="mb-4 cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('responsabilidad')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Limitación de Responsabilidad</li>
            <li class="cursor-pointer w-auto text-center bg-gray-200 py-2 rounded-md hover:bg-gray-300 transition"
                onclick="setActive(this); showInfo('jurisdiccion')"
                style="box-shadow: 5px 5px 10px #d1d1d1, -5px -5px 10px #ffffff;">Ley Aplicable y Jurisdicción</li>
        </ul>
    </div>

    <!-- Información general -->
    <div class="w-2/3 ml-8">
        <h2 id="info-title" class="text-2xl font-bold mb-4">Acerca del uso de información</h2>
        <div id="info-content">
        </div>
    </div>
</div>

<script>
    function setActive(element) {
        // Quitar las clases activas de todos los elementos
        let items = document.querySelectorAll('ul li');
        items.forEach((item) => {
            item.classList.remove('font-bold', 'text-xl'); // Eliminar solo negritas y tamaño
        });

        // Agregar las clases activas al elemento que se hizo clic
        element.classList.add('font-bold', 'text-xl'); // Aplicar solo negritas y tamaño
    }

    function showInfo(section) {
            let content = '';
            let title = '';

            switch (section) {
                case 'identidad':
                    title = 'Identidad de InspireUp';
                    content = `
                        <p class="text-lg"><strong>Identidad de InspireUp:</strong></p>
                        <p>InspireUp es una organización sin fines de lucro registrada bajo el Régimen de las Personas Morales con Fines No Lucrativos conforme a la legislación mexicana. Nuestro objetivo principal es ofrecer cursos gratuitos en línea a través de nuestra plataforma, con el propósito de fomentar el aprendizaje y el desarrollo personal.</p>
                    `;
                    break;
                case 'aceptacion':
                    title = 'Aceptación de los Términos';
                    content = `
                        <p class="text-lg"><strong>Aceptación de los Términos:</strong></p>
                        <p>El acceso y uso de nuestra plataforma implica la aceptación de estos términos y condiciones. Si no está de acuerdo con estos términos, le pedimos que no utilice nuestros servicios.</p>
                    `;
                    break;
                case 'servicios':
                    title = 'Servicios Ofrecidos';
                    content = `
                        <p class="text-lg"><strong>Servicios Ofrecidos:</strong></p>
                        <p>InspireUp proporciona acceso gratuito a cursos en línea. Los cursos están diseñados con fines educativos y no constituyen un servicio comercial. No se otorgan certificados con validez oficial a menos que se especifique lo contrario en el curso respectivo.</p>
                    `;
                    break;
                case 'uso':
                    title = 'Uso de la Plataforma';
                    content = `
                        <p class="text-lg"><strong>Uso de la Plataforma:</strong></p>
                        <ul>
                            <li>Los usuarios deben registrarse proporcionando información veraz y actualizada.</li>
                            <li>Está prohibido el uso de la plataforma para fines distintos a los establecidos, incluyendo actividades ilícitas o que violen derechos de terceros.</li>
                            <li>InspireUp se reserva el derecho de suspender o cancelar cuentas que incumplan estas disposiciones.</li>
                        </ul>
                    `;
                    break;
                case 'propiedad':
                    title = 'Propiedad Intelectual';
                    content = `
                        <p class="text-lg"><strong>Propiedad Intelectual:</strong></p>
                        <p>Todo el contenido disponible en la plataforma, incluyendo textos, imágenes, videos y materiales de cursos, es propiedad de InspireUp o de sus colaboradores y está protegido por las leyes de derechos de autor.</p>
                        <ul>
                            <li>Se permite el uso personal y no comercial de los materiales educativos.</li>
                            <li>Queda estrictamente prohibida la reproducción, distribución o modificación del contenido sin autorización previa.</li>
                        </ul>
                    `;
                    break;
                case 'privacidad':
                    title = 'Aviso de Privacidad';
                    content = `
                        <p class="text-lg"><strong>Aviso de Privacidad:</strong></p>
                        <p>En InspireUp respetamos la privacidad de nuestros usuarios. Toda la información recopilada será tratada conforme a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares.</p>
                    `;
                    break;
                case 'donaciones':
                    title = 'Declaraciones sobre donaciones';
                    content = `
                        <p class="text-lg"><strong>Declaraciones sobre donaciones:</strong></p>
                        <p>En InspireUp agradecemos profundamente las contribuciones voluntarias de individuos, empresas u organizaciones interesadas en apoyar nuestra misión de ofrecer educación gratuita y accesible. Las donaciones realizadas son fundamentales para la operación y expansión de nuestros programas educativos, alineados con nuestro compromiso como organización sin fines de lucro.</p>
                        <p><strong>1. Métodos de Donación:</strong> Las donaciones pueden realizarse a través de pagos en línea mediante nuestra plataforma segura</p>
                        <p><strong>2. Emisión de Comprobantes Fiscales:</strong> Por el momento, InspireUp no cuenta con la capacidad de emitir comprobantes fiscales por las donaciones recibidas. Estamos trabajando en los procesos necesarios para ofrecer este servicio en el futuro. Agradecemos su comprensión y apoyo mientras completamos este trámite.</p>
                        <p><strong>3. Uso de los Recursos:</strong> Los recursos obtenidos mediante donaciones son utilizados exclusivamente para cubrir gastos relacionados con el desarrollo, mantenimiento y promoción de nuestra plataforma educativa.</p>
                        <p><strong>4. Reconocimiento Público:</strong> Con autorización previa, InspireUp puede reconocer públicamente a los donantes en nuestra página web o materiales promocionales. Si el donante prefiere permanecer anónimo, puede indicarlo al momento de realizar la donación.</p>
                    `;
                    break;
                case 'responsabilidad':
                    title = 'Limitación de Responsabilidad';
                    content = `
                        <p class="text-lg"><strong>Limitación de Responsabilidad:</strong></p>
                        <p>InspireUp no se responsabiliza por:</p>
                        <ul>
                            <li>Errores técnicos en la plataforma o interrupciones del servicio.</li>
                            <li>Uso indebido de los materiales proporcionados.</li>
                            <li>Expectativas de los usuarios que no sean congruentes con los fines educativos gratuitos de los cursos.</li>
                        </ul>
                    `;
                    break;
                case 'jurisdiccion':
                    title = 'Ley Aplicable y Jurisdicción';
                    content = `
                        <p class="text-lg"><strong>Ley Aplicable y Jurisdicción:</strong></p>
                        <p>Estos términos y condiciones se rigen por las leyes de México. Cualquier controversia será resuelta en los tribunales correspondientes de Colima.</p>
                    `;
                    break;
            }

        // Cambiar el título del encabezado
        document.getElementById('info-title').innerHTML = title;
        // Cambiar el contenido de la sección
        document.getElementById('info-content').innerHTML = content;
    }

    // Ejecuta "Desarrollo de políticas" al cargar la página y resalta el primer elemento
    document.addEventListener('DOMContentLoaded', function() {
        // Selecciona el primer elemento de la lista y activa su contenido
        const firstItem = document.querySelector('ul li');
        setActive(firstItem);
        showInfo('identidad'); // Mostrar el contenido de "Desarrollo de políticas" por defecto
    });
</script>

@endsection
