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
.registerBtn{
	text-align:center;
	padding:1%;
	background-color:#0000b3;
	border-radius:5px;
	width:10rem; 
}
.registerBtn a{
	
	color:#ffffff;
	text-decoration:none;
} 
.term{
	font-size:0.7rem;
}
.deadline{
	color:#e60000;
}
.heading{
	position:relative;
	color:white;
}


</style>
 <div class = "heading">
	<img src="images/main7.jpg" alt="main-pic" width = "100%">  
</div> 

<div id = "content" >
	<h1>Special Offer</h1><BR>
	
	<h2>Student Discount</h2>
				
		<p>New student registration € 100</p>
		<p>Monthly € 57</p>
		
		<p>Presenting student card while register during this seasonal time would allow you obtain a special offer for registration 
		   and monthly reduction for the first 12 month.</p>
		  
		<p class = "deadline">* OFFER OPEN FROM 20TH APRIL TO 20TH MAY</p>
		<p class = "term">Terms and Condition Apply</p>
	<br>
	<div class = "registerBtn"> <a href = "register_course.php">Register Now </a></div><br>
	
	 <br><h2>Body Fitness Test</h2>
								
		<p>Any Enrollment during this season will obtain a free pass for Body Fitness Test which will be taking
			every three months for 12 month.</p>
		<p>Normal price for Body Fitness Test € 350</p>
		<p>Register today to avail free Body Fitness Test</p>
		<P class = "deadline">* OFFERS END 3OTH JUNE</P>
		<p class = "term">Terms and Condition Apply</p><br>
		<div class = "registerBtn"> <a href = "register_course.php">Register Now</a></div><br><br>
		
		
		<h2>Dance Club</h2>						
		<p>All age group is welcome to join the All You Can Dance Club.</p>
		<p>Every evening from 6pm to 9pm</p>
		<p>Only for €30 a week.</p>
		<p>Normal fee € 45 a week.</p>
		<P class = "deadline">* OFFERS END 3OTH JULY</P>
		<p class = "term">Terms and Condition Apply</p><br>
		<div class = "registerBtn"> <a href = "register_course.php">Register Now</a></div><br><br>
		
</div>
<?php
require('footer.html');
?>
	