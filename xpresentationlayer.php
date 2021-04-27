<?php

session_start();

/*==========================================================================  
     Class: xpresentationLayer
     Description: MVC View. XATOXI Helper Methods
     Version: 1.0
     Remarks:
     ========================================================================*/

class xpresentationLayer
{

    /*=======================================================================
    Function: startHtml
    Description: HTML TAG START according to language "lang"
    Parameters: $lang <--
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
    static function startHtml($lang)
    {
        echo '<!DOCTYPE html>';
        echo '<HTML lang="' . $lang . '">';
    } // startHtml

    /*=======================================================================
    Function: endHtml
    Description: HTML TAG END and add the file .js
    Parameters:
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
    static function endHtml()
    {
        echo '</HTML>';
        echo  ' <SCRIPT src="js/jquery.min.js"></SCRIPT>';
        echo  ' <SCRIPT src="js/select2.full.min.js"></SCRIPT>';
        echo  ' <SCRIPT src="js/main.js" language="javascript" type="text/javascript"></SCRIPT>';
        echo  ' <SCRIPT src="js/main2.js" type="module"></SCRIPT>';
    } // endHtml


    /*=======================================================================
    Function: buildHead2
    Description: HTML Head, rendering "title"
    Parameters: $title <-- name of App
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */

    static function buildHead2($title)
    {
        echo  '<HEAD>';
        echo  ' <TITLE>' . $title . '</TITLE> ';
        echo  ' <META charset="UTF-8"> ';
        echo  ' <META name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/select2.min.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/style.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/animations.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/modal.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/loader.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/helpers.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/buttons.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/cards.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/inputs.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/titles.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/landing.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/canvas.css"> ';
        echo  ' </HEAD> ';
    } //buildHead

    /*=======================================================================
    Function: buildHead
    Description: HTML Head, rendering "title"
    Parameters: $title <-- name of App
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */

    static function buildHead($title)
    {
        echo  '<HEAD>';
        echo  ' <TITLE>' . $title . '</TITLE> ';
        echo  ' <META charset="UTF-8"> ';
        echo  ' <META name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/select2.min.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/style.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/animations.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/modal.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/loader.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/buttons.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/cards.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/inputs.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/titles.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/canvas.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/helpers.css"> ';

        echo  ' </HEAD> ';
        echo  ' <DIV class="phone-big">';
    } //buildHead

    /*=======================================================================
    Function: buildHeaderXatoxi
    Description: Construye el encabezado de la app xatoxi 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildHeaderXatoxi()
    {
        if (isset($_SESSION['idlead'])) {
            echo '<HEADER class="header">';
            echo '<DIV class="encabezado encabezado-home">';
            echo '    <A href="index.php" style="width: 25%;">';
            echo '    <IMG class="logo" src="img/home.png">';
            echo '    </A>';
            echo '    <IMG class="logo" src="img/logo.png">';
            echo '</DIV>';
            echo '</HEADER>';
        } else {
            echo '<HEADER class="header">';
            echo '  <DIV class="encabezado">';
            echo '    <A href="index.php" style="width: 25%;">';
            echo '  	<IMG class="logo" src="img/logo.png">';
            echo '    </A>';
            echo '  </DIV>';
            echo '</HEADER>';
        }
    } // buildHeaderXatoxi
    /*=======================================================================
    Function: buildHeaderXatoxi
    Description: Construye el encabezado de la app xatoxi 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildHeaderXatoxi44()
    {
        echo '<HEADER class="header">';
        echo '<DIV class="encabezado encabezado-home">';
        echo '    <A href="index.php" style="width: 25%;">';
        echo '    <IMG class="logo" src="img/home.png">';
        echo '    </A>';
        echo '    <IMG class="logo" src="img/logo.png">';
        echo '</DIV>';
        echo '</HEADER>';
    } // buildHeaderXatoxi

    /*=======================================================================
    Function: buildHeaderPrincipalXatoxi
    Description: Construye el encabezado de la app xatoxi 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildHeaderPrincipalXatoxi()
    {
        if (isset($_SESSION['idlead'])) {
            echo '<HEADER class="header">';
            echo '<DIV class="encabezado encabezado-home">';
            echo '    <A href="index.php" style="width: 25%;">';
            echo '    <IMG class="logo" src="img/home.png">';
            echo '    </A>';
            echo '    <IMG class="logo" src="img/logo.png">';
            echo '</DIV>';
            echo '</HEADER>';
        } else {
            echo '<HEADER class="header">';
            echo '  <DIV class="encabezado">';
            echo '    <A href="index.php" style="width: 25%;">';
            echo '  	<IMG class="logo" src="img/logo.png">';
            echo '    </A>';
            echo '  </DIV>';
            echo '</HEADER>';
        }
    } // buildHeaderPrincipalXatoxi
    /*=======================================================================
    Function: buildHeaderPrincipalXatoxitest
    Description: Construye el encabezado de la app xatoxi 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildHeaderPrincipalXatoxitest()
    {
        echo '<HEADER class="header">';
        echo '  <DIV class="encabezado">';
        echo '    <A href="index.php" style="width: 25%;">';
        echo '  	<IMG class="logo" src="img/logo.png">';
        echo '    </A>';
        echo '  </DIV>';
        echo '</HEADER>';
    } // buildHeaderPrincipalXatoxitest

    /*=======================================================================
    Function: startMain
    Description: Empieza tag MAIN 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function startMain($class = "")
    {
        if ($class != "") {
            $class = ' class="wrapper ' . $class . '" ';
        } else {
            $class = ' class="wrapper" ';
        }

        echo '<MAIN ' . $class . '>';
    } // startMain

    /*=======================================================================
    Function: endMain
    Description: Finaliza el tag MAIN
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function endMain()
    {
        echo '</MAIN>';
    } // endMain

    /*=======================================================================
    Function: startFirtsSection
    Description: Start tag SECTION (First Section)
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function startFirtsSection($class = "grid-3", $id = "wrapperButtons")
    {
        echo '<SECTION class="' . $class . '" id="' . $id . '">';
    } //startFirtsSection

    /*=======================================================================
    Function: endSection
    Description: End tag SECTION 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function endSection()
    {
        echo ' </SECTION>';
    } //endSection

    /*=======================================================================
    Function: buildOptionGrid
    Description: Build options in the first section with a limit of 3 and set the $title name
    Parameters: $title <-- Name Option
                $data_id <-- Para relacionar con las opciones de buildOptionsPrincipal
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildOptionGrid($title, $data_id = "")
    {
        echo '    <BUTTON class="card card-a" data-id="' . $data_id . '" >';
        echo $title;
        echo '    </BUTTON>';
    } //buildOptionGrid

    /*=======================================================================
    Function: startSectionTwoColumns
    Description: Start Tag SECTION  (SecondSection) with 2 columns
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function startSectionTwoColumns($class = "", $id = "")
    {
        if ($class != "") {
            $class = ' class="' . $class . '" ';
        } else {
            $class = ' class="grid-2" ';
        }

        if ($id != "") {
            $id = ' id="' . $id . '" ';
        } else {
            $id = ' id="mainMenu" ';
        }

        echo '<SECTION ' . $class . $id . ' >';
    } //startSectionTwoColumns

    /*=======================================================================
    Function: startSection
    Description: Start Tag SECTION  (SecondSection) with 2 columns
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function startSection($class = "", $id = "")
    {
        if ($class != "") {
            $class = ' class="' . $class . '" ';
        }

        if ($id != "") {
            $id = ' id="' . $id . '" ';
        }

        echo '<SECTION ' . $class . $id . ' >';
    } //startSection


    /*=======================================================================
    Function: buildInputNumberGrid
    Description: Build Input number with decimals (2 Columns)
    Parameters: $titleLabel <-- Name label
                $idInput <-- Id Input
                $nameInput <-- Name Input
                $placeholder <-- Message Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildInputNumberGrid($titleLabel, $idInput, $nameInput, $placeholder = "", $onblur = "", $class = "", $maxlength = 35, $idContainer = "", $required = false, $value = "")
    {
        if ($onblur != "") {
            $onblur = ' onBlur="' . $onblur . '" ';
        }
        if ($value != "") {
            $value = ' value="' . $value . '" ';
        }
        if ($required != "") {
            $required = ' required';
        }
        if ($idInput != "") {
            $idInput = ' id="' . $idInput . '" ';
        }
        if ($idContainer != "") {
            $idContainer = 'id="' . $idContainer . '"';
        }
        if ($class != "") {
            $class = ' class="input-field1 ' . $class . '" ';
        } else {
            $class = ' class="input-field1" ';
        }

        if ($maxlength == "") {
            $maxlength = 35;
        }
        $maxlength = ' maxlength="' . $maxlength . '" ';

        echo '<DIV ' . $class . $idContainer . '>';
        echo '    <LABEL class="font-Bold">' . $titleLabel . '</LABEL>';
        echo '	  <INPUT type="text" onkeypress="return validaNumericos(event)" ' . $maxlength . ' name="' . $nameInput . '" ' . $value . $idInput . $required . ' placeholder="' . $placeholder . '" ' . $onblur . '/>';
        echo '</DIV>';
    } //buildInputNumberGrid
    /*=======================================================================
    Function: buildInputsMonthYear
    Description: Build Input number with decimals (2 Columns)
    Parameters: $titleLabel <-- Name label
                $idInput <-- Id Input
                $nameInput <-- Name Input
                $placeholder <-- Message Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildInputsMonthYear($titleLabel = "", $nameMonth = "", $nameYear = "")
    {
        if ($nameMonth != "") {
            $nameMonth = ' name="' . $nameMonth . '" ';
        }
        if ($nameYear != "") {
            $nameYear = ' name="' . $nameYear . '" ';
        }

        echo '<div class="input-field1">';
        echo '<label class="font-Bold ">' . $titleLabel . '</label>';
        echo '<div class="container-input">';
        echo '<div class="input-container mr15">';
        echo '<input class="input" ' . $nameMonth . ' onkeypress="return validaNumericos(event)" type="text" maxlength="2" />';
        echo '<label class="placeholder">Mes</label>';
        echo '</div>';
        echo '<div class="input-container">';
        echo '<input class="input" ' . $nameYear . ' onkeypress="return validaNumericos(event)" type="text" maxlength="4" />';
        echo '<label class="placeholder">Año</label>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } //buildInputsMonthYear

    /*=======================================================================
    Function: buildInputTextGrid
    Description: Input text (2 columns)
    Parameters: $titleLabel <-- Label Name
                $idInput <-- Input Id
                $nameInput <-- Input Nme
                $placeholder <-- Name Show Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildInputTextGrid($titleLabel, $idInput, $nameInput, $placeholder = "", $maxLength = 35, $customClass = "", $classLabel = "", $disabled = "", $classInput = "", $idContainer = "", $required = false, $value = "", $type = "text")
    {
        if ($disabled != "") {
            $disabled = 'disabled="' . $disabled . '"';
        }
        if ($nameInput != "") {
            $nameInput = 'name="' . $nameInput . '"';
        }

        if ($idInput != "") {
            $idInput = 'id="' . $idInput . '"';
        }
        if ($required) {
            $required = 'required';
        }

        if ($value != "") {
            $value = 'value="' . $value . '"';
        }

        if ($idContainer != "") {
            $idContainer = 'id="' . $idContainer . '"';
        }

        if ($classInput != "") {
            $classInput = 'class="' . $classInput . '"';
        }

        if ($maxLength == "") {
            $maxLength = 35;
        }

        echo '<DIV class="input-field1 ' . $customClass . ' " ' . $idContainer . '>';
        echo '       <LABEL class="font-Bold ' . $classLabel . '">' . $titleLabel . '</LABEL>';
        echo '       <INPUT  type="' . $type . '" ' . $value . $disabled . $nameInput . $idInput . $required . ' placeholder="' . $placeholder . '" maxlength="' . $maxLength . '" ' . $classInput . '>';
        echo '</DIV>';
    } //buildInputTextGrid

    /*=======================================================================
    Function: buildInputTextGridCustom
    Description: Input text (2 columns)
    Parameters: $titleLabel <-- Label Name
                $idInput <-- Input Id
                $nameInput <-- Input Nme
                $placeholder <-- Name Show Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildInputTextGridCustom($titleLabel, $idInput, $nameInput, $placeholder = "", $maxLength = 35, $customClass = "", $classLabel = "", $disabled = "", $classInput = "", $textHelp = "")
    {
        if ($disabled != "") {
            $disabled = 'disabled="' . $disabled . '"';
        }

        if ($classInput != "") {
            $classInput = 'class="' . $classInput . '"';
        } else {
            $classInput = 'class="grid-item-no-border"';
        }

        if ($maxLength == "") {
            $maxLength = 35;
        }

        echo '<DIV class="' . $customClass . ' ">';
        echo ' <INPUT ' . $disabled . ' type="text" name="' . $nameInput . '" id="' . $idInput . '" placeholder="' . $placeholder . '" maxlength="' . $maxLength . '" ' . $classInput . '>';
        echo ' <LABEL class="font-Bold ' . $classLabel . '">' . $titleLabel . '</LABEL>';

        if ($textHelp != "") {
            echo '<span class="helper-text" data-error="wrong" data-success="right">' . $textHelp . '</span>';
        }

        echo '</DIV>';
    } //buildInputTextGridCustom
    /*=======================================================================
    Function: buildInputTextGridCustom2
    Description: Input text (2 columns)
    Parameters: $titleLabel <-- Label Name
                $idInput <-- Input Id
                $nameInput <-- Input Nme
                $placeholder <-- Name Show Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildInputTextGridCustom2($titleLabel, $idInput, $nameInput, $placeholder = "", $maxLength = 35, $customClass = "", $classLabel = "", $disabled = "", $classInput = "", $textHelp = "")
    {
        if ($disabled != "") {
            $disabled = 'disabled="' . $disabled . '"';
        }

        if ($classInput != "") {
            $classInput = 'class="' . $classInput . '"';
        } else {
            $classInput = 'class="grid-item-no-border"';
        }

        if ($maxLength == "") {
            $maxLength = 35;
        }

        echo '<DIV class="' . $customClass . ' ">';
        echo ' <LABEL class="font-Bold ' . $classLabel . '">' . $titleLabel . '</LABEL>';
        echo ' <INPUT ' . $disabled . ' type="text" name="' . $nameInput . '" id="' . $idInput . '" placeholder="' . $placeholder . '" maxlength="' . $maxLength . '" ' . $classInput . '>';
        if ($textHelp != "") {
            echo '<span class="helper-text" data-error="wrong" data-success="right">' . $textHelp . '</span>';
        }


        echo '</DIV>';
    } //buildInputTextGridCustom2

    /*=======================================================================
    Function: buildSelectJson
    Description: Build Select with Jason 
    Parameters: $title <-- Contiene el titulo del objeto		
                $name <-- Contiele el nombre del objeto html
                $id  <-- Contiele el id del objeto html
                $json <-- Contiele los datos en formato json				
                $showCol <-- Valor de la columna a mostrar de la BD
                $event <--
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 14:00
    ===================================================================== */
    static function buildSelectJson($title, $name, $id, $json, $showCol = "", $event = "", $classContainer = "", $required = false, $idContainer = "")
    {
        $data = $json->list;

        if ($event != "") {
            $event = 'onchange="' . $event . '"';
        }
        if ($id != "") {
            $id = 'id="' . $id . '"';
        }
        if ($idContainer != "") {
            $idContainer = 'id="' . $idContainer . '"';
        }
        if ($required) {
            $required  = 'required';
        }

        echo '<DIV class="input-field1 ' . $classContainer . '" ' . $idContainer . '>';
        echo '    <LABEL class="font-Bold">' . $title . '</LABEL>';

        echo '<SELECT name="' . $name . '" ' . $id . $event . $required . '>';
        echo '<OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            if ($value->code && $value->name) {
                echo '<OPTION value="' . $value->code . '">' . $value->name . ' </OPTION>';
            } else if ($value->code) {
                echo '<OPTION value="' . $value->code . '">' . $value->code . ' </OPTION>';
            } else {
                if ($name != "currency" && $name != "currencyTransfer" && $name != "currencyWallet" && $name != "currencyCommend") {
                    echo '<OPTION value="' . $value->id . '">' . $value->name . ' </OPTION>';
                } else {
                    echo '<OPTION value="' . $value->id . '">' . $value->iso . ' </OPTION>';
                }
            }
        }
        echo '</SELECT>';
        echo '</DIV>';
    } //buildSelectJson

    /*=======================================================================
    Function: buildSectionPin
    Description: Construye la tercera seccion con el pin
    Parameters:
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 10:12
    ===================================================================== */
    static function buildSectionPin($data = "", $class = "", $otherButton = false)
    {
        if ($data != "")
            $data = ' data-targetping="' . $data . '" ';

        echo '<DIV class="text-center ' . $class . '" >';
        echo '<BUTTON type="submit" class="figure-img ping hidden" ' . $data . '>';
        echo '<IMG src="img/LOCK.png" alt="boton ping" class="img-pin">';
        echo '</BUTTON>';
        if ($otherButton) {
            echo '<A href="#" class="hidden btn btn-primary btn-redirect">';
            echo 'Continuar';
            echo '</A>';
        }
        echo '</DIV>';
    } //buildSectionPin

    /*=======================================================================
    Function: buildFooterXatoxi
    Description: Construye el footer de la aplicacion Xatoxi
    Parameters:
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 10:12
    ===================================================================== */
    static function buildFooterXatoxi()
    {
        echo '<FOOTER class="main-footer">';
        echo '    <H4>¿Tienes dudas? <A target="_blank" title="contacta con Pepin" href="mailto:pepin@italcambio.com">Preguntale a Pepin</A></H4>';
        echo '    <H4>by XATOXI</H4>';
        echo '</FOOTER>';
        echo '</DIV>';
    } //buildFooterXatoxi

    /*=======================================================================
    Function: buildTitleBar
    Description: Build a title bar
    Parameters: $tittle <-- Name Option
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildTitleBar($title, $class = "")
    {
        echo '<DIV class="section-Titles ' . $class . '">';
        echo '    <H2 class="titles">' . $title . '</H2>';
        echo '</DIV>';
    } //buildTitleBar

    /*=======================================================================
    Function: buildSearchUsersWallet
    Description: Build a contact list without option to register a new contact
    Parameters: $name <-- Contiele el nombre del objeto html
                $id  <-- Contiele el id del objeto html
                $json <-- Contiele los datos en formato json				
                $showCol <-- Valor de la columna a mostrar de la BD
                $event <-- 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildSearchUsersWallet($name, $id, $json, $showCol = "", $event = "")
    {
        if ($id != "")
            $id = ' id="' . $id . '" ';

        $data = $json->list;
        echo '<DIV class="input-field1">';
        echo '       <SELECT required name="' . $name . '" ' . $id . ' ' . $event . ' class="">';
        echo '       <OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            echo '<OPTION value="' . $value->id . '">' . $value->name . ' </OPTION>';
        }
        echo '        </SELECT>';
        // echo '        <BUTTON class="btn-contacts"><figure><img src="img/address-book.png" alt=""></figure></BUTTON>';
        // echo '        <BUTTON class="btn-search"><figure><img src="img/search.png" alt=""></figure></BUTTON>';
        echo '</DIV>';
    } //buildSearchUsersWallet

    /*=======================================================================
    Function: buildSearchUsersCommend
    Description: Build a contact list with option to register a new contact
    Parameters: $name <-- Contiele el nombre del objeto html
                $id  <-- Contiele el id del objeto html
                $json <-- Contiele los datos en formato json				
                $showCol <-- Valor de la columna a mostrar de la BD
                $placeholder <-- Define la mascara o titulo informativo del objeto cuando esta en blanco
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildSearchUsersCommend($name, $id, $idButtom, $json, $event = "", $eventAddContact = "", $class = "")
    {
        if ($eventAddContact != "") {
            $eventAddContact = 'onclick="' . $eventAddContact . '"';
        }
        $data = $json->list;
        echo '<DIV class="aside input-field1' . $class . '">';
        echo '       <SELECT name="' . $name . '" id="' . $id . '" ' . $event . ' class="select-width-user">';
        echo '       <OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            echo '<OPTION value="' . $value->id . '" >' . $value->name . ' </OPTION>';
        }
        echo '        </SELECT>';
        echo '    <BUTTON class="btn-contacts " ' . $eventAddContact . ' id="' . $idButtom . '">';
        echo '        <FIGURE><IMG src="img/user-plus.png" alt=""></FIGURE>';
        echo '    </BUTTON>';
        // echo '    <BUTTON class="btn-search btn">';
        // echo '        <FIGURE><IMG src="img/search.png" alt=""></FIGURE>';
        // echo '    </BUTTON>';
        // echo '    <BUTTON class="btn-search btn">';
        // echo '        <FIGURE><IMG src="img/plus-square.png" alt=""></FIGURE>';
        // echo '    </BUTTON>';
        echo '</DIV>';
    } //buildSearchUsersCommend

    /*================== =====================================================
    Function: buildMenuOptionGrid
    Description: Build option with title and image dinamyc
    Parameters: $nameImg <-- Image name
                $titleOption <-- Option name    
                $modal <-- Show modal or no.               
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildMenuOptionGrid($nameImg, $titleOption, $modal, $url)
    {
        $opnModal = "";

        if ($modal == true) {
            $opnModal = "openModal";
        }

        echo '<ARTICLE class="card card-a grid-item ' . $opnModal . '" data-url="' . $url . '">';
        echo '    <ASIDE class="card__aside">';
        echo '        <FIGURE>';
        echo '            <IMG class="imgMenu" src="img/' . $nameImg . '">';
        echo '        </FIGURE>';
        echo '    </ASIDE>';
        echo '    <HEADER class="card__header">';
        echo '         <H3 class="card__title">' . $titleOption . '</H3>';
        echo '    </HEADER>';
        echo '</ARTICLE>';
    } //buildMenuOptionGrid

    /*=======================================================================
    Function: buildMenuOptionComplete
    Description: Build option with title and image dinamyc
    Parameters: $nameImg <-- Image name
                $titleOption <-- Option name    
                $modal <-- Show modal or no.          
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildMenuOptionComplete($nameImg, $titleOption, $modal)
    {
        $opnModal = "";
        if ($modal == true) {
            $opnModal = "openModal";
        }
        echo '<ARTICLE class="grid-item grid-item-2 ' . $opnModal . '">';
        echo '    <FIGURE>';
        echo '        <IMG class="imgMenu" src="img/' . $nameImg . '">';
        echo '    </FIGURE>';
        echo '    <H1>' . $titleOption . '</H1>';
        echo '</ARTICLE>';
    } //buildMenuOptionComplete

    /*=======================================================================
    Function: startSectionTwoColumns
    Description: Start Tag ASIDE  (SecondSection) with 1 column
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 14:00
    ===================================================================== */
    static function startAsideOneColumn($class= "")
    {
        if ($class != "") {
            $class = 'class="' . $class . '"';
        }else {
            $class = 'class="grid-1"';
        }
        echo '<ASIDE '.$class.'>';
    } //startSectionTwoColumns

    /*=======================================================================
    Function: endAside
    Description: end Tag ASIDE 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 14:00
    ===================================================================== */
    static function endAside()
    {
        echo '</ASIDE>';
    } //endAside

    /*=======================================================================
    Function: buildPhoneComplete
    Description: Build section phones witch country phone, area cod and number (Fields Centers)
    Parameters: $titleLabel <- label title
                $nameCountry <- name select country
                $nameArea  <- name select country
                $namePhone <- name phone
                $idCountry <- id select country
                $idArea <- id select country
                $idPhone <- id phone
                $jsonCode <- json for select code country
                $jsonArea <- json for select code area for country
                $event  <- to call a event in the select   
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 12:00
    ===================================================================== */
    static function buildPhoneComplete($titleLabel, $nameCountry, $nameArea, $namePhone, $idCountry, $idArea, $idPhone, $jsonCode, $jsonArea, $event = "", $disabled = "", $classContainer = "", $classChildren = "")
    {

        $data = $jsonCode->list;
        $data2 = $jsonArea->list;

        if ($event != "") {
            $event = 'onchange="' . $event . '"';
        }
        if ($disabled != "") {
            $disabled = 'disabled="' . $disabled . '"';
        }
        echo '<DIV class="input-field1 ' . $classContainer . '">';
        echo '  <LABEL class="font-Bold margin-label">' . $titleLabel . '</LABEL>';
        echo '  <DIV class="flex-content ' . $classChildren . '">';
        echo '    <INPUT type="text" name="' . $nameCountry . '" id="' . $idCountry . '" class="input-radius" ' . $disabled . ' pattern="[0-9]+([\.,][0-9]+)?">';
        // echo '<SELECT name="' . $nameCountry . '" id="' . $idCountry . '" ' . $event . ' class="select-width">';
        // echo '<OPTION disabled selected>Seleccione</OPTION>';
        // foreach ($data as $value) {
        // 	if ($value->internationalphonecode != "58") {
        // 		echo '<OPTION value="' . $value->id . '" >' . $value->internationalphonecode . ' </OPTION>';
        // 	} else {
        // 		echo '<OPTION value="' . $value->id . '" selected>' . $value->internationalphonecode . ' </OPTION>';
        // 	}
        // }
        // echo '</SELECT>';
        echo '<SELECT name="' . $nameArea . '" id="' . $idArea . '" class="select-width">';
        echo '<OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data2 as $value) {
            echo '<OPTION value="' . $value->code . '" >' . $value->code . ' </OPTION>';
        }
        echo '</SELECT>';

        echo '    <INPUT type="text" name="' . $namePhone . '" id="' . $idPhone . '" class="input-radius"  pattern="[0-9]+([\.,][0-9]+)?">';
        echo '  </DIV>';
        echo '</DIV>';
    } //buildPhoneComplete


    /*=======================================================================
    Function: buildpinTemporal
    Description: Bild information of pin temporal, without forgot password and register
    Parameters:            
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 12:00
    ===================================================================== */
    static function buildpinTemporal()
    {
        echo '<P class="resOp"> Usuario creado satisfactoriamente, su PIN de entrada es:</P>';
        echo '<DIV class="centrarObjets">';
        echo '    <P class="font-subtitle">7213</P>';
        echo '    <A href="#close" class="btn"> Continuar </A>';
        echo '</DIV>';
    } //buildpinTemporal

    /*=======================================================================
    Function: startSectionOpt
    Description: Start section for options 
    Parameters:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 10:10
    ===================================================================== */
    static function startSectionOpt($class = "", $id)
    {
        echo '<SECTION class="' . $class . '" id="' . $id . '">';
    } //startSectionOpt

    /*=======================================================================
    Function: startNav
    Description: Start nav
    Parameters:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 10:10
    ===================================================================== */
    static function startNav($class = "", $id = "")
    {
        if ($class != "") {
            $class = 'class="' . $class . '"';
        }
        if ($id != "") {
            $id = 'id="' . $id . '"';
        }

        echo '<nav ' . $class . ' ' . $id . '>';
    } //startSectionOpt

    /*=======================================================================
    Function: endNav
    Description: End nav
    Parameters:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 10:10
    ===================================================================== */
    static function endNav()
    {
        echo '</nav>';
    } //startSectionOpt

    /*=======================================================================
    Function: buildOptionsPrincipal
    Description: Build principal options of the services
    Parameters: $titleOption <-- Option name  
                $data_id <-- Para relacionar con las opciones de buildOptionGrid    
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 10:00
    ===================================================================== */
    static function buildOptionsPrincipal($titleLabel, $data_id = "", $class = "card card-a")
    {
        echo '	<ARTICLE class="' . $class . '" data-id="' . $data_id . '">';
        echo '		<H1>' . $titleLabel . '</H1>';
        echo '	</ARTICLE>';
    } //buildOptionsPrincipal

    /*=======================================================================
    Function: buildNavBtn
    Description:   
    Algorithm:
    Remarks:
    Standarized: 2021/01/20 10:00
    ===================================================================== */
    static function buildNavBtn($title, $data_id = "")
    {
        if ($data_id != "") {
            $data_id = 'data-id="' . $data_id . '"';
        }

        echo '	<BUTTON class="grid-item-Opc grid-item-2" "' . $data_id . '">';
        echo $title;
        echo '	</BUTTON>';
    } //buildNavBtn

    /*=======================================================================
    Function: buildPinPrincipalModal 
    Description: Build Principal Pin Modal, with forgot password and Register options
                  the class "close"   close the modal 
    Parameters: $title <-- Image name
                $limitPass <-- Length limit   
                $minLength <-- Min character (the field turn red if the length is <)
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
    static function buildPinPrincipalModal($title, $limitPass, $minLength, $eventButton = "", $btnId = "")
    {
        if ($btnId != "") {
            $btnId = 'id="' . $btnId . '"';
        }
        if ($eventButton != "") {
            $eventButton = 'onclick="' . $eventButton . '"';
        }

        echo '<H1 class="divpin mt0">' . $title . '</H1>';
        echo '<INPUT type="password" name="pin" id="inputPin" pattern=".{' . $minLength . ',}" maxlength="' . $limitPass . '" class ="passInput">';
        echo '<DIV class="full-center"><LABEL class="label-pin" >TAG</LABEL><INPUT type="password" name="tag" id="inputTag"  pattern=".{24,}" maxlength="40" class="passInput"></DIV>';
        echo '<TABLE class="centrarObjets">';
        echo '    <TBODY>';
        echo '        <TR></TR>';
        echo '        <TR></TR>';
        echo '        <TR></TR>';
        echo '        <TR>';
        echo '            <TD> <input value=" 1 " onclick="numero(\'1\')" type="button" class="botones"></TD>';
        echo '            <TD> <input value=" 2 " onclick="numero(\'2\')" type="button" class="botones"></TD>';
        echo '            <TD> <input value=" 3 " onclick="numero(\'3\')" type="button" class="botones"></TD>';
        echo '        </TR>';
        echo '        <TR>';
        echo '            <TD> <input value=" 4 " onclick="numero(\'4\')" type="button" class="botones"></TD>';
        echo '            <TD> <input value=" 5 " onclick="numero(\'5\')" type="button" class="botones"></TD>';
        echo '            <TD> <input value=" 6 " onclick="numero(\'6\')" type="button" class="botones"></TD>';
        echo '        </TR>';
        echo '        <TR>';
        echo '            <TD> <input value=" 7 " onclick="numero(\'7\')" type="button" class="botones"></TD>';
        echo '            <TD> <input value=" 8 " onclick="numero(\'8\')" type="button" class="botones"></TD>';
        echo '            <TD> <input value=" 9 " onclick="numero(\'9\')" type="button" class="botones"></TD>';
        echo '        </TR>';
        echo '        <TD></TD>';
        echo '        <TD><input value=" 0 " onclick="numero(\'0\')" type="button" class="botones"></TD>';
        echo '        <TD> <input type="image" name="botondeenvio" src="img/iconoborrar.png" class="imgErase" onclick="borradoUltimaCifra()"></TD>';
        echo '        <TD></TD>';
        echo '        </TR>';
        echo '    </TBODY>';
        echo '</TABLE>';
        echo '<DIV style="display: flex;">';
        echo '<BUTTON class="wordsFM" id="openPinChange">Cambio de PIN</BUTTON>';
        echo '<A class="wordsFM" id="btnForgetPin" href="">Olvido de pin</A>';
        echo '</DIV>';
        echo '<DIV class="centrarObjets">';
        echo '    <SPAN id="btnPin" class="btn" ' . $btnId . ' ' . $eventButton . '> Aceptar </SPAN>';
        echo '</DIV>';
        echo '<A class="wordsFM " href="register.php">Registro</A>';
    } //buildPinPrincipalModal

    /*=======================================================================
    Function: startInputModal
    Description: build header  modal
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
    static function startInputModal($customClass = "modalContainer")
    {
        echo '<DIV id="tvesModal" class="' . $customClass . '">';
        echo '   <DIV class="modal-content">';
    } //startInputModal

    /*=======================================================================
    Function: endInputModal
    Description: end header modal
    Parameters:        
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
    static function endInputModal()
    {
        echo '    </DIV>';
        echo '</DIV>';
    } //endInputModal

    /*=======================================================================
    Function: buildHeaderText
    Description: build header with title without logos
    Parameters:      Transacción Satisfactoria
    Algorithm:
    Remarks:
    Standarized: 2021/01/21 10:00
    ===================================================================== */
    static function buildHeaderText($title)
    {
        echo '<HEADER class="header header-text">';
        echo '  <H1 class="titles">' . $title . '</H1>';
        echo '</HEADER>';
    } //buildHeaderText

    /*=======================================================================
    Function: buildSuccessful
    Description: build section message successful
    Parameters: $title <-- 
                $buttonTitle <-- Button Title
    Algorithm:
    Remarks:
    Standarized: 2021/01/26 10:00
    ===================================================================== */
    static function buildSuccessful($title, $buttonTitle)
    {
        echo '<DIV class="centrarObjets">';
        echo '    <FIGURE><IMG src="img/success.png" alt="" class="logo"></FIGURE>';
        echo '    <H1>' . $title . '</H1>';
        echo '    <BUTTON class="btn"> ' . $buttonTitle . '</BUTTON>';
        echo '</DIV>';
    } //buildSuccessful

    /*=======================================================================
    Function: startAnimationMenu
    Description: start the section to animation menu
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function startAnimationMenu()
    {
        echo '<DIV id="wrapper" class="animate animate__fadeOut hidden">';
    } //startAnimationMenu

    /*=======================================================================
    Function: endDiv
    Description: End tag DIV
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function endDiv()
    {
        echo '</DIV>';
    } //endDiv

    /*=======================================================================
    Function: startSectionButtos
    Description: start the section of buttos in X
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function startSectionButtos($class = "mb-20 grid-3", $id = "wrapperButtons")
    {
        echo '<SECTION class="' . $class . '" id="' . $id . '">';
    } //startSectionButtos

    /*=======================================================================
    Function: startSectionButtos
    Description: start the section of buttos in X
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function startContentSection()
    {
        echo '<DIV id="wrapperSections">';
    }

    /*=======================================================================
    Function: buildButtonCenter
    Description: start the section of buttos in X
    Parameters: $title <-- Title of button
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function buildButtonCenter($title, $event = "", $id = "", $class = "btn", $customClass = "")
    {
        if ($event != "") {
            $event = 'onclick="' . $event . '"';
        }

        if ($id != "") {
            $id = 'id="' . $id . '"';
        }

        echo '<DIV class="centrarObjets ' . $customClass . '">';
        echo '    <BUTTON type="submit" class="' . $class . '"  ' . $event . ' ' . $id . '>' . $title . '</BUTTON>';
        echo '</DIV>';
    } //buildButtonCenter

    static function startForm($id = "", $event = "", $class = "")
    {
        if ($event != "") {
            $event = 'onsubmit="' . $event . '"';
        }
        if ($class != "") {
            $class = 'class="' . $class . '"';
        }
        if ($id != "") {
            $id = 'id="' . $id . '"';
        }

        echo '<FORM ' . $id . $event . $class . '>';
    }

    /*=======================================================================
    Function: endForm
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function endForm()
    {
        echo '</FORM>';
    } //endForm

    /*=======================================================================
    Function: startContentofOption
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function startContentofOption($data_id = "")
    {
        echo '<DIV data-id="' . $data_id . '" class="hidden">';
    } //startContentofOption


    /*=======================================================================
    Function: buildSectionDocument
    Description: build a section with a small select, input text medium and input type date 
    Parameters:     $labelSelect <- label title of select
                    $labelInputText <- label title of intpu text
                    $labelInputDate <- label title of input date
                    $nameSelect <- name of select
                    $nameInputText <- name of intpu text
                    $nameInputDate <- name of intpu text
                    $idSelect <- id of select
                    $idInputText <- id of intpu text
                    $idInputDate <- id of intpu date
                    $jsonSelect <- json for select
    Algorithm:
    Remarks:
    Standarized: 2021/02/2 10:50
    ===================================================================== */
    static function buildSectionDocument($labelSelect, $labelInputText, $labelInputDate, $nameSelect, $nameInputText, $nameInputDate, $idSelect, $idInputText, $idInputDate, $jsonSelect, $customClass = "")
    {
        $data = $jsonSelect->list;

        echo '<DIV class="grid-3 ' . $customClass . '">';
        echo '    <DIV class="input-field1">';
        echo '        <LABEL  class="font-Bold margin-label">' . $labelSelect . '</LABEL>';
        echo '<SELECT name="' . $nameSelect . '" id="' . $idSelect . '" required>';
        echo '<OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            echo '<OPTION value="' . $value->id . '" >' . $value->name . ' </OPTION>';
        }
        echo '</SELECT>';
        echo '    </DIV>';
        echo '    <DIV class="input-field1">';
        echo '        <LABEL class="font-Bold margin-label">' . $labelInputText . '</LABEL>';
        echo '        <INPUT type="text" name="' . $nameInputText . '" id="' . $idInputText . '" required>';
        echo '    </DIV>';
        echo '    <DIV class="input-field1">';
        echo '        <LABEL class="font-Bold margin-label">' . $labelInputDate . '</LABEL>';
        echo '        <INPUT type="date" name="' . $nameInputDate . '" id="' . $idInputDate . '" required>';
        echo '    </DIV>';
        echo '</DIV>';
    } //buildSectionDocument

    /*=======================================================================
    Function: buildTextArea
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function buildTextArea($titleLabel, $nameInput, $idInput, $placeholder = "", $minLength = "0", $customClass = "", $required = false)
    {
        if ($required) {
            $required = 'required="' . $required . '"';
        }
        if ($idInput) {
            $idInput = 'id="' . $idInput . '"';
        }

        echo '<DIV class="input-field1 ' . $customClass . '">';
        echo '    <LABEL class="font-Bold">' . $titleLabel . '</LABEL>';
        echo '    <TEXTAREA type="text" name="' . $nameInput . '" ' . $idInput . $required . ' placeholder="' . $placeholder . '" minlength="' . $minLength . '" class="input-text-large" cols="40" rows="3"  style="resize: none;"></TEXTAREA>';
        echo '</DIV>';
    } //buildTextArea

    /*=======================================================================
    Function: startContentofOption
    Description: end tag form
    Parameters:      
    Algorithm:
    Remarks:
    Standarized: 2021/01/27 12:00
    ===================================================================== */
    static function buildOtpContent()
    {
        echo '<SECTION class="text-center full-heigh center-height">';
        echo '<HEADER class="mb-20">';
        echo '	<H1 class="font-lg">OTP Verificación</H1>';
        echo '	<P>Presione aceptar, este código expirará en: <SPAN id="contador" class="font-green">00:114</SPAN></P>';
        echo '</HEADER>';
        echo '<ASIDE class="mb-20">';
        echo '	<INPUT type="text" disabled name="otpCode" id="otpCode" class="otpVeri">';
        echo '</ASIDE>';
        echo '<FOOTER>';
        echo '	<BUTTON class="btn btn-semi-rounded" data-id="testing">Aceptar</BUTTON>';
        echo '	<BUTTON class="modal__button btn btn-danger btn-semi-rounded" type="button" aria-label="close modal" data-close>Cancelar</BUTTON>';
        echo '</FOOTER>';
        echo '</SECTION>';
    } //buildTextArea

    /*=======================================================================
    Function: startDivHidden 
    Description: start tag DIV with class hidden
    Parameters:  $id 
    Algorithm:
    Remarks:
    Standarized: 2021/02/20 12:00
    ===================================================================== */
    static function startDivHidden($id, $customClass = "")
    {
        echo '<DIV id =' . $id . ' class="hidden ' . $customClass . '">';
    } //startDivHidden
    /*=======================================================================
	Function: buildInputFileDoc
	Description: Build Input number with decimals (2 Columns)
	Parameters: $titleLabel <-- Name label
				$idInput <-- Id Input
				$nameInput <-- Name Input
				$placeholder <-- Message Field
	Algorithm:
	Remarks:
	Standarized: 2021/01/18 14:00
	===================================================================== */
    static function buildInputFileDoc($idContainer, $classContainer = "", $name)
    {
        if ($idContainer != "") {
            $idContainer = 'id="' . $idContainer . '"';
        }
        if ($name != "") {
            $name = 'name="' . $name . '"';
        }
        if ($classContainer != "") {
            $classContainer = ' class="input-field1 ' . $classContainer . '" ';
        } else {
            $classContainer = ' class="input-field1" ';
        }


        echo '<div ' . $classContainer . $idContainer . '>';
        echo '<input type="file" ' . $name . ' >';
        echo '</div>';
    } //buildInputFileDoc

    /*=======================================================================
	Function: buildInputsDate
	Description: Build Inputs date, month, years
	Parameters: $titleLabel <-- Name label
				$idInput <-- Id Input
				$nameInput <-- Name Input
				$placeholder <-- Message Field
	Algorithm:
	Remarks:
	Standarized: 2021/01/18 14:00
	===================================================================== */
    static function buildInputsDate($nameMonth, $idMonth, $nameYear, $idYear)
    {
        echo '<DIV class="input-field1">';
        echo '	<LABEL class="font-Bold ">Fecha Venc.</LABEL>';
        echo '	<DIV class="container-input">';
        echo '	    <DIV class="col-md-6">';
        echo '	        <DIV class="input-container">';
        echo '	            <INPUT class="input" type="text" name="' . $nameMonth . '" id="' . $idMonth . '" placeholder=" " maxlength="2"/>';
        echo '	            <LABEL class="placeholder">Mes</LABEL>';
        echo '	        </DIV>';
        echo '	    </DIV>';
        echo '	    <DIV class="col-md-6">';
        echo '	        <DIV class="input-container">';
        echo '	            <INPUT class="input" type="text" name="' . $nameYear . '" id="' . $idYear . '" placeholder=" "  maxlength="4"/>';
        echo '	            <LABEL class="placeholder">Año</LABEL>';
        echo '	        </DIV>';
        echo '	    </DIV>';
        echo '	</DIV>';
        echo '</DIV>';
    } //buildInputsDate
} // xpresentationLayer
