<?php

error_reporting(0);
session_start();
include_once("utilities.php");
//utilities::trueUser();
include_once("xpresentationlayer.php");
include_once("xclient.php");

$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();
xpresentationLayer::startMain();

xpresentationLayer::startSectionOpt("grid-1 full-height", "item-container");
xpresentationLayer::buildOptionsPrincipal("Billetera", "Billetera");
xpresentationLayer::buildOptionsPrincipal("Encomienda", "Encomienda");
xpresentationLayer::buildOptionsPrincipal("Transferencia", "Transferencia");
xpresentationLayer::endSection();

xpresentationLayer::startAnimationMenu();
xpresentationLayer::startSectionButtos();
xpresentationLayer::buildOptionGrid("Billetera", "Billetera");
xpresentationLayer::buildOptionGrid("Encomienda", "Encomienda");
xpresentationLayer::buildOptionGrid("Transferencia", "Transferencia");
xpresentationLayer::endSection();
xpresentationLayer::startContentSection();

// Billetera
xpresentationLayer::startContentofOption("Billetera");
xpresentationLayer::startForm("billeteraForm");
xpresentationLayer::startSectionTwoColumns("", "billeteraFormTest");
xpresentationLayer::buildInputNumberGrid("Monto", "", "amountWallet", "0.00");

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyWallet", "", $data_json, "", "");
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6,2,3,5));
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormWallet", "", $data_json, "", "", "grid-item-2");

//ACH
xpresentationLayer::startDivHidden("sectionWalletAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "", "bankAccountACHWallet", "", 20);
xpresentationLayer::buildInputNumberGrid("Cuenta", "", "accACHWallet", "", 20);
xpresentationLayer::buildInputNumberGrid("Routing", "", "routingACHWallet", "", 15);
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionAccountDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceWalletCuenta", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "cardNumberWallet", "");
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "typeCardWallet", "", $data_json, "", "");
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputNumberGrid("Ano", "", "yearVenWallet", "", "", "", 4);
xpresentationLayer::buildInputNumberGrid("Mes", "", "monthVenWallet", "", "", "", 2);
xpresentationLayer::endSection();
xpresentationLayer::buildInputNumberGrid("Cod. Validacion", "", "codValWallet", "", "", "", 4);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

// BENEFICIARIO
xpresentationLayer::startDivHidden("beneficiarioWallet");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
$data_json = $serviceCall->mgetpartyxl();
xpresentationLayer::buildSearchUsersWallet("", "users", $data_json, "", "", "", "");
xpresentationLayer::endDiv();

// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("docsWallet");
xpresentationLayer::buildTitleBar("DOCUEMTNOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson("", "typeDocWallet", "", $data_json, "", "");
xpresentationLayer::buildInputFileDoc("fileInputWallet", "hidden", "file");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("billetera");

xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Billetera

//Comienzo seccion Encomienda
xpresentationLayer::startContentofOption("Encomienda");
xpresentationLayer::startForm("encomiendaForm");
xpresentationLayer::startSectionTwoColumns("", "encomiendaFormTest");
xpresentationLayer::buildInputNumberGrid("Monto", "", "amountCommend", "0.00", "");
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryCommend", "countryCommend", $data_json, "", "selectValorforId('countryCommend/providerCommend', 'ajax.php?cond=mgetproviderl')");
xpresentationLayer::buildSelectJson("Proveedor", "providerCommend", "providerCommend", "", "", "selectValorforId('providerCommend/sendFormCommend', 'ajax.php?cond=mgetremitancetypel')");
$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyCommend", "", $data_json, "", "");
xpresentationLayer::buildSelectJson("Entrega", "sendFormCommend", "sendFormCommend", "");
$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormCommend", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "", "exchangeRateCommend", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto Bs", "", "amountBsCommend", "0.00", "", "", "", true);

//ACH
xpresentationLayer::startDivHidden("sectionCommendAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "", "bankAccountACHCommend", "", 20);
xpresentationLayer::buildInputNumberGrid("Cuenta", "", "accACHCommend", "", 20);
xpresentationLayer::buildInputNumberGrid("Routing", "", "routingACHCommend", "", 15);
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionCommendDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceCommendCuenta", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// EFECTIVO
xpresentationLayer::startDivHidden("efectivoCommend", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceCommend", "0", "");
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCommendCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "cardNumberCommend", "");
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "typeCardCommend", "", $data_json, "", "");
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputNumberGrid("Ano", "", "yearVenCommend", "", "", "", 4);
xpresentationLayer::buildInputNumberGrid("Mes", "", "monthVenCommend", "", "", "", 2);
xpresentationLayer::endSection();
xpresentationLayer::buildInputNumberGrid("Cod. Validacion", "", "codValCommend", "", "", "", 4);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::startDivHidden("beneficiarioCommend");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend("usersCommend", "usersCommend", "btnAddCommend", "");
xpresentationLayer::startDivHidden("userCommend");
xpresentationLayer::buildInputTextGrid("Documento Identificación", "bdocumentid", "bdocumentid", "", "", "", "required");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameCommend", "firstNameCommend", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo nombre", "secondNameCommend", "secondNameCommend", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameCommend", "firstSurnameCommend", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameCommend", "secondSurnameCommend", "");
xpresentationLayer::buildInputTextGrid("Direccion", "addressCommend", "addressCommend", "", "", "grid-item-1 grid-item-2 ", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Email", "emailCommend", "emailCommend", "Ejemplo@mail.com");
xpresentationLayer::buildInputNumberGrid("Telefono", "phoneCommend", "phoneCommend", "", "");
xpresentationLayer::buildInputTextGrid("Banco", "bankCommend", "bankCommend", "", "");
xpresentationLayer::buildInputNumberGrid("Cuenta", "accountCommend", "accountCommend", "");
xpresentationLayer::endSection();
xpresentationLayer::buildButtonCenter("Aceptar", "", "addContact", "btn", "mt20");
xpresentationLayer::endDiv();
xpresentationLayer::endDiv();

// DOCUMENTOS DE COMMEND
xpresentationLayer::startDivHidden("docsCommend");
xpresentationLayer::buildTitleBar("DOCUEMTNOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson("", "typeDocCommend", "", $data_json, "", "");
xpresentationLayer::buildInputFileDoc("fileInputCommend", "hidden", "file");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("encomienda");

xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Fin seccion de Encomienda

//Comiendo seccion Transferencia
xpresentationLayer::startContentofOption("Transferencia");
xpresentationLayer::startForm("transferenciaForm");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Monto", "amountTransfer", "amountTransfer", "0.00", "");
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryTransfer", "countryTransfer", $data_json);
$data_json = $serviceCall->mgetcurrencytrl();
xpresentationLayer::buildSelectJson("Moneda", "currencyTransfer", "currencyTransfer", $data_json, "", "");
$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormTransfer", "paidFormTransfer", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "exchangedRateTransfer", "exchangedRateTransfer", "0.00", "", "", "", true);
xpresentationLayer::buildInputTextGrid("Monto Bs", "amountBsTransfer", "amountBsTransfer", "0.00", "", "", "", true);

//Deposito en cuenta
xpresentationLayer::startDivHidden("accountDeposit", "grid-item-2 grid-1");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receivingAccount", "receivingAccount", $data_json, "", " ");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransferDeposit", "referenceTransferDeposit", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();
//Efectivo
xpresentationLayer::startDivHidden("cash", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransferCash", "referenceTransferCash", "");
xpresentationLayer::endDiv();
//Pago movil y ACH
xpresentationLayer::startDivHidden("MovilPayTransfer", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "bankAccountMovilTransfer", "bankAccountMovilTransfer", "", 20);
xpresentationLayer::buildInputTextGrid("Cuenta", "accMovilTransfer", "accMovilTransfer", "", 20);
xpresentationLayer::buildInputTextGrid("Routing", "routingMovilTransfer", "routingMovilTransfer", "", 20);
xpresentationLayer::endDiv();
//Tarjeta prepagada
xpresentationLayer::startDivHidden("SectionPrepaidTransfer", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Número de tarjeta", "numberCard", "numberCard");
xpresentationLayer::buildInputTextGrid("Tipo de tarjeta", "tipeCard", "tipeCard");
?>
<div class="input-field1">
<label class="font-Bold ">Fecha Venc.</label>
<div class="container-input">
    <div class="col-md-6">
        <div class="input-container">
            <input class="input" type="text" placeholder=" " />
            <label class="placeholder">Mes</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="input-container">
            <input class="input" type="text" placeholder=" " />
            <label class="placeholder">Año</label>
        </div>
    </div>
</div>
</div>
<?php
// xpresentationLayer::buildInputTextGridCustom("año y mes", "debitcardnumberTransfer", "debitcardnumberTransfer", "", "", "", "", "", "input-field");
xpresentationLayer::buildInputTextGrid("Cod. Validación", "ValidationCodeCardTransfer", "ValidationCodeCardTransfer");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::startDivHidden("uploadTransfer", "grid-item-2 grid-1");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
// xpresentationLayer::buildInputFileDoc("Documento Identificación", "fileDocumentTransfer", "fileDocumentTransfer");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::startDivHidden("beneficiarioTransfer");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend("usersTransfer", "usersTransfer", "btnIconAdd", "");
xpresentationLayer::startDivHidden("userTransfer");
xpresentationLayer::buildInputTextGrid("Documento de Identidad", "bdocumentidTransfer", "bdocumentidTransfer", "", "", "marginSect", "required");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameTransfer", "firstNameTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo nombre", "secondNameTransfer", "secondNameTransfer", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameTransfer", "firstSurnameTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameTransfer", "secondSurnameTransfer", "");
xpresentationLayer::buildInputTextGrid("Dirección", "addressTransfer", "addressTransfer", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Email", "emailTransfer", "emailTransfer", "Ejemplo@mail.com");
xpresentationLayer::buildInputTextGrid("Teléfono", "phoneTransfer", "phoneTransfer", "", "", "");
xpresentationLayer::buildInputTextGrid("Banco", "bankTransfer", "bankTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Cuenta", "accountTransfer", "accountTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Pais Banco", "countryBankTransfer", "countryBankTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Ciudad Banco", "cityBankTransfer", "cityBankTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Dirección Banco", "bankAddressTransfer", "bankAddressTransfer", "", "", "grid-item-1 grid-item-2 marginSect", "required", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("ABA / SWIFT/ IBAN", "abaSwiftIban", "abaSwiftIban", "", "", "grid-item-1 grid-item-2 marginSect", "required", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Banco Intermediario", "bankTransferIntermediary", "bankTransferIntermediary", "", "", "", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Cuenta Intermediario", "accountTransferIntermediary", "accountTransferIntermediary", "", "", "", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Pais Intermediario", "countryBankTransferIntermediary", "countryBankTransferIntermediary", "", "", "", "");
xpresentationLayer::buildInputTextGrid("Ciudad Intermediario", "cityBankTransferIntermediary", "cityBankTransferIntermediary", "", "", "", "");
xpresentationLayer::buildInputTextGrid("Direccion Banco Intermediario", "bankAddressTransferIntermediary", "bankAddressTransferIntermediary", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("ABA / SWIFT/ IBAN Intermediario", "abaSwiftIbanIntermediary", "abaSwiftIbanIntermediary", "", "", "grid-item-1 grid-item-2 marginSect", "", "", "input-text-large");
xpresentationLayer::endSection();
xpresentationLayer::buildButtonCenter("Aceptar", "", "addContactTransfer");
xpresentationLayer::endDiv();
xpresentationLayer::endDiv();
xpresentationLayer::buildSectionPin("transferencia");
xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Fin seccion de Transferencia

xpresentationLayer::endDiv();
xpresentationLayer::endDiv();
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/operationSummary.php';
include './modals/modalOtpVerification.php';
include './modals/modalSuccess.php';
include './modals/modalEncomienda.php';
include './modals/modalTransferencia.php';
include './modals/modalWrong.php';
include './modals/modalFirma.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endSection();
xpresentationLayer::endHtml();
