<?php $page_title="wp";?>

<?php
	/*
	** Get Core files
	*/
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	/*
	** set home page main image variables
	*/
	
	//....................UPDATE first text........................
	
	if(isset($_POST['submitminitext1'])){
		$msg3 = update_single($_GET['bit'],"home_text","content",$_POST['minitext1']);
	}
	
	//...................UPDATE second  text.......................
	if(isset($_POST['submitminitext2'])){
		$msg4 = update_single($_GET['bit'],"home_text","content",$_POST['minitext2']);
	}
	
	//...................Update main image .........................
	
	if(isset($_POST['submitmain_image'])){
		$msg0 = upload_picture("main_image",$_GET['bit'],"home_image");
	}
	
	//...................UPDATE first Image.........................
	
	if(isset($_POST['submitimg0'])){
		$msg1 = upload_picture("img0",$_GET['bit'],"home_text");
	}
	
	//..................UPDATE second image.........................
	
	if(isset($_POST['submitimg1'])){
		$msg2 =  upload_picture("img1",$_GET['bit'],"home_text");
	}
	
	//.................SET up main Image variables..................
	
	$home_image=select_all("home_image", "date_added",1);
	$image= array(); $image_id = array();
	while($images = mysql_fetch_array($home_image)){
		$image[] = $images['img_url'];
		$image_id[] = $images['id'];
	}
	
	/*
	** set home page text column variables
	*/
	$texts = array(); $images = array(); $content_id = array(); $content = array();
	$home_text=select_all("home_text", "date_added",2);
	while($texts = mysql_fetch_array($home_text)){
		$content_id[] = $texts['id'];
		$content[]= $texts['content'];
		$sub_img[]=$texts['img_url'];
	}
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<!-- Main Image -->
	<div class="row ">
		<img src="<?php echo "../" . $image[0];?>" class="img-responsive">
		<?php if (isset($msg0) && !empty($msg0)){echo $msg0;}?>
		<form method = "post" enctype = "multipart/form-data" style = "margin:15px 0;" action = "edit_main.php?bit=<?php echo urlencode($image_id[0]);?>">
			<input type = "file" name="main_image" style="float:left; width:25%;" />
			<input type = "submit" name = "submitmain_image" value = "Update main Image" class="btn btn-default" style="float:left; width:25%;" />
		</form>
	</div>
	<!--/Main Image  -->
</div>
<div class="container">
	<div class="row wide">
		<div class="col-lg-6 col-md-6 px10top">
			<div class="row">
				<!-- Image 1 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<img class="img-responsive" src="<?php echo "../" . $sub_img[0];?>">
					<?php if (isset($msg1) && !empty($msg1)){echo $msg1;}?>
					<form method = "post" enctype = "multipart/form-data" class="center" action = "edit_main.php?bit=<?php echo urlencode($content_id[0]);?>">
						<input type = "file" name="img0" style = "width:100%;" />
						<input type = "submit" name = "submitimg0" value = "Update Image" style = "width:100%; margin:15px 0;" class="btn btn-default" />
					</form>
				</div>
				<!--/Image 1  -->
				<!-- Content 1  -->
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<form action = "edit_main.php?bit=<?php echo urlencode($content_id[0]);?>" method = "post" >
						<textarea name="minitext1" style = "width:100%; padding:10px;" rows="10" class="navbar-form"><?php echo $content[0];?> </textarea>
						<?php if (isset($msg3) && !empty($msg3)){echo $msg3;}?>
						<input type = "submit" class="btn btn-success btn-lg" name = "submitminitext1" value="Update" />
					</form>
					<br />
				</div>
				<!--/ Content 1  -->
			</div>
		</div>
		<div class="col-lg-6 col-md-6 px10top">
			<div class="row">
				<!-- Image 2 -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<img class="img-responsive" src="<?php echo "../" . $sub_img[1];?>">
					<?php if (isset($msg2) && !empty($msg2)){echo $msg2;}?>
					<form method = "post" enctype = "multipart/form-data" class="center" action = "edit_main.php?bit=<?php echo urlencode($content_id[1]);?>">
						<input type = "file" name="img1" style = "width:100%;" />
						<input type = "submit" name = "submitimg1" value = "Update Image" style = "width:100%; margin:15px 0;" class="btn btn-default" />
					</form>
				</div>
				<!--/Image 1  -->
				<!-- Content 2 -->
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<form action = "edit_main.php?bit=<?php echo urlencode($content_id[1]);?>" method = "post" >
						<textarea name="minitext2" style = "width:100%; padding:10px;" rows="10" class="navbar-form"><?php echo $content[1];?> </textarea>
						<?php if (isset($msg4) && !empty($msg4)){echo $msg4;}?>
						<input type = "submit" class="btn btn-success btn-lg" name = "submitminitext2" value="Update" />
					</form>
				</div>
				<!--/Content 2  -->
			</div>
		</div>
	</div>
</div>
<?php require_once("footer.php");?>