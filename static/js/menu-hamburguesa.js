function toggleMenu() {
    const botonHamburguesa = document.querySelector('.boton-hamburguesa');
    const menuMovil = document.querySelector('.menu-movil');
    const overlay = document.querySelector('.overlay-menu');

    botonHamburguesa.classList.toggle('activo');
    menuMovil.classList.toggle('activo');
    overlay.classList.toggle('activo');
}

function cerrarMenu() {
    const botonHamburguesa = document.querySelector('.boton-hamburguesa');
    const menuMovil = document.querySelector('.menu-movil');
    const overlay = document.querySelector('.overlay-menu');

    botonHamburguesa.classList.remove('activo');
    menuMovil.classList.remove('activo');
    overlay.classList.remove('activo');
}

// Cerrar menú al redimensionar ventana
window.addEventListener('resize', function () {
    if (window.innerWidth > 768) {
        cerrarMenu();
    }
});