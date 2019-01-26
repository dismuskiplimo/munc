<?php $page_title="gossip";?>

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
	$page_set = select_all("gossip_content","id",6);
	$image_set = select_all("gossip_image","id",1);
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
	<div class="row wide hidden-xs">
		<img src="<?php echo $main_image[0];?>" class="img-responsive">
	</div>
</div>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6">
				<img src="<?php echo $img[0];?>" class="img-responsive video">
				<p class="wide"><?php echo nl2br($content[0]);?></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<img src="<?php echo $img[1];?>" class="img-responsive video">
				<p class="wide"><?php echo nl2br($content[1]);?></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<img src="<?php echo $img[2];?>" class="img-responsive video">
				<p class="wide"><?php echo nl2br($content[2]);?></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<img src="<?php echo $img[3];?>" class="img-responsive video">
				<p class="wide"><?php echo nl2br($content[3]);?></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<img src="<?php echo $img[4];?>" class="img-responsive video">
				<p class="wide"><?php echo nl2br($content[4]);?></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<img src="<?php echo $img[5];?>" class="img-responsive video">
				<p class="wide"><?php echo nl2br($content[5]);?></p>
			</div>
		</div>
	</div>
	<!--<div class="col-lg-2 px10top">
		<div class="row">
			<img src="images/dummy.png" class="img-responsive marg">
		</div>-->
	</div>
</div>
<?php require_once("includes/footer.php");?>