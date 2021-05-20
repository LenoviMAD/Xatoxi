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
xpresentationLayer::buildOptionsPrincipal("Encomienda", "Billetera", "card card-a","trad_encomienda");
xpresentationLayer::buildOptionsPrincipal("Remesa", "Encomienda", "card card-a","trad_remesa");
xpresentationLayer::buildOptionsPrincipal("Transferencia", "Transferencia","card card-a","trad_transferencia");
xpresentationLayer::endSection();

xpresentationLayer::startAnimationMenu();
xpresentationLayer::startSectionButtos();
xpresentationLayer::buildOptionGrid("Encomienda", "Billetera", "trad_encomienda");
xpresentationLayer::buildOptionGrid("Remesa", "Encomienda", "trad_remesa");
xpresentationLayer::buildOptionGrid("Transferencia", "Transferencia","trad_transferencia");
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
xpresentationLayer::buildSelectJson("Moneda", "currencyWallet", "", $data_json, "", "", "", true);
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5));
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormWallet", "", $data_json, "", "", "grid-item-2", true);

//ACH
xpresentationLayer::startDivHidden("sectionWalletAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco',
    'name' => 'bankAccountACHWallet',
    'dataString' => 'trad_banco'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accACHWallet',
    'dataString' => 'trad_cuenta'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Routing',
    'name' => 'routingACHWallet',
    'dataString' => 'trad_routing'
]);
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionAccountDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Referencia',
    'name' => 'referenceWalletCuenta',
    'dataString' => 'trad_referencia'
]);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero Tarjeta',
    'name' => 'cardNumberWallet',
    'maxlength' => 20,
    'dataString' => 'trad_numero_de_tarjeta'
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "typeCardWallet", "", $data_json, "", "");

xpresentationLayer::buildInputsMonthYear("Fecha Venc","monthVenCommend", "yearVenCommend");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validacion',
    'name' => 'codValWallet',
    'placeholder' => '0.00',
    'maxlength' => 4,
    'dataString' => 'trad_cod_validacion'
]);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

// BENEFICIARIO
xpresentationLayer::startDivHidden("beneficiarioWallet");
xpresentationLayer::buildTitleBar("BENEFICIARIO", "","trad_beneficiario");
$data_json = $serviceCall->mgetpartyxl();
xpresentationLayer::buildSearchUsersWallet("users", "", $data_json, "", "", "", "");
xpresentationLayer::endDiv();

// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("docsWallet");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
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
xpresentationLayer::startForm("encomiendaForm", "", "pb20");
xpresentationLayer::startSectionTwoColumns("", "encomiendaFormTest");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Monto',
    'name' => 'amountCommend',
    'placeholder' => '0.00',
    'required' => true,
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryCommend", "countryCommend", $data_json, "", "selectValorforId('countryCommend/providerCommend', 'ajax.php?cond=mgetproviderl')", "", true);
xpresentationLayer::buildSelectJson("Proveedor", "providerCommend", "providerCommend", "", "", "selectValorforId('providerCommend/sendFormCommend', 'ajax.php?cond=mgetremitancetypel')", "", true);
$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyCommend", "", $data_json, "", "", "", true);
xpresentationLayer::buildSelectJson("Entrega", "sendFormCommend", "sendFormCommend", "", "", "", "", true);


$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormCommend", "", $data_json, "", "", "", true);

$customClass = $_SESSION['refToChange'] ? "hidden" : "";
xpresentationLayer::buildInputTextGrid([
    'title' => 'Tasa de Cambio',
    'name' => 'exchangeRateCommend',
    'placeholder' => '0.00',
    'disabled' => true,
    'customClass' => $customClass,
    'dataString' => 'trad_tasa_de_cambio'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Monto Bs',
    'name' => 'amountBsCommend',
    'placeholder' => '0.00',
    'disabled' => true,
    'customClass' => $customClass,
    'dataString' => 'trad_monto'
]);

//ACH
xpresentationLayer::startDivHidden("sectionCommendAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco',
    'name' => 'bankAccountACHCommend',
    'maxlength' => 20,
    'dataString' => 'trad_banco'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accACHCommend',
    'maxlength' => 20,
    'dataString' => 'trad_cuenta'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Routing',
    'name' => 'routingACHCommend',
    'maxlength' => 20,
    'dataString' => 'trad_routing'
]);
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionCommendDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Referencia',
    'name' => 'referenceCommendCuenta',
    'dataString' => 'trad_referencia'
]);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// EFECTIVO
xpresentationLayer::startDivHidden("efectivoCommend", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Referencia',
    'name' => 'referenceCommend',
    'dataString' => 'trad_referencia'
]);
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCommendCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Numero Tarjeta',
    'name' => 'cardNumberCommend',
    'maxlength' => 20,
    'dataString' => 'trad_numero_de_tarjeta'
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "typeCardCommend", "", $data_json, "", "");
// xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputsMonthYear("Fecha Venc","monthVenCommend", "yearVenCommend");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validacion',
    'name' => 'codValCommend',
    'maxlength' => 3,
    'dataString' => 'trad_cod_validacion'
]);
xpresentationLayer::endDiv();

// Documento Identificación
// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("uploadCommend");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "","trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson("", "typeDocWallet", "", $data_json, "", "");
?>
<div class="input-field1 hidden" id="fileInputWallet1">
    <input type="file" name="file">
</div>
<?php

xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::startDivHidden("beneficiarioCommend");
xpresentationLayer::buildTitleBar("BENEFICIARIO", "","trad_beneficiario");
xpresentationLayer::buildSearchUsersCommend("usersCommend", "usersCommend", "btnAddCommend", "", "", "", "mb20 input-field1");
xpresentationLayer::startDivHidden("userCommend");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid([
    'title' => 'Documento identidad',
    'name' => 'bdocumentid',
    'id' => 'bdocumentid',
    'required' => true,
    'classContainer' => 'grid-item-2',
    'dataString' => 'trad_documento_de_identidad'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Primer nombre',
    'name' => 'firstNameCommend',
    'id' => 'firstNameCommend',
    'required' => true,
    'dataString' => 'trad_primer_nombre'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Segundo nombre',
    'name' => 'secondNameCommend',
    'id' => 'secondNameCommend',
    'dataString' => 'trad_segundo_nombre'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Primer apellido',
    'name' => 'firstSurnameCommend',
    'id' => 'firstSurnameCommend',
    'required' => true,
    'dataString' => 'trad_primer_apellido'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Segundo apellido',
    'name' => 'secondSurnameCommend',
    'id' => 'secondSurnameCommend',
    'dataString' => 'trad_segundo_apellido'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Dirección',
    'name' => 'addressCommend',
    'id' => 'addressCommend',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_segundo_apellido'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Email',
    'name' => 'emailCommend',
    'id' => 'emailCommend',
    'placeholder' => 'Ejemplo@mail.com',
    'type' => 'email',
    'maxlength' => 50,
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_email'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Telefono',
    'name' => 'phoneCommend',
    'maxlength' => 20,
    'dataString' => 'trad_telefono'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco',
    'name' => 'bankCommend',
    'id' => 'bankCommend',
    'dataString' => 'trad_banco'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accountCommend',
    'maxlength' => 20,
    'dataString' => 'trad_cuenta'
]);
xpresentationLayer::buildButtonCenter("Aceptar", "", "addContact", "btn", "centrarObjets grid-item-2", "trad_aceptar");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();
xpresentationLayer::endDiv();

// DOCUMENTOS DE COMMEND
xpresentationLayer::startDivHidden("docsCommend");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson("", "typeDocCommend", "", $data_json, "", "");
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
    'required' => true,
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson("País", "countryTransfer", "countryTransfer", $data_json, "", "", "", true);
$data_json = $serviceCall->mgetcurrencytrl();
xpresentationLayer::buildSelectJson("Moneda", "currencyTransfer", "currencyTransfer", $data_json, "", "", "", true);
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5, 1));
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormTransfer", "paidFormTransfer", $data_json, "", "", "", true);

$customClass = $_SESSION['refToChange'] ? "hidden" : "";
xpresentationLayer::buildInputTextGrid([
    'title' => 'Tasa de Cambio',
    'name' => 'exchangedRateTransfer',
    'id' => 'exchangedRateTransfer',
    'placeholder' => '0.00',
    'classContainer' => $customClass,
    'disabled' => true,
    'dataString' => 'trad_tasa_de_cambio'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Monto Bs',
    'name' => 'amountBsTransfer',
    'id' => 'amountBsTransfer',
    'placeholder' => '0.00',
    'classContainer' => $customClass,
    'disabled' => true,
    'dataString' => 'trad_monto'
]);

//Deposito en cuenta
xpresentationLayer::startDivHidden("accountDeposit", "grid-item-2 grid-1");
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receivingAccount", "receivingAccount", $data_json, "", " ");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Referencia',
    'name' => 'referenceTransferDeposit',
    'id' => 'referenceTransferDeposit',
    'dataString' => 'trad_referencia'
]);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();
//Efectivo
xpresentationLayer::startDivHidden("cash", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Referencia',
    'name' => 'referenceTransferCash',
    'id' => 'referenceTransferCash',
    'dataString' => 'trad_referencia'
]);
xpresentationLayer::endDiv();
//Pago movil y ACH
xpresentationLayer::startDivHidden("MovilPayTransfer", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco',
    'name' => 'bankAccountMovilTransfer',
    'id' => 'bankAccountMovilTransfer',
    'dataString' => 'trad_banco'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accMovilTransfer',
    'id' => 'accMovilTransfer',
    'maxlength' => 20,
    'dataString' => 'trad_cuenta'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Routing',
    'name' => 'routingMovilTransfer',
    'id' => 'routingMovilTransfer',
    'dataString' => 'trad_routing'
]);
xpresentationLayer::endDiv();
//Tarjeta prepagada
xpresentationLayer::startDivHidden("SectionPrepaidTransfer", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número de tarjeta',
    'name' => 'numberCardTransfer',
    'maxlength' => 20,
    'dataString' => 'trad_numero_de_tarjeta'
]);
$data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo de tarjeta", "typeCardTransfer", "typeCardTransfer", $data_json, "", "");
xpresentationLayer::buildInputsDate("monthTransfer", "monthTransfer", "yearTransfer", "yearTransfer");
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validación',
    'name' => 'ValidationCodeCardTransfer',
    'id' => 'ValidationCodeCardTransfer',
    'maxlength' => 3,
    'dataString' => 'trad_cod_validacion'
]);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::startDivHidden("uploadTransfer", "grid-item-2 grid-1");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
// xpresentationLayer::buildInputFileDoc("Documento Identificación", "fileDocumentTransfer", "fileDocumentTransfer");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

xpresentationLayer::startDivHidden("beneficiarioTransfer");
xpresentationLayer::buildTitleBar("BENEFICIARIO", "", "trad_beneficiario");
xpresentationLayer::buildSearchUsersCommend("usersTransfer", "usersTransfer", "btnIconAdd", "", "", "", "mb20 input-field1");
xpresentationLayer::startDivHidden("userTransfer");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid([
    'title' => 'Documento de Identidad',
    'name' => 'bdocumentidTransfer',
    'id' => 'bdocumentidTransfer',
    'classContainer' => 'grid-item-2',
    'required' => true,
    'maxlength' => 20,
    'dataString' => 'trad_documento_de_identidad'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Primer nombre',
    'name' => 'firstNameTransfer',
    'id' => 'firstNameTransfer',
    'required' => true,
    'dataString' => 'trad_primer_nombre'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Segundo nombre',
    'name' => 'secondNameTransfer',
    'id' => 'secondNameTransfer',
    'dataString' => 'trad_segundo_nombre'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Primer apellido',
    'name' => 'firstSurnameTransfer',
    'id' => 'firstSurnameTransfer',
    'required' => true,
    'dataString' => 'trad_primer_apellido'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Segundo apellido',
    'name' => 'secondSurnameTransfer',
    'id' => 'secondSurnameTransfer',
    'dataString' => 'trad_segundo_apellido'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Dirección',
    'name' => 'addressTransfer',
    'id' => 'addressTransfer',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_direccion'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Email',
    'name' => 'emailTransfer',
    'id' => 'emailTransfer',
    'type' => 'email',
    'maxlength' => 50,
    'placeholder' => 'ejemplo@mail.com',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_email'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Telefono',
    'name' => 'phoneTransfer',
    'class' => 'grid-item-1 grid-item-2',
    'maxlength' => 3,
    'dataString' => 'trad_telefono'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco',
    'name' => 'bankTransfer',
    'id' => 'bankTransfer',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_banco'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accountTransfer',
    'id' => 'accountTransfer',
    'class' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_cuenta'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Pais Banco',
    'name' => 'countryBankTransfer',
    'id' => 'countryBankTransfer',
    'required' => true,
    'dataString' => 'trad_pais_banco'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Ciudad Banco',
    'name' => 'cityBankTransfer',
    'id' => 'cityBankTransfer',
    'required' => true,
    'dataString' => 'trad_ciudad_banco'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Dirección Banco',
    'name' => 'bankAddressTransfer',
    'id' => 'bankAddressTransfer',
    'classContainer' => 'grid-item-1 grid-item-2',
    'required' => true,
    'dataString' => 'trad_direccion_banco'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'ABA / SWIFT/ IBAN',
    'name' => 'abaSwiftIban',
    'id' => 'abaSwiftIban',
    'classContainer' => 'grid-item-1 grid-item-2',
    'required' => true,
    'dataString' => 'trad_aba_swift_iban'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco Intermediario',
    'name' => 'bankTransferIntermediary',
    'id' => 'bankTransferIntermediary',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_banco_intermediario'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta Intermediario',
    'name' => 'accountTransferIntermediary',
    'class' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_cuenta_intermediaria'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Pais Intermediario',
    'name' => 'countryBankTransferIntermediary',
    'id' => 'countryBankTransferIntermediary',
    'maxlength' => 20,
    'dataString' => 'trad_pais_intermediario'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Ciudad Intermediario',
    'name' => 'cityBankTransferIntermediary',
    'id' => 'cityBankTransferIntermediary',
    'dataString' => 'trad_ciudad_intermediaria'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Dirección Banco Intermediario',
    'name' => 'bankAddressTransferIntermediary',
    'id' => 'bankAddressTransferIntermediary',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_direccion_banco_intermediario'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'ABA / SWIFT / IBAN Intermediario',
    'name' => 'abaSwiftIbanIntermediary',
    'id' => 'abaSwiftIbanIntermediary',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_aba_swift_iban_intermediario'
]);

xpresentationLayer::buildButtonCenter("Aceptar", "", "addContactTransfer", "btn", "centrarObjets grid-item-2", "trad_aceptar");
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
