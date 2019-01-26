<?php $page_title="news";?>

<?php
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
?>

<?php
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
	}
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row wide">
				<div class="col-lg-8 col-md-8 wide"><!--div 1 -->
					<img src="<?php echo $image[0];?>" class="img-responsive marg">
					<h2><?php echo $title[0];?></h2>
					<p><?php echo nl2br($content[0]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 wide"><!--div 2 -->
					<div class="thumbnail">
						<img src="<?php echo $image[1];?>" class="img-responsive marg">
					</div>
					<h2><?php echo $title[1];?></h2>
					<p><?php echo nl2br($content[1]);?></p>
				</div>
			</div>
			<div class="row wide">
				<div class="col-lg-8 col-md-8 wide"> <!--div 3 -->
					<img src="<?php echo $image[2];?>" class="img-responsive marg">
					<h2><?php echo $title[2];?></h2>
					<p><?php echo nl2br($content[2]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 wide"> <!--div 4 -->
					<div class="thumbnail">
						<img src="<?php echo $image[3];?>" class="img-responsive marg">
					</div>
					<h2><?php echo $title[3];?></h2>
					<p><?php echo nl2br($content[3]);?></p>
				</div>
			</div>
			<div class="row wide">
				<div class="col-lg-4 col-md-4 wide"> <!--div 5 -->
					<img src="<?php echo $image[4];?>" class="img-responsive marg video">
					<h3 class=""><?php echo $title[4];?></h3>
					<p><?php echo nl2br($content[4]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 wide"> <!--div 6 -->
					<img src="<?php echo $image[5];?>" class="img-responsive marg video">
					<h3 class=""><?php echo $title[5];?></h3>
					<p><?php echo nl2br($content[5]);?></p>
				</div>
				<div class="col-lg-4 col-md-4 wide"> <!--div 7 -->
					<img src="<?php echo $image[6];?>" class="img-responsive marg video">
					<h3 class=""><?php echo $title[6];?></h3>
					<p><?php echo nl2br($content[6]);?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once("includes/footer.php");?>