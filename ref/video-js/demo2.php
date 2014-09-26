<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Video.js | HTML5 Video Player</title>

  <script  src="../../js/jquery/jquery-2.1.1.min.js"></script>
  <script  src="../canvas2image.js"></script>

  <!-- Chang URLs to wherever Video.js files will be hosted -->
  <link href="video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "video-js.swf";
    //other
    var myPlayer;
    var shotNum = 3;
    var currentTime = 1;

  $(function() {


      var v = document.getElementById('example_video_1');
  var canvas = document.getElementById('c');
  var context = canvas.getContext('2d');
 
  //var cw = Math.floor(canvas.clientWidth / 100);
  //var ch = Math.floor(canvas.clientHeight / 100);

      var cw = v.clientWidth;
      var ch = v.clientHeight;

      console.log(cw);

      canvas.width = cw;
      canvas.height = ch;


    var draw = function (v,c,w,h) {
      //if(v.paused || v.ended) return false;
        var v = document.getElementById('example_video_1_html5_api');

        //console.log(c);
        //console.log(v);

      c.drawImage(v,0,0,w,h);

        //var canvas = document.getElementById('c');
        //var screenshot = canvas.toDataURL("image/png");
        //console.log(screenshot);
        //$("#output").html("");

        var screenshot = Canvas2Image.saveAsPNG(canvas, true);

          $("#output").append(screenshot);
        return;

        $("<img/>").attr({

            src: screenshot
        }).click(function() {

            window.open(this.src);

        }).appendTo("#output");



      //setTimeout(draw,20,v,c,w,h);

    }

      var getScrrenshot = function() {


          var duration = myPlayer.duration();

          var distance = Math.floor(duration/shotNum)-2;

          console.log(duration);

          if (duration == 0) return;

          var interval = setInterval(function () {

              currentTime+=distance;

              if (currentTime>duration) {
                  //
                  clearInterval(interval);
                  return;
              }

              console.log(currentTime);


               myPlayer.currentTime(currentTime);


              setTimeout(function() {

                  draw(v, context,cw,ch);
              },500);

          }, 1000);

         //

       }




    $("#capture").on("click", function() {

        draw(v, context,cw,ch);
        //getScrrenshot();

    })

    //-------------
      myPlayer = videojs("example_video_1", { "controls": true, "autoplay": true, "preload": "auto" }).ready(function() {

          //var myPlayer = this;
            this.play();
          //console.log("ready");
         setTimeout(function() {

                    myPlayer.pause();
            //
             getScrrenshot();
         },
          200);

      })
  })

  </script>


</head>
<body>



  <video id="example_video_1" class="video-js vjs-default-skin" controls width="640" height="264"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup=''>
    <source src="oceans-clip.mp4" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>

  <button id="capture">Capture</button>

  <div id="output"></div>

  <canvas id="c" style=""></canvas>

</body>
</html>
