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
 <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">

#content{
	width:75%;
	margin:auto;
	padding:3rem;
	font-family: 'PT Sans', sans-serif;
}
#content h1{
	text-align:center;
		color:#990099;
}
.heading{
	position:relative;
	color:white;
}

 </style>
 
  <div class = "heading">
	<img src="images/5.jpg" alt="main-pic" width = "100%" > 
  </div> 

 <div id = "content">
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
			$error_array = array();
		
		if (empty($_POST["first_name"])) {
			$error_array[] = "First Name is required";
		}
		else {
			$name =($_POST["first_name"]);
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $error_array[] = "Only letters and white space allowed";
			}
		}

		
		if (empty($_POST["contact"])) {
			$error_array[] = "Phone Number is required";
		}
		else{
			$phone_num = ($_POST['contact']);
		}

		if (empty($_POST["email"])) {
			$error_array[] = "Email is required";
		}
		else{ 
			$email = ($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error_array[] = "Invalid email format";
			}
			
		}
		
		if (!empty($_POST["message"])) {
			$message = ($_POST['message']);
		}


		if(!empty($error_array)){
			foreach ($error_array as $msg ){
				echo "- $msg <br>";
			}
		}
		require('connect.php');
			
			$query = "INSERT INTO Contact (email, first_name, mobile, message) VALUES ('$email','$name', '$phone_num','$message')";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h4>Your Message has been sent. We will get back to you as soon as possible Thanks.</h4>";
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