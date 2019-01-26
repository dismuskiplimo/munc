<?php require_once("../includes/functions.php");?>
<?php require_once("check_file.php");?>
<?php require_once("../includes/config.php");?>
<?php 
	if(isset($_POST['user_create'])){
		$required_fields = array("user_name" => "Username","password" => "password", "cpassword" => "Confirm password");
		foreach($required_fields as $field=> $desc){
			if(empty($_POST[$field]) || !isset($_POST[$field]) || is_null($_POST[$field])){
				$errors[] = $desc;
			}
		}
		if(empty($errors)){
			$username = trim(sanitize_query($_POST['user_name']));
			$password = trim(sanitize_query($_POST['password']));
			$cpassword = trim(sanitize_query($_POST['cpassword']));
			$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
			check_connection($conn);
			$selected_db = mysql_select_db(DB_DATABASE);
			if($password === $cpassword){
				$hpassword = sha1($password);
				$query = "CREATE TABLE IF NOT EXISTS users(id INT(11) AUTO_INCREMENT NOT NULL, username VARCHAR(150), password VARCHAR(40), PRIMARY KEY(id))";
				if(mysql_query($query)){
					$query = "INSERT INTO users(username,password) VALUES('$username','$hpassword')";
					if(mysql_query($query)){	
						redirect_to("confirm.php");
					}
					else{
						$msg = "<p class=\"center alert alert-danger\">Failed, Ensure that you have proper permissions</p>";
					}
				}
				else{
					$msg = "<p class=\"center alert alert-danger\">Failed, Ensure that you have proper permissions</p>";
				}
			}
			else{
				$msg = "<p class=\"center alert alert-danger\">Failed, the passwords you provided don't match</p>";
			}
		}
		else{
			$msg="<p class=\"center alert alert-danger\">Please fill in the form completely to proceed</p>";
		}
	}
?>
<?php require_once("plain-header.php");?>
<div class="container">
	<div class="container">
		<form class="navbar-form" action="create_user.php" method="post">
			<div class="row">
				<h3 class="center px10top">Create initial user account</h1>
			</div>
			<div class="row">
				<div class="col-lg12">
					<div class="px10top" style="float:left;">
						<input type="text" name="user_name" class="form-control center" value="<?php if(isset($username) && !empty($username) && !is_null($username)){echo $username;}?>" placeholder="username" aria-required ="true" required />
						<input type="password" name="password" class="form-control center" value="" placeholder="password" aria-required ="true" required />
						<input type="password" name="cpassword" class="form-control center" value="" placeholder="confirm password" aria-required ="true" required />
					</div>
					<div class="px10top px10rt" style="float:left;">
						<input type="submit" value="Proceed" name="user_create" class="btn btn-success "/>
					</div>
				</div>
			</div>
			<div class="row">
				<p class=" px10top">
					NB : You will use this account to log in for the first time.
				</p>
			</div>
			<div class="row">
			<?php if(isset($msg) && !empty($msg)){echo $msg;}?>
			</div>
		</form>
	</div>
</div>
<?php require_once("plain-footer.php");?>