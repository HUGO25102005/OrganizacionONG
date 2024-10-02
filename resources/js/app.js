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
