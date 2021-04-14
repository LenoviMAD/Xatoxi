// Imports
import envio from './modules/envio.js'
import venta from './modules/venta.js'
import compra from './modules/compra.js'
import cambio from './modules/cambio.js'
import recepcion from './modules/recepcion.js'
import register from './modules/register.js'
import auth from './modules/auth.js'
import perfil from './modules/perfil.js'
import canvas from './modules/canvas.js'

// Modules init
envio()
venta()
compra()
cambio()
recepcion()
register()
auth()
perfil()
canvas()

document.addEventListener('DOMContentLoaded', async () => {

    // Funcionalidad : Olvido de PIN
    const btnOlvidoPin = document.getElementById('btnOlvidoPin')

    if (btnOlvidoPin) {
        btnOlvidoPin.addEventListener('click', async () => {
            // Fetch session currectly
            const body = new FormData();
            body.append("cond", "resetpin");
            // body.append("tag", "");

            const data = await fetch("ajax.php", { method: 'POST', body });
            const res = await data.json();
            console.log(res);
        })
    }

})