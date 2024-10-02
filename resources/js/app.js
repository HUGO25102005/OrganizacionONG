import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


window.addEventListener('scroll', function() {
    var counters = document.querySelectorAll('.count');
    var speed = 200; // Velocidad de la animación

    counters.forEach(counter => {
        var animate = () => {
            var value = +counter.getAttribute('data-count');
            var data = +counter.innerText.replace(/,/g, ''); // Elimina las comas para hacer cálculos
            
            var increment = value / speed;
            
            if (data < value) {
                counter.innerText = Math.ceil(data + increment).toLocaleString(); // Formatea con comas
                setTimeout(animate, 20);
            } else {
                counter.innerText = value.toLocaleString(); // Asegura que el número final también esté formateado
            }
        }
        
        var position = counter.getBoundingClientRect().top;
        var screenPosition = window.innerHeight / 1.3;

        if (position < screenPosition) {
            animate();
        }
    });
});





document.addEventListener('DOMContentLoaded', function () {
    // Modal Administradores
    const modalAgregarAdmin = document.getElementById('modalAgregarAdmin');
    const botonAbrirAdmin = document.querySelector('.add-admin-button');
    const botonCancelarAdmin = document.getElementById('cancelarModal');

    // Abrir modal de agregar administrador
    botonAbrirAdmin.addEventListener('click', function () {
        modalAgregarAdmin.classList.remove('hidden');
    });

    // Cerrar modal de agregar administrador
    botonCancelarAdmin.addEventListener('click', function () {
        modalAgregarAdmin.classList.add('hidden');
    });

    // Modal Coordinadores
    const modalAgregarCoordinador = document.getElementById('modalAgregarCoordinador');
    const botonAbrirCoordinador = document.getElementById('botonAbrirModal');
    const botonCancelarCoordinador = document.getElementById('cancelarModalCoordinador');

    // Abrir modal de agregar coordinador
    botonAbrirCoordinador.addEventListener('click', function () {
        modalAgregarCoordinador.classList.remove('hidden');
    });

    // Cerrar modal de agregar coordinador
    botonCancelarCoordinador.addEventListener('click', function () {
        modalAgregarCoordinador.classList.add('hidden');
    });

    // Modal Voluntarios
    const modalAgregarVoluntario = document.getElementById('modalAgregarVoluntario');
    const botonAbrirVoluntario = document.getElementById('btnAgregarVoluntario');
    const botonCancelarVoluntario = document.getElementById('cancelarModalVoluntario');

    // Abrir modal de agregar voluntario
    botonAbrirVoluntario.addEventListener('click', function () {
        modalAgregarVoluntario.classList.remove('hidden');
    });

    // Cerrar modal de agregar voluntario
    botonCancelarVoluntario.addEventListener('click', function () {
        modalAgregarVoluntario.classList.add('hidden');
    });
});

//-----------------------Contador regresivo de donaciones------------------------
window.addEventListener('scroll', function() {
    var counters = document.querySelectorAll('.count');
    var speed = 200; // Velocidad de la animación

    counters.forEach(counter => {
        var animate = () => {
            var value = +counter.getAttribute('data-count');
            var data = +counter.innerText.replace(/,/g, ''); // Elimina las comas para hacer cálculos
            
            var increment = value / speed;
            
            if (data < value) {
                counter.innerText = Math.ceil(data + increment).toLocaleString(); // Formatea con comas
                setTimeout(animate, 20);
            } else {
                counter.innerText = value.toLocaleString(); // Asegura que el número final también esté formateado
            }
        }
        
        var position = counter.getBoundingClientRect().top;
        var screenPosition = window.innerHeight / 1.3;

        if (position < screenPosition) {
            animate();
        }
    });
});


//Codigo de otra cosa
let slideIndex = 1;
showSlides(slideIndex);

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("carousel-slide");
    let dots = document.getElementsByClassName("dot");

    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.transform = `translateX(${-(slideIndex - 1) * 100}%)`;
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    dots[slideIndex - 1].className += " active";
}



//---------------------Carrusel de transparencia------------------------ 
// Obtener los elementos de las flechas (prev y next)
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');

// Obtener el contenedor del carrusel y los elementos dentro del carrusel
let carruselDom = document.querySelector('.carrusel');
let SliderDom = carruselDom.querySelector('.carrusel .list');
let thumbnailBorderDom = document.querySelector('.carrusel .thumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carrusel .time');

// Duración para la barra de tiempo y para el cambio automático de imágenes
let timeRunning = 3000; // Tiempo de animación para transiciones
let timeAutoNext = 7000; // Tiempo entre el cambio automático de imágenes

// Esta variable controlará el temporizador para el cambio automático de imágenes
let runNextAuto;

// Función que reinicia el temporizador de cambio automático de imágenes
function restartAutoNext() {
    // Limpiamos cualquier temporizador previo para evitar conflictos
    clearTimeout(runNextAuto);

    // Configuramos el temporizador para cambiar de imagen automáticamente
    runNextAuto = setTimeout(() => {
        nextDom.click(); // Simula un clic en el botón "next" para cambiar la imagen
    }, timeAutoNext);
}

// Función que controla el cambio de imagen del carrusel
function showSlider(type) {
    // Obtener los elementos actuales del slider (imágenes principales) y las miniaturas
    let SliderItemsDom = SliderDom.querySelectorAll('.carrusel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carrusel .thumbnail .item');

    // Reiniciar la barra de tiempo (línea de progreso)
    timeDom.style.transition = 'none';  // Eliminar cualquier animación anterior
    timeDom.style.width = '0%';         // Reiniciar el ancho de la barra a 0%

    // Usamos un pequeño retardo antes de iniciar la nueva animación de la barra de tiempo
    setTimeout(() => {
        timeDom.style.transition = `width ${timeAutoNext}ms linear`; // Configuramos la nueva animación
        timeDom.style.width = '100%';  // Inicia la animación de la barra de tiempo
    }, 50); // Le damos un pequeño tiempo para que el navegador pueda procesarlo

    // Lógica para avanzar al siguiente slide o retroceder
    if (type === 'next') {
        // Mover el primer elemento del slider al final
        SliderDom.appendChild(SliderItemsDom[0]);
        // Mover la primera miniatura al final
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        // Añadir la clase para la animación "next"
        carruselDom.classList.add('next');
    } else {
        // Mover el último elemento del slider al inicio
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        // Mover la última miniatura al inicio
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
        // Añadir la clase para la animación "prev"
        carruselDom.classList.add('prev');
    }

    // Limpiar las clases de animación después de un tiempo para evitar acumulación
    setTimeout(() => {
        carruselDom.classList.remove('next');
        carruselDom.classList.remove('prev');
    }, timeRunning);
}

// Eventos para los botones de flechas (siguiente y anterior)
nextDom.onclick = function () {
    showSlider('next');  // Muestra el siguiente slide
    restartAutoNext();   // Reinicia el temporizador para el cambio automático
};

prevDom.onclick = function () {
    showSlider('prev');  // Muestra el slide anterior
    restartAutoNext();   // Reinicia el temporizador para el cambio automático
};

// Inicia el ciclo automático del carrusel cuando la página se carga completamente
document.addEventListener('DOMContentLoaded', function () {
    restartAutoNext();  // Iniciar el ciclo automático al cargar la página
});
