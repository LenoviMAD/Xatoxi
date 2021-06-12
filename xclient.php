<?php

class xclient
{

    private $client;
    private $version = "1.2";
    private $url = "https://www.italcontroller.com/italsisdev/includes/rest/SERVER/XATOXI/services.php";
    private $user = "WSITALCAMBIO";
    private $password = "1cc61eb7ae2187eb91f97d1ae5300919";

    private function init($url)
    {
        $this->client = curl_init($url);
        $h1 = "Cache-Control: no-cache";
        $h2 = "Content-Type: application/json";
        curl_setopt($this->client, CURLOPT_HTTPHEADER, array($h1, $h2));
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->client, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($this->client, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->client, CURLOPT_SSL_VERIFYPEER, 0);
    } // init

    private function updateField(&$arr, $field, $val)
    {
        if ($val != "") {
            $arr[$field] = $val;
        }
    } // updateField

    private function bgetproviderl($idcountry = "")
    {
        $this->updateField($getproviderl, "wsuser", $this->user);
        $this->updateField($getproviderl, "version", $this->version);
        $this->updateField($getproviderl, "wspwd", $this->password);
        $this->updateField($getproviderl, "idcountry", $idcountry);
        return $getproviderl;
    } // bgetproviderl



    function mgetproviderl($idcountry)
    {
        $this->init($this->url);
        $getproviderl =  $this->bgetproviderl($idcountry);
        $data["getproviderl"] = $getproviderl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } //mgetproviderl

    private function bgetcountryl()
    {
        $this->updateField($getcountryl, "wsuser", $this->user);
        $this->updateField($getcountryl, "wspwd", $this->password);
        $this->updateField($getcountryl, "version", $this->version);
        return $getcountryl;
    } // bgetcountryl

    function mgetcountryl()
    {
        $this->init($this->url);
        $getcountryl =  $this->bgetcountryl();
        $data["getcountryl"] = $getcountryl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcountryl

    private function baddlead($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted)
    {
        $this->updateField($addlead, "wsuser", $this->user);
        $this->updateField($addlead, "wspwd", $this->password);
        $this->updateField($addlead, "code", $code);
        // $this->updateField($addlead, "name", $name);
        $this->updateField($addlead, "idparty", $idparty);
        $this->updateField($addlead, "email", $email);
        $this->updateField($addlead, "deviceid", $deviceid);
        $this->updateField($addlead, "deviceidalt", $deviceidalt);
        $this->updateField($addlead, "phonenumber", $phoneNumber);
        $this->updateField($addlead, "observation", $observation);
        $this->updateField($addlead, "pin", $pin);
        $this->updateField($addlead, "date", $date);
        $this->updateField($addlead, "pinfirsttime", $pinfirsttime);
        $this->updateField($addlead, "countrycode", $countrycode);
        $this->updateField($addlead, "areacode", $areacode);
        $this->updateField($addlead, "tag", $tag);
        $this->updateField($addlead, "otp", $otp);
        $this->updateField($addlead, "active", $active);
        $this->updateField($addlead, "deleted", $deleted);
        $this->updateField($addlead, "version", $this->version);
        // $this->updateField($addlead, "idlocation", $idlocation);
        return $addlead;
    } // baddlead

    function maddlead($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted)
    {
        $this->init($this->url);
        $addlead =  $this->baddlead($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted);
        $data["addlead"] = $addlead;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // maddlead

    private function baddleadweb($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted)
    {
        $this->updateField($addleadweb, "wsuser", $this->user);
        $this->updateField($addleadweb, "wspwd", $this->password);
        $this->updateField($addleadweb, "code", $code);
        // $this->updateField($addleadweb, "name", $name);
        $this->updateField($addleadweb, "idparty", $idparty);
        $this->updateField($addleadweb, "email", $email);
        $this->updateField($addleadweb, "deviceid", $deviceid);
        $this->updateField($addleadweb, "deviceidalt", $deviceidalt);
        $this->updateField($addleadweb, "phonenumber", $phoneNumber);
        $this->updateField($addleadweb, "observation", $observation);
        $this->updateField($addleadweb, "pin", $pin);
        $this->updateField($addleadweb, "date", $date);
        $this->updateField($addleadweb, "pinfirsttime", $pinfirsttime);
        $this->updateField($addleadweb, "countrycode", $countrycode);
        $this->updateField($addleadweb, "areacode", $areacode);
        $this->updateField($addleadweb, "tag", $tag);
        $this->updateField($addleadweb, "otp", $otp);
        $this->updateField($addleadweb, "active", $active);
        $this->updateField($addleadweb, "deleted", $deleted);
        $this->updateField($addleadweb, "version", $this->version);
        // $this->updateField($addleadweb, "idlocation", $idlocation);
        return $addleadweb;
    } // baddleadweb

    function maddleadweb($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted)
    {
        $this->init($this->url);
        $addleadweb =  $this->baddleadweb($code, $idparty, $email, $deviceid, $deviceidalt, $phoneNumber, $observation, $pin, $date, $pinfirsttime, $countrycode, $areacode, $tag,  $otp, $active, $deleted);
        $data["addleadweb"] = $addleadweb;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // maddleadweb

    private function bgenpin()
    {
        $this->updateField($genpin, "wsuser", $this->user);
        $this->updateField($genpin, "wspwd", $this->password);
        $this->updateField($genpin, "version", $this->version);
        return $genpin;
    } // bgenpin

    function mgenpin()
    {
        $this->init($this->url);
        $genpin =  $this->bgenpin();
        $data["genpin"] = $genpin;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgenpin


    private function bgenotp($idlead)
    {
        $this->updateField($genotp, "wsuser", $this->user);
        $this->updateField($genotp, "wspwd", $this->password);
        $this->updateField($genotp, "idlead", $idlead);
        $this->updateField($genotp, "version", $this->version);
        return $genotp;
    } // bgenotp

    function mgenotp($idlead)
    {
        $this->init($this->url);
        $genotp = $this->bgenotp($idlead);
        $data["genotp"] = $genotp;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgenotp

    private function bupdpin($pin, $tag, $newpin)
    {
        $this->updateField($updpin, "wsuser", $this->user);
        $this->updateField($updpin, "wspwd", $this->password);
        $this->updateField($updpin, "pin", $pin);
        $this->updateField($updpin, "version", $this->version);
        $this->updateField($updpin, "newpin", $newpin);
        $this->updateField($updpin, "tag", $tag);
        return $updpin;
    } // bupdpin

    function mupdpin($pin, $tag, $newpin)
    {
        $this->init($this->url);
        $updpin =  $this->bupdpin($pin, $tag, $newpin);
        $data["updpin"] = $updpin;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mupdpin

    private function bauth($name, $phoneNumber, $pin, $tag)
    {
        $this->updateField($auth, "wsuser", $this->user);
        $this->updateField($auth, "wspwd", $this->password);
        $this->updateField($auth, "version", $this->version);
        $this->updateField($auth, "name", $name);
        $this->updateField($auth, "phonenumber", $phoneNumber);
        $this->updateField($auth, "pin", $pin);
        $this->updateField($auth, "tag", $tag);
        return $auth;
    } // bauth

    function mauth($name, $phoneNumber, $pin, $tag)
    {
        $this->init($this->url);
        $auth =  $this->bauth($name, $phoneNumber, $pin, $tag);
        $data["auth"] = $auth;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mauth

    private function bgeticccbankl()
    {
        $this->updateField($geticccbankl, "wsuser", $this->user);
        $this->updateField($geticccbankl, "version", $this->version);
        $this->updateField($geticccbankl, "wspwd", $this->password);
        return $geticccbankl;
    } // bgeticccbankl

    function mgeticccbankl()
    {
        $this->init($this->url);
        $geticccbankl =  $this->bgeticccbankl();
        $data["geticccbankl"] = $geticccbankl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgeticccbankl

    private function bcalcsend($idlead, $idProvider, $idCountry, $amount, $idclearencetype)
    {
        $this->updateField($calcsend, "wsuser", $this->user);
        $this->updateField($calcsend, "version", $this->version);
        $this->updateField($calcsend, "wspwd", $this->password);
        $this->updateField($calcsend, "idlead", $idlead);
        $this->updateField($calcsend, "idprovider", $idProvider);
        $this->updateField($calcsend, "idcountry", $idCountry);
        $this->updateField($calcsend, "amount", $amount);
        $this->updateField($calcsend, "idclearencetype", $idclearencetype);
        return $calcsend;
    } // bcalcsend

    function mcalcsend($idlead, $idProvider, $idCountry, $amount, $idclearencetype)
    {
        $this->init($this->url);
        $calcsend =  $this->bcalcsend($idlead, $idProvider, $idCountry, $amount, $idclearencetype);
        $data["calcsend"] = $calcsend;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mcalcsend

    private function bgetcurrencyl()
    {
        $this->updateField($getcurrencyl, "wsuser", $this->user);
        $this->updateField($getcurrencyl, "version", $this->version);
        $this->updateField($getcurrencyl, "wspwd", $this->password);
        return $getcurrencyl;
    } // bgetcurrencyl

    function mgetcurrencyl()
    {
        $this->init($this->url);
        $getcurrencyl =  $this->bgetcurrencyl();
        $data["getcurrencyl"] = $getcurrencyl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcurrencyl

    private function bcalcsell($idlead, $idCurrency, $amount, $idinstrumentdebit, $idclearancetype)
    {
        $this->updateField($calcsell, "wsuser", $this->user);
        $this->updateField($calcsell, "version", $this->version);
        $this->updateField($calcsell, "wspwd", $this->password);
        $this->updateField($calcsell, "idlead", $idlead);
        $this->updateField($calcsell, "idcurrency", $idCurrency);
        $this->updateField($calcsell, "amount", $amount);
        $this->updateField($calcsell, "idinstrumentdebit", $idinstrumentdebit);
        $this->updateField($calcsell, "idclearencetype", $idclearancetype);
        return $calcsell;
    } // bcalcsell

    function mcalcsell($idlead, $idCurrency, $amount, $idinstrumentdebit, $idclearancetype)
    {
        $this->init($this->url);
        $calcsell =  $this->bcalcsell($idlead, $idCurrency, $amount, $idinstrumentdebit, $idclearancetype);
        $data["calcsell"] = $calcsell;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mcalcsell

    private function bcalcbuy($idlead, $idCurrency, $amount, $idinstrumentdebit, $idclearencetype)
    {
        $this->updateField($calcbuy, "wsuser", $this->user);
        $this->updateField($calcbuy, "version", $this->version);
        $this->updateField($calcbuy, "wspwd", $this->password);
        $this->updateField($calcbuy, "idlead", $idlead);
        $this->updateField($calcbuy, "idcurrency", $idCurrency);
        $this->updateField($calcbuy, "amount", $amount);
        $this->updateField($calcbuy, "idinstrumentdebit", $idinstrumentdebit);
        $this->updateField($calcbuy, "idclearencetype", $idclearencetype);
        return $calcbuy;
    } // bcalcbuy

    function mcalcbuy($idlead, $idCurrency, $amount, $idinstrumentdebit, $idclearencetype)
    {
        $this->init($this->url);
        $calcbuy =  $this->bcalcbuy($idlead, $idCurrency, $amount, $idinstrumentdebit, $idclearencetype);
        $data["calcbuy"] = $calcbuy;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mcalcbuy

    private function bgetallcountrydetaill()
    {
        $this->updateField($getallcountrydetaill, "wsuser", $this->user);
        $this->updateField($getallcountrydetaill, "version", $this->version);
        $this->updateField($getallcountrydetaill, "wspwd", $this->password);
        return $getallcountrydetaill;
    } // bgetallcountrydetaill

    function mgetallcountrydetaill()
    {
        $this->init($this->url);
        $getallcountrydetaill =  $this->bgetallcountrydetaill();
        $data["getallcountrydetaill"] = $getallcountrydetaill;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetallcountrydetaill

    private function bgetcellphoneareacodel($countrycode)
    {
        $this->updateField($getcellphoneareacodel, "wsuser", $this->user);
        $this->updateField($getcellphoneareacodel, "version", $this->version);
        $this->updateField($getcellphoneareacodel, "wspwd", $this->password);
        $this->updateField($getcellphoneareacodel, "countrycode", $countrycode);
        return $getcellphoneareacodel;
    } // bgetcellphoneareacodel

    function mgetcellphoneareacodel($countrycode)
    {
        $this->init($this->url);
        $getcellphoneareacodel =  $this->bgetcellphoneareacodel($countrycode);
        $data["getcellphoneareacodel"] = $getcellphoneareacodel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcellphoneareacodel

    private function bfindlead($key)
    {
        $this->updateField($findlead, "wsuser", $this->user);
        $this->updateField($findlead, "version", $this->version);
        $this->updateField($findlead, "wspwd", $this->password);
        $this->updateField($findlead, "key", $key);
        return $findlead;
    } // bfindlead

    function mfindlead($key)
    {
        $this->init($this->url);
        $findlead =  $this->bfindlead($key);
        $data["findlead"] = $findlead;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mfindlead

    private function bsendemail($subject, $to, $header, $body, $footer)
    {
        $this->updateField($sendemail, "wsuser", $this->user);
        $this->updateField($sendemail, "version", $this->version);
        $this->updateField($sendemail, "wspwd", $this->password);
        $this->updateField($sendemail, "subject", $subject);
        $this->updateField($sendemail, "to", $to);
        $this->updateField($sendemail, "header", $header);
        $this->updateField($sendemail, "body", $body);
        $this->updateField($sendemail, "footer", $footer);
        return $sendemail;
    } // bsendemail

    function msendemail($subject, $to, $header, $body, $footer)
    {
        $this->init($this->url);
        $sendemail =  $this->bsendemail($subject, $to, $header, $body, $footer);
        $data["sendemail"] = $sendemail;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // msendemail

    private function bleadtoparty($idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress, $idlocation, $idcountry, $idstate, $idcity, $mpbankcode, $mpbankaccount, $prepaidcardnumber, $debitcardnumber, $idgender, $idcivilstate, $idcountrybirth, $idcountrynationality, $didemissionplace, $didemissiondate, $didexpirationdate)
    {
        $this->updateField($leadtoparty, "wsuser", $this->user);
        $this->updateField($leadtoparty, "version", $this->version);
        $this->updateField($leadtoparty, "wspwd", $this->password);
        $this->updateField($leadtoparty, "idlead", $idlead);
        $this->updateField($leadtoparty, "firstname", $firstname);
        $this->updateField($leadtoparty, "middlename", $middlename);
        $this->updateField($leadtoparty, "lastname", $lastname);
        $this->updateField($leadtoparty, "secondlastname", $secondlastname);
        $this->updateField($leadtoparty, "documentid", $documentid);
        $this->updateField($leadtoparty, "phonecountrycode", $phonecountrycode);
        $this->updateField($leadtoparty, "phoneareacode", $phoneareacode);
        $this->updateField($leadtoparty, "phonenumber", $phonenumber);
        $this->updateField($leadtoparty, "email", $email);
        $this->updateField($leadtoparty, "bankaccount", $bankaccount);
        $this->updateField($leadtoparty, "birthdate", $birthdate);
        $this->updateField($leadtoparty, "fulladdress", $fulladdress);
        $this->updateField($leadtoparty, "idcountry", $idcountry);
        $this->updateField($leadtoparty, "idstate", $idstate);
        $this->updateField($leadtoparty, "idcity", $idcity);
        $this->updateField($leadtoparty, "idlocation", $idlocation);
        $this->updateField($leadtoparty, "mpbankcode", $mpbankcode);
        $this->updateField($leadtoparty, "mpbankaccount", $mpbankaccount);
        // $this->updateField($leadtoparty, "prepaidcardnumber", $prepaidcardnumber);
        // $this->updateField($leadtoparty, "debitcardnumber", $debitcardnumber);
        $this->updateField($leadtoparty, "idgender", $idgender);
        $this->updateField($leadtoparty, "idcivilstate", $idcivilstate);
        $this->updateField($leadtoparty, "idcountrybirth", $idcountrybirth);
        $this->updateField($leadtoparty, "idcountrynationality", $idcountrynationality);
        $this->updateField($leadtoparty, "didemissionplace", $didemissionplace);
        $this->updateField($leadtoparty, "didemissiondate", $didemissiondate);
        $this->updateField($leadtoparty, "didexpirationdate", $didexpirationdate);
        return $leadtoparty;
    } // bleadtoparty

    function mleadtoparty($idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress, $idlocation, $idcountry, $idstate, $idcity, $mpbankcode, $mpbankaccount, $prepaidcardnumber, $debitcardnumber, $idgender, $idcivilstate, $idcountrybirth, $idcountrynationality, $didemissionplace, $didemissiondate, $didexpirationdate)
    {
        $this->init($this->url);
        $leadtoparty =  $this->bleadtoparty($idlead, $firstname, $middlename, $lastname, $secondlastname, $documentid, $phonecountrycode, $phoneareacode, $phonenumber, $email, $bankaccount, $birthdate, $fulladdress, $idlocation, $idcountry, $idstate, $idcity, $mpbankcode, $mpbankaccount, $prepaidcardnumber, $debitcardnumber, $idgender, $idcivilstate, $idcountrybirth, $idcountrynationality, $didemissionplace, $didemissiondate, $didexpirationdate);
        $data["leadtoparty"] = $leadtoparty;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mleadtoparty

    private function bisparty($idlead)
    {
        $this->updateField($isparty, "wsuser", $this->user);
        $this->updateField($isparty, "version", $this->version);
        $this->updateField($isparty, "wspwd", $this->password);
        $this->updateField($isparty, "idlead", $idlead);
        return $isparty;
    } // bisparty

    function misparty($idlead)
    {
        $this->init($this->url);
        $isparty =  $this->bisparty($idlead);
        $data["isparty"] = $isparty;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // misparty

    private function bgetparty($idlead, $idparty)
    {
        $this->updateField($getparty, "wsuser", $this->user);
        $this->updateField($getparty, "version", $this->version);
        $this->updateField($getparty, "wspwd", $this->password);
        $this->updateField($getparty, "idlead", $idlead);
        $this->updateField($getparty, "idparty", $idparty);
        return $getparty;
    } // bgetparty

    function mgetparty($idlead, $idparty)
    {
        $this->init($this->url);
        $getparty =  $this->bgetparty($idlead, $idparty);
        $data["getparty"] = $getparty;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetparty

    private function brecv($idparty, $acc, $key, $addr, $bdate, $idlocation, $idlead, $otp, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount)
    {
        $this->updateField($recv, "wsuser", $this->user);
        $this->updateField($recv, "version", $this->version);
        $this->updateField($recv, "wspwd", $this->password);
        $this->updateField($recv, "idclearencetype", $idclearencetype);

        $this->updateField($recv, "idparty", $idparty);
        $this->updateField($recv, "idlocation", $idlocation);
        $this->updateField($recv, "idlead", $idlead);
        $this->updateField($recv, "acc", $acc);
        $this->updateField($recv, "key", $key);
        $this->updateField($recv, "addr", $addr);
        $this->updateField($recv, "bdate", $bdate);
        $this->updateField($recv, "otp", $otp);

        $this->updateField($recv, "prepaidcardnumber", $prepaidcard);
        $this->updateField($recv, "debitcardnumber", $debitcard);

        $this->updateField($recv, "mpbankcode", $mpbankcode);
        $this->updateField($recv, "mpbankaccount", $mpbankaccount);

        return $recv;
    } // brecv

    function mrecv($idparty, $acc, $key, $addr, $bdate, $idlocation, $idlead, $otp, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount)
    {
        $this->init($this->url);
        $recv =  $this->brecv($idparty, $acc, $key, $addr, $bdate, $idlocation, $idlead, $otp, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount);
        $data["recv"] = $recv;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mrecv

    private function brecvok($idparty, $acc, $key, $addr, $bdate, $idlocation, $idlead, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount)
    {
        $this->updateField($recvok, "wsuser", $this->user);
        $this->updateField($recvok, "version", $this->version);
        $this->updateField($recvok, "wspwd", $this->password);
        $this->updateField($recvok, "idclearencetype", $idclearencetype);

        $this->updateField($recvok, "idparty", $idparty);
        $this->updateField($recvok, "idlocation", $idlocation);
        $this->updateField($recvok, "idlead", $idlead);
        $this->updateField($recvok, "acc", $acc);
        $this->updateField($recvok, "key", $key);
        $this->updateField($recvok, "addr", $addr);
        $this->updateField($recvok, "bdate", $bdate);
        $this->updateField($recvok, "prepaidcardnumber", $prepaidcard);
        $this->updateField($recvok, "debitcardnumber", $debitcard);

        $this->updateField($recvok, "mpbankcode", $mpbankcode);
        $this->updateField($recvok, "mpbankaccount", $mpbankaccount);

        return $recvok;
    } // brecvok

    function mrecvok($idparty, $acc, $key, $addr, $bdate, $idlocation, $idlead, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount)
    {
        $this->init($this->url);
        $recvok =  $this->brecvok($idparty, $acc, $key, $addr, $bdate, $idlocation, $idlead, $idclearencetype, $prepaidcard, $debitcard, $mpbankcode, $mpbankaccount);
        $data["recvok"] = $recvok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mrecvok

    private function bgetclearencetypel()
    {
        $this->updateField($getclearencetypel, "wsuser", $this->user);
        $this->updateField($getclearencetypel, "version", $this->version);
        $this->updateField($getclearencetypel, "wspwd", $this->password);
        return $getclearencetypel;
    } // bgetclearencetypel

    function mgetclearencetypel($arrayExcluyente = array(6, 2, 3, 1, 5))
    {
        $this->init($this->url);
        $getclearencetypel =  $this->bgetclearencetypel();
        $data["getclearencetypel"] = $getclearencetypel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);

        //  Devolviendo solo algunos metodos de pago TEMPORALMENTE
        // Retorna siempre que el número entero sea impar
        $filterMethods = array_filter($result->list, function ($var) use ($arrayExcluyente) {
            if (in_array($var->id, $arrayExcluyente)) {
                return $var;
            }
        });

        // Seteando los nuevos metodos
        $result->list = $filterMethods;
        return ($result);
    } // mgetclearencetypel


    private function bgetremitancetypel($idprovider)
    {
        $this->updateField($getremitancetypel, "wsuser", $this->user);
        $this->updateField($getremitancetypel, "version", $this->version);
        $this->updateField($getremitancetypel, "wspwd", $this->password);
        $this->updateField($getremitancetypel, "idprovider", $idprovider);
        return $getremitancetypel;
    } // bgetremitancetypel

    function mgetremitancetypel($idprovider)
    {
        $this->init($this->url);
        $getremitancetypel =  $this->bgetremitancetypel($idprovider);
        $data["getremitancetypel"] = $getremitancetypel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetremitancetypel

    private function bgetcurrencyremitancel()
    {
        $this->updateField($getcurrencyremitancel, "wsuser", $this->user);
        $this->updateField($getcurrencyremitancel, "version", $this->version);
        $this->updateField($getcurrencyremitancel, "wspwd", $this->password);
        return $getcurrencyremitancel;
    } // bgetcurrencyremitancel

    function mgetcurrencyremitancel()
    {
        $this->init($this->url);
        $getcurrencyremitancel =  $this->bgetcurrencyremitancel();
        $data["getcurrencyremitancel"] = $getcurrencyremitancel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcurrencyremitancel

    private function bgetdebitinstrumentl()
    {
        $this->updateField($getdebitinstrumentl, "wsuser", $this->user);
        $this->updateField($getdebitinstrumentl, "version", $this->version);
        $this->updateField($getdebitinstrumentl, "wspwd", $this->password);
        return $getdebitinstrumentl;
    } // bgetdebitinstrumentl

    function mgetdebitinstrumentl()
    {
        $this->init($this->url);
        $getdebitinstrumentl =  $this->bgetdebitinstrumentl();
        $data["getdebitinstrumentl"] = $getdebitinstrumentl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetdebitinstrumentl

    private function bgetlocationl()
    {
        $this->updateField($getlocationl, "wsuser", $this->user);
        $this->updateField($getlocationl, "version", $this->version);
        $this->updateField($getlocationl, "wspwd", $this->password);
        return $getlocationl;
    } // bgetlocationl

    function mgetlocationl()
    {
        $this->init($this->url);
        $getlocationl =  $this->bgetlocationl();
        $data["getlocationl"] = $getlocationl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetlocationl

    private function bgetiddocumenttypel()
    {
        $this->updateField($getiddocumenttypel, "wsuser", $this->user);
        $this->updateField($getiddocumenttypel, "version", $this->version);
        $this->updateField($getiddocumenttypel, "wspwd", $this->password);
        return $getiddocumenttypel;
    } // bgetiddocumenttypel

    function mgetiddocumenttypel()
    {
        $this->init($this->url);
        $getiddocumenttypel =  $this->bgetiddocumenttypel();
        $data["getiddocumenttypel"] = $getiddocumenttypel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetiddocumenttypel

    private function bendpoint()
    {
        $this->updateField($endpoint, "wsuser", $this->user);
        $this->updateField($endpoint, "version", $this->version);
        $this->updateField($endpoint, "wspwd", $this->password);
        return $endpoint;
    } // bendpoint

    function mendpoint()
    {
        $this->init($this->url);
        $endpoint =  $this->bendpoint();
        $data["endpoint"] = $endpoint;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mendpoint

    private function bresetpin($tag, $email)
    {
        $this->updateField($resetpin, "wsuser", $this->user);
        $this->updateField($resetpin, "version", $this->version);
        $this->updateField($resetpin, "wspwd", $this->password);
        $this->updateField($resetpin, "tag", $tag);
        $this->updateField($resetpin, "email", $email);
        return $resetpin;
    } // bresetpin

    function mresetpin($tag, $email)
    {
        $this->init($this->url);
        $resetpin =  $this->bresetpin($tag, $email);
        $data["resetpin"] = $resetpin;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mresetpin

    private function bgetinstrumentsrcl()
    {
        $this->updateField($getinstrumentsrcl, "wsuser", $this->user);
        $this->updateField($getinstrumentsrcl, "version", $this->version);
        $this->updateField($getinstrumentsrcl, "wspwd", $this->password);
        return $getinstrumentsrcl;
    } // bgetinstrumentsrcl

    function mgetinstrumentsrcl()
    {
        $this->init($this->url);
        $getinstrumentsrcl =  $this->bgetinstrumentsrcl();
        $data["getinstrumentsrcl"] = $getinstrumentsrcl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetinstrumentsrcl

    private function bgetcurrencysrcl($idinstrumentsrc)
    {
        $this->updateField($getcurrencysrcl, "wsuser", $this->user);
        $this->updateField($getcurrencysrcl, "version", $this->version);
        $this->updateField($getcurrencysrcl, "wspwd", $this->password);
        $this->updateField($getcurrencysrcl, "idinstrumentsrc", $idinstrumentsrc);
        return $getcurrencysrcl;
    } // bgetcurrencysrcl

    function mgetcurrencysrcl($idinstrumentsrc)
    {
        $this->init($this->url);
        $getcurrencysrcl =  $this->bgetcurrencysrcl($idinstrumentsrc);
        $data["getcurrencysrcl"] = $getcurrencysrcl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcurrencysrcl

    private function bgetinstrumentdstl($idinstrumentsrc, $idcurrencysrc)
    {
        $this->updateField($getinstrumentdstl, "wsuser", $this->user);
        $this->updateField($getinstrumentdstl, "version", $this->version);
        $this->updateField($getinstrumentdstl, "wspwd", $this->password);
        $this->updateField($getinstrumentdstl, "idinstrumentsrc", $idinstrumentsrc);
        $this->updateField($getinstrumentdstl, "idcurrencysrc", $idcurrencysrc);
        return $getinstrumentdstl;
    } // bgetinstrumentdstl

    function mgetinstrumentdstl($idinstrumentsrc, $idcurrencysrc)
    {
        $this->init($this->url);
        $getinstrumentdstl =  $this->bgetinstrumentdstl($idinstrumentsrc, $idcurrencysrc);
        $data["getinstrumentdstl"] = $getinstrumentdstl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetinstrumentdstl

    private function bgetcurrencydstl($idinstrumentsrc, $idcurrencysrc, $idinstrumentdst)
    {
        $this->updateField($getcurrencydstl, "wsuser", $this->user);
        $this->updateField($getcurrencydstl, "version", $this->version);
        $this->updateField($getcurrencydstl, "wspwd", $this->password);
        $this->updateField($getcurrencydstl, "idinstrumentsrc", $idinstrumentsrc);
        $this->updateField($getcurrencydstl, "idcurrencysrc", $idcurrencysrc);
        $this->updateField($getcurrencydstl, "idinstrumentdst", $idinstrumentdst);
        return $getcurrencydstl;
    } // bgetcurrencydstl

    function mgetcurrencydstl($idinstrumentsrc, $idcurrencysrc, $idinstrumentdst)
    {
        $this->init($this->url);
        $getcurrencydstl =  $this->bgetcurrencydstl($idinstrumentsrc, $idcurrencysrc, $idinstrumentdst);
        $data["getcurrencydstl"] = $getcurrencydstl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcurrencydstl

    private function bcalcexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing)
    {
        $this->updateField($calcexchange, "wsuser", $this->user);
        $this->updateField($calcexchange, "version", $this->version);
        $this->updateField($calcexchange, "wspwd", $this->password);
        $this->updateField($calcexchange, "idlead", $idlead);
        $this->updateField($calcexchange, "idinstrumentsrc", $idinstrumentsrc);
        $this->updateField($calcexchange, "idinstrumentdst", $idinstrumentdst);
        $this->updateField($calcexchange, "idcurrencysrc", $idcurrencysrc);
        $this->updateField($calcexchange, "idcurrencydst", $idcurrencydst);
        $this->updateField($calcexchange, "amount", $amount);
        $this->updateField($calcexchange, "bank", $bank);
        $this->updateField($calcexchange, "numref", $numref);
        $this->updateField($calcexchange, "routing", $routing);
        return $calcexchange;
    } // bcalcexchange

    function mcalcexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing)
    {
        $this->init($this->url);
        $calcexchange =  $this->bcalcexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing);
        $data["calcexchange"] = $calcexchange;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mcalcexchange

    private function bexecexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing, $otp)
    {
        $this->updateField($execexchange, "wsuser", $this->user);
        $this->updateField($execexchange, "version", $this->version);
        $this->updateField($execexchange, "wspwd", $this->password);
        $this->updateField($execexchange, "idlead", $idlead);
        $this->updateField($execexchange, "idinstrumentsrc", $idinstrumentsrc);
        $this->updateField($execexchange, "idinstrumentdst", $idinstrumentdst);
        $this->updateField($execexchange, "idcurrencysrc", $idcurrencysrc);
        $this->updateField($execexchange, "idcurrencydst", $idcurrencydst);
        $this->updateField($execexchange, "amount", $amount);
        $this->updateField($execexchange, "bank", $bank);
        $this->updateField($execexchange, "numref", $numref);
        $this->updateField($execexchange, "routing", $routing);
        $this->updateField($execexchange, "otp", $otp);
        return $execexchange;
    } // bexecexchange

    function mexecexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing, $otp)
    {
        $this->init($this->url);
        $execexchange =  $this->bexecexchange($idlead, $idinstrumentsrc, $idinstrumentdst, $idcurrencysrc, $idcurrencydst, $amount, $bank, $numref, $routing, $otp);
        $data["execexchange"] = $execexchange;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecexchange

    private function bgetcountrystatel($idcountry)
    {
        $this->updateField($getcountrystatel, "wsuser", $this->user);
        $this->updateField($getcountrystatel, "version", $this->version);
        $this->updateField($getcountrystatel, "wspwd", $this->password);
        $this->updateField($getcountrystatel, "idcountry", $idcountry);
        return $getcountrystatel;
    } // bgetcountrystatel

    function mgetcountrystatel($idcountry)
    {
        $this->init($this->url);
        $getcountrystatel =  $this->bgetcountrystatel($idcountry);
        $data["getcountrystatel"] = $getcountrystatel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcountrystatel

    private function bgetstatecityl($idcountry)
    {
        $this->updateField($getstatecityl, "wsuser", $this->user);
        $this->updateField($getstatecityl, "version", $this->version);
        $this->updateField($getstatecityl, "wspwd", $this->password);
        $this->updateField($getstatecityl, "idstate", $idcountry);
        return $getstatecityl;
    } // bgetstatecityl

    function mgetstatecityl($idcountry)
    {
        $this->init($this->url);
        $getstatecityl =  $this->bgetstatecityl($idcountry);
        $data["getstatecityl"] = $getstatecityl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetstatecityl

    private function bcalcsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype)
    {
        $this->updateField($calcsendtr, "wsuser", $this->user);
        $this->updateField($calcsendtr, "version", $this->version);
        $this->updateField($calcsendtr, "wspwd", $this->password);
        $this->updateField($calcsendtr, "idlead", $idlead);
        $this->updateField($calcsendtr, "idcountry", $idcountry);
        $this->updateField($calcsendtr, "idcurrency", $idcurrency);
        $this->updateField($calcsendtr, "amount", $amount);
        $this->updateField($calcsendtr, "idclearencetype", $idclearencetype);
        return $calcsendtr;
    } // bcalcsendtr

    function mcalcsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype)
    {
        $this->init($this->url);
        $calcsendtr =  $this->bcalcsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype);
        $data["calcsendtr"] = $calcsendtr;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mcalcsendtr

    private function bgetcurrencytrl()
    {
        $this->updateField($getcurrencytrl, "wsuser", $this->user);
        $this->updateField($getcurrencytrl, "version", $this->version);
        $this->updateField($getcurrencytrl, "wspwd", $this->password);
        return $getcurrencytrl;
    } // bgetcurrencytrl

    function mgetcurrencytrl()
    {
        $this->init($this->url);
        $getcurrencytrl =  $this->bgetcurrencytrl();
        $data["getcurrencytrl"] = $getcurrencytrl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcurrencytrl

    private function bexecsell($idlead, $idcurrency, $amount, $otp, $idinstrumentdebit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumter, $creditcardnumber)
    {
        $this->updateField($execsell, "wsuser", $this->user);
        $this->updateField($execsell, "version", $this->version);
        $this->updateField($execsell, "wspwd", $this->password);
        $this->updateField($execsell, "idcurrency", $idcurrency);
        $this->updateField($execsell, "idlead", $idlead);
        $this->updateField($execsell, "amount", $amount);
        $this->updateField($execsell, "otp", $otp);
        $this->updateField($execsell, "idinstrumentdebit", $idinstrumentdebit);
        $this->updateField($execsell, "idclearencetype", $idclearencetype);
        $this->updateField($execsell, "acc", $acc);
        $this->updateField($execsell, "reference", $reference);
        $this->updateField($execsell, "ccnumber", $ccnumber);
        $this->updateField($execsell, "ccexpyear", $ccexpyear);
        $this->updateField($execsell, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsell, "cccvc", $cccvc);
        $this->updateField($execsell, "cctype", $cctype);
        $this->updateField($execsell, "debitcardnumter", $debitcardnumter);
        $this->updateField($execsell, "creditcardnumber", $creditcardnumber);
        return $execsell;
    } // bexecsell

    function mexecsell($idlead, $idcurrency, $amount, $otp, $idinstrumentdebit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumter, $creditcardnumber)
    {
        $this->init($this->url);
        $execsell =  $this->bexecsell($idlead, $idcurrency, $amount, $otp, $idinstrumentdebit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumter, $creditcardnumber);
        $data["execsell"] = $execsell;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsell
    private function bexecsellok($idlead, $idcurrency, $amount, $idinstrumentdebit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumter, $creditcardnumber)
    {
        $this->updateField($execsellok, "wsuser", $this->user);
        $this->updateField($execsellok, "version", $this->version);
        $this->updateField($execsellok, "wspwd", $this->password);
        $this->updateField($execsellok, "idcurrency", $idcurrency);
        $this->updateField($execsellok, "idlead", $idlead);
        $this->updateField($execsellok, "amount", $amount);
        $this->updateField($execsellok, "idinstrumentdebit", $idinstrumentdebit);
        $this->updateField($execsellok, "idclearencetype", $idclearencetype);
        $this->updateField($execsellok, "acc", $acc);
        $this->updateField($execsellok, "reference", $reference);
        $this->updateField($execsellok, "ccnumber", $ccnumber);
        $this->updateField($execsellok, "ccexpyear", $ccexpyear);
        $this->updateField($execsellok, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsellok, "cccvc", $cccvc);
        $this->updateField($execsellok, "cctype", $cctype);
        $this->updateField($execsellok, "debitcardnumter", $debitcardnumter);
        $this->updateField($execsellok, "creditcardnumber", $creditcardnumber);
        return $execsellok;
    } // bexecsellok

    function mexecsellok($idlead, $idcurrency, $amount, $idinstrumentdebit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumter, $creditcardnumber)
    {
        $this->init($this->url);
        $execsellok =  $this->bexecsellok($idlead, $idcurrency, $amount, $idinstrumentdebit, $idclearencetype, $acc, $reference, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $debitcardnumter, $creditcardnumber);
        $data["execsellok"] = $execsellok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsellok

    private function bexexcbuy($idlead, $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber)
    {
        $this->updateField($exexcbuy, "wsuser", $this->user);
        $this->updateField($exexcbuy, "version", $this->version);
        $this->updateField($exexcbuy, "wspwd", $this->password);
        $this->updateField($exexcbuy, "idcurrency", $idcurrency);
        $this->updateField($exexcbuy, "idlead", $idlead);
        $this->updateField($exexcbuy, "amount", $amount);
        $this->updateField($exexcbuy, "acc", $acc);
        $this->updateField($exexcbuy, "otp", $otp);
        $this->updateField($exexcbuy, "idinstrumentcredit", $idinstrumentcredit);
        $this->updateField($exexcbuy, "idinstrumentdebit", $idinstrumentdebit);
        $this->updateField($exexcbuy, "debitcardnumber", $debitcardnumber);
        $this->updateField($exexcbuy, "ccnumber", $ccnumber);
        $this->updateField($exexcbuy, "ccexpyear", $ccexpyear);
        $this->updateField($exexcbuy, "ccexpmonth", $ccexpmonth);
        $this->updateField($exexcbuy, "cccvc", $cccvc);
        $this->updateField($exexcbuy, "cctype", $cctype);
        $this->updateField($exexcbuy, "mpbankcode", $mpbankcode);
        $this->updateField($exexcbuy, "mpbankaccount", $mpbankaccount);

        return $exexcbuy;
    } // bexexcbuy

    function mexexcbuy($idlead, $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber)
    {
        $this->init($this->url);
        $exexcbuy =  $this->bexexcbuy($idlead, $idcurrency, $amount, $otp, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber);
        $data["execbuy"] = $exexcbuy;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexexcbuy

    private function bexexcbuyok($idlead, $idcurrency, $amount, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber)
    {
        $this->updateField($exexcbuyok, "wsuser", $this->user);
        $this->updateField($exexcbuyok, "version", $this->version);
        $this->updateField($exexcbuyok, "wspwd", $this->password);
        $this->updateField($exexcbuyok, "idcurrency", $idcurrency);
        $this->updateField($exexcbuyok, "idlead", $idlead);
        $this->updateField($exexcbuyok, "amount", $amount);
        $this->updateField($exexcbuyok, "acc", $acc);
        $this->updateField($exexcbuyok, "idinstrumentcredit", $idinstrumentcredit);
        $this->updateField($exexcbuyok, "idinstrumentdebit", $idinstrumentdebit);
        $this->updateField($exexcbuyok, "debitcardnumber", $debitcardnumber);
        $this->updateField($exexcbuyok, "ccnumber", $ccnumber);
        $this->updateField($exexcbuyok, "ccexpyear", $ccexpyear);
        $this->updateField($exexcbuyok, "ccexpmonth", $ccexpmonth);
        $this->updateField($exexcbuyok, "cccvc", $cccvc);
        $this->updateField($exexcbuyok, "cctype", $cctype);
        $this->updateField($exexcbuyok, "mpbankcode", $mpbankcode);
        $this->updateField($exexcbuyok, "mpbankaccount", $mpbankaccount);

        return $exexcbuyok;
    } // bexexcbuyok

    function mexexcbuyok($idlead, $idcurrency, $amount, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber)
    {
        $this->init($this->url);
        $exexcbuyok =  $this->bexexcbuyok($idlead, $idcurrency, $amount, $idinstrumentcredit, $idinstrumentdebit, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $mpbankcode, $mpbankaccount, $acc, $debitcardnumber);
        $data["execbuyok"] = $exexcbuyok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexexcbuyok

    private function bexecsend($idlead, $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype, $otp)
    {
        $this->updateField($execsend, "wsuser", $this->user);
        $this->updateField($execsend, "version", $this->version);
        $this->updateField($execsend, "wspwd", $this->password);
        $this->updateField($execsend, "idlead", $idlead);
        $this->updateField($execsend, "idcountry", $idcountry);
        $this->updateField($execsend, "idprovider", $idprovider);
        $this->updateField($execsend, "amount", $amount);
        $this->updateField($execsend, "idremitancetype", $idremitancetype);
        $this->updateField($execsend, "idcurrency", $idcurrency);
        $this->updateField($execsend, "idclearencetype", $idclearencetype);
        $this->updateField($execsend, "bdocumentid", $bdocumentid);
        $this->updateField($execsend, "bfirstname", $bfirstname);
        $this->updateField($execsend, "bmiddlename", $bmiddlename);
        $this->updateField($execsend, "blastname", $blastname);
        $this->updateField($execsend, "bsecondlastaname", $bsecondlastaname);
        $this->updateField($execsend, "bbank", $bbank);
        $this->updateField($execsend, "bacc", $bacc);

        // Deposito en cuenta y ach
        $this->updateField($execsend, "bank", $bank);
        $this->updateField($execsend, "routing", $routing);
        $this->updateField($execsend, "acc", $acc);
        $this->updateField($execsend, "reference", $reference);

        // Tarjeta de credito
        $this->updateField($execsend, "ccexpyear", $ccexpyear);
        $this->updateField($execsend, "ccnumber", $ccnumber);
        $this->updateField($execsend, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsend, "cccvc", $cccvc);
        $this->updateField($execsend, "cctype", $cctype);
        $this->updateField($execsend, "otp", $otp);
        $this->updateField($execsend, "version", $this->version);

        return $execsend;
    } // bexecsend

    function mexecsend($idlead, $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype, $otp)
    {
        $this->init($this->url);
        $execsend =  $this->bexecsend($idlead, $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype, $otp);
        $data["execsend"] = $execsend;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsend

    private function bexecsendok($idlead, $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype)
    {
        $this->updateField($execsendok, "wsuser", $this->user);
        $this->updateField($execsendok, "version", $this->version);
        $this->updateField($execsendok, "wspwd", $this->password);
        $this->updateField($execsendok, "idlead", $idlead);
        $this->updateField($execsendok, "idcountry", $idcountry);
        $this->updateField($execsendok, "idprovider", $idprovider);
        $this->updateField($execsendok, "amount", $amount);
        $this->updateField($execsendok, "idremitancetype", $idremitancetype);
        $this->updateField($execsendok, "idcurrency", $idcurrency);
        $this->updateField($execsendok, "idclearencetype", $idclearencetype);
        $this->updateField($execsendok, "bdocumentid", $bdocumentid);
        $this->updateField($execsendok, "bfirstname", $bfirstname);
        $this->updateField($execsendok, "bmiddlename", $bmiddlename);
        $this->updateField($execsendok, "blastname", $blastname);
        $this->updateField($execsendok, "bsecondlastaname", $bsecondlastaname);
        $this->updateField($execsendok, "bbank", $bbank);
        $this->updateField($execsendok, "bacc", $bacc);

        // Deposito en cuenta y ach
        $this->updateField($execsendok, "bank", $bank);
        $this->updateField($execsendok, "routing", $routing);
        $this->updateField($execsendok, "acc", $acc);
        $this->updateField($execsendok, "reference", $reference);

        // Tarjeta de credito
        $this->updateField($execsendok, "ccexpyear", $ccexpyear);
        $this->updateField($execsendok, "ccnumber", $ccnumber);
        $this->updateField($execsendok, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsendok, "cccvc", $cccvc);
        $this->updateField($execsendok, "cctype", $cctype);

        return $execsendok;
    } // bexecsendok

    function mexecsendok($idlead, $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype)
    {
        $this->init($this->url);
        $execsendok =  $this->bexecsendok($idlead, $idcountry, $idprovider, $amount, $idremitancetype, $idcurrency, $idclearencetype, $acc, $reference, $bdocumentid, $bfirstname, $bmiddlename, $blastname, $bsecondlastaname, $bbank, $bacc, $bank, $routing, $ccexpyear, $ccnumber, $ccexpmonth, $cccvc, $cctype);
        $data["execsendok"] = $execsendok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsendok

    private function bgetpartyxl()
    {
        $this->updateField($getpartyxl, "wsuser", $this->user);
        $this->updateField($getpartyxl, "version", $this->version);
        $this->updateField($getpartyxl, "wspwd", $this->password);
        return $getpartyxl;
    } // bgetpartyxl

    function mgetpartyxl()
    {
        $this->init($this->url);
        $getpartyxl =  $this->bgetpartyxl();
        $data["getpartyxl"] = $getpartyxl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetpartyxl

    private function bfindpartyx($key)
    {
        $this->updateField($findpartyx, "wsuser", $this->user);
        $this->updateField($findpartyx, "version", $this->version);
        $this->updateField($findpartyx, "wspwd", $this->password);
        $this->updateField($findpartyx, "key", $key);
        return $findpartyx;
    } // bfindpartyx

    function mfindpartyx($key)
    {
        $this->init($this->url);
        $findpartyx =  $this->bfindpartyx($key);
        $data["findpartyx"] = $findpartyx;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mfindpartyx

    private function bgetbankl($idcountry)
    {
        $this->updateField($getbankl, "wsuser", $this->user);
        $this->updateField($getbankl, "version", $this->version);
        $this->updateField($getbankl, "wspwd", $this->password);
        $this->updateField($getbankl, "idcountry", $idcountry);
        return $getbankl;
    } // bgetbankl

    function mgetbankl($idcountry)
    {
        $this->init($this->url);
        $getbankl =  $this->bgetbankl($idcountry);
        $data["getbankl"] = $getbankl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetbankl

    private function bcalcsendw($idlead, $amount, $idcurrency, $idclearencetype)
    {
        $this->updateField($calcsendw, "wsuser", $this->user);
        $this->updateField($calcsendw, "version", $this->version);
        $this->updateField($calcsendw, "wspwd", $this->password);
        $this->updateField($calcsendw, "idlead", $idlead);
        $this->updateField($calcsendw, "amount", $amount);
        $this->updateField($calcsendw, "idcurrency", $idcurrency);
        $this->updateField($calcsendw, "idclearencetype", $idclearencetype);
        return $calcsendw;
    } // bcalcsendw

    function mcalcsendw($idlead, $amount, $idcurrency, $idclearencetype)
    {
        $this->init($this->url);
        $calcsendw =  $this->bcalcsendw($idlead, $amount, $idcurrency, $idclearencetype);
        $data["calcsendw"] = $calcsendw;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mcalcsendw

    private function bexecsendw($idlead, $idleaddst, $amount, $idcurrency, $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference, $otp)
    {
        $this->updateField($execsendw, "wsuser", $this->user);
        $this->updateField($execsendw, "version", $this->version);
        $this->updateField($execsendw, "wspwd", $this->password);
        $this->updateField($execsendw, "idlead", $idlead);
        $this->updateField($execsendw, "idleaddst", $idleaddst);
        $this->updateField($execsendw, "amount", $amount);
        $this->updateField($execsendw, "idcurrency", $idcurrency);
        $this->updateField($execsendw, "idclearencetype", $idclearencetype);

        // Deposito en cuenta y ach
        $this->updateField($execsendw, "bank", $bank);
        $this->updateField($execsendw, "routing", $routing);
        $this->updateField($execsendw, "acc", $account);
        $this->updateField($execsendw, "reference", $reference);

        // Tarjeta de credito
        $this->updateField($execsendw, "ccexpyear", $ccexpyear);
        $this->updateField($execsendw, "ccnumber", $ccnumber);
        $this->updateField($execsendw, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsendw, "cccvc", $cccvc);
        $this->updateField($execsendw, "cctype", $cctype);
        $this->updateField($execsendw, "otp", $otp);
        return $execsendw;
    } // bexecsendw

    function mexecsendw($idlead, $idleaddst, $amount, $idcurrency, $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference, $otp)
    {
        $this->init($this->url);
        $execsendw =  $this->bexecsendw($idlead, $idleaddst, $amount, $idcurrency, $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference, $otp);
        $data["execsendw"] = $execsendw;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsendw

    private function bexecsendwok($idlead, $idleaddst, $amount, $idcurrency, $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference)
    {
        $this->updateField($execsendwok, "wsuser", $this->user);
        $this->updateField($execsendwok, "version", $this->version);
        $this->updateField($execsendwok, "wspwd", $this->password);
        $this->updateField($execsendwok, "idlead", $idlead);
        $this->updateField($execsendwok, "idleaddst", $idleaddst);
        $this->updateField($execsendwok, "amount", $amount);
        $this->updateField($execsendwok, "idcurrency", $idcurrency);
        $this->updateField($execsendwok, "idclearencetype", $idclearencetype);

        // Deposito en cuenta y ach
        $this->updateField($execsendwok, "bank", $bank);
        $this->updateField($execsendwok, "routing", $routing);
        $this->updateField($execsendwok, "acc", $account);
        $this->updateField($execsendwok, "reference", $reference);

        // Tarjeta de credito
        $this->updateField($execsendwok, "ccexpyear", $ccexpyear);
        $this->updateField($execsendwok, "ccnumber", $ccnumber);
        $this->updateField($execsendwok, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsendwok, "cccvc", $cccvc);
        $this->updateField($execsendwok, "cctype", $cctype);
        return $execsendwok;
    } // bexecsendwok

    function mexecsendwok($idlead, $idleaddst, $amount, $idcurrency, $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference)
    {
        $this->init($this->url);
        $execsendwok =  $this->bexecsendwok($idlead, $idleaddst, $amount, $idcurrency, $idclearencetype, $bank, $routing, $account, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $reference);
        $data["execsendwok"] = $execsendwok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsendwok

    private function bexecsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bank, $routing, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $otp)
    {
        $this->updateField($execsendtr, "wsuser", $this->user);
        $this->updateField($execsendtr, "version", $this->version);
        $this->updateField($execsendtr, "wspwd", $this->password);
        $this->updateField($execsendtr, "idlead", $idlead);
        $this->updateField($execsendtr, "idcountry", $idcountry);
        $this->updateField($execsendtr, "idcurrency", $idcurrency);
        $this->updateField($execsendtr, "amount", $amount);
        $this->updateField($execsendtr, "idclearencetype", $idclearencetype);
        $this->updateField($execsendtr, "acc", $acc);
        $this->updateField($execsendtr, "reference", $reference);
        $this->updateField($execsendtr, "bank", $bank);
        $this->updateField($execsendtr, "routing", $routing);
        $this->updateField($execsendtr, "bfirstname", $bfirstname);
        $this->updateField($execsendtr, "bmiddlename", $bmiddlename);
        $this->updateField($execsendtr, "blastname", $blastname);
        $this->updateField($execsendtr, "bsecondlastname", $bsecondlastname);
        $this->updateField($execsendtr, "bdocumentid", $bdocumentid);
        $this->updateField($execsendtr, "baddress", $baddress);
        $this->updateField($execsendtr, "bacc", $bacc);
        $this->updateField($execsendtr, "bbank", $bbank);
        $this->updateField($execsendtr, "bbankcountry", $bbankcountry);
        $this->updateField($execsendtr, "bbankcity", $bbankcity);
        $this->updateField($execsendtr, "bbankaddress", $bbankaddress);
        $this->updateField($execsendtr, "bbankabaswiftiban", $bbankabaswiftiban);
        $this->updateField($execsendtr, "ibacc", $ibacc);
        $this->updateField($execsendtr, "ibbank", $ibbank);
        $this->updateField($execsendtr, "ibbankcountry", $ibbankcountry);
        $this->updateField($execsendtr, "ibbankcity", $ibbankcity);
        $this->updateField($execsendtr, "ibbankaddress", $ibbankaddress);
        $this->updateField($execsendtr, "ibbankabaswiftiban", $ibbankabaswiftiban);
        $this->updateField($execsendtr, "ccnumber", $ccnumber);
        $this->updateField($execsendtr, "ccexpyear", $ccexpyear);
        $this->updateField($execsendtr, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsendtr, "cccvc", $cccvc);
        $this->updateField($execsendtr, "cctype", $cctype);
        $this->updateField($execsendtr, "otp", $otp);

        return $execsendtr;
    } // bexecsendtr

    function mexecsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bank, $routing, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $otp)
    {
        $this->init($this->url);
        $execsendtr =  $this->bexecsendtr($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bank, $routing, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype, $otp);
        $data["execsendtr"] = $execsendtr;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsendtr

    private function bexecsendtrok($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bank, $routing, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype)
    {
        $this->updateField($execsendtrok, "wsuser", $this->user);
        $this->updateField($execsendtrok, "version", $this->version);
        $this->updateField($execsendtrok, "wspwd", $this->password);
        $this->updateField($execsendtrok, "idlead", $idlead);
        $this->updateField($execsendtrok, "idcountry", $idcountry);
        $this->updateField($execsendtrok, "idcurrency", $idcurrency);
        $this->updateField($execsendtrok, "amount", $amount);
        $this->updateField($execsendtrok, "idclearencetype", $idclearencetype);
        $this->updateField($execsendtrok, "acc", $acc);
        $this->updateField($execsendtrok, "bank", $bank);
        $this->updateField($execsendtrok, "routing", $routing);
        $this->updateField($execsendtrok, "reference", $reference);
        $this->updateField($execsendtrok, "bfirstname", $bfirstname);
        $this->updateField($execsendtrok, "bmiddlename", $bmiddlename);
        $this->updateField($execsendtrok, "blastname", $blastname);
        $this->updateField($execsendtrok, "bsecondlastname", $bsecondlastname);
        $this->updateField($execsendtrok, "bdocumentid", $bdocumentid);
        $this->updateField($execsendtrok, "baddress", $baddress);
        $this->updateField($execsendtrok, "bacc", $bacc);
        $this->updateField($execsendtrok, "bbank", $bbank);
        $this->updateField($execsendtrok, "bbankcountry", $bbankcountry);
        $this->updateField($execsendtrok, "bbankcity", $bbankcity);
        $this->updateField($execsendtrok, "bbankaddress", $bbankaddress);
        $this->updateField($execsendtrok, "bbankabaswiftiban", $bbankabaswiftiban);
        $this->updateField($execsendtrok, "ibacc", $ibacc);
        $this->updateField($execsendtrok, "ibbank", $ibbank);
        $this->updateField($execsendtrok, "ibbankcountry", $ibbankcountry);
        $this->updateField($execsendtrok, "ibbankcity", $ibbankcity);
        $this->updateField($execsendtrok, "ibbankaddress", $ibbankaddress);
        $this->updateField($execsendtrok, "ibbankabaswiftiban", $ibbankabaswiftiban);
        $this->updateField($execsendtrok, "ccnumber", $ccnumber);
        $this->updateField($execsendtrok, "ccexpyear", $ccexpyear);
        $this->updateField($execsendtrok, "ccexpmonth", $ccexpmonth);
        $this->updateField($execsendtrok, "cccvc", $cccvc);
        $this->updateField($execsendtrok, "cctype", $cctype);

        return $execsendtrok;
    } // bexecsendtrok

    function mexecsendtrok($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bank, $routing, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype)
    {
        $this->init($this->url);
        $execsendtrok =  $this->bexecsendtrok($idlead, $idcountry, $idcurrency, $amount, $idclearencetype, $acc, $bank, $routing, $reference, $bfirstname, $bmiddlename, $blastname, $bsecondlastname, $bdocumentid, $baddress, $bacc, $bbank, $bbankcountry, $bbankcity, $bbankaddress, $bbankabaswiftiban, $ibacc, $ibbank, $ibbankcountry, $ibbankcity, $ibbankaddress, $ibbankabaswiftiban, $ccnumber, $ccexpyear, $ccexpmonth, $cccvc, $cctype);
        $data["execsendtrok"] = $execsendtrok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mexecsendtrok

    private function bgetcreditinstrumentl()
    {
        $this->updateField($getcreditinstrumentl, "wsuser", $this->user);
        $this->updateField($getcreditinstrumentl, "version", $this->version);
        $this->updateField($getcreditinstrumentl, "wspwd", $this->password);
        return $getcreditinstrumentl;
    } // bgetcreditinstrumentl

    function mgetcreditinstrumentl()
    {
        $this->init($this->url);
        $getcreditinstrumentl = $this->bgetcreditinstrumentl();
        $data["getcreditinstrumentl"] = $getcreditinstrumentl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcreditinstrumentl

    private function bgetpartyexists($idlead, $documentid)
    {
        $this->updateField($getpartyexists, "wsuser", $this->user);
        $this->updateField($getpartyexists, "version", $this->version);
        $this->updateField($getpartyexists, "wspwd", $this->password);
        $this->updateField($getpartyexists, "idlead", $idlead);
        $this->updateField($getpartyexists, "documentid", $documentid);
        return $getpartyexists;
    } // bgetpartyexists

    function mgetpartyexists($idlead, $documentid)
    {
        $this->init($this->url);
        $getpartyexists = $this->bgetpartyexists($idlead, $documentid);
        $data["getpartyexists"] = $getpartyexists;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetpartyexists

    private function bgetcompliancedoctypel()
    {
        $this->updateField($getcompliancedoctypel, "wsuser", $this->user);
        $this->updateField($getcompliancedoctypel, "version", $this->version);
        $this->updateField($getcompliancedoctypel, "wspwd", $this->password);
        return $getcompliancedoctypel;
    } // bgetcompliancedoctypel

    function mgetcompliancedoctypel()
    {
        $this->init($this->url);
        $getcompliancedoctypel = $this->bgetcompliancedoctypel();
        $data["getcompliancedoctypel"] = $getcompliancedoctypel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcompliancedoctypel

    private function bgetlocationvenl()
    {
        $this->updateField($getlocationvenl, "wsuser", $this->user);
        $this->updateField($getlocationvenl, "version", $this->version);
        $this->updateField($getlocationvenl, "wspwd", $this->password);
        return $getlocationvenl;
    } // bgetlocationvenl

    function mgetlocationvenl()
    {
        $this->init($this->url);
        $getlocationvenl =  $this->bgetlocationvenl();
        $data["getlocationvenl"] = $getlocationvenl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetlocationvenl

    private function bgetcreditcardtypel()
    {
        $this->updateField($getcreditcardtypel, "wsuser", $this->user);
        $this->updateField($getcreditcardtypel, "version", $this->version);
        $this->updateField($getcreditcardtypel, "wspwd", $this->password);
        return $getcreditcardtypel;
    } // bgetcreditcardtypel

    function mgetcreditcardtypel()
    {
        $this->init($this->url);
        $getcreditcardtypel =  $this->bgetcreditcardtypel();
        $data["getcreditcardtypel"] = $getcreditcardtypel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcreditcardtypel

    private function bupload($idlead, $idparty, $filename, $encoded, $type)
    {
        $this->updateField($upload, "wsuser", $this->user);
        $this->updateField($upload, "version", $this->version);
        $this->updateField($upload, "wspwd", $this->password);
        $this->updateField($upload, "idlead", $idlead);
        $this->updateField($upload, "idparty", $idparty);
        $this->updateField($upload, "filename", $filename);
        $this->updateField($upload, "encoded", $encoded);
        $this->updateField($upload, "type", $type);
        return $upload;
    } // bupload

    function mupload($idlead, $idparty, $filename, $encoded, $type)
    {
        $this->init($this->url);
        $upload =  $this->bupload($idlead, $idparty, $filename, $encoded, $type);
        $data["upload"] = $upload;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mupload
    private function bgetgenderl()
    {
        $this->updateField($getgenderl, "wsuser", $this->user);
        $this->updateField($getgenderl, "version", $this->version);
        $this->updateField($getgenderl, "wspwd", $this->password);
        return $getgenderl;
    } // bgetgenderl

    function mgetgenderl()
    {
        $this->init($this->url);
        $getgenderl =  $this->bgetgenderl();
        $data["getgenderl"] = $getgenderl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetgenderl
    private function bgetcivilstatel()
    {
        $this->updateField($getcivilstatel, "wsuser", $this->user);
        $this->updateField($getcivilstatel, "version", $this->version);
        $this->updateField($getcivilstatel, "wspwd", $this->password);
        return $getcivilstatel;
    } // bgetcivilstatel

    function mgetcivilstatel()
    {
        $this->init($this->url);
        $getcivilstatel =  $this->bgetcivilstatel();
        $data["getcivilstatel"] = $getcivilstatel;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetcivilstatel

    private function brequestdebitcard($idlead, $otp)
    {
        $this->updateField($requestdebitcard, "wsuser", $this->user);
        $this->updateField($requestdebitcard, "version", $this->version);
        $this->updateField($requestdebitcard, "wspwd", $this->password);
        $this->updateField($requestdebitcard, "idlead", $idlead);
        $this->updateField($requestdebitcard, "otp", $otp);
        return $requestdebitcard;
    } // brequestdebitcard

    function mrequestdebitcard($idlead, $otp)
    {
        $this->init($this->url);
        $requestdebitcard =  $this->brequestdebitcard($idlead, $otp);
        $data["requestdebitcard"] = $requestdebitcard;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mrequestdebitcard
    private function brequestdebitcardok($idlead)
    {
        $this->updateField($requestdebitcardok, "wsuser", $this->user);
        $this->updateField($requestdebitcardok, "version", $this->version);
        $this->updateField($requestdebitcardok, "wspwd", $this->password);
        $this->updateField($requestdebitcardok, "idlead", $idlead);
        return $requestdebitcardok;
    } // brequestdebitcardok

    function mrequestdebitcardok($idlead)
    {
        $this->init($this->url);
        $requestdebitcardok =  $this->brequestdebitcardok($idlead);
        $data["requestdebitcardok"] = $requestdebitcardok;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mrequestdebitcardok

    private function breportl($idlead)
    {
        $this->updateField($reportl, "wsuser", $this->user);
        $this->updateField($reportl, "version", $this->version);
        $this->updateField($reportl, "wspwd", $this->password);
        $this->updateField($reportl, "idlead", $idlead);
        return $reportl;
    } // breportl

    function mreportl($idlead)
    {
        $this->init($this->url);
        $reportl =  $this->breportl($idlead);
        $data["reportl"] = $reportl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mreportl
    private function bgetnotificationl($deviceid)
    {
        $this->updateField($getnotificationl, "wsuser", $this->user);
        $this->updateField($getnotificationl, "version", $this->version);
        $this->updateField($getnotificationl, "wspwd", $this->password);
        $this->updateField($getnotificationl, "deviceid", $deviceid);
        return $getnotificationl;
    } // bgetnotificationl

    function mgetnotificationl($deviceid)
    {
        $this->init($this->url);
        $getnotificationl =  $this->bgetnotificationl($deviceid);
        $data["getnotificationl"] = $getnotificationl;
        $data_string = json_encode($data);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $data_string);
        $response = curl_exec($this->client);
        $result = json_decode($response);
        return ($result);
    } // mgetnotificationl

} // class xclient
