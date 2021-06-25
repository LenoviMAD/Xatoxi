// tarjeta
export default function init() {
    document.addEventListener('DOMContentLoaded', () => {

        const tarjeta = document.querySelector('#tarjeta')

        // * Rotacion de la tarjeta
        tarjeta.addEventListener('click', () => {
            tarjeta.classList.toggle('active');
        });

        // * Input numero de tarjeta
            // formulario.inputNumero.value = valorInput
            //     // Eliminamos espacios en blanco
            //     .replace(/\s/g, '')
            //     // Eliminar las letras
            //     .replace(/\D/g, '')
            //     // Ponemos espacio cada cuatro numeros
            //     .replace(/([0-9]{4})/g, '$1 ')
            //     // Elimina el ultimo espaciado
            //     .trim();

            // numeroTarjeta.textContent = valorInput;

            // if (valorInput == '') {
            //     numeroTarjeta.textContent = '#### #### #### ####';

            //     logoMarca.innerHTML = '';
            // }


        // * CCV
        

            // formulario.inputCCV.value = formulario.inputCCV.value
            //     // Eliminar los espacios
            //     .replace(/\s/g, '')
            //     // Eliminar las letras
            //     .replace(/\D/g, '');

            // ccv.textContent = formulario.inputCCV.value;
            

    })
}