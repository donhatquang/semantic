<style type="text/css">
body {
    min-height: 300px;
}

.button {
position: relative;
display: inline-block;
background: #df7366;
color: #fff;
text-align: center;
border-radius: 0.5em;
text-decoration: none;
padding: 0.3em 1.5em 0.3em 1.5em;
border: 0;
cursor: pointer;
outline: 0;
}

.button:hover {
color: #fff;
background: #ef8376;
}
a:hover {
color: #ef8376;
border-bottom-color: transparent;
}

</style>

<script language="JavaScript">

    var Semantic_config = {

        css_host: "<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/parallelism/css/style"
    }

    var poster = "<?php echo $poster; ?>";

    $(function() {

        /*CHECK PARENT*/
        if (window.parent.location.href.indexOf("preview") == -1) {

            Video = window.parent.Video;
        }

        $("#header").css({

            "background": "url("+poster+")",
            "background-size": "cover"
        });

        /*IMAGE CLICK*/
        $("#reel img").on("click", function() {

            var src = $(this).attr("src");

            /*GET SEMANTIC*/
            Video.getImageSemantic(src);            

        });



    })

</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/js/config.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/js/skel.min.js"></script>

<noscript>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/css/style.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/css/style-desktop.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/css/skel-noscript.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/ref/html5up/css/style-noscript.css" />
</noscript>




<div id="wrapper">

<div id="main">
    <div id="reel">
        <!-- ******************************************************************************************** -->
        <!-- ******************************************************************************************** -->


        <!-- Header Item -->

        <div id="header" class="item" data-width="400">
            <h1><?php echo $title; ?></h1>
            <p>A responsive portfolio site<br />
                template by HTML5 UP</p>
        </div>

        <!-- Thumb Items -->

        <?php
        foreach($video as $item) {
            //var_dump($item);
            $url = Yii::app()->request->baseUrl.$item["url"];
            ?>

           <article class="item thumb" data-width="282">
                <h2><?php echo $item["title"]; ?></h2>
                <a href="<?php echo $item["url"]; ?>" title="<?php echo $item["url"]; ?>"><img src="<?php echo $item["url"]; ?>" alt="<?php echo $item["id"];?>"></a>
            </article>

          <!--  <article class="item thumb" data-width="500">
                <h2>You really got me</h2>
                <a href="./ref/html5up/parallelism/images/fulls/01.jpg"><img src="./ref/html5up/parallelism/images/thumbs/01.jpg" alt=""></a>
            </article>
-->

        <?php
        }
        ?>



        <!-- ******************************************************************************************** -->
        <!-- ******************************************************************************************** -->
    </div>
</div>

<!--FOOTER-->
<div id="footer" style="display:none;">
    <div class="left">
          
        <a href="#mycanvas" class="button" onclick="">Semantic</a>
    
    </div>
    <!-- <div class="right">
        <ul class="contact">
            <li><a href="#" class="fa fa-twitter solo"><span>Twitter</span></a></li>
            <li><a href="#" class="fa fa-facebook solo"><span>Facebook</span></a></li>
            <li><a href="#" class="fa fa-google-plus solo"><span>Google+</span></a></li>
            <li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
            <li><a href="#" class="fa fa-pinterest solo"><span>Pinterest</span></a></li>
            <li><a href="#" class="fa fa-envelope solo"><span>Email</span></a></li>
        </ul>
        <div id="copyright">
            &copy; Untitled. Design: <a href="http://html5up.net/">HTML5 UP</a>
        </div>
    </div> -->
</div>



</div>