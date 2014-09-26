/** @namespace */
var Semantic = Semantic || {};

// TODO http://29a.ch/2011/9/11/uploading-from-html5-canvas-to-imgur-data-uri
// able to upload your screenshot without running servers

// forced closure
(function() {


        
    //SAVE IMAGE
    var saveImage = function () {
        
         var url = _createURL(["site","saveimage"]);
        var param = {
            //image: encodeURIComponent(this.image)
            image: (this.image)
        };
        var success = function (data) {
                        
            console.log(data);
        }
        
        //GET AJAX
        getAjax(url,param,success,"post");
    }
    

    //var btnStyle = [.default, .primary, .info, .success, .warning, .danger, .inverse]
    
	//INPUT
	var inputSemantic = function () {
		
		var kwd = $("#input-semantic").val();
		
		Semantic.semanticData.push(kwd);
		
		$("<button/>").attr({
            class: "button large default"
          }).css("margin","10px").text(kwd).appendTo("#mysemantic");
		
		return;
	};
	
	/**
	GET SUGGEST
	*/
	var getSuggest = function (kwd, response ) {
		
		var url = _createURL(["semantic","getSuggest"]);
        var param = {
            term: kwd
        };
		
		 var success = function (data) {
			 
			 console.log(data);
			 response(data.s);
		 }
		 
		 //GET AJAX
         getAjax(url,param,success,"get");
	};
    
	/**
	SUGGEST INIT
	*/
	var getSuggestInit = function(obj) {
		
		console.log(obj);	
		$.each(obj.s, function (i,item) {
			
			//alert(item);
		});
	}
	
	//semantic func
    /**
    param: 
      image: the img src (remote or local)
      begin: true or false (the first)
    */

    var getSemantic = function (image, status) {
      
        var url = _createURL(["semantic","getsemantic"]);
        var param = {
            image: image
        };
		
		    if (image == null) url = "semantic.htm";
		    var status = status || 'begin';
        
        this.image = image;

        //-----
        if (status == 'begin')
          var success = this.semanticBeginSuccess;
        
        else
          var success = this.semanticContinueSuccess;
        
        console.log("Status: "+status);
        //console.log(success);          
        
		//GET AJAX
        getAjax(url,param,success,"get","text");
        
		console.log(image);
		
        return;
    };
	
	
  //------>
  //BEGIN SUCCESS
  var semanticContinueSuccess = function (data) {
          
          //INSTALL
          var image = Semantic.image;
          
          eval("Baidu.BD = "+data);
          
          //KEYWORK
          console.log(Baidu.BD.keyword.split("*"));
        
       /**       
       INIT
       */
      
       //-->DISPLAY SEARCH SEMANTIC IMAGE
          //PRINT IMAGE
          imgDisplay(image, "#img-area");

       
        var color = "danger";
		
		  //--CHANGE COLOR WITH THE LAST BTN
         if ($("#semantic-area .content:first").find("button:last").hasClass("danger"))
          color = "default";

     
		//LOOP
    //-->DISPLAY SEMANTIC
        var keyword = Baidu.BD.keyword.split("*");
        Semantic.semanticDisplay(keyword);

    return;
  };

  //BEGIN SUCCESS
  var semanticBeginSuccess = function (data) {

          //INSTALL
          /*DISPLAY IMAGE*/
          var image = Semantic.image;
          console.log(image);
          //---------->
          
          
          /*DONT HAVE SEMANTIC*/
          if (data == "") {

              //PRINT IMAGE
              imgDisplay(image, ".ex-container");

              $(".ex-container").append('<p class="header">Dont have any Semantic! Sorry</p>');
              return;
          }

          /*-------HAVE SEMANTIC----------*/

          eval("Baidu.BD = "+data);
          
          //KEYWORK
          console.log(Baidu.BD.keyword.split("*"));
          
        //--HEADER
          $(".ex-container").html('<p class="header">Semantic:</p>');
          
          
       /**       
       INIT
       */
        template("#semantic-tmpl",".ex-container",{});

        //PRINT IMAGE
        imgDisplay(image, "#img-area");
        
    		//----------->
    		//AUTO COMPLETE
    		$( "#input-semantic" ).autocomplete({
    		  //source: _createURL(["semantic","getSuggest"]),
    		  
    		    source: function( request, response ) {
    				
    				Semantic.getSuggest(request.term, response);
    			},
    		  
    		   		  
    		  minLength: 2,
    		  select: function( event, ui ) {
    			console.log(ui);
    		  }
    		});
		
		
        //-->DISPLAY SEMANTIC
        var keyword = Baidu.BD.keyword.split("*");
        Semantic.semanticDisplay(keyword);
            
      //---------------->
          
    		//GET BAIDUINFO
    		Baidu.getBaiduInfo();
      
         return;
    }

    /*PRINT SEMANTIC*/
    var semanticDisplay = function(keyword) {

         //LOOP
        $.each(keyword, function (i,item) {
          
          if (item == "") return;
          
        //--add keyword
          Semantic.semanticData.push(item);

          $("<button/>").attr({
            class: "button large danger"
          }).css("margin","10px").text(item).appendTo("#semantic-area .content:first");
        })

        return;
    }

	//------------>
	
    //SEMANTIC
    Semantic = {
        //PRIVATE
        image: "",
        host: "",

        //STORE THE SEMANTIC
        //semanticKwd: [],
        
        semanticData: [],
        //------>
		  /**
         PUBLIC
         */
		
	
		
        //SAVE IMAGE TO DB
        saveImage: saveImage,
        
		//COMPARE
        //compareImage: compareImage,
        
		//getKeyword
        getSemantic: getSemantic,
		
		/**
		SUGGEST
		*/
		
		getSuggest: getSuggest,
		
		//SUGGEST INIT
		getSuggestInit: getSuggestInit,		
		//---------->
		
		//INPUT BY HAND
		inputSemantic: inputSemantic,
        //--->
        //success

          //BEGIN
         semanticBeginSuccess: semanticBeginSuccess, 

         //CONTINUE BY SIMILAR PIC
         semanticContinueSuccess: semanticContinueSuccess,

         /*display*/
         semanticDisplay: semanticDisplay
        
        
    };

})();
