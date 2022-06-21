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
#content h1,h2{
	text-align:center;
		color:#990099;
}
#content p, ul li{
	font-family: Helvetica;
	font-size:1.1rem;
}
.homeimg{
	display:flex;
	flex-direction: row;
	flex-wrap: wrap;

}
.picture4{
	flex: 33.33%;
	max-width: 33.33%;
    padding-top:4rem;
	text-align:center;
	font-size:1.2rem;
}


.heading{
	position:relative;
	color:white;
}
.writing {
  font-family:Arial;
  position: absolute;
  top: 50%;
  left: 40%;
  transform: translate(-50%, -50%);
  color: black;
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
	<img src="images/8.jpg" alt="main-pic" width = "100%"> 
	<div class = "writing">
	<p><strong>Sign Up For Membership</strong></p>
	</div>
	<div class = "linkHead">	
		<a href = "signup-page.php"><strong>Sign Up</strong> </a>
	</div>
</div> 
<div id = "content" >
				<h1>What We Offer</h1>
	<!-- get all class details from database -->
<form  method="GET" action ="class_details.php">	

	<div class = "homeimg">
	<?php
require('connect.php');
	
					$query = "SELECT * FROM Class_table";
					$result = @mysqli_query($db_connection, $query);
							
					if(@mysqli_num_rows($result)>0){
				 
						while($row = @mysqli_fetch_assoc($result)){	
	
	?>
				
						<div class = "picture4"><?php echo $row['title'];?><a href = "class_details.php"><img src ="<?php echo $row['image'];?>" alt = "dance" title = "dance" width = "270" height = "300" name = "picture"></a></div>

<?php
					}
				}
					?>
	</div>
</form>
</div>
<?php
require('footer.html');
?>