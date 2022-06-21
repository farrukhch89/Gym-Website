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
.heading{
	position:relative;
	color:white;
}


</style>
 <div class = "heading">
	<img src="images/13.jpg" alt="main-pic" width = "1250" > 
</div> 

<div id = "content" >				
		  <h1> Opening Time </h1>
		<p>Monday to Sunday</p>	
		<p>7.00 am - 12.00 am</p>
		
</div>
<?php
require('footer.html');
?>			