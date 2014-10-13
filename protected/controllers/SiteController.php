<?php

class SiteController extends Controller {

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

        //$this->layout = false;

          $this->header = array(
            "title" => "Settings",
            "icon" => "wrench",
            "header-color" => "dark",
            "bg-color" => "bg-dark"
        );
		
	    $this->render('intro');
    }
	
	 /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionView3d() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'

            $this->header = array(
               "title" => "actionView3d",
               "icon" => "enter",
               "header-color" => "bg-dark",
               "bg-color" => "bg-gray"
           );
		
            $this->render('view3d');
	}
        
     public function actionCompare() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'
             
              //$this->layout = false;
              
            $this->header = array(
               "title" => "actionView3d",
               "icon" => "enter",
               "header-color" => "bg-darkGreen",
               "bg-color" => "bg-black"
           );
		  
         // $querysign = Yii::app()->request->getParam("imgQuerySign");
         
       //  $semantic = new Semantic($querysign);     
        // $result =  $semantic->getSimilarImage($querysign);
                
                  
		//OUTPUT
        $this->render('compare');
	}
   
 
	
    public function actionSaveImage() {
        // renders the view file 'protected/views/site/login.php'
        // using the default layout 'protected/views/layouts/main.php'
        
        
        $this->layout = false;
    	
         $image = Yii::app()->request->getParam("image");
         $result = array("result"=>"");

        /*DIRECTORY*/
        $dir = Yii::app()->request->getParam("dir");

        if ($dir != "") {
            $dir = Yii::app()->request->getParam("dir")."/";
            //$dir = "video/dolphin-oceans-clip/";
        }
        else
            $dir = 'images/';

        /*----SAVING----*/


            if ($image != "") {

                $semantic = new Semantic($image);     
                $data = $semantic->saveImage($dir);
                
                $result["result"] = $data;
            }
        
         //OUTPUT
            $this->render('saveimage', array(
                "result" => $result
             ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
