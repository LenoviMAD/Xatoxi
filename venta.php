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
xpresentationLayer::buildOptionGrid("Venta Divisa", "", "trad_venta_divisa");
xpresentationLayer::endSection();
xpresentationLayer::startForm("ventaForm", "", "grid-2");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amount',
    'placeholder' => '0.00',
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetcurrencyl();
xpresentationLayer::buildSelectJson([
    'title' => 'Divisa',
    'id' => 'currency',
    'name' => 'currency',
    'dataString' => 'trad_divisa'
], $data_json);
$data_json = $serviceCall->mgetdebitinstrumentl();
xpresentationLayer::buildSelectJson([
    'title' => 'Debitar de',
    'id' => 'payIn',
    'name' => 'payIn',
    'dataString' => 'trad_debitar_de'
], $data_json);
$data_json = $serviceCall->mgetcreditinstrumentl();
xpresentationLayer::buildSelectJson([
    'title' => 'Abonar en',
    'id' => 'payForm',
    'name' => 'payForm',
    'dataString' => 'trad_abonar_en'
], $data_json);
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
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo Tarjeta',
    'name' => 'cctype',
    'id' => 'cctype',
    'dataString' => 'trad_tipo_tarjeta'
], $data_json);
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
xpresentationLayer::buildSelectJson([
    'title' => 'Banco pago móvil',
    'id' => 'bancoPagoMovil',
    'name' => 'bancoPagoMovil',
    'classContainer' => 'grid-item-3',
    'dataString' => 'trad_banco_pago_movil'
], $data_json);
xpresentationLayer::buildInputTextGrid([
    'title' => 'countrycode',
    'name' => 'countrycode',
    'dataString' => '',
]);
$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson([
    'title' => 'Prefijo',
    'id' => 'codeArea',
    'name' => 'codeArea',
    'required' => false,
    'dataString' => 'trad_prefijo'
], $data_jsonCodePhone);
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

// DOCUMENTOS DE VENTAS
xpresentationLayer::startDivHidden("docsSell");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocSell',
    'name' => 'typeDocSell',
], $data_json);
xpresentationLayer::buildInputFileDoc("fileInputSell", "hidden", "file");
xpresentationLayer::endSection();
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
