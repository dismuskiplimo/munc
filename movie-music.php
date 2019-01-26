<?php $page_title="movie-music";?>

<?php
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
	
	/*
	**gather page variables
	*/
	$img = Array();
	$title = Array();
	$content = Array();
	$main_image = Array();
	$page_set = select_all("music_content","id",9);
	$image_set = select_all("music_image","id",1);
	// Loop through array 
	while($main_img = mysql_fetch_array($image_set)){
		$main_image[] = $main_img['img_url'];
	}
	while($page = mysql_fetch_array($page_set)){
		$img[] = $page['img_url'];
		$title[] = $page['title'];
		$content[] = $page['content'];
	}
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row">
		<img src="<?php echo $main_image[0];?>" class="img-responsive">
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 wide">
			<div class="row">
				<div class="col-lg-4 col-md-4 wide">
					<h5 class="underline upper">MUSIC <br /></h5>
					<div class="px10top">
						<img src="<?php echo $img[0];?>" class="img-responsive marg video">
						<h5 class="upper px10top"><?php echo $title[0];?></h5>
						<p><?php echo nl2br($content[0]);?></p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide">
					<h5 class="underline upper">MOVIES <br /></h5>
					<div class="px10top">
						<img src="<?php echo $img[1];?>" class="img-responsive marg video">
						<h5 class="upper px10top"><?php echo $title[1];?></h5>
						<p><?php echo nl2br($content[1]);?></p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 wide">
					<h5 class="underline upper">SERIES <br /></h5>
					<div class="px10top">
						<img src="<?php echo $img[2];?>" class="img-responsive marg video">
						<h5 class="upper px10top"><?php echo $title[2];?></h5>
						<p><?php echo nl2br($content[2]);?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<img src="<?php echo $img[3];?>" class="img-responsive marg">
					<h5 class="upper px10top"><?php echo $title[3];?></h5>
					<p><?php echo nl2br($content[3]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<img src="<?php echo $img[4];?>" class="img-responsive marg">
					<h5 class="upper px10top"><?php echo $title[4];?></h5>
					<p><?php echo nl2br($content[4]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<img src="<?php echo $img[5];?>" class="img-responsive marg">
					<h5 class="upper px10top"><?php echo $title[5];?></h5>
					<p><?php echo nl2br($content[5]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<img src="<?php echo $img[6];?>" class="img-responsive marg">
					<h5 class="upper px10top"><?php echo $title[6];?></h5>
					<p><?php echo nl2br($content[6]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<img src="<?php echo $img[7];?>" class="img-responsive marg">
					<h5 class="upper px10top"><?php echo $title[7];?></h5>
					<p><?php echo nl2br($content[7]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 wide">
					<img src="<?php echo $img[8];?>" class="img-responsive marg">
					<h5 class="upper px10top"><?php echo $title[8];?></h5>
					<p><?php echo nl2br($content[8]);?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once("includes/footer.php");?>