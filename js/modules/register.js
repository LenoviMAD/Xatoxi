import Modal from "./Modal.js";

// Cambio
export default function init() {
	document.addEventListener("DOMContentLoaded", () => {
		const modal = new Modal();
		modal.initModal();

		const registerForm = document.getElementById("registerForm");

		if (registerForm) {
			registerForm.addEventListener("submit", async (e) => {
				e.preventDefault();

				// Cargando loader
				modal.openModal("loader");

				// Generar pin
				let formData = new FormData();
				formData.append("cond", "genpin");
				let dataPin = await fetch("ajax.php", {
					method: "POST",
					body: formData,
				});
				let resPin = await dataPin.json();
				console.log(resPin);

				if (resPin.code === "0000") {
					// Guardar pin en una variable de sesion para sus porterior validacion
					let formData1 = new FormData();
					formData1.append("cond", "savePin");
					formData1.append("pin", resPin.pin);
					let dataSavePin = await fetch("ajax.php", {
						method: "POST",
						body: formData1,
					});
					await dataSavePin.text();

					// Enviar pin al correo
					let formData = new FormData(registerForm)
					formData.append("cond", "sendEmailPin");
					formData.append("pin", resPin.pin);

					let dataEmailPin = await fetch("ajax.php", { method: 'POST', body: formData });
					let resEmailPin = await dataEmailPin.json();

					// Quitando loader
					modal.closeModal("loader");

					if (resEmailPin.code === "0000") {
						// abriendo pin modal
						modal.openModal("pinVerification");

						// Eliminando el mensaje si lo tiene
						if (document.getElementById('messageModalCustom')) {
							document.getElementById('messageModalCustom').remove()
						}

						// Agregando mensaje para mostrar email
						let messageModal = document.createElement('p')
						messageModal.setAttribute('id', 'messageModalCustom')
						messageModal.innerHTML = `
						Te hemos enviado el código al email <br><b>${document.getElementById('email').value}</b>
						`
						// agregando al modal 
						document.querySelector('#pinVerification footer').prepend(messageModal)

						const btnPin = document.querySelector(
							'#pinVerification [data-id="btnPin"]'
						);
						let inputPin = document.querySelector("#pinVerification #pinCode");

						btnPin.addEventListener("click", async () => {
							// Cargando loader
							modal.openModal("loader");

							// Verificar pin
							let formData = new FormData();
							formData.append("cond", "pinVerification");
							formData.append("pin", inputPin.value);
							let dataVerification = await fetch("ajax.php", {
								method: "POST",
								body: formData,
							});
							let resVerification = await dataVerification.json();

							// Quitando loader
							modal.closeModal("loader");

							// Si es el pin correcto
							if (resVerification.code === "0000") {
								// Quitando loader
								modal.closeModal("pinVerification");
								// Cargando loader
								modal.openModal("loader");

								// Enviamos info para primer paso de registro
								let formData = new FormData(registerForm);
								let codeArea = document.querySelector(
									'#registerForm [name="codeArea"]'
								);
								formData.append("cond", "addlead");
								formData.append(
									"codeArea",
									codeArea.options[codeArea.selectedIndex].textContent
								);
								let dataSignup = await fetch("ajax.php", {
									method: "POST",
									body: formData,
								});
								let resSignup = await dataSignup.json();

								// Quitando loader
								modal.closeModal("loader");
								console.log(resSignup);

								if (resSignup.code === "0000") {
									modal.openModal("modalSuccess", 'Registrado', `${resSignup.message} ${resSignup.pin}`);
								} else if (resSignup.code === "5000") {
									modal.openModal(
										"modalDanger",
										"Datos incompletos",
										resSignup.message
									);
								} else {
									modal.openModal(
										"modalDanger",
										"Hubo un error",
										"Ocurrio un error, favor intente de nuevo"
									);
								}
							} else {
								modal.openModal(
									"modalDanger",
									"Registro",
									"PIN NO VALIDO"
								);
							}
						});
					} else if (resEmailPin.code === "5000") {
						modal.openModal(
							"modalDanger",
							"Datos incompletos",
							resEmailPin.message
						);
					} else {
						modal.openModal(
							"modalDanger",
							"Hubo un error",
							"Ocurrio un error, favor intente de nuevo"
						);
					}
				} else if (res.code === "5000") {
					modal.openModal("modalDanger", "Datos incompletos", res.message);
				} else {
					modal.openModal(
						"modalDanger",
						"Hubo un error",
						"Ocurrio un error, favor intente de nuevo"
					);
				}
			});
		}
	});
}
