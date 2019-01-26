<?php $page_title="sports";?>

<?php
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
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
	}
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4 col-lg-push-4 col-md-push-4 col-md-4"><!--div 2-->
					<div style="background-color:white; margin-right:5px; margin-left:5px; min-height:350px;" class="drop center wide px10rt">
					<br/><h1	class="upper marg"><?php echo $title[1];?></h1><br/>
					<h5 class="marg"><?php echo nl2br($content[1]);?></h5>
					</div><!--/div 2-->
				</div>
				<div class="col-lg-4 col-lg-pull-4 col-md-4 col-md-pull-4 wide"><!--div 1-->
					<img src="<?php echo $img[0];?>" class="img-responsive marg">
					<h2><?php echo $title[0];?></h2>
					<p><?php echo nl2br($content[0]);?></p>
				</div><!--/div 1-->
				<div class="col-lg-4 col-md-4 wide"><!--div 3-->
					<img src="<?php echo $img[2];?>" class="img-responsive marg">
					<h2><?php echo $title[2];?></h2>
					<p><?php echo nl2br($content[2]);?></p>
				</div><!--/div 3-->
			</div>
			<div class="row wide">
				<div class="col-lg-8 col-md-8 wide"><!--div 4-->
					<img src="<?php echo $img[3];?>" class="img-responsive marg">
					<h2><?php echo $title[3];?></h2>
					<p><?php echo nl2br($content[3]);?></p>
				</div><!--/div 4-->
				<div class="col-lg-4 col-md-4 wide"><!--div 5-->
					<div class="thumbnail">
						<img src="<?php echo $img[4];?>" class="img-responsive marg">
					</div>
					<h2><?php echo $title[4];?></h2>
					<p><?php echo nl2br($content[4]);?></p>
				</div><!--/div 5-->
			</div>
			<div class="row wide">
				<div class="col-lg-4 col-md-4 wide"><!--div 6-->
					<img src="<?php echo $img[5];?>" class="img-responsive marg video">
					<h3 class=""><?php echo $title[5];?></h3>
					<p><?php echo nl2br($content[5]);?></p>
				</div><!--/div 6-->
				<div class="col-lg-4 col-md-4 wide"><!--div 7-->
					<img src="<?php echo $img[6];?>" class="img-responsive marg video">
					<h3 class=""><?php echo $title[6];?></h3>
					<p><?php echo nl2br($content[6]);?></p>
				</div><!--/div 7-->
				<div class="col-lg-4 col-md-4 wide"><!--div 8-->
					<img src="<?php echo $img[7];?>" class="img-responsive marg video">
					<h3 class=""><?php echo $title[7];?></h3>
					<p><?php echo nl2br($content[7]);?></p>
				</div><!--/div 8-->
			</div>
		</div>
		<!--<div class="col-lg-2 px10top">
			<div class="thumbnail">
				<img src="images/dummy.png" class="img-responsive marg">
			</div>
		</div>-->
	</div>
</div>
<?php require_once("includes/footer.php");?>