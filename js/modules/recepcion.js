import Modal from './Modal.js';
import { numberFormater } from '../helpers.js';

// Venta
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()

        const recepcionForm = document.getElementById('recepcionForm')

        if (recepcionForm) {
            const ping = document.querySelector(`#${recepcionForm.getAttribute('id')} .ping`)
            const formRecepcion = document.getElementById('formRecepcion')
            const despositAccount = document.getElementById('despositAccount')
            const cash = document.getElementById('cash')
            const MovilPay = document.getElementById('MovilPay')
            const SectionPrepaid = document.getElementById('SectionPrepaid')
            const SectionDebitCardNumber = document.getElementById('SectionDebitCardNumber')

            // Toggle para mostrar modal (mas info)
            formRecepcion.addEventListener('change', async() => {
                // Mostramos boton de enviar
                if (ping.classList.contains('hidden')) {
                    ping.classList.remove('hidden')
                }
            })

            // fetch final de venta
            ping.addEventListener('click', async() => {
                // GEN OTP FETCH
                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)
                let formData = new FormData()
                formData.append("cond", "genotp");
                let dataOtp = await fetch("ajax.php", { method: 'POST', body: formData });
                let resOtp = await dataOtp.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (resOtp.code == "0000") {
                    // abrir modal para ultimo fetch 
                    modal.openModal('otpVerification')
                    document.getElementById('otpCode').value = resOtp.otp

                    document.querySelector("[data-id='btnOtp']").addEventListener('click', async e => {
                        e.preventDefault()
                        modal.closeModal('otpVerification')

                        // Cargando spinner
                        modal.openModal('loader', undefined, undefined, false)
                        let formData = new FormData(recepcionForm)

                        formData.append("cond", "reception");
                        formData.append("otp", resOtp.otp);
                        let data = await fetch("ajax.php", { method: 'POST', body: formData });
                        let res = await data.json();

                        // Quitando spinner
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



            formRecepcion.addEventListener('change', async() => {
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

                if (valueSelected === "1") {
                    cash.classList.remove('hidden')

                    // Poner hidden los demas
                    despositAccount.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "2") {
                    // Poner hidden los demas
                    despositAccount.classList.add('hidden')
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "3") {
                    despositAccount.classList.remove('hidden')

                    // Poner hidden los demas
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "4") {
                    despositAccount.classList.remove('hidden')

                    // Poner hidden los demas
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "5") {
                    SectionPrepaid.remove('hidden')
                    
                    // Poner hidden los demas
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    despositAccount.classList.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "6") {
                    
                    // Poner hidden los demas
                    despositAccount.classList.add('hidden')
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "7") {
                    SectionPrepaid.remove('hidden')

                    // Poner hidden los demas
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                } else if (valueSelected === "8") {
                    despositAccount.classList.remove('hidden')

                    // Poner hidden los demas
                    cash.classList.add('hidden')
                    MovilPay.add('hidden')
                    SectionPrepaid.add('hidden')
                    SectionDebitCardNumber.add('hidden')
                }
            })
        }
    })
}