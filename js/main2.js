// Imports
import envio from './modules/envio.js'
import venta from './modules/venta.js'
import compra from './modules/compra.js'
import cambio from './modules/cambio.js'
import recepcion from './modules/recepcion.js'
import register from './modules/register.js'
import auth from './modules/auth.js'
import perfil from './modules/perfil.js'
import canvas from './modules/canvas.js'
import Modal from './modules/Modal.js';

// Modules init
envio()
venta()
compra()
cambio()
recepcion()
register()
auth()
perfil()
canvas()

document.addEventListener('DOMContentLoaded', () => {
    const modal = new Modal()
    modal.initModal()

    const btnForgetPin = document.getElementById('btnForgetPin'),
        inputTag = document.getElementById('inputTag'),
        inputPin = document.getElementById('inputPin'),
        openPinChange = document.getElementById('openPinChange')

    if (btnForgetPin) {
        const btnOlvidoPinModal = document.getElementById('btnOlvidoPinModal')
        btnForgetPin.addEventListener('click', e => {
            e.preventDefault()

            if (inputTag.value.trim() === '') {
                modal.openModal('modalDanger', 'Olvido de pin', 'Tag must be speciefied')
                return
            }

            // Abrimos modal
            modal.openModal('modalOlvioPin')

            btnOlvidoPinModal.addEventListener('click', async () => {
                // Fetch session currectly
                const body = new FormData()
                body.append("cond", "resetpin")
                body.append("tag", inputTag.value)

                // Abrimos el loader
                modal.openModal('loader', undefined, undefined, false)

                const data = await fetch("ajax.php", { method: 'POST', body })
                const res = await data.json()

                // Cerramos modal
                modal.closeModal('loader')
                modal.closeModal('modalOlvioPin')

                if (res.code === "0000") {
                    modal.openModal('modalSuccess2', 'Email enviado', res.message)
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', 'Datos incompletos', res.message)
                } else {
                    modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                }
            })
        })

    }

    if (openPinChange) {
        const btnPinChange = document.getElementById('btnPinChange')
        const cambioPin = document.getElementById('cambioPin')
        openPinChange.addEventListener('click', async e => {
            e.preventDefault()

            modal.openModal('loader', undefined, undefined, false)
            const formData = new FormData();
            formData.append("cond", "AuthPin");
            formData.append("pin", inputPin.value);
            formData.append("tag", inputTag.value);
            const data = await fetch("ajax.php", { method: 'POST', body: formData });
            const res = await data.json();
            console.log(res);

            modal.closeModal('loader')

            if (res.code === "0000") {
                // Abrimos modal
                modal.openModal('modalCambioPin')
                let pinAnterior

                btnPinChange.addEventListener('click', async () => {
                    if (!pinAnterior) {
                        pinAnterior = cambioPin.value
                        cambioPin.value = ''
                        document.querySelector('#modalCambioPin h1').innerText = "Confirmar PIN"
                        return
                    }

                    if (pinAnterior === cambioPin.value) {
                        // Abrimos el loader
                        modal.closeModal('modalCambioPin')
                        modal.openModal('loader', undefined, undefined, false)

                        const body = new FormData()
                        body.append("cond", "updpin")
                        body.append("pin", cambioPin.value)
                        body.append("tag", inputTag.value)
                        const data = await fetch("ajax.php", { method: 'POST', body })
                        const res = await data.json()
                        console.log(res)

                        // Cerramos modal
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess2', 'Autenticacion', res.message)
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', 'Autenticacion', res.message)
                        } else {
                            modal.openModal('modalDanger', 'Autenticacion', 'Ocurrio un error, favor intente de nuevo')
                        }
                    }
                })
            } else if (res.code === "6000") {
                modal.openModal('modalDanger', 'Autenticación', res.message)
            } else if (res.code === "5000") {
                modal.openModal('modalDanger', 'Autenticación', res.message)
            } else {
                modal.openModal('modalDanger', 'Autenticación', 'Ocurrio un error, favor intente de nuevo')
            }

        })
    }

})