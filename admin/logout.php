<?php require_once("sessions.php");?>
<?php require_once("../includes/functions.php");?>
<?php 
		$_SESSION = array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),'',time()-(60*60*24*7), '/');
		}
		session_destroy();
		redirect_to("../login.php?logout=1");
?>
