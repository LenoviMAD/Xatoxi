<?php
error_reporting(0);
session_start();
include_once("utilities.php");
//utilities::trueUser();

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
xpresentationLayer::startForm("recepcionForm", "", "grid-2");

xpresentationLayer::buildInputTextGrid("Clave Remesa", "remittances", "remittances", "", "", "", "", "", "", "", false);

$data_json = $serviceCall->mgetclearencetypel(array(2, 3, 1, 4, 8, 7));
xpresentationLayer::buildSelectJson("Forma Recepción", "formRecepcion", "formRecepcion", $data_json, "", "", "", false);

// Deposito en cuenta
xpresentationLayer::buildInputNumberGrid("Cuenta Bancaria", "bankAccount", "bankAccount", "", 20, "hidden grid-item-2", "", "banckAccountSection", false);

// Efectivo
$data_json = $serviceCall->mgetlocationl();
xpresentationLayer::buildSelectJson("Sucursales", "branchOffices", "", $data_json, "", "", "grid-item-2 hidden", false, "branckOfficesSection");

// Pago movil
$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "bancoPagoMovil", $data_json, "", "",  "grid-item-2 hidden", false, "bancoPagoMovilSection");

xpresentationLayer::startDivHidden("codeAreaSection", "grid-2");

xpresentationLayer::buildInputTextGrid("countrycode", "countrycode", "countrycode", "", "", "", "", "disabled", "", "", false);

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson("Prefijo", "codeArea", "codeArea", $data_jsonCodePhone, "", "", "", "", false);
xpresentationLayer::endDiv();

xpresentationLayer::buildInputNumberGrid("Móvil", "phone", "phone", "", "", " hidden", "", "phoneSection", false);

// Tarjeta de Prepaga en Divisa
xpresentationLayer::buildInputNumberGrid("Número de Tarjeta", "prepaidcard", "prepaidcard", "", 20, "grid-item-2 hidden", "", "prepaidCardSection", false);

// Tarjeta de Debito en Divisa
xpresentationLayer::buildInputNumberGrid("Número de Tarjeta ", "debitcardnumber", "debitcardnumber", "", "", "grid-item-2 hidden", "", "debitcardNumberSection", false);

xpresentationLayer::buildSectionPin();
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
