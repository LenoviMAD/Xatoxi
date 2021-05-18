<?php
error_reporting(0);
session_start();
include_once("utilities.php");
utilities::trueUser();
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();


xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection();
xpresentationLayer::buildOptionGrid("Compra Divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("compraForm");

xpresentationLayer::startSectionTwoColumns("", "principalform");
xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0.00", "", "", "", "", true);

$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson("Divisa", "currency", "currency", $data_json, "", "", "", true);

$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson("Abonar en", "payIn", "payIn", $data_json, "", "", "", true);

$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(3,5));
xpresentationLayer::buildSelectJson("Forma de Pago", "payForm", "payForm", $data_json, "", "", "", true);
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "", "exchangeRate", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto a Pagar Bs.", "", "amountBs", "0.00", "", "", "", true);


xpresentationLayer::startDivHidden("sectionCard", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO");
xpresentationLayer::buildInputTextGrid("Número de tarjeta", "numberCardDebit", "numberCardDebit", "", "18", "", "", "", "input-text-large", "","","",$_SESSION['debitcardnumber']);
xpresentationLayer::endDiv();

//Transferencia y tarjeta de credito 
xpresentationLayer::startDivHidden("sectionPrepaid", "grid-item-2 grid-2 mt20 mb20");
xpresentationLayer::buildTitleBar("DATOS FORMA DE PAGO", "grid-item-2 m0");
xpresentationLayer::buildInputTextGrid("Número de tarjeta", "numberCardCredit", "numberCardCredit");
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo de tarjeta", "typeCard", "typeCard", $data_json, "", "");
xpresentationLayer::buildInputsDate("monthTransfer", "monthTransfer", "yearTransfer", "yearTransfer");
xpresentationLayer::buildInputTextGrid("Cod. Validación", "ValidationCodeCardTransfer", "ValidationCodeCardTransfer", "", 3);  
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionCommend", "grid-item-2 grid-2 mt20 mb20");
xpresentationLayer::buildTitleBar("DATOS FORMA DE PAGO", "grid-item-2 m0");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceCuenta", "referenceCuenta", "");
xpresentationLayer::endDiv();
xpresentationLayer::endSection();
xpresentationLayer::buildSectionPin("compra");
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/modalCompra.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalFirma.php';
include './modals/modalInactividad.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endForm();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
