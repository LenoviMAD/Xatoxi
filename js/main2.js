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
import Timer from './timer.js';
// console.log(location);
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
    const timer = new Timer()


    window.onload = function () {
        const modalInactividad = document.getElementById('modalInactividad')
        if (modalInactividad) {
            inactivityTime();
        }
    }


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

            modal.closeModal('loader')

            if (res.code === "0000") {
                // Abrimos modal
                if (document.querySelector('#modalCambioPin .centrarObjets p')) {
                    document.querySelector('#modalCambioPin .centrarObjets p').remove()
                }
                var pinAnterior = ''

                modal.openModal('modalCambioPin')
                document.querySelector('#modalCambioPin h1').innerText = "CAMBIAR PIN"

                // cerrando modal por fuera
                document.addEventListener("click", e => {
                    if (e.target == document.querySelector("#modalCambioPin")) {
                        pinAnterior = ''
                        // console.log('que bolas');
                    }
                    
                    //presionando escape
                    document.addEventListener("keyup", e => {
                        if (e.key == "Escape" && document.querySelector("#modalCambioPin")) {
                            // console.log('que bolas2');
                            pinAnterior = ''
                        }
                    })
                })

                btnPinChange.addEventListener('click', async () => {
                    if (!pinAnterior) {
                        pinAnterior = cambioPin.value
                        cambioPin.value = ''
                        document.querySelector('#modalCambioPin h1').innerText = "CONFIRMAR PIN"
                        console.log(pinAnterior, cambioPin.value);
                        return
                    } else {
                        // console.log(pinAnterior, cambioPin.value);
                        if (pinAnterior === cambioPin.value) {

                            // Abrimos el loader
                            modal.closeModal('modalCambioPin')
                            modal.openModal('loader', undefined, undefined, false)

                            const body = new FormData()
                            body.append("cond", "updpin")
                            body.append("pin", inputPin.value)
                            body.append("newpin", cambioPin.value)
                            body.append("tag", inputTag.value)
                            const data = await fetch("ajax.php", { method: 'POST', body })
                            const res = await data.json()

                            // Cerramos modal
                            modal.closeModal('loader')

                            if (res.code === "0000") {
                                modal.openModal('modalSuccess2', 'Autenticacion', res.message)
                            } else if (res.code === "5000") {
                                modal.openModal('modalDanger', 'Autenticacion', res.message)
                            } else {
                                modal.openModal('modalDanger', 'Autenticacion', 'Ocurrio un error, favor intente de nuevo')
                            }

                            cambioPin.value = ''
                            pinAnterior = ''
                            return
                        } else {
                            if ((!document.querySelector('#modalCambioPin div.centrarObjets p') && (pinAnterior !== cambioPin.value))) {
                                let test = document.createElement('p')
                                test.innerText = 'Los pins no coinciden'
                                test.style.color = 'red'
                                let test2 = document.querySelector('#modalCambioPin div.centrarObjets')
                                test2.append(test)
                            }
                        }
                    }
                    cambioPin.value = ''
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

    var inactivityTime = function () {
        var time;
        window.onload = resetTimer;
        // DOM Events
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;
        document.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onmousedown = resetTimer; // touchscreen presses
        document.ontouchstart = resetTimer;
        document.onclick = resetTimer; // touchpad clicks
        document.onscroll = resetTimer; // scrolling with arrow keys
        document.onkeypress = resetTimer;

        function logout() {
            modal.openModal("modalInactividad")
            timer.closeWindowClock()
            document.querySelector("[data-id='btnNo']").addEventListener('click', async e => {
                e.preventDefault()
                location.href = "./index.php";
            })

            document.querySelector("[data-id='btnYes']").addEventListener('click', async e => {
                e.preventDefault()
                resetTimer()
            })



            //location.href = 'logout.html'
        }

        function resetTimer() {
            clearTimeout(time);
            time = setTimeout(logout, 120000)
        }
    };

})