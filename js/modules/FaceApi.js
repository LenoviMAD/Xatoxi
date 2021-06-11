// Tomando fotos papa
export default function init() {
    document.addEventListener("DOMContentLoaded", async () => {
        const video = document.getElementById("video");

        if (video) {
            const btnVideoUpload = document.getElementById("btnVideoUpload");
            const btnTakePhoto = document.getElementById("btnTakePhoto");
            const canvas = document.getElementById("canvas");
            let canvasContext
            if (canvas) {
                canvasContext = canvas.getContext('2d');
            }

            if (btnVideoUpload) {
                btnVideoUpload.addEventListener("click", () => {
                    startVideo()
                });
            }

            btnTakePhoto.addEventListener('click', function (ev) {
                takepicture();
            });
        }
        async function startVideo() {
            const test = document.getElementById("test");
            const model = await blazeface.load();

            navigator.getUserMedia =
                navigator.getUserMedia ||
                navigator.webktGetUserMedia ||
                navigator.mozGetUserMedia ||
                navigator.msGetUserMedia;

            navigator.getUserMedia(
                { video: {} },
                (stream) => (video.srcObject = stream),
                (err) => console.error(err)
            );

            video.addEventListener("play", () => {
                setInterval(async () => {
                    const predictions = await model.estimateFaces(video, false);
                    test.innerHTML = 'Tome la captura'

                    if (predictions.length) {
                        if (predictions[0].probability[0] < 0.5) {
                            test.innerHTML = 'papi me estas obstruyendo la cara'
                            btnTakePhoto.style.display = 'none'
                        } else {
                            btnTakePhoto.style.display = 'initial'
                            test.innerHTML = 'Tome la captura'
                        }
                    } else {
                        btnTakePhoto.style.display = 'none'
                        test.innerHTML = 'papi me estas obstruyendo la cara'
                    }
                }, 500);
            });
        }
        function takepicture() {
            canvasContext.drawImage(video, 0, 0, 400, 300);
            var link = document.createElement('a');
            link.download = 'capturedImage.png';
            link.href = canvas.toDataURL();
            link.click();
            console.log('tomando capture')
        }


    });
}
