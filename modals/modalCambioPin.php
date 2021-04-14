<!-- <div class="modal modal--danger" id="">
    <div class="modal-dialog">
        <section class="modal-content">
            <button class="close-modal hidden" type="button" aria-label="close modal" data-close>✕</button>
            <aside class="modal-body">
                <i class="far fa-times-circle"></i>
            </aside>
            <header class="modal-header">
                <h3 class="modal__title">Olvido de PIN</h3>
                <p class="modal__text">¿Desea generar nuevo PIN?</p>
            </header>
            <footer class="modal-footer">
                <a class="btn btn-danger" type="button" aria-label="close modal" data-close>Cancelar</a>
                <a class="btn btn-primary" type="button" aria-label="close modal" id="btnOlvidoPin">Aceptar</a>
            </footer>
        </section>
    </div>
</div> -->
<div class="modal modal--danger modalContainer" id="modalCambioPin">
    <div class="modal-content">
        <h1 class="divpin mt0">CAMBIAR PIN</h1>
        <input type="text" id="cambioPin" pattern=".{4,}" maxlength="4" class="passInput">
        <table class="centrarObjets">
            <tbody>
                <tr>
                    <td>
                        <input value=" 1 " onclick="numero('1')" type="button" class="botones">
                    </td>
                    <td> <input value=" 2 " onclick="numero('2')" type="button" class="botones"></td>
                    <td> <input value=" 3 " onclick="numero('3')" type="button" class="botones"></td>
                </tr>
                <tr>
                    <td> <input value=" 4 " onclick="numero('4')" type="button" class="botones"></td>
                    <td> <input value=" 5 " onclick="numero('5')" type="button" class="botones"></td>
                    <td> <input value=" 6 " onclick="numero('6')" type="button" class="botones"></td>
                </tr>
                <tr>
                    <td> <input value=" 7 " onclick="numero('7')" type="button" class="botones"></td>
                    <td> <input value=" 8 " onclick="numero('8')" type="button" class="botones"></td>
                    <td> <input value=" 9 " onclick="numero('9')" type="button" class="botones"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input value=" 0 " onclick="numero('0')" type="button" class="botones"></td>
                    <td>
                        <input type="image" name="botondeenvio" src="img/iconoborrar.png" class="imgErase" onclick="borradoUltimaCifra()">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="centrarObjets">
            <span id="btnPin" class="btn"> Aceptar </span>
        </div>
    </div>
</div>