<?php $page_title="news";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
?>

<?php

	//....................................................................................
	if(isset($_POST['sub1'])){
		$msg1 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub2'])){
		$msg2 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub3'])){
		$msg3 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub4'])){
		$msg4 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub5'])){
		$msg5 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub6'])){
		$msg6 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	if(isset($_POST['sub7'])){
		$msg7 = update_double($_GET['bit'],"news_content", "title","content", $_POST['tit'],$_POST['cont']);
	}
	
	//......................................................................................
	
	if(isset($_POST['subimg1'])){
		$msg8 = upload_picture("img", $_GET['bit'], "news_content");
	}
	
	if(isset($_POST['subimg2'])){
		$msg9 = upload_picture("img", $_GET['bit'], "news_content");
	}
	
	if(isset($_POST['subimg3'])){
		$msg10 = upload_picture("img", $_GET['bit'], "news_content");
	}
	
	if(isset($_POST['subimg4'])){
		$msg11 = upload_picture("img", $_GET['bit'], "news_content");
	}
	
	if(isset($_POST['subimg5'])){
		$msg12 = upload_picture("img", $_GET['bit'], "news_content");
	}
	
	if(isset($_POST['subimg6'])){
		$msg13 = upload_picture("img", $_GET['bit'], "news_content");
	}
	
	if(isset($_POST['subimg7'])){
		$msg14 = upload_picture("img", $_GET['bit'], "news_content");
	}
	/*
	**load content variables
	*/
	$image = Array();
	$title = Array();
	$content = Array();
	$contents = select_all("news_content","id",7);
	while($cont = mysql_fetch_array($contents)){
		$image[] = $cont['img_url'];
		$title[] = $cont['title'];
		$content[] = $cont['content'];
		$content_id[] = $cont['id'];
	}
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row wide">
				<div class="col-lg-8 col-md-8 wide"><!--div 1 -->
					<div class = "border">
						<img src="<?php echo "../" . $image[0];?>" class="img-responsive marg">
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[0]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[0];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[0]);?></textarea>
							<?php if (isset($msg1) && !is_null($msg1) && !empty($msg1)){echo $msg1;}?>
							<input type = "submit" name = "sub1" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[0]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg8) && !is_null($msg8) && !empty($msg8)){echo $msg8;}?>
							<input type = "submit" name = "subimg1" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
						
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide"><!--div 2 -->
					<div class = "border">
						<div class = "thumbnail">
							<img src="<?php echo "../" . $image[1];?>" class="img-responsive marg">
						</div>
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[1]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[1];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[1]);?></textarea>
							<?php if (isset($msg2) && !is_null($msg2) && !empty($msg2)){echo $msg2;}?>
							<input type = "submit" name = "sub2" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[1]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg9) && !is_null($msg9) && !empty($msg9)){echo $msg9;}?>
							<input type = "submit" name = "subimg2" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
					</div>
				</div>
			</div>
			<div class="row wide">
				<div class="col-lg-8 col-md-8 wide"> <!--div 3 -->
					<div class = "border">
						<img src="<?php echo "../" . $image[2];?>" class="img-responsive marg">
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[2]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[2];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[2]);?></textarea>
							<?php if (isset($msg3) && !is_null($msg3) && !empty($msg3)){echo $msg3;}?>
							<input type = "submit" name = "sub3" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[2]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg10) && !is_null($msg10) && !empty($msg10)){echo $msg10;}?>
							<input type = "submit" name = "subimg3" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide"> <!--div 4 -->
					<div class = "border">
						<div class = "thumbnail">
							<img src="<?php echo "../" . $image[3];?>" class="img-responsive marg">
						</div>
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[3]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[3];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[3]);?></textarea>
							<?php if (isset($msg4) && !is_null($msg4) && !empty($msg4)){echo $msg4;}?>
							<input type = "submit" name = "sub4" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[3]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg11) && !is_null($msg11) && !empty($msg11)){echo $msg11;}?>
							<input type = "submit" name = "subimg4" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
					</div>
				</div>
			</div>
			<div class="row wide">
				<div class="col-lg-4 col-md-4 wide"> <!--div 5 -->
					<div class = "border">
						<img src="<?php echo "../" . $image[4];?>" class="img-responsive marg video">
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[4]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[4];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[4]);?></textarea>
							<?php if (isset($msg5) && !is_null($msg5) && !empty($msg5)){echo $msg5;}?>
							<input type = "submit" name = "sub5" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[4]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg12) && !is_null($msg12) && !empty($msg12)){echo $msg12;}?>
							<input type = "submit" name = "subimg5" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide"> <!--div 6 -->
					<div class = "border">
						<img src="<?php echo "../" . $image[5];?>" class="img-responsive marg video">
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[5]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[5];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[5]);?></textarea>
							<?php if (isset($msg6) && !is_null($msg6) && !empty($msg6)){echo $msg6;}?>
							<input type = "submit" name = "sub6" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[5]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg13) && !is_null($msg13) && !empty($msg13)){echo $msg13;}?>
							<input type = "submit" name = "subimg6" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide"> <!--div 7 -->
					<div class = "border">
						<img src="<?php echo "../" . $image[6];?>" class="img-responsive marg video">
						<form action = "edit_news.php?bit=<?php echo htmlentities($content_id[6]);?>" method = "post">
							<input type = "text" name = "tit" maxlength = "150" value = "<?php echo $title[6];?>" style = "width:100%; font-size:2em;" placeholder = "Title" />
							<textarea rows = "10" name = "cont" style = "width:100%; padding:20px 10px;"><?php echo nl2br($content[6]);?></textarea>
							<?php if (isset($msg7) && !is_null($msg7) && !empty($msg7)){echo $msg7;}?>
							<input type = "submit" name = "sub7" value = "Update Content" class = "btn btn-success" style = "width:100%;">
						</form>
						<form enctype = "multipart/form-data" method = "post" action = "edit_news.php?bit=<?php echo htmlentities($content_id[6]);?>">
							<input type = "file" name = "img" style = "float:left;  margin:10px 0; width:50%;" />
							<?php if (isset($msg14) && !is_null($msg14) && !empty($msg14)){echo $msg14;}?>
							<input type = "submit" name = "subimg7" value = "Update Image" style = "float:right; margin:10px 0; width:50%;" class = "btn btn-default" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once("footer.php");?>