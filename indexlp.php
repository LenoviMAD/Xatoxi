<?php

error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderPrincipalXatoxi();


xpresentationLayer::startMain("full-center");
?>
<header>
        <h1 class="title__download">
                <small>Siempre contara con el respaldo, solidez y seriedad de la organización Italcambio con 73 años sirviendo a Venezuela</small>
        </h1>
</header>
<?php
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGridCustom2("Email", "email", "email", "", "", "input-field1", "required", "", "", "(*) Campo obligatorio");
xpresentationLayer::buildInputTextGrid("Número de teléfono", "numberMovil", "numberMovil", "", "", "input-field1");

?>
<div class="grid-item-2 text-center">
        <button class="btn btn-large btn-semirounded">Enviar</button>
</div>
<div class="grid-item-2 text-center">
        <figure class="icon-phone">
        <img src="./img/testing.png" alt="funcionalidades ">
        </figure>
</div>
<?php
xpresentationLayer::endSection();
xpresentationLayer::endMain();

include './modals/modalPinVerification.php';
include './modals/modalDownloadApp.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endHtml();
?>