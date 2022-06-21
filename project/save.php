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
	<img src="images/main7.jpg" alt="main-pic" width = "100%">
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
		
		if (empty($_POST["last_name"])) {
			$error_array[] = "Last Name is required";
		}
		else {
			$lname = ($_POST["last_name"]);

		}
		
		if (empty($_POST["address"])) {
			$error_array[] = "Address is required";
		}
		else {
			$address = ($_POST['address']);
		}
		
		if (empty($_POST["phone"])) {
			$error_array[] = "Phone Number is required";
		}
		else{
			$phone_num = ($_POST['phone']);
		}

		if (empty($_POST["DOB"])) {
			$error_array[] = "Date Of Birth is required";
		}
		else{ 
			$dob = ($_POST['DOB']);
			
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
		if(!empty($_POST['member'])){
			$member = ($_POST['member'])  ;
		}	
		if(!empty($_POST['gender'])){
			$gender = ($_POST['gender']);
		}
		if(!empty($_POST['username'])){
			$Uname = ($_POST['username']);
		}
		if(!empty($_POST['pass'])){
			$pass = ($_POST['pass']);
		}		
	
		if(!empty($error_array)){
			foreach ($error_array as $msg ){
				echo "- $msg <br>";
			}
		}
		if(empty($error_array)){
			echo "$name<br>";
			echo "$lname<br>";
			echo "$address<br>";
			echo "$phone_num<br>";
			echo "$dob<br>";
			echo "$email<br>";
			echo "$member<br>";
			echo "$gender<br>";
			echo "$Uname<br>";
			
		require('connect.php');
			
			$query = "INSERT INTO member(username, first_name, last_name, birth_date, gender, email, mobile, address, password, member) VALUES ('$Uname','$name', '$lname','$dob', '$gender','$email', '$phone_num', '$address', '$pass', '$member')";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h3>Successfully registered</h3>";
			}
			else{
				echo "<br>Error! ".mysqli_error($db_connection);
			}
			mysqli_close($db_connection);
			echo "<br><br>";
			
		}
		
}
			

?>
</div>
<?php
require('footer.html');
?>