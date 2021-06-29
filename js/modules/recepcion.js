import Modal from './Modal.js';
import { closeEverythingExceptThese, servicioFirma, closeEverything } from '../helpers.js';
import Timer from '../timer.js';
// Venta
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()
        const timer = new Timer

        const recepcionForm = document.getElementById('recepcionForm')

        if (recepcionForm) {
            const file = document.querySelector(`#${recepcionForm.getAttribute('id')} [name="file"]`)
            const fileInputReception = document.getElementById('fileInputReception')
            const docsReception = document.getElementById('docsReception')
            const typeDocReception = document.getElementById('typeDocReception')
            const btnModalFirma = document.getElementById('draw-submitBtn')

            const btnSubmitReception = document.querySelector('[data-targetping="recepcion"]')
            const formRecepcion = document.getElementById('formRecepcion')
            const bancoPagoMovil = document.querySelector(`#${recepcionForm.getAttribute('id')} [name="bancoPagoMovil"]`)
            const codeArea = document.querySelector(`#${recepcionForm.getAttribute('id')} [name="codeArea"]`)
            const countrycode = document.querySelector(`#${recepcionForm.getAttribute('id')} [name="countrycode"]`)
            const phone = document.querySelector(`#${recepcionForm.getAttribute('id')} [name="phone"]`)
            const bankAccount = document.querySelector(`#${recepcionForm.getAttribute('id')} [name="bankAccount"]`)
            const TITLE_SECTION = "Recepción"

            const init = async () => {
                // Fetch session currectly
                const formData = new FormData();
                formData.append("cond", "session");
                const data = await fetch("ajax.php", { method: 'POST', body: formData });
                const res = await data.json();

                bancoPagoMovil.childNodes.forEach(element => {
                    if (element.value === res.mpbankcode) {
                        element.setAttribute("selected", true)
                    }
                });

                countrycode.value = res.countrycode
                phone.value = res.phonenumber //.replace(res.countrycode, "").replace(res.areacode, "")
                codeArea.childNodes.forEach(element => {
                    if (element.value === res.areacode.trim()) {
                        element.setAttribute("selected", true)
                    }
                });
                bankAccount.value = res.bacc
            }

            init()

            // Toggle para mostrar modal (mas info)
            formRecepcion.addEventListener('change', async () => {
                // Mostramos boton de enviar
                if (btnSubmitReception.classList.contains('hidden')) {
                    btnSubmitReception.classList.remove('hidden')
                }
            })

            // fetch final de venta
            recepcionForm.addEventListener('submit', async (e) => {
                e.preventDefault()

                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

                let formData = new FormData(recepcionForm)

                formData.append("cond", "receptionok");
                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                let res = await data.json();

                if (res.code === "0000") {
                    // GEN OTP FETCH
                    let formData = new FormData()
                    formData.append("cond", "genotp");
                    let dataOtp = await fetch("ajax.php", { method: 'POST', body: formData });
                    let resOtp = await dataOtp.json();

                    // Quitando spinner
                    modal.closeModal('loader')

                    if (resOtp.code == "0000") {
                        // abrir modal para ultimo fetch 
                        modal.openModal('otpVerification')
                        timer.updateClock()
                        document.getElementById('otpCode').value = resOtp.otp

                        document.querySelector("[data-id='btnOtp']").addEventListener('click', async e => {
                            e.preventDefault()

                            try {
                                modal.closeModal('otpVerification')

                                // Cargando spinner
                                modal.openModal('loader', undefined, undefined, false)

                                let formData = new FormData(recepcionForm)

                                formData.append("cond", "reception");
                                formData.append("otp", resOtp.otp);
                                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                                let resFinal = await data.json();

                                // Quitando spinner
                                modal.closeModal('loader')

                                if (resFinal.code === "0000") {
                                    modal.openModal('modalSuccess', 'Transaccion satisfactoria', resFinal.message, undefined)
                                } else if (resFinal.code === "5000") {
                                    modal.openModal('modalDanger', TITLE_SECTION, resFinal.message)
                                } else {
                                    modal.openModal('modalDanger', TITLE_SECTION, resFinal.message)
                                }
                            } catch (error) {
                                console.log(error)
                            }
                        })
                    } else if (resOtp.code === "5000") {
                        modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                    } else {
                        modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                    }
                } else if (res.code === "5000") {
                    // Quitando spinner
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else if (res.code.charAt(0) === "7") {
                    modal.closeModal('loader')

                    // MENSAJE DE ERROR
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)

                    // MOSTRAMOS LOS CAMPOS PA' QUE SUBAN DOCUMENTOS
                    docsReception.classList.remove('hidden')
                } else {
                    // Quitando spinner
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            })

            formRecepcion.addEventListener('change', async () => {
                // Mostramos boton de enviar
                let valueSelected = formRecepcion.options[formRecepcion.selectedIndex].value;
                /*
                1 = Efectivo
                2 = Billetera 
                3 = Depósito en Cuenta
                4 = Pago Movil 
                5 = Tarjeta de Credito 
                6 = ACH 
                7 = Tarjeta Prepagada 
                8 = Tarjeta de Debito en Divisa 
                */

                if (valueSelected === "3") {
                    closeEverythingExceptThese('principal', ['banckAccountSection'])
                } else if (valueSelected === "1") {
                    closeEverythingExceptThese('principal', ['branckOfficesSection'])
                } else if (valueSelected === "4") {
                    closeEverythingExceptThese('principal', ['bancoPagoMovilSection'])
                } else if (valueSelected === "7") {
                    closeEverythingExceptThese('principal', ['prepaidCardSection'])
                } else if (valueSelected === "8") {
                    closeEverythingExceptThese('principal', ['debitcardNumberSection'])
                } else {
                    closeEverything('principal')
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
                formData.append("type", typeDocReception.options[typeDocReception.selectedIndex].value);

                let dataUpload = await fetch("ajax.php", { method: 'POST', body: formData });
                let resUpload = await dataUpload.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (resUpload.code === "0000") {
                    modal.openModal('modalSuccess', TITLE_SECTION, resUpload.message, undefined, true)
                } else if (resUpload.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resUpload.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            })

            // toggle de tipos de documentos
            typeDocReception.addEventListener('change', async () => {
                /* 
                    ci: 1
                    firma: 2
                    huellas: 3
                */
                if (typeDocReception.options[typeDocReception.selectedIndex].value === '3') {
                    // abrir modal para hacer firma
                    modal.openModal('modalFirma')

                    btnModalFirma.addEventListener('click', async () => {
                        const encoded = document.getElementById('draw-image').getAttribute('src')

                        const payload = {
                            filename: `firma${Math.round(Math.random() * (100 - 1) + 1)}`,
                            encoded,
                            type: typeDocReception.options[typeDocReception.selectedIndex].value
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
                    fileInputReception.classList.remove('hidden')
                }
            })
        }
    })
}