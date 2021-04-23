<?php

include_once("xpresentationlayer.php");
session_destroy();

xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");

xpresentationLayer::buildHeaderPrincipalXatoxitest();

xpresentationLayer::startMain("p0");

xpresentationLayer::startInputModal("modalContainer","tvesModal");
xpresentationLayer::buildPinPrincipalModal("PIN", 4, 4);
xpresentationLayer::endInputModal();

xpresentationLayer::startSectionTwoColumns("grid-2 full-height");
xpresentationLayer::buildMenuOptionGrid("envio.png", "ENVIO", true, "envio.php");
xpresentationLayer::buildMenuOptionGrid("recepcion.png", "RECEPCION", true, "recepcion.php");
xpresentationLayer::buildMenuOptionGrid("venta.png", "VENTA", true, "venta.php");
xpresentationLayer::buildMenuOptionGrid("compra.png", "COMPRA", true, "compra.php");
xpresentationLayer::buildMenuOptionGrid("cambio.png", "CAMBIO", true, "cambio.php");
xpresentationLayer::buildMenuOptionGrid("images.png", "PERFIL", true, "perfil.php");
//xpresentationLayer::buildMenuOptionComplete("images.png","PERFIL", true);  
xpresentationLayer::endSection();

xpresentationLayer::endMain();

include './modals/modalSuccess2.php';
include './modals/modalWrong.php';
include './modals/modalOlvidoPin.php';
include './modals/loader.php';
include './modals/modalCambioPin.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endHtml();
