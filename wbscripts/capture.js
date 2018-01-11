var video = document.getElementById('video'),
        canvas_top_img = document.getElementById('canvas_top_img'),
        canvas  = document.getElementById('canvas_captured'),
        context = canvas.getContext('2d'),
        context_top_img = canvas_top_img.getContext('2d'),
        //pic = document.getElementById('photo'),
        vendorUrl = window.URL || window.webkitURL;

(function () {

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
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        canvas_top_img.width = canvas.width;
        canvas_top_img.height = canvas.height;
        //pic.setAttribute('src', canvas.toDataURL('img/png'));

        return ;        
        var request = new XMLHttpRequest();
        request.open("POST", "blog.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("image="+canvas.toDataURL());

    });

    document.getElementById('filter_alien').addEventListener('click', function(e) {
        console.log('click', e.src);

        do_merge();
    });

    document.getElementById('filter_america_flg').addEventListener('click', function(e) {
        console.log('click', e.src);

        do_merge();
    });

})();

function do_merge(src){
    img = document.getElementById('filter_alien');
    /*var image = new Image();
    image.src = src;
    img.crossOrigin = 'Anonymous';
    image.onload = function() {
        console.log('In here');
        context_top_img.drawImage(image, 10, 10, 15, 15);
    }*/

    context_top_img.drawImage(img, 1}0, 10, 15, 15);
    console.log('doMerge >> ', src);
}