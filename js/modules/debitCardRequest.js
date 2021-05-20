import Modal from './Modal.js';
import Timer from '../timer.js';
import { servicioFirma, toBase64 } from '../helpers.js';

// Solicitud de tarjeta para recibir remesas
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        // const userSession = async () => {
        //     // Fetch session currectly
        //     const formDataUserSession = new FormData();
        //     formDataUserSession.append("cond", "session");

        //     const dataUserSession = await fetch("ajax.php", { method: 'POST', body: formDataUserSession });
        //     const test = await dataUserSession.json();
        //     return test
        // }
        // const resUserSession = await userSession()
        const modal = new Modal()
        const timer = new Timer
        modal.initModal()

        const requestDebitConsignmentForm = document.getElementById('requestDebitConsignmentForm')
        if (requestDebitConsignmentForm) {
            const TITLE_SECTION = "SOLICITUD TARJETA DÉBITO"
            const typeDocWallet = document.querySelector(`#${requestDebitConsignmentForm.getAttribute('id')} [name="typeDocWallet"]`)
            const file = document.querySelector(`#${requestDebitConsignmentForm.getAttribute('id')} [name="file"]`)

            const btnModalFirma = document.getElementById('draw-submitBtn')
            const fileInputWallet = document.getElementById('fileInputWallet')

            // Inicio genotp
            async function init2() {
                // Cargando loader
                modal.openModal('loader', undefined, undefined, false)

                // GEN OTP FETCH
                let formData = new FormData()
                formData.append("cond", "genotp");
                let dataOtp = await fetch("ajax.php", { method: 'POST', body: formData });
                let resOtp = await dataOtp.json();

                // Quitando loader
                modal.closeModal('loader')

                if (resOtp.code == "0000") {
                    // abrir modal para ultimo fetch 
                    modal.openModal('otpVerification')
                    timer.updateClock()
                    document.getElementById('otpCode').value = resOtp.otp

                    document.querySelector("[data-id='btnOtp']").addEventListener('click', async e => {
                        e.preventDefault()

                        modal.closeModal('otpVerification')

                        // Cargando loader
                        modal.openModal('loader', undefined, undefined, false)

                        let formData = new FormData()

                        formData.append("cond", "mrequestdebitcard");

                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();

                        // Quitando loader
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess', TITLE_SECTION, res.message)
                        } else if (res.code.charAt(0) === "7") {
                            // MENSAJE DE ERROR
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)

                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)

                            // setear para donde redireccionara
                            let test = document.querySelector('#modalDanger a')
                            test.setAttribute("href", "./perfil.php")
                            test.removeAttribute("data-close")
                            test.removeAttribute("type")

                            test.addEventListener('click', e => {
                                location.href = "./perfil.php";
                            })
                        } else {
                           modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        }
                    })
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            }

            init2()

            // Despues de aceptar otp, solicitud de documento, si tiene todo en regla mostrara una modal de confirmacion sino,
            // Reenviara debitCardRequest

            // fetch final de venta
            // toggle de tipos de documentos
            typeDocWallet.addEventListener('change', async () => {
                /* 
                    ci: 1
                    firma: 2
                    huellas: 3
                    rif: 4
                */
                if (typeDocWallet.options[typeDocWallet.selectedIndex].value === '3') {
                    // abrir modal para hacer firma
                    modal.openModal('modalFirma')

                    btnModalFirma.addEventListener('click', async () => {
                        const encoded = document.getElementById('draw-image').getAttribute('src')

                        const payload = {
                            filename: `firma${Math.round(Math.random() * (100 - 1) + 1)}`,
                            encoded,
                            type: typeDocWallet.options[typeDocWallet.selectedIndex].value
                        }

                        // Quitando spinner
                        modal.closeModal('modalFirma')
                        // Cargando spinner
                        modal.openModal('loader', undefined, undefined, false)

                        const res = await servicioFirma(payload)

                        // Quitando spinner
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess', TITLE_SECTION, res.message, undefined, true)
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        } else {
                           modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        }
                    })
                } else {
                    // Activamos input para subir archivo
                    fileInputWallet.classList.remove('hidden')
                    togglePing()
                }
            })

            // docuemntos menos firma
            file.addEventListener('change', async (e) => {
                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

                // TODO: VALIDAR QUE SOLO SUBA IMAGENES
                // CONVERT TO BASE64
                let encoded = await toBase64(file.files[0])

                // UPLOAD DOCUMENT
                let formData = new FormData()
                formData.append("cond", "docUpload");
                formData.append("filename", file.files[0].name);
                formData.append("encoded", encoded);
                formData.append("type", typeDocWallet.options[typeDocWallet.selectedIndex].value);

                let dataUpload = await fetch("ajax.php", { method: 'POST', body: formData });
                let resUpload = await dataUpload.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (resUpload.code === "0000") {
                    togglePing()
                    modal.openModal('modalSuccess', TITLE_SECTION, resUpload.message, undefined, true)
                } else if (resUpload.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resUpload.message)
                } else {
                   modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            })

            function togglePing() {
                if (document.querySelector('.ping').classList.contains('hidden')) {
                    document.querySelector('.ping').classList.remove('hidden')
                }
            }

            // fetch final de venta
            requestDebitConsignmentForm.addEventListener('submit', async e => {
                e.preventDefault()

                // Cargando loader
                modal.openModal('loader', undefined, undefined, false)

                // GEN OTP FETCH
                let formData = new FormData()
                formData.append("cond", "genotp");
                let dataOtp = await fetch("ajax.php", { method: 'POST', body: formData });
                let resOtp = await dataOtp.json();

                // Quitando loader
                modal.closeModal('loader')

                if (resOtp.code == "0000") {
                    // abrir modal para ultimo fetch 
                    modal.openModal('otpVerification')
                    document.getElementById('otpCode').value = resOtp.otp

                    document.querySelector("[data-id='btnOtp']").addEventListener('click', async e => {
                        e.preventDefault()

                        modal.closeModal('otpVerification')

                        // Cargando loader
                        modal.openModal('loader', undefined, undefined, false)
                        let formData = new FormData(requestDebitConsignmentForm)

                        formData.append("cond", "mrequestdebitcard");
                        formData.append("otp", resOtp.otp);

                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();
                        // Quitando loader
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess', TITLE_SECTION, res.message)
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        } else {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        }
                    })
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                }
            })
        }
    })
}