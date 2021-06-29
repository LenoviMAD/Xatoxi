<?php
error_reporting(0);
session_start();
include_once("utilities.php");
// utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();
xpresentationLayer::startMain();

?>
<h2 class="js-translate hidden title-reports text-center" data-string="trad_no_reports">No tiene reportes</h2>
<table id="example" class="table-reports">
    <thead>
        <tr style="
    display: none;
        ">
            <th>Fecha</th>
            <th>Operación</th>
            <th>Monto</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody style="display: block;"></tbody>
</table>
<?php
xpresentationLayer::endMain();

xpresentationLayer::buildFooterXatoxi();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';
?>

<?php


xpresentationLayer::endHtml();
