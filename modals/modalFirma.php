<div class="modal modal--Otp modal--fullViewport" id="modalFirma">
    <div class="modal-dialog">
        <section class="modal-content">
            <aside class="modal-body">
                <div class="grid-3">
                    <canvas class="grid-item-3 m0auto draw-canvas" width="550" height="360" id="draw-canvas">
                        No tienes un buen navegador.
                    </canvas>
                    <input type="button" class="btn" id="draw-submitBtn" value="Guardar"></input>
                    <input type="button" class="btn" id="draw-clearBtn" value="Borrar"></input>
                    <input type="button" class="btn" aria-label="close modal" value="Atras" data-close></input>

                    <div class="hidden">
                        <label>Color</label>
                        <input type="color" id="color">
                        <label>Tamaño Puntero</label>
                        <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                    </div>
                    <textarea id="draw-dataUrl" class="form-control hidden" rows="5">Base64</textarea>
                    <img id="draw-image" src="" class="hidden" alt="Tu Imagen aparecera Aqui!" />
                </div>
            </aside>
        </section>
    </div>
</div>