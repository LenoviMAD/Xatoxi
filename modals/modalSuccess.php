<?php include_once("xpresentationlayer.php"); ?>

<div class="modal modal--success modal--fullViewport" id="modalSuccess">
    <div class="modal-dialog">
        <?php xpresentationLayer::buildHeaderPrincipalXatoxi();?>
        <section class="modal-content">
            <aside class="modal-body">
                <figure>
                    <img src="./img/success.png" alt="transaccion satisfactoria">
                </figure>
            </aside>
            <header class="modal-header">
                <h3 class="modal__title">Transacción Satisfactoria</h3>
                <p class="modal__text"></p>
                <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
            </header>
            <footer class="modal-footer">
                <button class="btn btn-semi-rounded close-modal hidden" type="button" aria-label="close modal" data-close>Regreso</button>
                <a href="index.php" class="btn btn-semi-rounded" type="button">Regreso inicio</a>
            </footer>
        </section>
        <FOOTER class="main-footer">
		    <H4>¿Tienes dudas? <A target="_blank" title="contacta con Pepin" href="mailto:pepin@italcambio.com">Preguntale a Pepin</A></H4>
		    <H4>by XATOXI</H4>
		</FOOTER>
    </div>
</div>