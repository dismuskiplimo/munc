<?php
//..........................row 1 update ................................
if(isset($_POST['foot1'])){
	$footer1 = update_double($_GET['bit'],"footer","title","content",$_POST['footTitle1'],$_POST['footContent1']);
}

//..........................row 2 update ................................
if(isset($_POST['foot2'])){
	$footer2 = update_double($_GET['bit'],"footer","title","content",$_POST['footTitle2'],$_POST['footContent2']);
}

//..........................row 3 update ................................
if(isset($_POST['foot3'])){
	$footer3 = update_double($_GET['bit'],"footer","title","content",$_POST['footTitle3'],$_POST['footContent3']);
}


?>

<?php
	$footers = select_all("footer", "id", 3);
	$title = array();
	$content = array();$content_id = array();
	while($footer = mysql_fetch_array($footers)){
		$title[] = $footer['title'];
		$content[] = $footer['content'];
		$content_id[] = $footer['id'];
	}
?>
<footer class="container-fluid" style="font-size:0.8em;">
			<div class="row">
				<!-- row 1 -->
				<div class="col-lg-4 col-md-4 px10top px10rt">
					<form action = "<?php echo htmlentities($_SERVER['PHP_SELF'] . "?bit=$content_id[0]") ;?>" method = "post">
						<input type = "text" class = "upper yote" value = "<?php echo $title[0];?>" name = "footTitle1" /><br class = "px10top"/>
						<textarea class = "yote" rows = "10" name = "footContent1"><?php echo $content[0];?></textarea><br class = "px10top"/>
						<?php if(isset($footer1) && !empty($footer1)){echo $footer1;}?>
						<input type = "submit" value = "Update this footer text section" class = "yote btn btn-default" name = "foot1" />
					</form>
				</div>
				<!--/row 1 -->
				<!-- row 2 -->
				<div class="col-lg-4 col-md-4 px10top px10rt">
					<form action = "<?php echo htmlentities($_SERVER['PHP_SELF'] . "?bit=$content_id[1]") ;?>" method = "post">
						<input type = "text" class = "upper yote" value = "<?php echo $title[1];?>" name = "footTitle2" /><br class = "px10top"/>
						<textarea class = "yote" rows = "10" name = "footContent2"><?php echo $content[1];?></textarea><br class = "px10top"/>
						<?php if(isset($footer2) && !empty($footer2)){echo $footer2;}?>
						<input type = "submit" value = "Update this footer text section" class = "yote btn btn-default" name = "foot2" />
					</form>
				</div>
				<!--/row 2 -->
				<!-- row 3 -->
				<div class="col-lg-4 col-md-4 px10top px10rt">
					<form action = "<?php echo htmlentities($_SERVER['PHP_SELF'] . "?bit=$content_id[2]") ;?>" method = "post">
						<input type = "text" class = "upper yote" value = "<?php echo $title[2];?>" name = "footTitle3" /><br class = "px10top"/>
						<textarea class = "yote" rows = "10" name = "footContent3"><?php echo $content[2];?></textarea><br class = "px10top"/>
						<?php if(isset($footer3) && !empty($footer3)){echo $footer3;}?>
						<input type = "submit" value = "Update this footer text section" class = "yote btn btn-default" name = "foot3" />
					</form>
					
					<a name="bottom"></a>
				</div>
				<!--/row 3 -->
			</div>
		</footer>
		<script type="text/javascript">
			d = new Date();
			document.getElementById("tarehe").innerHTML = "<span class=\"glyphicon glyphicon-time\"></span> " + d.toDateString();
		</script>
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</body>
</html>
<?php
	if(isset($conn)){
		mysql_close($conn);
	}
?>