<?php
error_reporting(0);
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
<canvas id="canvas" style="display: none;" width="400" height="300"></canvas>
<div class="div-pepin">
        <button id="pepin" class="btn-pepin"><img src="./img/pepinvs1.jpg" alt="" class="w-100"></button>
    </div>
<?php
xpresentationLayer::endMain();



xpresentationLayer::buildFooterXatoxi();

xpresentationLayer::endSection();
xpresentationLayer::endHtml();
