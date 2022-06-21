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
#content p{
	font-size:1.2rem;
}

.basic-info{
	font-family: Helvetica;
				
}
						
.feature1{
	border-style: solid;
	padding:2rem;
	font-size:1.2rem;
}
.feature1 a{
	text-decoration:none;
	color:#990099;
}
.feature1 img{
	float:right;
}
.feature1 p{
	font-family: 'PT Sans', sans-serif;
}
			
.clearfix {
	overflow: auto;
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
  color: white;
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
logoutOutput{
	border: 3px solid #f1f1f1;
	position: absolute;
    top: 10%;
    right: 10%;	
}

</style>
<div class = "heading">
	<img src="images/main3.jpg" alt="main-pic" width = "100%">
	<div class = "writing">
	<p><strong>Gym, Swimming And Fitness Classes</strong></p>
	</div>
	<div class = "linkHead">	
		<a href = "class.php"><strong>Get Info</strong> </a>
	</div>

</div>
<div id  = "content">
			<h1>Brainstorm</h1>
			
			<div class = "basic-info">
				<p>Brainstorm is a chain of gyms, fitness clubs, and swimming pools in Dublin.</p>

				<p>We have gyms with swimming pools in Dublin 8.
				Our health clubs offer huge gym facilities, swimming pools, group fitness studios, thousands of free fitness classes, personal training, and kids gym facilities.
				We also have 27 tennis courts in Dublin.
				We provide over 4,500 free fitness classes for members every month at our 6 fitness clubs. We have 23 purpose built fitness studios with fitness classes for every age and fitness level.
				</p>
			</div>
			
		<!-- feature call fro database -->	
			
			<div class = "feature1">
			
			<?php
			require('connect.php');
	
					$query = "SELECT * FROM Feature where feature = 'feature1'";
					$result = @mysqli_query($db_connection, $query);
							
					if(@mysqli_num_rows($result)>0){
				 
						while($row = @mysqli_fetch_assoc($result)){
			?>
			<img src="<?php echo $row['image'];?>" alt="student-discount" width = "400" height = "250">
				<h2><a href = "<?php echo $row['link'];?>"><?php echo $row['title'];?></h2></a>
			
				<p><?php echo $row['line1'];?></p>
				<p><?php echo $row['line2'];?></p>
				<p><?php echo $row['line3'];?></p>
				<p><?php echo $row['line4'];?></p>
				<br>
			<?php
						}
					}?>
						
			</div><br><br>
			
			<div class = "feature1">

			<?php
			require('connect.php');
	
					$query = "SELECT * FROM Feature where feature = 'feature2'";
					$result = @mysqli_query($db_connection, $query);
							
					if(@mysqli_num_rows($result)>0){
				 
						while($row = @mysqli_fetch_assoc($result)){
			?>
				<img src="<?php echo $row['image'];?>" alt="fitness-test" width = "400" height = "250">
				<h2><a href = "<?php echo $row['link'];?>"><?php echo $row['title'];?></h2></a>
				
				<p><?php echo $row['line1'];?></p>
				<p><?php echo $row['line2'];?></p>
				<p><?php echo $row['line3'];?></p>
				<p><?php echo $row['line4'];?></p>
				<br>
			<?php
						}
					}?>
						
			</div><br><br>
			
		</div>
		<?php require('footer.html');?>