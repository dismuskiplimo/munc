<?php $page_title="Dashboard";?>

<?php
	/*
	** Get Core files
	*/
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	if(isset($_POST['adduser'])){
		$required_fields = array("Username" => "username", "Password" => "password", "Confirm Password" => "cpassword");
		$errors = Array();
		foreach($required_fields as $fieldname => $field){
			if(!isset($_POST[$field]) || empty($_POST[$field])){
				$errors[] = $fieldname;
			}
		}
		if(empty($errors)){
			$username = trim(sanitize_query($_POST['username']));
			$password = trim(sanitize_query($_POST['password']));
			$cpassword = trim(sanitize_query($_POST['cpassword']));
			if($password ===$cpassword){
				$hpassword = sha1($cpassword);
				$query = "INSERT INTO users(username,password) VALUES('$username','$hpassword')";
				if(mysql_query($query)){
					$msg = "<p class = \"bg-success yote\"><span class = \"glyphicon glyphicon-ok\"></span> User added succesfully</p>";
					unset($username);unset($_POST['username']);unset($_POST['password']);unset($_POST['edituser']);unset($_POST['cpassword']);
				}
				else{
					$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> Somethings not right, please try again</p>";
				}
			}
			else{
				$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> The passwords you provided dont match, please try again</p>";
			}
		}
		else{
			$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> missing field(s), please try again</p>";
		}
	}
	
	if(isset($_POST['edituser'])){
		$required_fields = array("username","password");
		foreach($required_fields as $field){
			if(is_null($_POST[$field]) || empty($_POST[$field]) || !isset($_POST[$field])){
				$errors[] = $field;
			}
		}
		if(empty($errors)){
			$id = sanitize_query($_SESSION['user_id']);
			$username1 = sanitize_query($_POST['username']);
			$password = sha1(sanitize_query($_POST['password']));
			$query = "UPDATE users SET username = '$username1' WHERE id = $id AND password = '$password' LIMIT 1";
			mysql_query($query);
			if(mysql_affected_rows() == 1){
				
				$msg = "<p class = \"bg-success yote\"><span class = \"glyphicon glyphicon-ok\"></span> username updated successfully</p>";
				$_SESSION['username'] = $username1;
				unset($_POST['id']);unset($_POST['username']);unset($_POST['password']);unset($_POST['edituser']);
	
			}
			else{
				$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> access denied, the password you provided does not match with the one in our database</p>";
			}
		}
		else{
			$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> missing field(s), please try again</p>";
		}
	}
	
	if(isset($_POST['removeuser'])){
		
		$id = htmlentities(sanitize_query($_POST['id']));
		$password = sha1(sanitize_query($_POST['password']));
		$rows = select_all("users","id",5);
		if(mysql_num_rows($rows) > 1){
			$query = "DELETE FROM users WHERE id = $id AND password = '$password'";
			mysql_query($query);
			if(mysql_affected_rows() == 1){
				if($id === $_SESSION['user_id']){redirect_to("logout.php");}
				$msg = "<p class = \"bg-success yote\"><span class = \"glyphicon glyphicon-remove-sign\"></span> user has been removed successfully</p>";
				unset($_POST['id']);unset($_POST['removeuser']);unset($_POST['password']);
			}
			else{
				$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> user not removed becasue the password you provided is incorrect</p>";
			}
		}
		else{
			$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> user not removed beasuse only one user has been left and the website cannot remain without users</p>";
		}
	}
	
	if(isset($_POST['editpassword'])){
		$required_fields = array("oldpass","newpass","cnewpass");
		foreach($required_fields as $field){
			if(is_null($_POST[$field]) || empty($_POST[$field]) || !isset($_POST[$field])){
				$errors[] = $field;
			}
		}
		if(empty($errors)){
			$id = sanitize_query($_SESSION['user_id']);
			if($_POST['newpass'] === $_POST['cnewpass']){
				$password = sha1(sanitize_query($_POST['oldpass']));
				$newpass = sha1(sanitize_query($_POST['newpass']));
				$query = "UPDATE users SET password = '$newpass' WHERE id = $id AND password = '$password' LIMIT 1";
				mysql_query($query);
				if(mysql_affected_rows() == 1){
					$msg = "<p class = \"bg-success yote\"><span class = \"glyphicon glyphicon-ok\"></span> password changed successfully</p>";
					unset($_POST['oldpass']);unset($_POST['newpass']);unset($_POST['editpassword']);
				}
				else{
					$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> access denied, the password you provided does not match with the one in our database</p>";
				}
			}
			else{
				$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> the passwords provided dont match, please try again</p>";
			}
		}
		else{
			$msg = "<p class = \"bg-danger yote\"><span class = \"glyphicon glyphicon-warning-sign\"></span> missing field(s), please try again</p>";
		}
	}
	
	$users = select_all("users","id",100);
	$users1 = select_all("users","id",100);
?>

<!--HEADER-->
<?php require_once("plain-header.php");?>
<div class="container center">
	<h1 class = "bg-danger"><span class = "glyphicon glyphicon-user"> <?php echo $_SESSION['username'];?>, add, edit or remove users</span></h1>
	<?php if(isset($msg) && !empty($msg)){ echo $msg;}?>
	<div class = "row">
		<div class = "col-lg-3 col-md-4 col-sm-6 center">
			<h2 class = "bg-success">Add user</h2>
			<form action = "users.php" method = "post">
				<input type = "text" name = "username" value = "<?php if(isset($username) && !empty($username)){echo $username;}?>" placeholder = "username" class = "yote" required aria-required = "true" /><br style = "margin-top:10px;" />
				<input type = "password" name = "password" class = "yote" placeholder = "password" required aria-required = "true" /><br style = "margin-top:10px;" />
				<input type = "password" name = "cpassword" class = "yote" placeholder = "confirm password" required aria-required = "true" /><br style = "margin-top:10px;" /><br style = "margin-top:10px;" />
				<input type = "submit" name = "adduser" class = "yote btn btn-lg btn-success" value = "Add user" /><br style = "margin-top:10px;" />
			</form>
		</div>
		
		<div class = "col-lg-3 col-md-4 col-sm-6 center">
			<h2 class = "bg-warning">Edit user</h2>
			<form action = "users.php" method = "post">
				<input type = "text" placeholder = "new password" disabled value = "<?php echo "Current username: ". $_SESSION['username'];?>" class = "yote" name = "newpass"/><br style = "margin-top:10px;" />
				<input type = "text" name = "username" placeholder = "new username" class = "yote" required aria-required = "true" /><br style = "margin-top:10px;" />
				<input type = "password" name = "password" class = "yote" placeholder = "current password" required aria-required = "true" /><br style = "margin-top:10px;" />
				<br style = "margin-top:10px;" />
				<input type = "submit" name = "edituser" class = "yote btn btn-lg btn-warning" value = "edit user" /><br style = "margin-top:10px;" />
			</form>
		</div>
		
		<div class = "col-lg-3 col-md-4 col-sm-6 center">
			<h2 class = "bg-warning">Edit password</h2>
			<form action = "users.php" method = "post">
				<input type = "password" placeholder = "old password" value = "" class = "yote" name = "oldpass"/><br style = "margin-top:10px;" />
				<input type = "password" name = "newpass" placeholder = "new password" class = "yote" required aria-required = "true" /><br style = "margin-top:10px;" />
				<input type = "password" name = "cnewpass" class = "yote" placeholder = "confirm new password" required aria-required = "true" /><br style = "margin-top:10px;" />
				<br style = "margin-top:10px;" />
				<input type = "submit" name = "editpassword" class = "yote btn btn-lg btn-warning" value = "edit password" /><br style = "margin-top:10px;" />
			</form>
		</div>
		
		<div class = "col-lg-3 col-md-4 col-sm-6 center">
			<h2 class = "bg-danger">Remove user</h2>
			<form action = "users.php" method = "post">
				<select class = "yote" name = "id" style = "padding:4px 0;">
					<?php
						while($user = mysql_fetch_array($users1)){
							echo "<option value = \"{$user['id']}\">{$user['username']}</option>";
						}
					?>
				</select><br style = "margin-top:10px;" />
				<input type = "password" name = "password" class = "yote" placeholder = "password" required aria-required = "true" /><br style = "margin-top:10px;" /><br style = "margin-top:42px;" />
				<input type = "submit" name = "removeuser" class = "yote btn btn-lg btn-danger" value = "remove user" /><br style = "margin-top:10px;" />
			</form>
		</div>
		
	</div>
	
	<br /><br /><a href = "dashboard.php" class = "btn btn-lg btn-info"><span class="glyphicon glyphicon-arrow-back"></span> Return to dashboard</a><br />
	
</div>
<?php require_once("plain-footer.php");?>