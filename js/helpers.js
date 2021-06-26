
export function numberFormater(num) {
    return new Intl.NumberFormat().format(num)
    // num = new Intl.NumberFormat("de-DE").format(num)
    // parseInt(num).toFixed(3);
    // return num
}

export function toCapitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

export function number_format_js(number, decimals, dec_point, thousands_point) {

    if (number == null || !isFinite(number)) {
        throw new TypeError("number is not valid");
    }

    if (!decimals) {
        var len = number.toString().split('.').length;
        decimals = len > 1 ? len : 0;
    }

    if (!dec_point) {
        dec_point = '.';
    }

    if (!thousands_point) {
        thousands_point = ',';
    }

    number = parseFloat(number).toFixed(decimals);

    number = number.replace(".", dec_point);

    var splitNum = number.split(dec_point);
    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
    number = splitNum.join(dec_point);

    return number;
}

export function putRequiered(padre = [], quitarDeAqui = []) {
    // let hijitos = document.querySelectorAll(`#${padre} input, #${padre} select, #${padre} textarea`)
    // for (const hijo of hijitos) {
    //     console.log(hijo.setAttribute('required', true));
    // }
    let testing2
    for (const hijo of padre) {
        testing2 = document.querySelectorAll(`#${hijo} input, #${hijo} select, #${hijo} textarea`)
        for (const test of testing2) {
            test.setAttribute('required', true)
        }
    }

    // QUITAR REQUIRED DE LOS DEMAS INPUTS OCULTOS
    let testing

    for (const quitar of quitarDeAqui) {
        testing = document.querySelectorAll(`#${quitar} input, #${quitar} select, #${quitar} textarea`)
        for (const test of testing) {
            test.removeAttribute('required')
        }
    }
}

//Funcion que permite enviar los datos indicados de 1 o varios selects y enviarlos el ajax, que permite ir a servicio
//y devolver una lista para agregarla a otro select
//srcdst = Es una cadena de caracteres donde se encuentran los ID de los elementos html, separados por "/" 
//url = es una ruta para mandarsela al ajax, donde va incluida una varaible cond, que permite validar en el archivo ajax.php
export async function selectValorforId(srcdst, url) {
    const src = srcdst.split("/")
    const dst = src[src.length - 1];

    let iddst = document.getElementById(dst);
    let values = "";
    let value = ""
    for (let index = 0; index < src.length - 1; index++) {
        let idValue = document.getElementById(src[index]);
        if (dst != "codeArea") {
            value = idValue.options[idValue.selectedIndex].value;
        } else {
            value = idValue.options[idValue.selectedIndex].text;
        }
        values += `&valor${index}=${value}`
    }
    console.log(values)
    const data = await fetch(`${url}${values}`, { method: "GET" });
    const rest = await data.json();
    console.log(rest)

    let output = "<option disabled selected>Seleccione</option>';";
    if (dst === "bancoPagoMovil") {
        rest.list.forEach(element => {
            output += `<option value="${element.code}">${element.name}</option>`;
        });
    } else if (dst === "areaCode") {
        rest.list.forEach(element => {
            output += `<option value="${element.code}">${element.code}</option>`;
        });
    } else {
        rest.list.forEach(element => {
            if (element.iso != null) {
                output += `<option value="${element.id}">${element.iso}</option>`;
            } else if (element.code != null) {
                output += `<option value="${element.id}">${element.code}</option>`;
            } else if (element.name != null) {
                output += `<option value="${element.id}">${element.name}</option>`;
            }
        });
    }

    //Fin ajax

    iddst.innerHTML = output;
}

const toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = error => reject(error);
});

const URI = location.origin + "/xatoxi/"

export async function servicioFirma(payload = {}) {
    // UPLOAD DOCUMENT 
    let formData = new FormData()
    formData.append("cond", "docUpload");
    formData.append("filename", payload.filename);
    formData.append("encoded", payload.encoded);
    formData.append("type", payload.type);

    let dataUpload = await fetch("ajax.php", { method: 'POST', body: formData });
    let resUpload = await dataUpload.json();

    return resUpload
}

export async function closeEverythingExceptThis(padre, elqueno) {
    const container = document.getElementById(padre)
    const hijo = document.getElementById(elqueno)

    container.childNodes.forEach(value => {
        if (value.nodeName !== "#text") {
            if (value.getAttribute('id')) {
                if (!value.classList.contains('hidden')) {
                    value.classList.add('hidden')
                }
            }
        }
    })

    hijo.classList.remove('hidden')
}

export async function closeEverythingExceptThese(padre, losqueno) {
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
export async function closeEverything(padre) {
    const container = document.getElementById(padre)

    container.childNodes.forEach(value => {
        if (value.nodeName !== "#text") {
            if (value.getAttribute('id')) {
                if (!value.classList.contains('hidden')) {
                    value.classList.add('hidden')
                }
            }
        }
    })
}

export {
    URI,
    toBase64
}