@extends('TerminosCondiciones.layouts.app')

@section('titulo')
    <h1 class="text-3xl font-bold text-center mt-8">Términos y condiciones</h1>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8 flex">
    <!-- Menú de la izquierda con borde rojo y margen derecho -->
    <div class="w-1/3 border-r-2 border-red-500 pr-4 mr-4">
        <ul class="list-none">
            <li class="mb-2 cursor-pointer w-auto text-center font-bold" onclick="setActive(this); showInfo('politicas')">Desarrollo de políticas</li>
            <li class="mb-2 cursor-pointer w-auto text-center" onclick="setActive(this); showInfo('infracciones')">Detección de infracciones</li>
            <li class="mb-2 cursor-pointer w-auto text-center" onclick="setActive(this); showInfo('denuncia')">Denuncia de contenido</li>
            <li class="mb-2 cursor-pointer w-auto text-center" onclick="setActive(this); showInfo('aplicacion')">Aplicación de políticas</li>
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

        switch(section) {
            case 'politicas':
                title = 'Desarrollo de políticas';
                content = `
                    <ul class="list-disc pl-6">
                        <li><strong>Propósito de las Políticas:</strong> El objetivo de estas políticas es crear un entorno seguro, inclusivo y respetuoso para todas las personas que interactúan con la plataforma, incluidas personas donantes, beneficiarias y voluntarias que participan en la impartición de clases y otras actividades. Las políticas establecen lineamientos para el uso adecuado de los recursos y funcionalidades de la plataforma, la protección de datos personales, y el cumplimiento ético en todas las interacciones. Además, se busca promover una cultura de respeto mutuo y responsabilidad social en el marco de la misión de la organización.</li>
                        <li><strong>Roles y Responsabilidades:</strong> Cada rol dentro de la plataforma (donantes, beneficiarios, voluntarios) cumple una función específica y tiene responsabilidades definidas que aseguran transparencia y claridad en sus acciones y contribuciones.
                            <ul class="pl-6">
                                <li>-Donantes: Tienen la responsabilidad de aportar recursos de manera ética y legal. Además, se espera que respeten la misión de la organización y comprendan el impacto que su donación tiene sobre los beneficiarios.</li>
                                <li>-Beneficiarios: Deben usar los recursos y apoyos de la plataforma de manera responsable, respetando las normas de la comunidad y fomentando un ambiente de respeto hacia los demás.</li>
                                <li>-Voluntarios: Son responsables de cumplir con los programas de capacitación, seguir los lineamientos éticos de la organización y desempeñar su papel de forma profesional y respetuosa.</li>
                            </ul>
                        </li>
                        <li><strong>Actualización de Políticas:</strong> Las políticas se revisan y actualizan periódicamente para adaptarse a los cambios en la legislación aplicable y en las mejores prácticas del sector. Estas revisiones garantizan que la organización cumpla con los requisitos legales y se mantenga alineada con los estándares éticos y de seguridad en la protección de datos personales y la privacidad de los usuarios.</li>
                    </ul>
                `;
                break;
            case 'infracciones':
                title = 'Detección de infracciones';
                content = `
                    <ul class="list-disc pl-6">
                        <li><strong>Monitoreo de Actividad:</strong> La plataforma realiza un seguimiento continuo de la actividad de todos los participantes (donantes, beneficiarios y voluntarios) para detectar comportamientos o actividades que puedan infringir las normas establecidas. Este monitoreo es especialmente riguroso en el contexto de las clases y el uso de los fondos donados, donde se busca asegurar que todos los recursos se utilicen de manera ética y conforme a los términos de la plataforma. Las actividades que se consideran fuera de las normas o que presenten patrones inusuales son automáticamente señaladas para su revisión, con el fin de tomar medidas correctivas si es necesario.</li>
                        <li><strong>Evaluación de Conducta:</strong> La conducta de los voluntarios en sus interacciones con los beneficiarios es evaluada para garantizar que cumplan con los estándares éticos, pedagógicos y profesionales de la plataforma. Esta evaluación no solo busca proteger a los beneficiarios, sino también fortalecer la calidad de la enseñanza y los servicios ofrecidos. Ante comportamientos inadecuados o reportes de usuarios, la plataforma activa una investigación que puede incluir la revisión de mensajes, reportes de conducta y resultados de las actividades realizadas. El objetivo es tomar medidas preventivas o correctivas que protejan a la comunidad y mantengan la integridad de los programas..</li>
                        <li><strong>Detección de Irregularidades:</strong> La plataforma confía en los reportes de la comunidad y en la revisión manual de las actividades para identificar comportamientos sospechosos o actividades que puedan infringir las normas. Los informes de usuarios y el monitoreo regular permiten a la plataforma detectar posibles irregularidades o usos indebidos de los recursos. Cuando se identifica una actividad anómala, se activa una revisión por parte del equipo de cumplimiento, que evalúa la situación y toma las medidas necesarias para resolver el problema.</li>
                    </ul>
                `;
                break;
            case 'denuncia':
                title = 'Denuncia de contenido';
                content = `
                    <ul class="list-disc pl-6">
                        <li><strong>Mecanismo de Denuncia:</strong> La plataforma proporciona a todos los usuarios un mecanismo accesible y sencillo para reportar contenido o actividades que consideren inapropiadas o que infrinjan los términos y condiciones establecidos. Este sistema permite denunciar diversos tipos de comportamientos, como intentos de fraude, uso indebido de fondos, conductas inapropiadas en las interacciones, y actividades que vulneren la integridad de las clases o los valores de la comunidad. La funcionalidad de denuncia está disponible directamente en la plataforma y busca proteger el ambiente de respeto y seguridad, promoviendo un entorno en el que todos los usuarios se sientan respaldados y puedan expresar sus inquietudes.</li>
                        <li><strong>Evaluación de Denuncias:</strong> Cada denuncia que se recibe es tratada de forma confidencial y evaluada minuciosamente por un equipo de cumplimiento dedicado a asegurar que se respeten las políticas de la plataforma. Este equipo analiza los detalles de cada denuncia para determinar si el contenido o comportamiento reportado infringe alguna norma establecida. Las denuncias se gestionan con imparcialidad, buscando recopilar toda la información relevante antes de tomar una decisión. En casos en que sea necesario, el equipo puede realizar entrevistas, revisar historial de actividades, o solicitar pruebas adicionales para asegurar que todas las denuncias se evalúen de manera justa y completa.</li>
                        <li><strong>Comunicación del Resultado:</strong> Una vez concluida la investigación, la plataforma informa al denunciante sobre el estado y resultado de su denuncia. Esta comunicación se realiza sin comprometer la privacidad de los demás usuarios involucrados, respetando los principios de confidencialidad. El denunciante recibirá una notificación que le indicará si se tomaron medidas correctivas, como advertencias, suspensiones temporales o cualquier otra acción acorde con la gravedad de la situación. La transparencia en el proceso de denuncia y la comunicación de resultados refuerzan la confianza de los usuarios en los procedimientos de la plataforma y aseguran que las políticas se apliquen de manera coherente y equitativa.</li>
                    </ul>
                `;
                break;
            case 'aplicacion':
                title = 'Aplicación de políticas';
                content = `
                    <ul class="list-disc pl-6">
                        <li><strong>Medidas Correctivas:</strong>Para mantener un ambiente seguro y respetuoso, la plataforma implementa una serie de medidas correctivas cuando se detectan infracciones a sus políticas. Estas medidas se aplican en función de la gravedad de la infracción y pueden variar desde advertencias leves hasta la suspensión temporal o, en casos graves o reincidentes, la eliminación definitiva de la cuenta del usuario. Las advertencias se emiten para infracciones menores o como recordatorio de las normas de la comunidad. En caso de conductas más serias, se pueden imponer suspensiones temporales para permitir que el usuario reflexione sobre sus acciones. La eliminación de la cuenta se reserva para situaciones que violen gravemente las políticas de la plataforma o cuando los usuarios muestran un patrón continuo de conducta inadecuada. Estas medidas son fundamentales para proteger a todos los miembros de la comunidad y asegurar el cumplimiento de los términos y condiciones establecidos.</li>
                        <li><strong>Derecho de Apelación:</strong>La plataforma reconoce el derecho de los usuarios sancionados a cuestionar las medidas correctivas tomadas en su contra. Cualquier usuario que considere injusta una sanción puede iniciar un proceso de apelación, en el cual se revisará exhaustivamente su caso. Este proceso de revisión tiene como objetivo asegurar que todas las decisiones sean justas, apropiadas y estén basadas en evidencia clara. Los usuarios pueden presentar pruebas adicionales, expresar su perspectiva y recibir una respuesta formal del equipo encargado de las apelaciones. Este enfoque transparente y accesible refuerza el compromiso de la plataforma con la equidad, garantizando que las sanciones se apliquen de manera objetiva y respetuosa hacia todos los usuarios involucrados.</li>
                    </ul>
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
        showInfo('politicas'); // Mostrar el contenido de "Desarrollo de políticas" por defecto
    });
</script>

@endsection
