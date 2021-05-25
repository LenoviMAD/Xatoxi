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
    'maxlength' => 50,
    'required' => true,
    'dataString' => 'trad_email'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Confirmar su Email',
    'name' => 'confirmEmail',
    'type' => 'email',
    'placeholder' => 'ejemplo@gmail.com',
    'maxlength' => 50,
    'required' => true,
    'dataString' => 'trad_reescriba_su_email'
]);
?>
<p class="helper-text color-danger hidden" style="font-size:1em;">
    Los emails deben coincidir
</p>
<?php


$data_jsonAreaPhone = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson([
    'title' => 'Pais',
    'id' => 'country',
    'name' => 'country',
    'required' => true,
    'dataString' => 'trad_pais'
], $data_jsonAreaPhone);

xpresentationLayer::startFirtsSection("grid-3", "");

$data_jsonCodePhone = $serviceCall->mgetcellphoneareacodel("58");
xpresentationLayer::buildSelectJson([
    'title' => 'Prefijo',
    'id' => 'codeArea',
    'name' => 'codeArea',
    'required' => true,
    'dataString' => 'trad_prefijo'
], $data_jsonCodePhone);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Móvil',
    'name' => 'phone',
    'required' => true,
    'class' => 'grid-item-2',
    'dataString' => 'trad_movil'
]);

xpresentationLayer::endSection();

// xpresentationLayer::buildPhoneComplete("Movil", "codeCountry", "codeArea",  "phone", "codeCountry", "codeArea",  "phone", $data_jsonAreaPhone, $data_jsonCodePhone, "selectValorforId('codeCountry/codeArea', 'ajax.php?cond=mgetcellphoneareacodel')");

xpresentationLayer::buildButtonCenter("Aceptar", "", "btnRegister", "btn", "", "trad_aceptar");

xpresentationLayer::endAside();
xpresentationLayer::endForm();

xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/modalPinVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
