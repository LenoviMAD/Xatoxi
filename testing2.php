<?php
error_reporting(0);
include_once("xpresentationlayer.php");
include_once("xclient.php");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");

xpresentationLayer::buildHeaderPrincipalXatoxi();

xpresentationLayer::startMain();

?>
<!-- <h4 id="test"></h4>
<button id="btnVideoUpload" class="btn btn-primary">Subir foto</button>
<button id="btnTakePhoto" class="btn btn-primary">Take a photo</button>
<video id="video" width="400" height="300" autoplay muted></video>
<canvas id="canvas" style="display: none;" width="400" height="300"></canvas>
<div class="div-pepin">
    <button id="pepin" class="btn-pepin"><img src="./img/pepinvs1.jpg" alt="" class="w-100"></button>
</div>
<hr> -->
<div class="contenedor">

    <!-- Tarjeta -->
    <section class="tarjeta" id="tarjeta">
        <div class="delantera">
            <div class="logo-marca" id="logo-marca">
                <!-- <img src="img/logos/visa.png" alt=""> -->
            </div>
            <img src="img/chip-tarjeta.png" class="chip" alt="">
            <div class="datos">
                <div class="grupo" id="numero">
                    <p class="label">Número Tarjeta</p>
                    <p class="numero">#### #### #### ####</p>
                </div>
                <div class="flexbox">
                    <div class="grupo" id="nombre">
                        <p class="label">Nombre Tarjeta</p>
                        <p class="nombre">Jhon Doe</p>
                    </div>

                    <div class="grupo" id="expiracion">
                        <p class="label">Expiracion</p>
                        <p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="trasera">
            <div class="barra-magnetica"></div>
            <div class="datos">
                <div class="grupo" id="firma">
                    <p class="label">Firma</p>
                    <div class="firma">
                        <p></p>
                    </div>
                </div>
                <div class="grupo" id="ccv">
                    <p class="label">CCV</p>
                    <p class="ccv"></p>
                </div>
            </div>
            <p class="leyenda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus exercitationem, voluptates illo.</p>
            <a href="#" class="link-banco">www.tubanco.com</a>
        </div>
    </section>
</div>
<?php
xpresentationLayer::endMain();



xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
