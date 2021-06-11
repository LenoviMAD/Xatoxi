<?php
error_reporting(0);
include_once("xclient.php");
include_once("util.php");
$client = new xclient("");
$util = new Util;
session_start();

//Se llama al servicio para llenar el select hijo
if (isset($_GET["cond"])) {
    if ($_GET["cond"] == "mgetproviderl") {
        $data_json = $client->mgetproviderl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcellphoneareacodel") {
        $data_json = $client->mgetcellphoneareacodel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcurrencysrcl") {
        $data_json = $client->mgetcurrencysrcl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetinstrumentdstl") {
        $data_json = $client->mgetinstrumentdstl($_GET["valor0"], $_GET["valor1"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetcurrencydstl") {
        $data_json = $client->mgetcurrencydstl($_GET["valor0"], $_GET["valor1"], $_GET["valor2"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mgetremitancetypel") {
        $data_json = $client->mgetremitancetypel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "mcalcsend") {
        $data_json = $client->mcalcsend($_SESSION['idlead'], $_GET["valor0"], $_GET["valor1"], $_GET["valor2"], $_GET["valor3"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "getcountrystatel") {
        $data_json = $client->mgetcountrystatel($_GET["valor0"]);
        print_r(json_encode($data_json));
    }

    if ($_GET["cond"] == "getstatecityl") {
        $data_json = $client->mgetstatecityl($_GET["valor0"]);
        print_r(json_encode($data_json));
    }
}

if (isset($_POST["cond"])) {
    if ($_POST["cond"] == "mreportl") {
        $data_json = $client->mreportl($_SESSION['idlead']);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "mgetcellphoneareacodel") {
        $data_json = $client->mgetcellphoneareacodel("238");
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "calcsendw") {
        $data_json = $client->mcalcsendw($_SESSION['idlead'], $_POST['amountWallet'], $_POST['currencyWallet'],$_POST['idclearencetype']);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "resetpin") {
        $tag = $_POST['tag'];
        $email = $_POST['email'];
        // print_r($tag);
        $data_json = $client->mresetpin($tag, $email);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "updpin") {
        $pin = $_POST['pin'];
        $tag = $_POST['tag'];
        $newpin = $_POST['newpin'];

        // print_r($_POST);

        $data_json = $client->mupdpin($pin, $tag, $newpin);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "genotp") {
        $data_json = $client->mgenotp($_SESSION['idlead']);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcsendenvio") {
        $data_json = $client->mcalcsend($_SESSION['idlead'], $_POST["providerCommend"], $_POST["countryCommend"], $_POST["amountCommend"],$_POST["idclearencetype"]);

        print_r(json_encode($data_json));
    }

    // Billetera
    if ($_POST["cond"] == "addEnvio") {
        $idclearencetype = $_POST['paidFormWallet'];
        $bank = $_POST['bankAccountACHWallet'];
        $routing = $_POST['routingACHWallet'];
        $otp = $_POST['otp'];

        // validar cuando sea deposito
        if ($idclearencetype == "3") {
            $account = $_POST['receiveAccount'];
        } else if ($idclearencetype == "6") {
            // validar cuando sea ach
            $account = $_POST['accACHWallet'];
        } else {
            $account = '';
        }

        $reference = $_POST['referenceWalletCuenta'];

        // Tarjeta de credito
        $ccnumber = $_POST['cardNumberWallet'];
        $ccexpyear = $_POST['yearVenWallet'];
        $ccexpmonth = $_POST['monthVenWallet'];
        $cccvc = $_POST['codValWallet'];
        $cctype = isset($_POST['typeCardWallet']) ? $util->testInput($_POST['typeCardWallet']) : "";

        $data_json = $client->mexecsendw($_SESSION['idlead'], $_POST['users'], $_POST['amountWallet'], $_POST['currencyWallet'], $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference, $otp);
        print_r(json_encode($data_json));
    }
    // Billetera
    if ($_POST["cond"] == "addEnviook") {
        $idclearencetype = $_POST['paidFormWallet'];
        $bank = $_POST['bankAccountACHWallet'];
        $routing = $_POST['routingACHWallet'];

        // validar cuando sea deposito
        if ($idclearencetype == "3") {
            $account = $_POST['receiveAccount'];
        } else if ($idclearencetype == "6") {
            // validar cuando sea ach
            $account = $_POST['accACHWallet'];
        } else {
            $account = '';
        }

        $reference = $_POST['referenceWalletCuenta'];

        // Tarjeta de credito
        $ccnumber = $_POST['cardNumberWallet'];
        $ccexpyear = $_POST['yearVenWallet'];
        $ccexpmonth = $_POST['monthVenWallet'];
        $cccvc = $_POST['codValWallet'];
        $cctype = isset($_POST['typeCardWallet']) ? $util->testInput($_POST['typeCardWallet']) : "";

        $data_json = $client->mexecsendwok($_SESSION['idlead'], $_POST['users'], $_POST['amountWallet'], $_POST['currencyWallet'], $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference);
        print_r(json_encode($data_json));
    }

    // Encomienda
    if ($_POST["cond"] == "commendWallet") {
        $idcountry = isset($_POST['countryCommend']) ? $util->testInput($_POST['countryCommend']) : "";
        $idprovider = isset($_POST['providerCommend']) ? $util->testInput($_POST['providerCommend']) : "";
        $amount = isset($_POST['amountCommend']) ? $util->testInput($_POST['amountCommend']) : "";
        $idremitancetype = isset($_POST['sendFormCommend']) ? $util->testInput($_POST['sendFormCommend']) : "";
        $idcurrency = isset($_POST['currencyCommend']) ? $util->testInput($_POST['currencyCommend']) : "";
        $idclearencetype = isset($_POST['paidFormCommend']) ? $util->testInput($_POST['paidFormCommend']) : "";

        $reference = isset($_POST['referenceCommendCuenta']) ? $util->testInput($_POST['referenceCommendCuenta']) : "";
        $otp = $_POST['otp'];

        // validar cuando sea deposito
        if ($_SESSION['paidMethodToChange']) {
            $idclearencetype = $_SESSION['paidMethodToChange'];
            $amount = $_SESSION['amountToChange'];
        } else {
            if ($idclearencetype == "3") {
                $acc = $_POST['receiveAccount'];
            } else if ($idclearencetype == "6") {
                // validar cuando sea ach
                $acc = $_POST['accACHCommend'];
            } else if ($idclearencetype == "1") {
                // validar cuando sea ach
                $reference = $_POST['referenceCommend'];
            } else {
                $acc = '';
            }
        }

        $bank = isset($_POST['bankAccountACHCommend']) ? $util->testInput($_POST['bankAccountACHCommend']) : "";
        $routing = isset($_POST['routingACHCommend']) ? $util->testInput($_POST['routingACHCommend']) : "";

        // Beneficiario
        $bdocumentid = isset($_POST['bdocumentid']) ? $util->testInput($_POST['bdocumentid']) : "";
        $bfirstname = isset($_POST['firstNameCommend']) ? $util->testInput($_POST['firstNameCommend']) : "";
        $bmiddlename = isset($_POST['secondNameCommend']) ? $util->testInput($_POST['secondNameCommend']) : "";
        $blastname = isset($_POST['firstSurnameCommend']) ? $util->testInput($_POST['firstSurnameCommend']) : "";
        $bsecondlastaname = isset($_POST['secondSurnameCommend']) ? $util->testInput($_POST['secondSurnameCommend']) : "";
        $bbank = isset($_POST['bankCommend']) ? $util->testInput($_POST['bankCommend']) : "";
        $bacc = isset($_POST['accountCommend']) ? $util->testInput($_POST['accountCommend']) : "";

        // Tarjeta de credito
        $ccexpyear = $_POST['yearVenCommend'];
        $ccnumber = $_POST['cardNumberCommend'];
        $ccexpmonth = $_POST['monthVenCommend'];
        $cccvc = $_POST['codValCommend'];
        $cctype = isset($_POST['typeCardCommend']) ? $util->testInput($_POST['typeCardCommend']) : "";

        $data_json = $client->mexecsend($_SESSION['idlead'], $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype, $otp);

        // Si el fetch es exitoso borramos las variables de session correspondientes
        if ($data_json->code === "0000") {
            unset($_SESSION['amountToChange']);
            unset($_SESSION['refToChange']);
            unset($_SESSION['paidMethodToChange']);
        }

        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "commendWalletok") {
        $idcountry = isset($_POST['countryCommend']) ? $util->testInput($_POST['countryCommend']) : "";
        $idprovider = isset($_POST['providerCommend']) ? $util->testInput($_POST['providerCommend']) : "";
        $amount = isset($_POST['amountCommend']) ? $util->testInput($_POST['amountCommend']) : "";
        $idremitancetype = isset($_POST['sendFormCommend']) ? $util->testInput($_POST['sendFormCommend']) : "";
        $idcurrency = isset($_POST['currencyCommend']) ? $util->testInput($_POST['currencyCommend']) : "";
        $idclearencetype = isset($_POST['paidFormCommend']) ? $util->testInput($_POST['paidFormCommend']) : "";

        $reference = isset($_POST['referenceCommendCuenta']) ? $util->testInput($_POST['referenceCommendCuenta']) : "";

        // validar cuando sea deposito
        if ($_SESSION['paidMethodToChange']) {
            $idclearencetype = $_SESSION['paidMethodToChange'];
            $amount = $_SESSION['amountToChange'];
        } else {
            if ($idclearencetype == "3") {
                $acc = $_POST['receiveAccount'];
            } else if ($idclearencetype == "6") {
                // validar cuando sea ach
                $acc = $_POST['accACHCommend'];
            } else if ($idclearencetype == "1") {
                // validar cuando sea ach
                $reference = $_POST['referenceCommend'];
            } else {
                $acc = '';
            }
        }

        $bank = isset($_POST['bankAccountACHCommend']) ? $util->testInput($_POST['bankAccountACHCommend']) : "";
        $routing = isset($_POST['routingACHCommend']) ? $util->testInput($_POST['routingACHCommend']) : "";

        // Beneficiario
        $bdocumentid = isset($_POST['bdocumentid']) ? $util->testInput($_POST['bdocumentid']) : "";
        $bfirstname = isset($_POST['firstNameCommend']) ? $util->testInput($_POST['firstNameCommend']) : "";
        $bmiddlename = isset($_POST['secondNameCommend']) ? $util->testInput($_POST['secondNameCommend']) : "";
        $blastname = isset($_POST['firstSurnameCommend']) ? $util->testInput($_POST['firstSurnameCommend']) : "";
        $bsecondlastaname = isset($_POST['secondSurnameCommend']) ? $util->testInput($_POST['secondSurnameCommend']) : "";
        $bbank = isset($_POST['bankCommend']) ? $util->testInput($_POST['bankCommend']) : "";
        $bacc = isset($_POST['accountCommend']) ? $util->testInput($_POST['accountCommend']) : "";

        // Tarjeta de credito
        $ccexpyear = $_POST['yearVenCommend'];
        $ccnumber = $_POST['cardNumberCommend'];
        $ccexpmonth = $_POST['monthVenCommend'];
        $cccvc = $_POST['codValCommend'];
        $cctype = isset($_POST['typeCardCommend']) ? $util->testInput($_POST['typeCardCommend']) : "";

        $data_json = $client->mexecsendok($_SESSION['idlead'], $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype);

        print_r(json_encode($data_json));
    }

    // Transferencia
    if ($_POST["cond"] == "saveTransfer") {
        // $acc = "";
        $idcurrency = $util->testInput($_POST['currencyTransfer']);
        $amount = $util->testInput($_POST['amountTransfer']);
        $idclearencetype = $util->testInput($_POST['paidFormTransfer']);
        // $reference = "";

        $bankACH = isset($_POST['bankAccountMovilTransfer']) ? $util->testInput($_POST['bankAccountMovilTransfer']) : "";
        $routingACH = isset($_POST['routingMovilTransfer']) ? $util->testInput($_POST['routingMovilTransfer']) : "";
        $acc = isset($_POST['receivingAccount']) ? $util->testInput($_POST['receivingAccount']) : $util->testInput($_POST['accMovilTransfer']);
        $reference = isset($_POST['routingMovilTransfer']) ? $util->testInput($_POST['routingMovilTransfer']) : "";
        // validar cuando sea deposito


        // if ($idclearencetype === 3) {
        //     $acc = $util->testInput($_POST['receivingAccount']);
        //     //$receivingAccount = $util->testInput($_POST['receivingAccount']);    
        // } else if ($idclearencetype === 6) {
        //     $acc = $util->testInput($_POST['accMovilTransfer']);
        // }

        $otp = $_POST['otp'];
        //Beneficiario
        $bfirstname = $util->testInput($_POST['firstNameTransfer']);
        $bmiddlename = $util->testInput($_POST['secondNameTransfer']);
        $blastname = $util->testInput($_POST['firstSurnameTransfer']);
        $bsecondlastname = $util->testInput($_POST['secondSurnameTransfer']);
        $bdocumentid = $util->testInput($_POST['bdocumentidTransfer']);
        $bacc = $util->testInput($_POST['accountTransfer']);
        $bbank = $util->testInput($_POST['bankTransfer']);
        $bbankcountry = $util->testInput($_POST['countryBankTransfer']);
        $bbankcity = $util->testInput($_POST['cityBankTransfer']);
        $idcountry = $util->testInput($_POST['countryTransfer']);
        $baddress = $util->testInput($_POST['addressTransfer']);
        // $bemail = $util->testInput($_POST['emailTransfer']);
        // $bphone = $util->testInput($_POST['phoneTransfer']);
        $bbankaddress = $util->testInput($_POST['bankAddressTransfer']);
        $bbankabaswiftiban = $util->testInput($_POST['abaSwiftIban']);
        $ibacc = $util->testInput($_POST['accountTransferIntermediary']);
        $ibbank = $util->testInput($_POST['bankTransferIntermediary']);
        $ibbankcountry = $util->testInput($_POST['countryBankTransferIntermediary']);
        $ibbankcity = $util->testInput($_POST['cityBankTransferIntermediary']);
        $ibbankaddress = $util->testInput($_POST['bankAddressTransferIntermediary']);
        $ibbankabaswiftiban = $util->testInput($_POST['abaSwiftIbanIntermediary']);

        // Tarjeta de credito
        $ccexpyear = $_POST['yearTransfer'];
        $ccnumber = $_POST['numberCardTransfer'];
        $ccexpmonth = $_POST['monthTransfer'];
        $cccvc = $_POST['ValidationCodeCardTransfer'];
        $cctype = isset($_POST['typeCardTransfer']) ? $util->testInput($_POST['typeCardTransfer']) : "";

        $data_json = $client->mexecsendtr($_SESSION['idlead'], $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bankACH, $routingACH, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $otp);
        echo json_encode($data_json);
    }
    if ($_POST["cond"] == "saveTransferok") {
        // $acc = "";
        $idcurrency = $util->testInput($_POST['currencyTransfer']);
        $amount = $util->testInput($_POST['amountTransfer']);
        $idclearencetype = $util->testInput($_POST['paidFormTransfer']);
        // $reference = "";

        $bankACH = isset($_POST['bankAccountMovilTransfer']) ? $util->testInput($_POST['bankAccountMovilTransfer']) : "";
        $routingACH = isset($_POST['routingMovilTransfer']) ? $util->testInput($_POST['routingMovilTransfer']) : "";
        $acc = isset($_POST['receivingAccount']) ? $util->testInput($_POST['receivingAccount']) : $util->testInput($_POST['accMovilTransfer']);
        $reference = isset($_POST['routingMovilTransfer']) ? $util->testInput($_POST['routingMovilTransfer']) : "";
        // validar cuando sea deposito


        // if ($idclearencetype === 3) {
        //     $acc = $util->testInput($_POST['receivingAccount']);
        //     //$receivingAccount = $util->testInput($_POST['receivingAccount']);    
        // } else if ($idclearencetype === 6) {
        //     $acc = $util->testInput($_POST['accMovilTransfer']);
        // }

        //Beneficiario
        $bfirstname = $util->testInput($_POST['firstNameTransfer']);
        $bmiddlename = $util->testInput($_POST['secondNameTransfer']);
        $blastname = $util->testInput($_POST['firstSurnameTransfer']);
        $bsecondlastname = $util->testInput($_POST['secondSurnameTransfer']);
        $bdocumentid = $util->testInput($_POST['bdocumentidTransfer']);
        $bacc = $util->testInput($_POST['accountTransfer']);
        $bbank = $util->testInput($_POST['bankTransfer']);
        $bbankcountry = $util->testInput($_POST['countryBankTransfer']);
        $bbankcity = $util->testInput($_POST['cityBankTransfer']);
        $idcountry = $util->testInput($_POST['countryTransfer']);
        $baddress = $util->testInput($_POST['addressTransfer']);
        // $bemail = $util->testInput($_POST['emailTransfer']);
        // $bphone = $util->testInput($_POST['phoneTransfer']);
        $bbankaddress = $util->testInput($_POST['bankAddressTransfer']);
        $bbankabaswiftiban = $util->testInput($_POST['abaSwiftIban']);
        $ibacc = $util->testInput($_POST['accountTransferIntermediary']);
        $ibbank = $util->testInput($_POST['bankTransferIntermediary']);
        $ibbankcountry = $util->testInput($_POST['countryBankTransferIntermediary']);
        $ibbankcity = $util->testInput($_POST['cityBankTransferIntermediary']);
        $ibbankaddress = $util->testInput($_POST['bankAddressTransferIntermediary']);
        $ibbankabaswiftiban = $util->testInput($_POST['abaSwiftIbanIntermediary']);

        // Tarjeta de credito
        $ccexpyear = $_POST['yearTransfer'];
        $ccnumber = $_POST['numberCardTransfer'];
        $ccexpmonth = $_POST['monthTransfer'];
        $cccvc = $_POST['ValidationCodeCardTransfer'];
        $cctype = isset($_POST['typeCardTransfer']) ? $util->testInput($_POST['typeCardTransfer']) : "";

        $data_json = $client->mexecsendtrok($_SESSION['idlead'], $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bankACH, $routingACH, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype);
        echo json_encode($data_json);
    }

    // Recepcion
    if ($_POST["cond"] == "reception") {
        $idclearencetype = $util->testInput($_POST['formRecepcion']);
        // $acc = $_POST['bankAccount'] != "" ? $util->testInput($_POST['bankAccount']) : $_SESSION['bacc'];
        $acc = $util->testInput($_POST['bankAccount']);
        $key = $util->testInput($_POST['remittances']);
        $addr = $util->testInput($_POST['branchOffices']);
        $otp = $_POST['otp'];

        $prepaidcard = $util->testInput($_POST['prepaidcard']);
        $debitcard = $util->testInput($_POST['debitcardnumber']);

        // Pago movil
        $mpbankcode = $util->testInput($_POST['bancoPagoMovil']);
        $mpbankaccount = $util->testInput($_POST['countrycode']) . "" . $util->testInput($_POST['phone']);

        $idlocation = $util->testInput($_POST['branchOffices']) || $_SESSION['idlocation'];

        $addr = $_SESSION['addr'];
        $bdate = $_SESSION['bdate'];

        $data_json = $client->mrecv($_SESSION['idparty'], $acc, $key, $addr, $bdate, $idlocation, $_SESSION['idlead'], $otp, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "receptionok") {
        $idclearencetype = $util->testInput($_POST['formRecepcion']);
        // $acc = $_POST['bankAccount'] != "" ? $util->testInput($_POST['bankAccount']) : $_SESSION['bacc'];
        $acc = $util->testInput($_POST['bankAccount']);
        $key = $util->testInput($_POST['remittances']);

        $prepaidcard = $util->testInput($_POST['prepaidcard']);
        $debitcard = $util->testInput($_POST['debitcardnumber']);

        // Pago movil
        $mpbankcode = $util->testInput($_POST['bancoPagoMovil']);
        $mpbankaccount = $util->testInput($_POST['countrycode']) . "" . $util->testInput($_POST['phone']);

        // $idlocation = $util->testInput($_POST['branchOffices']) || $_SESSION['idlocation'];
        $idlocation = 2;
        $addr = $_SESSION['addr'];

        $bdate = $_SESSION['bdate'];

        $data_json = $client->mrecvok($_SESSION['idparty'], $acc, $key, $addr, $bdate, $idlocation, $_SESSION['idlead'], $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount);

        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcsend") {
        $idprovider = $_POST["providerCommend"];
        $idcountry = $_POST["countryCommend"];
        $amount = $_POST["amountCommend"];
        $idclearencetype = $_POST["idclearencetype"];

        $data_json = $client->mcalcsend($_SESSION['idlead'], $idprovider, $idcountry, $amount, $idclearencetype);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcsendtr") {
        $data_json = $client->mcalcsendtr($_SESSION['idlead'], $_POST["countryTransfer"], $_POST["currencyTransfer"], $_POST["amountTransfer"], $_POST["idclearencetype"]);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "getcompliancedoctypel") {
        $data_json = $client->mgetcompliancedoctypel();
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcsell") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        $idinstrumentdebit = $_POST["idinstrumentdebit"];
        $idclearencetype = $_POST["idclearencetype"];

        $data_json = $client->mcalcbuy($_SESSION['idlead'], $currency, $amount, $idinstrumentdebit, $idclearencetype);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "execsell") {
        $idcurrency = $_POST["currency"];
        $acc = $_POST["acc"];
        $amount = $_POST["amount"];
        $idinstrumentcredit = $_POST["payForm"];
        $idinstrumentdebit = $_POST["payIn"];
        $otp = $_POST["otp"];
        $debitcardnumber =  $_POST["debitcardnumber"];
        $ccnumber  = $_POST["ccnumber"];
        $ccexpyear = $_POST["ccexpyear"];
        $ccexpmonth = $_POST["ccexpmonth"];
        $cccvc = $_POST["cccvc"];
        $cctype = $_POST["cctype"];
        $mpbankcode = $_POST["bancoPagoMovil"];
        $mpbankaccount = $util->testInput($_POST['countrycode']) . "" . $_POST['codeArea'] . "" . $util->testInput($_POST['phone']);

        $data_json = $client->mexexcbuy($_SESSION['idlead'], $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber);

        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "execsellok") {
        $acc = $_POST["acc"];
        $idcurrency = $_POST["currency"];
        $amount = $_POST["amount"];
        $idinstrumentcredit = $_POST["payForm"];
        $idinstrumentdebit = $_POST["payIn"];

        $debitcardnumber =  $_POST["debitcardnumber"];
        $ccnumber  = $_POST["ccnumber"];
        $ccexpyear = $_POST["ccexpyear"];
        $ccexpmonth = $_POST["ccexpmonth"];
        $cccvc = $_POST["cccvc"];
        $cctype = $_POST["cctype"];
        $mpbankcode = $_POST["bancoPagoMovil"];
        $mpbankaccount = $util->testInput($_POST['countrycode']) . "" . $_POST['codeArea'] . "" . $util->testInput($_POST['phone']);

        $data_json = $client->mexexcbuyok($_SESSION['idlead'], $idcurrency, $amount, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber);

        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcbuy") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        $idinstrumentdebit = $_POST["idinstrumentdebit"];
        $idclearancetype = $_POST["idclearancetype"];

        $data_json = $client->mcalcsell($_SESSION['idlead'], $currency, $amount, $idinstrumentdebit, $idclearancetype);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "execbuy") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        $otp = $_POST["otp"];
        $idinstrumentcredit = $_POST["payForm"];
        $idclearencetype = $_POST["payIn"];
        $acc = $_POST["receiveAccount"];
        $reference = $_POST["referenceCuenta"];
        $ccnumber = $_POST["numberCardCredit"];
        $ccexpyear = $_POST["yearTransfer"];
        $ccexpmonth = $_POST["monthTransfer"];
        $cccvc = $_POST["ValidationCodeCardTransfer"];
        $cctype = $_POST["typeCard"];
        $debitcardnumber = $_POST["numberCardDebit"];
        $creditcardnumber = $_POST["numberCardDebit"];

        $data_json = $client->mexecsell($_SESSION['idlead'], $currency, $amount, $otp, $idinstrumentcredit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumber, $creditcardnumber);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "execbuyok") {
        $currency = $_POST["currency"];
        $amount = $_POST["amount"];
        $idinstrumentcredit = $_POST["payForm"];
        $idclearencetype = $_POST["payIn"];
        $acc = $_POST["receiveAccount"];
        $reference = $_POST["referenceCuenta"];
        $ccnumber = $_POST["numberCardCredit"];
        $ccexpyear = $_POST["yearTransfer"];
        $ccexpmonth = $_POST["monthTransfer"];
        $cccvc = $_POST["ValidationCodeCardTransfer"];
        $cctype = $_POST["typeCard"];
        $debitcardnumber = $_POST["numberCardDebit"];
        $creditcardnumber = $_POST["numberCardDebit"];

        $data_json = $client->mexecsellok($_SESSION['idlead'], $currency, $amount, $idinstrumentcredit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumber, $creditcardnumber);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "calcexchange") {
        $idinstrumentsrc = $_POST["paidMethod"];
        $idinstrumentdst = $_POST["recieveMethod"];
        $idcurrencysrc = $_POST["sendCurrency"];
        $idcurrencydst = $_POST["recieveCurrency"];
        $amount = $_POST["amount"];
        $bank = isset($_POST['bank']) ? $util->testInput($_POST['bank']) : "";
        $numref = isset($_POST['reference']) ? $util->testInput($_POST['reference']) : "";
        $routing = isset($_POST['routing']) ? $util->testInput($_POST['routing']) : "";

        // Si entrega es efectivo || Encomienda || Transferencia
        if ($idinstrumentsrc === "1") {
            $_SESSION['amountToChange'] = $amount;
            $_SESSION['paidMethodToChange'] = $idinstrumentsrc;

            if ($idinstrumentdst === "2") {
                $_SESSION['refToChange'] = "Encomienda";
            } else if ($idinstrumentdst === "4") {
                $_SESSION['refToChange'] = "Transferencia";
            }
        }

        $data_json = $client->mcalcexchange($_SESSION['idlead'], $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "execexchange") {
        $idinstrumentsrc = $_POST["paidMethod"];
        $idinstrumentdst = $_POST["recieveMethod"];
        $idcurrencysrc = $_POST["sendCurrency"];
        $idcurrencydst = $_POST["recieveCurrency"];
        $otp = $_POST["otp"];
        $amount = $_POST["amount"];
        $bank = $_POST['bank'];
        $numref = $_POST['reference'];
        $routing = $_POST['routing'];

        $data_json = $client->mexecexchange($_SESSION['idlead'], $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing, $otp);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "sendEmailPin") {
        $email = $_POST["email"];
        $pin = $_POST["pin"];
        $body = "SU PIN ES " . $pin;

        $data_json = $client->msendemail("email XATOXI", $email, "header", $body, "POWERED BY XATOXI");
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "genpin") {
        $data_json = $client->mgenpin();
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "pinVerification") {
        $pin = $_POST["pin"];
        $res = new stdClass();

        if ($_SESSION['pinveri'] === $pin) {
            $res->message = "Todo ok";
            $res->code = "0000";
            print_r(json_encode($res));
        } else {
            $res->message = "No coinciden los pin";
            $res->code = "6666";
            print_r(json_encode($res));
        }
    }

    if ($_POST["cond"] == "savePin") {
        $pin = $_POST["pin"];
        $_SESSION['pinveri'] = $pin;
    }

    if ($_POST["cond"] == "addlead") {
        $code = "";
        $idparty = "";
        $email = $_POST["email"];
        $deviceid = "22moises22";
        $deviceidalt = "22moises22";
        $phoneNumber = $_POST["phone"];
        $observation = "";
        $pin = "";
        $date  = gmdate('Y/m/d h:i:s');
        $pinfirsttime = "";
        $countrycode = $_POST["country"];
        $areacode = $_POST["codeArea"];
        $tag = "miatagbuenisimo99";
        $otp = "";
        $active = "";
        $deleted = "";

        $data_json = $client->maddlead($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "addleadweb") {
        $code = "";
        $idparty = "";
        $email = $_POST["email"];
        $deviceid = "";
        $deviceidalt = "";
        $phoneNumber = $_POST["phone"];
        $observation = "";
        $pin = "";
        $date  = gmdate('Y/m/d h:i:s');
        $pinfirsttime = "";
        $countrycode = $_POST["country"];
        $areacode = $_POST["codeArea"];
        $tag = "";
        $otp = "";
        $active = "";
        $deleted = "";

        // print_r($_POST);

        $data_json = $client->maddleadweb($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "AuthPin") {
        $pin = $_POST["pin"];
        $tag = $_POST["tag"];

        $data_json = $client->mauth("", "", $pin, $tag);

        // Guardar variables de sesion primera parte
        if ($data_json->code === "0000") {
            $_SESSION['email'] = $data_json->email;
            $_SESSION['idparty'] = $data_json->idparty;
            $_SESSION['idlead'] = $data_json->id;

            $_SESSION['areacode'] = $data_json->areacode;
            $_SESSION['phonenumber'] = $data_json->phonenumber;
            $_SESSION['countrycode'] = $data_json->countrycode;

            $_SESSION['alias'] = $data_json->alias;

            $_SESSION['addr'] = $data_json->addr;
            $_SESSION['bacc'] = $data_json->bacc;
            $_SESSION['bdate'] = $data_json->bdate;

            $_SESSION['idcountry'] = $data_json->idcountry;
            $_SESSION['idcity'] = $data_json->idcity;
            $_SESSION['idstate'] = $data_json->idstate;

            // Por alguna razon mistica aqui se guarda el numero de pagomovil
            $_SESSION['mpbankaccount'] = $data_json->mpbankaccount;
            $_SESSION['mpbankcode'] = $data_json->mpbankcode;
        }

        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "getparty") {
        $data_json = $client->mgetparty($_SESSION['idlead'], $_SESSION['idparty']);

        // Guardar variables de sesion primera parte
        if ($data_json->code === "0000") {
            $_SESSION['idlocation'] = $data_json->idlocation;

            // $_SESSION['debitcardnumber'] = $data_json->debitcardnumber;
            // $_SESSION['prepaidcardnumber'] = $data_json->prepaidcardnumber;
            $_SESSION['debitcardnumber'] = "01021111111111111111";
            $_SESSION['prepaidcardnumber'] = "010222222222222222";
        }

        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "isParty") {
        $data_json = $client->misparty($_SESSION['idparty']);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "leadToParty") {
        $firstname = $_POST["firstName"];
        $middlename = $_POST["secondName"];
        $lastname = $_POST["firstSurname"];
        $secondlastname = $_POST["secondSurname"];
        $documentid = $_POST["documentid"];
        $idlead = $_SESSION["idlead"];
        $phonecountrycode = $_SESSION["countrycode"];
        $phoneareacode = $_SESSION["areacode"];
        $phonenumber = $_SESSION["phonenumber"];
        $email = $_SESSION["email"];
        $idcountry = $_POST["country"];
        $idstate = $_POST["state"];
        $idcity = $_POST["city"];
        $mpbankcode = $_POST["bancoPagoMovil"];
        $mpbankaccount = $_POST["telMovil"];
        $bankaccount = $_POST["bankAccount"];
        $birthdate = $_POST["birthdate"];
        $fulladdress = $_POST["direction"];
        $idlocation = $_POST["preferenceAgency"];
        $prepaidcardnumber = $_POST["prepaidcardnumber"];
        $debitcardnumber = $_POST["debitcardnumber"];

        $idgender = $_POST["idgender"];
        $idcivilstate = $_POST["idcivilstate"];
        $idcountrybirth = $_POST["idcountrybirth"];
        $idcountrynationality = $_POST["idcountrynationality"];
        $didemissionplace = $_POST["didemissionplace"];
        $didemissiondate = $_POST["didemissiondate"];
        $didexpirationdate = $_POST["didexpirationdate"];

        // print_r(json_encode($_POST));

        $data_json = $client->mleadtoparty($idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress, $idlocation, $idcountry, $idstate, $idcity, $mpbankcode, $mpbankaccount, $prepaidcardnumber, $debitcardnumber, $idgender, $idcivilstate, $idcountrybirth, $idcountrynationality, $didemissionplace, $didemissiondate, $didexpirationdate);

        if ($data_json->code === "0000") {
            $_SESSION['idparty'] = $data_json->idparty;
        }

        print_r(json_encode($data_json));
    }

    // subir documento
    if ($_POST["cond"] == "docUpload") {
        $filename = $_POST['filename'];
        $encoded = $_POST['encoded'];
        $type = $_POST['type'];

        $data_json = $client->mupload($_SESSION['idlead'], $_SESSION['idparty'], $filename, $encoded, $type);
        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "getpartyexists") {
        $documentid = $_POST['documentid'];

        // print_r($_POST);
        $data_json = $client->mgetpartyexists($_SESSION['idlead'], $documentid);
        print_r(json_encode($data_json));
    }
    if ($_POST["cond"] == "mrequestdebitcard") {
        $idlead = $_SESSION['idlead'];
        $otp = $_POST['otp'];

        $data_json = $client->mrequestdebitcard($idlead, $otp);

        print_r(json_encode($data_json));
    }

    if ($_POST["cond"] == "session") {
        print_r(json_encode($_SESSION));
    }
}
