<?php
error_reporting(0);
session_start();
include_once("utilities.php");
// utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();


xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection();

xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin("","grid-item-2");
xpresentationLayer::endMain();

include './modals/modalFirma.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalPinVerification.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endHtml();
