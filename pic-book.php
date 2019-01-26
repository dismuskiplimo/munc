<?php $page_title="pic-book";?>

<?php
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
	/*
	**
	*/
	$main_image = Array();
	$image_set = select_all("picbook_image","id",1);
	// Loop through array 
	while($main_img = mysql_fetch_array($image_set)){
		$main_image[] = $main_img['img_url'];
	}
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row px10top">
		<div class="thumbnail">
			<img src="<?php echo $main_image[0];?>" class="img-responsive">
		</div>
	</div>
</div>
<?php require_once("includes/footer.php");?>