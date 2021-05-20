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
xpresentationLayer::buildOptionGrid("Compra Divisa", "", "trad_compra_divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("compraForm");

xpresentationLayer::startSectionTwoColumns("", "principalform");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amount',
    'placeholder' => '0.00',
    'required' => true,
    'dataString' => 'trad_monto'
]);

$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson("Divisa", "currency", "currency", $data_json, "", "", "", true, "", "trad_divisa");

$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson("Abonar en", "payIn", "payIn", $data_json, "", "", "", true, "", "trad_abonar_en");

$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(3, 5));
xpresentationLayer::buildSelectJson("Forma de Pago", "payForm", "payForm", $data_json, "", "", "", true, "", "trad_forma_de_pago");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Tasa de Cambio',
    'name' => 'exchangeRate',
    'placeholder' => '0.00',
    'disabled' => true,
    'dataString' => 'trad_tasa_de_cambio'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto a Pagar Bs.',
    'name' => 'amountBs',
    'placeholder' => '0.00',
    'disabled' => true,
    'dataString' => 'trad_monto_a_pagar_bs'
]);


xpresentationLayer::startDivHidden("sectionCard", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO", "", "trad_datos_del_abono");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número de tarjeta',
    'name' => 'numberCardDebit',
    'id' => 'numberCardDebit',
    'value' =>  $_SESSION['debitcardnumber'],
    'maxlength' => 20,
    'dataString' => 'trad_numero_de_tarjeta'
]);
xpresentationLayer::endDiv();

//Transferencia y tarjeta de credito 
xpresentationLayer::startDivHidden("sectionPrepaid", "grid-item-2 grid-2 mt20 mb20");
xpresentationLayer::buildTitleBar("DATOS FORMA DE PAGO", "grid-item-2 m0", "trad_datos_forma_de_pago");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Número de tarjeta',
    'name' => 'numberCardCredit',
    'id' => 'numberCardCredit',
    'maxlength' => 20,
    'dataString' => 'trad_numero_de_tarjeta'
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo de tarjeta", "typeCard", "typeCard", $data_json, "", "", "", false, "", "trad_tipo_tarjeta");
xpresentationLayer::buildInputsDate("monthTransfer", "monthTransfer", "yearTransfer", "yearTransfer");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Cod. Validación',
    'name' => 'ValidationCodeCardTransfer',
    'id' => 'ValidationCodeCardTransfer',
    'maxlength' => 3,
    'dataString' => 'trad_cod_validacion'
]);
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionCommend", "grid-item-2 grid-2 mt20 mb20");
xpresentationLayer::buildTitleBar("DATOS FORMA DE PAGO", "grid-item-2 m0", "trad_datos_forma_de_pago");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "", "", false, "", "trad_cta_receptora");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Referencia',
    'name' => 'referenceCuenta',
    'id' => 'referenceCuenta',
    'dataString' => 'trad_referencia'
]);
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
