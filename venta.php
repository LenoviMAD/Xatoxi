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
xpresentationLayer::buildOptionGrid("Venta Divisa", "", "trad_venta_divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("ventaForm", "", "grid-2");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amount',
    'placeholder' => '0.00',
    'required' => true,
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson("Divisa", "currency", "", $data_json, "", "", "", true, "", "trad_divisa");
$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson("Debitar de", "payIn", "", $data_json, "", "", "", true, "", "trad_debitar_de");
$data_json = $serviceCall->mgetcreditinstrumentl();
xpresentationLayer::buildSelectJson("Abonar en", "payForm", "", $data_json, "", "", "", true, "", "trad_abonar_en");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Tasa de Cambio',
    'name' => 'amountChange',
    'placeholder' => '0.00',
    'disabled' => true,
    'dataString' => 'trad_tasa_de_cambio',
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto a recibir Bs.',
    'name' => 'amountRecieve',
    'placeholder' => '0.00',
    'disabled' => true,
    'dataString' => 'trad_monto_a_recibir_bs',
]);


// DEBITAR DE -------------------------------
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-2", "test1");

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionVentaCreditCard", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL DEBITO", "grid-item-2", "trad_datos_del_debito");
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-2");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero Tarjeta',
    'name' => 'ccnumber',
    'dataString' => 'trad_numero_tarjeta'
]);

$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "cctype", "", $data_json, "", "", "", false, "", "trad_tipo_tarjeta");
xpresentationLayer::buildInputsDate("ccexpmonth", "ccexpmonth", "ccexpyear", "ccexpyear");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validacion',
    'name' => 'cccvc',
    'maxlength' => 4,
    'dataString' => 'trad_cod_validacion'
]);
xpresentationLayer::endDiv();


// TARJETA DE DEBITO
xpresentationLayer::startDivHidden("sectionVentaDebitCard", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL DEBITO", "", "trad_datos_del_debito");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero Tarjeta',
    'name' => 'debitcardnumber',
    'value' => $_SESSION['debitcardnumber'],
    'dataString' => 'trad_numero_tarjeta'
]);
xpresentationLayer::endSection();

xpresentationLayer::endSection();

// Abonar en -------------------------------

xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-2", "test2");

// Pago movil
xpresentationLayer::startDivHidden("sectionVentaPagoMovil", "grid-item-3 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO", "grid-item-3", "trad_datos_del_abono");
$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "", $data_json, "", "",  "grid-item-3", false, "", "trad_banco_pago_movil");
xpresentationLayer::buildInputTextGrid([
    'title' => 'countrycode',
    'name' => 'countrycode',
    'dataString' => '',
]);
$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson("Prefijo", "codeArea", "", $data_jsonCodePhone, "", "", "", false, "", "trad_prefijo");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Móvil',
    'name' => 'phone',
    'dataString' => 'trad_movil'
]);
xpresentationLayer::endDiv();

// Transferencia
xpresentationLayer::startDivHidden("sectionVentaTrasferencia", "grid-item-2 grid-1 mb15");
xpresentationLayer::buildTitleBar("DATOS DEL ABONO", "", "trad_datos_del_abono");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta bancaria',
    'name' => 'acc',
    'value' =>  $_SESSION['bacc'],
    'dataString' => 'trad_cuenta_bancaria'
]);
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin("", "grid-item-2");
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
