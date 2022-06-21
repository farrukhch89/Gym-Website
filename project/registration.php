<?php
session_start();

	$Uname = ($_POST['uname']);
	$pass = ($_POST['psw']);
	$member = ($_POST['member']);
	
	require('connect.php');
	// admin header
	if(isset($_SESSION["memberType"])){
		require('header3.html');
	}
	//public header
	if(!isset($_SESSION["username"])){
		require('header2.html');
	}
	//member header
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
#content h1,h2{
	text-align:center;
	color:#990099;
}
#content p, ul li{
	font-size:1.1rem;
}
#fee{
	font-family: 'PT Sans', sans-serif;
}
.heading{
	position:relative;
	color:white;
}
.writing {
  font-family:Arial;
  position: absolute;
  font-size:2rem;
  top: 50%;
  left: 40%;
  transform: translate(-50%, -50%);
  color: white;
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
.writing {
  font-family:Arial;
  position: absolute;
  top: 50%;
  left: 40%;
  transform: translate(-50%, -50%);
  color:black;
} 
.writing p{
	font-size:4rem;
	
}
.linkHead{
	border: 3px solid #f1f1f1;
	position: absolute;
    bottom: 30%;
    left: 30%;	

}
.linkHead a{
	color:white;
	text-decoration: none;
}
.linkHead {
	display: inline-block;
	font-size: 2rem;
	color: #ffffff;
	background: #f36100;
	line-height: normal;
	letter-spacing: 1px;
	text-transform: uppercase;
	font-weight: 700;
	width:200px;
	height:50px;
	padding:2px;
	text-align:center;
}

</style>

 <div class = "heading">
	<img src="images/register.jpg" alt="main-pic" width = "100%" >
	<div class = "writing">
	<p><strong>Sign up For Membership</strong></p>
	</div>
	<div class = "linkHead">	
		<a href = "login2.html"><strong>Sign up</strong> </a>
	</div>
</div> 
<div id = "content" >
	<h1>Registration</h1><br>
	
	<p>Register today to avail special offers. Choose any classes or club and register yourself. Make the most of your
	    time to have yourself more healthy, attain perfect body shape, join our instructors and nutritionist for
		proper gym instructions and proper diet plans.</p>
	<div id = "membership">
		<h2>Membership</h2><br>
		<h3> Fitness and fun from only €2.00 a day</h3>
		<p>
			From just €2.00 a day, you can start getting the fitness results you want
			Get slim, fit, healthy, and strong at our world-famous gyms.  
			Cycle through virtual worlds at our IMAX STYLE Les Mills immerse fitness studios. Relax at our luxury spas.
		</p>
		<p>And see maximum fitness, weight loss, and body-shaping results with personalized gym plans customized
			just for you. And all from only €2.00 a day.</p><br>
			
		<h3>Two Luxury Fitness Clubs from only €2.00 a DAY</h3>
		<p>
		   At Brainstorm, all memberships are designed to provide you with everything you need to achieve your personal fitness, weight loss, 
            and body-shaping goals.
		</p>

		<p>Membership also includes full access to massive rage of relaxation and sporting facilities including gyms, swimming pools and 
           club.
		</p><br>
		
		<h3>Teen And Student Membership from €1.79 a day</h3>
		<p>Access to all your home club’s facilities, any time.</p>
		<p> Unlimited 1:1 sessions with a trainer to check your progress and revamp your workout.
		 Access to massive rage of relaxation and sporting facilities including gyms, swimming pools and 
           club. 
		 </p><br>
	</div> 
	<div id = "benefit">	 
		 <h2>Benefits</h2>
			<p> <ul>
				<li>- FREE 6-Day Personal Training Plan</li>
				<li>- One-to-one gym instruction</li>
				<li>- New gym programme every 20 visits</li>
				<li>- 250 free fitness classes a month</li>
				<li>- 50 meter swimming pool</li>
				<li>- 25 meter swimming pools</li>
				<li>- Heated 25 meter saltwater pool</li>
				<li>- Unwind in our steam baths</li>
				<li>- Chill out in our hydrotherapy pools</li>
				<li>- Luxurious spa </li>
				<li>- Many more,..... </li>
			</ul></p>
	</div>	
		 
	<div id = "fee">	
		<h2>Fees</h2>
	<?php
	require('connect.php');
	
		$query = "SELECT * FROM Fees_table";
		$result = @mysqli_query($db_connection, $query);
							
		if(@mysqli_num_rows($result)>0){
				 
			while($row = @mysqli_fetch_assoc($result)){
				echo "<strong> ". $row['title']." </strong> <br><br>";
				echo "Registration Fees: €". $row['Rfees']."<br>";
				echo "Monthly Fees: €". $row['Mfees']."<br><br>";
				
			}
		}
		
		mysqli_close($db_connection);
	?>
	</div>
	<div class = "registerBtn"> <a href = "register_course.php">Register Now</a></div><br><br>
</div>
<?php
require('footer.html');
?>