<?php
error_reporting(0);
session_start();
include_once("xpresentationlayer.php");
include_once("xclient.php");

xpresentationLayer::startHtml("es");
xpresentationLayer::buildHead("Xatoxi");

xpresentationLayer::buildHeaderPrincipalXatoxi();

xpresentationLayer::startMain();

?>
<h4 id="test"></h4>
<button id="btnVideoUpload" class="btn btn-primary">Subir foto</button>
<button id="btnTakePhoto" class="btn btn-primary">Take a photo</button>
<video id="video" width="400" height="300" autoplay muted></video>
<canvas id="canvas" width="400" height="300"></canvas>
<div class="div-pepin">
    <button id="pepin" class="btn-pepin"><img src="./img/pepinvs1.jpg" alt="" class="w-100"></button>
</div>
<hr>
<div class="contenedor">
    <!-- Tarjeta -->
    <section class="tarjeta" id="tarjeta">
        <div class="delantera">
            <div class="logo-marca" id="logo-marca">
                <!-- <img src="img/logos/visa.png" alt=""> -->
            </div>
            <!-- <img src="img/chip-tarjeta.png" class="chip" alt=""> -->
            <div class="datos">
                <div class="grupo" id="numero">
                    <p class="numero" id="htmlccnumber"><?= $_SESSION['ccnumber']; ?></p>
                    <p class="numero"><?= $_SESSION['ccexpmonth']; ?>/<?= $_SESSION['ccexpyear']; ?></p>
                </div>
                <div class="flexbox">
                    <div class="grupo" id="nombre">
                        <p class="nombre">CARD HOLDER</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="trasera">
            <div class="barra-magnetica"></div>
            <div class="datos">
                <div class="grupo" id="firma">
                    <div class="firma">
                        <p></p>
                    </div>
                </div>
                <div class="grupo" id="ccv">
                    <p class="ccv mb0"><?= $_SESSION['cccvc']; ?></p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
xpresentationLayer::startFirtsSection("grid-3 mb-20");
xpresentationLayer::buildOptionGrid("Perfil");
xpresentationLayer::buildOptionGrid("MostrarQR", "", "", "genQR", "btn-primary");
xpresentationLayer::endSection();
xpresentationLayer::endMain();

include './modals/modalQR.php';

xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
