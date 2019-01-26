<?php require_once("../includes/functions.php");?>
<?php require_once("check_file.php");?>
<?php require_once("../includes/config.php");?>
<?php
	if (isset($_POST['confirm'])){
		redirect_to("sql.php");
	}
	if (isset($_POST['reject'])){
		$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
		check_connection($conn);
		$query="DROP IF EXISTS DATABASE ".DB_DATABASE;
		if(mysql_query($query)){
			if(file_exists("../includes/config.php")){
				unlink("../icludes/config.php");
			}
			redirect_to("http://localhost");
		}
	}
?>
<?php require_once("plain-header.php");?>
<div class="container">
	<div class="row">
		<h1 class="center theme-color">Almost there</h1>
		<h2 class="center">Click on the big button below to Complete installation</h2><br />
		<div class="px10top" style="width:100%;">
			<form method="post" action="confirm.php" class="navbar-form center">
				<input type="submit" class="btn btn-success btn-lg" value="Complete Installation" name="confirm"/>
			</form>
		</div>
		<div class="px10top" style="width:100%;">
			<form method="post" action="confirm.php" class="navbar-form center">
				<input type="submit" class="btn btn-danger btn-sm" value="No thanks, get me out of here please" onclick="conf()" name="reject" />
			</form>
		</div>
		<script>
			function conf(){
				var i = confirm("Click OK if you are sure of your actions");
				if(i==1){
					alert("Woi woi woi");
				}
			}
		</script>
	</div>
	<div class="row">
		<?php if(isset($msg) && !empty($msg)){echo $msg;}?>
	</div>
</div>
<?php require_once("plain-footer.php");?>