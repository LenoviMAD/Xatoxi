export default class Timer {
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
        };

        countDown()

    }
}