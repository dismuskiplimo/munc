<?php require_once("../includes/functions.php");?>
<?php
	if(isset($_POST['db_process'])){
		$errors = array();
		$fields= array('db_name' => 'User Name','db_server' => 'Database Server');
		foreach($fields as $field => $error){
			if(empty($_POST[$field]) || !isset($_POST[$field])){
				$errors[]=$error;
			}
		}
		if(empty($errors)){
			$server = $_POST['db_server'];
			$username = $_POST['db_name'];
			$password = $_POST['db_pass'];
			if(@mysql_connect($server,$username,$password)){
				$file = fopen("../includes/config.php", "w");
				$start="<?php ";
				$f_user = "define(\"DB_USER\", \"$username\"); ";
				$f_pass = "define(\"DB_PASS\", \"$password\"); ";
				$f_server = "define(\"DB_SERVER\", \"$server\"); ";
				$end=" ?>";
				fwrite($file, $start);
				fwrite($file, $f_server);
				fwrite($file, $f_user);
				fwrite($file, $f_pass);
				fwrite($file, $end);
				fclose($file);
				redirect_to("create_db.php");
			}
			
			else{
				$msg="<p class=\"center alert alert-danger\">There was an error connecting to the database please ensure that you have the proper credentials or visit your database administrator for allocation</p>";
			}
			
		}
		else{
			if(count($errors)==1){
				$msg = "<p class=\"center alert alert-danger\"> You missed the following field <br />" . implode(" , ", $errors) . "</p>";
			}
			else{
				$msg = "<p class=\"center alert alert-danger\"> You missed the following fields <br />" . implode(" , ", $errors) . "</p>";
			}
		}
	}
?>
<?php require_once("plain-header.php");?>
<div class="container">
	<div class="row">
		<h1 class="">Please fill in the following database credentials</h1>
		<form class="navbar-form" action="connect_db.php" method="post">
			<div class="col-lg-2 col-md-3 col-sm-4  px10top">
				<input type="text" name="db_name" class="form-control" placeholder="Username" aria-required ="true" required />
				<p style="padding:5px 10px;">
					Database Username
				</p>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 px10top">
				<input type="password" name="db_pass" class="form-control" placeholder="Database password" />
				<p style="padding:5px 10px;">
					Database Password
				</p>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 px10top">
				<input type="text" name="db_server" class="form-control" value="localhost" placeholder="Database Server" aria-required ="true" required />
				<p style="padding:5px 10px;">
					Database Server, it's probably 'localhost', if not, consult your Database administrator
				</p>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-12 px10top">
				<input type="submit" name="db_process" value="Proceed" class="btn btn-success pull-right" />
			</div>
		</form>
	</div>
	<div class="row">
		<?php if(isset($msg) && !empty($msg)){echo $msg;}?>
	</div>
</div>
<?php require_once("plain-footer.php");?>