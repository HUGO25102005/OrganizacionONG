document.querySelectorAll('.link-terminos').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault(); // Evita la acción por defecto

        fetch('/terminosCondiciones/') // Ruta definida en Laravel
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al cargar los términos y condiciones');
                }
                return response.text();
            })
            .then(html => {
                const contenedor = document.getElementById('contenido-dinamico');
                contenedor.innerHTML = html; // Inserta el contenido cargado
                contenedor.classList.remove('hidden'); // Muestra el contenedor dinámico

                // Ejecuta los scripts del contenido cargado
                const scripts = contenedor.querySelectorAll('script');
                scripts.forEach(script => {
                    const newScript = document.createElement('script');
                    newScript.textContent = script.textContent; // Copia el contenido del script
                    document.body.appendChild(newScript); // Lo agrega al DOM
                    document.body.removeChild(newScript); // Limpia el script después de ejecutarlo
                });

                // Selecciona el primer elemento de la lista y activa su contenido (si aplica)
                const firstItem = contenedor.querySelector('ul li'); // Selecciona el primer <li> dentro del contenido dinámico
                if (firstItem) {
                    setActive(firstItem); // Activa el primer <li>
                    showInfo('identidad'); // Muestra el contenido correspondiente al primer <li>
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});

// Manejo del botón "Volver" dentro del contenido dinámico
document.addEventListener('click', function (e) {
    if (e.target && e.target.id === 'volver') {
        const contenedor = document.getElementById('contenido-dinamico');
        contenedor.innerHTML = ''; // Limpia el contenido
        contenedor.classList.add('hidden'); // Oculta el contenedor dinámico
    }
});