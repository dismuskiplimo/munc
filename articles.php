<?php $page_title="articles";?>

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
	$author = Array();
	$page_set = select_all("article_content","id",3);
	// Loop through array 
	while($page = mysql_fetch_array($page_set)){
		$img[] = $page['img_url'];
		$title[] = $page['title'];
		$content[] = $page['content'];
		$author[] = $page['author'];
		
	}
	
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<img src="<?php echo $img[0];?>" class="img-responsive">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 hidden-xs">
					<img src="<?php echo $img[1];?>" class="img-responsive">
				</div>
				<div class="col-lg-4 col-md-4 hidden-xs hidden-sm">
					<img src="<?php echo $img[2];?>" class="img-responsive">
				</div>
			</div>
			
			<div class="row wide">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<h4 class="underline"><?php echo $title[0];?></h4>
					<p><?php echo nl2br($content[0]);?></p>
					<p class="theme-color" style="font-size:0.8em;">
						Article by: @ <?php echo $author[0];?>
					</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<h4 class="underline"><?php echo $title[1];?></h4>
					<p><?php echo nl2br($content[1]);?></p>
					<p class="theme-color" style="font-size:0.8em;">
						Article by: @ <?php echo $author[1];?>
					</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<h4 class="underline"><?php echo $title[2];?></h4>
					<p><?php echo nl2br($content[2]);?></p>
					<p class="theme-color" style="font-size:0.8em;">
						Article by: @ <?php echo $author[2];?>
					</p>
				</div>
			</div>
		</div>
		<!--<div class="col-lg-2 px10top">
			<img src="images/habari.jpg" class="img-responsive marg">
		</div>-->
		
	</div>
</div>
<?php require_once("includes/footer.php");?>