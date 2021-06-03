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
<!-- <table id="example" class="customTableYg">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Referencia</th>
            <th>Desc</th>
            <th>Monto</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="customTableYg__type">
                01/06/2021 - 01:24
            </td>
            <td class="customTableYg__time">0102585478</td>
            <td class="customTableYg__time">Comision de pago</td>
            <td class="customTableYg__time">1.000.000,00</td>
        </tr>
        <tr>
            <td class="customTableYg__type">
            01/06/2021 - 01:24
            </td>
            <td class="customTableYg__time">010257854</td>
            <td class="customTableYg__time">Transferencia</td>
            <td class="customTableYg__time">800.000,00</td>
        </tr>
    </tbody>
</table> -->

<table id="example" class="table-reports">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Operación</th>
            <th>Desc</th>
            <th>Monto</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <span class="table-reports__fecha">01/06/2021</span> <br> <span class="table-reports__hora">01:24</span>
            </td>
            <td>Transferecion a terceros</td>
            <td>Comision de pago</td>
            <td>1.000.000,00</td>
            <td style="color: var(--primary);">Aprobado</td>
        </tr>
        <tr>
            <td>
                <span class="table-reports__fecha">01/06/2021</span> <br> <span class="table-reports__hora">01:24</span>
            </td>
            <td>Operacion a bancos internacionales</td>
            <td>Operacion cambiario</td>
            <td>800.000,00</td>
            <td style="color: var(--gray-600);">Pendiente</td>
        </tr>
        <tr>
            <td>
                <span class="table-reports__fecha">01/06/2021</span> <br> <span class="table-reports__hora">01:24</span>
            </td>
            <td>Transferecion a terceros</td>
            <td>Comision de pago</td>
            <td>1.000.000,00</td>
            <td style="color: var(--primary);">Aprobado</td>
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
