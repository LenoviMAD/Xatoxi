<?php
include_once("../xpresentationlayer.php");
?>

<div class="modal modal--Otp modal--fullViewport" id="pinVerification">
    <div class="modal-dialog">
        <section class="modal-content">
            <header class="modal-header">
                <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
                <h3 class="modal__title">Validar PIN</h3>
                <p class="modal__text">Este código expirará en: <span id="contador" class="font-green">00:114</span></p>
            </header>
            <aside class="modal-body text-center">
                <input type="password" class="input-pin" name="pinCode" maxlength="4" id="pinCode" class="input-pin">
            </aside>
            <footer class="modal-footer">
            
                <BUTTON class="btn btn-semi-rounded" data-id="btnPin">Aceptar</BUTTON>
                <button class="btn btn-danger btn-semi-rounded" type="button" aria-label="close modal" data-close>Cancelar</button>
            </footer>
        </section>
    </div>
</div>