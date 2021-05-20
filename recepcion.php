<?php
error_reporting(0);
session_start();
include_once("utilities.php");
//utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");
xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();

xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection();
xpresentationLayer::buildOptionGrid("Recepción Remesas", "", "trad_recepcion_remesa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("recepcionForm");
xpresentationLayer::startSectionTwoColumns("", "principal");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Clave Remesa',
    'name' => 'remittances',
    'dataString' => 'trad_clave_remesa'
]);

$data_json = $serviceCall->mgetclearencetypel(array(2, 3, 1, 4, 8, 7));
xpresentationLayer::buildSelectJson("Forma de Recepción", "formRecepcion", "formRecepcion", $data_json, "", "", "", false, "", "trad_forma_de_recepcion");

// Deposito en cuenta
xpresentationLayer::startDivHidden("banckAccountSection", "grid-item-2");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta Bancaria',
    'name' => 'bankAccount',
    'maxlength' => 20,
    'class' => 'grid-item-1',
    'dataString' => 'trad_cuenta_bancaria'
]);
xpresentationLayer::endDiv();

// Efectivo
xpresentationLayer::startDivHidden("branckOfficesSection", "grid-item-2");
$data_json = $serviceCall->mgetlocationl();
xpresentationLayer::buildSelectJson("Sucursales", "branchOffices", "", $data_json, "", "", "grid-item-2 ", false, "", "trad_sucursales");
xpresentationLayer::endDiv();


// Pago movil
xpresentationLayer::startDivHidden("bancoPagoMovilSection", "grid-item-2");

$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "bancoPagoMovil", $data_json, "", "",  "grid-item-2 ", false, "", "trad_banco_pago_movil");

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildPhoneComplete("Teléfono Pago Móvil", "countrycode",  "codeArea", "phone", "countrycode",  "codeArea", "phone", "", $data_jsonCodePhone, "", "disabled", "grid-item-2 mt20 center-height", "full-width");

xpresentationLayer::endDiv();

// Tarjeta de Prepaga en Divisa
xpresentationLayer::startDivHidden("prepaidCardSection", "grid-item-2");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número de Tarjeta',
    'name' => 'prepaidcard',
    'value' => $_SESSION['prepaidcardnumber'],
    'maxlength' => 20,
    'class' => 'grid-item-2',
    'dataString' => 'trad_numero_de_tarjeta'
]);
xpresentationLayer::endDiv();

// Tarjeta de Debito en Divisa
xpresentationLayer::startDivHidden("debitcardNumberSection", "grid-item-2");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número de Tarjeta',
    'name' => 'debitcardnumber',
    'value' => $_SESSION['debitcardnumber'],
    'maxlength' => 20,
    'class' => 'grid-item-2',
    'dataString' => 'trad_numero_de_tarjeta'
]);
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
