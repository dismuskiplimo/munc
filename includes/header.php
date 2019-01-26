<!doctype html>
<html>
	<head>
		<title><?php echo ucfirst($page_title)?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<script type="text/javascript" src="js/respond.js"></script>
	</head>
	<body>
		<!--header-->
		<header class="container px10top">
			<div class="row">
				<div class="col-lg-3 col-md-5 col-sm-6 col-xs-4" >
					<a href="index.php" title="Home page"><img src="images/logo.png" class="img-responsive"></a>
				</div>
				<div class="col-lg-9 col-md-7 col-sm-6 col-xs-8">
					<div class="row">
						<div class="col-lg-12">
							<a href="#bottom"><img src="images/social.png" class="img-responsive pull-right"></a>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<!--nav -->
							<nav class="navbar" role="navigation">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menuu">
										<span>MENU </span>
										<span class="glyphicon glyphicon-chevron-down"></span>
									</button>
								</div>
								<div class="collapse navbar-collapse" id="menuu">
									<ul class="nav navbar-nav upper pull-right">
										<li class="lower<?php if($page_title=="wp"){echo " active und";}?>"><a href="index.php">wp</a></li>
										<li <?php if($page_title=="home"){echo "class=\"active und\"";}?>><a href="home.php">home <span class="glyphicon glyphicon-home"></span></a></li>
										<li <?php if($page_title=="news"){echo "class=\"active und\"";}?>><a href="news.php">news</a></li>
										<li <?php if($page_title=="sports"){echo "class=\"active und\"";}?>><a href="sports.php">sports</a></li>
										<li <?php if($page_title=="gossip"){echo "class=\"active und\"";}?>><a href="gossip.php">gossip</a></li>
										<li <?php if($page_title=="articles"){echo "class=\"active und\"";}?>><a href="articles.php">articles</a></li>
										<li <?php if($page_title=="movie-music"){echo "class=\"active und\"";}?>><a href="movie-music.php">movie-music</a></li>
										<li <?php if($page_title=="pic-book"){echo "class=\"active und\"";}?>><a href="pic-book.php">pic-book</a></li>
										<!--<li <?php if($page_title=="videos"){echo "class=\"active und\"";}?>><a href="videos.php">videos</a></li>-->
									</ul>
								</div>
							</nav>
							<!--/nav -->
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<span id="tarehe" class="navbar-text navbar-left hidden-xs" style="font-size:0.8em;"></span>
				<ul class="nav navbar-nav  navbar-right">
					<li></li>
					<li <?php if($page_title=="login"){echo "class=\"active\"";}?>><a href="login.php">Log in <span class="glyphicon glyphicon-lock"></span></a></li>
				</ul>	
			</div>
		</div>
		<!--/header-->