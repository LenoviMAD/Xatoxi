<div class="modal modal--danger modalContainer" id="modalCambioPin">
    <div class="modal-content">
        <h1 class="divpin mt0 js-translate" data-string="trad_cambiar_pin">CAMBIAR PIN</h1>
        <input type="password" id="cambioPin" pattern=".{4,}" maxlength="4" class="passInput">
        <table class="centrarObjets">
            <tbody>
                <tr>
                    <td>
                        <input value=" 1 " onclick="numero2('1')" type="button" class="botones">
                    </td>
                    <td> <input value=" 2 " onclick="numero2('2')" type="button" class="botones"></td>
                    <td> <input value=" 3 " onclick="numero2('3')" type="button" class="botones"></td>
                </tr>
                <tr>
                    <td> <input value=" 4 " onclick="numero2('4')" type="button" class="botones"></td>
                    <td> <input value=" 5 " onclick="numero2('5')" type="button" class="botones"></td>
                    <td> <input value=" 6 " onclick="numero2('6')" type="button" class="botones"></td>
                </tr>
                <tr>
                    <td> <input value=" 7 " onclick="numero2('7')" type="button" class="botones"></td>
                    <td> <input value=" 8 " onclick="numero2('8')" type="button" class="botones"></td>
                    <td> <input value=" 9 " onclick="numero2('9')" type="button" class="botones"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input value=" 0 " onclick="numero2('0')" type="button" class="botones"></td>
                    <td>
                        <input type="image" name="botondeenvio" src="img/iconoborrar.png" class="imgErase" onclick="borradoUltimaCifra2()">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="centrarObjets">
            <span id="btnPinChange" class="btn js-translate" data-string="trad_aceptar"> Aceptar </span>
        </div>
    </div>
</div>