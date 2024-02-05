window.addEventListener('load', function () {
    const audioContext = new (window.AudioContext || window.webkitAudioContext)();
    const audioFile = './asset/audio/driftveil-city.mp3';
    const request = new XMLHttpRequest();
    request.open('GET', audioFile, true);
    request.responseType = 'arraybuffer';

    request.onload = function () {
        audioContext.decodeAudioData(request.response, function (buffer) {
            const source = audioContext.createBufferSource();
            source.buffer = buffer;

            source.connect(audioContext.destination);

            source.start(0);
        });
    };

    request.send();
});
