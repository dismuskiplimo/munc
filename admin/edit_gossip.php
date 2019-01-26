<?php $page_title="gossip";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	//...............UPDATE main image ............................
	if(isset($_POST['submitmain_image'])){
		$msg0 = upload_picture("main_image", $_GET['bit'] ,"gossip_image");
	}
	
	//................UPDATE LOT 1 ................................
	if(isset($_POST['sub1'])){
		$msg1 = update_single($_GET['bit'], "gossip_content", "content", $_POST['tit1'] );
	}
	
	//................UPDATE LOT 2 ................................
	if(isset($_POST['sub2'])){
		$msg2 = update_single($_GET['bit'], "gossip_content", "content", $_POST['tit2'] );
	}
	
	//................UPDATE LOT 3 ................................
	if(isset($_POST['sub3'])){
		$msg3 = update_single($_GET['bit'], "gossip_content", "content", $_POST['tit3'] );
	}
	
	//................UPDATE LOT 4 ................................
	if(isset($_POST['sub4'])){
		$msg4 = update_single($_GET['bit'], "gossip_content", "content", $_POST['tit4'] );
	}
	
	//................UPDATE LOT 5 ................................
	if(isset($_POST['sub5'])){
		$msg5 = update_single($_GET['bit'], "gossip_content", "content", $_POST['tit5'] );
	}
	
	//................UPDATE LOT 6 ................................
	if(isset($_POST['sub6'])){
		$msg6 = update_single($_GET['bit'], "gossip_content", "content", $_POST['tit6'] );
	}
	
	//...............UPDATE image 1 ...............................
	if(isset($_POST['subpic1'])){
		$msg7 = upload_picture("pic1", $_GET['bit'], "gossip_content");
	}
	
	//...............UPDATE image 2 ...............................
	if(isset($_POST['subpic2'])){
		$msg8 = upload_picture("pic2", $_GET['bit'], "gossip_content");
	}
	
	//...............UPDATE image 3 ...............................
	if(isset($_POST['subpic3'])){
		$msg9 = upload_picture("pic3", $_GET['bit'], "gossip_content");
	}
	
	//...............UPDATE image 4 ...............................
	if(isset($_POST['subpic4'])){
		$msg10 = upload_picture("pic4", $_GET['bit'], "gossip_content");
	}
	
	//...............UPDATE image 5 ...............................
	if(isset($_POST['subpic5'])){
		$msg11 = upload_picture("pic5", $_GET['bit'], "gossip_content");
	}
	
	//...............UPDATE image 6 ...............................
	if(isset($_POST['subpic6'])){
		$msg12 = upload_picture("pic6", $_GET['bit'], "gossip_content");
	}
	
	/*
	**gather page variables
	*/
	$img = Array();$img_id = Array();
	$title = Array();
	$content = Array();$content_id = Array();
	$main_image = Array();
	$page_set = select_all("gossip_content","id",6);
	$image_set = select_all("gossip_image","id",1);
	// Loop through array 
	while($main_img = mysql_fetch_array($image_set)){
		$main_image[] = $main_img['img_url'];
		$img_id[] = $main_img['id'];
	}
	while($page = mysql_fetch_array($page_set)){
		$img[] = $page['img_url'];
		$title[] = $page['title'];
		$content[] = $page['content'];
		$content_id[] = $page['id'];
	}
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<div class="row wide hidden-xs">
		<img src="<?php echo "../" . $main_image[0];?>" class="img-responsive">
		<?php if (isset($msg0) && !is_null($msg0) && !empty($msg0)){echo $msg0;}?>
		<form method = "post" action = "edit_gossip.php?bit=<?php echo htmlentities($img_id[0]);?>" enctype = "multipart/form-data" style = "margin:15px 30px;">
			<input type = "file" name="main_image" style="float:left; width:25%;" />
			<input type = "submit" name = "submitmain_image" value = "Update main Image" class="btn btn-default" style="float:left; width:25%;" />
		</form>
	</div>
</div>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
		
			<!-- LOT 1-->
			<div class="col-lg-4 col-md-4 col-sm-6 wide">
				<div class = "border">
					<img src="<?php echo "../".$img[0];?>" class="img-responsive video" /><br />
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[0]);?>" method = "post">
						<textarea rows = "10" name = "tit1" class = "yote"><?php echo $content[0];?></textarea>
						<?php if (isset($msg1) && !is_null($msg1) && !empty($msg1)){echo $msg1;}?>
						<input type = "submit" name = "sub1" class = "yote btn btn-success px10top" value = "Update Content" />
					</form>
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[0]);?>" method = "post" enctype = "multipart/form-data">
						<input type = "file" name = "pic1" class = "yote px10top"  />
						<?php if (isset($msg7) && !is_null($msg7) && !empty($msg7)){echo $msg7;}?>
						<input type = "submit" name = "subpic1" value = "Update image" class = "yote btn btn-default" />
					</form>
				</div>
			</div>
			
			<!-- LOT 2-->
			<div class="col-lg-4 col-md-4 col-sm-6 wide">
				<div class = "border">
					<img src="<?php echo "../".$img[1];?>" class="img-responsive video" /><br />
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[1]);?>" method = "post">
						<textarea rows = "10" name = "tit2" class = "yote"><?php echo $content[1];?></textarea>
						<?php if (isset($msg2) && !is_null($msg2) && !empty($msg2)){echo $msg2;}?>
						<input type = "submit" name = "sub2" class = "yote btn btn-success px10top" value = "Update Content" />
					</form>
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[1]);?>" method = "post" enctype = "multipart/form-data">
						<input type = "file" name = "pic2" class = "yote px10top"  />
						<?php if (isset($msg8) && !is_null($msg8) && !empty($msg8)){echo $msg8;}?>
						<input type = "submit" name = "subpic2" value = "Update image" class = "yote btn btn-default" />
					</form>
				</div>
			</div>
			
			<!-- LOT 3-->
			<div class="col-lg-4 col-md-4 col-sm-6 wide">
				<div class = "border">
					<img src="<?php echo "../".$img[2];?>" class="img-responsive video" /><br />
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[2]);?>" method = "post">
						<textarea rows = "10" name = "tit3" class = "yote"><?php echo $content[2];?></textarea>
						<?php if (isset($msg3) && !is_null($msg3) && !empty($msg3)){echo $msg3;}?>
						<input type = "submit" name = "sub3" class = "yote btn btn-success px10top" value = "Update Content" />
					</form>
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[2]);?>" method = "post" enctype = "multipart/form-data">
						<input type = "file" name = "pic3" class = "yote px10top"  />
						<?php if (isset($msg9) && !is_null($msg9) && !empty($msg9)){echo $msg9;}?>
						<input type = "submit" name = "subpic3" value = "Update image" class = "yote btn btn-default" />
					</form>
				</div>
			</div>
			
			<!-- LOT 4-->
			<div class="col-lg-4 col-md-4 col-sm-6 wide">
				<div class = "border">
					<img src="<?php echo "../".$img[3];?>" class="img-responsive video" /><br />
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[3]);?>" method = "post">
						<textarea rows = "10" name = "tit4" class = "yote"><?php echo $content[3];?></textarea>
						<?php if (isset($msg4) && !is_null($msg4) && !empty($msg4)){echo $msg4;}?>
						<input type = "submit" name = "sub4" class = "yote btn btn-success px10top" value = "Update Content" />
					</form>
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[3]);?>" method = "post" enctype = "multipart/form-data">
						<input type = "file" name = "pic4" class = "yote px10top"  />
						<?php if (isset($msg10) && !is_null($msg10) && !empty($msg10)){echo $msg10;}?>
						<input type = "submit" name = "subpic4" value = "Update image" class = "yote btn btn-default" />
					</form>
				</div>
			</div>
			
			<!-- LOT 5-->
			<div class="col-lg-4 col-md-4 col-sm-6 wide">
				<div class = "border">
					<img src="<?php echo "../".$img[4];?>" class="img-responsive video" /><br />
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[4]);?>" method = "post">
						<textarea rows = "10" name = "tit5" class = "yote"><?php echo $content[4];?></textarea>
						<?php if (isset($msg5) && !is_null($msg5) && !empty($msg5)){echo $msg5;}?>
						<input type = "submit" name = "sub5" class = "yote btn btn-success px10top" value = "Update Content" />
					</form>
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[4]);?>" method = "post" enctype = "multipart/form-data">
						<input type = "file" name = "pic5" class = "yote px10top"  />
						<?php if (isset($msg11) && !is_null($msg11) && !empty($msg11)){echo $msg11;}?>
						<input type = "submit" name = "subpic5" value = "Update image" class = "yote btn btn-default" />
					</form>
				</div>
			</div>
			
			<!-- LOT 6-->
			<div class="col-lg-4 col-md-4 col-sm-6 wide">
				<div class = "border">
					<img src="<?php echo "../".$img[5];?>" class="img-responsive video" /><br />
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[5]);?>" method = "post">
						<textarea rows = "10" name = "tit6" class = "yote"><?php echo $content[5];?></textarea>
						<?php if (isset($msg6) && !is_null($msg6) && !empty($msg6)){echo $msg6;}?>
						<input type = "submit" name = "sub6" class = "yote btn btn-success px10top" value = "Update Content" />
					</form>
					<form action = "edit_gossip.php?bit=<?php echo htmlentities($content_id[5]);?>" method = "post" enctype = "multipart/form-data">
						<input type = "file" name = "pic6" class = "yote px10top"  />
						<?php if (isset($msg12) && !is_null($msg12) && !empty($msg12)){echo $msg12;}?>
						<input type = "submit" name = "subpic6" value = "Update image" class = "yote btn btn-default" />
					</form>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?php require_once("footer.php");?>