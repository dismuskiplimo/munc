<?php require_once("../includes/functions.php");?>
<?php require_once("check_file.php");?>
<?php require_once("../includes/config.php");?>
<?php 
	if(isset($_POST['db_create'])){
		if(empty($_POST['db_name']) || !isset($_POST['db_name'])){
			$msg="<p class=\"center alert alert-danger\">Please fill in the form to proceed</p>";
		}
		else{
			$database = $_POST['db_name'];
			$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			check_connection($conn);
			$query = "DROP DATABASE IF EXISTS ". $database;
			if(mysql_query($query)){
				$query = "CREATE DATABASE ". $database;
				if(mysql_query($query)){
					$file = fopen("../includes/config.php", "w");
					$start="<?php ";
					$db = "define(\"DB_DATABASE\", \"$database\");";
					$server = "define(\"DB_SERVER\", \"".DB_SERVER."\");";
					$user = "define(\"DB_USER\", \"".DB_USER."\");";
					$pass = "define(\"DB_PASS\", \"".DB_PASS."\");";
					$end=" ?>";
					fwrite($file,$start);
					fwrite($file,$server);
					fwrite($file,$user);
					fwrite($file,$pass);
					fwrite($file,$db);
					fwrite($file,$end);
					fclose($file);
					redirect_to("create_user.php");
				}
				else{
					$msg = "<p class=\"center alert alert-danger\">Failed, Ensure that you have proper permissions</p>";
				}
			}
			else{
				$msg = "<p class=\"center alert alert-danger\">Failed, Ensure that you have proper permissions</p>";
			}
		}
	}
?>
<?php require_once("plain-header.php");?>
<div class="container">
	<div class="container">
		<form class="navbar-form" action="create_db.php" method="post">
			<div class="row">
				<h3 class="center px10top">Select Database</h1>
			</div>
			<div class="row">
				<div class="col-lg12">
					<div class="px10top" style="float:left;">
						<input type="text" name="db_name" class="form-control center" value="dis_table" placeholder="Database Name" aria-required ="true" required />
						<p style="padding:5px 10px;">
							Database name
						</p>
					</div>
					<div class="px10top px10rt" style="float:left;">
						<input type="submit" value="Proceed" name="db_create" class="btn btn-success "/>
					</div>
				</div>
			</div>
			<div class="row">
				<p class=" px10top">
					NB if a similar database with a similar name is found, the database will be deleted before
					creating the new database.
				</p>
			</div>
			<div class="row">
			<?php if(isset($msg) && !empty($msg)){echo $msg;}?>
			</div>
		</form>
	</div>
</div>
<?php require_once("plain-footer.php");?>