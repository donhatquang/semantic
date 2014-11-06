<!--THREE WEBGL-->
    
<!-- THREE.JS FRAMEWORK -->
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/three.min.js"></script>

   <!-- MTLL OJECT FILE LOADER -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/threejs/loaders/MTLLoader.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/threejs/loaders/OBJMTLLoader.js"></script>

                <!-- 3D OBJECT -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/threejs/Detector.js"></script>
                
                <!-- STATS MODULE -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/threejs/libs/stats.min.js"></script>


		<!-- ----------------- -->

                <!-- PRINT -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/threejs/THREEx.screenshot.js"></script>
                
                  <!-- semantic -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/ref/tooltipster-master/js/jquery.tooltipster.min.js"></script>
                 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/ref/tooltipster-master/css/tooltipster.css" />
                <!-- semantic -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/semantic.js"></script>
        
		<script>
                        
                       
                        
			var container, stats;

			var camera, scene, renderer;

			var mouseX = 0, mouseY = 0;

			var windowHalfX = window.innerWidth / 2;
			var windowHalfY = window.innerHeight / 2;


			function init() {

				container = document.createElement( 'div' );
				$(container).appendTo("#workspace");
                                

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 1, 2000 );
				camera.position.z = 100;

				// scene

				scene = new THREE.Scene();

				var ambient = new THREE.AmbientLight( 0x444444 );
				scene.add( ambient );

				var directionalLight = new THREE.DirectionalLight( 0xffeedd );
				directionalLight.position.set( 0, 0, 1 ).normalize();
				scene.add( directionalLight );

				// model

				var loader = new THREE.OBJMTLLoader();
				loader.load( 'obj/male02/male02.obj', 'obj/male02/male02_dds.mtl', function ( object ) {

					object.position.y = - 80;
					scene.add( object );

				} );

				//

				renderer = new THREE.WebGLRenderer({
                                    
                                    alpha: true,
                                    preserveDrawingBuffer   : true   // required to support .toDataURL()
                                });
				renderer.setSize( window.innerWidth/1.5, window.innerHeight/1.5 );
                                
                //PREVIEW
                $("#preview").css({height: (window.innerHeight/2)+"px"})
                                
				container.appendChild( renderer.domElement );

				document.addEventListener( 'mousemove', onDocumentMouseMove, false );

				window.addEventListener( 'resize', onWindowResize, false );

			}

			function onWindowResize() {

				windowHalfX = window.innerWidth / 2;
				windowHalfY = window.innerHeight / 2;

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth/1.5, window.innerHeight/1.5 );

			}

			function onDocumentMouseMove( event ) {

				mouseX = ( event.clientX - windowHalfX ) / 2;
				mouseY = ( event.clientY - windowHalfY ) / 2;

			}

			//

			function animate() {

				requestAnimationFrame( animate );
				render();

			}

			function render() {

				camera.position.x += ( mouseX - camera.position.x ) * .05;
				camera.position.y += ( - mouseY - camera.position.y ) * .05;

				camera.lookAt( scene.position );

				renderer.render( scene, camera );

			}
                         
                         //BEGIN
                          $(function () {
                            
                            init();
                            animate();
                            
                            //----->
                            //SCREEN SHOT
                            var callback = function (data) {
                                
                                //SAVE IMAGE
                                Semantic.image = data;
                                Semantic.saveImage();
                                                             
                                $('<div class="image-container shadow"></div>').append(
                                    $("<img/>").attr({
                                        
                                        src: data
                                    }).tooltipster({
                                        content: $('<img src="'+data+'" width="">'),
                                        // setting a same value to minWidth and maxWidth will result in a fixed width
                                        minWidth: 300,
                                        //maxWidth: 300,
                                        position: 'bottom',
                                        theme: 'tooltipster-none',
                                        //position: 'right'
                                    })
                                 ).bind("click", function () {
                                
                                    if ($(this).hasClass("selected"))
                                        $(this).removeClass("selected");
                                    else
                                           $(this).addClass("selected");
                                       
                                }).appendTo("#preview .example");
                               
                            };
                            
                            //BIND KEY
                            THREEx.Screenshot.bindKey(renderer,{

                                callback: callback
                                //width: 400,
                                //height: 400
                            });
                            
                           
                            
                            //LOAD
                            //LoadInit();
                           
                        }) 
                         
		</script>

                <!-- TEMPLATE -->
                <script id="baike-tmpl" type="x-tmpl-mustache">
                   <div class="panel" data-role="panel">
                            <div class="panel-header bg-darkGreen fg-white">
                            {{ title }}
                            </div>
                            <div class="panel-content">
                                {{ description }}
                            </div>
                     </div>
                </script>
                
                  <!-- TEMPLATE -->
                <script id="similarpic-tmpl" type="x-tmpl-mustache">
                        <a href="{{fromURL}}" target="_blank">
                        <div class="image-container shadow">
                          <img src="{{url}}">
                        <div class="overlay-fluid">{{description}}</div></div></a>
                </script>
                
                
                <!-- WIZARD -->
                
                
                <div class="example">
                    
                     <!-- HEADER-->
                    <div class="header">
                      
                        
                        
                        <!-- WIDARD -->
                        <div class="stepper" data-role="stepper" data-steps="5" id="demo_stepper_methods"></div>

                    <!-- LOADING -->
                        <div class="progress-bar large" style="display:none;" data-role="progress-bar" data-value="0"></div>
                        
                    </div>
                    
                    <!-- CONTAINER-->
                    <div class="ex-container">
                        
                    </div>
                    
                </div>
                
               
                <div class="grid">
                    <div class="row">
                        <div class="span6 bg-white">
                            
                            <div id="preview" data-role="scrollbox1" data-scroll="horizontal">
                                 <div class="example">
                                    <h1>Preview</h1>
                                 </div>
                            </div>
                        </div>

                        <div class="span6 bg-steel">
                            <div id="workspace" class=""></div>
                        </div>
                
                    </div>
                </div>
                
                <div align="center">
                    <button class="button large danger">SAVE IMAGE</button>
                    <button class="button large default" onclick="window.location = '?r=semantic/index&image=images/model/flight.jpg';">SEMANTIC</button>
                
                </div>
                