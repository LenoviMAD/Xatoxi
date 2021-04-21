<?php
error_reporting(0);
session_start();
include_once("utilities.php");
utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();

xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection();
xpresentationLayer::buildOptionGrid("Recepción Remesas");
xpresentationLayer::endSection();
xpresentationLayer::startForm("recepcionForm");
xpresentationLayer::startSectionTwoColumns("", "principal");
xpresentationLayer::buildInputTextGrid("Clave Remesa", "remittances", "remittances", "", "", "", "", "", "", "", false);

$data_json = $serviceCall->mgetclearencetypel(array(2, 3, 1, 4, 8, 7));
xpresentationLayer::buildSelectJson("Forma Recepción", "formRecepcion", "formRecepcion", $data_json, "", "", "", false);


// Deposito en cuenta
xpresentationLayer::startDivHidden("banckAccountSection", "grid-item-2");
xpresentationLayer::buildInputNumberGrid("Cuenta Bancaria", "bankAccount", "bankAccount", "", 20, " grid-item-1", "", "", false);
xpresentationLayer::endDiv();

// Efectivo
xpresentationLayer::startDivHidden("branckOfficesSection", "grid-item-2");
$data_json = $serviceCall->mgetlocationl();
xpresentationLayer::buildSelectJson("Sucursales", "branchOffices", "", $data_json, "", "", "grid-item-2 ", false, "");
xpresentationLayer::endDiv();


// Pago movil
xpresentationLayer::startDivHidden("bancoPagoMovilSection", "grid-item-2");

$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "bancoPagoMovil", $data_json, "", "",  "grid-item-2 ", false, "");

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildPhoneComplete("Teléfono Pago Móvil", "countrycode",  "codeArea", "phone", "countrycode",  "codeArea", "phone", "", $data_jsonCodePhone, "", "disabled", "grid-item-2 mt20 center-height", "full-width");

xpresentationLayer::endDiv();

// Tarjeta de Prepaga en Divisa
xpresentationLayer::startDivHidden("prepaidCardSection", "grid-item-2");
xpresentationLayer::buildInputNumberGrid("Número de Tarjeta", "prepaidcard", "prepaidcard", "", 20, "grid-item-2 ", "", "", false);
xpresentationLayer::endDiv();

// Tarjeta de Debito en Divisa
xpresentationLayer::startDivHidden("debitcardNumberSection", "grid-item-2");
xpresentationLayer::buildInputNumberGrid("Número de Tarjeta ", "debitcardnumber", "debitcardnumber", "", "", "grid-item-2 ", "", "", false);
xpresentationLayer::endDiv();
xpresentationLayer::endSection();
xpresentationLayer::buildSectionPin("recepcion", "mt20");
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endHtml();
