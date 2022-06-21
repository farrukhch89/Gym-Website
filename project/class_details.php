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
		header('Location:login2.html');
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
#content{
	font-family: 'PT Sans', sans-serif;
}

#content h1,h2{
	text-align:center;
	color:#990099;
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


#image{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
<div class = "heading">
	<img src="images/main3.jpg" alt="main-pic" width = "100%">
</div>
<!-- get all class details from database -->
<div id  = "content">

<?php
 if($_SERVER['REQUEST_METHOD'] == "GET"){
		$name = ($_GET['picture']);
		

	 	
	require('connect.php');
	
	$query = "SELECT * FROM Class_table";
	$result = @mysqli_query($db_connection, $query);
			
	if(@mysqli_num_rows($result)>0){
 
		while($row = @mysqli_fetch_assoc($result)){
?>
			<h1><?php echo $row['title'];?></h1>

		<div id = "image">
		<img src = "<?php echo $row['image2'];?>" alt = "main" width = "500">
		</div>
		<p><?php echo $row['paragraph'];?></p>
		<p><a href = "timetable1.htm">More detail for time.</a></p><br><br>
<?php
		}
	}
 }
?>
		
</div>
<?php require('footer.html');?>