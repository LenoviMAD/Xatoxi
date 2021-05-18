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
xpresentationLayer::buildOptionGrid("Venta Divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("ventaForm", "", "grid-2");

xpresentationLayer::buildInputNumberGrid("Monto", "", "amount", "0.00", "", "", "", "", true);
$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson("Divisa", "currency", "", $data_json, "", "", "", true);
$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson("Debitar de", "payIn", "", $data_json, "", "", "", true);
$data_json = $serviceCall->mgetcreditinstrumentl();
xpresentationLayer::buildSelectJson("Abonar en", "payForm", "", $data_json, "", "", "", true);
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "", "amountChange", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto a recibir Bs.", "", "amountRecieve", "0.00", "", "", "", true);


// DEBITAR DE -------------------------------
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-2", "test1");

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionVentaCreditCard", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL DEBITO", "grid-item-2");
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-2");
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "ccnumber");
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "cctype", "", $data_json, "", "");
xpresentationLayer::buildInputsDate("ccexpmonth", "ccexpmonth", "ccexpyear", "ccexpyear");
xpresentationLayer::buildInputNumberGrid("Cod. Validacion", "", "cccvc", "", "", "", 4);
xpresentationLayer::endDiv();


// TARJETA DE DEBITO
xpresentationLayer::startDivHidden("sectionVentaDebitCard", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL DEBITO");
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "debitcardnumber", "","","",35,"","",$_SESSION['debitcardnumber'] );
xpresentationLayer::endSection();

xpresentationLayer::endSection();

// Abonar en -------------------------------

xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-2", "test2");

// Pago movil
xpresentationLayer::startDivHidden("sectionVentaPagoMovil", "grid-item-3 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO", "grid-item-3");
$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "", $data_json, "", "",  "grid-item-3");
xpresentationLayer::buildInputTextGrid("countrycode", "", "countrycode", "", "", "", "", "");
$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson("Prefijo", "codeArea", "", $data_jsonCodePhone);
xpresentationLayer::buildInputNumberGrid("Móvil", "", "phone");
xpresentationLayer::endDiv();

// Transferencia
xpresentationLayer::startDivHidden("sectionVentaTrasferencia", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO");
xpresentationLayer::buildInputNumberGrid("Cuenta bancaria", "", "acc", "", "", "", "", "", "", $_SESSION['bacc']);
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin("","grid-item-2");
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endHtml();
