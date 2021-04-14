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
xpresentationLayer::buildOptionGrid("Compra Divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("compraForm");

xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0.00");

$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson("Divisa", "currency", "currency", $data_json, "", "");

$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson("Abonar en", "payIn", "payIn", $data_json, "", "");

$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(3,5));
xpresentationLayer::buildSelectJson("Forma de Pago", "payForm", "payForm", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "", "exchangeRate", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto a Pagar Bs.", "", "amountBs", "0.00", "", "", "", true);
xpresentationLayer::buildSelectJson("Cuentas Bancarias Receptoras", "accountBanks", "accountBanks", "", "", "", "grid-item-2", "select-large");
xpresentationLayer::endSection();

xpresentationLayer::startDivHidden("sectionCard");
xpresentationLayer::buildTitleBar("DATOS DEL DÉBITO", "grid-item-2");
xpresentationLayer::buildInputTextGrid("Número de tarjeta", "numberCard", "numberCard", "", "", "grid-item-2", "", "", "input-text-large");
xpresentationLayer::endDiv();

//Transferencia y tarjeta de credito 
xpresentationLayer::startDivHidden("sectionPrepaid", "grid-item-2 grid-2");
xpresentationLayer::buildTitleBar("DATOS FORMA DE PAGO", "grid-item-2 m0");
xpresentationLayer::buildInputTextGrid("Número de tarjeta", "numberCard", "numberCard");
xpresentationLayer::buildInputTextGrid("Tipo de tarjeta", "tipeCard", "tipeCard");
xpresentationLayer::buildInputsDate("monthTransfer", "monthTransfer", "yearTransfer", "yearTransfer");
xpresentationLayer::buildInputTextGrid("Cod. Validación", "ValidationCodeCardTransfer", "ValidationCodeCardTransfer");  
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionCommend", "grid-item-2 grid-2");
xpresentationLayer::buildTitleBar("DATOS FORMA DE PAGO", "grid-item-2 m0");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceCommendCuenta", "");
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin();
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endForm();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
