<?php

class SemanticController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $header = array(
            "title" => "Reports",
            "icon" => "chart-alt",
            "header-color" => "bg-darkEmerald",
            "bg-color" => "bg-emerald"
        );
    public $layout = 'column1';
	
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

	 /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'

        /** @var $image String */
        //$this->layout = false;

        $image = Yii::app()->request->getParam("image");

        //var_dump($method);
        $result = "";


        if ($image != false) {

            //echo $method;
            $this->header = array(
                "title" => "Semantic",
                "icon" => "wrench",
                "header-color" => "bg-dark",
                "bg-color" => "bg-gray"
            );

            $image = Yii::app()->request->getParam("image");

            if ($image != "") {

                //$image = "./video/caribeen.png";

                $semantic = new Baidu($image);

                //BAIDU SHITU URL
                $videoSemanticURL = $semantic->getSemanticFromFile();

                /*HAVE URL FOR SEMANTIC*/
                if ($videoSemanticURL != "") {

                    //URL => SEMANTIC
                    $data = $semantic->getSemanticFromURL($videoSemanticURL);
                    $result = $semantic->getImageInfo($data);
                }

            }
        }

        else {

          $this->header = array(
            "title" => "Semantic",
            "icon" => "wrench",
            "header-color" => "bg-darkGreen",
            "bg-color" => "bg-darkGreen"
            );

        }

		$this->render('index', array(
               "result" => $result,
               "image" => $image
        ));
	}
	
	 /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
  
         public function actionSimilarPic() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'
             
              $this->layout = false;

             $result = "{}";
                       
		  
          $querysign = Yii::app()->request->getParam("imgQuerySign");

         if ($querysign != "" ) {
         $semantic = new Baidu($querysign);     
         $result =  $semantic->getSimilarImage($querysign);
         }
                  
		//OUTPUTm
        $this->render('similarpic', array(
            "result" => $result
         ));
	}
   
   //GET SUGGEST
    public function actionGetSuggest() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'
        
        $this->layout = false;
		
		 $kwd = Yii::app()->request->getParam("term");
            $result = array();
			
			
		  if ($kwd != "") {
            
                $semantic = new BaiduService("");
                
              
                $result = $semantic->getSuggest($kwd);
                
                //var_dump($result);                       

                
           }
			
			  //OUTPUT
            $this->render('getsuggest', array(
                "result" => $result
             ));
	}
   
        
        
         /**
         * TRANSLATE SEMANTIC
         */
         public function actionTranslateSemantic() {
             
              $this->layout = false;
                       
		  
          $semantic = Yii::app()->request->getParam("semantic");

           $baidu = new BaiduService("");
           $result =  $baidu->translate($semantic);
           
           
                  
            //OUTPUTm
            $this->render('translateSemantic', array(
                "result" => $result
             ));
	}
        
       /**
         * 
         * GET MULTI-IMAGE FROM SEMANTIC
         */
         public function actionGetSemanticImage() {
             
           $this->layout = false;
                       
		  
           $querysign = Yii::app()->request->getParam("semantic");

           $semantic = new Semantic("");     
           $result =  $semantic-> getDirectory("./images/");

           
                  
            //OUTPUTm
            $this->render('getSemanticImage', array(
                "result" => $result
             ));
	}
   
   /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionGetSemantic() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'
        
        $this->layout = false;
        
           
        try
        {
            $url = Yii::app()->request->getParam("image");
            $result = array();
            
            if ($url != "") {
            
                $semantic = new Baidu($url);     

                $data = $semantic->getSemanticFromURL(false);
                $result = $semantic->getImageInfo($data);           

            }
            
        
        }
        catch (Exception $e)
        {
                    echo $e->getMessage();
        }
        
         //OUTPUT
            $this->render('getsemantic', array(
                "result" => $result
             ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {

        $this->layout = false;

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
