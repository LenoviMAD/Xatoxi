<?php
error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi44();

xpresentationLayer::startMain();

xpresentationLayer::startForm("registerForm");
xpresentationLayer::startAsideOneColumn();
xpresentationLayer::buildInputTextGrid([
    'title' => 'Email',
    'name' => 'email',
    'type' => 'email',
    'placeholder' => 'ejemplo@gmail.com',
    'maxlength' => 70,
    'required' => true,
    'dataString' => 'trad_email'
]);
?>
<p class="helper-text color-danger hidden" style="font-size:1em;">
    Los emails deben coincidir
</p>
<?php


$data_jsonCountry = $serviceCall->mgetallcountrydetaill();

xpresentationLayer::buildSelectJson([
    'title' => 'Pais',
    'id' => 'countryinternationalphonecode',
    'name' => 'country',
    'required' => true,
    'dataString' => 'trad_pais'
], $data_jsonCountry);

xpresentationLayer::startFirtsSection("grid-3", "");

xpresentationLayer::buildSelectJson([
    'title' => 'Prefijo',
    'id' => 'areaCode',
    'name' => 'areaCode',
    'required' => true,
    'dataString' => 'trad_prefijo'
], "");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Móvil',
    'name' => 'phone',
    'required' => true,
    'class' => 'grid-item-2',
    'maxlength' => 7,
    'dataString' => 'trad_movil'
]);

xpresentationLayer::endSection();

xpresentationLayer::buildButtonCenter("Aceptar", "", "btnRegister", "btn", "", "trad_aceptar");

xpresentationLayer::endAside();
xpresentationLayer::endForm();

xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';
include './modals/modalSuccess2.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
