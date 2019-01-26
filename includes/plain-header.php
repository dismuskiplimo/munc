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
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<span id="tarehe" class="navbar-text navbar-left hidden-xs" style="font-size:0.8em;"></span>
				<ul class="nav navbar-nav  navbar-right">
					<li></li>
					<li <?php if($page_title=="login"){echo "class=\"active\"";}?>><a href="index.php">Home <span class="glyphicon glyphicon-home"></span></a></li>
				</ul>	
			</div>
		</div>