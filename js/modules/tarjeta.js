import Modal from './Modal.js';

// tarjeta
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {
        const modal = new Modal()
        modal.initModal()

        const tarjeta = document.querySelector('#tarjeta'),
            genQR = document.querySelector('#genQR'),
            htmlccnumber = document.querySelector('#htmlccnumber'),
            imgFront = document.querySelector('#imgFront')

        if (tarjeta) {

            // * Rotacion de la tarjeta
            tarjeta.addEventListener('click', () => {
                tarjeta.classList.toggle('active');
            });
            genQR.addEventListener('click', async () => {
                let formData = new FormData()
                formData.append("cond", "genQR");
                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                let res = await data.text();

                imgFront.innerHTML = res
                colorTransparentQR()
                modal.openModal('modalQR')
            });

            // Ponemos espacio cada cuatro numeros
            htmlccnumber.textContent = htmlccnumber.textContent
                .replace(/([0-9]{4})/g, '$1 ')
        }

        function colorTransparentQR() {
            let selector = document.querySelector('#imgFront rect')
            if (selector) {
                selector.setAttribute('fill', '#ffffff00')
            }
        }
        //     // Eliminamos espacios en blanco
        //     .replace(/\s/g, '')
        //     // Eliminar las letras
        //     .replace(/\D/g, '')
        //     // Ponemos espacio cada cuatro numeros
        //     .replace(/([0-9]{4})/g, '$1 ')
        //     // Elimina el ultimo espaciado
        //     .trim();
    })
}