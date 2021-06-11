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
        echo  ' <script type="text/javascript" src="js/libs/DataTables/datatables.min.js"></script>';
        echo  ' <SCRIPT src="js/select2.full.min.js"></SCRIPT>';
        echo  ' <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/blazeface"></script>';
        echo  ' <SCRIPT src="js/main.js" language="javascript" type="text/javascript"></SCRIPT>';
        echo  ' <SCRIPT src="js/main2.js" type="module"></SCRIPT>';
    } // endHtml

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
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/dropdowns.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="css/helpers.css"> ';

        echo  ' <LINK rel="stylesheet" type="text/css" href="css/tables.css"> ';
        echo  ' <LINK rel="stylesheet" type="text/css" href="js/libs/DataTables/datatables.min.css"> ';

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
            echo '<div class="dropdown">';
            echo '<button id="btnDropdown" class="dropbtn">';
            echo 'En';
            echo '<div id="flechaAbajo"></div>';
            echo '</button>';
            echo '<div id="dropdownLanguages" class="dropdown-content">';
            echo '<button data-lang="es">Es</button>';
            echo '<button data-lang="en">En</button>';
            echo '</div>';
            echo '</div>';
            echo '</DIV>';
            echo '</HEADER>';
        } else {
            echo '<HEADER class="header">';
            echo '  <DIV class="encabezado">';
            echo '    <A href="index.php" style="width: 25%;">';
            echo '  	<IMG class="logo" src="img/logo.png">';
            echo '    </A>';
            echo '<div class="dropdown">';
            echo '<button id="btnDropdown" class="dropbtn">';
            echo 'En';
            echo '<div id="flechaAbajo"></div>';
            echo '</button>';
            echo '<div id="dropdownLanguages" class="dropdown-content">';
            echo '<button data-lang="es">Es</button>';
            echo '<button data-lang="en">En</button>';
            echo '</div>';
            echo '</div>';
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
        echo '<div class="dropdown">';
        echo '<button id="btnDropdown" class="dropbtn">';
        echo 'En';
        echo '<div id="flechaAbajo"></div>';
        echo '</button>';
        echo '<div id="dropdownLanguages" class="dropdown-content">';
        echo '<button data-lang="es">Es</button>';
        echo '<button data-lang="en">En</button>';
        echo '</div>';
        echo '</div>';
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
        echo '<div class="dropdown">';
        echo '<button id="btnDropdown" class="dropbtn">';
        echo 'En';
        echo '<div id="flechaAbajo"></div>';
        echo '</button>';
        echo '<div id="dropdownLanguages" class="dropdown-content">';
        echo '<button data-lang="es">Es</button>';
        echo '<button data-lang="en">En</button>';
        echo '</div>';
        echo '</div>';
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
    static function buildOptionGrid($title, $data_id = "", $dataString = "")
    {
        echo '    <BUTTON class="card card-b js-translate" data-id="' . $data_id . '" data-string="' . $dataString . '">';
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
    static function buildInputNumberGrid($params)
    {
        $defaults = [
            'title' => '',
            'id' => '',
            'name' => '',
            'placeholder' => '',
            'onblur' => '',
            'class' => '',
            'maxlength' => 35,
            'idContainer' => '',
            'required' => false,
            'value' => '',
            'disabled' => false,
            'dataString' => ''
        ];

        $options = array_merge($defaults, $params);

        if ($options['onblur']) {
            $options['onblur'] = 'onBlur="' . $options['onblur'] . '" ';
        }
        if ($options['dataString']) {
            $options['dataString'] = 'data-string="' . $options['dataString'] . '" ';
        }
        if ($options['value']) {
            $options['value'] = 'value="' . $options['value'] . '" ';
        }
        if ($options['required']) {
            $options['required'] = 'required ';
        }
        if ($options['disabled']) {
            $options['disabled'] = 'disabled ';
        }
        if ($options['id']) {
            $options['id'] = 'id="' . $options['id'] . '" ';
        }
        if ($options['name']) {
            $options['name'] = 'name="' . $options['name'] . '" ';
        }
        if ($options['placeholder']) {
            $options['placeholder'] = 'placeholder="' . $options['placeholder'] . '" ';
        }
        if ($options['idContainer']) {
            $options['idContainer'] = 'id="' . $options['idContainer'] . '" ';
        }
        if ($options['class']) {
            $options['class'] = 'class="input-field1 ' . $options['class'] . '" ';
        } else {
            $options['class'] = 'class="input-field1" ';
        }

        $options['maxlength'] = 'maxlength="' . $options['maxlength'] . '" ';

        echo '<DIV ' . $options['class'] . $options['idContainer'] . '>';
        echo '<LABEL class="font-Bold js-translate" ' . $options['dataString'] . '>' . $options['title'] . '</LABEL>';
        echo '<INPUT type="text" onkeypress="return validaNumericos(event)" ' .
            $options['maxlength'] .
            $options['name'] .
            $options['value'] .
            $options['id'] .
            $options['required'] .
            $options['disabled'] .
            $options['placeholder'] .
            $options['onblur'] . '/>';
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
    static function buildInputsMonthYear($titleLabel = "", $nameMonth = "", $nameYear = "", $dataString="")
    {
        if ($nameMonth != "") {
            $nameMonth = ' name="' . $nameMonth . '" ';
        }
        if ($nameYear != "") {
            $nameYear = ' name="' . $nameYear . '" ';
        }

        echo '<div class="input-field1">';
        echo '<label class="font-Bold js-translate" data-string="'.$dataString.'">' . $titleLabel . '</label>';
        echo '<div class="container-input">';
        echo '<div class="input-container mr15">';
        echo '<input class="input" ' . $nameMonth . ' onkeypress="return validaNumericos(event)" type="text" maxlength="2" />';
        echo '<label class="font-Bold js-translate" data-string="trad_mes">Mes</label>';
        echo '</div>';
        echo '<div class="input-container">';
        echo '<input class="input" ' . $nameYear . ' onkeypress="return validaNumericos(event)" type="text" maxlength="4" />';
        echo '<label class="font-Bold js-translate" data-string="trad_ano">Año</label>';
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
    static function buildInputTextGrid($params)
    {
        $defaults = [
            'title' => '',
            'id' => '',
            'name' => '',
            'placeholder' => '',
            'maxlength' => 35,
            'classContainer' => '',
            'classLabel' => '',
            'disabled' => false,
            'classInput' => '',
            'idContainer' => '',
            'required' => false,
            'value' => '',
            'type' => 'text',
            'dataString' => ''
        ];

        $options = array_merge($defaults, $params);

        if ($options['disabled']) {
            $options['disabled'] = 'disabled ';
        }
        if ($options['required']) {
            $options['required'] = 'required ';
        }
        if ($options['name']) {
            $options['name'] = 'name="' . $options['name'] . '" ';
        }
        if ($options['id']) {
            $options['id'] = 'id="' . $options['id'] . '" ';
        }
        if ($options['value']) {
            $options['value'] = 'value="' . $options['value'] . '" ';
        }
        if ($options['idContainer']) {
            $options['idContainer'] = 'id="' . $options['idContainer'] . '" ';
        }
        if ($options['placeholder']) {
            $options['placeholder'] = 'placeholder="' . $options['placeholder'] . '" ';
        }
        if ($options['classInput']) {
            $options['classInput'] = 'class="' . $options['classInput'] . '" ';
        }
        if ($options['dataString']) {
            $options['dataString'] = 'data-string="' . $options['dataString'] . '" ';
        }
        $options['maxlength']= 'maxlength="' . $options['maxlength'] . '" ';
        $options['type']= 'type="' . $options['type'] . '" ';

        echo '<DIV class="input-field1 ' . $options['classContainer'] . ' " ' . $options['idContainer'] . '>';
        echo '<LABEL ' . $options['dataString'] . ' class="font-Bold js-translate ' . $options['classLabel'] . '">' . $options['title'] . '</LABEL>';
        echo '<INPUT ' 
        . $options['type'] 
        . $options['value'] 
        . $options['disabled'] 
        . $options['name'] 
        . $options['id'] 
        . $options['required'] 
        . $options['placeholder'] 
        . $options['classInput'] 
        . $options['maxlength']
        . '>';
        echo '</DIV>';
    } //buildInputTextGrid

    /*=======================================================================
    Function: buildInputTextGrid2
    Description: Input text (2 columns)
    Parameters: $titleLabel <-- Label Name
                $idInput <-- Input Id
                $nameInput <-- Input Nme
                $placeholder <-- Name Show Field
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 12:00
    ===================================================================== */
    static function buildInputTextGrid2($titleLabel, $idInput, $nameInput, $placeholder = "", $maxLength = 35, $customClass = "", $classLabel = "", $disabled = "", $classInput = "", $idContainer = "", $required = false, $value = "", $type = "text", $dataString = "")
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
        echo '       <LABEL data-string="' . $dataString . '" class="font-Bold js-translate' . $classLabel . '">' . $titleLabel . '</LABEL>';
        echo '       <INPUT  type="' . $type . '" ' . $value . $disabled . $nameInput . $idInput . $required . ' placeholder="' . $placeholder . '" maxlength="' . $maxLength . '" ' . $classInput . '>';
        echo '</DIV>';
    } //buildInputTextGrid2

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
    static function buildSelectJson($params, $json)
    {

        $defaults = [
            'title' => '',
            'id' => '',
            'name' => '',
            'event' => '',
            'classContainer' => '',
            'idContainer' => '',
            'required' => false,
            'dataString' => ''
        ];

        $options = array_merge($defaults, $params);

        $data = $json->list;

        if ($options['event'] != "") {
            $options['event'] = 'onchange="' . $options['event'] . '"';
        }
        if ($options['id'] != "") {
            $options['id'] = 'id="' . $options['id'] . '"';
        }
        if ($options['idContainer'] != "") {
            $options['idContainer'] = 'id="' . $options['idContainer'] . '"';
        }
        if ($options['required']) {
            $options['required']  = 'required';
        }

        echo '<DIV class="input-field1 ' . $options['classContainer'] . '" ' . $options['idContainer'] . '>';
        echo '    <LABEL class="font-Bold js-translate" data-string="' . $options['dataString'] . '">' . $options['title'] . '</LABEL>';

        echo '<SELECT name="' . $options['name'] . '" ' . $options['id'] . $options['event'] . $options['required'] . '>';
        echo '<OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            if ($value->code && $value->name) {
                echo '<OPTION value="' . $value->code . '">' . $value->name . ' </OPTION>';
            } else if ($value->code) {
                echo '<OPTION value="' . $value->code . '">' . $value->code . ' </OPTION>';
            } else if ($value->id && $value->name) {
                echo '<OPTION value="' . $value->id . '">' . $value->name . ' </OPTION>';
            } else {
                if ($options['name'] != "currency" && $options['name'] != "currencyTransfer" && $options['name'] != "currencyWallet" && $options['name'] != "currencyCommend") {
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
        echo '    <H4 class="js-translate" data-string="trad_pepin">¿Tienes dudas? <A target="_blank" title="contacta con Pepin" href="mailto:pepin@italcambio.com">Preguntale a Pepin</A></H4>';
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
    static function buildTitleBar($title, $class = "", $dataString = "")
    {
        echo '<DIV class="section-Titles ' . $class . '">';
        echo '    <H2 class="titles js-translate" data-string="' . $dataString . '">' . $title . '</H2>';
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
    static function buildSearchUsersWallet($params, $json)
    {

        $defaults = [
            'id' => '',
            'name' => '',
            'event' => '',
        ];

        $options = array_merge($defaults, $params);

        if ($options['id'] != "")
            $options['id'] = ' id="' . $options['id'] . '" ';

        $data = $json->list;
        echo '<DIV class="input-field1">';
        echo '       <SELECT required name="' . $options['name'] . '" ' . $options['id'] . ' ' . $options['event'] . ' class="">';
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
    static function buildSearchUsersCommend($params, $json)
    {
        $defaults = [
            'id' => '',
            'idButtom' => '',
            'name' => '',
            'event' => '',
            'eventAddContact' => '',
            'class' => ''
        ];

        $options = array_merge($defaults, $params);

        if ($options['eventAddContact'] != "") {
            $options['eventAddContact'] = 'onclick="' . $options['eventAddContact'] . '"';
        }
        $data = $json->list;
        echo '<DIV class="aside input-field1' . $options['class'] . '">';
        echo '       <SELECT name="' . $options['name'] . '" id="' . $options['id'] . '" ' . $options['event'] . ' class="select-width-user">';
        echo '       <OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            echo '<OPTION value="' . $value->id . '" >' . $value->name . ' </OPTION>';
        }
        echo '        </SELECT>';
        echo '    <BUTTON class="btn-contacts " ' . $options['eventAddContact'] . ' id="' . $options['idButtom'] . '">';
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
    static function buildMenuOptionGrid($nameImg, $titleOption, $modal, $url, $customClass = "", $dataString = "", $id="")
    {
        $opnModal = "";

        if ($modal == true) {
            $opnModal = "openModal";
        }


        echo '<ARTICLE id="'.$id.'" class="' . $customClass . ' card card-a grid-item ' . $opnModal . '" data-url="' . $url . '">';
        echo '    <ASIDE class="card__aside">';
        echo '        <FIGURE>';
        echo '            <IMG class="card-img" src="img/' . $nameImg . '">';
        echo '        </FIGURE>';
        echo '    </ASIDE>';
        echo '    <HEADER class="card__header">';
        echo '         <H3 class="card__title js-translate" data-string="' . $dataString . '">' . $titleOption . '</H3>';
        echo '    </HEADER>';
        echo '</ARTICLE>';
    } //buildMenuOptionGrid

    /*=======================================================================
    Function: startSectionTwoColumns
    Description: Start Tag ASIDE  (SecondSection) with 1 column
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/19 14:00
    ===================================================================== */
    static function startAsideOneColumn($class = "")
    {
        if ($class != "") {
            $class = 'class="' . $class . '"';
        } else {
            $class = 'class="grid-1"';
        }
        echo '<ASIDE ' . $class . '>';
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
    static function buildPhoneComplete($params, $jsonCode, $jsonArea)
    {
        $defaults = [
            'titleLabel' => '',
            'nameCountry' => '',
            'nameArea' => '',
            'namePhone' => '',
            'idCountry' => '',
            'idArea' => '',
            'idPhone' => '',
            'idArea' => '',
            'event' => '',
            'disabled' => '',
            'classContainer' => '',
            'classChildren' => ''
        ];

        $options = array_merge($defaults, $params);

        $data = $jsonCode->list;
        $data2 = $jsonArea->list;

        if ($options['event'] != "") {
            $options['event'] = 'onchange="' . $options['event'] . '"';
        }
        if ($options['disabled'] != "") {
            $options['disabled'] = 'disabled="' . $options['disabled'] . '"';
        }
        echo '<DIV class="input-field1 ' . $options['classContainer'] . '">';
        echo '  <LABEL class="font-Bold js-translate" data-string="trad_telefono_pago_movil">' . $options['titleLabel'] . '</LABEL>';
        echo '  <DIV class="flex-content ' . $options['classChildren'] . '">';
        echo '    <INPUT type="text" name="' . $options['nameCountry'] . '" id="' . $options['idCountry'] . '" class="input-radius" ' . $options['disabled'] . ' pattern="[0-9]+([\.,][0-9]+)?">';
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
        echo '<SELECT name="' . $options['nameArea'] . '" id="' . $options['idArea'] . '" class="select-width">';
        echo '<OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data2 as $value) {
            echo '<OPTION value="' . $value->code . '" >' . $value->code . ' </OPTION>';
        }
        echo '</SELECT>';

        echo '    <INPUT type="text" name="' . $options['namePhone'] . '" id="' . $options['idPhone'] . '" class="input-radius"  pattern="[0-9]+([\.,][0-9]+)?">';
        echo '  </DIV>';
        echo '</DIV>';
    } //buildPhoneComplete

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
    static function buildOptionsPrincipal($titleLabel, $data_id = "", $class = "card card-a", $dataString="")
    {
        echo '	<ARTICLE class="' . $class . '" data-id="' . $data_id . '">';
        echo '		<H1 class="js-translate" data-string="'.$dataString.'">' . $titleLabel . '</H1>';
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
        echo '<BUTTON class="wordsFM js-translate" data-string="trad_cambio_de_pin" id="openPinChange">Cambio de PIN</BUTTON>';
        echo '<A class="wordsFM js-translate" data-string="trad_olvido_de_pin" id="btnForgetPin" href="">Olvido de pin</A>';
        echo '</DIV>';
        echo '<DIV class="centrarObjets">';
        echo '    <SPAN id="btnPin" class="btn js-translate" data-string="trad_aceptar" ' . $btnId . ' ' . $eventButton . '> Aceptar </SPAN>';
        echo '</DIV>';
        echo '<A class="wordsFM js-translate" data-string="trad_registro" href="register.php">Registro</A>';
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
    static function buildButtonCenter($title, $event = "", $id = "", $class = "btn", $customClass = "", $dataString = "")
    {
        if ($event != "") {
            $event = 'onclick="' . $event . '"';
        }

        if ($id != "") {
            $id = 'id="' . $id . '"';
        }

        echo '<DIV class="centrarObjets ' . $customClass . '">';
        echo '    <BUTTON type="submit" data-string="' . $dataString . '" class="' . $class . ' js-translate"  ' . $event . ' ' . $id . '>' . $title . '</BUTTON>';
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
    static function buildSectionDocument($params, $jsonSelect)
    {
        $defaults = [
            'labelSelect' => '',
            'labelInputText' => '',
            'labelInputDate' => '',
            'nameSelect' => '',
            'nameInputText' => '',
            'nameInputDate' => '',
            'idSelect' => '',
            'idInputText' => '',
            'idInputDate' => '',
            'customClass' => '',
        ];

        $options = array_merge($defaults, $params);
        $data = $jsonSelect->list;

        echo '<DIV class="grid-3 ' . $options['customClass'] . '">';
        echo '    <DIV class="input-field1">';
        echo '        <LABEL  class="font-Bold js-translate" data-string="trad_t_doc">' . $options['labelSelect'] . '</LABEL>';
        echo '<SELECT name="' . $options['nameSelect'] . '" id="' . $options['idSelect'] . '" required>';
        echo '<OPTION disabled selected>Seleccione</OPTION>';
        foreach ($data as $value) {
            echo '<OPTION value="' . $value->id . '" >' . $value->name . ' </OPTION>';
        }
        echo '</SELECT>';
        echo '    </DIV>';
        echo '    <DIV class="input-field1">';
        echo '        <LABEL class="font-Bold js-translate" data-string="trad_documento" >' . $options['labelInputText'] . '</LABEL>';
        echo '        <INPUT type="text" name="' . $options['nameInputText'] . '" id="' . $options['idInputText'] . '" required>';
        echo '    </DIV>';
        echo '    <DIV class="input-field1">';
        echo '        <LABEL class="font-Bold js-translate" data-string="trad_fec_nacimiento">' . $options['labelInputDate'] . '</LABEL>';
        echo '        <INPUT type="date" name="' . $options['nameInputDate'] . '"  id="' . $options['idInputDate'] . '" required>';
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
    static function buildTextArea($params)
    {
        $defaults = [
            'title' => '',
            'id' => '',
            'name' => '',
            'placeholder' => '',
            'customClass' => '',
            'required' => false,
            'maxlength'=> 30,
            'dataString' => ''
        ];

        $options = array_merge($defaults, $params);

        if ($options['required']) {
            $options['required'] = 'required';
        }
        if ($options['placeholder']) {
            $options['placeholder'] = 'placeholder="' . $options['placeholder'] . '"';
        }
        if ($options['dataString']) {
            $options['dataString'] = 'data-string="' . $options['dataString'] . '"';
        }
        if ($options['name']) {
            $options['name'] = 'name="' . $options['name'] . '"';
        }
        if ($options['id']) {
            $options['id'] = 'id="' . $options['id'] . '"';
        }
        $options['maxlength'] = 'maxlength="' . $options['maxlength'] . '"';

        echo '<DIV class="input-field1 ' . $options['customClass'] . '">';
        echo '    <LABEL class="font-Bold js-translate" ' . $options['dataString'] . '>' . $options['title'] . '</LABEL>';
        echo '    <TEXTAREA type="text" ' . $options['name']. $options['maxlength'] . $options['id'] . $options['required'] . $options['placeholder'] . ' cols="40" rows="3"  style="resize: none;"></TEXTAREA>';
        echo '</DIV>';
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
        echo '	<LABEL class="font-Bold js-translate" data-string="trad_fecha_venc">Fecha Venc.</LABEL>';
        echo '	<DIV class="container-input">';
        echo '	    <DIV class="col-md-6">';
        echo '	        <DIV class="input-container">';
        echo '	            <INPUT class="input" type="text" name="' . $nameMonth . '" id="' . $idMonth . '" placeholder=" " maxlength="2"/>';
        echo '	            <LABEL class="placeholder js-translate" data-string="trad_mes">Mes</LABEL>';
        echo '	        </DIV>';
        echo '	    </DIV>';
        echo '	    <DIV class="col-md-6">';
        echo '	        <DIV class="input-container">';
        echo '	            <INPUT class="input" type="text" name="' . $nameYear . '" id="' . $idYear . '" placeholder=" "  maxlength="4"/>';
        echo '	            <LABEL class="placeholder js-translate" data-string="trad_ano">Año</LABEL>';
        echo '	        </DIV>';
        echo '	    </DIV>';
        echo '	</DIV>';
        echo '</DIV>';
    } //buildInputsDate
} // xpresentationLayer
