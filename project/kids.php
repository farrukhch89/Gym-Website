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
	padding:3rem;
	font-family: 'PT Sans', sans-serif;
}
#content h2{
		color:#990099;
}



.box1 p,.Box2 p{
	font-family: 'PT Sans', sans-serif;
	font-size:1.1rem;
}

 

.column {
  width: 25%;
  padding:1%;
  margin:auto;
  float:right; 
}


.row::after {
  content: "";
  clear: both;
  display: table;
  
}
.heading{
	position:relative;
	color:white;
}

</style>

 <div class = "heading">
	<img src="images/kids.jpg" alt="main-pic" width = "100%"> 
</div> 

<div id = "content" >
    <div class = "box1" >
	    <h2> Kid's - Fit </h2>
	     <p> Kid fit programm like no other. This has been designed to suit many children from the age of 7-12 years old. These kids will enter a designated route in Shipshape, follow all of the directional signs and complete any task along the way.Depending on their age, they will be given a certain amount of laps to complete as fast as they can. Their time will then be recorded and this is their starting point.For the next 6 weeks, they will train twice a week in Fitbug Fitness where they will aim to improve their strength, fitness and speed. All of this will result in your kids being fitter and healthier while having fun.</p>
    </div>	
     <br>
    <div class="Box2" > 	
	<h2> Why it's important </h2>
	     <p> The main goal is for your kids to have fun, get fitter and improve their time. We live in a world where we need to encourage our kids to be more active.You will be amazed how much they can improve both physically and mentally by doing a fun sport that they enjoy. Their confidence and physical fitness will greatly improve.We can help tackle obesity by giving them this personal goal while having fun in Fitbug Fitness and Shipshape Kids play.</p>
    </div>

		<div class="row">
			<div class="column">
			<img src="images/exr.png" alt="Snow" >
			</div>
		  <div class="column">
			
			<img src="images/gym.png" alt="Forest" >
		  </div>
		  <div class="column">
			<img src="images/swim.png" alt="Mountains" >
		  </div>
	 </div>
</div>
<?php
require('footer.html');
?>