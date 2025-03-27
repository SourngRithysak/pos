<!DOCTYPE html>
<html>
<head>
    <title>Barcode Reader</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <style>
        video { width: 300px; height: 100px; border: 2px solid #ccc; border-radius: 8px; }
        #result { margin-top: 20px; font-size: 1.2em; color: #333; }
    </style>
</head>
<body>
    <video id="video" autoplay></video>
    <p id="result">Scan a barcode...</p>

    <script>
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const videoElement = document.getElementById('video');
        const resultElement = document.getElementById('result');

        codeReader.getVideoInputDevices().then((videoInputDevices) => {
            if (videoInputDevices.length > 0) {
                codeReader.decodeFromVideoDevice(videoInputDevices[0].deviceId, 'video', (result, err) => {
                    if (result) {
                      $.ajaxSetup({
                          headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                      });
                      $(function(){
                          $.post('/testingSendData',{barcode:result.text},function(respone){
                              alert(respone);
                          })
                      });
                        resultElement.textContent = `Barcode: ${result.text}`;
                    }
                });
            } else {
                resultElement.textContent = 'No camera found';
            }
        }).catch((err) => {
            console.error(err);
            resultElement.textContent = 'Error accessing camera';
        });
    </script>
</body>
</html>
