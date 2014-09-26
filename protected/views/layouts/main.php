<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="product" content="Metro UI CSS Framework">
<meta name="description" content="Simple responsive css framework">
<meta name="author" content="Sergey S. Pimenov, Ukraine, Kiev">

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/metro-bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/metro-bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/iconFont.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/salock.css" rel="stylesheet">

<!-- Load JavaScript Libraries -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery-2.1.1.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.widget.min.js"></script>

<!-- UI -->

<link href="<?php echo Yii::app()->request->baseUrl; ?>/ref/jquery-ui.1.10/css/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/jquery-ui.1.10/js/jquery-ui-1.10.4.custom.min.js"></script>


<!-- Metro UI CSS JavaScript plugins -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/load-metro.js"></script>

<!-- Local Semantic -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/metro/metro-loader.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/docs.js"></script>


<!-- Local JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mustache.js"></script>

<!-- Local JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tools.js"></script>

<script language="javascript">
            $(function () {
                
                $("i").addClass("<?php echo $this->header["header-color"]; ?>");
            });
            
            
            $.each(plugins, function(i, plugin){
                $("<script/>").attr('src', '<?php echo Yii::app()->request->baseUrl; ?>/js/metro/metro-'+plugin+'.js').appendTo($('head'));
            });


        </script>
<title>Salock</title>
</head><body class="metro">
<header>
  <div class="navigation-bar <?php echo $this->header["header-color"]; ?> ">
  <div class="navigation-bar-content container">
  <a href="window.history.back();" class="element">
  <?php
        
            //var_dump($this->header);
        ?>
  <i class="icon-<?php echo $this->header["icon"]; ?> fg-white" style="font-size: 200%;"></i> <?php echo $this->header["title"]?> </a> <span class="element-divider"></span> </header>
<div class="page <?php echo $this->header["bg-color"]; ?>">
  <div class="page-region">
    <div class="page-region-content" style="min-height:inherit;">
      <div class="content"> <?php echo $content; ?> </div>
    </div>
    <div class="page-footer">
      <div class="page-footer-content"> 
        <!--<div data-load="header.html"></div>--> 
      </div>
    </div>
  </div>
  
  <!--<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/hitua.js"></script>--> 
</div>
</body>
</html>





<!--        
<link href="<?php echo Yii::app()->request->baseUrl; ?>/js/prettify/prettify.css" rel="stylesheet">
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/prettify/prettify.js"></script>
 <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.mousewheel.js"></script>
                -->
