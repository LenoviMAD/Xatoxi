<?php
error_reporting(0);
session_start();
include_once("utilities.php");

utilities::trueUser();

include_once("xpresentationlayer.php");
include_once("xclient.php");
$serviceCall = new xclient("");

include_once("xpresentationlayer.php");
xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");
xpresentationLayer::buildHeaderXatoxi();

xpresentationLayer::startMain();
if ($_SESSION['ccnumber']) {
?>
    <div class="contenedor">
        <!-- Tarjeta -->
        <section class="tarjeta" id="tarjeta">
            <div class="delantera">
                <div class="logo-marca" id="logo-marca">
                    <!-- <img src="img/logos/visa.png" alt=""> -->
                </div>
                <!-- <img src="img/chip-tarjeta.png" class="chip" alt=""> -->
                <div class="datos">
                    <div class="grupo" id="numero">
                        <p class="numero" id="htmlccnumber"><?= $_SESSION['ccnumber']; ?></p>
                        <p class="numero"><?= $_SESSION['ccexpmonth']; ?>/<?= $_SESSION['ccexpyear']; ?></p>
                    </div>
                    <div class="flexbox">
                        <div class="grupo" id="nombre">
                            <p class="nombre">CARD HOLDER</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="trasera">
                <div class="barra-magnetica"></div>
                <div class="datos">
                    <div class="grupo" id="firma">
                        <div class="firma">
                            <p></p>
                        </div>
                    </div>
                    <div class="grupo" id="ccv">
                        <p class="ccv mb0"><?= $_SESSION['cccvc']; ?></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
}
xpresentationLayer::startFirtsSection("grid-3 mb-20");
xpresentationLayer::buildOptionGrid("Perfil");
if ($_SESSION['ccnumber']) {
    xpresentationLayer::buildOptionGrid("MostrarQR", "", "", "genQR", "btn-primary");
}
xpresentationLayer::endSection();
xpresentationLayer::startForm("profileForm");

xpresentationLayer::startSectionTwoColumns("grid-2 pb15");

$data_json = $serviceCall->mgetiddocumenttypel();
xpresentationLayer::buildSectionDocument([
    'labelSelect' => 'T. Doc.',
    'labelInputText' => 'Documento',
    'labelInputDate' => 'Fec. Nacimiento',
    'nameSelect' => 'typeDocument',
    'nameInputText' => 'document',
    'nameInputDate' => 'birthdate',
    'idSelect' => 'typeDocument',
    'idInputText' => 'document',
    'idInputDate' => 'birthdate',
    'customClass' => 'grid-item-2',
], $data_json);

xpresentationLayer::startSectionTwoColumns("grid-3 grid-item-2", "");
xpresentationLayer::buildInputTextGrid([
    'title' => 'Lugar Emi. Doc',
    'name' => 'didemissionplace',
    'dataString' => 'trad_lugar_emi_doc'
]);
?>
<div class="input-field1">
    <label class="font-Bold js-translate" data-string="trad_fec_emi_doc">Fec. Emi. Doc.</label>
    <input type="date" name="didemissiondate">
</div>
<div class="input-field1">
    <label class="font-Bold js-translate" data-string="trad_fec_exp_doc">Fec. Exp. Doc</label>
    <input type="date" name="didexpirationdate">
</div>
<?php
xpresentationLayer::endSection();

xpresentationLayer::buildInputTextGrid([
    'title' => 'P. Nombre',
    'name' => 'firstName',
    'id' => 'firstName',
    'dataString' => 'trad_p_nombre',
    'classLabel' => 'required'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'S. Nombre',
    'name' => 'secondName',
    'id' => 'secondName',
    'dataString' => 'trad_s_nombre'
]);
xpresentationLayer::buildInputTextGrid([
    'title' => 'P. Apellido',
    'name' => 'firstSurname',
    'id' => 'firstSurname',
    'classLabel' => 'required',
    'dataString' => 'trad_p_apellido'
]);

xpresentationLayer::buildInputTextGrid([
    'title' => 'S. Apellido',
    'name' => 'secondSurname',
    'id' => 'secondSurname',
    'dataString' => 'trad_s_apellido'
]);

$data_json = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson([
    'title' => 'Pais',
    'id' => 'country',
    'name' => 'country',
    'event' => 'selectValorforId(\'country/state\', \'ajax.php?cond=getcountrystatel\')',
    'classContainer' => 'grid-item-2',
    'classLabel' => 'required',
    'dataString' => 'trad_pais'
], $data_json);
xpresentationLayer::buildSelectJson([
    'title' => 'Estado',
    'id' => 'state',
    'name' => 'state',
    'classLabel' => 'required',
    'event' => 'selectValorforId(\'state/city\', \'ajax.php?cond=getstatecityl\')',
    'dataString' => 'trad_estado'
], "");
xpresentationLayer::buildSelectJson([
    'title' => 'Ciudad',
    'id' => 'city',
    'name' => 'city',
    'classLabel' => 'required',
    'dataString' => 'trad_ciudad'
], "");

xpresentationLayer::buildTextArea([
    'title' => 'Direccion',
    'name' => 'direction',
    'maxlength' => '100',
    'customClass' => 'grid-item-2',
    'classLabel' => 'required',
    'dataString' => 'trad_direccion'
]);

$data_json = $serviceCall->mgetzipcodel($_SESSION['idcity']);
xpresentationLayer::buildSelectJson([
    'title' => 'Codigo ZIP',
    'name' => 'idzipcode',
    'dataString' => 'trad_zipcode'
], $data_json);

$data_json = $serviceCall->mgetoccupationl();
xpresentationLayer::buildSelectJson([
    'title' => 'Ocupación',
    'name' => 'idoccupation',
    'dataString' => 'trad_occupation'
], $data_json);

$data_json = $serviceCall->mgetlocationvenl();
xpresentationLayer::buildSelectJson([
    'title' => 'Agencia de preferencia',
    'id' => 'preferenceAgency',
    'name' => 'preferenceAgency',
    'classContainer' => 'grid-item-2',
    'classLabel' => 'required',
    'dataString' => 'trad_agencia_de_preferencia'
], $data_json);

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Cuenta bancaria',
    'name' => 'bankAccount',
    'id' => 'bankAccount',
    'maxlength' => 20,
    'class' => 'grid-item-2',
    'classLabel' => 'required',
    'dataString' => 'trad_cuenta_bancaria'
]);

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Tarjeta de crédito prepagada',
    'name' => 'debitcardnumber',
    'maxlength' => 20,
    'class' => 'grid-item-2'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número de cuenta remesa',
    'name' => 'prepaidcardaccount',
    'maxlength' => 20,
    'class' => 'grid-item-2'
]);
xpresentationLayer::buildInputNumberGrid([
    'title' => 'Tarjeta de débito de remesa',
    'name' => 'prepaidcardnumber',
    'maxlength' => 20,
    'class' => 'grid-item-2'
]);

// $data_json = $serviceCall->mgetbankl("238");

xpresentationLayer::buildSelectJson([
    'title' => 'Banco pago móvil',
    'id' => 'bancoPagoMovil',
    'name' => 'bancoPagoMovil',
    'dataString' => 'trad_banco_pago_movil'
], "");

xpresentationLayer::buildInputNumberGrid([
    'title' => 'Número del móvil',
    'name' => 'telMovil',
    'id' => 'telMovil',
    'maxlength' => 20,
    'required' => false,
    'dataString' => 'trad_numero_del_movil'
]);

// Nuevos campos 
$data_json = $serviceCall->mgetgenderl();
xpresentationLayer::buildSelectJson([
    'title' => 'Genero',
    'id' => 'idgender',
    'name' => 'idgender',
    'dataString' => 'trad_genero'
],  $data_json);

$data_json = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson([
    'title' => 'Nacionalidad',
    'id' => 'idcountrynationality',
    'name' => 'idcountrynationality',
    'dataString' => 'trad_nacionalidad'
], $data_json);
$data_json = $serviceCall->mgetallcountrydetaill();
xpresentationLayer::buildSelectJson([
    'title' => 'Pais de Nacimiento',
    'id' => 'idcountrybirth',
    'name' => 'idcountrybirth',
    'dataString' => 'trad_pais_de_nacimiento'
], $data_json);
$data_json = $serviceCall->mgetcivilstatel();
xpresentationLayer::buildSelectJson([
    'title' => 'Estado Civil',
    'id' => 'idcivilstate',
    'name' => 'idcivilstate',
    'dataString' => 'trad_estado_civil'
], $data_json);

// xpresentationLayer::buildInputNumberGrid([
//     'title' => 'Tarjeta de crédito Prepagada',
//     'name' => 'prepaidcardnumber',
//     'dataString' => 'trad_tarjeta_de_credito_prepagada',
//     'maxlength' => 20,
// ]);
// xpresentationLayer::buildInputNumberGrid([
//     'title' => 'Tarjeta de débito Prepagada',
//     'name' => 'debitcardnumber',
//     'maxlength' => 20,
// ]);

// Cuando nuestro usuario sea party podra registrar documentos
if ($_SESSION['idparty']) {
    xpresentationLayer::buildTitleBar("DOCUMENTOS REQUERIDOS", "grid-item-2", "trad_documentos_requeridos");
    $data_json = $serviceCall->mgetcompliancedoctypel();
    xpresentationLayer::buildSelectJson([
        'id' => 'typeDocWallet',
        'name' => 'typeDocWallet',
    ], $data_json);
    xpresentationLayer::buildInputFileDoc("fileInputWallet", "hidden", "file");
}
?>
<p class="grid-item-2 text-center mb0 mt0"><b class="js-translate" data-string="trad_alias">Alias</b>: <?php echo $_SESSION['alias']; ?></p>
<p class="grid-item-2 text-center mb0 mt0"><b class="js-translate" data-string="trad_movil">Movil</b>: <?php echo '+' . $_SESSION['countrycode'] . ' ' . $_SESSION['areacode'] . ' ' . $_SESSION['phonenumber']; ?></p>
<p class="grid-item-2 text-center mb0 mt0"><b class="js-translate" data-string="trad_email">Email</b>: <?php echo $_SESSION['email']; ?></p>
<?php


xpresentationLayer::buildButtonCenter("Aceptar", "", "", "btn btn-primary", "grid-item-2", "trad_aceptar");

xpresentationLayer::endSection();
xpresentationLayer::endForm();
xpresentationLayer::endMain();

include './modals/loader.php';
include './modals/modalSuccess.php';
include './modals/modalWrong.php';
include './modals/modalInactividad.php';
include './modals/modalFirma.php';
include './modals/modalQR.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
