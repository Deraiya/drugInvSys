<!doctype html>
<html>

<body>

<img id="frame">
<script>
    var camera = document.getElementById('camera');
    var frame = document.getElementById('frame');

    camera.addEventListener('change', function(e) {
        var file = e.target.files[0];
        // Do something with the image file.
        frame.src = URL.createObjectURL(file);
    });
</script>

<video id="player" controls autoplay></video>
<button id="capture">Capture</button>

<canvas id="snapshot" width=320 height=240></canvas>
<form method="post" action="{{route('upload')}}">
	{{csrf_field()}}
	<input name ="hidden" type="hidden" id="hidden_data" value="">
	<input type="submit" onclick="uploadEx()">Submit</input>
</form>


<script>
    var videoTracks;
    var player = document.getElementById('player');
    var snapshotCanvas = document.getElementById('snapshot');
    var captureButton = document.getElementById('capture');

    var handleSuccess = function(stream) {
        // Attach the video stream to the video element and autoplay.
        player.srcObject = stream;
        videoTracks = stream.getVideoTracks();
    };
    captureButton.addEventListener('click', function() {
        var context = snapshot.getContext('2d');
        // Draw the video frame to the canvas.
        context.drawImage(player, 0, 0, snapshotCanvas.width,
            snapshotCanvas.height);

        videoTracks.forEach(function (track) {
            track.stop();
        });
    });

    navigator.mediaDevices.getUserMedia({video: true})
        .then(handleSuccess);

    function uploadEx() {
        var canvas = document.getElementById("snapshot");
        var dataURL = canvas.toDataURL("image/png");
        document.getElementById('hidden_data').value = dataURL;
    };
</script>
</body>
</html>
