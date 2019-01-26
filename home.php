<?php $page_title="home";?>

<?php
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
?>
<?php
	/*
	** main image variables
	*/
	
	$main_image = select_all("main_image", "date_added",1);
	while($main_img = mysql_fetch_array($main_image)){
		$main_im = $main_img['img_url'];
	}
	
	/*
	** main content variables
	*/
	$main_content_title = Array();
	$main_content_content = Array();
	$main_contents = select_all("main_content", "id",2);
	while($main_content = mysql_fetch_array($main_contents)){
		$main_content_title[] = $main_content['title'];
		$main_content_content[] = $main_content['content'];
	}
	
	/*
	** main sub content variables
	*/
	$main_subcontent_title = Array();
	$main_subcontent_image = Array();
	$main_subcontent_content = Array();
	$main_subcontents = select_all("main_subtopics", "id",5);
	while($main_subcontent = mysql_fetch_array($main_subcontents)){
		$main_subcontent_title[] = $main_subcontent['title'];
		$main_subcontent_content[] = $main_subcontent['content'];
		$main_subcontent_image[] = $main_subcontent['img_url'];
	}
	
	/*
	** auxiliary image variables
	*/
	
	$sub_image = select_all("main_sub_image", "date_added",1);
	while($sub_img = mysql_fetch_array($sub_image)){
		$sub_im = $sub_img['img_url'];
	}
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="row"><!--Top Image -->
				<div class="col-lg-12">
					<img src="<?php echo $main_im;?>" class="img-responsive" />
				</div>
			</div>
			<div class="row"><!--content 1 -->
				<div class="col-lg-12">
					<h3 class="underline"><?php echo $main_content_title[0];?></h3>
					<p><?php echo nl2br($main_content_content[0]);?></p>
				</div>
			</div>
			<div class="row"><!--content 2 -->
				<div class="col-lg-12">
					<div class="thumbnail center">
						<h2><span class="underline"><?php echo $main_content_title[1];?></span></h2>
						<h4><?php echo nl2br($main_content_content[1]);?></h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-2 col-lg-offset-1 col-md-4 col-sm-6"><!--column 1 -->
			<h5 class="upper underline"><?php echo $main_subcontent_title[0];?></h5>
			<div class="thumbnail">
				<img src="<?php echo $main_subcontent_image[0];?>" class="img-responsive">
			</div>
			<p>	<?php echo nl2br($main_subcontent_content[0]);?> </p>
		</div>
		<div class="col-lg-2 col-md-4 col-sm-6"><!--column 2 -->
			<h5 class="upper underline"><?php echo $main_subcontent_title[1];?></h5>
			<div class="thumbnail">
				<img src="<?php echo $main_subcontent_image[1];?>" class="img-responsive">
			</div>
			<p><?php echo nl2br($main_subcontent_content[1]);?></p>
		</div>
		<div class="col-lg-2 col-md-4 col-sm-6"><!--column 3 -->
			<h5 class="upper underline"><?php echo $main_subcontent_title[2];?></h5>
			<div class="thumbnail">
				<img src="<?php echo $main_subcontent_image[2];?>" class="img-responsive">
			</div>
			<p><?php echo nl2br($main_subcontent_content[2]);?></p>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6"><!--column 4 -->
			<h5 class="upper underline"><?php echo $main_subcontent_title[3];?></h5>
			<div class="thumbnail">
				<img src="<?php echo $main_subcontent_image[3];?>" class="img-responsive">
			</div>
			<p><?php echo nl2br($main_subcontent_content[3]);?></p>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-12"> <!--column 5 -->
			<h5 class="upper underline"><?php echo $main_subcontent_title[4];?></h5>
			<div class="thumbnail">
				<img src="<?php echo $main_subcontent_image[4];?>" class="img-responsive">
			</div>
			<p><?php echo nl2br($main_subcontent_content[4]);?></p>
		</div>
	</div>
</div>
<div class="container-fluid wide">
	<div class="row"><!--Bottom Image-->
		<div class="col-lg-12">
			<div class="thumbnail">
				<img src="<?php echo $sub_im; ?>" class="img-responsive marg" />
			</div>
		</div>
	</div>
</div>
<?php require_once("includes/footer.php");?>