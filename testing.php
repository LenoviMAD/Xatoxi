<?php
error_reporting(0);
session_start();
include_once("utilities.php");
// utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");
xpresentationLayer::startHtml("esp");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();


xpresentationLayer::startMain();
xpresentationLayer::startFirtsSection();
xpresentationLayer::startForm("billeteraForm", "", "pb20");
xpresentationLayer::startSectionTwoColumns("", "billeteraFormTest");
xpresentationLayer::buildInputNumberGrid("Monto", "", "amountWallet", "0.00");

$data_json = $serviceCall->mgetcurrencyremitancel();
xpresentationLayer::buildSelectJson("Moneda", "currencyWallet", "", $data_json, "", "");
$data_json = $serviceCall->mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 5));
xpresentationLayer::buildSelectJson("Forma de pago", "paidFormWallet", "", $data_json, "", "", "grid-item-2");

//ACH
xpresentationLayer::startDivHidden("sectionWalletAHC", "grid-item-2 grid-1");
xpresentationLayer::buildInputTextGrid("Banco", "", "bankAccountACHWallet");
xpresentationLayer::buildInputNumberGrid("Cuenta", "accACHWallet", "accACHWallet", "", "", "", "35", "");
xpresentationLayer::buildInputTextGrid("Routing", "", "routingACHWallet");
xpresentationLayer::endDiv();

// DEPOSITO EN CUENTA
xpresentationLayer::startDivHidden("sectionAccountDeposit", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
// $data_json = $serviceCall->mgeticccbankl();
xpresentationLayer::buildSelectJson("Cta. Receptora", "receiveAccount", "", $data_json, "", "");
xpresentationLayer::buildInputTextGrid("Referencia", "", "referenceWalletCuenta", "");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

// TARJETA DE CREDITO
xpresentationLayer::startDivHidden("sectionCreditCard", "grid-item-2 grid-1");
xpresentationLayer::startSectionTwoColumns();
xpresentationLayer::buildInputNumberGrid("Numero Tarjeta", "", "cardNumberWallet", "");
// $data_json = $serviceCall->mgetcreditcardtypel();
xpresentationLayer::buildSelectJson("Tipo Tarjeta", "typeCardWallet", "", $data_json, "", "");
xpresentationLayer::startSectionTwoColumns("grid-2 grid-item-1");
xpresentationLayer::buildInputNumberGrid("Año", "", "yearVenWallet", "", "", "", 4);
xpresentationLayer::buildInputNumberGrid("Mes", "", "monthVenWallet", "", "", "", 2);
xpresentationLayer::endSection();
xpresentationLayer::buildInputNumberGrid("Cod. Validacion", "", "codValWallet", "", "", "", 4);
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::endSection();

// BENEFICIARIO
xpresentationLayer::startDivHidden("beneficiarioWallet");
xpresentationLayer::buildTitleBar("BENEFICIARIO");
// $data_json = $serviceCall->mgetpartyxl();
xpresentationLayer::buildSearchUsersWallet("users", "", $data_json, "", "", "", "");
xpresentationLayer::endDiv();

// DOCUMENTOS DE WALLET
xpresentationLayer::startDivHidden("docsWallet");
xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS");
xpresentationLayer::startSectionTwoColumns();
// $data_json = $serviceCall->mgetcompliancedoctypel();
xpresentationLayer::buildSelectJson("", "typeDocWallet", "", $data_json, "", "");
xpresentationLayer::buildInputFileDoc("fileInputWallet", "hidden", "file");
xpresentationLayer::endSection();
xpresentationLayer::endDiv();

xpresentationLayer::buildSectionPin("billetera");

xpresentationLayer::endForm();

xpresentationLayer::endSection();

xpresentationLayer::buildSectionPin("","grid-item-2");
xpresentationLayer::endMain();

// include './modals/modalFirma.php';
// include './modals/modalOtpVerification.php';
// include './modals/modalSuccess.php';
// include './modals/modalPinVerification.php';
// include './modals/modalPinVerification.php';
// include './modals/modalPinVerification.php';     

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endHtml();
