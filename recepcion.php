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
xpresentationLayer::startForm("recepcionForm");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Clave Remesa", "remittances", "remittances", "");
$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma Recepción", "formRecepcion", "formRecepcion", $data_json, "", "");
xpresentationLayer::startDivHidden("despositAccount");
xpresentationLayer::buildInputTextGrid("Cuenta Bancaria", "bankAccount", "bankAccount", "", 20);
xpresentationLayer::endDiv();
xpresentationLayer::startDivHidden("MovilPay");
xpresentationLayer::buildInputTextGrid("Banco", "bankAccountMovil", "bankAccountMovil", "", 20);
xpresentationLayer::buildInputTextGrid("Routing", "routingMovil", "routingMovil", "", 20);
xpresentationLayer::buildInputTextGrid("Cuenta Bancaria", "accMovil", "accMovil", "", 20);
xpresentationLayer::endDiv();
xpresentationLayer::startDivHidden("SectionPrepaid");
xpresentationLayer::buildInputTextGrid("Tarjeta prepagada", "prepaidcard", "prepaidcard", "", 20);
xpresentationLayer::endDiv();
xpresentationLayer::startDivHidden("SectionDebitCardNumber");
xpresentationLayer::buildInputTextGrid("Tarjeta de Debito en Divisa ", "debitcardnumber", "debitcardnumber");
xpresentationLayer::endDiv();
xpresentationLayer::startDivHidden("cash");
$data_json = $serviceCall->mgetlocationl();
xpresentationLayer::buildSelectJson("Sucursales", "branchOffices", "branchOffices", $data_json, "", "", "grid-item-2", "");
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