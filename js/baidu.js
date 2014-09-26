
/** @namespace */
var Baidu = Baidu || {};

// TODO http://29a.ch/2011/9/11/uploading-from-html5-canvas-to-imgur-data-uri
// able to upload your screenshot without running servers

// forced closure
(function() {


        
  //SIMILAR IMAGE FROM BAIDU
  
    var getSimilarPic = function () {
      
       var obj = this.BD;
       var imgQuerySign = obj.imgQuerySign;
       
       //alert(imgQuerySign);
       
       var url = _createURL(["semantic","similarpic"]);
	   
	   //url = "similar.htm";
	   
       var param = {
            
            imgQuerySign: imgQuerySign
        };
        
        console.log("query:");
        console.log(param);
        
        var success = function (data) {
            //alert(data);
            
            console.log(data);
            
            //remove iframe
            //$("Iframe").remove();
            
            //LIST
            $.each(data.data, function (i,img) {
               
              //if (i>6) return;

               //var url = img.objURL;
               var url = img.flowURL;
               var objURL = img.objURL;
               var desc = img.textHost;
               var fromURL = img.fromURL;
               //console.log(url);
               
               if (url == null) return;
            
           
              var text = '';

              //INIT
                template("#similarpic-tmpl",".ex-container",{

                    originURL: objURL,
                    url: url,
                    description: desc,
                    fromURL: fromURL
                });
            });
            
        }
        
        //GET AJAX
        getAjax(url,param,success);

        return;
       
    }
    
    //BAIDU
    var getBaiKe = function () {
        
         //alert(data.length);
            console.log(this.BD);
            
        var obj = this.BD;

        obj.hasBaiKe = 1;

        if (obj.hasBaiKe == 1) {
                
            console.log("Title: "+obj.baikeTitle);
            console.log("Content: "+obj.baikeText);

            obj.baikeText = '三维模型是物体的多边形表示，通常用计算机或者其它视频设备进行显示。显示的物体是可以是现实世界的实体，也可以是虚构的物体。任何物理自然界存在的东西都可以用三维模型表示。 三维模型经常用三维建模工具这种专门的软件生成';

            //INIT
            template("#baike-tmpl",".ex-container",{
                
                title: obj.baikeTitle,
                description: obj.baikeText
            });
			
			$("#baike-content").bind("mouseup", Kolich.Selector.mouseup);
        }
        
        return;
    }
	
	//BAIDU
	var getBaiduInfo = function () {
		
		//-->BAIDU
		Baidu.getBaiKe();
		
		//-->IFRAME (FOR CACHE IMAGE)
		
			//remove iframe
			$("Iframe").remove();

			$("<Iframe></Iframe>").attr({
				"src": "http://stu.baidu.com/i?ct=3&tn=insimi&pn=0&rn=10&shituRetNum=2&similarRetNum=600&querysign="+Baidu.BD.imgQuerySign
			}).css({
				
				display: "none",
				width: "100%",
				height: "300px"

			}).appendTo("body");
		

		
		//SIMILAR
		setTimeout(function () {
		
			Baidu.getSimilarPic();
			
		},3000);
		
		return;
	};
	
	
	//suggestKwd (SELECT HIGHLIGHT TEXT)
	var suggestKwd = function (text) {
		
		if (text == "") return;
		//-------->
		
		$("#select-text").html("");
		
		//$("<h3/>").html("<strong class='content'>"+text+"</strong>").appendTo("#select-text");
		$("#select-text").append("<h4><span class='content'>"+text+"</span></h4>");
		

		//suggestSubmit
		var suggestSubmit = function (){
			
			var kwd = ($("#select-text .content").text());

			console.log(kwd.length);

			if (kwd.length <10) {

				//add to semantic data
				Semantic.semanticData.push(kwd);
			
				$("<button/>").attr({
					class: "button large default",
					

				}).css("margin","10px").text(kwd).appendTo("#mysemantic");
			}
			
			else
				 $.Notify({
						shadow: true,
						position: 'bottom-right',
						content: "The Sematic you selected so long!!!",
						style: {background: '#1ba1e2', color: 'white'}
					});
									
		};
		
		//ADD BUTTON
		$("<button/>").attr({
			class: "button large"
			
		}).text("Submit").bind("click", suggestSubmit).appendTo("#select-text");
		
		return;
	};
    
	/*translate*/
	var translateSemantic = function(semantic) {

		var url = _createURL(["semantic","translateSemantic"]);
	   

       var param = {
            
            semantic: semantic
        };
       
        var success = function (data) {
            
        	var result = data.trans_result; //result[]

        	$("#translatesemantic").html("");

            for (i in result) {

            	var item = result[i];

            	//CHECK DUPLICATE OF ORIGIN & RESULT
            	if (item.src != item.dst) {

            		$("<button/>").attr({

			            class: "button large success",
			            "data-hint-position": "right",
						"data-hint": item.src 

			        }).css("margin","10px").text(item.dst).appendTo("#translatesemantic");
			    }

            }
            
            console.log(data);
           	
            
        }
        
        //GET AJAX
        getAjax(url,param,success);

		return;
	}

	/**
		TRANSLATE ALL SEMANTIC
	*/
	var translateAll = function() {

		 //url = "similar.htm";
	   var semantic = "";

	   /*$("#semantic-area").find("button").each(function(key,value) {

	   		var obj = $(this);

	   		if (obj.text() != "")
	   			semantic.push(obj.text());
	   })

	   semantic.pop();*/
	   
	   semantic = Semantic.semanticData.join(",");

	   this.translateSemantic(semantic);

	   console.log(semantic);

	   return;
	}

	/**
	MAIN FUNCTION
	*/

	//------->
    Baidu = {
       
        BD: {},
        /**
         PUBLIC
         */

      	//select text
		suggestKwd: suggestKwd,
		
        //getKeyword
        getSimilarPic: getSimilarPic,
        
        //BAIDU BAIKE
        getBaiKe: getBaiKe,
		
			//GET BAIDU
		getBaiduInfo: getBaiduInfo,

		//TRANSLATE
		translateSemantic: translateSemantic,

		translateAll: translateAll

    };

})();



