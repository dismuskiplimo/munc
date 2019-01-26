<?php 
	require_once("sessions.php");
	require_once("../includes/functions.php");
?>
<?php check_logged_in();?>
<?php $page_title="Dashboard";?>

<?php
	/*
	** Get Core files
	*/
	require_once("check_file.php");
	require_once("db_con.php");
	
?>

<!--HEADER-->
<?php require_once("plain-header.php");?>
<div class="container center">
	<h1>Welcome <?php echo $_SESSION['username'];?> to your admin dashboard</h1>
	<h2 class = "bg-danger">What would you like to do</h2>
	<div class="row wide center">
		<a href = "edit_main.php" class = "btn btn-lg btn-success"><span class="glyphicon glyphicon-list-alt"></span> Edit pages</a><br /><br /><br />
		<a href = "users.php" class = "btn btn-lg btn-info"><span class="glyphicon glyphicon-user"></span> Add or remove users Users</a><br /><br /><br />
		<a href = "logout.php" class = "btn btn-lg btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</a><br />
	</div>
</div>
<?php require_once("plain-footer.php");?>