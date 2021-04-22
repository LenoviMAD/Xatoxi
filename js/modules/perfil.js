import Modal from './Modal.js';
import { selectValorforId } from '../helpers.js';

// Cambio
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const profileForm = document.getElementById('profileForm')
        const TITLE_SECTION = "Perfil"
        const modal = new Modal()
        modal.initModal()

        if (profileForm) {
            const typeDocument = document.querySelector(`#${profileForm.getAttribute('id')} [name="typeDocument"]`)
            const documentC = document.querySelector(`#${profileForm.getAttribute('id')} [name="document"]`)
            const birthdate = document.querySelector(`#${profileForm.getAttribute('id')} [name="birthdate"]`)
            const firstName = document.querySelector(`#${profileForm.getAttribute('id')} [name="firstName"]`)
            const secondName = document.querySelector(`#${profileForm.getAttribute('id')} [name="secondName"]`)
            const firstSurname = document.querySelector(`#${profileForm.getAttribute('id')} [name="firstSurname"]`)
            const secondSurname = document.querySelector(`#${profileForm.getAttribute('id')} [name="secondSurname"]`)
            const country = document.querySelector(`#${profileForm.getAttribute('id')} [name="country"]`)
            const state = document.querySelector(`#${profileForm.getAttribute('id')} [name="state"]`)
            const city = document.querySelector(`#${profileForm.getAttribute('id')} [name="city"]`)
            const direction = document.querySelector(`#${profileForm.getAttribute('id')} [name="direction"]`)
            const preferenceAgency = document.querySelector(`#${profileForm.getAttribute('id')} [name="preferenceAgency"]`)
            const bankAccount = document.querySelector(`#${profileForm.getAttribute('id')} [name="bankAccount"]`)
            const bancoPagoMovil = document.querySelector(`#${profileForm.getAttribute('id')} [name="bancoPagoMovil"]`)
            const telMovil = document.querySelector(`#${profileForm.getAttribute('id')} [name="telMovil"]`)
            const prepaidcardnumber = document.querySelector(`#${profileForm.getAttribute('id')} [name="prepaidcardnumber"]`)
            const debitcardnumber = document.querySelector(`#${profileForm.getAttribute('id')} [name="debitcardnumber"]`)

            // Funcion solamente para llenar campos del perfil 
            async function test(resIsParty) {
                if (resIsParty) {
                    typeDocument.childNodes.forEach(element => {
                        if (element.textContent.trim() === resIsParty.documentid.substr(0, 1)) {
                            element.setAttribute("selected", true)
                        }
                    });

                    documentC.value = resIsParty.documentid.substr(1, resIsParty.documentid.length)
                    birthdate.value = resIsParty.birthdate.split(" ")[0].split("/").reverse().join("-");
                    firstName.value = resIsParty.firstname
                    secondName.value = resIsParty.middlename
                    firstSurname.value = resIsParty.lastname
                    secondSurname.value = resIsParty.secondlastname

                    country.childNodes.forEach(element => {
                        if (element.value === resIsParty.idcountry) {
                            element.setAttribute("selected", true)
                        }
                    });

                    // Despues de setear country ejecutar funcion para llenar el siguiente select
                    await selectValorforId('country/state', 'ajax.php?cond=getcountrystatel')

                    state.childNodes.forEach(element => {
                        if (element.value === resIsParty.idstate) {
                            element.setAttribute("selected", true)
                        }
                    });

                    // Despues de setear state ejecutar funcion para llenar el siguiente select
                    await selectValorforId('state/city', 'ajax.php?cond=getstatecityl')

                    city.childNodes.forEach(element => {
                        if (element.value === resIsParty.idcity) {
                            element.setAttribute("selected", true)
                        }
                    });

                    preferenceAgency.childNodes.forEach(element => {
                        if (element.value === resIsParty.idlocation) {
                            element.setAttribute("selected", true)
                        }
                    });

                    direction.value = resIsParty.address
                    bankAccount.value = resIsParty.bankaccount
                }
                // prepaidcardnumber.value = res.prepaidcardnumber
                // debitcardnumber.value = res.debitcardnumber
            }
            // Llenamos todos los campos si getparty 
            async function getParty() {
                // Fetch session currectly
                const formData = new FormData();
                formData.append("cond", "session");
                const data = await fetch("ajax.php", { method: 'POST', body: formData });
                const res = await data.json();

                // Fetch getparty
                const formDataIsParty = new FormData();

                formDataIsParty.append("cond", "getparty");
                formDataIsParty.append("idParty", res.idparty);
                formDataIsParty.append("idLead", res.idlead);

                const dataIsParty = await fetch("ajax.php", { method: 'POST', body: formDataIsParty });
                const resIsParty = await dataIsParty.json();

                if (resIsParty.code === "0000") {
                    test(resIsParty)

                    bancoPagoMovil.childNodes.forEach(element => {
                        if (element.value === res.mpbankcode) {
                            element.setAttribute("selected", true)
                        }
                    });

                    telMovil.value = res.mpbankaccount
                }
            }
            getParty()

            // cliente ya existente en la organizacion ci
            async function getpartyexists() {
                // Fetch session currectly
                const formData = new FormData();
                formData.append("cond", "session");
                const data = await fetch("ajax.php", { method: 'POST', body: formData });
                const res = await data.json();

                if (!res.idparty) {
                    if (documentC.value &&
                        (typeDocument.options[typeDocument.selectedIndex].value !== "Seleccione")) {

                        let doc = typeDocument.options[typeDocument.selectedIndex].textContent.trim() + "" + documentC.value.trim()

                        // Fetch session currectly
                        const formData = new FormData();
                        formData.append("cond", "getpartyexists");
                        formData.append("documentid", doc);

                        const data = await fetch("ajax.php", { method: 'POST', body: formData });
                        const res = await data.json();

                        // Llenar los campos correspondientes
                        if (res.code == "0000") {
                            test(res)
                        }
                    }
                }
            }

            typeDocument.addEventListener('change', () => {
                getpartyexists()
            })
            documentC.addEventListener('blur', () => {
                getpartyexists()
            })
            profileForm.addEventListener('submit', async e => {
                e.preventDefault()

                // Cargando spinner
                modal.openModal('loader', undefined, undefined, false)

                const formData = new FormData(profileForm);
                let doc = typeDocument.options[typeDocument.selectedIndex].textContent.trim() + "" + documentC.value.trim()

                formData.append("cond", "leadToParty");
                formData.append("documentid", doc);

                const data = await fetch("ajax.php", { method: 'POST', body: formData });
                const res = await data.json();

                // Quitando spinner
                modal.closeModal('loader')

                if (res.code === "0000") {
                    modal.openModal('modalSuccess', TITLE_SECTION, res.message)
                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, 'Ocurrio un error, favor intente de nuevo')
                }
            })
        }
    })
}