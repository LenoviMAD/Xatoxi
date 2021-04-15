export function numberFormater(num) {
    return new Intl.NumberFormat().format(num)
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