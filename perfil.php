<?php
error_reporting(0);
session_start();
include_once("utilities.php");

utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");


include_once("xpresentationlayer.php");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();


xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection("grid-3 mb-20");
xpresentationLayer::buildOptionGrid("Perfil");
xpresentationLayer::endSection();
xpresentationLayer::startForm("profileForm");

xpresentationLayer::startSectionTwoColumns("grid-2 pb15");

$data_json = $serviceCall->mgetiddocumenttypel();
xpresentationLayer::buildSectionDocument("T. Doc.", "Documento", "Fec. Nacimiento", "typeDocument", "document", "birthdate", "typeDocument", "document", "birthdate", $data_json, "grid-item-2");

xpresentationLayer::buildInputTextGrid("P. Nombre", "firstName", "firstName", "", "", "", "", "", "", "", true);
xpresentationLayer::buildInputTextGrid("S. Nombre", "secondName", "secondName", "", "", "");
xpresentationLayer::buildInputTextGrid("P. Apellido", "firstSurname", "firstSurname", "", "", "","", "","", "", true);
xpresentationLayer::buildInputTextGrid("S. Apellido", "secondSurname", "secondSurname", "", "", "");

$data_json = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson("Pais", "country", "country", $data_json, "", "selectValorforId('country/state', 'ajax.php?cond=getcountrystatel')",  "grid-item-2", "");
xpresentationLayer::buildSelectJson("Estado", "state", "state", "", "", "selectValorforId('state/city', 'ajax.php?cond=getstatecityl')",  "", "");
xpresentationLayer::buildSelectJson("Ciudad", "city", "city", "", "", "",  "", "");

xpresentationLayer::buildTextArea("Direccion", "direction", "direction", "", "30", "grid-item-2", true);

$data_json = $serviceCall->mgetlocationvenl();
xpresentationLayer::buildSelectJson("Agencia de preferencia", "preferenceAgency", "preferenceAgency", $data_json, "", "", "grid-item-2", true);

xpresentationLayer::buildInputTextGrid("Cuenta bancaria", "bankAccount", "bankAccount", "", 20, "grid-item-2", "", "", "", "", true);

$data_json = $serviceCall->mgetbankl("238");
xpresentationLayer::buildSelectJson("Banco pago móvil", "bancoPagoMovil", "bancoPagoMovil", $data_json, "", "",  "", "");

xpresentationLayer::buildInputTextGrid("Número del móvil", "telMovil", "telMovil", "", 20, "", "", "", "");

// xpresentationLayer::buildInputNumberGrid("Tarjeta de crédito Prepagada", "", "prepaidcardnumber", "");
// xpresentationLayer::buildInputNumberGrid("Tarjeta de débito Prepagada", "", "debitcardnumber", "");

?>
<p class="grid-item-2 text-center mb0 mt0"><b>Alias:</b> <?php echo $_SESSION['alias']; ?></p>
<p class="grid-item-2 text-center mb0 mt0"><b>Movil:</b> <?php echo '+' . $_SESSION['countrycode'] . ' ' . $_SESSION['areacode'] . ' ' . $_SESSION['phonenumber']; ?></p>
<p class="grid-item-2 text-center mb0 mt0"><b>Email:</b> <?php echo $_SESSION['email']; ?></p>
<?php


xpresentationLayer::buildButtonCenter("Aceptar", "", "", "btn btn-primary", "grid-item-2");

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
