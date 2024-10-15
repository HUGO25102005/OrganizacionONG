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
                        <p class="text-lg"><strong>Desarrollo de políticas:</strong> Aquí se describe cómo desarrollamos nuestras políticas
                        para mantener la seguridad de nuestra comunidad y cómo se actualizan para enfrentar nuevos desafíos.</p>
                    `;
                    break;
                case 'infracciones':
                    title = 'Detección de infracciones';
                    content = `
                        <p class="text-lg"><strong>Detección de infracciones:</strong> Explicamos los métodos que utilizamos para identificar
                        infracciones dentro de la comunidad y cómo se maneja este proceso.</p>
                    `;
                    break;
                case 'denuncia':
                    title = 'Denuncia de contenido';
                    content = `
                        <p class="text-lg"><strong>Denuncia de contenido:</strong> Proporcionamos una descripción de cómo los usuarios pueden
                        reportar contenido que viola nuestras políticas, y cómo revisamos esas denuncias.</p>
                    `;
                    break;
                case 'aplicacion':
                    title = 'Aplicación de políticas';
                    content = `
                        <p class="text-lg"><strong>Aplicación de políticas:</strong> Explicamos los pasos que tomamos para hacer cumplir nuestras
                        políticas y las posibles consecuencias para los infractores.</p>
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
