<?php
include_once("./xpresentationlayer.php");
?>

<div class="modal modal--danger" id="modalOlvioPin">
    <div class="modal-dialog">
        <section class="modal-content">
            <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
            <header class="modal-header">
                <h3 class="modal__title js-translate" data-string="trad_olvido_de_pin">Olvido de PIN</h3>
                <p class="modal__text js-translate pb15" data-string="trad_desea_generar_nuevo_pin">¿Desea generar nuevo PIN?</p>
                <?php
                // xpresentationLayer::startForm("formForgotPin");
                xpresentationLayer::buildInputTextGrid([
                    'title' => 'Confirme su email',
                    'name' => 'email',
                    'id' => 'olvidoPinemail',
                    'type' => 'email',
                    'placeholder' => 'email@email.com',
                    'maxlength' => 70,
                    'required' => true,
                    'dataString' => 'trad_reescriba_su_email'
                ]);
                // xpresentationLayer::endForm();
                ?>
            </header>
            <footer class="modal-footer">
                <div class="spc-ard pb10">
                    <a class="btn btn-primary js-translate" data-string="trad_cancelar" type="button" aria-label="close modal" data-close>Cancelar</a>
                    <a class="btn btn-primary js-translate" data-string="trad_aceptar" type="button" aria-label="close modal" id="btnOlvidoPinModal">Aceptar</a>
                </div>
            </footer>
        </section>
    </div>
</div>