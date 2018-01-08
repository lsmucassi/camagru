(function () {
    var video = document.getElementById('video'),
        canvas  = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        pic = document.getElementById('photo'),
        vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
        //error code here
        alert("Problem rendering!")
    });

    document.getElementById('capture').addEventListener('click', function() {
        canvas.width = video.clientWidth;
        canvas.height = video.clientHeight;
        context.drawImage(video, 0, 0);
        pic.setAttribute('src', canvas.toDataURL('image/png'));
        var request = new XMLHttpRequest();
        request.open("POST", "post.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("image="+canvas.toDataURL());

    });
})();