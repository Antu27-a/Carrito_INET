// Sistema de menú dinámico por roles
const rolUsuario = "visitante" // podés cambiar a 'usuario' o 'jefe'

// Opciones por rol
const menuPorRol = {
  visitante: [
    { texto: "Iniciar Sesión", href: "l" },
    { texto: "Regístrate", href: "" },
  ],
  usuario: [
    { texto: "Productos", href: "/pages/productos.html" },
    { texto: "Carrito", href: "/pages/carrito.html" },
    { texto: "Mis Pedidos", href: "/pages/pedidos.html" },
    { texto: "Cerrar Sesión", href: "/logout.php" },
  ],
  jefe: [
    { texto: "Cargar Producto", href: "/pages/carga-producto.html" },
    { texto: "Ver Pedidos", href: "/pages/ver-pedidos.html" },
    { texto: "Cuenta", href: "/pages/cuenta.html" },
    { texto: "Cerrar Sesión", href: "/logout.php" },
  ],
}

// Función para mostrar un modal (se define aquí para que esté disponible)
function mostrarModal(modalId) {
  const modal = document.getElementById(modalId)
  if (modal) {
    modal.classList.add("active")
    document.body.style.overflow = "hidden"
  }
}

// Función para cargar el menú
function cargarMenu(rol) {
  const menu = document.getElementById("nav-menu")
  if (!menu || !menuPorRol[rol]) return

  menu.innerHTML = ""
  menuPorRol[rol].forEach((item) => {
    const li = document.createElement("li")
    const a = document.createElement("a")
    a.href = item.href
    a.textContent = item.texto

    // Agregar event listeners para los botones de visitante
    if (rol === "visitante") {
      if (item.href === "l") {
        a.addEventListener("click", (e) => {
          e.preventDefault()
          mostrarModal("login-modal")
        })
      } else if (item.href === "") {
        a.addEventListener("click", (e) => {
          e.preventDefault()
          mostrarModal("register-modal")
        })
      }
    }

    li.appendChild(a)
    menu.appendChild(li)
  })
}

// Función para cambiar rol (útil para testing)
function cambiarRol(nuevoRol) {
  if (menuPorRol[nuevoRol]) {
    cargarMenu(nuevoRol)
  }
}

// Ejecutar cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", () => {
  cargarMenu(rolUsuario)
})

// Exportar funciones para uso global
window.cargarMenu = cargarMenu
window.cambiarRol = cambiarRol
window.mostrarModal = mostrarModal
