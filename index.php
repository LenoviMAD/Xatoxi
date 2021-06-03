<?php

include_once("xpresentationlayer.php");
session_destroy();

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");

xpresentationLayer::buildHeaderPrincipalXatoxitest();

xpresentationLayer::startMain("");

xpresentationLayer::startSectionTwoColumns("grid-index full-height");

xpresentationLayer::buildMenuOptionGrid("envio.png", "ENVIO", false, "envio.php", "", "trad_envio");
xpresentationLayer::buildMenuOptionGrid("recepcion.png", "RECEPCION", false, "recepcion.php", "", "trad_recepcion");
xpresentationLayer::buildMenuOptionGrid("venta.png", "VENTA", false, "venta.php", "", "trad_venta");
xpresentationLayer::buildMenuOptionGrid("compra.png", "COMPRA", false, "compra.php", "", "trad_compra");
xpresentationLayer::buildMenuOptionGrid("cambio.png", "CAMBIO", false, "cambio.php", "", "trad_cambio");
xpresentationLayer::buildMenuOptionGrid("box.png", "REPORTES DE OPERACIÓN", false, "operationReports.php", "", "trad_reportes_de_operaciones");
xpresentationLayer::buildMenuOptionGrid("debito_icon.png", "SOLICITUD TARJETA DÉBITO <br> (PARA RECIBIR REMESAS)", false, "debitCardRequest.php", "", "trad_solicitud_tarjeta_debito");
xpresentationLayer::buildMenuOptionGrid("pepinvs1_black.png", "Mr Pepin", false, "#", "");
?>

<article type="button" class="btn btn-primary btn-custom openModal" data-url="perfil.php">
    <img src="img/jimmy.png" alt="" style="width: 50px;">
</article>
<?php
xpresentationLayer::endSection();

xpresentationLayer::endMain();

// Modals
// xpresentationLayer::startInputModal("modalContainer", "tvesModal");
// xpresentationLayer::buildPinPrincipalModal("PIN", 4, 4);
// xpresentationLayer::endInputModal();

include './modals/modalLogin.php';
include './modals/modalSuccess2.php';
include './modals/modalWrong.php';
include './modals/modalOlvidoPin.php';
include './modals/modalCambioPin.php';
include './modals/modalInactividad.php';
include './modals/loader.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endHtml();
