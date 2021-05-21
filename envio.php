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

xpresentationLayer::startSectionOpt("grid-1 full-height", "item-container");
xpresentationLayer::buildOptionsPrincipal("Encomienda", "Billetera");
xpresentationLayer::buildOptionsPrincipal("Remesa", "Encomienda");
xpresentationLayer::buildOptionsPrincipal("Transferencia", "Transferencia");
xpresentationLayer::endSection();

xpresentationLayer::startAnimationMenu();
xpresentationLayer::startSectionButtos();
xpresentationLayer::buildOptionGrid("Encomienda", "Billetera");
xpresentationLayer::buildOptionGrid("Remesa", "Encomienda");
xpresentationLayer::buildOptionGrid("Transferencia", "Transferencia");
xpresentationLayer::endSection();
xpresentationLayer::startContentSection();

// Billetera
xpresentationLayer::startContentofOption("Billetera");
xpresentationLayer::startForm("billeteraForm", "", "pb20");
xpresentationLayer::startSectionTwoColumns("", "billeteraFormTest");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amountWallet',
    'placeholder' => '0.00',
    'required' => true,
    'dataString' => 'trad_monto'
]);

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson([
    'title' => 'Moneda',
    'id' => 'currencyWallet',
    'name' => 'currencyWallet',
    'event' => '',
    'classContainer' => '',
    'idContainer' => '',
    'required' => true,
    'dataString' => ''
], $data_json);
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5));
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de pago',
    'id' => 'paidFormWallet',
    'name' => 'paidFormWallet',
    'classContainer' => 'grid-item-2',
    'required' => true,
], $data_json);

//ACH
xpresentationLayer::startDivHidden("sectionWalletAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "", "bankAccountACHWallet");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accACHWallet'
]);
xpresentationLayer::buildInputTextGrid("Routing", "", "routingACHWallet");
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionAccountDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson([
    'title' => 'Cta. Receptora',
    'id' => 'receiveAccount',
    'name' => 'receiveAccount',
], $data_json);
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceWalletCuenta", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero Tarjeta',
    'name' => 'cardNumberWallet',
    'maxlength' => 20
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo Tarjeta',
    'id' => 'typeCardWallet',
    'name' => 'typeCardWallet',
], $data_json);

xpresentationLayer::buildInputsMonthYear("Fecha Venc", "monthVenCommend", "yearVenCommend");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validacion',
    'name' => 'codValWallet',
    'placeholder' => '0.00',
    'maxlength' => 4
]);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

// BENEFICIARIO
xpresentationLayer::startDivHidden("beneficiarioWallet");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
$data_json = $serviceCall->mgetpartyxl();
xpresentationLayer::buildSearchUsersWallet([
            'id' => 'users',
            'name' => 'users',
], $data_json);
xpresentationLayer::endDiv();

// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("docsWallet");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocWallet',
    'name' => 'typeDocWallet',
], $data_json);
xpresentationLayer::buildInputFileDoc("fileInputWallet", "hidden", "file");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("billetera");

xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Billetera

//Comienzo seccion Encomienda
xpresentationLayer::startContentofOption("Encomienda");
xpresentationLayer::startForm("encomiendaForm", "", "pb20");
xpresentationLayer::startSectionTwoColumns("", "encomiendaFormTest");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amountCommend',
    'placeholder' => '0.00',
    'required' => true
]);
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson([
    'title' => 'País',
    'id' => 'countryCommend',
    'name' => 'countryCommend',
    'event' => 'selectValorforId(\'countryCommend/providerCommend\', \'ajax.php?cond=mgetproviderl\')',
    'classContainer' => '',
    'idContainer' => '',
    'required' => true,
    'dataString' => ''
],  $data_json);
xpresentationLayer::buildSelectJson([
    'title' => 'Proveedor',
    'id' => 'providerCommend',
    'name' => 'providerCommend',
    'event' => 'selectValorforId(\'providerCommend/sendFormCommend\', \'ajax.php?cond=mgetremitancetypel\')',
    'classContainer' => '',
    'idContainer' => '',
    'required' => true,
    'dataString' => ''
], "");
$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson([
    'title' => 'Moneda',
    'id' => 'currencyCommend',
    'name' => 'currencyCommend',
    'required' => true,
], $data_json);
xpresentationLayer::buildSelectJson([
    'title' => 'Entrega',
    'id' => 'sendFormCommend',
    'name' => 'sendFormCommend',
    'event' => '',
    'classContainer' => '',
    'idContainer' => '',
    'required' => true,
    'dataString' => ''
], "");


$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de pago',
    'id' => 'paidFormCommend',
    'name' => 'paidFormCommend',
    'event' => '',
    'classContainer' => '',
    'idContainer' => '',
    'required' => true,
    'dataString' => ''
], $data_json);

$customClass = $_SESSION['refToChange'] ? "hidden" : "";
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "", "exchangeRateCommend", "0.00", "", $customClass, "", true);
xpresentationLayer::buildInputTextGrid("Monto Bs", "", "amountBsCommend", "0.00", "", $customClass, "", true);


//ACH
xpresentationLayer::startDivHidden("sectionCommendAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "", "bankAccountACHCommend", "", 20);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accACHCommend',
    'maxlength' => 20
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Routing',
    'name' => 'routingACHCommend',
    'maxlength' => 20
]);
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionCommendDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson([
    'title' => 'Cta. Receptora',
    'id' => 'receiveAccount',
    'name' => 'receiveAccount'
], $data_json);
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceCommendCuenta", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// EFECTIVO
xpresentationLayer::startDivHidden("efectivoCommend", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceCommend");
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCommendCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero Tarjeta',
    'name' => 'cardNumberCommend',
    'maxlength' => 20
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo Tarjeta',
    'id' => 'typeCardCommend',
    'name' => 'typeCardCommend',
], $data_json);
// xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputsMonthYear("Fecha Venc", "monthVenCommend", "yearVenCommend");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validacion',
    'name' => 'codValCommend',
    'maxlength' => 3
]);
xpresentationLayer::endDiv();

// Documento Identificación
// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("uploadCommend");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocWallet',
    'name' => 'typeDocWallet',
], $data_json);
?>
<div class="input-field1 hidden" id="fileInputWallet1">
    <input type="file" name="file">
</div>
<?php

xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::startDivHidden("beneficiarioCommend");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend([
            'id' => 'usersCommend',
            'idButtom' => 'btnAddCommend',
            'name' => 'usersCommend',
            'class' => 'mb20 input-field1'
], "");
xpresentationLayer::startDivHidden("userCommend");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Documento Identificación", "bdocumentid", "bdocumentid", "", 20, "grid-item-2", "required", "");
xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameCommend", "firstNameCommend", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo nombre", "secondNameCommend", "secondNameCommend", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameCommend", "firstSurnameCommend", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameCommend", "secondSurnameCommend", "");
xpresentationLayer::buildInputTextGrid("Dirección", "addressCommend", "addressCommend", "", "", "grid-item-1 grid-item-2 ", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Email", "emailCommend", "emailCommend", "Ejemplo@mail.com", 50);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Telefono',
    'name' => 'phoneCommend',
    'maxlength' => 20
]);
xpresentationLayer::buildInputTextGrid("Banco", "bankCommend", "bankCommend", "", "");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accountCommend',
    'maxlength' => 20
]);
xpresentationLayer::buildButtonCenter("Aceptar", "", "addContact", "btn", "centrarObjets grid-item-2");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();
xpresentationLayer::endDiv();

// DOCUMENTOS DE COMMEND
xpresentationLayer::startDivHidden("docsCommend");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocCommend',
    'name' => 'typeDocCommend',
], $data_json);
xpresentationLayer::buildInputFileDoc("fileInputCommend", "hidden", "file1");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("encomienda");

xpresentationLayer::endForm();
xpresentationLayer::endDiv();
//Fin seccion de Encomienda

//Comienzo seccion Transferencia
xpresentationLayer::startContentofOption("Transferencia");
xpresentationLayer::startForm("transferenciaForm");
xpresentationLayer::startSectionTwoColumns("", "transferenciaFormTest");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amountTransfer',
    'placeholder' => '0.00',
    'maxlength' => 20,
    'required' => true
]);
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson([
    'title' => 'País',
    'id' => 'countryTransfer',
    'name' => 'countryTransfer',
    'required' => true,
], $data_json);
$data_json = $serviceCall->mgetcurrencytrl();
xpresentationLayer::buildSelectJson([
    'title' => 'Moneda',
    'id' => 'currencyTransfer',
    'name' => 'currencyTransfer',
    'required' => true,
], $data_json);
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5, 1));
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de pago',
    'id' => 'paidFormTransfer',
    'name' => 'paidFormTransfer',
    'required' => true,
], $data_json);

$customClass = $_SESSION['refToChange'] ? "hidden" : "";
xpresentationLayer::buildInputTextGrid("Tasa de Cambio", "exchangedRateTransfer", "exchangedRateTransfer", "0.00", "", $customClass, "", true);
xpresentationLayer::buildInputTextGrid("Monto Bs", "amountBsTransfer", "amountBsTransfer", "0.00", "", $customClass, "", true);

//Deposito en cuenta
xpresentationLayer::startDivHidden("accountDeposit", "grid-item-2 grid-1");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildSelectJson([
    'title' => 'Cta. Receptora',
    'id' => 'receivingAccount',
    'name' => 'receivingAccount'
], $data_json);
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransferDeposit", "referenceTransferDeposit", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();
//Efectivo
xpresentationLayer::startDivHidden("cash", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Referencia", "referenceTransferCash", "referenceTransferCash", "");
xpresentationLayer::endDiv();
//Pago movil y ACH
xpresentationLayer::startDivHidden("MovilPayTransfer", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "bankAccountMovilTransfer", "bankAccountMovilTransfer", "");
xpresentationLayer::buildInputTextGrid("Cuenta", "accMovilTransfer", "accMovilTransfer", "");
xpresentationLayer::buildInputTextGrid("Routing", "routingMovilTransfer", "routingMovilTransfer", "");
xpresentationLayer::endDiv();
//Tarjeta prepagada
xpresentationLayer::startDivHidden("SectionPrepaidTransfer", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número de tarjeta',
    'name' => 'numberCardTransfer',
    'maxlength' => 20
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo de tarjeta',
    'id' => 'typeCardTransfer',
    'name' => 'typeCardTransfer',
],  $data_json);
xpresentationLayer::buildInputsDate("monthTransfer", "monthTransfer", "yearTransfer", "yearTransfer");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validación',
    'name' => 'ValidationCodeCardTransfer',
    'maxlength' => 3
]);
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
xpresentationLayer::buildSearchUsersCommend([
            'id' => 'usersTransfer',
            'idButtom' => 'btnIconAdd',
            'name' => 'usersTransfer',
            'class' => '"mb20 input-field1'
], "");
xpresentationLayer::startDivHidden("userTransfer");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid("Documento Identificación", "bdocumentidTransfer", "bdocumentidTransfer", "", 20, "grid-item-2", "required", "");
xpresentationLayer::buildInputTextGrid("Primer nombre", "firstNameTransfer", "firstNameTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo nombre", "secondNameTransfer", "secondNameTransfer", "");
xpresentationLayer::buildInputTextGrid("Primer apellido", "firstSurnameTransfer", "firstSurnameTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Segundo apellido", "secondSurnameTransfer", "secondSurnameTransfer", "");
xpresentationLayer::buildInputTextGrid("Dirección", "addressTransfer", "addressTransfer", "", "", "grid-item-1 grid-item-2 ", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Email", "emailTransfer", "emailTransfer", "Ejemplo@mail.com", 50, "grid-item-1 grid-item-2");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Telefono',
    'name' => 'phoneTransfer',
    'class' => 'grid-item-1 grid-item-2',
    'maxlength' => 3
]);
xpresentationLayer::buildInputTextGrid("Banco", "bankTransfer", "bankTransfer", "", "", "grid-item-1 grid-item-2");
xpresentationLayer::buildInputTextGrid("Cuenta", "accountTransfer", "accountTransfer", "", "", "grid-item-1 grid-item-2");
xpresentationLayer::buildInputTextGrid("Pais Banco", "countryBankTransfer", "countryBankTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Ciudad Banco", "cityBankTransfer", "cityBankTransfer", "", "", "", "required");
xpresentationLayer::buildInputTextGrid("Dirección Banco", "bankAddressTransfer", "bankAddressTransfer", "", "", "grid-item-1 grid-item-2", "required", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("ABA / SWIFT/ IBAN", "abaSwiftIban", "abaSwiftIban", "", "", "grid-item-1 grid-item-2", "required", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("Banco Intermediario", "bankTransferIntermediary", "bankTransferIntermediary", "", "", "grid-item-1 grid-item-2", "", "", "input-text-large");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta Intermediario',
    'name' => 'accountTransferIntermediary',
    'class' => 'grid-item-1 grid-item-2'
]);
xpresentationLayer::buildInputTextGrid("Pais Intermediario", "countryBankTransferIntermediary", "countryBankTransferIntermediary");
xpresentationLayer::buildInputTextGrid("Ciudad Intermediario", "cityBankTransferIntermediary", "cityBankTransferIntermediary");
xpresentationLayer::buildInputTextGrid("Dirección Banco Intermediario", "bankAddressTransferIntermediary", "bankAddressTransferIntermediary", "", "", "grid-item-1 grid-item-2", "", "", "input-text-large");
xpresentationLayer::buildInputTextGrid("ABA / SWIFT/ IBAN Intermediario", "abaSwiftIbanIntermediary", "abaSwiftIbanIntermediary", "", "", "grid-item-1 grid-item-2", "", "", "input-text-large");

xpresentationLayer::buildButtonCenter("Aceptar", "", "addContactTransfer", "btn", "centrarObjets grid-item-2");
xpresentationLayer::endSection();
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
include './modals/modalInactividad.php';

xpresentationLayer::buildFooterXatoxi();
xpresentationLayer::endSection();
xpresentationLayer::endHtml();
