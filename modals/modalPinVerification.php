<?php
include_once("../xpresentationlayer.php");
?>

<div class="modal modal--Otp modal--fullViewport" id="pinVerification">
    <div class="modal-dialog">
        <?php xpresentationLayer::buildHeaderPrincipalXatoxi(); ?>
        <section class="modal-content">
            <header class="modal-header">
                <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
                <h3 class="modal__title js-translate" data-string="trad_validar_pin">Validar PIN</h3>
                <p class="modal__text"><span class="js-translate" data-string="trad_este_codigo_expirara_en">Este código expirará en:</span> <span id="countdown"></span></p>
            </header>
            <aside class="modal-body text-center">
                <input type="password" class="input-pin" name="pinCode" maxlength="4" id="pinCode" class="input-pin">
            </aside>
            <footer class="modal-footer">
                <BUTTON class="btn btn-semi-rounded js-translate" data-string="trad_aceptar" data-id="btnPin">Aceptar</BUTTON>
                <button class="btn btn-danger btn-semi-rounded js-translate" data-string="trad_cancelar" type="button" aria-label="close modal" data-close>Cancelar</button>
            </footer>
        </section>
        <FOOTER class="main-footer">
            <H4 class="js-translate" data-string="trad_pepin">¿Tienes dudas? <A target="_blank" title="contacta con Pepin" href="mailto:pepin@italcambio.com">Preguntale a Pepin</A></H4>
            <H4>by XATOXI</H4>
        </FOOTER>
    </div>
</div>