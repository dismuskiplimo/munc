<?php $page_title="home";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
?>
<?php

	//...................main image ..........................................
	
	if(isset($_POST['submittop_image'])){
		$msg0 = upload_picture("top_image", $_GET['bit'], "main_image");
	}
	
	//..................img 1 ..........................................
	
	if(isset($_POST['submit_img3'])){
		$msg1 = upload_picture("img3", $_GET['bit'], "main_subtopics");
	}
	
	//..................img 2 ..........................................
	
	if(isset($_POST['submit_img4'])){
		$msg2 = upload_picture("img4", $_GET['bit'], "main_subtopics");
	}
	
	//..................img 3 ..........................................
	
	if(isset($_POST['submit_img5'])){
		$msg3 = upload_picture("img5", $_GET['bit'], "main_subtopics");
	}
	
	//..................img 4 ..........................................
	
	if(isset($_POST['submit_img6'])){
		$msg4 = upload_picture("img6", $_GET['bit'], "main_subtopics");
	}
	
	//..................img 5 ..........................................
	
	if(isset($_POST['submit_img7'])){
		$msg5 = upload_picture("img7", $_GET['bit'], "main_subtopics");
	}
	
	
	//..................bottom image ..........................................
	
	if(isset($_POST['submitbottom_image'])){
		$msg6 = upload_picture("bottom_image", $_GET['bit'], "main_sub_image");
	}
	
	//..................content 1 ............................................
	if(isset($_POST['submit1'])){
		$msg7 = update_double($_GET['bit'], "main_content" , "title", "content", $_POST['tit1'], $_POST['cont1']);
	}
	
	//..................content 2 ............................................
	if(isset($_POST['submit2'])){
		$msg8 = update_double($_GET['bit'], "main_content" , "title", "content", $_POST['tit2'], $_POST['cont2']);
	}
	
	//..................content 3 ............................................
	if(isset($_POST['submit3'])){
		$msg9 = update_double($_GET['bit'], "main_subtopics" , "title", "content", $_POST['tit3'], $_POST['cont3']);
	}
	
	//..................content 4 ............................................
	if(isset($_POST['submit4'])){
		$msg10 = update_double($_GET['bit'], "main_subtopics" , "title", "content", $_POST['tit4'], $_POST['cont4']);
	}
	
	//..................content 5 ............................................
	if(isset($_POST['submit5'])){
		$msg11 = update_double($_GET['bit'], "main_subtopics" , "title", "content", $_POST['tit5'], $_POST['cont5']);
	}
	
	//..................content 6 ............................................
	if(isset($_POST['submit6'])){
		$msg12 = update_double($_GET['bit'], "main_subtopics" , "title", "content", $_POST['tit6'], $_POST['cont6']);
	}
	
	//..................content 7 ............................................
	if(isset($_POST['submit7'])){
		$msg13 = update_double($_GET['bit'], "main_subtopics" , "title", "content", $_POST['tit7'], $_POST['cont7']);
	}
	
	/*
	** main image variables
	*/
	
	$main_image = select_all("main_image", "date_added",1);
	while($main_img = mysql_fetch_array($main_image)){
		$main_im = $main_img['img_url'];
		$main_im_id = $main_img['id'];
	}
	
	/*
	** main content variables
	*/
	$main_content_title = Array();
	$main_content_content = Array(); $main_content_id = Array();
	$main_contents = select_all("main_content", "id",2);
	while($main_content = mysql_fetch_array($main_contents)){
		$main_content_title[] = $main_content['title'];
		$main_content_content[] = $main_content['content'];
		$main_content_id[] = $main_content['id'];
	}
	
	/*
	** main sub content variables
	*/
	$main_subcontent_title = Array(); $main_subcontent_id = Array();
	$main_subcontent_image = Array();
	$main_subcontent_content = Array();
	$main_subcontents = select_all("main_subtopics", "id",5);
	while($main_subcontent = mysql_fetch_array($main_subcontents)){
		$main_subcontent_title[] = $main_subcontent['title'];
		$main_subcontent_content[] = $main_subcontent['content'];
		$main_subcontent_image[] = $main_subcontent['img_url'];
		$main_subcontent_id[] = $main_subcontent['id'];
	}
	
	/*
	** auxiliary image variables
	*/
	
	$sub_image = select_all("main_sub_image", "date_added",1);
	while($sub_img = mysql_fetch_array($sub_image)){
		$sub_im = $sub_img['img_url'];
		$sub_im_id = $sub_img['id'];
	}
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row"><!--Top Image -->
				<div class="col-lg-12">
					<img src="<?php echo "../" . $main_im;?>" class="img-responsive" /><br />
				</div>
				<?php if (isset($msg0) && !is_null($msg0) && !empty($msg0)){echo $msg0;}?>
				<form method = "post" action = "edit_home.php?bit=<?php echo htmlentities($main_im_id);?>" enctype = "multipart/form-data" style = "margin:15px 15px;" />
					<input type = "file" name="top_image" style="float:left; width:25%;" />
					<input type = "submit" name = "submittop_image" value = "Update main Image" class="btn btn-default" style="float:left; width:25%;" />
				</form>
			</div>
			<div class="row"><!--content 1 -->
				<div class="col-lg-12 px10top">
					<div class = "border center">
						<form action = "edit_home.php?bit=<?php echo htmlentities($main_content_id[0]);?>" method = "post">
							<input type = "text"  name = "tit1" maxlength = "80" placeholder = "Title" style = "width:100%; margin:20px 0; font-size:1.5em; text-align:center;" value = "<?php echo $main_content_title[0];?>">
							<textarea style = "width:100%;" name = "cont1" rows = "10"><?php echo $main_content_content[0];?></textarea>
							<?php if (isset($msg7) && !is_null($msg7) && !empty($msg7)){echo $msg7;}?>
							<input type = "submit"name = "submit1" value = "Update" class = "btn btn-success" >
						</form>
					</div>
				</div>
			</div>
			<div class="row px10top"><!--content 2 -->
				<div class="col-lg-12">
					<div class="thumbnail center">
						<div class = "border">
						<form action = "edit_home.php?bit=<?php echo htmlentities($main_content_id[1]);?>" method = "post">
							<input type = "text" maxlength = "80" name = "tit2" placeholder = "Title" style = "width:100%; margin:20px 0; font-size:1.5em; text-align:center;" value = "<?php echo $main_content_title[1];?>">
							<textarea style = "width:100%;" name = "cont2" rows = "10"><?php echo $main_content_content[1];?></textarea>
							<?php if (isset($msg8) && !is_null($msg8) && !empty($msg8)){echo $msg8;}?>
							<input type = "submit" name = "submit2" value = "Update" class = "btn btn-success" >
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2 col-lg-offset-1 col-md-4 col-sm-6"><!--column 1 -->
			<div class = "border">
				<form action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[0]);?>" method = "post">
					<input type = "text"  name = "tit3" maxlength = "50" placeholder = "Title" value = "<?php echo $main_subcontent_title[0];?>" style = "width:100%;" />
					<div class="thumbnail">
						<img src="<?php echo "../" . $main_subcontent_image[0];?>" class="img-responsive">
					</div>
					<?php if (isset($msg1) && !is_null($msg1) && !empty($msg1)){echo $msg1;}?>
					<textarea style = "width:100%;" name = "cont3" rows = "10"><?php echo $main_subcontent_content[0];?></textarea>
					<?php if (isset($msg9) && !is_null($msg9) && !empty($msg9)){echo $msg9;}?>
					<input type = "submit" name = "submit3" value = "Update Content" class= "btn btn-success" style = "width:100%;">
				</form>
				<form enctype = "multipart/form-data" action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[0]);?>" method = "post" style = "margin:20px 0 0 0;">
					<input type = "file" name = "img3" style = "width:100%;" />
					<input type = "submit" name = "submit_img3" value = "Update Image" style = "width:100%;" class="btn btn-default" />
				</form>
			</div>
		</div>
		<div class="col-lg-2 col-md-4 col-sm-6"><!--column 2 -->
			<div class = "border">
				<form action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[1]);?>" method = "post">
					<input type = "text"  name = "tit4" maxlength = "50" placeholder = "Title" value = "<?php echo $main_subcontent_title[1];?>" style = "width:100%;" />
					<div class="thumbnail">
						<img src="<?php echo "../" . $main_subcontent_image[1];?>" class="img-responsive">
					</div>
					<?php if (isset($msg2) && !is_null($msg2) && !empty($msg2)){echo $msg2;}?>
					<textarea style = "width:100%;" name = "cont4" rows = "10"><?php echo $main_subcontent_content[1];?></textarea>
					<?php if (isset($msg10) && !is_null($msg10) && !empty($msg10)){echo $msg10;}?>
					<input type = "submit" name = "submit4" value = "Update Content" class= "btn btn-success" style = "width:100%;">
				</form>
				<form enctype = "multipart/form-data" action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[1]);?>" method = "post" style = "margin:20px 0 0 0;">
					<input type = "file" name = "img4" style = "width:100%;" />
					<input type = "submit" name = "submit_img4" value = "Update Image" style = "width:100%;" class="btn btn-default" />
				</form>
			</div>
		</div>
		<div class="col-lg-2 col-md-4 col-sm-6"><!--column 3 -->
			<div class = "border">
				<form action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[2]);?>" method = "post">
					<input type = "text" name = "tit5" maxlength = "50" placeholder = "Title" value = "<?php echo $main_subcontent_title[2];?>" style = "width:100%;" />
					<div class="thumbnail">
						<img src="<?php echo "../" . $main_subcontent_image[2];?>" class="img-responsive">
					</div>
					<?php if (isset($msg3) && !is_null($msg3) && !empty($msg3)){echo $msg3;}?>
					<textarea style = "width:100%;" name = "cont5" rows = "10"><?php echo $main_subcontent_content[2];?></textarea>
					<?php if (isset($msg11) && !is_null($msg11) && !empty($msg11)){echo $msg11;}?>
					<input type = "submit" name = "submit5" value = "Update Content" class= "btn btn-success" style = "width:100%;">
				</form>
				<form enctype = "multipart/form-data" action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[2]);?>" method = "post" style = "margin:20px 0 0 0;">
					<input type = "file" name = "img5" style = "width:100%;" />
					<input type = "submit" name = "submit_img5" value = "Update Image" style = "width:100%;" class="btn btn-default" />
				</form>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6"><!--column 4 -->
			<div class = "border">
				<form action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[3]);?>" method = "post">
					<input type = "text" maxlength = "50" name = "tit6" placeholder = "Title" value = "<?php echo $main_subcontent_title[3];?>" style = "width:100%;" />
					<div class="thumbnail">
						<img src="<?php echo "../" . $main_subcontent_image[3];?>" class="img-responsive">
					</div>
					<?php if (isset($msg4) && !is_null($msg4) && !empty($msg4)){echo $msg4;}?>
					<textarea style = "width:100%;" name = "cont6" rows = "10"><?php echo $main_subcontent_content[3];?></textarea>
					<?php if (isset($msg12) && !is_null($msg12) && !empty($msg12)){echo $msg12;}?>
					<input type = "submit" name = "submit6" value = "Update Content" class= "btn btn-success" style = "width:100%;">
				</form>
				<form enctype = "multipart/form-data" action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[3]);?>" method = "post" style = "margin:20px 0 0 0;">
					<input type = "file" name = "img6" style = "width:100%;" />
					<input type = "submit" name = "submit_img6" value = "Update Image" style = "width:100%;" class="btn btn-default" />
				</form>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-12"> <!--column 5 -->
			<div class = "border">
				<form action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[4]);?>" method = "post">
					<input type = "text" maxlength = "50" name = "tit7" placeholder = "Title" value = "<?php echo $main_subcontent_title[4];?>" style = "width:100%;" />
					<div class="thumbnail">
						<img src="<?php echo "../" . $main_subcontent_image[4];?>" class="img-responsive">
					</div>
					<?php if (isset($msg5) && !is_null($msg5) && !empty($msg5)){echo $msg5;}?>
					<textarea style = "width:100%;" rows = "10" name = "cont7"><?php echo $main_subcontent_content[4];?></textarea>
					<?php if (isset($msg13) && !is_null($msg13) && !empty($msg13)){echo $msg13;}?>
					<input type = "submit" value = "Update Content" name = "submit7" class= "btn btn-success" style = "width:100%;">
				</form>
				<form enctype = "multipart/form-data" action = "edit_home.php?bit=<?php echo htmlentities($main_subcontent_id[4]);?>" method = "post" style = "margin:20px 0 0 0;">
					<input type = "file" style = "width:100%;" name = "img7" />
					<input type = "submit" name = "submit_img7" value = "Update Image" style = "width:100%;" class="btn btn-default" />
				</form>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid wide">
	<div class="row"><!--Bottom Image-->
		<div class="col-lg-12">
			<div class="thumbnail">
				<img src="<?php echo "../" . $sub_im; ?>" class="img-responsive marg" />
			</div>
			<?php if (isset($msg6) && !is_null($msg6) && !empty($msg6)){echo $msg6;}?>
				<form method = "post" action = "edit_home.php?bit=<?php echo htmlentities($sub_im_id);?>" enctype = "multipart/form-data" style = "margin:15px 0;">
					<input type = "file" name="bottom_image" style="float:left; width:25%;" />
					<input type = "submit" name = "submitbottom_image" value = "Update bottom Image" class="btn btn-default" style="float:left; width:25%;" />
				</form>
		</div>
	</div>
</div>
<?php require_once("footer.php");?>