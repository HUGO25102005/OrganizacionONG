// Control de las pestañas
function showTab(tabName) {
    const tabs = document.querySelectorAll('.tab-content');
    const buttons = document.querySelectorAll('.tab-button');

    tabs.forEach(tab => {
        tab.classList.remove('active');
    });
    buttons.forEach(button => {
        button.classList.remove('active');
    });

    document.getElementById(tabName).classList.add('active');
    document.querySelector(`.tab-button[onclick*="${tabName}"]`).classList.add('active');
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

