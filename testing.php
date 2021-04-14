<?php

error_reporting(0);
session_start();
include_once("utilities.php");
//utilities::trueUser();
include_once("xpresentationlayerBase.php");
include_once("xpresentationlayer.php");
include_once("xclient.php");

$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationlayerBase::a("", "", "btn btn-white btn-animated", "envio");

$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormWallet", "", $data_json, "", "", "grid-item-2");
xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endHtml();
include './modals/modalFirma.php';

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalEncomienda.php';
include './modals/modalTransferencia.php';
include './modals/modalWrong.php';
include './modals/modalFirma.php';


?>
<div class="input-field">
    <input id="last_name" type="text">
    <label for="last_name" class="">Last Name</label>
</div>

<br>
<div class="input-field">
                <input id="email2" type="email" class="validate">
                <label for="email2" class="">Email</label>
                <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
              </div>