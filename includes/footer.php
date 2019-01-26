<?php
	$footers = select_all("footer", "id", 3);
	$title = Array();
	$content = Array();
	while($footer = mysql_fetch_array($footers)){
		$title[] = $footer['title'];
		$content[] = $footer['content'];
	}
?>
<footer class="container-fluid" style="font-size:0.8em;">
			<div class="row">
				<div class="col-lg-4 col-md-4 px10top px10rt">
					<h5 class="upper"><?php echo $title[0];?></h5>
					<p>
						<?php echo nl2br($content[0]);?>
					</p>
				</div>
				<div class="col-lg-4 col-md-4 px10top px10rt">
					<h5 class="upper"><?php echo $title[1];?></h5>
					<p>
						<?php echo nl2br($content[1]);?>
					</p>
				</div>
				<div class="col-lg-4 col-md-4 px10top px10rt">
					<h5 class="upper"><?php echo $title[2];?></h5>
					<p>
						<?php echo nl2br($content[2]);?>
					</p>
					<a name="bottom"></a>
				</div>
			</div>
		</footer>
		<script type="text/javascript">
			d = new Date();
			document.getElementById("tarehe").innerHTML = "<span class=\"glyphicon glyphicon-time\"></span> " + d.toDateString();
		</script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php
	if(isset($conn)){
		mysql_close($conn);
	}
?>