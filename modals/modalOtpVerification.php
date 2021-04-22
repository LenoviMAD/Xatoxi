<?php
include_once("../xpresentationlayer.php");
?>

<div class="modal modal--Otp modal--fullViewport" id="otpVerification">
    <div class="modal-dialog">
        <?php xpresentationLayer::buildHeaderPrincipalXatoxi(); ?>
        <section class="modal-content">
            <header class="modal-header">
                <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
                <h3 class="modal__title">OTP Verificación</h3>
                <p class="modal__text">Presione aceptar, este código expirará en: <span id="countdown"></span></p>
            </header>
            <aside class="modal-body">
                <input type="text" class="input-otp" disabled name="otpCode" id="otpCode" class="input-otp">
            </aside>
            <footer class="modal-footer">
                <button class="btn btn-semi-rounded" data-id="btnOtp" aria-label="close modal" data-close>Aceptar</button>
                <!-- <button class="modal__button btn btn-danger btn-semi-rounded" type="button" aria-label="close modal" data-close>Cancelar</button> -->
            </footer>
        </section>
        <FOOTER class="main-footer">
            <H4>¿Tienes dudas? <A target="_blank" title="contacta con Pepin" href="mailto:pepin@italcambio.com">Preguntale a Pepin</A></H4>
            <H4>by XATOXI</H4>
        </FOOTER>
    </div>
</div>
