<?php

class SettingsController extends Controller {

    /**
     * Declares class-based actions.
     */
    public $header = array(
            "title" => "Screen lock",
            "icon" => "lock",
			"header-color" => "gray",
			"bg-color" => "bg-gray"
        );
    //public $layout = 'column1';

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
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $this->header = array(
            "title" => "Settings",
            "icon" => "wrench",
            "header-color" => "dark",
            "bg-color" => "bg-gray"
        );

        $this->render('index');
    }

            
    public function actionCharacters() {
        // renders the view file 'protected/views/site/characters.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "Characters",
            "icon" => "type",
	"header-color" => "bg-darkBlue",
            "bg-color" => "bg-lightBlue"
        );

        $this->render('characters');
    }
    
            
    public function actionAddCharacter() {
        // renders the view file 'protected/views/site/addcharacter.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "Add Characters",
            "icon" => "plus-2",
	"header-color" => "bg-darkBlue",
            "bg-color" => "bg-lightBlue"
        );

        $this->render('addcharacter');
    }
    
    public function actionDeleteCharacter() {
        // renders the view file 'protected/views/site/deletecharacter.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "Delete Characters",
            "icon" => "remove",
	"header-color" => "bg-darkBlue",
            "bg-color" => "bg-lightBlue"
        );

        $this->render('deletecharacter');
    }

    public function actionSetInput() {
        // renders the view file 'protected/views/site/setinput.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "Set input character",
            "icon" => "key",
	"header-color" => "bg-darkBlue",
            "bg-color" => "bg-lightBlue"
        );

        $this->render('setinput');
    }
    
      public function actionScreenlock() {
        // renders the view file 'protected/views/site/screenlock.php'
        // using the default layout 'protected/views/layouts/main.php'

        $this->header = array(
            "title" => "Screen lock",
            "icon" => "locked",
            "header-color" => "bg-darkViolet",
            "bg-color" => "bg-violet"
        );

        $this->render('screenlock');
    }
    
    public function actionReports() {
        // renders the view file 'protected/views/site/reports.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "Reports",
            "icon" => "chart-alt",
            "header-color" => "bg-darkEmerald",
            "bg-color" => "bg-emerald"
        );

        $this->render('reports');
    }
    
    public function actionTable() {
        // renders the view file 'protected/views/site/table.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "View as table",
            "icon" => "clipboard-2",
	"header-color" => "bg-darkEmerald",
            "bg-color" => "bg-emerald"
        );

        $this->render('table');
    }
    
    public function actionGraph() {
        // renders the view file 'protected/views/site/graph.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "View as graph",
            "icon" => "stats-3",
	"header-color" => "bg-darkEmerald",
            "bg-color" => "bg-emerald"
        );

        $this->render('graph');
    }
    
     public function actionCalendar() {
        // renders the view file 'protected/views/site/calendar.php'
        // using the default layout 'protected/views/layouts/main.php'
        //var_dump(Yii::app()->request);
        //echo var_dump(Yii::app()->request->getParam("ids"));
        //echo var_dump(Yii::app()->request->getParam("name"));
        //echo $_GET['name'];

        $this->header = array(
            "title" => "Select time",
            "icon" => "calendar",
	"header-color" => "bg-darkEmerald",
            "bg-color" => "bg-emerald"
        );

        $this->render('calendar');
    }
    
       public function actionSystem() {
        // renders the view file 'protected/views/site/system.php'
        // using the default layout 'protected/views/layouts/main.php'

        $this->header = array(
            "title" => "System",
            "icon" => "equalizer",
            "header-color" => "bg-darkOrange",
            "bg-color" => "bg-orange"
        );

        $this->render('system');
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
