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
 <div class = "heading">
	<img src="images/man2.jpg" alt="main-pic" width = "100%" > 
</div>
<!-- select class to be changed -->
<div id = "content" >
		<h1>Edit Class Description</h1>
		<form  method="POST" action ="class_detail_edit1.php">
			<div class = "type-course">
			<h2>Select class you want change: </h2>
				<label for="course">Course: </label>
				<select name = "course">
					<option  value = "-----" >-----</option>
					<option  value = "CLASS TIMETABLE" >CLASS TIMETABLE</option> 
					<option  value = "CLASS DESCRIPTION" >CLASS DESCRIPTION</option> 
					<option  value = "FITNESS STUDIO" >FITNESS STUDIO</option> 
					<option  value = "LES MILLS CLASSES" >LES MILLS CLASSES</option>
					<option  value = "IMMERSIVE CLASSES" >IMMERSIVE CLASSES</option> 
					<option  value = "GRAVITY CLASSES" >GRAVITY CLASSES</option>
					<option  value = "TEEN CLASSES" >TEEN CLASSES</option> 
					<option  value = "POOL CLASSES" >POOL CLASSES</option>
					<option  value = "VIRTUAL CLASSES" >VIRTUAL CLASSES</option>
				</select><br><br>
				<input type="submit" value="Submit">
			</div>
		</form>
</div>
<?php
require('footer.html');
?>