document.addEventListener("DOMContentLoaded", () => {
  // Variables para el slider
  const slides = document.querySelectorAll(".slide")
  const dots = document.querySelectorAll(".dot")
  const prevBtn = document.querySelector(".prev-btn")
  const nextBtn = document.querySelector(".next-btn")
  let currentSlide = 0
  let slideInterval

  // Variables para los modales
  const inil = document.querySelector(".inis")
  const reisi = document.querySelector(".reis")
  const loginBtn = document.querySelector(".login-btn")
  const registerBtn = document.querySelector(".register-btn")
  const loginModal = document.getElementById("login-modal")
  const registerModal = document.getElementById("register-modal")
  const closeBtns = document.querySelectorAll(".close-modal")
  const showRegister = document.getElementById("show-register")
  const showLogin = document.getElementById("show-login")

  // Función para mostrar un slide específico
  function showSlide(n) {
    // Eliminar la clase active de todos los slides y dots
    slides.forEach((slide) => slide.classList.remove("active"))
    dots.forEach((dot) => dot.classList.remove("active"))

    // Mostrar el slide actual
    slides[n].classList.add("active")
    dots[n].classList.add("active")

    // Actualizar el índice del slide actual
    currentSlide = n
  }

  // Función para avanzar al siguiente slide
  function nextSlide() {
    let next = currentSlide + 1
    if (next >= slides.length) {
      next = 0
    }
    showSlide(next)
  }

  // Función para retroceder al slide anterior
  function prevSlide() {
    let prev = currentSlide - 1
    if (prev < 0) {
      prev = slides.length - 1
    }
    showSlide(prev)
  }

  // Iniciar el slider automático
  function startSlideInterval() {
    slideInterval = setInterval(nextSlide, 5000)
  }

  // Detener el slider automático
  function stopSlideInterval() {
    clearInterval(slideInterval)
  }

  // Event listeners para los botones del slider
  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      prevSlide()
      stopSlideInterval()
      startSlideInterval()
    })
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      nextSlide()
      stopSlideInterval()
      startSlideInterval()
    })
  }

  // Event listeners para los dots del slider
  dots.forEach((dot) => {
    dot.addEventListener("click", function () {
      const slideIndex = Number.parseInt(this.getAttribute("data-index"))
      showSlide(slideIndex)
      stopSlideInterval()
      startSlideInterval()
    })
  })

  // Función para mostrar un modal
  function showModal(modal) {
    if (modal) {
      modal.classList.add("active")
      document.body.style.overflow = "hidden" // Evitar scroll en el fondo
    }
  }

  // Función para cerrar un modal
  function closeModal(modal) {
    if (modal) {
      modal.classList.remove("active")
      document.body.style.overflow = "" // Restaurar scroll
    }
  }

  if (inil){
    como.addEventListener("click", () => {
      showModal(loginModal)
    }
    )
  }
  
  if (reisi){
    reisi.addEventListener("click", () => {
      showModal(registerModal)
    }
    )
  }

  // Event listeners para abrir modales (botones en la sección welcome)
  if (loginBtn) {
    loginBtn.addEventListener("click", () => {
      showModal(loginModal)
    })
  }

  if (registerBtn) {
    registerBtn.addEventListener("click", () => {
      showModal(registerModal)
    })
  }

  // Event listeners para cerrar modales
  closeBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      const modal = this.closest(".modal")
      closeModal(modal)
    })
  })

  // Cerrar modal al hacer clic fuera del contenido
  window.addEventListener("click", (e) => {
    if (e.target.classList.contains("modal")) {
      closeModal(e.target)
    }
  })

  // Cambiar entre modales
  if (showRegister) {
    showRegister.addEventListener("click", (e) => {
      e.preventDefault()
      closeModal(loginModal)
      showModal(registerModal)
    })
  }

  if (showLogin) {
    showLogin.addEventListener("click", (e) => {
      e.preventDefault()
      closeModal(registerModal)
      showModal(loginModal)
    })
  }

  // Prevenir envío de formularios (para demo)
  // const forms = document.querySelectorAll(".auth-form")
  // forms.forEach((form) => {
  //   form.addEventListener("submit", (e) => {
  //     e.preventDefault()
  //     alert("Funcionalidad en desarrollo. Esta es una demostración.")
  //   })
  // })

  // Efecto de parallax en el slider
  window.addEventListener("scroll", () => {
    const scrollPosition = window.scrollY
    const activeSlide = document.querySelector(".slide.active img")
    if (activeSlide && scrollPosition < window.innerHeight) {
      activeSlide.style.transform = `translateY(${scrollPosition * 0.3}px)`
    }
  })

  // Animación para los elementos al hacer scroll
  const animateOnScroll = () => {
    const elements = document.querySelectorAll(".feature, .section-title, .description")

    elements.forEach((element) => {
      const elementPosition = element.getBoundingClientRect().top
      const screenPosition = window.innerHeight / 1.3

      if (elementPosition < screenPosition) {
        element.style.opacity = "1"
        element.style.transform = "translateY(0)"
      }
    })
  }

  // Aplicar estilos iniciales para la animación
  const elementsToAnimate = document.querySelectorAll(".feature, .section-title, .description")
  elementsToAnimate.forEach((element) => {
    element.style.opacity = "0"
    element.style.transform = "translateY(20px)"
    element.style.transition = "opacity 0.6s ease, transform 0.6s ease"
  })

  // Event listener para la animación al hacer scroll
  window.addEventListener("scroll", animateOnScroll)

  // Llamar a la función una vez para animar elementos visibles inicialmente
  animateOnScroll()

  // Iniciar el slider si existen slides
  if (slides.length > 0) {
    showSlide(0)
    startSlideInterval()
  }

  // Crear un logo placeholder si no existe
  const logoImg = document.querySelector(".logo")
  if (logoImg && logoImg.naturalWidth === 0) {
    logoImg.src = "/placeholder.svg?height=60&width=60"
  }

  // Hacer las funciones disponibles globalmente para el menú dinámico
  window.showModal = showModal
  window.closeModal = closeModal
})
//--------------------------------------------------------------------------------------------------