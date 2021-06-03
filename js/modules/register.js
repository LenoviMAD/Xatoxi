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

            confirmEmail.addEventListener('blur', () => {
                isEmailsEquals()
            })
            function isEmailsEquals() {
                if (email.value !== confirmEmail.value) {
                    confirmEmail.style.borderColor = "red"
                    textDanger.classList.remove('hidden')
                    btnRegister.setAttribute("disabled", true)
                    btnRegister.classList.add("disabled")
                    return
                } else {
                    textDanger.classList.add('hidden')
                    confirmEmail.style.borderColor = "initial"
                    btnRegister.removeAttribute("disabled")
                    btnRegister.classList.remove("disabled")
                }
            }
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
                let output = "<option disabled selected>Seleccione</option>';";

                const data = await fetch(`ajax.php?cond=getcountrystatel&valor0=${country.options[country.selectedIndex].value}`, { method: "GET" });
                const res = await data.json();
                console.log(res)

                res.list.forEach(element => {
                    output += `<option value="${element.id}">${element.name}</option>`;
                });
                codeArea.innerHTML = output;
            }

            registerForm.addEventListener("submit", async (e) => {
                e.preventDefault();

                // test()

                // Cargando loader
                modal.openModal('loader', undefined, undefined, false)

                // Generar pin
                let formData = new FormData();
                formData.append("cond", "genpin");
                let dataPin = await fetch("ajax.php", {
                    method: "POST",
                    body: formData,
                });
                let resPin = await dataPin.json();

                if (resPin.code === "0000") {
                    // Guardar pin en una variable de sesion para sus porterior validacion
                    let formData1 = new FormData();
                    formData1.append("cond", "savePin");
                    formData1.append("pin", resPin.pin);
                    let dataSavePin = await fetch("ajax.php", {
                        method: "POST",
                        body: formData1,
                    });
                    await dataSavePin.text();
                    // console.log(resPin.pin);

                    // Enviar pin al correo
                    let formData = new FormData(registerForm)
                    formData.append("cond", "sendEmailPin");
                    formData.append("pin", resPin.pin);

                    let dataEmailPin = await fetch("ajax.php", { method: 'POST', body: formData });
                    let resEmailPin = await dataEmailPin.json();
                    // Quitando loader
                    modal.closeModal("loader");

                    if (resEmailPin.code === "0000") {
                        // abriendo pin modal
                        modal.openModal("pinVerification");
                        timer.updateClock();
                        // Eliminando el mensaje si lo tiene
                        if (document.getElementById('messageModalCustom')) {
                            document.getElementById('messageModalCustom').remove()
                        }

                        // Agregando mensaje para mostrar email
                        let messageModal = document.createElement('p')
                        messageModal.setAttribute('id', 'messageModalCustom')
                        messageModal.innerHTML = `<span class="js-translate" data-string="trad_te_hemos_enviado_el_codigo">Te hemos enviado el código al email</span> <br><b>${document.getElementById('email').value}</b>`

                        changeLanguage('en')

                        // agregando al modal
                        document.querySelector('#pinVerification footer').prepend(messageModal)

                        const btnPin = document.querySelector(
                            '#pinVerification [data-id="btnPin"]'
                        );
                        let inputPin = document.querySelector("#pinVerification #pinCode");

                        btnPin.addEventListener("click", async () => {
                            // Cargando loader
                            modal.openModal('loader', undefined, undefined, false)

                            // Verificar pin
                            let formData = new FormData();
                            formData.append("cond", "pinVerification");
                            formData.append("pin", inputPin.value);
                            let dataVerification = await fetch("ajax.php", {
                                method: "POST",
                                body: formData,
                            });
                            let resVerification = await dataVerification.json();

                            // Quitando loader
                            modal.closeModal("loader");

                            // Si es el pin correcto
                            if (resVerification.code === "0000") {
                                // Quitando loader
                                modal.closeModal("pinVerification");
                                // Cargando loader
                                modal.openModal('loader', undefined, undefined, false)

                                // Enviamos info para primer paso de registro
                                let formData = new FormData(registerForm);
                                // let codeArea = document.querySelector(
                                //     '#registerForm [name="codeArea"]'
                                // );
                                formData.append("cond", "addleadweb");
                                formData.append("country", "58");
                                // formData.append(
                                //     "codeArea",
                                //     codeArea.options[codeArea.selectedIndex].textContent
                                // );
                                let dataSignup = await fetch("ajax.php", {
                                    method: "POST",
                                    body: formData,
                                });
                                let resSignup = await dataSignup.json();
                                // console.log(resSignup);


                                // Quitando loader
                                modal.closeModal("loader");

                                if (resSignup.code === "0000") {
                                    modal.openModal("modalSuccess", TITLE_SECTION, resSignup.message);
                                } else if (resSignup.code === "5000") {
                                    modal.openModal("modalDanger", TITLE_SECTION, resSignup.message);
                                } else {
                                    modal.openModal("modalDanger", TITLE_SECTION, resSignup.message);
                                }
                            } else {
                                modal.openModal("modalDanger", TITLE_SECTION, "PIN NO VALIDO");
                            }
                        });
                    } else if (resEmailPin.code === "5000") {
                        modal.openModal("modalDanger", TITLE_SECTION, resEmailPin.message);
                    } else {
                        modal.openModal("modalDanger", TITLE_SECTION, resEmailPin.message);
                    }
                } else if (res.code === "5000") {
                    modal.openModal("modalDanger", TITLE_SECTION, resPin.message);
                } else {
                    modal.openModal("modalDanger", TITLE_SECTION, resPin.message);
                }
            });
        }
    });
}