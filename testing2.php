<?php
error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");

xpresentationLayer::buildHeaderPrincipalXatoxi();

xpresentationLayer::startMain();

xpresentationLayer::startForm("");


xpresentationLayer::buildButtonCenter("Acceder", "", "", "btn", "grid-item-2");

xpresentationLayer::endAside();
xpresentationLayer::endForm();
xpresentationLayer::endMain();

include './modals/modalWrong.php';
include './modals/modalSuccess2.php';


xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
