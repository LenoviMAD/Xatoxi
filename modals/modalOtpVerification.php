<?php
include_once("../xpresentationlayer.php");
?>

<div class="modal modal--Otp modal--fullViewport" id="otpVerification">
    <div class="modal-dialog">
        <section class="modal-content">
            <header class="modal-header">
                <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
                <h3 class="modal__title">OTP Verificación</h3>
                <p class="modal__text">Presione aceptar, este código expirará en: <span id="contador" class="font-green">00:114</span></p>
            </header>
            <aside class="modal-body">
                <input type="password" class="input-otp" disabled name="otpCode" id="otpCode" class="input-otp">
            </aside>
            <footer class="modal-footer">
                <button class="btn btn-semi-rounded" data-id="btnOtp">Aceptar</button>
                <button class="modal__button btn btn-danger btn-semi-rounded" type="button" aria-label="close modal" data-close>Cancelar</button>
            </footer>
        </section>
    </div>
</div>