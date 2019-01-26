<?php $page_title="pic-book";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	/*
	**
	*/
	if(isset($_POST['submitmain_image'])){
		$msg = upload_picture("main_image",$_GET['bit'],"picbook_image");
	}
	
	$main_image = Array(); $id = Array();
	$image_set = select_all("picbook_image","id",1);
	// Loop through array 
	while($main_img = mysql_fetch_array($image_set)){
		$main_image[] = $main_img['img_url'];
		$id[] = $main_img['id'];
	}
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<div class="row px10top">
		<div class="thumbnail">
			<img src="<?php echo "../" . $main_image[0];?>" class="img-responsive">
			<?if(isset($msg) && !empty($msg) && !is_null($msg)){echo $msg;}?>
			<form method = "post" action = "edit_pic-book.php?bit=<?php echo htmlentities($id[0]);?>" enctype = "multipart/form-data" style = "margin:15px 30px;">
				<input type = "file" name="main_image" style="float:left; width:25%;" />
				<input type = "submit" name = "submitmain_image" value = "Update theeImage" class="btn btn-default" style="float:left; width:25%;" />
			</form>
		</div>
	</div>
</div>
<?php require_once("footer.php");?>