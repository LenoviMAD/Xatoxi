import { toCapitalize } from './helpers.js';

export default function init() {
    $(document).ready(async function () {
        // userLang = window.navigator.language.split('-')[0]
        let btnDropdown = document.getElementById('btnDropdown')
        if (btnDropdown) {
            let dropdownLanguages = document.getElementById('dropdownLanguages')
            let dropbtn = document.querySelector('.dropbtn')

            let formData = new FormData()
            formData.append("cond", "gettranslate");
            let data = await fetch("ajax.php", { method: 'POST', body: formData });
            let res = await data.text();

            // Setear el dropdown con los valores por defecto
            dropbtn.innerHTML = `${toCapitalize(res)} <div id="flechaAbajo"></div>`

            changeLanguage(res)

            dropdownLanguages.childNodes.forEach(item => {
                item.addEventListener('click', async () => {
                    let formData = new FormData()
                    formData.append("cond", "addtranslate");
                    formData.append("req", item.dataset.lang);

                    let data = await fetch("ajax.php", { method: 'POST', body: formData });
                    let res = await data.text();

                    btnDropdown.innerHTML = `${toCapitalize(res)} <div id="flechaAbajo"></div>`
                    changeLanguage(res)
                })
            })
        }

    });
}

export function changeLanguage(userLang) {
    let translations = `./translations/intl_${userLang}.json`;

    $.getJSON(translations)
        .done(function (data) {
            $('.js-translate').each(function () {
                const string = $(this).attr('data-string');
                if (string) {
                    $(this).html(data[string]);
                }
            });
        });
}
export async function changeLanguageSection(selector) {
    let formData = new FormData()
    formData.append("cond", "gettranslate");
    let data = await fetch("ajax.php", { method: 'POST', body: formData });
    let res = await data.text();

    let translations = `./translations/intl_${res}.json`;

    $.getJSON(translations)
        .done(function (data) {
            $(`${selector} .js-translate`).each(function () {
                const string = $(this).attr('data-string');
                if (string) {
                    $(this).html(data[string]);
                }
            });
        });
}