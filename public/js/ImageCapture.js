'use strict';

function startProcess() {
    var videoElement = document.getElementById('player');
    var videoSelect = document.getElementById('videoselect');
    var VidTracks = null;
    var selectors =  [videoSelect];

    function gotDevices(deviceInfos) {
        // Handles being called several times to update labels. Preserve values.
        var values = selectors.map(function(select) {
            return select.value;
        });
        console.log(values);
        selectors.forEach(function(select) {
            while (select.firstChild) {
                select.removeChild(select.firstChild);
            }
        });
        for (var i = 0; i !== deviceInfos.length; ++i) {
            var deviceInfo = deviceInfos[i];
            var option = document.createElement('option');
            option.value = deviceInfo.deviceId;
            if (deviceInfo.kind === 'videoinput') {
                option.text = deviceInfo.label || 'camera ' + (videoSelect.length + 1);
                videoSelect.appendChild(option);
            }
        }
        selectors.forEach(function(select, selectorIndex) {
            if (Array.prototype.slice.call(select.childNodes).some(function(n) {
                    return n.value === values[selectorIndex];
                })) {
                select.value = values[selectorIndex];
            }
        });
    }

    navigator.mediaDevices.enumerateDevices().then(gotDevices).catch(handleError);

// Attach audio output device to video element using device/sink ID.
    function gotStream(stream) {
        window.stream = stream; // make stream available to console
        videoElement.srcObject = stream;
        VidTracks = stream.getVideoTracks();
        // Refresh button list in case labels have become available
        return navigator.mediaDevices.enumerateDevices();
    }

    function start() {
        if (window.stream) {
            window.stream.getTracks().forEach(function(track) {
                track.stop();
            });
        }
        var videoSource = videoSelect.value;
        //console.log("Video Source "+videoSelect.value);
        var constraints = {
            video: {deviceId: videoSource ? {exact: videoSource} : undefined}
        };
        navigator.mediaDevices.getUserMedia(constraints).
        then(gotStream).then(gotDevices).catch(handleError);
    }

    videoSelect.onchange = start;

    start();

    function handleError(error) {
        console.log('navigator.getUserMedia error: ', error);

    }
}