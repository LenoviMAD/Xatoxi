import Modal from "./Modal.js";
import Timer from '../timer.js';
import { changeLanguage } from '../Translations.js'

// Cambio
export default function init() {
    document.addEventListener("DOMContentLoaded", () => {
        const modal = new Modal();
        modal.initModal();
        const timer = new Timer
        const TITLE_SECTION = "Registro"
        const registerForm = document.getElementById("registerForm");

        if (registerForm) {
            const btnRegister = document.getElementById('btnRegister')
            const country = document.querySelector(`#${registerForm.getAttribute('id')} [name="country"]`)
            const codeArea = document.querySelector(`#${registerForm.getAttribute('id')} [name="codeArea"]`)
            const confirmEmail = document.querySelector(`#${registerForm.getAttribute('id')} [name="confirmEmail"]`)
            const email = document.querySelector(`#${registerForm.getAttribute('id')} [name="email"]`)
            const textDanger = document.querySelector(`.helper-text`)

            country.childNodes.forEach(element => {
                if (element.value === "238") {
                    element.setAttribute("selected", true)
                    changeCodeArea()
                }
            });
            
            country.addEventListener('change', () => {
                changeCodeArea()
            })

            async function changeCodeArea() {
                let output = "";
                let countryEnd = country.options[country.selectedIndex].value == "238" ? "58" : country.options[country.selectedIndex].value

                let formData = new FormData();
                formData.append("cond", "mgetcellphoneareacodel");
                formData.append("countrycode", countryEnd);

                let data = await fetch("ajax.php", {
                    method: "POST",
                    body: formData,
                });
                const res = await data.json();

                console.log(res)

                res.list.forEach(element => {
                    output += `<option value="${element.code}">${element.code}</option>`;
                }); 
                codeArea.innerHTML = output;
            }

            registerForm.addEventListener("submit", async (e) => {
                e.preventDefault();
                // Cargando loader
                modal.openModal('loader', undefined, undefined, false)

                // Enviamos info para primer paso de registro
                let countryEnd = country.options[country.selectedIndex].value == "238" ? "58" : country.options[country.selectedIndex].value

                let formData = new FormData(registerForm);
                formData.append("cond", "addleadweb");
                formData.append("country", countryEnd);
                
                let dataSignup = await fetch("ajax.php", {
                    method: "POST",
                    body: formData,
                });
                let resSignup = await dataSignup.json();
                console.log(resSignup)

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
            });
        }
    });
}