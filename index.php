<?php $page_title="wp";?>

<?php
	/*
	** Get Core files
	*/
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
	
	/*
	** set home page main image variables
	*/
	
	$home_image=select_all("home_image", "date_added",1);
	$image= Array();
	while($images = mysql_fetch_array($home_image)){
		$image[] = $images['img_url'];
	}
	
	/*
	** set home page text column variables
	*/
	$texts= array();
	$images = array();
	$home_text=select_all("home_text", "date_added",2);
	while($texts = mysql_fetch_array($home_text)){
		$content[]= $texts['content'];
		$sub_img[]=$texts['img_url'];
	}
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row ">
		<img src="<?php echo $image[0];?>" class="img-responsive">
	</div>
</div>
<div class="container">
	<div class="row wide">
		<div class="col-lg-6 col-md-6 px10top">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<img class="img-responsive" src="<?php echo $sub_img[0];?>">
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<?php echo nl2br($content[0]);?>
					<br />
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 px10top">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<img class="img-responsive" src="<?php echo $sub_img[1];?>">
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
					<?php echo nl2br($content[1]);?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once("includes/footer.php");?>