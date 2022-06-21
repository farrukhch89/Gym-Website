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
.testimonialForm{
	width:85%;
	max-width:600px;
	box-sizing:border-box;
	border-radius:8px;
	text-align:center;
	box-shadow: 0 0 20px #000000b3;
	background:#f1f1f1;
	padding:30px 40px;
}

.testimonialForm h1{
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
<!-- header image -->
<div class = "heading">
	<img src="images/main5.jpg" alt="main-pic" width = "100%">
</div> 

<div id = "content" >
<!-- sign up page -->
<form action = "testimonial_add.php" method = "POST">
	<div class = "testimonialForm">
	   <h1>Your Testimonial </h1>
	   <div class ="txtb">
		 <label> First Name </label>
		 <input type="text" name="fname" placeholder="Enter your name">
	   </div>
	  
		  <div class ="txtb">
			<label> Email </label>
			<input type="text" name="email" placeholder="Enter your email">
		 </div>
		
		<div class ="txtb">
			<label> Class </label>
			<input type="text" name="classname" placeholder="Enter your class name">
		</div>

		<div class ="txtb">
			<label>Message </label>
			<textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
		</div>
	 
	
		<div class ="txtb">
			<label> Date </label>
			<input type="date" name="dateIn">
		</div>
			
		<input type="submit" value="Submit">
	 </div>
</form>
<!-- php validation-->
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
			$error_array = array();
		
		if (empty($_POST["fname"])) {
			$error_array[] = "First Name is required";
		}
		else {
			$name =($_POST["fname"]);
		}

		
		if (empty($_POST["classname"])) {
			$error_array[] = "class is required";
		}
		else{
			$class = ($_POST['classname']);
		}

		if (empty($_POST["message"])) {
			$error_array[] = "Message is required";
		}
		else{ 
			$message = ($_POST['message']);

			
		}
		
		if (!empty($_POST["dateIn"])) {
			$date = ($_POST['dateIn']);
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


		if(!empty($error_array)){
			foreach ($error_array as $msg ){
				echo "- $msg <br>";
			}
		}
		
		require('connect.php');
			$defaultS = "Not Approved";
			$query = "INSERT INTO Testimonial_table (email, name, class, message, date, status) VALUES ('$email','$name','$class', '$message','$date', '$defaultS')";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h4> Thank you for your Testimonial.</h4>";
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
