<?php
session_start();

	$Uname = ($_POST['uname']);
	$pass = ($_POST['psw']);
	$member = ($_POST['member']);
	
	require('connect.php');
	if(isset($_SESSION["memberType"])){
		require('header3.html');
	}
	if(!isset($_SESSION["username"])){
		require('header2.html');
	}
	if((isset($_SESSION["username"])) &&  (!isset($_SESSION["memberType"]))){
		require('header1.html');
	}
?>
<style>
#content{
	width:75%;
	margin:auto;
	padding:3rem;
}
#content h1{
	text-align:center;
	color:#990099;
}

.formToFill{
	width:85%;
	max-width:600px;
	box-sizing:border-box;
	border-radius:8px;
	text-align:center;
	box-shadow: 0 0 20px #000000b3;
	background:#f1f1f1;
	padding:30px 40px;
}

.formToFill h1{
 margin-top:0;
 font-weight:200;
 
 }
 
 .txtb{
 border:1px solid gray;
 margin:8px 0;
 padding:12px 18px;
 border-radius:8px;
 }
 
 .txtb label{
 display:block;
 text-align:left;
 color:#333;
 text-transform:uppercase;
 font-size:14px;
 }
 
 
 .txtb input,.txtb textarea{
	 width:100%;
	 border:none;
	 background:none;
	 outline:none;
	 font-size:18px;
	 margin-top:6px;
 }
 .heading{
	position:relative;
	color:white;
}


</style>
<div id = "content">
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
			$error_array = array();
		
		// name
		if (empty($_POST["title"])) {
			$error_array[] = "Title is required";
		}
		else {
			$title =($_POST["title"]);
		}
			
		if (!empty($_POST["feature"])) {
			$feature = ($_POST["feature"]);
		}
		if (!empty($_POST["image"])) {
			$image = ($_POST["image"]);
		}
		
		if (!empty($_POST["link"])) {
			$link = ($_POST["link"]);
		}
		
		if (!empty($_POST["Fline"])) {
			$line1 = ($_POST["Fline"]);
		}
		
		if (!empty($_POST["Sline"])) {
			$line2 = ($_POST["Sline"]);
		}
		
		if (!empty($_POST["Tline"])) {
			$line3 = ($_POST["Tline"]);
		}
		if (!empty($_POST["Foline"])) {
			$line4 = ($_POST["Foline"]);
		}
		
	

		require('connect.php');
			
			$query = "UPDATE Feature SET title = '$title', link = '$link', image = '$image', line1 = '$line1',line2 = '$line2', line3 = '$line3', line4 = '$line4' WHERE feature = '$feature'";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h4>The details have been changed. </h4>";
			}
			else{
				echo "<br>Error! ".mysqli_error($db_connection);
			}
			mysqli_close($db_connection);
			echo "<br><br>";
}
?>
</div>
<?php
require('footer.html');
?>