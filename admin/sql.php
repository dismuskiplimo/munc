<?php require_once("../includes/functions.php");?>
<?php require_once("check_file.php");?>
<?php require_once("../includes/config.php");?>
<?php include_once("lorem.php");?>
<?php 
	$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	$db = mysql_select_db(DB_DATABASE,$conn);
	$errors = array();
	if(!$conn){
		redirect_to("connect_db.php");
	}
	else{
		
		/*
		** create table for home page image
		*/
		
		$query="CREATE TABLE IF NOT EXISTS home_image(
			id INT(11) AUTO_INCREMENT, img_url TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "home page image error";
		}
		
		else{
			/*
			** load dummy data
			*/	
			
			$query="INSERT INTO home_image(img_url) VALUES('images/home.jpg')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."3";
			}
		}
		
		/*
		** create table for home page two columns area
		*/
		
		$query="CREATE TABLE IF NOT EXISTS home_text(
			id INT(11) AUTO_INCREMENT, img_url TEXT, content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error() . "2";
		}
		
		else{
			/*
			** load dummy Data
			*/
			
			$query="INSERT INTO home_text(img_url, content) VALUES('images/tick.png','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."4";
			}
		
			$query="INSERT INTO home_text(img_url, content) VALUES('images/tick.png','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."5";
			}
		
		}
		
		/*
		** create footer table 
		*/
		
		$query = "CREATE TABLE IF NOT EXISTS footer(id INT(11) NOT NULL AUTO_INCREMENT, title VARCHAR(50), content TEXT, PRIMARY KEY(id))";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error() . "6";
		}
		else{
			/*
			** load dummy Data
			*/
			
			$query="INSERT INTO footer(title, content) VALUES('Heading 1','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."footer 1";
			}
			
			$query="INSERT INTO footer(title, content) VALUES('Heading 2','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."footer 2";
			}
			
			$query="INSERT INTO footer(title, content) VALUES('Heading 3','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."footer 3";
			}
		}
		
		/*
		** create main page main-image table
		*/
		
		$query="CREATE TABLE IF NOT EXISTS main_image(
			id INT(11) AUTO_INCREMENT, img_url TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "main page image error";
		}
		else{
			
			/*
			** load dummy data
			*/
		
			$query="INSERT INTO main_image(img_url) VALUES('images/33.png')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."main image faulty";
			}
		}
		
		/*
		** create main page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS main_content(
			id INT(11) AUTO_INCREMENT, title TEXT,content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "main page main content error";
		}
		else{
			/*
			** load dummy data
			*/
			$query = "INSERT INTO main_content(title,content) VALUES('Kenya Armed Forces looking for new recruits', '$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "main page main content 1 error";
			}
			
			$query = "INSERT INTO main_content(title,content) VALUES('ANNOUNCEMENTS', '$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "main page main content 2 error";
			}
			
		}
		
		/*
		** create main page sub content table
		*/
		$query="CREATE TABLE IF NOT EXISTS main_subtopics(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT,content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "main page sub-content error";
		}
		else{
			/*
			** load dummy data
			*/
			$query = "INSERT INTO main_subtopics(img_url,title,content) VALUES('images/pag.png','NEWS','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sub-content 1 error";
			}
			
			$query = "INSERT INTO main_subtopics(img_url,title,content) VALUES('images/pag.png','SPORTS','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sub-content 2 error";
			}
			
			$query = "INSERT INTO main_subtopics(img_url,title,content) VALUES('images/pag.png','GOSSIP','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sub-content 3 error";
			}
			
			$query = "INSERT INTO main_subtopics(img_url,title,content) VALUES('images/pag.png','ARTICLES','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sub-content 4 error";
			}
			
			$query = "INSERT INTO main_subtopics(img_url,title,content) VALUES('images/pag.png','MOVIES-MUSIC','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sub-content 5 error";
			}
		}
		
		/*
		** create main page sub-image table
		*/
		$query="CREATE TABLE IF NOT EXISTS main_sub_image(
			id INT(11) AUTO_INCREMENT, img_url TEXT, date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(id)  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "main page sub-image error";
		}
		else{
			/*
			** load dummy data
			*/
			$query="INSERT INTO main_sub_image(img_url) VALUES('images/home.jpg')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error() ."main image faulty";
			}
		}
		
		/*
		** create news page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS news_content(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT,content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "news page content error";
		}
		else{
			/*
			** load dummy data 
			*/
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/device.jpg','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 1 error";
			}
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/pag.png','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 2 error";
			}
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/device.jpg','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 3 error";
			}
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/pag.png','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 4 error";
			}
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/habari.jpg','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 5 error";
			}
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/habari.jpg','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 6 error";
			}
			
			$query = "INSERT INTO news_content(img_url,title,content) VALUES('images/habari.jpg','Armed forces','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "news page content 7 error";
			}
		}
		
		/*
		** create sports page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS sports_content(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT,content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "sports page content error";
		}
		else{
			/*
			**load dummy data
			*/
			//Slot 1
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/ronaldo.png','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 1 error";
			}
			//slot 2
			$query = "INSERT INTO sports_content(title,content) VALUES('Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 2 error";
			}
			//slot 3
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/ronaldo.png','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 3 error";
			}
			//Slot 4
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/device.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 4 error";
			}
			//Slot 5
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/pag.png','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 5 error";
			}
			//Slot 6
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 6 error";
			}
			//Slot 7
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 7 error";
			}
			//Slot 8
			$query = "INSERT INTO sports_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "sports page content 8 error";
			}
		}
		
		/*
		** create gossip content page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS gossip_image(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "gossip page main image error";
		}
		else{
			/*
			**Load dummy data
			*/
			//Gossip page image
			$query = "INSERT INTO gossip_image(img_url,title) VALUES('images/nyef.jpg','Kenya armed')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page image error";
			}
		}
		/*
		** create gossip content page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS gossip_content(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT,content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "sports page content error";
		}
		else{
			//slot 1
			$query = "INSERT INTO gossip_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page content 1 error";
			}
			
			//slot 2
			$query = "INSERT INTO gossip_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page content 2 error";
			}
			
			//slot 3
			$query = "INSERT INTO gossip_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page content 3 error";
			}
			
			//slot 4
			$query = "INSERT INTO gossip_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page content 4 error";
			}
			
			//slot 5
			$query = "INSERT INTO gossip_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page content 5 error";
			}
			
			//slot 6
			$query = "INSERT INTO gossip_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "gossip page content 6 error";
			}
		}
		
		/*
		** create article content page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS article_content(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT,content TEXT, author VARCHAR(50), PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "sports page content error";
		}
		else{
			//Slot 1
			$query = "INSERT INTO article_content(img_url,title,content,author) VALUES('images/kal.png','Kenya armed','$lorem','dis')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "article page content 1 error";
			}
			
			//Slot 2
			$query = "INSERT INTO article_content(img_url,title,content,author) VALUES('images/kal.png','Kenya armed','$lorem','dis')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "article page content 2 error";
			}
			
			//Slot 3
			$query = "INSERT INTO article_content(img_url,title,content,author) VALUES('images/kal.png','Kenya armed','$lorem','dis')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "article page content 3 error";
			}
		}
		
		/*
		** create movie music content page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS music_image(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "movie music image error";
		}
		else{
			/*
			**Load dummy data
			*/
			//movie music page image
			$query = "INSERT INTO music_image(img_url,title) VALUES('images/timeline.jpg','Kenya armed')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music image error";
			}
		}
		
		/*
		** create movie music content page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS music_content(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT,content TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "movie music page content error";
		}
		else{
			//Slot 1
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 1 error";
			}
			
			//Slot 2
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 2 error";
			}
			
			//Slot 3
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 3 error";
			}
			
			//Slot 4
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 4 error";
			}
			
			//Slot 5
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 5 error";
			}
			
			//Slot 6
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 6 error";
			}
			
			//Slot 7
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 7 error";
			}
			
			//Slot 8
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 8 error";
			}
			
			//Slot 9
			$query = "INSERT INTO music_content(img_url,title,content) VALUES('images/habari.jpg','Kenya armed','$lorem')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "movie music page content 9 error";
			}
		}
		
		/*
		** create picbook page content table
		*/
		$query="CREATE TABLE IF NOT EXISTS picbook_image(
			id INT(11) AUTO_INCREMENT, img_url TEXT, title TEXT, PRIMARY KEY(id), date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
		)";
		$result = mysql_query($query,$conn);
		if(!$result){
			$errors[]=mysql_error();
			echo mysql_error(). "picbook main image error";
		}
		else{
			/*
			**Load dummy data
			*/
			//pic book page image
			$query = "INSERT INTO picbook_image(img_url,title) VALUES('images/funny.jpg','Kenya armed')";
			$result = mysql_query($query,$conn);
			if(!$result){
				$errors[]=mysql_error();
				echo mysql_error(). "picbook image error";
			}
		}
		
	}// if $conn
?>
<?php redirect_to("../index.php");?>