<?php
	/*
	** redirects to given url
	*/
	function redirect_to($url){
		header("Location: ".$url);
	}
	
	/*
	** to check if a connection exists, if not generates an error and dies
	*/
	function check_connection($var){
		if(!$var){
			die("We had an error connecting to our servers, please reload the page");
		}
	}
	
	/*
	** to check if a given database exist, if not an error is generated
	*/
	function check_database($var){
		if(!$var){
			die("We had an error connecting to our databases, please reload the page");
		}
	}
	
	/*
	** checks whether a given query executed, generates an error if not
	*/
	function check_query($var){
		if(!$var){
			die("You have an error in your query");
		}
	}
	
	/*
	** returns a given SQL query in a sanitized form
	*/
	function sanitize_query($query){
		$magic_quotes_on = get_magic_quotes_gpc();
		$new_enough = function_exists("mysql_real_escape_string");
		if($new_enough){
			if($magic_quotes_on){
				$query = stripslashes($query);
			}
			$query = mysql_real_escape_string($query);
		}
		else{
			if(!$magic_quotes_on){
				$query = addslashes($query);
			}
		}
		return($query);
	}
	
	/*
	** SELECT all from a given query: return @ resource
	*/
	
	function select_all($table,$order = "id",$limit = 3){
		global $conn;
		$query = "SELECT * FROM $table ORDER BY $order DESC LIMIT $limit";
		$result = mysql_query($query,$conn);
		if(!$result){
			return NULL;
		}
		else{
			return $result;
		}
	}
	
	/*
	** Update using a single entry query: return @ message
	*/
	
	function update_single($id,$table,$field,$data){
		global $conn;
		$data = sanitize_query($data);
		$id = sanitize_query($id);
		$query = "UPDATE $table SET $field = '$data' WHERE id = $id";
		$result = mysql_query($query,$conn);
		if(mysql_affected_rows() == 1){
			return "<div class = \"yote bg-success\"><p>Successfuly Updated</p></div>";
		}
		else{
			return "<div class = \"yote bg-danger\"><p class = \"center\">Sorry, no changes made</p>". mysql_error() . "</div>";
		}
		
	}
	
	/*
	** Update two fields return @ message
	*/
	
	function update_double($id,$table,$field,$field1,$data,$data1){
		global $conn;
		$data = sanitize_query($data);$data1 = sanitize_query($data1);
		$id = sanitize_query($id);
		$query = "UPDATE $table SET $field = '$data', $field1 = '$data1' WHERE id = $id";
		$result = mysql_query($query,$conn);
		if(mysql_affected_rows() == 1){
			return "<div class = \"yote bg-success\"><p class = \"center\">Successfuly Updated</p></div>";
		}
		else{
			return "<div class = \"yote bg-danger\"><p class = \"center\">Sorry, no changes made</p>". mysql_error() . "</div>";
		}
		
	}
	
	/*
	** Update three fields return @ message
	*/
	
	function update_triple($id,$table,$field,$field1,$field2,$data,$data1,$data2){
		global $conn;
		$data = sanitize_query($data);$data1 = sanitize_query($data1);
		$id = sanitize_query($id);
		$query = "UPDATE $table SET $field = '$data', $field1 = '$data1', $field2 = '$data2' WHERE id = $id";
		$result = mysql_query($query,$conn);
		if(mysql_affected_rows() == 1){
			return "<div class = \"yote bg-success\"><p class = \"center\">Successfuly Updated</p></div>";
		}
		else{
			return "<div class = \"yote bg-danger\"><p class = \"center\">Sorry, no changes made</p>". mysql_error() . "</div>";
		}
		
	}
	
	/*
	** Upload picture return @ message
	*/
	
	function upload_picture($file,$identifier,$table){
		$id = sanitize_query($identifier);
		if(($_FILES[$file]['type'] == "image/jpeg") || ($_FILES[$file]['type'] == "image/pjpeg") || ($_FILES[$file]['type'] == "image/gif") || ($_FILES[$file]['type'] == "image/png") && ($_FILES[$file]['size'] <= 2000000)){
			
			if($_FILES[$file]['type'] == "image/jpeg" || $_FILES[$file]['type'] == "image/pjpeg"){$ext = ".jpg";}
			if($_FILES[$file]['type'] == "image/png"){$ext = ".png";}
			if($_FILES[$file]['type'] == "image/gif"){$ext = ".gif";}
			
			if($_FILES[$file]['error'] > 0){
				return "<div class = \"yote bg-danger\"><p class = \"center\">error reading file</p></div>";
			}
			else{
				$hand = $_FILES[$file]['name'];
				$handle = sha1($hand) . time() .$ext;
				if(file_exists("../images/uploads/" . $handle)){
					return "<div class = \"yote bg-danger\"><p class = \"center\">file already exists, please select a diffrent file name</p></div>";
				}
				else{
					move_uploaded_file($_FILES[$file]['tmp_name'], "../images/uploads/" . $handle);
					$query = "UPDATE $table SET img_url = 'images/uploads/$handle' WHERE id = $id";
					$result = mysql_query($query);
					if(!$result){
						return "<div class = \"yote bg-danger\"><p class = \"center\">error loading photo to database, please try again</p></div>";
					}
					
					else{
						return "<div class = \"yote bg-success\"><p class = \"center\">Successfuly Updated photo</p></div>";
					}
				}	
			}
		}
		else{
			return "<div class = \"yote bg-danger\"><p class = \"center\">invalid file, please select another</p></div>";
		}
	}
	
?>