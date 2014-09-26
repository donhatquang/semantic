<!-- semantic -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/semantic.js"></script>

<!-- BAIDU -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/baidu.js"></script>

<!-- TEMPLATE -->
<script id="baike-tmpl" type="x-tmpl-mustache">
                   <div class="panel" data-role="panel">
                            <div class="panel-header bg-darkGreen fg-white">
                            {{ title }}
                            </div>
                            <div class="panel-content" id="baike-content">
                                {{ description }}
                            </div>
                     </div>
                </script>

<!-- TEMPLATE -->
<script id="similarpic-tmpl" type="x-tmpl-mustache">
                        <a href="#" onclick="Semantic.getSemantic('{{url}}', 'next');">
                        <div class="image-container shadow">
                          <img src="{{url}}">
                        <div class="overlay-fluid">{{description}}</div></div></a>
                </script>

<!-- ACCOR-->
<script id="semantic-tmpl" type="x-tmpl-mustache">
 <div class="grid">
   
    <div class="row">
      
	  <div class="span4 bg-white" id="img-area"> </div>
   
  	 <!-- --------- -->
		<div class="span7 bg-white" id="semantic-area">
			<div class="accordion  place-left margin10" data-role="accordion" data-closeany="false">
			   
         <!-- BAIDU SEMANTIC--> 

        <div class="accordion-frame"> <a class="heading active" href="#" data-action="" >Suggest Semantic</a>
			  
  			 
  				<div class="content"> </div>
  			  
        </div>
			  

        <!-- USER DEFINE SEMANTIC-->

        <div class="accordion-frame"> <a class="heading active" href="#">User-define Semantic</a>
			  
			
				  <div class="content" id="mysemantic"> </div>
			  </div>
			  
         <!-- Translate  SEMANTIC-->

        <div class="accordion-frame"> <a class="heading active" href="#">Translate Semantic</a>
        
         
          <div class="content" id="translatesemantic"> </div>
        </div>
        


			 <!-- USER INPUT SEMANTIC -->
			  <div class="accordion-frame"> <a class="heading active" href="#" data-action="" >Input Semantic</a>
			  
			  <!-- <label>User-input Semantic</label>-->

				<div class="input-control text" data-role="input-control">
					<input type="text" placeholder="Semantic" id="input-semantic" style="width:70%;">
					<button class="btn-clear" tabindex="-1"></button>
					
					<button class="button default" onClick="Semantic.inputSemantic();" style="margin: 5px;">Submit</button>

          <!-- Translate -->
          <button class="button default" onClick="Baidu.translateAll();" style="margin: 5px;">Translate</button>
        
				</div>
			  </div>
			  
			 <!-- --------- -->  
			  
			</div>
		  </div>
		</div>
	
   </div>
  </div>
  
    <!-- SELECT TEXT-->
  <div class="balloon bottom" id="select-text"></div>
                	
</script>


<!-- WIZARD -->

<div class="example"> 
  
  <!-- HEADER-->
  <div class="header"> 
    
    <!-- WIDARD -->
    <!-- <div class="stepper" data-role="stepper" data-steps="5" data-start="2" id="demo_stepper_methods"></div>
     -->
    <!--                         <div class="actions">
                            <button class="button" onclick="$('#demo_stepper_methods').stepper('next')">Next</button>
                            <button class="button" onclick="$('#demo_stepper_methods').stepper('prior')">Prior</button>
                            <button class="button" onclick="$('#demo_stepper_methods').stepper('first')">First</button>
                            <button class="button" onclick="$('#demo_stepper_methods').stepper('last')">Last</button>
                        </div>--> 
    
    <!-- LOADING -->
    <div class="progress-bar large" style="display:none;" id="loading-bar" data-role="progress-bar" data-value="0"></div>
  </div>
  
  <!-- CONTAINER-->
  <div class="ex-container"> </div>
</div>

<!-- TEMPLATE -->
<div id="template" style="display:none;">
 
</div>

<script language="javascript">
      $(document).ready(function(){

        var image = "<?php echo $image; ?>";

        console.log(image);

        /*SEARCH BY FILE*/
        if (image != "") {

          var result = '<?php echo $result; ?>';

          //PRINTSEMANTIC
          Semantic.image = image;
          Semantic.semanticBeginSuccess(result);

          //console.log(result);

        }

    });
</script>