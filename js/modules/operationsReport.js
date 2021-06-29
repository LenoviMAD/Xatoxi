import Modal from './Modal.js';

// Solicitud de tarjeta para recibir remesas
export default function init() {
    document.addEventListener('DOMContentLoaded', async () => {
        const modal = new Modal()
        modal.initModal()

        const tableOperations = document.getElementById('example')

        if (tableOperations) {
            const TITLE_SECTION = "Resumenes de operaciones"
            const tbody = document.querySelector(`#${tableOperations.getAttribute('id')} tbody`)
            
            // Request de operaciones hechas por el usuario
            async function fetchOperations() {
                // Cargando loader
                modal.openModal('loader', undefined, undefined, false)

                let formData = new FormData()
                formData.append("cond", "mreportl");

                let data = await fetch("ajax.php", { method: 'POST', body: formData });
                let res = await data.json();
                console.log(res)

                // Quitando loader
                modal.closeModal('loader')
                if (res.code === "0000") {
                    // Si no tengo data
                    if(res.list[0].id) {
                        let tr = ""
                        res.list.map(item => {
                            tr += `
                            <tr class="custom-row" data-id="${item.id}">
                                <td class="custom-td1">
                                    <span class="table-reports__fecha">${item.date}</span>
                                </td>
                                <td class="custom-td2">${item.oper}</td>
                                <td class="custom-td4">${item.amount}</td>
                                <td class="custom-td5">${item.status}</td>
                            </tr>
                            `
                        })
                        tbody.innerHTML = tr
                        $('#example').DataTable();
                    }else{
                        document.getElementById('example').classList.add('hidden')
                        document.querySelector('.title-reports').classList.remove('hidden')
                    }


                } else if (res.code === "5000") {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                } else {
                    modal.openModal('modalDanger', TITLE_SECTION, res.message)
                }
            }

            await fetchOperations()
            
        }
    })
}