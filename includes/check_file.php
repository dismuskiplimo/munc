<?php 
	if(!file_exists("includes/config.php")){
		redirect_to("admin/welcome.php");
	}
	else{
		if(filesize("includes/config.php")<50){
			unlink("includes/config.php");
			redirect_to("admin/welcome.php");
		}
	}
?>