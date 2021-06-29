<?php

error_reporting(0);
session_start();
include_once("utilities.php");
utilities::trueUser();
include_once("xpresentationlayer.php");
include_once("xclient.php");

$serviceCall = new xclient("");
xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();
xpresentationLayer::startMain();

xpresentationLayer::startSectionOpt("grid-1 full-height", "item-container");
xpresentationLayer::buildOptionsPrincipal("Encomienda", "Billetera", "card card-a", "trad_encomienda");
xpresentationLayer::buildOptionsPrincipal("Remesa", "Encomienda", "card card-a", "trad_remesa");
xpresentationLayer::buildOptionsPrincipal("Transferencia", "Transferencia", "card card-a", "trad_transferencia");
xpresentationLayer::endSection();

xpresentationLayer::startAnimationMenu();
xpresentationLayer::startSectionButtos();
xpresentationLayer::buildOptionGrid("Encomienda", "Billetera", "trad_encomienda");
xpresentationLayer::buildOptionGrid("Remesa", "Encomienda", "trad_remesa");
xpresentationLayer::buildOptionGrid("Transferencia", "Transferencia", "trad_transferencia");
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
    'dataString' => 'trad_monto'
]);

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson([
    'title' => 'Moneda',
    'id' => 'currencyWallet',
    'name' => 'currencyWallet',
    'dataString' => 'trad_moneda'
], $data_json);
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5));
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de pago',
    'id' => 'paidFormWallet',
    'name' => 'paidFormWallet',
    'classContainer' => 'grid-item-2',
    'dataString' => 'trad_forma_de_pago'
], $data_json);

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
xpresentationLayer::buildSelectJson([
    'title' => 'Cta. Receptora',
    'id' => 'receiveAccount',
    'name' => 'receiveAccount',
    'dataString' => 'trad_cta_receptora'
], $data_json);
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
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo Tarjeta',
    'id' => 'typeCardWallet',
    'name' => 'typeCardWallet',
    'dataString' => 'trad_tipo_tarjeta'
], $data_json);

xpresentationLayer::buildInputsMonthYear("Fecha Venc", "monthVenCommend", "yearVenCommend");

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
xpresentationLayer::startDivHidden("beneficiarioWallet", "mt15");
xpresentationLayer::buildTitleBar("BENEFICIARIO", "", "trad_beneficiario");
$data_json = $serviceCall->mgetpartyxl();
xpresentationLayer::buildSearchUsersWallet([
    'id' => 'users',
    'name' => 'users',
], $data_json);
xpresentationLayer::endDiv();

// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("docsWallet", "mt15");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
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
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson([
    'title' => 'País',
    'id' => 'countryCommend',
    'name' => 'countryCommend',
    'event' => 'selectValorforId(\'countryCommend/providerCommend\', \'ajax.php?cond=mgetproviderl\')',
    'dataString' => 'trad_pais'
],  $data_json);
xpresentationLayer::buildSelectJson([
    'title' => 'Proveedor',
    'id' => 'providerCommend',
    'name' => 'providerCommend',
    'event' => 'selectValorforId(\'providerCommend/sendFormCommend\', \'ajax.php?cond=mgetremitancetypel\')',
    'dataString' => 'trad_proveedor'
], "");
$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson([
    'title' => 'Moneda',
    'id' => 'currencyCommend',
    'name' => 'currencyCommend',
    'dataString' => 'trad_moneda'
], $data_json);
xpresentationLayer::buildSelectJson([
    'title' => 'Entrega',
    'id' => 'sendFormCommend',
    'name' => 'sendFormCommend',
    'dataString' => 'trad_entrega'
], "");


$data_json = $serviceCall->mgetclearencetypel();
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de pago',
    'id' => 'paidFormCommend',
    'name' => 'paidFormCommend',
    'dataString' => 'trad_forma_de_pago'
], $data_json);

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
xpresentationLayer::buildSelectJson([
    'title' => 'Cta. Receptora',
    'id' => 'receiveAccount',
    'name' => 'receiveAccount',
    'dataString' => 'trad_cta_receptora'
], $data_json);
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
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo Tarjeta',
    'id' => 'typeCardCommend',
    'name' => 'typeCardCommend',
    'dataString' => 'trad_tipo_tarjeta'
], $data_json);
// xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputsMonthYear("Fecha Venc", "monthVenCommend", "yearVenCommend");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cod. Validacion',
    'name' => 'codValCommend',
    'maxlength' => 3,
    'dataString' => 'trad_cod_validacion'
]);
xpresentationLayer::endDiv();

// Documento Identificación
// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("uploadCommend", "mt15");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
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

xpresentationLayer::startDivHidden("beneficiarioCommend", "mt15");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend([
    'id' => 'usersCommend',
    'idButtom' => 'btnAddCommend',
    'name' => 'usersCommend',
    'class' => 'mb20 input-field1'
], "");
xpresentationLayer::startDivHidden("userCommend");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid([
    'title' => 'Documento identidad',
    'name' => 'bdocumentid',
    'id' => 'bdocumentid',
    'classLabel' => 'required',
    'classContainer' => 'grid-item-2',
    'dataString' => 'trad_documento_de_identidad'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Primer nombre',
    'name' => 'firstNameCommend',
    'id' => 'firstNameCommend',
    'classLabel' => 'required',
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
    'classLabel' => 'required',
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
    'maxlength' => 70,
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
    'dataString' => 'trad_monto'
]);
$data_json = $serviceCall->mgetcountryl();
xpresentationLayer::buildSelectJson([
    'title' => 'País',
    'id' => 'countryTransfer',
    'name' => 'countryTransfer',
    'dataString' => 'trad_pais'
], $data_json);
$data_json = $serviceCall->mgetcurrencytrl();
xpresentationLayer::buildSelectJson([
    'title' => 'Moneda',
    'id' => 'currencyTransfer',
    'name' => 'currencyTransfer',
    'dataString' => 'trad_moneda'
], $data_json);
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5, 1));
xpresentationLayer::buildSelectJson([
    'title' => 'Forma de pago',
    'id' => 'paidFormTransfer',
    'name' => 'paidFormTransfer',
    'dataString' => 'trad_forma_de_pago'
], $data_json);

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
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson([
    'title' => 'Cta. Receptora',
    'id' => 'receivingAccount',
    'name' => 'receivingAccount',
    'dataString' => 'trad_cta_receptora'
], $data_json);
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
xpresentationLayer::buildSelectJson([
    'title' => 'Tipo de tarjeta',
    'id' => 'typeCardTransfer',
    'name' => 'typeCardTransfer',
    'dataString' => 'trad_tipo_tarjeta'
],  $data_json);
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

xpresentationLayer::startDivHidden("beneficiarioTransfer", "mt15");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
xpresentationLayer::buildSearchUsersCommend([
    'id' => 'usersTransfer',
    'idButtom' => 'btnIconAdd',
    'name' => 'usersTransfer',
    'class' => 'mb20 input-field1'
], "");
xpresentationLayer::startDivHidden("userTransfer");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputTextGrid([
    'title' => 'Documento de Identidad',
    'name' => 'bdocumentidTransfer',
    'id' => 'bdocumentidTransfer',
    'classLabel' => 'required',
    'classContainer' => 'grid-item-2',
    'maxlength' => 20,
    'dataString' => 'trad_documento_de_identidad'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Primer nombre',
    'name' => 'firstNameTransfer',
    'id' => 'firstNameTransfer',
    'classLabel' => 'required',
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
    'classLabel' => 'required',
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
    'maxlength' => 50,
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_direccion'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Email',
    'name' => 'emailTransfer',
    'id' => 'emailTransfer',
    'type' => 'email',
    'maxlength' => 70,
    'placeholder' => 'ejemplo@mail.com',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_email'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Telefono',
    'name' => 'phoneTransfer',
    'class' => 'grid-item-1 grid-item-2',
    'maxlength' => 20,
    'dataString' => 'trad_telefono'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Banco',
    'name' => 'bankTransfer',
    'id' => 'bankTransfer',
    'classLabel' => 'required',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_banco'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta',
    'name' => 'accountTransfer',
    'id' => 'accountTransfer',
    'classLabel' => 'required',
    'maxlength' => 20,
    'class' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_cuenta'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Pais Banco',
    'name' => 'countryBankTransfer',
    'id' => 'countryBankTransfer',
    'classLabel' => 'required',
    'dataString' => 'trad_pais_banco'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Ciudad Banco',
    'name' => 'cityBankTransfer',
    'id' => 'cityBankTransfer',
    'classLabel' => 'required',
    'dataString' => 'trad_ciudad_banco'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'Dirección Banco',
    'name' => 'bankAddressTransfer',
    'id' => 'bankAddressTransfer',
    'classLabel' => 'required',
    'classContainer' => 'grid-item-1 grid-item-2',
    'dataString' => 'trad_direccion_banco'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'ABA / SWIFT/ IBAN',
    'name' => 'abaSwiftIban',
    'id' => 'abaSwiftIban',
    'classContainer' => 'grid-item-1 grid-item-2',
    'classLabel' => 'required',
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


// DOCUMENTOS DE TRANSFER
xpresentationLayer::startDivHidden("docsTransfer");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "", "trad_documentos_requeridos");
xpresentationLayer::startSectionTwoColumns();
$data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson([
    'id' => 'typeDocTransfer',
    'name' => 'typeDocTransfer',
], $data_json);
xpresentationLayer::buildInputFileDoc("fileInputTransfer", "hidden", "file2");
xpresentationLayer::endSection();
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
