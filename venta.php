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
xpresentationLayer::buildOptionGrid("Venta Divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("ventaForm");

xpresentationLayer::startSectionTwoColumns();

xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0.00");
$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson("Divisa", "currency", "currency", $data_json, "", "");
$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson("Debitar de", "payIn", "payIn", $data_json, "", "");
$data_json = $serviceCall->mgetcreditinstrumentl();
xpresentationLayer::buildSelectJson("Abonar en", "payForm", "payForm", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "amountChange", "amountChange", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto a recibir Bs.", "amountRecieve", "amountRecieve", "0.00", "", "", "", true);

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionVentaCreditCard", "grid-item-2 grid-1");
xpresentationLayer::buildTitleBar("DATOS DEL DEBITO", "grid-item-2");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "cardNumber");
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "typeCard", "", $data_json, "", "");
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputNumberGrid("Mes", "", "monthVen", "", "", "", 2);
xpresentationLayer::buildInputNumberGrid("Año", "", "yearVen", "", "", "", 4);
xpresentationLayer::endSection();
xpresentationLayer::buildInputNumberGrid("Cod. Validacion", "", "codVal", "", "", "",4);
xpresentationLayer::endDiv();

// TARJETA DE DEBITO
xpresentationLayer::startDivHidden("sectionVentaCreditCard", "grid-item-2 grid-1");
xpresentationLayer::buildTitleBar("DATOS DEL DEBITO", "grid-item-2");
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "debitcardnumber");
xpresentationLayer::endSection();

// Pago movil
xpresentationLayer::startDivHidden("sectionVentaPagoMovil", "grid-item-2 grid-1");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO", "grid-item-2");
$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "bancoPagoMovil", $data_json, "", "",  "grid-item-2");
xpresentationLayer::buildInputTextGrid("countrycode", "countrycode", "countrycode", "", "", "", "", "disabled");
$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson("Prefijo", "codeArea", "codeArea", $data_jsonCodePhone);
xpresentationLayer::buildInputNumberGrid("Móvil", "phone", "phone");
xpresentationLayer::endDiv();

// Pago movil
xpresentationLayer::startDivHidden("sectionVentaTrasferencia", "grid-item-2");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO", "grid-item-2");
xpresentationLayer::buildInputNumberGrid("Cuenta bancaria", "bankAccount", "bankAccount", "","","","","","",$_SESSION['bacc']);
xpresentationLayer::endDiv();


xpresentationLayer::endSection();
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