<?php
error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();

xpresentationLayer::startMain();

xpresentationLayer::startForm("registerForm");
xpresentationLayer::startAsideOneColumn();
// xpresentationLayer::buildInputTextGrid("Usuario", "username", "username", "");
xpresentationLayer::buildInputTextGrid("Email", "email", "email", "Ejemplo@gmail.com");

$data_jsonAreaPhone = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson("Pais", "country", "country", $data_jsonAreaPhone, "", "");

// $data_jsonAreaPhone = $serviceCall->mgetlocationl();
// xpresentationLayer::buildSelectJson("Sucursal", "idlocation", "idlocation", $data_jsonAreaPhone, "", "");

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");

xpresentationLayer::startFirtsSection("grid-3", "");

xpresentationLayer::buildSelectJson("Prefijo", "codeArea", "codeArea", $data_jsonCodePhone, "", "");
xpresentationLayer::buildInputTextGrid("Móvil", "phone", "phone", "", "", "grid-item-2");

xpresentationLayer::endSection();

// xpresentationLayer::buildPhoneComplete("Movil", "codeCountry", "codeArea",  "phone", "codeCountry", "codeArea",  "phone", $data_jsonAreaPhone, $data_jsonCodePhone, "selectValorforId('codeCountry/codeArea', 'ajax.php?cond=mgetcellphoneareacodel')");

xpresentationLayer::buildButtonCenter("Aceptar");

xpresentationLayer::endAside();
xpresentationLayer::endForm();

xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/modalPinVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
