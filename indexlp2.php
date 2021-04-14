<?php

error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead2("Xatoxi");


xpresentationLayer::startMain("full-center bg-img");
?>
<header class="text-center">
        <figure>
                <img class="logo" src="img/logo.png">';
        </figure>
        <h1 class="title__download mt0">
                Kam<span>bio</span>
                <small>Todo muy ágil y facil desde tu teléfono</small>
        </h1>
</header>
<?php
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGridCustom("Email *", "email", "email", "", "", "input-field", "required", "", "", "(*) Campo obligatorio");
xpresentationLayer::buildInputTextGridCustom("Número de teléfono", "numberMovil", "numberMovil", "", "", "input-field");

?>
<div class="grid-item-2 text-center">
        <button class="btn btn-large btn-semirounded">Enviar</button>
</div>
<?php
xpresentationLayer::endSection();
xpresentationLayer::endMain();
include './modals/modalPinVerification.php';
include './modals/modalDownloadApp.php';

xpresentationLayer::endHtml();
?>