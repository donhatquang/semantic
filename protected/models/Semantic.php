<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semantic
 *
 * @author donhatquang
 */
class Semantic {
    //put your code here
     //SAVE 64
    private $imgURL;
    
    public function __construct($imgURL) {
        
        $this->imgURL = $imgURL;
    }

        //SAVE IMAGE
        public function saveImage($dir) {

            define('UPLOAD_DIR', $dir);

            $img = $this-> imgURL;

            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

                //UNIQUE ID
                $id = uniqid();

            $file = UPLOAD_DIR . $id . '.png';

            /*CHECK DIR*/
            //echo UPLOAD_DIR;

            if(file_exists (UPLOAD_DIR) == false)
                mkdir(UPLOAD_DIR);

            $success = file_put_contents($file, $data);

            return $success ? $file:"";

        }
        
        //GET IMAGE DIRECTORY
        public function getDirectory($dir) {
            
            $data = array();
            $count = 1;
            
            if ($handle = opendir($dir)) {
            //echo "Directory handle: $handle\n";
            //echo "Entries:\n";

                /* This is the correct way to loop over the directory. */
                while (false !== ($entry = readdir($handle))) {

                    list($title) = explode(".",$entry);
                    $item = array(
                        
                      "url" => $dir.$entry,
                      "title" => $title,
                      "id" => $count
                      
                    );
                    
                    if (strpos($entry,".png") || strpos($entry,".jpg") ) {
                        
                        //echo $entry;
                        array_push($data, $item);
                        $count++;
                    }
                }
            }
            
        closedir($handle);
        
        return $data;
        }
        
        
}
