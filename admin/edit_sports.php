<?php $page_title="sports";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	if(isset($_POST['sub1'])){
		$msg1 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub2'])){
		$msg2 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub3'])){
		$msg3 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub4'])){
		$msg4 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub5'])){
		$msg5 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub6'])){
		$msg6 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub7'])){
		$msg7 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub8'])){
		$msg8 = update_double($_GET['bit'],"sports_content","title","content",$_POST['tit'],$_POST['cont']);
	}
	
	//.....................................................................................................
	if(isset($_POST['subimg1'])){
		$msg9 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	if(isset($_POST['subimg3'])){
		$msg10 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	if(isset($_POST['subimg4'])){
		$msg11 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	if(isset($_POST['subimg5'])){
		$msg12 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	if(isset($_POST['subimg6'])){
		$msg13 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	if(isset($_POST['subimg7'])){
		$msg14 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	if(isset($_POST['subimg8'])){
		$msg15 = upload_picture("img",$_GET['bit'],"sports_content");
	}
	
	//Set up page variables
	$sports = select_all("sports_content","id", 8);
	$img = Array();
	$title = Array();
	$content = Array();
	//Loop to fetch page data
	while($sport = mysql_fetch_array($sports)){
		$img[] = $sport['img_url'];
		$title[] = $sport['title'];
		$content[] = $sport['content'];
		$content_id[] = $sport['id'];
	}
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-md-push-4 col-md-4"><!--div 2-->
					<div style="background-color:white; margin-right:5px; margin-left:5px; min-height:450px;" class="drop center wide px10rt">
					<form method = "post" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[1]);?>">
						<br /><input type = "text" name = "tit" maxlength = "150"	class="upper center yote" style = "font-size:2em;" value = "<?php echo $title[1];?>" />
						<textarea class="marg yote" name = "cont" rows = "14"><?php echo($content[1]);?></textarea>
						<?php if(isset($msg2) && !empty($msg2) && !is_null($msg2)){echo $msg2;}?>
						<input type = "submit" name = "sub2" class = "yote btn btn-success" value = "update content" style = "margin:10px 0 0 0;" />
					</form>
					</div><!--/div 2-->
				</div>
				<div class="col-lg-4 col-lg-pull-4 col-md-4 col-md-pull-4 wide"><!--div 1-->
					<div class= "border">
						<img src="<?php echo "../" . $img[0];?>" class="img-responsive marg">
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[0]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[0];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[0]);?></textarea>
							<?php if(isset($msg1) && !empty($msg1) && !is_null($msg1)){echo $msg1;}?>
							<input type = "submit" name = "sub1" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[0]);?>" method = "post">
							<input type = "file" name = "img" />
							<?php if(isset($msg9) && !empty($msg9) && !is_null($msg9)){echo $msg9;}?>
							<input type = "submit" name = "subimg1" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 1-->
				<div class="col-lg-4 col-md-4 wide"><!--div 3-->
					<div class= "border">
						<img src="<?php echo "../" . $img[2];?>" class="img-responsive marg">
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[2]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[2];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[2]);?></textarea>
							<?php if(isset($msg3) && !empty($msg3) && !is_null($msg3)){echo $msg3;}?>
							<input type = "submit" name = "sub3" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[2]);?>" method = "post">
							<input type = "file" name = "img"  />
							<?php if(isset($msg10) && !empty($msg10) && !is_null($msg10)){echo $msg10;}?>
							<input type = "submit" name = "subimg3" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 3-->
			</div>
			<div class="row wide">
				<div class="col-lg-8 col-md-8 wide"><!--div 4-->
					<div class= "border">
						<img src="<?php echo "../" . $img[3];?>" class="img-responsive marg">
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[3]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[3];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[3]);?></textarea>
							<?php if(isset($msg4) && !empty($msg4) && !is_null($msg4)){echo $msg4;}?>
							<input type = "submit" name = "sub4" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[3]);?>" method = "post">
							<input type = "file" name = "img"  />
							<?php if(isset($msg11) && !empty($msg11) && !is_null($msg11)){echo $msg11;}?>
							<input type = "submit" name = "subimg4" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 4-->
				<div class="col-lg-4 col-md-4 wide"><!--div 5-->
					<div class= "border">
						<div class="thumbnail">
							<img src="<?php echo "../" . $img[4];?>" class="img-responsive marg">
						</div>
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[4]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[4];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[4]);?></textarea>
							<?php if(isset($msg5) && !empty($msg5) && !is_null($msg5)){echo $msg5;}?>
							<input type = "submit" name = "sub5" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[4]);?>" method = "post">
							<input type = "file" name = "img"  />
							<?php if(isset($msg12) && !empty($msg12) && !is_null($msg12)){echo $msg12;}?>
							<input type = "submit" name = "subimg5" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 5-->
			</div>
			<div class="row wide">
				<div class="col-lg-4 col-md-4 wide"><!--div 6-->
					<div class= "border">
						<img src="<?php echo "../" . $img[5];?>" class="img-responsive marg video">
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[5]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[5];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[5]);?></textarea>
							<?php if(isset($msg6) && !empty($msg6) && !is_null($msg6)){echo $msg6;}?>
							<input type = "submit" name = "sub6" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[5]);?>" method = "post">
							<input type = "file" name = "img" />
							<?php if(isset($msg13) && !empty($msg13) && !is_null($msg13)){echo $msg13;}?>
							<input type = "submit" name = "subimg6" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 6-->
				<div class="col-lg-4 col-md-4 wide"><!--div 7-->
					<div class= "border">
						<img src="<?php echo "../" . $img[6];?>" class="img-responsive marg video">
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[6]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[6];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[6]);?></textarea>
							<?php if(isset($msg7) && !empty($msg7) && !is_null($msg7)){echo $msg7;}?>
							<input type = "submit" name = "sub7" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[6]);?>" method = "post">
							<input type = "file" name = "img" />
							<?php if(isset($msg14) && !empty($msg14) && !is_null($msg14)){echo $msg14;}?>
							<input type = "submit" name = "subimg7" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 7-->
				<div class="col-lg-4 col-md-4 wide"><!--div 8-->
					<div class= "border">
						<img src="<?php echo "../" . $img[7];?>" class="img-responsive marg video">
						<form action = "edit_sports.php?bit=<?php echo htmlentities($content_id[7]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[7];?>" class = "yote" style = "font-size:2em;" placeholder = "title"/>
							<textarea rows = "14" name = "cont" class = "yote" placeholder = "content"><?php echo nl2br($content[7]);?></textarea>
							<?php if(isset($msg8) && !empty($msg8) && !is_null($msg8)){echo $msg8;}?>
							<input type = "submit" name = "sub8" value = "Update Content" class = "yote btn btn-success px10top" />
						</form>
						<form enctype = "multipart/form-data" action = "edit_sports.php?bit=<?php echo htmlentities($content_id[7]);?>" method = "post">
							<input type = "file" name = "img" />
							<?php if(isset($msg15) && !empty($msg15) && !is_null($msg15)){echo $msg15;}?>
							<input type = "submit" name = "subimg8" value = "Update Image" class = "yote btn btn-default px10top" />
						</form>
					</div>
				</div><!--/div 8-->
			</div>
		</div>
		<!--<div class="col-lg-2 px10top">
				<img src="<?php echo "../";?>images/dummy.png" class="img-responsive " />
		</div>-->
	</div>
</div>
<?php require_once("footer.php");?>