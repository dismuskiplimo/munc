<?php $page_title="movie-music";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	//.......................................................................
	if(isset($_POST['submitmain_image'])){
		$msg0 = upload_picture("main_image",$_GET['bit'],"music_image");
	}
	
	//......................................................................
	if(isset($_POST['sub1'])){
		$msg1 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit1'],$_POST['cont1']);
	}
	
	if(isset($_POST['sub2'])){
		$msg2 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit2'],$_POST['cont2']);
	}
	
	if(isset($_POST['sub3'])){
		$msg3 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit3'],$_POST['cont3']);
	}
	
	if(isset($_POST['sub4'])){
		$msg4 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit4'],$_POST['cont4']);
	}
	
	if(isset($_POST['sub5'])){
		$msg5 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit5'],$_POST['cont5']);
	}
	
	if(isset($_POST['sub6'])){
		$msg6 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit6'],$_POST['cont6']);
	}
	
	if(isset($_POST['sub7'])){
		$msg7 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit7'],$_POST['cont7']);
	}
	
	if(isset($_POST['sub8'])){
		$msg8 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit8'],$_POST['cont8']);
	}
	
	if(isset($_POST['sub9'])){
		$msg9 = update_double($_GET['bit'],"music_content","title","content",$_POST['tit9'],$_POST['cont9']);
	}
	
	//........................................................................................................
	if(isset($_POST['subimg1'])){
		$msg10 = upload_picture("img1",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg2'])){
		$msg11 = upload_picture("img2",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg3'])){
		$msg12 = upload_picture("img3",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg4'])){
		$msg13 = upload_picture("img4",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg5'])){
		$msg14 = upload_picture("img5",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg6'])){
		$msg15 = upload_picture("img6",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg7'])){
		$msg16 = upload_picture("img7",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg8'])){
		$msg17 = upload_picture("img8",$_GET['bit'],"music_content");
	}
	
	if(isset($_POST['subimg9'])){
		$msg18 = upload_picture("img9",$_GET['bit'],"music_content");
	}
	
	/*
	**gather page variables
	*/
	$img = Array();
	$title = Array();
	$content = Array(); $content_id = Array();
	$main_image = Array(); $main_image_id = Array();
	$page_set = select_all("music_content","id",9);
	$image_set = select_all("music_image","id",1);
	// Loop through array 
	while($main_img = mysql_fetch_array($image_set)){
		$main_image[] = $main_img['img_url'];
		$main_image_id[] = $main_img['id'];
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
	<div class="row">
		<img src="<?php echo "../" . $main_image[0];?>" class="img-responsive" />
		<?php if(isset($msg0) && !empty($msg0) && !is_null($msg0)){echo $msg0;}?>
		<form method = "post" action = "edit_movie-music.php?bit=<?php echo $main_image_id[0];?>" enctype = "multipart/form-data" style = "margin:15px 15px;">
			<input type = "file" name="main_image" style="float:left; width:25%;" />
			<input type = "submit" name = "submitmain_image" value = "Update main Image" class="btn btn-default" style="float:left; width:25%;" />
		</form>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 wide">
			<div class="row">
				<div class="col-lg-4 col-md-4 wide">
					<h5 class="underline upper">MUSIC <br /></h5>
					<div class="px10top">
						<div class = "border">
							<form action = "edit_movie-music.php?bit=<?php echo $content_id[0];?>" method = "post">
								<img src="<?php echo "../" .$img[0];?>" class="img-responsive marg video" />
								<input type = "text" name = "tit1" class="yote" style = "font-size:2em;" value = "<?php echo $title[0];?>" />
								<textarea rows = "10" name = "cont1" class = "yote"><?php echo $content[0];?></textarea>
								<?php if(isset($msg1) && !empty($msg1) && !is_null($msg1)){echo $msg1;}?>
								<input type = "submit" name = "sub1" value = "Update info" class = "btn btn-success yote" /><br />
							</form>
							<form action = "edit_movie-music.php?bit=<?php echo $content_id[0];?>" enctype = "multipart/form-data" method = "post">
								<input type ="file" name = "img1" class = "px10top" />
								<?php if(isset($msg10) && !empty($msg10) && !is_null($msg10)){echo $msg10;}?>
								<input type = "submit" name = "subimg1" value = "Update photo" class = "btn btn-default yote" />
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide">
					<h5 class="underline upper">MOVIES <br /></h5>
					<div class="px10top">
						<div class = "border">
							<form action = "edit_movie-music.php?bit=<?php echo $content_id[1];?>" method = "post">
								<img src="<?php echo "../" .$img[1];?>" class="img-responsive marg video" />
								<input type = "text" name = "tit2" class="yote" style = "font-size:2em;" value = "<?php echo $title[1];?>" />
								<textarea rows = "10" name = "cont2" class = "yote"><?php echo $content[1];?></textarea>
								<?php if(isset($msg2) && !empty($msg2) && !is_null($msg2)){echo $msg2;}?>
								<input type = "submit" name = "sub2" value = "Update info" class = "btn btn-success yote" /><br />
							</form>
							<form action = "edit_movie-music.php?bit=<?php echo $content_id[1];?>" enctype = "multipart/form-data" method = "post">
								<input type ="file" name = "img2" class = "px10top" />
								<?php if(isset($msg11) && !empty($msg11) && !is_null($msg11)){echo $msg11;}?>
								<input type = "submit" name = "subimg2" value = "Update photo" class = "btn btn-default yote" />
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide">
					<h5 class="underline upper">SERIES <br /></h5>
					<div class="px10top">
						<div class = "border">
							<form action = "edit_movie-music.php?bit=<?php echo $content_id[2];?>" method = "post">
								<img src="<?php echo "../" .$img[2];?>" class="img-responsive marg video" />
								<input type = "text" name = "tit3" class="yote" style = "font-size:2em;" value = "<?php echo $title[2];?>" />
								<textarea rows = "10" name = "cont3" class = "yote"><?php echo $content[2];?></textarea>
								<?php if(isset($msg3) && !empty($msg3) && !is_null($msg3)){echo $msg3;}?>
								<input type = "submit" name = "sub3" value = "Update info" class = "btn btn-success yote" /><br />
							</form>
							<form action = "edit_movie-music.php?bit=<?php echo $content_id[2];?>" enctype = "multipart/form-data" method = "post">
								<input type ="file" name = "img3" class = "px10top" />
								<?php if(isset($msg12) && !empty($msg12) && !is_null($msg12)){echo $msg12;}?>
								<input type = "submit" name = "subimg3" value = "Update photo" class = "btn btn-default yote" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<div class = "border">
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[3];?>" method = "post">
							<img src="<?php echo "../" .$img[3];?>" class="img-responsive marg " />
							<input type = "text" name = "tit4" class="yote" style = "font-size:2em;" value = "<?php echo $title[3];?>" />
							<textarea rows = "10" name = "cont4" class = "yote"><?php echo $content[3];?></textarea>
							<?php if(isset($msg4) && !empty($msg4) && !is_null($msg4)){echo $msg4;}?>
							<input type = "submit" name = "sub4" value = "Update info" class = "btn btn-success yote" /><br />
						</form>
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[3];?>" enctype = "multipart/form-data" method = "post">
							<input type ="file" name = "img4" class = "px10top" />
							<?php if(isset($msg13) && !empty($msg13) && !is_null($msg13)){echo $msg13;}?>
							<input type = "submit" name = "subimg4" value = "Update photo" class = "btn btn-default yote" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<div class = "border">
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[4];?>" method = "post">
							<img src="<?php echo "../" .$img[4];?>" class="img-responsive marg " />
							<input type = "text" name = "tit5" class="yote" style = "font-size:2em;" value = "<?php echo $title[4];?>" />
							<textarea rows = "10" name = "cont5" class = "yote"><?php echo $content[4];?></textarea>
							<?php if(isset($msg5) && !empty($msg5) && !is_null($msg5)){echo $msg5;}?>
							<input type = "submit" name = "sub5" value = "Update info" class = "btn btn-success yote" /><br />
						</form>
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[4];?>" enctype = "multipart/form-data" method = "post">
							<input type ="file" name = "img5" class = "px10top" />
							<?php if(isset($msg14) && !empty($msg14) && !is_null($msg14)){echo $msg14;}?>
							<input type = "submit" name = "subimg5" value = "Update photo" class = "btn btn-default yote" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<div class = "border">
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[5];?>" method = "post">
							<img src="<?php echo "../" .$img[5];?>" class="img-responsive marg " />
							<input type = "text" name = "tit6" class="yote" style = "font-size:2em;" value = "<?php echo $title[5];?>" />
							<textarea rows = "10" name = "cont6" class = "yote"><?php echo $content[5];?></textarea>
							<?php if(isset($msg6) && !empty($msg6) && !is_null($msg6)){echo $msg6;}?>
							<input type = "submit" name = "sub6" value = "Update info" class = "btn btn-success yote" /><br />
						</form>
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[5];?>" enctype = "multipart/form-data" method = "post">
							<input type ="file" name = "img6" class = "px10top" />
							<?php if(isset($msg15) && !empty($msg15) && !is_null($msg15)){echo $msg15;}?>
							<input type = "submit" name = "subimg6" value = "Update photo" class = "btn btn-default yote" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<div class = "border">
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[6];?>" method = "post">
							<img src="<?php echo "../" .$img[6];?>" class="img-responsive marg " />
							<input type = "text" name = "tit7" class="yote" style = "font-size:2em;" value = "<?php echo $title[6];?>" />
							<textarea rows = "10" name = "cont7" class = "yote"><?php echo $content[6];?></textarea>
							<?php if(isset($msg7) && !empty($msg7) && !is_null($msg7)){echo $msg7;}?>
							<input type = "submit" name = "sub7" value = "Update info" class = "btn btn-success yote" /><br />
						</form>
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[6];?>" enctype = "multipart/form-data" method = "post">
							<input type ="file" name = "img7" class = "px10top" />
							<?php if(isset($msg16) && !empty($msg16) && !is_null($msg16)){echo $msg16;}?>
							<input type = "submit" name = "subimg7" value = "Update photo" class = "btn btn-default yote" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<div class = "border">
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[7];?>" method = "post">
							<img src="<?php echo "../" .$img[7];?>" class="img-responsive marg " />
							<input type = "text" name = "tit8" class="yote" style = "font-size:2em;" value = "<?php echo $title[7];?>" />
							<textarea rows = "10" name = "cont8" class = "yote"><?php echo $content[7];?></textarea>
							<?php if(isset($msg8) && !empty($msg8) && !is_null($msg8)){echo $msg8;}?>
							<input type = "submit" name = "sub8" value = "Update info" class = "btn btn-success yote" /><br />
						</form>
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[7];?>" enctype = "multipart/form-data" method = "post">
							<input type ="file" name = "img8" class = "px10top" />
							<?php if(isset($msg17) && !empty($msg17) && !is_null($msg17)){echo $msg17;}?>
							<input type = "submit" name = "subimg8" value = "Update photo" class = "btn btn-default yote" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<div class = "border">
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[8];?>" method = "post">
							<img src="<?php echo "../" .$img[8];?>" class="img-responsive marg " />
							<input type = "text" name = "tit9" class="yote" style = "font-size:2em;" value = "<?php echo $title[8];?>" />
							<textarea rows = "10" name = "cont9" class = "yote"><?php echo $content[8];?></textarea>
							<?php if(isset($msg9) && !empty($msg9) && !is_null($msg9)){echo $msg9;}?>
							<input type = "submit" name = "sub9" value = "Update info" class = "btn btn-success yote" /><br />
						</form>
						<form action = "edit_movie-music.php?bit=<?php echo $content_id[8];?>" enctype = "multipart/form-data" method = "post">
							<input type ="file" name = "img9" class = "px10top" />
							<?php if(isset($msg18) && !empty($msg18) && !is_null($msg18)){echo $msg18;}?>
							<input type = "submit" name = "subimg9" value = "Update photo" class = "btn btn-default yote" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once("footer.php");?>