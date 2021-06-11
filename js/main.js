
// if (document.getElementsByClassName("openModal")) {

//     var modal = document.getElementById("tvesModal");

//     var btn = document.getElementsByClassName("openModal");

//     for (var i = 0; i < btn.length; i++) {
//         btn[i].addEventListener("click", function () {
//             modal.style.display = "block";

//             body.style.position = "static";
//             body.style.height = "100%";
//             body.style.overflow = "hidden";
//         });
//     }


//     var span = document.getElementsByClassName("close")[0];
//     var body = document.getElementsByTagName("body")[0];

//     if (span) {
//         span.onclick = function () {
//             modal.style.display = "none";
//             body.style.position = "inherit";
//             body.style.height = "auto";
//             body.style.overflow = "visible";
//         }
//     }
//     window.onclick = function (event) {
//         if (event.target == modal) {
//             modal.style.display = "none";

//             body.style.position = "inherit";
//             body.style.height = "auto";
//             body.style.overflow = "visible";
//         }
//     }
// }

const item1 = document.getElementById("opc1");
const item2 = document.getElementById("opc2");
const item3 = document.getElementById("opc3");

if (item1) {
    item1.addEventListener("click", () => {
        //remove class
        item1.classList.remove("no-Select");
        item2.classList.remove("no-Select");
        item3.classList.remove("no-Select");

        //add class
        item2.classList.add("no-Select");
        item3.classList.add("no-Select");
    })
}

if (item2) {
    item2.addEventListener("click", () => {
        //remove class
        item1.classList.remove("no-Select");
        item2.classList.remove("no-Select");
        item3.classList.remove("no-Select");

        //add class
        item1.classList.add("no-Select");
        item3.classList.add("no-Select");
    })
}

if (item3) {
    item3.addEventListener("click", () => {
        //remove class
        item1.classList.remove("no-Select");
        item2.classList.remove("no-Select");
        item3.classList.remove("no-Select");
        //add class
        item2.classList.add("no-Select");
        item1.classList.add("no-Select");
    })
}

function closeEverythingExceptThese(padre, losqueno) {
    const container = document.getElementById(padre)

    // Colocamos 
    container.childNodes.forEach(value => {
        if (value.nodeName !== "#text") {
            if (value.getAttribute('id')) {
                if (!value.classList.contains('hidden')) {
                    value.classList.add('hidden')
                }
            }
        }
    })

    // Quitar clase hidden a "losqueno"
    losqueno.forEach(value => {
        let hijo = document.getElementById(value)

        if (hijo.classList.contains('hidden')) {
            hijo.classList.remove('hidden')
        }
    })

}

document.addEventListener('DOMContentLoaded', async function () {
    const container = document.querySelector("#item-container");
    const wrapperButtons = document.querySelector("#wrapperButtons");
    const wrapperSections = document.querySelector("#wrapperSections")
    const wrapper = document.getElementById("wrapper")


    if (container) {

        // Fetch session currectly
        const formData = new FormData();
        formData.append("cond", "session");
        const data = await fetch("ajax.php", { method: 'POST', body: formData });
        const resUserSession = await data.json();

        // SETEAMOS LOS DATOS SI VIENEN DE CAMBIO
        if (resUserSession.refToChange) {
            // Agregamos las animaciones a la botonera 1
            container.classList.add('animate')
            container.classList.add('animate__fadeOut')
            setTimeout(() => { container.classList.add('hidden') }, 1000);

            // Agregando clases al segundo wrapper
            wrapper.classList.remove('hidden')
            wrapper.classList.add('overlap-a')
            wrapper.classList.add('animate')
            wrapper.classList.add('animate__fadeIn')

            // QUITAMOS EL PADDING DEL WRAPPER
            document.querySelector('.wrapper').classList.add('p0')

            const iterator = document.querySelector(`button[data-id="${resUserSession.refToChange}"]`)
            const iterator2 = document.querySelector(`div[data-id="${resUserSession.refToChange}"]`)


            // Ponemos activo a uno y desactivamos los demas
            for (const other of wrapperButtons.children) {
                // recorriendo opciones targets
                if (iterator.dataset.id === other.dataset.id) {
                    actives(iterator)
                }
            }

            // Abrimos la seccion correspondiente
            for (const other of wrapperSections.children) {
                // recorriendo opciones targets
                if (iterator2.dataset.id === other.dataset.id) {
                    iterator2.classList.remove('hidden')
                }
            }
        } else {
            // recorriendo header targets
            for (const iterator of container.children) {
                iterator.addEventListener('click', async () => {
                    // Agregamos las animaciones a la botonera 1
                    container.classList.add('animate')
                    container.classList.add('animate__fadeOut')
                    setTimeout(() => { container.classList.add('hidden') }, 1000);

                    // Agregando clases al segundo wrapper
                    wrapper.classList.remove('hidden')
                    wrapper.classList.add('overlap-a')
                    wrapper.classList.add('animate')
                    wrapper.classList.add('animate__fadeIn')

                    // QUITAMOS EL PADDING DEL WRAPPER
                    document.querySelector('.wrapper').classList.add('p0')

                    for (const other of wrapperSections.children) {
                        if (other.dataset.id === iterator.dataset.id) {
                            actives(iterator)
                            other.classList.remove('hidden')
                        } else {
                            other.classList.add('hidden')
                        }
                    }
                })
            }

            for (const iterator of wrapperButtons.children) {
                iterator.addEventListener('click', async () => {
                    // recorriendo opciones targets
                    for (const other of wrapperSections.children) {
                        if (other.dataset.id === iterator.dataset.id) {
                            actives(iterator)
                            other.classList.remove('hidden')
                        } else {
                            other.classList.add('hidden')
                        }
                    }
                })
            }
        }


        // comparacion con los botones para quitar activos y dejar solo uno
        function actives(iterator) {
            for (const val of wrapperButtons.children) {
                if (val.dataset.id != iterator.dataset.id) {
                    val.classList.remove('active')
                    val.classList.add('no-active')
                } else {
                    val.classList.remove('no-active')
                    val.classList.add('active')
                }
            }
        }
    }
});

//Funcion que permite enviar los datos indicados de 1 o varios selects y enviarlos el ajax, que permite ir a servicio
//y devolver una lista para agregarla a otro select
//srcdst = Es una cadena de caracteres donde se encuentran los ID de los elementos html, separados por "/" 
//url = es una ruta para mandarsela al ajax, donde va incluida una varaible cond, que permite validar en el archivo ajax.php
async function selectValorforId(srcdst, url) {
    const src = srcdst.split("/")
    const dst = src[src.length - 1];

    let iddst = document.getElementById(dst);
    let values = "";
    for (let index = 0; index < src.length - 1; index++) {
        let idValue = document.getElementById(src[index]);
        if (dst != "codeArea") {
            value = idValue.options[idValue.selectedIndex].value;
        } else {
            value = idValue.options[idValue.selectedIndex].text;
        }
        values += `&valor${index}=${value}`
    }

    const data = await fetch(`${url}${values}`, { method: "GET" });
    const rest = await data.json();

    let output = "<option disabled selected>Seleccione</option>';";
    rest.list.forEach(element => {
        if (element.iso != null) {
            output += `<option value="${element.id}">${element.iso}</option>`;
        } else if (element.code != null) {
            output += `<option value="${element.id}">${element.code}</option>`;
        } else if (element.name != null) {
            output += `<option value="${element.id}">${element.name}</option>`;
        }
    });
    //Fin ajax

    iddst.innerHTML = output;

}

if (true) {
    // JavaScript Document

    //Acciones tras cargar la página
    mostrarEnPantalla = document.getElementById("inputPin");
    mostrarEnPantalla2 = document.getElementById("cambioPin");
    if (mostrarEnPantalla || mostrarEnPantalla2) {

        //Variable para ir guardando el valor del caracter
        x = "0";

        /*Se inician las variales en la pantalla: 1 es un número escrito por primera 
        vez, mientras que 0 son las cifras que completan nuestro número*/
        x1 = 1;

    }


    //Función numero para registar la escritura en pantalla
    function numero(xx) {
        // Si x es igual a 0 el número que se muestra en pantalla es igual a 1.
        if (mostrarEnPantalla.value.length < 4) {
            if (x == "0" || x1 == 1) {
                mostrarEnPantalla.value = xx;
                //Con esta variable se guarda el número y se continua con este
                x = xx;
            } else {
                /*Esta operación se hace mediante una cadena de texto para que el 
                         número tan solo se añada y no se sume al anterior*/
                mostrarEnPantalla.value += xx;
                x += xx;
            }
            x1 = 0;
        }
    }

    //Función numero para registar la escritura en pantalla
    function numero2(xx) {
        // Si x es igual a 0 el número que se muestra en pantalla es igual a 1.
        if (mostrarEnPantalla2.value.length < 4) {
            if (x == "0" || x1 == 1) {
                mostrarEnPantalla2.value = xx;
                //Con esta variable se guarda el número y se continua con este
                x = xx;
            } else {
                /*Esta operación se hace mediante una cadena de texto para que el 
                         número tan solo se añada y no se sume al anterior*/
                mostrarEnPantalla2.value += xx;
                x += xx;
            }
            x1 = 0;
        }
    }

    //En esta función solo borraremos la última cifra que puesta en la pantalla
    function borradoUltimaCifra() {
        //Con 'length' podemos localizar la última cifra
        cifras = x.length;

        //Una vez localizada puede ser borrada
        borrar = x.substr(cifras - 1, cifras);
        x = x.substr(0, cifras - 1);

        mostrarEnPantalla.value = x;
    }
    //En esta función solo borraremos la última cifra que puesta en la pantalla
    function borradoUltimaCifra2() {
        //Con 'length' podemos localizar la última cifra
        cifras = x.length;

        //Una vez localizada puede ser borrada
        borrar = x.substr(cifras - 1, cifras);
        x = x.substr(0, cifras - 1);

        mostrarEnPantalla2.value = x;
    }
}

document.addEventListener("DOMContentLoaded", function (params) {
    const form = document.getElementById("idForm");

    if (form) {

        form.addEventListener("submit", async (e) => {
            const idCodeCountry = document.getElementById("CodeCountry");
            const idAreaCode = document.getElementById("codeArea");

            var textCodeCountry = idCodeCountry.options[idCodeCountry.selectedIndex].text;
            var textAreaCode = idAreaCode.options[idAreaCode.selectedIndex].text;
            e.preventDefault();
            const formData = new FormData(form);
            formData.append("CodeCountry", textCodeCountry);
            formData.append("codeArea", textAreaCode);
            formData.append("newRegister", "0");
            const data = await fetch("ajax.php", { method: 'POST', body: formData });
            const rest = await data.json();
        })
    }
})

document.addEventListener('DOMContentLoaded', function () {
    const mainMenu = document.getElementById("mainMenu");

    if (mainMenu) {
        mainMenu.childNodes.forEach(value => {
            if (value.nodeName !== '#text') {
                if (value.classList.contains('openModal')) {
                    value.addEventListener('click', async () => {
                        value.classList.add("activeClass")
                    })
                }
            }
        })
    }

    const tvesModal = document.getElementById("tvesModal");

    window.onclick = function (event) {
        if (event.target == tvesModal) {
            modal.style.display = "none";

            body.style.position = "inherit";
            body.style.height = "auto";
            body.style.overflow = "visible";
            mainMenu.childNodes.forEach(value => {
                if (value.nodeName !== '#text') {
                    value.classList.remove('activeClass')
                }
            })
        }
    }
})

//Esta funcion se encarga de obtener los valores a enviar a los servicios y devolver el ouput del servicio
//Tiene la particularidad de que la variable srcdst tendra tanto el/los valore(s) a enviar y el/los destinos
//que serian en donde se colocaran esos datos devueltos por el servicio
//Se separaran por  2 simbolos que serian el * para indicar que lado son los valores y cuales los destinos
//En el lado derecho se encontraran los destinos y en el izquierdos los valores a enviar
//Tambien se separaran internamente por "/" que nos indicara cuantos valores o destinos hay despues de la primera separacion
async function selectValuesforSepartor(srcdst, url) {

    const separator = srcdst.split("*");
    const src = separator[0];
    const dst = separator[1];
    const nameSrc = src.split("/")
    const nameDst = dst.split("/")


    let iddst = document.getElementById(dst);
    let values = "";
    for (let index = 0; index < src.length; index++) {
        let idValue = document.getElementById(nameSrc[index]);
        if (dst != "codeArea") {
            value = idValue.options[idValue.selectedIndex].value;

        } else {
            value = idValue.options[idValue.selectedIndex].text;
        }
        values += `&valor${index}=${value}`
    }

    const data = await fetch(`${url}${values}`, { method: "GET" });
    const rest = await data.json();

    let output = "<option disabled selected>Seleccione</option>';";
    rest.list.forEach(element => {
        if (element.iso != null) {
            output += `<option value="${element.id}">${element.iso}</option>`;
        } else if (element.code != null) {
            output += `<option value="${element.id}">${element.code}</option>`;
        } else if (element.name != null) {
            output += `<option value="${element.id}">${element.name}</option>`;
        }
    });
    //Fin ajax

    iddst.innerHTML = output;
}

async function onblurCustom(src, dst, url) {
    const nameSrc = src.split("/")
    const nameDst = dst.split("/")

    let values = "";
    let idValue;
    for (let index = 0; index < nameSrc.length; index++) {
        idValue = document.getElementById(nameSrc[index]);

        if (idValue.id != "amountCommend" && idValue.id != "amountTransfer") {
            value = idValue.options[idValue.selectedIndex].value;
        } else {
            value = idValue.value;
        }

        values += `&valor${index}=${value}`
    }
    const data = await fetch(`${url}${values}`, { method: "GET" });
    const rest = await data.json();

    nameDst.forEach(element => {
        let test = document.getElementById(element);
        if (element == "amountBsCommend" || element == "amountBsTransfer") {
            //test.disabled = false;
            test.value = rest.totalves;
            //element.disable = true;
        } else if (element == "exchangeRateCommend" || element == "exchangedRateTransfer") {
            //test.disabled = false;
            test.value = rest.usdrate;
            //element.disable = true;
        }
    });

    //Fin ajax
}

function execTwoFuntions(fsrc, fdst, furl, ssrcdst, surl) {
    onblurCustom(fsrc, fdst, furl);
    selectValorforId(ssrcdst, surl);
}

function validaNumericos(event) {
    if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
    }
    return false;
}