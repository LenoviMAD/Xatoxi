<div class="modal modalContainer" id="modalTest">
    <div class="modal-dialog">
        <section class="modal-content">
        <H1 class="divpin mt0">PIN</H1>
        <INPUT type="password" name="pin" id="inputPin" pattern="4" maxlength="4" class ="passInput">
        <DIV class="full-center"><LABEL class="label-pin" >TAG</LABEL>
            <INPUT type="password" name="tag" id="inputTag"  pattern=".{24,}" maxlength="40" class="passInput"></DIV>
        <TABLE class="centrarObjets">
            <TBODY>
                <TR></TR>
                <TR></TR>
                <TR></TR>
                <TR>
                    <TD> <input value=" 1 " onclick="numero('1')" type="button" class="botones"></TD>
                    <TD> <input value=" 2 " onclick="numero('2')" type="button" class="botones"></TD>
                    <TD> <input value=" 3 " onclick="numero('3')" type="button" class="botones"></TD>
                </TR>
                <TR>
                    <TD> <input value=" 4 " onclick="numero('4')" type="button" class="botones"></TD>
                    <TD> <input value=" 5 " onclick="numero('5')" type="button" class="botones"></TD>
                    <TD> <input value=" 6 " onclick="numero('6')" type="button" class="botones"></TD>
                </TR>
                <TR>
                    <TD> <input value=" 7 " onclick="numero('7')" type="button" class="botones"></TD>
                    <TD> <input value=" 8 " onclick="numero('8')" type="button" class="botones"></TD>
                    <TD> <input value=" 9 " onclick="numero('9')" type="button" class="botones"></TD>
                </TR>
                <TD></TD>
                <TD><input value=" 0 " onclick="numero('0')" type="button" class="botones"></TD>
                <TD> <input type="image" name="botondeenvio" src="img/iconoborrar.png" class="imgErase" onclick="borradoUltimaCifra()"></TD>
                <TD></TD>
                </TR>
            </TBODY>
        </TABLE>
        <DIV style="display: flex;">
        <BUTTON class="wordsFM js-translate" data-string="trad_cambio_de_pin" id="openPinChange">Cambio de PIN</BUTTON>
        <A class="wordsFM js-translate" data-string="trad_olvido_de_pin" id="btnForgetPin" href="">Olvido de pin</A>
        </DIV>
        <DIV class="centrarObjets">
            <SPAN id="btnPin" class="btn js-translate" data-string="trad_aceptar" ' . $btnId . ' ' . $eventButton . '> Aceptar </SPAN>
        </DIV>
        <A class="wordsFM js-translate" data-string="trad_registro" href="register.php">Registro</A>
        </section>
    </div>
</div>