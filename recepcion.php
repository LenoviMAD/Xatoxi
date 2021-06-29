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
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de Recepción',
    'id' => 'formRecepcion',
    'name' => 'formRecepcion',
    'dataString' => 'trad_forma_de_recepcion'
], $data_json);

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
xpresentationLayer::buildSelectJson([
    'title' => 'Sucursales',
    'id' => 'branchOffices',
    'name' => 'branchOffices',
    'classContainer' => 'grid-item-2',
    'dataString' => 'trad_sucursales'
], $data_json);
xpresentationLayer::endDiv();


// Pago movil
xpresentationLayer::startDivHidden("bancoPagoMovilSection", "grid-item-2");

$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson([
    'title' => 'Banco pago móvil',
    'id' => 'bancoPagoMovil',
    'name' => 'bancoPagoMovil',
    'classContainer' => 'grid-item-2',
    'dataString' => 'trad_banco_pago_movil'
], $data_json);

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildPhoneComplete([
    'titleLabel' => 'Teléfono Pago Móvil',
    'nameCountry' => 'countrycode',
    'nameArea' => 'codeArea',
    'namePhone' => 'phone',
    'idCountry' => 'countrycode',
    'idArea' => 'codeArea',
    'idPhone' => 'phone',
    'disabled' => 'disabled',
    'classContainer' => 'grid-item-2 mt20 center-height',
    'classChildren' => 'full-width'
], "", $data_jsonCodePhone);

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

// DOCUMENTOS DE Reception
xpresentationLayer::startDivHidden("docsReception", "mt15 grid-1 grid-item-2");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocReception',
    'name' => 'typeDocReception',
], $data_json);
xpresentationLayer::buildInputFileDoc("fileInputReception", "hidden", "file");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("recepcion", "mt20");
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalFirma.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endHtml();
