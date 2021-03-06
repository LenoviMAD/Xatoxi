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
import debitCardRequest from './modules/debitCardRequest.js'
import Modal from './modules/Modal.js';
import Tarjeta from './modules/tarjeta.js';
import Timer from './timer.js';
import Translations from './Translations.js';
import Dropdown from './Dropdown.js';
import FaceApi from './modules/FaceApi.js';
import operationsReport from './modules/operationsReport.js';

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
debitCardRequest()
Translations()
Dropdown()
FaceApi()
operationsReport()
Tarjeta()

document.addEventListener('DOMContentLoaded', () => {

    const pepin = document.getElementById("pepin");

    if (pepin) {
        pepin.addEventListener("click", function () {
            window.open("pepinChat.html", "Emergente", "resizable=no, menubar=no, width=400, height=650, scrollbars=no, toolbar=no, tittlebar=no, status=yes")
        });
    }
    
    const modal = new Modal()
    modal.initModal()
    const timer = new Timer()

    // Nuevo modal login
    // REDIRECCIONAR PARA DONDE QUIERA

    if (document.getElementById('modalTest')) {
        // cuando cierras el modal por fuera
        document.addEventListener("click", e => {
            const items = document.getElementById("mainMenu");
            if (e.target == document.querySelector(".modal.is-visible")) {
                // Quitamos el active de los 
                items.childNodes.forEach(nodeItemCustom => {
                    if (nodeItemCustom.nodeName == "ARTICLE") {
                        if (nodeItemCustom.classList.contains("activeClass")) {
                            nodeItemCustom.classList.remove("activeClass")
                        }
                    }
                })
            }

            //presionando escape
            document.addEventListener("keyup", e => {
                if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
                    // resetea los botones
                    items.childNodes.forEach(nodeItemCustom => {
                        if (nodeItemCustom.nodeName == "ARTICLE") {
                            if (nodeItemCustom.classList.contains("activeClass")) {
                                nodeItemCustom.classList.remove("activeClass")
                            }
                        }
                    })
                }
            })
        })

        let items = document.getElementById("mainMenu");

        // Quitamos el active de los 
        items.childNodes.forEach(nodeItem => {
            nodeItem.addEventListener('click', () => {
                if (nodeItem.nodeName !== '#text') {
                    if (nodeItem.classList.contains('openModal')) {
                        nodeItem.classList.add("activeClass")
                        modal.openModal('modalTest')
                    }
                }
            })
        })
    }

    window.onload = function () {
        const modalInactividad = document.getElementById('modalInactividad')
        if (modalInactividad) {
            // inactivityTime();
        }
    }

    const btnForgetPin = document.getElementById('btnForgetPin'),
        inputTag = document.getElementById('inputTag'),
        inputPin = document.getElementById('inputPin'),
        openPinChange = document.getElementById('openPinChange')

    if (btnForgetPin) {
        const btnOlvidoPinModal = document.getElementById('btnOlvidoPinModal')
        const olvidoPinemail = document.getElementById('olvidoPinemail')

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
                body.append("email", olvidoPinemail.value)

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
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
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
                modal.openModal('modalDanger', 'Autenticaci??n', res.message)
            } else if (res.code === "5000") {
                modal.openModal('modalDanger', 'Autenticaci??n', res.message)
            } else {
                modal.openModal('modalDanger', 'Autenticaci??n', 'Ocurrio un error, favor intente de nuevo')
            }

        })
    }

    if (document.getElementById("btnDropdown")) {
        document.getElementById("btnDropdown").addEventListener('click', () => {
            document.getElementById("dropdownLanguages").classList.toggle("show");
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