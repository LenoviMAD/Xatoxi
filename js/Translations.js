import {toCapitalize} from './helpers.js';

export default function init() {
    $(document).ready(function () {
        // userLang = window.navigator.language.split('-')[0]
        let btnDropdown = document.getElementById('btnDropdown')
        if (btnDropdown) {
            let dropdownLanguages = document.getElementById('dropdownLanguages')
            let defaultLang = 'en';
            let tempLang = ''
            changeLanguage(defaultLang)
            
    
            dropdownLanguages.childNodes.forEach(item => {
                item.addEventListener('click', () => {
                    if(tempLang !== item.dataset.lang) {
                        tempLang = item.dataset.lang
                        btnDropdown.innerHTML = `${toCapitalize(item.dataset.lang)} <div id="flechaAbajo"></div>`
                        changeLanguage(item.dataset.lang)
                    }
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