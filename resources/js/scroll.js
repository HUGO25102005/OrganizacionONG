const scrollButton = document.getElementById('scrollButton');
const scrollIcon = document.getElementById('scrollIcon');

// Detectar posición del scroll y cambiar ícono
window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY; // Posición actual del scroll
    const windowHeight = window.innerHeight; // Altura de la ventana visible
    const fullHeight = document.documentElement.scrollHeight; // Altura total del documento

    if (scrollTop + windowHeight >= fullHeight - 10) {
        // Si estamos cerca del final de la página
        scrollIcon.className = 'bx bxs-chevron-up'; // Cambiar ícono a "arriba"
    } else {
        // Si no estamos al final
        scrollIcon.className = 'bx bxs-chevron-down'; // Cambiar ícono a "abajo"
    }
});

// Función para el botón de scroll
scrollButton.addEventListener('click', () => {
    const scrollTop = window.scrollY; // Posición actual del scroll
    const windowHeight = window.innerHeight; // Altura de la ventana visible
    const fullHeight = document.documentElement.scrollHeight; // Altura total del documento

    if (scrollTop + windowHeight >= fullHeight - 10) {
        // Si estamos al final, subimos
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } else {
        // Si no estamos al final, bajamos
        window.scrollTo({ top: fullHeight, behavior: 'smooth' });
    }
});