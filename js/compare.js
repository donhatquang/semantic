
/** @namespace */
var Compare = Compare || {};

// TODO http://29a.ch/2011/9/11/uploading-from-html5-canvas-to-imgur-data-uri
// able to upload your screenshot without running servers

// forced closure
(function() {


        
  //SIMILAR IMAGE FROM BAIDU
  
    var AnalyzeRGB = function (img) {
      	
    	//INIT IMAGE
    	  //-->DISPLAY SEARCH SEMANTIC IMAGE
        $('<div class="image-container shadow" ></div>').css("width","400px").append($("<img/>").attr({
          
          src: img
          
        })).appendTo("#img-area");


      	//RESULT
       var AnalyzeResult = function (data) {

       		console.log(data);
			
            $.each(data, function (i,e) {
				
				$("<h3/>").html(i).appendTo("#analyze-result");
				
            	//INIT
            	$("<div class='progress-bar large' />").attr({

            		"data-role": "progress-bar",
            		"data-value": e,
					      "data-color": "bg-"+i

            	}).appendTo("#analyze-result");
            	        

            });

            return data;
            /*
            {
              red: 255,
              green: 255,
              blue: 255,
              brightness: 255
            }
            */
       };

       var api = resemble(img).onComplete(AnalyzeResult);
       
	   return;
    };
    

    //similarAnalyze Image
    var similarAnalyze = function (pic1, pic2) {
        
  		//COMPLETE
  		var onComplete = function(data){
  			
  			var time = Date.now();
  			var diffImage =  data.getImageDataUrl();
  			
  			//COMPARE
  			var compare_image = $('<div class="image-container shadow" ></div>').css("width","400px").append(
            $("<img/>").attr({
            
            		src: diffImage,
                onClick: "window.open(this.src, '_blank');"
            
          	})).wrap("<div/>").parent().html();

        //MATCH PERCENT
        var match_value = 100-Math.round(data.misMatchPercentage);

        //INIT
        var compare_match = $("<div class='progress-bar large' />").attr({

          "data-role": "progress-bar",
          "data-value": match_value,
          "data-color": "bg-red"

        }).wrap("<div/>").parent().html();


         //INIT
            template("#compare-img-tmpl",".compare-result",{
                
                compare_image: compare_image,
                match_percent: match_value,
                compare_match: compare_match,
                compare_dimension: data.isSameDimensions.toString(),
                compare_time: data.analysisTime
            });

			
  			console.log(data);
  		};
		
         
        var resembleControl = resemble(pic1).compareTo(pic2).onComplete(onComplete);
        
        return;
    };
	 
   //-----------------

      //GET MULTI
     var getSemanticImage = function (semantic) {
      
        var url = _createURL(["semantic","getSemanticImage"]);
        var param = {
            semantic: semantic
        };
        
      
       
        var success = function(data) {

            //LOOP
            for (i in data) {

              var item = data[i];

              $('<div class="image-container shadow"></div>').css({
                
                width: "100px"
              }).append(
                  
                  $("<img/>").attr({
                      src: item.url
                  })

               ).bind("click", function () {
                
                  var src = $(this).find("img").attr("src");

                  if ($(this).hasClass("selected")) {
                      
                      var tmp = Compare.compareImg;

                      // TO compareImg
                      tmp = $.grep(tmp, function (value) {

                          return value !== src;
                      });

                      Compare.compareImg = tmp;

                      $(this).removeClass("selected");
                  }
                  else {
                      $(this).addClass("selected");

                      //ADD TO compareImg
                      Compare.compareImg.push(src); 

                  }

                   console.log(Compare.compareImg);
                    
              }).appendTo("#multi-thumbnail");
            }
        };
        
        
    //GET AJAX
        getAjax(url,param,success,"get");
        
    
    
        return;
    };

    //MULTI COMPARE
    var multiCompare = function() {

      $(".compare-result").html("");

      //LOOP ALL SELECTED IMG
      for (i in this.compareImg) {

        var item = this.compareImg[i];

        console.log(item);

        this.similarAnalyze(fileData, item);
      }

      return;
    }

	//------->
    Compare = {
        
        compareImg: [], //PUSH IN ON CLICK

        AnalyzeRGB: AnalyzeRGB,
        /**
         PUBLIC
         */

         //getSemanticImage
         getSemanticImage: getSemanticImage,

      	//similarAnalyze
		    similarAnalyze: similarAnalyze,

        multiCompare: multiCompare

        //GET MULTI IMAGE

		
    };

})();



