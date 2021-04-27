<?php
error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi44();

xpresentationLayer::startMain();

xpresentationLayer::startForm("registerForm");
xpresentationLayer::startAsideOneColumn();
// xpresentationLayer::buildInputTextGrid("Usuario", "username", "username", "");
xpresentationLayer::buildInputTextGrid("Email", "email", "email", "Ejemplo@gmail.com", "","","","","","",true, "","email");

$data_jsonAreaPhone = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson("Pais", "country", "", $data_jsonAreaPhone, "", "","",true);

xpresentationLayer::startFirtsSection("grid-3", "");

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson("Prefijo", "codeArea", "codeArea", $data_jsonCodePhone, "", "", "",true);
xpresentationLayer::buildInputTextGrid("Móvil", "phone", "phone", "", "", "grid-item-2", "","","","",true);

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
include './modals/modalInactividad.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
