<?php 
	require_once("../includes/functions.php");
	require_once("../includes/config.php");
?>
<?php
	$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	check_connection($conn);
	$db = mysql_select_db(DB_DATABASE);
	check_database($db);
?>
