import Modal from "./Modal.js";
import { selectValorforId } from '../helpers.js';

// Cambio
export default function init() {
    document.addEventListener("DOMContentLoaded", () => {
        const modal = new Modal();
        modal.initModal();
        const TITLE_SECTION = "Registro"
        const registerForm = document.getElementById("registerForm");

        if (registerForm) {
            const country = document.querySelector(`#${registerForm.getAttribute('id')} [name="country"]`)
            const areaCode = document.querySelector(`#${registerForm.getAttribute('id')} [name="areaCode"]`)
            const phone = document.querySelector(`#${registerForm.getAttribute('id')} [name="phone"]`)
            const email = document.querySelector(`#${registerForm.getAttribute('id')} [name="email"]`)
            const btnsubmit = document.querySelector(`#${registerForm.getAttribute('id')} button[type="submit"]`)

            country.childNodes.forEach(element => {
                if (element.value === "58") {
                    element.setAttribute("selected", true)
                    changeCodeArea()
                }
            });

            country.addEventListener('change', () => {
                changeCodeArea()
            })
            email.addEventListener('blur', async () => {
                let formData = new FormData();
                formData.append("cond", "mgetpartylead");
                formData.append("email", email.value);

                let data = await fetch("ajax.php", {
                    method: "POST",
                    body: formData,
                });
                const res = await data.json();
                
                // Fetch exitoso
                if (res.code === "0000") {
                    // Si trajo algo de info
                    if (res.areacode) {
                        country.childNodes.forEach(element => {
                            if (element.value === res.countrycode) {
                                element.setAttribute("selected", true)
                            }
                        });

                        await selectValorforId('countryinternationalphonecode/areaCode', 'ajax.php?cond=mgetcellphoneareacodel')

                        areaCode.childNodes.forEach(element => {
                            if (element.value === res.areacode) {
                                element.setAttribute("selected", true)
                            }
                        });

                        phone.value = res.phonenumber
                    }
                }
            })

            async function changeCodeArea() {
                await selectValorforId('countryinternationalphonecode/areaCode', 'ajax.php?cond=mgetcellphoneareacodel')
            }

            registerForm.addEventListener("submit", async (e) => {
                e.preventDefault();
                btnsubmit.setAttribute('disabled', true)

                // Cargando loader
                modal.openModal('loader', undefined, undefined, false)

                let formData = new FormData(registerForm);
                formData.append("cond", "addleadweb");

                let dataSignup = await fetch("ajax.php", {
                    method: "POST",
                    body: formData,
                });
                let resSignup = await dataSignup.json();

                // Quitando loader
                modal.closeModal("loader");

                if (resSignup.code === "0000") {
                    // Quitar hidden y colocarselo al boton normal
                    const btnCloseModal = document.getElementById('btnCloseModal')
                    const btnReturn = document.getElementById('btnReturn')

                    btnReturn.classList.remove('hidden')
                    btnCloseModal.classList.add('hidden')

                    modal.openModal('modalSuccess2', TITLE_SECTION, resSignup.message)
                } else if (resSignup.code === "5000") {
                    modal.openModal("modalDanger", TITLE_SECTION, resSignup.message);
                } else {
                    modal.openModal("modalDanger", TITLE_SECTION, resSignup.message);
                }
                
                btnsubmit.removeAttribute('disabled')
            });
        }
    });
}