export default class Modal {
    initModal = () => {
        const openEls = document.querySelectorAll("[data-open]")
        const closeEls = document.querySelectorAll("[data-close]")
        const removeEls = document.querySelectorAll("[data-remove]")
        const isVisible = "is-visible"

        // abrir modales
        for (const el of openEls) {
            el.addEventListener("click", function() {
                const modalId = this.dataset.open
                document.getElementById(modalId).classList.add(isVisible)
            })
        }

        // cerrando modal en el boton
        for (const el of closeEls) {
            el.addEventListener("click", function(e) {
                e.preventDefault()
                this.closest(".modal").classList.remove(isVisible)
            })
        }

        // cerrando modal en el boton
        for (const el of removeEls) {
            el.addEventListener("click", function(e) {
                e.preventDefault()
                this.closest(".modal").remove(isVisible)
            })
        }
    }
    openModal = (idmodal, title = "", message = "", closeout = true, customHidden = false) => {
        const miModal = document.getElementById(idmodal)

        // Seteando boton regresar o index
        let custom1 = document.querySelector(`#modalSuccess footer button`)
        let custom2 = document.querySelector(`#modalSuccess footer a`)

        if (custom1 && custom2) {
            if (!custom1.classList.contains('hidden')) {
                custom1.classList.add('hidden')
            }
            if (custom2.classList.contains('hidden')) {
                custom2.classList.remove('hidden')
            }
        }

        // Cerrando modales por fuera y con esc
        if (closeout) {
            this.closeOut()
        }

        if (title || message) {
            document.querySelector(`#${miModal.getAttribute('id')} .modal__title`).innerHTML = title
            document.querySelector(`#${miModal.getAttribute('id')} .modal__text`).innerHTML = message
        }
        if (customHidden) {
            custom1.classList.remove('hidden')
            custom2.classList.add('hidden')
        }
        if (miModal) {
            miModal.classList.add('is-visible')
        }
    }
    closeModal = (idmodal) => {
        const miModal = document.getElementById(idmodal)
        if (miModal) {
            miModal.classList.remove('is-visible')
        }
    }
    removeModal = (idmodal) => {
        const miModal = document.getElementById(idmodal)
        miModal.remove()
    }
    closeOut = () => {
        const isVisible = "is-visible"

        // cerrando modal por fuera
        document.addEventListener("click", e => {
            if (e.target == document.querySelector(".modal.is-visible")) {
                document.querySelector(".modal.is-visible").classList.remove(isVisible)
            }

            //presionando escape
            document.addEventListener("keyup", e => {
                if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
                    document.querySelector(".modal.is-visible").classList.remove(isVisible)
                }
            })
        })
    }
}