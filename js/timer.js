export default class Timer {
    //Funcion que realiza la cuenta regresiva en las ventanas de verificationPin y OTP
    updateClock = () => {

        var cuentaAtras = document.getElementById('countdown');


        function countDown() {
            var contador = 115;

            cuentaAtras.style.color = 'black';

            cuentaAtras.textContent = contador;

            var valorCuentaAtras = setInterval(function() {
                if (contador > 0) {
                    contador--;
                    cuentaAtras.textContent = contador;
                } else {
                    clearInterval(valorCuentaAtras);
                    location.href = "./index.php";
                    //segundos.focus();
                }

                if (contador <= 3) {
                    cuentaAtras.style.color = 'red';
                }
            }, 1000);

            document.querySelector("[data-id='btnOtp']").addEventListener('click', async e => {
                e.preventDefault()
                clearInterval(valorCuentaAtras);
            })
            document.querySelector("[data-id='btnPin']").addEventListener('click', async e => {
                e.preventDefault()
                clearInterval(valorCuentaAtras);
            })
        };

        countDown()

    }

    //Funcion que contiene el temporizador de la modal Sesion inactiva
    closeWindowClock = () => {

        // var cuentaAtras = document.getElementById('countdown');


        function countDown() {
            var contador = 10;

            // cuentaAtras.style.color = 'black';

            // cuentaAtras.textContent = contador;

            var valorCuentaAtras = setInterval(function() {
                if (contador > 0) {
                    contador--;
                    // cuentaAtras.textContent = contador;
                } else {
                    clearInterval(valorCuentaAtras);
                    location.href = "./index.php";
                    //segundos.focus();
                }

                // if (contador <= 3) {
                //     // cuentaAtras.style.color = 'red';
                // }
            }, 1000);

            document.querySelector("[data-id='btnYes']").addEventListener('click', async e => {
                e.preventDefault()
                clearInterval(valorCuentaAtras);
            })
        };

        countDown()





    }

}