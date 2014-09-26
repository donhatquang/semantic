<script language="JavaScript">

    var Semantic_config = {

        css_host: "<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/helios/css/style"
    }

</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/js/skel.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/js/skel-panels.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/js/jquery.dropotron.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/js/init.js"></script>
<noscript>
    <link rel="stylesheet" href="css/skel-noscript.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-desktop.css" />
    <link rel="stylesheet" href="css/style-noscript.css" />
</noscript>

<!---------- INCLUDE ------->

<!-- Chang URLs to wherever Video.js files will be hosted -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/ref/video-js/video-js.css" rel="stylesheet" type="text/css">
<!-- video.js must be in the <head> for older IEs to work. -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/video-js/video.js"></script>

<!--html2canvas-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/canvas2image.js"></script>

<!---------- VIDEO ------->

<!--BAIDU CLASS-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/baidu.js"></script>

<!--VIDEO CLASS-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/video.js"></script>


<script language="javascript">

    $(function () {

       Video.config.host = "<?php echo Yii::app()->request->baseUrl; ?>/video/";

        var host =  Video.config.host;

        //-------------
        Video.Player = videojs("semantic_video", {"poster": host+Video.config.poster, controls: true, "autoplay": false, "preload": false, "height":"auto", "width":"auto"}).ready(function() {

            var aspectRatio = 5/12; // Make up an aspect ratio
            var myPlayer = this;    // Store the video object

            function resizeVideoJS(){
                // Get the parent element's actual width
                var width = document.getElementById(myPlayer.id()).parentElement.offsetWidth-300;

                // Set width to fill parent element, Set height
                myPlayer.width(width).height( width * aspectRatio );
            }

            resizeVideoJS(); // Initialize the function
            window.onresize = resizeVideoJS; // Call the function on resize

        });
        //player.src(src);

        //var player = Video.Player;

        $(".reel img").on("click", function () {

            Video.videoPlay(this);
            return false;

        }).attr("href","#video-player")


        /*SAVE CAPTURE*/
        $("#save-btn").on("click", function() {

            $("#output img").each(function(i,obj) {

                console.log(obj.src);

                Video.saveCapture(obj.src);
            });

            console.log("save image")

            return false;
        });

        $("#semantic-btn").on("click", function() {


        });
    })

</script>

<style type="text/css">

    #semantic_video {
        margin: 0 auto;
        box-shadow: 0 0 20px 5px rgba(74, 137, 151, 0.5);

    }

    .video-btn {
        padding-top: 20px;;
    }
    .video-btn a {

        margin: 20px;;
    }
    .video-iframe {
        width: 100%;
        border: none;
        height: 400px;

    }

    /*--------*/

    #main {

        background: rgba(0,0,0,0.5); width: 100%; margin-bottom:0px;
        padding: 20px;;
    }
    #footer {
        padding-top: 3em;
    }

    .image {
        box-shadow: 0 0 10px 1px rgba(74, 137, 151, 0.5);
    }
    .row {
        margin: 0px;
    }
</style>
<!-- Header -->
<div id="header" style="display: none;">

    <!-- Inner -->
    <div class="inner">
        <header>
            <h1><a href="#" id="logo">Semantic Video</a></h1>
            <hr />
            <span class="byline">Another way to semantic the video clip</span>
        </header>
        <footer>
            <a href="#video-list" class="button circled scrolly">Start</a>
        </footer>
    </div>

    <!-- Nav -->
    <nav id="nav">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li>
                <span>Dropdown</span>
                <ul>
                    <li><a href="#">Lorem ipsum dolor</a></li>
                    <li><a href="#">Magna phasellus</a></li>
                    <li><a href="#">Etiam dolore nisl</a></li>
                    <li>
                        <span>And a submenu &hellip;</span>
                        <ul>
                            <li><a href="#">Lorem ipsum dolor</a></li>
                            <li><a href="#">Phasellus consequat</a></li>
                            <li><a href="#">Magna phasellus</a></li>
                            <li><a href="#">Etiam dolore nisl</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Veroeros feugiat</a></li>
                </ul>
            </li>
            <li><a href="left-sidebar.html">Left Sidebar</a></li>
            <li><a href="right-sidebar.html">Right Sidebar</a></li>
            <li><a href="no-sidebar.html">No Sidebar</a></li>
        </ul>
    </nav>

</div>

<!-- Banner -->
<!--<div id="banner">
    <h2>Hi. You're looking at <strong>Helios</strong>.</h2>
				<span class="byline">
					A (free) responsive site template by <a href="http://html5up.net/">HTML5 UP</a>.
					Built on <a href="http://skeljs.org">skelJS</a> and released under the <a href="http://html5up.net/license/">CCA</a> license.
				</span>
</div>-->

<!-- Carousel -->
<div id="video-list" class="carousel">
    <div class="reel">

        <?php
            foreach($video as $item) {
                //var_dump($item);
                $url = Yii::app()->request->baseUrl.$item["url"];
        ?>

        <article>
            <a href="#" class="image featured">
                <img src="<?php echo $url; ?>" rel="<?php echo $item["id"]; ?>" title="<?php echo $item["title"] ?>" />
            </a>
            <header>
                <h3><a href="#" class="title"><?php echo $item["title"] ?></a></h3>
            </header>
           <!-- <p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>-->
        </article>

        <?php

            }
        ?>

    </div>
</div>

<!-- Main -->
<div class="style2" id="video-player" style="background: #ccc;">


    <article id="main" class="container special" style="">

            <video id="semantic_video" class="video-js vjs-default-skin" style="margin: 0 auto;" controls
                   poster=""
                   data-setup=''>
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
            </video>

         <!--CANVAS AREA-->
          <canvas id="mycanvas" style="display:none;"></canvas>


       <header>
            <h2><a href="#" id="video-title"></a></h2>
        </header>

        <!--TAKE SCRRENSHOT-->
        <header>
                <h2 style="color: #fff; margin: 10px;" class="video-btn">
                    <a href="#footer" class="fa fa-camera  solo" style="" onclick="Video.getScrenshot();"><span>Photos</span></a>
                    <a href="#footer" class="fa fa-hdd-o  solo" style="font-size: 1.26em;" id="save-btn" ><span>Save</span></a>
                </h2>
<!--            </a>-->
        </header>



    </article>


</div>

<!-- OUTPUT -->


<div id="footer" style="text-align: center;">
    <!-- TEMPLATE -->
    <script id="screenshot-tmpl" type="x-tmpl-mustache">
      <article class="4u special">
            <a href="#" class="image featured" style="margin: 0px;">
                <img src="{{image}}" alt="">
            </a>
            <header>
                <h3><a href="#">{{title}}</a></h3>
            </header>
    </article>
 </script>

    <div class="container row" id="output">
    </div>
   
    <footer>
        <a href="#mycanvas" class="button" id="semantic-btn" onclick="">Semantic Video</a>
    </footer>

</div>

<!-- IFRAME -->
<div style="background:#000;">

        <iframe src="index.php?r=video/preview&title=caribeen" id="video-iframe" class="video-iframe"></iframe>

          <!-- SEMANTIC FRAME -->
        <iframe src="" class="video-iframe" id="semantic-iframe" style="display:none;" scroll="no"></iframe>


</div>


