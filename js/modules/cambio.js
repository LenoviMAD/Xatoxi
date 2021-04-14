import Modal from './Modal.js';
import { numberFormater, closeEverythingExceptThese, closeEverything } from '../helpers.js';

// Cambio
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
        modal.initModal()

        const cambioForm = document.getElementById('cambioForm')
        if (cambioForm) {
            const amount = document.querySelector(`#${cambioForm.getAttribute('id')} [name="amount"]`)
            const paidMethod = document.querySelector(`#${cambioForm.getAttribute('id')} [name="paidMethod"]`)
            const recieveCurrency = document.querySelector(`#${cambioForm.getAttribute('id')} [name="recieveCurrency"]`)
            const sendCurrency = document.querySelector(`#${cambioForm.getAttribute('id')} [name="sendCurrency"]`)
            const recieveMethod = document.querySelector(`#${cambioForm.getAttribute('id')} [name="recieveMethod"]`)
            const ping = document.querySelector(`#${cambioForm.getAttribute('id')} .ping`)

            // Toggle para calcComission
            amount.addEventListener('blur', () => {
                calComisionCompra()
                togglePing()
            })
            paidMethod.addEventListener('change', () => {
                calComisionCompra()
                togglePing()
            })
            recieveMethod.addEventListener('change', () => {
                calComisionCompra()
                togglePing()
            })
            sendCurrency.addEventListener('change', () => {
                calComisionCompra()
                togglePing()
            })

            // Toggle para mostrar modal (mas info)
            recieveCurrency.addEventListener('change', async() => {
                calComisionCompra()
            })

            // fetch final de venta
            ping.addEventListener('click', async() => {
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
                        let formData = new FormData(cambioForm)

                        formData.append("cond", "execexchange");
                        formData.append("otp", resOtp.otp);
                        formData.append("sendCurrency", sendCurrency.options[sendCurrency.selectedIndex].value);
                        formData.append("recieveCurrency", recieveCurrency.options[recieveCurrency.selectedIndex].value);
                        formData.append("recieveMethod", recieveMethod.options[recieveMethod.selectedIndex].value);
                        formData.append("paidMethod", paidMethod.options[paidMethod.selectedIndex].value);

                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();

                        // Quitando loader
                        modal.closeModal('loader')
                        if (res.code === "0000") {
                            modal.openModal('modalSuccess')
                        } else if (res.code === "5000") {
                            modal.openModal('modalDanger', 'Datos incompletos', res.message)
                        } else {
                            modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                        }
                    })
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', 'Datos incompletos', res.message)
                } else {
                    modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                }
            })

            // mostrar modal cuando se modifique monto o divisa, teniendo seleccionado una forma de abono
            async function calComisionCompra() {
                if (amount.value && (paidMethod.options[paidMethod.selectedIndex].value !== "Seleccione") && (recieveMethod.options[recieveMethod.selectedIndex].value !== "Seleccione") && (recieveCurrency.options[recieveCurrency.selectedIndex].value !== "Seleccione") && (sendCurrency.options[sendCurrency.selectedIndex].value !== "Seleccione")) {

                    // Todo: validar campos
                    let formData = new FormData(cambioForm)
                    formData.append("cond", "calcexchange");
                    formData.append("sendCurrency", sendCurrency.options[sendCurrency.selectedIndex].value);
                    formData.append("recieveCurrency", recieveCurrency.options[recieveCurrency.selectedIndex].value);
                    formData.append("recieveMethod", recieveMethod.options[recieveMethod.selectedIndex].value);
                    formData.append("paidMethod", paidMethod.options[paidMethod.selectedIndex].value);

                    // Cargando loader
                    modal.openModal('loader', undefined, undefined, false)

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                Monto <span> ${numberFormater(res.exchangeamount)} </span>
                            </p>
                            <p>
                                ${res.txtcommission} <span> ${numberFormater(res.commission)} </span>
                            </p>
                            <p>
                                Monto Cambiando <span> ${numberFormater(res.exchangeamount)} </span>
                            </p>
                        `
                        const inner = document.querySelector('#operationSummary .modal-body')
                        inner.innerHTML = html
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', 'Datos incompletos', res.message)
                    } else {
                        modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                    }

                    // Quitando loader
                    modal.closeModal('loader')

                    // Abrir modal con datos
                    modal.openModal('operationSummary')
                }
            }
            
            // Toggle para mas inputs del formulario de billetera
            paidMethod.addEventListener('change', () => {
                let valueSelected = paidMethod.options[paidMethod.selectedIndex].value;
                /*
                5 = Cheque
                1 = Efectivo 
                2 = Encomienda Elect. Taquilla 
                20 = TARJETA DE CREDITO 
                21 = TARJETA DE DEBITO 
                4 = Transferencia  
                */
    
                if (valueSelected === "5") {
                    closeEverythingExceptThese('cambioForm', ['bankProviderInput', 'numRefInput', 'routingInput'])
                } else if (valueSelected === "2" || valueSelected === "20" || valueSelected === "21" || valueSelected === "4") {
                    closeEverythingExceptThese('cambioForm', ['bankProviderInput', 'numRefInput'])
                } else {
                    closeEverything('cambioForm')
                }
            })

            // activamos el ping cuando todos los inputs esten full
            function togglePing() {
                if (amount.value && (paidMethod.options[paidMethod.selectedIndex].value !== "Seleccione") && (recieveMethod.options[recieveMethod.selectedIndex].value !== "Seleccione") && (recieveCurrency.options[recieveCurrency.selectedIndex].value !== "Seleccione") && (sendCurrency.options[sendCurrency.selectedIndex].value !== "Seleccione")) {
                    // Mostramos boton de enviar
                    ping.classList.remove('hidden')
                } else {
                    ping.classList.add('hidden')
                }
            }
        }
    })
}