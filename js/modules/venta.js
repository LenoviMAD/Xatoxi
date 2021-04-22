import Modal from './Modal.js';
import { numberFormater, closeEverything, closeEverythingExceptThese } from '../helpers.js';
import Timer from '../timer.js';
// Venta
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()
        const timer = new Timer

        const ventaForm = document.getElementById('ventaForm')

        if (ventaForm) {
            const TITLE_SECTION = "VENTA"
            const amount = document.querySelector(`#${ventaForm.getAttribute('id')} [name="amount"]`)
            const currency = document.querySelector(`#${ventaForm.getAttribute('id')} [name="currency"]`)
            const payForm = document.querySelector(`#${ventaForm.getAttribute('id')} [name="payForm"]`)
            const payIn = document.querySelector(`#${ventaForm.getAttribute('id')} [name="payIn"]`)
            const amountRecieve = document.querySelector(`#${ventaForm.getAttribute('id')} [name="amountRecieve"]`)
            const amountChange = document.querySelector(`#${ventaForm.getAttribute('id')} [name="amountChange"]`)
            const ping = document.querySelector(`#${ventaForm.getAttribute('id')} .ping`)

            // Pago movil
            const bancoPagoMovil = document.querySelector(`#${ventaForm.getAttribute('id')} [name="bancoPagoMovil"]`)
            const countrycode = document.querySelector(`#${ventaForm.getAttribute('id')} [name="countrycode"]`)
            const codeArea = document.querySelector(`#${ventaForm.getAttribute('id')} [name="codeArea"]`)
            const phone = document.querySelector(`#${ventaForm.getAttribute('id')} [name="phone"]`)

            const init = async() => {
                // Fetch session currectly
                const formData = new FormData();
                formData.append("cond", "session");
                const data = await fetch("ajax.php", { method: 'POST', body: formData });
                const res = await data.json();
                console.log(res);
                bancoPagoMovil.childNodes.forEach(element => {
                    if (element.value === res.mpbankcode) {
                        element.setAttribute("selected", true)
                    }
                });

                countrycode.value = res.countrycode
                phone.value = res.mpbankaccount

                codeArea.childNodes.forEach(element => {
                    if (element.value === res.areacode.trim()) {
                        element.setAttribute("selected", true)
                    }
                });
            }

            init()

            amount.addEventListener('blur', () => {
                calComisionVenta()
                step2()
                togglePing()
            })
            currency.addEventListener('change', () => {
                calComisionVenta()
                step2()
                togglePing()
            })
            payForm.addEventListener('change', () => {
                step2()
                togglePing()
            })
            payIn.addEventListener('change', () => {
                step2()
                togglePing()
            })

            function step2() {
                if (amount.value &&
                    (currency.options[currency.selectedIndex].value !== "Seleccione") &&
                    (payIn.options[payIn.selectedIndex].value !== "Seleccione") &&
                    (payForm.options[payForm.selectedIndex].value !== "Seleccione")
                ) {
                    modal.openModal('operationSummary')
                }
            }

            // mostrar modal cuando se modifique monto o divisa, teniendo seleccionado una forma de abono
            async function calComisionVenta() {
                if (amount.value && (currency.options[currency.selectedIndex].value !== "Seleccione")) {

                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcsell");
                    formData.append("amount", amount.value);
                    formData.append("currency", currency.options[currency.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader', undefined, undefined, false)

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        amountChange.value = numberFormater(res.currrate)
                        amountRecieve.value = numberFormater(res.totalves)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto Divisa a Cobrar<span> ${numberFormater(res.exchangeamount)}</span>
                            </p>
                            <p>
                                ${res.txtcurrcommission}<span> ${numberFormater(res.currcommission)}</span>
                            </p>
                            <p>
                                Tasa de Cambio<span>  ${numberFormater(res.currrate)}</span>
                            </p>
                            <p>
                                ${res.txtvescommission}<span> ${numberFormater(res.vescommission)}</span>
                            </p>
                            <p>
                                Total Recibir Bs. <span> ${numberFormater(res.totalves)}</span>
                            </p>
                            `
                        const inner = document.querySelector('#operationSummary .modal-body')
                        inner.innerHTML = html
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', 'Datos incompletos', res.message)
                    } else {
                        modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                    }
                    modal.closeModal('loader')
                }
            }

            // activamos el ping cuando todos los inputs esten full
            function togglePing() {
                if (amount.value &&
                    (currency.options[currency.selectedIndex].value !== "Seleccione") &&
                    (payIn.options[payIn.selectedIndex].value !== "Seleccione") &&
                    (payForm.options[payForm.selectedIndex].value !== "Seleccione")
                ) {
                    ping.classList.remove('hidden')
                } else {
                    ping.classList.add('hidden')
                }
            }

            // fetch final de venta
            ventaForm.addEventListener('submit', async e => {
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

                        let formData = new FormData(ventaForm)
                        formData.append("cond", "execsell");
                        formData.append("otp", resOtp.otp);
                        formData.append("payIn", payIn.options[payIn.selectedIndex].value);
                        formData.append("payForm", payForm.options[payForm.selectedIndex].value);

                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();
                        console.log(res);

                        // Quitando spinner
                        modal.closeModal('loader')

                        if (res.code === "0000") {
                            modal.openModal('modalSuccess', TITLE_SECTION, res.message, undefined, false)
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', 'Datos incompletos', res.message)
                        } else {
                            modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                        }
                        console.log(res);
                    })
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', 'Datos incompletos', res.message)
                } else {
                    modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                }
            })

            payIn.addEventListener('change', async() => {
                // Mostramos boton de enviar
                let valueSelected = payIn.options[payIn.selectedIndex].value;
                /*
                20 = Tarjeta de credito
                21 = Tarjeta de debito
                */

                if (valueSelected === "20") {
                    closeEverythingExceptThese('test1', ['sectionVentaCreditCard'])
                } else if (valueSelected === "21") {
                    closeEverythingExceptThese('test1', ['sectionVentaDebitCard'])
                } else {
                    closeEverything('test1')
                }
            })
            payForm.addEventListener('change', async() => {
                // Mostramos boton de enviar
                let valueSelected = payForm.options[payForm.selectedIndex].value;
                /*
                22 = pago movil
                4 = Transferencia
                */

                if (valueSelected === "22") {
                    closeEverythingExceptThese('test2', ['sectionVentaPagoMovil'])
                } else if (valueSelected === "4") {
                    closeEverythingExceptThese('test2', ['sectionVentaTrasferencia'])
                } else {
                    closeEverything('test2')
                }
            })
        }
    })
}