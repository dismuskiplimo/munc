<?php $page_title="login";?>
<?php
	require_once("sessions.php");
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
?>
<?php if (isset($_GET['logout']) && $_GET['logout'] == 1){$msg = "<p class = \"bg-success yote\">You Have Sucessfully Logged Out</p>";}?>
<?php 
	if(isset($_POST['submit'])){
		$required_fields = array("username","password");
		foreach($required_fields as $field){
			if(empty($_POST[$field]) || is_null($_POST[$field]) || !isset($_POST[$field])){
				$errors[] = $field;
			}
			if(empty($errors)){
				$password = sha1(trim(sanitize_query($_POST['password'])));
				$username = trim(sanitize_query($_POST['username']));
				$query = "SELECT id,username FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
				if($d = mysql_fetch_array(mysql_query($query))){
					$_SESSION['user_id'] = $d['id'];
					$_SESSION['username'] = $d['username'];
					redirect_to("admin/dashboard.php");
				}
				else{
					$msg = "<p class = \"yote bg-danger\">login failed, invalid username or password</p>";
					$user = $username;
				}
			}
			else{
				$msg = "<p class = \"yote bg-danger\">login failed, missing field(s)</p>";
			}
		}
	}
?>
<?php require_once("includes/plain-header.php");?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 center">
			<p>Log In to continue</p>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 center">
			<form class="navbar-form" action="login.php" method="post">
				<input type="text" value = "<?php if(isset($user) && !empty($user)){echo $user;}?>" name = "username" class="form-control " placeholder="Username">
				<input type="password" name = "password" class="form-control " placeholder="Password">
				<input type="submit" name="submit" value="Log In" class="form-control btn btn-warning" data-loading-text="Loading...">
			</form>
			<?php if(isset($msg) && !is_null($msg) && !empty($msg)){echo $msg;}?>
		</div>
	</div>
</div>
<?php require_once("includes/plain-footer.php");?>