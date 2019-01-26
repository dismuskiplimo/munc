<?php $page_title="articles";?>

<?php
	require_once("sessions.php");
	require_once("../includes/functions.php");
	check_logged_in();
	require_once("check_file.php");
	require_once("db_con.php");
	
	//.....................UPDATE image 1 ..............................
	if(isset($_POST['submitimg1'])){
		$msg0 = upload_picture("image1", $_GET['bit'],"article_content");
	}
	
	//.....................UPDATE image 2 ..............................
	if(isset($_POST['submitimg2'])){
		$msg1 = upload_picture("image2", $_GET['bit'],"article_content");
	}
	
	//.....................UPDATE image 3 ..............................
	if(isset($_POST['submitimg3'])){
		$msg2 = upload_picture("image3", $_GET['bit'],"article_content");
	}
	
	//......................UPDATE col 1 ...............................
	if(isset($_POST['submitart1'])){
		$msg3 = update_triple($_GET['bit'], "article_content","title","content","author",$_POST['tit1'],$_POST['cont1'],$_POST['auth1'] );
	}
	
	//......................UPDATE col 2 ...............................
	if(isset($_POST['submitart2'])){
		$msg4 = update_triple($_GET['bit'], "article_content","title","content","author",$_POST['tit2'],$_POST['cont2'],$_POST['auth2'] );
	}
	
	//......................UPDATE col 3 ...............................
	if(isset($_POST['submitart3'])){
		$msg5 = update_triple($_GET['bit'], "article_content","title","content","author",$_POST['tit3'],$_POST['cont3'],$_POST['auth3'] );
	}
	
	/*
	**gather page variables
	*/
	$img = Array(); $title = Array(); $content = Array(); $author = Array(); $content_id = Array();
	$page_set = select_all("article_content","id",3);
	// Loop through array 
	while($page = mysql_fetch_array($page_set)){
		$img[] = $page['img_url'];
		$title[] = $page['title'];
		$content[] = $page['content'];
		$author[] = $page['author'];
		$content_id[] = $page['id'];
		
	}
	
?>

<!--HEADER-->
<?php require_once("header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<!-- img 1-->
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class = "border">
						<img src="<?php echo "../" . $img[0];?>" class="img-responsive">
						<form action = "edit_articles.php?bit=<?php echo urlencode($content_id[0]);?>" method = "post" enctype = "multipart/form-data">
							<input type = "file" class = "yote" name = "image1" />
							<input type = "submit" value = "Update photo" name = "submitimg1" class = "yote btn btn-success"/>
							<?php if (isset($msg0) && !is_null($msg0) && !empty($msg0)){echo $msg0;}?>
						</form>
					</div>
				</div>
				<!-- img 2-->
				
				<div class="col-lg-4 col-md-4 col-sm-6 hidden-xs">
					<div class = "border">
						<img src="<?php echo "../" . $img[1];?>" class="img-responsive">
						<form action = "edit_articles.php?bit=<?php echo urlencode($content_id[1]);?>" method = "post" enctype = "multipart/form-data">
							<input type = "file" name = "image2" class = "yote" />
							<input type = "submit" value = "Update photo" name = "submitimg2" class = "yote btn btn-success"/>
							<?php if (isset($msg1) && !is_null($msg1) && !empty($msg1)){echo $msg1;}?>
						</form>
					</div>
				</div>
				<!-- img 3-->
				
				<div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
					<div class = "border">
						<img src="<?php echo "../" . $img[2];?>" class="img-responsive">
						<form action = "edit_articles.php?bit=<?php echo urlencode($content_id[2]);?>" method = "post" enctype = "multipart/form-data">
							<input type = "file" name = "image3" class = "yote" />
							<input type = "submit" value = "Update photo" name = "submitimg3" class = "yote btn btn-success"/>
							<?php if (isset($msg2) && !is_null($msg2) && !empty($msg2)){echo $msg2;}?>
						</form>
					</div>
				</div>
			</div>
			
			<div class="row wide">
				<!-- col 1-->
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="border">
						<form action = "edit_articles.php?bit=<?php echo urlencode($content_id[0]);?>" method = "post">
							<input type = "text" class="yote" name = "tit1" style = "font-size:2em;" value = "<?php echo $title[0];?>" />
							<textarea class = "yote" rows = "14" name = "cont1"><?php echo $content[0];?></textarea>
							<p class="theme-color" style="font-size:0.8em;">
							Article by: @ <input type = "text" name = "auth1" value = "<?php echo $author[0];?>" />
							</p>
							<input type = "submit" value = "Update atricle"  name = "submitart1" class = "btn btn-success yote" />
							<?php if (isset($msg3) && !is_null($msg3) && !empty($msg3)){echo $msg3;}?>
						</form>
					</div>
				</div>
				
				<!-- col 2-->
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="border">
						<form action = "edit_articles.php?bit=<?php echo urlencode($content_id[1]);?>" method = "post">
							<input type = "text" class="yote" name = "tit2" style = "font-size:2em;" value = "<?php echo $title[1];?>" />
							<textarea class = "yote" name = "cont2" rows = "14"><?php echo $content[1];?></textarea>
							<p class="theme-color" style="font-size:0.8em;">
							Article by: @ <input type = "text" name = "auth2" value = "<?php echo $author[1];?>" />
							</p>
							<input type = "submit" value = "Update atricle" name = "submitart2" class = "btn btn-success yote" />
							<?php if (isset($msg4) && !is_null($msg4) && !empty($msg4)){echo $msg4;}?>
						</form>
					</div>
				</div>
				
				<!-- col 3-->
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="border">
						<form action = "edit_articles.php?bit=<?php echo urlencode($content_id[2]);?>" method = "post">
							<input type = "text" class="yote" name = "tit3" style = "font-size:2em;" value = "<?php echo $title[2];?>" />
							<textarea class = "yote" name = "cont3" rows = "14"><?php echo $content[2];?></textarea>
							<p class="theme-color" style="font-size:0.8em;">
							Article by: @ <input type = "text" name = "auth3" value = "<?php echo $author[2];?>" />
							</p>
							<input type = "submit" value = "Update atricle" name = "submitart3" class = "btn btn-success yote" />
							<?php if (isset($msg5) && !is_null($msg5) && !empty($msg5)){echo $msg5;}?>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="col-lg-2 px10top">
			<img src="images/habari.jpg" class="img-responsive marg">
		</div>-->
		
	</div>
</div>
<?php require_once("footer.php");?>