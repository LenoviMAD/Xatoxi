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
xpresentationLayer::buildOptionGrid("Cambio");
xpresentationLayer::endSection();
xpresentationLayer::startForm("cambioForm", "", "grid-2");

xpresentationLayer::buildInputNumberGrid("Monto", "amount", "amount", "0,00", "", "grid-item-2");
$data_json = $serviceCall->mgetinstrumentsrcl();
xpresentationLayer::buildSelectJson("Entrego", "paidMethod", "paidMethod", $data_json, "", "selectValorforId('paidMethod/sendCurrency', 'ajax.php?cond=mgetcurrencysrcl')");
xpresentationLayer::buildSelectJson("Entrego Divisa", "sendCurrency", "sendCurrency", "", "", "selectValorforId('paidMethod/sendCurrency/recieveMethod', 'ajax.php?cond=mgetinstrumentdstl')");
xpresentationLayer::buildSelectJson("Recibe", "recieveMethod", "recieveMethod", "", "", "selectValorforId('paidMethod/sendCurrency/recieveMethod/recieveCurrency', 'ajax.php?cond=mgetcurrencydstl')");
xpresentationLayer::buildSelectJson("Recibe Divisa", "recieveCurrency", "recieveCurrency", "");

// Campos ocultos
xpresentationLayer::buildInputTextGrid("Banco / Proveedor", "", "bank", "", 20, "hidden", "", "", "", "bankProviderInput", "", "Italbank");
xpresentationLayer::buildInputNumberGrid("Numero / Referencia", "", "reference", "", 15, "hidden", "20", "numRefInput");
xpresentationLayer::buildInputNumberGrid("Routing", "", "routing", "", 20, "hidden grid-item-2", "20", "routingInput");

xpresentationLayer::buildSectionPin("","grid-item-2", true);
xpresentationLayer::endMain();

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endForm();

xpresentationLayer::endSection();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';

xpresentationLayer::endHtml();
