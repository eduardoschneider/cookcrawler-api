<?php
	echo "<b>Barramentos:</b><br><br>";
    if ($handle = opendir('./engine/interactor')) {
            
		while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != "..") {
				if($entry != "base.php"){
					
					$url = $_SERVER ['HTTP_HOST'] ."/". explode('/', $_SERVER['REQUEST_URI'])[1]."/api/";				
					echo $url 					    
						.str_replace(".php","",$entry)
						."<br>";

				}
			}
		}
            
		closedir($handle);
	}
?>