import Modal from './Modal.js';
import { numberFormater } from '../helpers.js';
import Timer from '../timer.js';

// Compra
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        const timer = new Timer
        modal.initModal()

        const compraForm = document.getElementById('compraForm')

        if (compraForm) {
            const btnSubmitCompra = document.querySelector('[data-targetping="compra"]')
            const amount = document.querySelector(`#${compraForm.getAttribute('id')} [name="amount"]`)
            const currency = document.querySelector(`#${compraForm.getAttribute('id')} [name="currency"]`)
            const payForm = document.querySelector(`#${compraForm.getAttribute('id')} [name="payForm"]`)
            const payIn = document.querySelector(`#${compraForm.getAttribute('id')} [name="payIn"]`)
            const accountBanks = document.querySelector(`#${compraForm.getAttribute('id')} [name="accountBanks"]`)
            const sectionPrepaid = document.getElementById(`sectionPrepaid`)
            const sectionCommend = document.getElementById(`sectionCommend`)
            const sectionCard = document.getElementById(`sectionCard`)
            const amountBs = document.querySelector(`#${compraForm.getAttribute('id')} [name="amountBs"]`)
            const exchangeRate = document.querySelector(`#${compraForm.getAttribute('id')} [name="exchangeRate"]`)
            const TITLE_SECTION = "Compra"

            amount.addEventListener('blur', () => {
                calComisionCompra()
            })
            currency.addEventListener('change', () => {
                calComisionCompra()
            })
            payForm.addEventListener('change', () => {
                calComisionCompra()
            })
            payIn.addEventListener('change', () => {
                calComisionCompra()
            })

            // mostrar modal cuando se modifique monto o divisa, teniendo seleccionado una forma de abono
            async function calComisionCompra() {
                if (amount.value && (currency.options[currency.selectedIndex].value !== "Seleccione")
                    && (payIn.options[payIn.selectedIndex].value !== "Seleccione")
                    && (payForm.options[payForm.selectedIndex].value !== "Seleccione")) {

                    // Todo: validar campos
                    let formData = new FormData()
                    formData.append("cond", "calcbuy");
                    formData.append("amount", amount.value);
                    formData.append("currency", currency.options[currency.selectedIndex].value);
                    formData.append("idinstrumentdebit", payIn.options[payIn.selectedIndex].value);
                    formData.append("idclearancetype", payForm.options[payForm.selectedIndex].value);

                    // Cargando spinner
                    modal.openModal('loader')

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.json();
                    modal.closeModal('loader')

                    // LLenamos los campos correspondientes
                    if (res.code === "0000") {
                        amountBs.value = numberFormater(res.totalves)
                        exchangeRate.value = numberFormater(res.currrate)

                        // Creando elementos para mostrar
                        let html = `
                            <p>
                                <span class="js-translate" data-string="trad_monto_compra_en_divisa">Monto Compra en Divisas</span> <span class="result">${numberFormater(res.exchangeamount)} </span>
                            </p>
                            <p>
                                ${res.txtcurrcommission} <span class="result">${numberFormater(res.currcommission)} </span>
                            </p>
                            <p>
                                <span class="js-translate" data-string="trad_tasa_de_cambio">Tasa de Cambio</span>  <span class="result">${numberFormater(res.currrate)} </span>
                            </p>
                            <p>
                                ${res.txtvescommission} <span class="result">${numberFormater(res.vescommission)} </span>
                            </p>
                            <p>
                                <span class="js-translate" data-string="trad_total_pagar_bs">Total Pagar Bs.</span> <span class="result">${numberFormater(res.totalves)} </span>
                            </p>
                        `

                        const inner = document.querySelector('#modalCompra .modal-body')
                        inner.innerHTML = html
                        
                        // Abrir modal con datos
                        modal.openModal('modalCompra')

                        // Entonces abreme el modal
                        if (payForm.options[payForm.selectedIndex].value !== "Seleccione") {
                            modal.openModal('modalCompra')
                        }
                    } else if (res.code === "5000") {
                        modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    } else {
                        modal.openModal('modalDanger', TITLE_SECTION, res.message)
                    }
                }
            }

            // Toggle para mostrar modal (mas info)
            payIn.addEventListener('change', async () => {
                //<option value="19">ENCOMIENDA(.) </option>
                //<option value="20">TARJETA DE CREDITO </option>
                //<option value="21">TARJETA DE DEBITO </option>
                let valueSelected = payIn.options[payIn.selectedIndex].value;

                if (valueSelected === "19") {
                    sectionCard.classList.add('hidden')
                } else if (valueSelected === "20") {
                    sectionCard.classList.remove('hidden')
                } else if (valueSelected === "21") {
                    sectionCard.classList.remove('hidden')
                }

            })

            // Toggle para mostrar modal (mas info)
            payForm.addEventListener('change', async () => {
                //<option value="3">Depósito en Cuenta </option>
                //<option value="5">Tarjeta de Credito </option>
                let valueSelected = payForm.options[payForm.selectedIndex].value;

                if (valueSelected === "3") {
                    sectionPrepaid.classList.add('hidden')
                    sectionCommend.classList.remove('hidden')
                } else if (valueSelected === "5") {
                    sectionPrepaid.classList.remove('hidden')
                    sectionCommend.classList.add('hidden')
                }
                // Mostramos boton de enviar
                if (btnSubmitCompra.classList.contains('hidden')) {
                    btnSubmitCompra.classList.remove('hidden')
                }
            })

            // fetch final de venta
            btnSubmitCompra.addEventListener('click', async (e) => {
                e.preventDefault()
                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

                let formData = new FormData(compraForm)
                formData.append("cond", "execbuyok");
                formData.append("payIn", payIn.options[payIn.selectedIndex].value);
                formData.append("payForm", payForm.options[payForm.selectedIndex].value);

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
                            modal.closeModal('otpVerification')

                            // Cargando spinner
                            modal.openModal('loader', undefined, undefined, false)
                            let formData = new FormData(compraForm)

                            formData.append("cond", "execbuy");
                            formData.append("otp", resOtp.otp);
                            formData.append("payIn", payIn.options[payIn.selectedIndex].value);
                            formData.append("payForm", payForm.options[payForm.selectedIndex].value);

                            let data = await fetch("ajax.php", { method: 'POST', body: formData });
                            let res = await data.json();
                            // Quitando spinner
                            modal.closeModal('loader')

                            if (res.code === "0000") {
                                modal.openModal('modalSuccess', TITLE_SECTION, res.message)
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
                } else if (res.code === "5000") {
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else {
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            })
        }
    })
}