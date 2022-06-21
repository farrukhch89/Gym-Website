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
	<img src="images/man.jpg" alt="main-pic" width = "100%" >
 
</div>
<div id = "content" >
<h1>Testimonials</h1>	

<form  method="POST" action ="testimonial_manage.php">
	<div class = "form">
		<div class="formToFill">

<?php
	require('connect.php');
	
	$query = "SELECT * FROM Testimonial_table WHERE status = 'Not Approved'";
	$result = @mysqli_query($db_connection, $query);
			
	if(@mysqli_num_rows($result)>0){
 
		while($row = @mysqli_fetch_assoc($result)){
				$email = $row['email'];?>
				<label for= "email" name = "email" value = '<?php echo $row['email'];?>' ><strong>Email: </strong> <?php echo $row['email'];?></label><br>
			 	<!-- echo "<strong>Email: </strong>".$row['email']."<br>"; -->
               <?php echo "<strong>First Name: </strong>". $row['name']. " <br>";
                echo "<strong>Class: </strong>". $row['class'] ."<br> ";
                echo "<strong>Message: </strong>". $row['message'] . "<br> ";
                echo "<strong>Date: </strong>". $row['date'] . "<br><br> ";
				?>

				<button type="Approve">Approve</button><br><br>
				
				<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
			$status = "Approved"  ;
		
		require('connect.php');
		
			$query = "Update Testimonial_table SET status = '$status' WHERE email = '$email'";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h4> The testimonial is Approved.</h4>";
			}
			else{
				echo "<br>Error! ".mysqli_error($db_connection);
			}		
}
?>
<?php
		}
	}
?>
		</div>
	</div>
</form>


</div>
<?php
require('footer.html');
?>	