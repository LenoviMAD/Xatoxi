<?php

include_once("xpresentationlayer.php");
session_destroy();

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");

xpresentationLayer::buildHeaderPrincipalXatoxitest();

xpresentationLayer::startMain("");

xpresentationLayer::startSectionTwoColumns("grid-index full-height");

xpresentationLayer::buildMenuOptionGrid("envio.png", "ENVIO", true, "envio.php", "", "test");
xpresentationLayer::buildMenuOptionGrid("recepcion.png", "RECEPCION", true, "recepcion.php");
xpresentationLayer::buildMenuOptionGrid("venta.png", "VENTA", true, "venta.php");
xpresentationLayer::buildMenuOptionGrid("compra.png", "COMPRA", true, "compra.php");
xpresentationLayer::buildMenuOptionGrid("cambio.png", "CAMBIO", true, "cambio.php");
xpresentationLayer::buildMenuOptionGrid("box.png", "REPORTES DE OPERACIÓN", true, "operationReports.php");
xpresentationLayer::buildMenuOptionGrid("debito_icon.png", "SOLICITUD TARJETA DÉBITO <br> (PARA RECIBIR REMESAS)", true, "debitCardRequest.php", "");
xpresentationLayer::buildMenuOptionGrid("pepinvs1_black.png", "Mr Pepin", true, "#", "");
?>

<article type="button" class="btn btn-primary btn-custom openModal" data-url="perfil.php">
    <img src="img/jimmy.png" alt="" style="width: 50px;">
</article>
<?php
xpresentationLayer::endSection();

xpresentationLayer::endMain();

// Modals
xpresentationLayer::startInputModal("modalContainer", "tvesModal");
xpresentationLayer::buildPinPrincipalModal("PIN", 4, 4);
xpresentationLayer::endInputModal();

include './modals/modalSuccess2.php';
include './modals/modalWrong.php';
include './modals/modalOlvidoPin.php';
include './modals/loader.php';
include './modals/modalCambioPin.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endHtml();
