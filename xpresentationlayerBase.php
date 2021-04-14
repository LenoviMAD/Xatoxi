<?php


/*==========================================================================  
     Class: xpresentationlayerBase
     Description: MVC View. XATOXI Helper Methods
     Version: 1.0
     Remarks:
     ========================================================================*/

class xpresentationlayerBase
{

    /*=======================================================================
    Function: button
    Description: 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
    static function button($id = "", $name = "", $class = "", $textContent = "", $event = "")
    {
        if ($id != "") {
            $id = 'id="' . $id . '"';
        }
        if ($name != "") {
            $name = 'name="' . $name . '"';
        }
        if ($class != "") {
            $class = 'class="' . $class . '"';
        }

        echo '<BUTTON ' . $id . $name . $class . '> ' . $textContent . '</BUTTON>';
    } // button

    /*=======================================================================
    Function: button
    Description: 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
    static function a($id = "", $name = "", $class = "", $textContent = "", $href = "")
    {
        if ($id != "") {
            $id = 'id="' . $id . '"';
        }
        if ($name != "") {
            $name = 'name="' . $name . '"';
        }
        if ($class != "") {
            $class = 'class="' . $class . '"';
        }
        if ($href != "") {
            $href = 'href="' . $href . '"';
        }

        echo '<A ' . $id . $name . $class . $href . '> ' . $textContent . '</A>';
    } // a

    /*=======================================================================
    Function: card
    Description: 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
    static function card($id = "", $class = "")
    {
        if ($id != "") {
            $id = 'id="' . $id . '"';
        }
        if ($class != "") {
            $class = 'class="' . $class . '"';
        }

        echo '<DIV ' . $id . $class .'> ';
    } // CARD

    /*=======================================================================
    Function: endCard
    Description: 
    Parameters: 
    Algorithm:
    Remarks:
    Standarized: 2021/01/18 09:40
    ===================================================================== */
    static function endCard()
    {

        echo '</DIV>';
    } // CARD

} // xpresentationLayer
