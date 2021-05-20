import Modal from './Modal.js';
import { test } from './validations.js';
import { numberFormater, toBase64, servicioFirma, closeEverythingExceptThis, closeEverything, putRequiered } from '../helpers.js';
import Timer from '../timer.js';
// Envio
export default function init() {
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () { });

    document.addEventListener('DOMContentLoaded', async () => {
        const modal = new Modal()
        modal.initModal()
        const timer = new Timer

        const btnModalFirma = document.getElementById('draw-submitBtn')
        const billeteraForm = document.getElementById('billeteraForm')
        const encomiendaForm = document.getElementById('encomiendaForm')
        const transferenciaForm = document.getElementById('transferenciaForm')

        // Billetera
        if (billeteraForm) {
            const TITLE_SECTION = "Encomienda"
            const fileInputWallet = document.getElementById('fileInputWallet')
            const docsWallet = document.getElementById('docsWallet')
            const beneficiarioWallet = document.getElementById('beneficiarioWallet')
            const btnSubmitBilletera = document.querySelector('[data-targetping="billetera"]')
            const file = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="file"]`)
            const typeDocWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="typeDocWallet"]`)
            const users = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="users"]`)
            const amountWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="amountWallet"]`)
            const currencyWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="currencyWallet"]`)
            const paidFormWallet = document.querySelector(`#${billeteraForm.getAttribute('id')} [name="paidFormWallet"]`)

            $(`#${billeteraForm.getAttribute('id')} [name="users"]`).select2();

            amountWallet.addEventListener('blur', () => {
                step1Wallet()
            })
            currencyWallet.addEventListener('change', () => {
                step1Wallet()
            })
            paidFormWallet.addEventListener('change', () => {
                step1Wallet()
            })

            // Resumen de operacion
            async function step1Wallet() {
                // Cuando ambos campos esten llenos seguiente etapa
                if (amountWallet.value 
                    && (currencyWallet.options[currencyWallet.selectedIndex].value !== "Seleccione") 
                    && (paidFormWallet.options[paidFormWallet.selectedIndex].value !== "Seleccione")) {
                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsendw")
                    formData.append("amountWallet", amountWallet.value)
                    formData.append("currencyWallet", currencyWallet.options[currencyWallet.selectedIndex].value)
                    formData.append("idclearencetype", paidFormWallet.options[paidFormWallet.selectedIndex].value)

                    // Cargando spinner
                    modal.openModal('loader', undefined, undefined, false)

                    let data = await fetch("ajax.php", { method: 'POST', body: formData })
                    let res = await data.json()

                    // Quitando spinner
                    modal.closeModal('loader')

                    // console.log(res);
                    // Fetch exitoso
                    if (res.code == "0000") {
                        // Setear forma de pago
                        showPaidForm()

                        // liberando inputs y mostrando los resultados
                        let resAmount = numberFormater(amountWallet.value),
                            resComission = numberFormater(res.usdcommission)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto Envío en Divisa <span> ${resAmount}</span> 
                            </p>
                            <p>
                                ${res.txtusdcommission} <span> ${resComission}</span> 
                            </p>
                        `
                        const inner = document.querySelector('#operationSummary .modal-body')
                        inner.innerHTML = html

                        // Cargando Modal
                        modal.openModal('operationSummary')
                        beneficiarioWallet.classList.remove('hidden')
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    } else {
                       modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    }
                }
            }

            $(`#${billeteraForm.getAttribute('id')} [name="users"]`).on('select2:select', function (e) {
                // Do something
                btnSubmitBilletera.classList.remove('hidden')
            });
            // beneficiarioWallet.addEventListener('change', () => {
            //     // Mostramos boton de enviar
            // })

            billeteraForm.addEventListener('submit', async e => {
                e.preventDefault()

                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

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

                    document.querySelector("[data-id='btnOtp']").addEventListener('click', e => {
                        e.preventDefault()
                        finalFetch()
                    })
                } else if (resOtp.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                } else {
                   modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                }
            })

            // Toggle para mas inputs del formulario de billetera
            const showPaidForm = () => {
                let valueSelected = paidFormWallet.options[paidFormWallet.selectedIndex].value;
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

                beneficiarioWallet.classList.remove('hidden')

                if (valueSelected === "6") {
                    closeEverythingExceptThis('billeteraFormTest', 'sectionWalletAHC')
                    putRequiered(['sectionWalletAHC'], ['sectionAccountDeposit', 'sectionCreditCard'])
                } else if (valueSelected === "3") {
                    closeEverythingExceptThis('billeteraFormTest', 'sectionAccountDeposit')
                    putRequiered(['sectionAccountDeposit'], ['sectionWalletAHC', 'sectionCreditCard'])
                } else if (valueSelected === "5") {
                    closeEverythingExceptThis('billeteraFormTest', 'sectionCreditCard')
                    putRequiered(['sectionCreditCard'], ['sectionWalletAHC', 'sectionAccountDeposit'])
                } else {
                    closeEverything('billeteraFormTest')
                }
                // if (valueSelected === "6") {
                //     closeEverythingExceptThis('billeteraFormTest', 'sectionWalletAHC')
                // } else if (valueSelected === "3") {
                //     closeEverythingExceptThis('billeteraFormTest', 'sectionAccountDeposit')
                // } else if (valueSelected === "5") {
                //     closeEverythingExceptThis('billeteraFormTest', 'sectionCreditCard')
                // } else {
                //     closeEverything('billeteraFormTest')
                // }
            }

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
                    modal.openModal('modalSuccess', TITLE_SECTION, resUpload.message, undefined, true)
                } else if (resUpload.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resUpload.message)
                } else {
                   modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            })

            // toggle de tipos de documentos
            typeDocWallet.addEventListener('change', async () => {
                /* 
                    ci: 1
                    firma: 2
                    huellas: 3
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
                }
            })

            async function finalFetch() {
                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

                // Todo: validar campos
                let formData = new FormData(billeteraForm)
                formData.append("cond", "addEnvio");
                formData.append("otp", document.getElementById('otpCode').value);
                formData.append("amountWallet", amountWallet.value);
                formData.append("currencyWallet", currencyWallet.options[currencyWallet.selectedIndex].value);
                formData.append("users", users.options[users.selectedIndex].value);
                modal.closeModal('otpVerification')

                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                let res = await data.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (res.code === "0000") {
                    modal.openModal('modalSuccess', 'Transaccion satisfactoria', res.message)
                } else if (res.code.charAt(0) === "7") {
                    // MENSAJE DE ERROR
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)

                    // MOSTRAMOS LOS CAMPOS PA' QUE SUBAN DOCUMENTOS
                    docsWallet.classList.remove('hidden')
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else {
                   modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            }
        }

        if (encomiendaForm) {
            const TITLE_SECTION = "Remesa"
            const file = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="file1"]`)
            const beneficiarioCommend = document.getElementById('beneficiarioCommend')
            const btnSubmitCommend = document.querySelector('[data-targetping="encomienda"]')
            const usersCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="usersCommend"]`)
            const amountCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="amountCommend"]`)
            const countryCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="countryCommend"]`)
            const currencyCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="currencyCommend"]`)
            const sendFormCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="sendFormCommend"]`)

            const paidFormCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="paidFormCommend"]`)
            const providerCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="providerCommend"]`)
            const amountBsCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="amountBsCommend"]`)
            const exchangeRateCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="exchangeRateCommend"]`)
            const typeDocCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="typeDocCommend"]`)

            // Fetch session currectly
            const formData = new FormData();
            formData.append("cond", "session");
            const data = await fetch("ajax.php", { method: 'POST', body: formData });
            const resUserSession = await data.json();
            // console.log(resUserSession);

            // SETEAMOS LOS DATOS SI VIENEN DE CAMBIO
            if (resUserSession.paidMethodToChange) {
                paidFormCommend.childNodes.forEach(element => {
                    if (element.value === resUserSession.paidMethodToChange) {
                        element.setAttribute("selected", true)
                    }
                });
                paidFormCommend.setAttribute("disabled", true)
            }

            if (resUserSession.amountToChange) {
                amountCommend.value = resUserSession.amountToChange
                amountCommend.setAttribute("disabled", true)
            }

            amountCommend.addEventListener('blur', async () => {
                await step0()
                step1Encomienda()
            })
            countryCommend.addEventListener('change', async () => {
                await step0()
                step1Encomienda()
            })

            providerCommend.addEventListener('change', async () => {
                await step0()
                step1Encomienda()
            })

            sendFormCommend.addEventListener('change', async () => {
                await step0()
                step1Encomienda()
            })
            paidFormCommend.addEventListener('change', async () => {
                await step0()
                step1Encomienda()
            })
            currencyCommend.addEventListener('change', () => {
                step1Encomienda()
            })

            async function step0() {
                if (
                    amountCommend.value &&
                    (countryCommend.options[countryCommend.selectedIndex].value !== "Seleccione") &&
                    (providerCommend.options[providerCommend.selectedIndex].value !== "Seleccione") &&
                    (paidFormCommend.options[paidFormCommend.selectedIndex].value !== "Seleccione") &&
                    (sendFormCommend.options[sendFormCommend.selectedIndex].value !== "Seleccione")
                ) {
                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsendenvio");

                    formData.append("amountCommend", amountCommend.value);
                    formData.append("countryCommend", countryCommend.options[countryCommend.selectedIndex].value);
                    formData.append("providerCommend", providerCommend.options[providerCommend.selectedIndex].value);
                    formData.append("idclearencetype", paidFormCommend.options[paidFormCommend.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader', undefined, undefined, false)

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();
                    console.log(res)

                    // Quitando spinner
                    modal.closeModal('loader')

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        amountBsCommend.value = numberFormater(res.totalves)
                        exchangeRateCommend.value = numberFormater(res.usdrate)

                        // Creando elementos para mostrar
                        let html = `
                             <p>
                                 Monto Divisa a Enviar <span> ${numberFormater(amountCommend.value)}</span>
                             </p>
                             <p>
                                 ${res.txtusdcommission} <span> ${numberFormater(res.usdcommission)}</span>
                             </p>
                             <p>
                                 Tasa de Cambio <span> ${numberFormater(res.usdrate)}</span>
                             </p>
                             <p>
                                 ${res.txtvescommission} <span> ${numberFormater(res.vescommission)}</span>
                             </p>
                             <p>
                                 Total Enviar Bs.  <span> ${numberFormater(res.totalves)}</span>
                             </p>
                         `
                        const inner = document.querySelector('#modalEncomienda .modal-body')
                        inner.innerHTML = html
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    } else {
                       modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    }
                }
            }

            // -tasa de cambio y monto se llenan cuando (proveedor, pais, monto) sean completados
            async function step1Encomienda() {
                if (
                    amountCommend.value &&
                    (countryCommend.options[countryCommend.selectedIndex].value !== "Seleccione") &&
                    (providerCommend.options[providerCommend.selectedIndex].value !== "Seleccione") &&
                    (sendFormCommend.options[sendFormCommend.selectedIndex].value !== "Seleccione") &&
                    (paidFormCommend.options[paidFormCommend.selectedIndex].value !== "Seleccione") &&
                    (currencyCommend.options[currencyCommend.selectedIndex].value !== "Seleccione")
                ) {

                    // Abriendo modal con datos
                    modal.openModal('modalEncomienda')

                    if (resUserSession.paidMethodToChange) {
                        beneficiarioCommend.classList.remove('hidden')
                    }
                }
            }

            // Toggle para add beneficiario
            btnAddCommend.addEventListener('click', e => {
                e.preventDefault()
                let userInfo = document.getElementById('userCommend')
                if (userInfo.classList.contains('hidden')) {
                    userInfo.classList.remove('hidden')
                } else {
                    userInfo.classList.add('hidden')
                }
            })

            // Toggle para mas inputs del formulario de billetera
            paidFormCommend.addEventListener('change', () => {
                let valueSelected = paidFormCommend.options[paidFormCommend.selectedIndex].value;
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

                beneficiarioCommend.classList.remove('hidden')

                if (valueSelected === "6") {
                    closeEverythingExceptThis('encomiendaFormTest', 'sectionCommendAHC')
                    putRequiered(['sectionCommendAHC'], ['sectionCommendDeposit', 'efectivoCommend', 'sectionCommendCreditCard'])
                } else if (valueSelected === "3") {
                    closeEverythingExceptThis('encomiendaFormTest', 'sectionCommendDeposit')
                    putRequiered(['sectionCommendDeposit'], ['sectionCommendAHC', 'efectivoCommend', 'sectionCommendCreditCard'])
                } else if (valueSelected === "5") {
                    closeEverythingExceptThis('encomiendaFormTest', 'sectionCommendCreditCard')
                    putRequiered(['sectionCommendCreditCard'], ['sectionCommendAHC', 'efectivoCommend', 'sectionCommendDeposit'])
                } else if (valueSelected === "1") {
                    closeEverythingExceptThis('encomiendaFormTest', 'efectivoCommend')
                    putRequiered(['efectivoCommend'], ['sectionCommendAHC', 'sectionCommendCreditCard', 'sectionCommendDeposit'])
                } else {
                    closeEverything('encomiendaFormTest')
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
                formData.append("type", typeDocCommend.options[typeDocCommend.selectedIndex].value);

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
            typeDocCommend.addEventListener('change', async () => {
                /* 
                    ci: 1
                    firma: 2
                    huellas: 3
                */

                if (typeDocCommend.options[typeDocCommend.selectedIndex].value === '3') {
                    // abrir modal para hacer firma
                    modal.openModal('modalFirma')

                    btnModalFirma.addEventListener('click', async () => {
                        const encoded = document.getElementById('draw-image').getAttribute('src')

                        const payload = {
                            filename: `firma${Math.round(Math.random() * (100 - 1) + 1)}`,
                            encoded,
                            type: typeDocCommend.options[typeDocCommend.selectedIndex].value
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
                    fileInputCommend.classList.remove('hidden')
                }
            })

            // Agregar usuario estatico al select y ocultando los campos nuevamente
            addContact.addEventListener('click', e => {
                e.preventDefault()
                if (test('Beneficiario', 'Debe llenar los campos obligatorios!', 'userCommend')) {
                    let userInfo = document.getElementById('userCommend')
                    const firstNameCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="firstNameCommend"]`)
                    const firstSurnameCommend = document.querySelector(`#${encomiendaForm.getAttribute('id')} [name="firstSurnameCommend"]`)

                    // let html = `<option value="1">${firstNameCommend.value} - ${firstSurnameCommend.value} </option>`
                    let html = `<option value="1">${firstNameCommend.value} - ${firstSurnameCommend.value} </option>`
                    let node = document.createElement('option')
                    node.setAttribute('value', 1)
                    node.setAttribute('selected', true)
                    node.innerHTML = html
                    usersCommend.append(node)

                    // TODO: validar todos los campos

                    // ocultamos los campos nuevamente
                    userInfo.classList.add('hidden')

                    // Mostramos el ping button
                    btnSubmitCommend.classList.remove('hidden')
                }
            })

            btnSubmitCommend.addEventListener('click', async (e) => {
                e.preventDefault()

                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

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
                        // let valueSelected = paidFormCommend.options[paidFormCommend.selectedIndex].value;

                        // Quitando Otp
                        modal.closeModal('otpVerification')

                        // Cargando spinner
                        modal.openModal('loader', undefined, undefined, false)

                        let formData = new FormData(encomiendaForm)
                        formData.append("cond", "commendWallet");
                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();

                        // console.log(res);

                        // Quitando spinner
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess', 'Transaccion satisfactoria', res.message, undefined)
                        } else if (res.code.charAt(0) === "7") {
                            // Tienes documentos faltantes
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)

                            // MOSTRAMOS LOS CAMPOS PA' QUE SUBAN DOCUMENTOS
                            docsCommend.classList.remove('hidden')
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        } else {
                           modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        }
                    })
                } else if (resOtp.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                }
            })
        }

        if (transferenciaForm) {
            const btnSubmitTransfer = document.querySelector('[data-targetping="transferencia"]')
            const btnIconAdd = document.getElementById(`btnIconAdd`)
            const beneficiarioTransfer = document.getElementById(`beneficiarioTransfer`)
            const addContactTransfer = document.getElementById(`addContactTransfer`)
            const TITLE_SECTION = "Transferencia"

            const MovilPay = document.getElementById('MovilPayTransfer')
            const SectionPrepaid = document.getElementById('SectionPrepaidTransfer')

            ///// POR MODIFICAR 
            //Idlead <- falta por indicar, esta hardcode
            //idcountry
            const countryTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="countryTransfer"]`)
            //idcurrency
            const currencyTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="currencyTransfer"]`)
            //amount
            const amountTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="amountTransfer"]`)
            //idclearencetype
            const paidFormTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="paidFormTransfer"]`)
            const exchangedRateTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="exchangedRateTransfer"]`)
            const amountBsTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="amountBsTransfer"]`)

            // Fetch session currectly
            const formData = new FormData();
            formData.append("cond", "session");
            const data = await fetch("ajax.php", { method: 'POST', body: formData });
            const resUserSession = await data.json();
            // console.log(resUserSession);

            // SETEAMOS LOS DATOS SI VIENEN DE CAMBIO
            if (resUserSession.paidMethodToChange) {
                paidFormTransfer.childNodes.forEach(element => {
                    if (element.value === resUserSession.paidMethodToChange) {
                        element.setAttribute("selected", true)
                    }
                });
                paidFormTransfer.setAttribute("disabled", true)
            }

            if (resUserSession.amountToChange) {
                amountTransfer.value = resUserSession.amountToChange
                amountTransfer.setAttribute("disabled", true)
            }

            amountTransfer.addEventListener('blur', () => {
                calculandoEnvioCambioMonto()
            })
            countryTransfer.addEventListener('change', () => {
                calculandoEnvioCambioMonto()
            })
            currencyTransfer.addEventListener('change', () => {
                calculandoEnvioCambioMonto()
            })
            paidFormTransfer.addEventListener('change', () => {
                calculandoEnvioCambioMonto()
            })

            async function calculandoEnvioCambioMonto() {
                if (amountTransfer.value
                    && (countryTransfer.options[countryTransfer.selectedIndex].value !== "Seleccione")
                    && (currencyTransfer.options[currencyTransfer.selectedIndex].value !== "Seleccione")
                    && (paidFormTransfer.options[paidFormTransfer.selectedIndex].value !== "Seleccione")) {
                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsendtr");
                    formData.append("amountTransfer", amountTransfer.value);
                    formData.append("countryTransfer", countryTransfer.options[countryTransfer.selectedIndex].value);
                    formData.append("currencyTransfer", currencyTransfer.options[currencyTransfer.selectedIndex].value);
                    formData.append("idclearencetype", paidFormTransfer.options[paidFormTransfer.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader', undefined, undefined, false)

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    modal.closeModal('loader')

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        amountBsTransfer.value = numberFormater(res.totalves)
                        exchangedRateTransfer.value = numberFormater(res.usdrate)

                        // Creando elementos para mostrar
                        let html = `
                            <div class="text-center">
                                <p>
                                    Monto Transferencia en Divisa <br> ${numberFormater(amountTransfer.value)}
                                </p>
                                <p>
                                    ${res.txtusdcommission} <br> ${numberFormater(res.usdcommission)}
                                </p>
                                <p>
                                    Tasa de Cambio <br> ${numberFormater(res.usdrate)}
                                </p>
                                <p>
                                    ${res.txtvescommission} <br> ${numberFormater(res.vescommission)}
                                </p>
                                <p>
                                    Total Transferencia Bs. <br> ${numberFormater(res.totalves)}
                                </p>
                            </div>
                            `
                        const inner = document.querySelector('#modalTransferencia .modal-body')
                        inner.innerHTML = html

                        // Abrir modal con datos
                        modal.openModal('modalTransferencia')

                        if (resUserSession.amountToChange) {
                            beneficiarioTransfer.classList.remove('hidden')
                        }
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    } else {
                        modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    }
                }
            }
            // -tasa de cambio y monto se llenan cuando (proveedor, pais, monto) sean completados
            ///falta modificar

            // Toggle para add beneficiario
            btnIconAdd.addEventListener('click', e => {
                e.preventDefault()
                let userInfo = document.getElementById('userTransfer')
                if (userInfo.classList.contains('hidden')) {
                    userInfo.classList.remove('hidden')
                } else {
                    userInfo.classList.add('hidden')
                }
            })

            paidFormTransfer.addEventListener('change', () => {
                // Mostramos boton de enviar
                let valueSelected = paidFormTransfer.options[paidFormTransfer.selectedIndex].value;
                const accountDeposit = document.getElementById(`accountDeposit`)
                const cash = document.getElementById(`cash`)
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

                beneficiarioTransfer.classList.remove('hidden')

                if (valueSelected === "6") {
                    closeEverythingExceptThis('transferenciaFormTest', 'MovilPayTransfer')
                    putRequiered(['MovilPayTransfer'], ['accountDeposit', 'cash', 'SectionPrepaidTransfer'])
                } else if (valueSelected === "3") {
                    closeEverythingExceptThis('transferenciaFormTest', 'accountDeposit')
                    putRequiered(['accountDeposit'], ['MovilPayTransfer', 'cash', 'SectionPrepaidTransfer'])
                } else if (valueSelected === "5") {
                    closeEverythingExceptThis('transferenciaFormTest', 'SectionPrepaidTransfer')
                    putRequiered(['SectionPrepaidTransfer'], ['accountDeposit', 'cash', 'MovilPayTransfer'])
                } else if (valueSelected === "1") {
                    closeEverythingExceptThis('transferenciaFormTest', 'cash')
                    putRequiered(['cash'], ['accountDeposit', 'MovilPayTransfer', 'SectionPrepaidTransfer'])
                } else {
                    closeEverything('transferenciaFormTest')
                }
            })

            // Agregar usuario estatico al select y ocultando los campos nuevamente
            addContactTransfer.addEventListener('click', e => {
                e.preventDefault()
                if (test('Beneficiario', 'Debe llenar los campos obligatorios!', 'userTransfer')) {
                    let userInfo = document.getElementById('userTransfer')
                    let usersTransfer = document.getElementById('usersTransfer')

                    const firstNameTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="firstNameTransfer"]`)
                    const firstSurnameTransfer = document.querySelector(`#${transferenciaForm.getAttribute('id')} [name="firstSurnameTransfer"]`)

                    let html = `<option value="1">${firstNameTransfer.value} - ${firstSurnameTransfer.value} </option>`
                    let node = document.createElement('option')
                    node.setAttribute('value', 1)
                    node.setAttribute('selected', true)
                    node.innerHTML = html
                    usersTransfer.append(node)

                    // TODO: validar todos los campos

                    // ocultamos los campos nuevamente
                    userInfo.classList.add('hidden')
                    // Mostramos el ping button
                    btnSubmitTransfer.classList.remove('hidden')
                }
            })

            btnSubmitTransfer.addEventListener('click', async e => {
                e.preventDefault()

                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

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
                        modal.closeModal('otpVerification')

                        // Cargando spinner
                        modal.openModal('loader', undefined, undefined, false)
                        let formData = new FormData(transferenciaForm)

                        formData.append("cond", "saveTransfer");
                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        // console.log(data);

                        let res = await data.json();
                        // console.log(res);

                        // Quitando spinner
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess')
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        } else {
                            modal.openModal('modalDanger', TITLE_SECTION, res.message)
                        }
                    })
                } else if (resOtp.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, resOtp.message)
                }
            })
        }
    })
}