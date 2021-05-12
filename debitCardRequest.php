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
xpresentationLayer::buildOptionGrid("Solicitud");
xpresentationLayer::endSection();
xpresentationLayer::startForm("requestDebitConsignmentForm", "", "grid-2");

xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "grid-item-2");
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson("", "typeDocWallet", "", $data_json, "", "");
?>
<div class="input-field1 hidden" id="fileInputWallet">
    <input type="file" name="file">
</div>
<?php

xpresentationLayer::buildSectionPin("","grid-item-2");
xpresentationLayer::endMain();

xpresentationLayer::buildFooterXatoxi();


xpresentationLayer::endForm();

xpresentationLayer::endSection();

include './modals/loader.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';
include './modals/modalFirma.php';

xpresentationLayer::endHtml();
