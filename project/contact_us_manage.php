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
	<img src="images/2.jpg" alt="main-pic" width = "100%" >
</div> 

<div id = "content" >
<h1>Contact Messages</h1>	
<?php
	require('connect.php');
	
	$query = "SELECT * FROM Contact";
	$result = @mysqli_query($db_connection, $query);
			
	if(@mysqli_num_rows($result)>0){
		 
 
		while($row = @mysqli_fetch_assoc($result)){
			
                echo "<strong>Email: </strong>". $row['email'] ."<br>";
                echo "<strong>First Name: </strong>". $row['first_name']. " <br>";
                echo "<strong>Mobile: </strong>". $row['mobile'] ."<br> ";
                echo "<strong>Message: </strong>". $row['message'] . "<br><br> ";
         
		}
		
		
	}
	mysqli_close($db_connection);
			echo "<br><br>";
	
?>

</div>
<?php
require('footer.html');
?>	