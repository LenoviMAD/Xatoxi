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
xpresentationLayer::buildOptionGrid("Venta Divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("ventaForm", "", "grid-2");

xpresentationLayer::buildInputNumberGrid("Monto", "", "amount", "0.00");
xpresentationLayer::buildSelectJson("Divisa", "currency", "", $data_json, "", "");
xpresentationLayer::buildSelectJson("Debitar de", "payIn", "", $data_json, "", "");
xpresentationLayer::buildSelectJson("Abonar en", "payForm", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "", "amountChange", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto a recibir Bs.", "", "amountRecieve", "0.00", "", "", "", true);



xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin("","grid-item-2");
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
