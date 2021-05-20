<?php
error_reporting(0);
session_start();
include_once("utilities.php");
//utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();
xpresentationLayer::startMain();

?>
<table id="example" class="customTableYg">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Dirigido</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="customTableYg__type">
                1254866
            </td>
            <td class="customTableYg__time">2000.00 $</td>
            <td class="customTableYg__time">20/10/2021 01:34 pm</td>
            <td class="customTableYg__time">User</td>
        </tr>
        <tr>
            <td class="customTableYg__type">
                1254866
            </td>
            <td class="customTableYg__time">2000.00 $</td>
            <td class="customTableYg__time">20/10/2021 01:34 pm</td>
            <td class="customTableYg__time">User</td>
        </tr>
        <tr>
            <td class="customTableYg__type">
                1254866
            </td>
            <td class="customTableYg__time">2000.00 $</td>
            <td class="customTableYg__time">20/10/2021 01:34 pm</td>
            <td class="customTableYg__time">User</td>
        </tr>
    </tbody>
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
