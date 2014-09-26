<?php

$dir = array("settings","site");

for ($a=0;$a<count($dir);$a++) {

$current_dir = $dir[$a];

if ($handle = opendir('./protected/views/'.$current_dir)) {
    //echo "Directory handle: $handle\n";
    //echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        
    	//echo $entry."\n";

		if (strpos($entry,".php")) {
			
	//		if (strpos($entry,"CarView_"))
	
				//echo "<a href='$entry?car_id=13'></a>\n"; 
			
			//else 
			$entry = str_replace("php","html",$entry);
			echo "<a href='$current_dir-$entry'>$current_dir-$entry</a><br/>\n"; 
			
		}
    }

    /*/* This is the WRONG way to loop over the directory. */
    /*while ($entry = readdir($handle)) {
        echo "$entry\n";
    }*/

    closedir($handle);
}
}
?>
