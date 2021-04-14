import Modal from './Modal.js';

export default function init() {
    document.addEventListener('DOMContentLoaded', () => {

        const modal = new Modal()
        modal.initModal()
        const inputPin = document.getElementById('inputPin'),
            inputTag = document.getElementById('inputTag'),
            btnPin = document.getElementById('btnPin')

        if (btnPin) {
            const mainMenu = document.getElementById("mainMenu");
            inputPin.value = "9883"
            inputTag.value = "miatagbuenisimo20"

            btnPin.addEventListener('click', async e => {
                e.preventDefault()

                // Auth
                modal.openModal('loader', undefined, undefined, false)

                const formData = new FormData();
                formData.append("cond", "AuthPin");
                formData.append("pin", inputPin.value);
                formData.append("tag", inputTag.value);
                const data = await fetch("ajax.php", { method: 'POST', body: formData });
                const res = await data.json();

                console.log(res);
                if (res.code === "0000") {

                    // is party (getParty)
                    const formDataIsParty = new FormData();
                    formDataIsParty.append("cond", "getparty");
                    formDataIsParty.append("idParty", res.idparty);
                    formDataIsParty.append("idLead", res.id);
                    const dataIsParty = await fetch("ajax.php", { method: 'POST', body: formDataIsParty });
                    const resIsParty = await dataIsParty.json();

                    modal.closeModal('loader')

                    // const formDataIsParty = new FormData();
                    // formDataIsParty.append("cond", "isParty");
                    // formDataIsParty.append("idParty", res.idParty);
                    // const dataIsParty = await fetch("ajax.php", { method: 'POST', body: formDataIsParty });
                    // const resIsParty = await dataIsParty.json();
                    // console.log(resIsParty);

                    console.log(resIsParty);
                    // No es cliente lead to party (redireccionamos a perfil)
                    if (resIsParty.code === "0000") {
                        let url = ""

                        // REDIRECCIONAR PARA DONDE QUIERA
                        mainMenu.childNodes.forEach(value => {
                            if (value.nodeName == "ARTICLE") {
                                if (value.classList.contains("activeClass")) {
                                    url = value.dataset.url
                                }
                            }
                        })
                        
                        location.href = location.origin + "/xatoxi/" +url

                    } else if (resIsParty.code === "5000") {
                        // setear para donde redireccionara
                        let test = document.querySelector('#modalDanger a')
                        test.setAttribute("href", "./perfil.php")
                        test.removeAttribute("data-close")

                        test.addEventListener('click', e => {
                            location.href = "./perfil.php";
                        })
                        modal.openModal('modalDanger', 'Datos incompletos', resIsParty.message)
                    } else {
                        modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                    }
                } else if (res.code === "6000") {
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', 'Autenticación', res.message)
                } else if (res.code === "5000") {
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', 'Datos incompletos', res.message)
                } else {
                    modal.closeModal('loader')
                    modal.openModal('modalDanger', 'Hubo un error', 'Ocurrio un error, favor intente de nuevo')
                }
            })
        }
    })

}