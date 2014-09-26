<?php

class VideoController extends Controller {


	 /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = "video";

        /*GET VIDEO*/
        $semantic = new Semantic("");
        $result =  $semantic-> getDirectory("./video/");


        //OUTPUTm
        $this->render('index', array(
            "video" => $result
        ));

	}

    public function actionPreview() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->layout = "video";

        /*DIRECTORY*/

        /** @var $video_title TYPE_NAME */
        $video_title = Yii::app()->request->getParam("title");

        if ($video_title == "") {
            $video_title = "oceans-clip";
        }

        /** @var $poster string */
        $poster = "./video/".$video_title.".png";

        //echo $dir;
        /*GET VIDEO*/

        $dir = "./video/".$video_title."/";

        $semantic = new Semantic("");
        $result =  $semantic-> getDirectory($dir);

        //var_dump($result);

        $this->render('preview', array(
            "video" => $result,
            "title" => $video_title,
            "poster" => $poster
        ));
    }

    /**
     *
     * GET MULTI-IMAGE FROM SEMANTIC
     */
    public function actionGetVideoCollect() {

        $this->layout = false;


        //$querysign = Yii::app()->request->getParam("semantic");

        $semantic = new Semantic("");
        $result =  $semantic-> getDirectory("./video/");



        //OUTPUTm
        $this->render('GetVideoCollect', array(
            "result" => $result
        ));
    }

    /*
     * semantic video
     * */
    public function actionGetSemantic() {
        // renders the view file 'protected/views/site/intro.php'
        // using the default layout 'protected/views/layouts/main.php'

        $this->layout = false;

        try
        {

            $image = Yii::app()->request->getParam("image");
            $result = "{}";

            if ($image != "") {

                $image = "./video/caribeen.png";

                $semantic = new Baidu($image);

                //BAIDU SHITU URL
                $videoSemanticURL = $semantic->getSemanticFromFile();

                //URL => SEMANTIC
                $data = $semantic->getSemanticFromURL($videoSemanticURL);
                $result = $semantic->getImageInfo($data);

            }


        }
        catch (Exception $e)
        {
            $e->getMessage();
        }

        //OUTPUT
        $this->render('getsemantic', array(
            "result" => $result
        ));
    }


	 /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */

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
