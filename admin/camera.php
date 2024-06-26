<?php


include_once './header.php';
include_once './controllers/index.php';

if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);
    $id_enc = $_GET['id'];
} else {
    $id = 0;
}


if (isset($_GET['u_id'])) {
    $u_id = base64_decode($_GET['u_id']);
    $u_id_enc = $_GET['u_id'];
} else {
    $u_id = 0;
}



?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $lang['System Name'] ?></title>

    <style>
        body {
            margin: 0px;
            padding: 0px;
            background: #000;
            overflow: hidden;
        }

        #vid_container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        #gui_controls {
            position: fixed;
            background-color: #111;
            z-index: 2;
            bottom: 0;
        }

        #video_overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            background-color: #111;
        }

        button {
            outline: none;
            position: absolute;
            color: white;
            display: block;
            opacity: 1;
            background: transparent;
            border: solid 2px #fff;
            padding: 0;
            text-shadow: 0px 0px 4px black;
            background-position: center center;
            background-repeat: no-repeat;
            pointer-events: auto;
            z-index: 2;
        }

        #takePhotoButton {
            left: calc(50% - 40px);
            top: calc(50% - 40px);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #takePhotoButton::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 70%;
            height: 70%;
            background-color: white;
            border-radius: 50%;
        }

        #takePhotoButton:active::before {
            background-color: #ccc;
        }


        #toggleFullScreenButton {
            display: none;
            width: 64px;
            height: 64px;
            background-image: url('./assets/img/icon/ic_fullscreen_white_48px.svg');
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #toggleFullScreenButton[aria-pressed='true'] {
            background-image: url('./assets/img/icon/ic_fullscreen_exit_white_48px.svg');
        }

        #switchCameraButton {
            display: none;
            width: 64px;
            height: 64px;
            background-image: url('./assets/img/icon/ic_camera_rear_white_36px.svg');
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #switchCameraButton[aria-pressed='true'] {
            background-image: url('./assets/img/icon/ic_camera_front_white_36px.svg');
        }

        #refreshCameraButton {
            display: none;
            left: calc(50% - 32px);
            top: calc(50% - 32px);
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            background-image: url('./assets/img/icon/ic_photo_camera_white_48px.svg');
            background-size: 60%;
            background-repeat: no-repeat;
            background-position: center;
        }


        #okButton {
            display: none;            
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            background-size: 60%;
            background-repeat: no-repeat;
            background-position: center;
        }



        @media screen and (orientation: portrait) {
            #vid_container {
                width: 100%;
                height: 100%;
            }

            #gui_controls {
                width: 100%;
                height: 125px;
                left: 0;
            }

            #switchCameraButton {
                left: calc(20% - 32px);
                top: calc(50% - 32px);
            }

            #okButton {
                left: calc(20% - 32px);
                top: calc(50% - 32px);
            }

            #toggleFullScreenButton {
                left: calc(80% - 32px);
                top: calc(50% - 32px);
            }
        }

        @media screen and (orientation: landscape) {
            #vid_container {
                width: 100%;
                height: 100%;
            }

            #vid_container.left {
                left: 20%;
            }

            #gui_controls {
                width: 125px;
                height: 100%;
                right: 0;
            }

            #gui_controls.left {
                left: 0;
            }

            #switchCameraButton {
                left: calc(50% - 32px);
                top: calc(18% - 32px);
            }

            #okButton {
                left: calc(50% - 32px);
                top: calc(18% - 32px);
            }

            #toggleFullScreenButton {
                left: calc(50% - 32px);
                top: calc(82% - 32px);
            }
        }

        img.captured-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="container">

            <div id="vid_container">
                <video id="video" autoplay playsinline></video>
                <div id="video_overlay"></div>
            </div>
            <div id="gui_controls">
                <button id="switchCameraButton" name="switch Camera" type="button" aria-pressed="false"></button>
                <button id="takePhotoButton" name="take Photo" type="button"></button>
                <button id="toggleFullScreenButton" name="toggle FullScreen" type="button" aria-pressed="false"></button>
                <button id="refreshCameraButton" name="go to Camera" type="button"></button>
                <button id="okButton" name="OK" type="button">Accept</button>
            </div>
        </div>
    </div>

    <form action="data/register_doc_image.php" class="templatemo-login-form" method="post" enctype="multipart/form-data" name="doc">
        <input type="hidden" name="image" id="image">
        <input type="hidden" name="user" id="user" value="<?= $u_id ?>">
        <input type="hidden" name="id" id="id"  value="<?=$id ?>">
    </form>




    <script>
        const video = document.getElementById('video');
        const switchCameraButton = document.getElementById('switchCameraButton');
        const takePhotoButton = document.getElementById('takePhotoButton');
        const toggleFullScreenButton = document.getElementById('toggleFullScreenButton');
        const refreshCameraButton = document.getElementById('refreshCameraButton');
        const okButton = document.getElementById('okButton');

        let currentStream = null;
        let currentCameraIndex = 0;
        let videoDevices = [];

        // Start video stream with the first available camera
        async function startStream() {
            try {
                // Request permission to access audio and video devices
                await navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: true
                });

                // Add a delay to allow the browser to update device labels
                await new Promise(resolve => setTimeout(resolve, 500));

                // Get the list of media devices
                const devices = await navigator.mediaDevices.enumerateDevices();
                videoDevices = devices.filter(device => device.kind === 'videoinput');

                if (videoDevices.length > 0) {
                    currentStream = await navigator.mediaDevices.getUserMedia({
                        video: {
                            deviceId: videoDevices[currentCameraIndex].deviceId
                        }
                    });
                    video.srcObject = currentStream;
                    switchCameraButton.style.display = 'block';
                    toggleFullScreenButton.style.display = 'block';
                }
            } catch (error) {
                console.error('Error starting video stream:', error);
            }
        }

        // Switch between cameras
        switchCameraButton.addEventListener('click', async () => {
            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
            }
            currentCameraIndex = (currentCameraIndex + 1) % videoDevices.length;
            currentStream = await navigator.mediaDevices.getUserMedia({
                video: {
                    deviceId: videoDevices[currentCameraIndex].deviceId
                }
            });
            video.srcObject = currentStream;
        });

        // Capture photo
        takePhotoButton.addEventListener('click', () => {
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);
            const img = canvas.toDataURL('image/png');
            const capturedImage = document.createElement('img');
            capturedImage.src = img;
            capturedImage.classList.add('captured-image');
            document.body.appendChild(capturedImage);
            video.style.display = 'none';
            switchCameraButton.style.display = 'none';
            takePhotoButton.style.display = 'none';
            refreshCameraButton.style.display = 'block';
            okButton.style.display = 'block';
        });

        // Restart the camera stream
        refreshCameraButton.addEventListener('click', () => {
            const capturedImage = document.querySelector('body > img.captured-image');
            if (capturedImage) {
                capturedImage.remove();
            }
            video.style.display = 'block';
            takePhotoButton.style.display = 'block';
            refreshCameraButton.style.display = 'none';
            okButton.style.display = 'none';
            startStream();
        });

        // Save the captured image
        okButton.addEventListener('click', async () => {
            const capturedImage = document.querySelector('body > img.captured-image');
            if (capturedImage) {
              /*  const client_id = "<?php echo $u_id; ?>";
                const docid = "<?php echo $id; ?>";
                const client_id_enc = "<?php echo $u_id_enc; ?>";
                const docid_enc = "<?php echo $id_enc; ?>";*/
                document.getElementById('image').value = capturedImage.src;
                document.forms['doc'].submit();
/*
                const response = await fetch('./data/register_doc_image.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        image: capturedImage.src,
                        user: client_id,
                        id: docid
                    })
                });
                const result = await response.json();
                if (result.success) {

                    window.location.href = `/document?u_id=${client_id_enc}&id=${result.id}`
                } else {
                    alert('Failed to save image');
                }*/
            }
        });

        // Stop video stream
        function stopStream() {
            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
                currentStream = null;
            }
        }

        // Fullscreen mode
        toggleFullScreenButton.addEventListener('click', () => {
            if (document.fullscreenElement) {
                document.exitFullscreen();
            } else {
                document.documentElement.requestFullscreen();
            }
        });

        document.addEventListener('fullscreenchange', () => {
            if (document.fullscreenElement) {
                toggleFullScreenButton.setAttribute('aria-pressed', 'true');
            } else {
                toggleFullScreenButton.setAttribute('aria-pressed', 'false');
            }
        });

        // Initialize
        startStream();
    </script>
    </script>

</body>

</html>