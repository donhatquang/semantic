<!--RESEMBLE -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/resemble.js"></script>

<!-- semantic -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/semantic.js"></script>
        
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/compare.js"></script>
<script>
         
         var fileData = "images/53a8feb3c6eff.png";         

         //BEGIN
          $(function () {
            

            Compare.AnalyzeRGB(fileData);
            
            //MULTI IMAGE FROM SEMANTIC
            var semanticWord = "from local storage";

            Compare.getSemanticImage(semanticWord);


            //----------
            var pic1 = fileData,
            pic2 = "images/538215adbffef.png";

           
            Compare.similarAnalyze(pic1, pic2);
           
        }) 
                         
		</script>

<!-- WIZARD -->

<div class="example"> 
  
  <!-- HEADER-->
  <div class="header"> 
    
    <!-- WIDARD -->
    <div class="stepper" data-role="stepper" data-steps="5" data-start="3" id="demo_stepper_methods"></div>
    
    <div class="progress-bar large" id="#loading-bar" style="display:none;" data-role="progress-bar" data-value="0"></div>
  
  </div>
  
  <!-- CONTAINER-->
  <div class="ex-container">
  
  <!-- ANALYSE -->
  
  <h1>Analize Image</h1>
  
    <div class="grid">
      <div class="row">
        <div class="span6 bg-white" id="img-area"> </div>
        
        <!-- --------- -->
        <div class="span6 bg-white" id="analyze-result"> </div>
      </div>
    </div>
   
    <!-- MULTI IMAGE -->

      <h1>Multi-Image</h1>
   
   
    <!-- SELECT THUMBNAIL-->
    <div id="multi-thumbnail"></div>

    <button class="button large danger" style="margin: 10px;" onClick="Compare.multiCompare();">Compare</button>
     <!-- COMPARE -->
  
  <h1>Compare Image</h1>
   
   
    <!-- SELECT THUMBNAIL-->
    <div id="thumbnail"></div>
    
    

<!-- TEMPLATE -->
<script id="compare-img-tmpl" type="x-tmpl-mustache">
 
      <div class="row">
        <div class="span6 bg-white" class="">{{&compare_image}}</div>
        
        <!-- --------- -->
        <div class="span6 bg-white"> 

            <h3>Match Percent 
              <span class="fg-red">{{match_percent}}%</span>
            </h3>

            <div>{{&compare_match}}</div>

            <h3>Same Dimension 
              <span class="fg-red">{{compare_dimension}}</span>
            </h3>

            <h3>Compare time (milisecond)
              <span class="fg-red">{{compare_time}} (ms)</span>
            </h3>
        </div>
      </div>
   
</script>

       <!-- COMPARE RESULT-->
  <div class="grid compare-result">
   </div>  
    <!-- ----------- -->
   
  </div>
</div>

<!--<div align="center">
  <button class="button large danger">SAVE IMAGE</button>
  <button class="button large default" onclick="window.location = '?r=semantic/index';">SEMANTIC</button>
</div>
-->