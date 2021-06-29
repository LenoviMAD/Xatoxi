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
xpresentationLayer::buildOptionGrid("Cambio", "", "trad_cambio");
xpresentationLayer::endSection();
xpresentationLayer::startForm("cambioForm", "", "grid-2");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amount',
    'placeholder' => '0.00',
    'class' => 'grid-item-2',
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetinstrumentsrcl();
xpresentationLayer::buildSelectJson([
    'title' => 'Entrego',
    'id' => 'paidMethod',
    'name' => 'paidMethod',
    'event' => 'selectValorforId(\'paidMethod/sendCurrency\', \'ajax.php?cond=mgetcurrencysrcl\')',
    'dataString' => 'trad_entrega'
],  $data_json);
xpresentationLayer::buildSelectJson([
    'title' => 'Entrego Divisa',
    'id' => 'sendCurrency',
    'name' => 'sendCurrency',
    'event' => 'selectValorforId(\'paidMethod/sendCurrency/recieveMethod\', \'ajax.php?cond=mgetinstrumentdstl\')',
    'dataString' => 'trad_entrega_divisa'
], "");
xpresentationLayer::buildSelectJson([
    'title' => 'Recibe',
    'id' => 'recieveMethod',
    'name' => 'recieveMethod',
    'event' => 'selectValorforId(\'paidMethod/sendCurrency/recieveMethod/recieveCurrency\', \'ajax.php?cond=mgetcurrencydstl\')',
    'dataString' => 'trad_recibe'
], "");
xpresentationLayer::buildSelectJson([
    'title' => 'Recibe Divisa',
    'id' => 'recieveCurrency',
    'name' => 'recieveCurrency',
    'dataString' => 'trad_recibe_divisa'
], "");

// Campos ocultos
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco / Proveedor',
    'name' => 'bank',
    'classContainer' => 'hidden',
    'value' => 'Italbank',
    'idContainer' => 'bankProviderInput',
    'maxlength' => 20,
    'dataString' => 'trad_banco_proveedor'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero / Referencia',
    'name' => 'reference',
    'maxlength' => 20,
    'class' => 'hidden',
    'idContainer' => 'numRefInput',
    'dataString' => 'trad_numero_referencia'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Routing',
    'name' => 'routing',
    'maxlength' => 20,
    'class' => 'hidden grid-item-2',
    'idContainer' => 'routingInput',
    'dataString' => 'trad_routing'
]);

// DOCUMENTOS DE Change
xpresentationLayer::startDivHidden("docsChange", "mt15 grid-1 grid-item-2");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocChange',
    'name' => 'typeDocChange',
], $data_json);
xpresentationLayer::buildInputFileDoc("fileInputChange", "hidden", "file");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("", "grid-item-2", true);
xpresentationLayer::endMain();

xpresentationLayer::buildFooterXatoxi();


xpresentationLayer::endForm();

xpresentationLayer::endSection();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';
include './modals/modalFirma.php';

xpresentationLayer::endHtml();
