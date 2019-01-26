<?php $page_title="videos";?>

<?php
	require_once("includes/functions.php");
	require_once("includes/check_file.php");
	require_once("includes/db_con.php");
?>

<!--HEADER-->
<?php require_once("includes/header.php");?>
<div class="container-fluid">
	<div class="row wide">
		<div class="col-lg-12">
			<div class="row">
				
				<div class="col-lg-6 col-lg-push-3 col-md-12 center">
					<div class="">
						<video src="videos/ph.mp4" controls width="100%" height="auto">
							<source src="videos/ph.mp4 type ="video/mp4" />
							<source src="videos/phwebm type ="video/webm" />
							<source src="videos/ph.ogv type ="video/ogg" />
						</video>
					</div>
					<div>
						<h2 class="theme-color">Welcome to MUNC</h2>
						<p class="left">Sit down together on the first day of every month and review your
						calendars. Make your romantic plans first, and then fit your other
						meetings, appointments, and commitments into your schedule. Couples 
						who have an A+ Relationship keep their love life a number one priority
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6 col-lg-pull-6">
					<div class="thumbnail">
						<img src="images/dummy.png" class="img-responsive marg">
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="thumbnail">
						<img src="images/dummy.png" class="img-responsive marg">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once("includes/footer.php");?>