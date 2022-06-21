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
	<img src="images/main10.jpg" alt="main-pic" width = "100%" >  
</div> 

<div id = "content" >
	<h1>COURSE REGISTERING</h1><BR>
	<?php
	 $name = $email  ="" ;
	?>
	<form  method="POST" action ="register_course.php">
			<div class = "form">
				<div class="formToFill">
						

					
					<label for="first_name">Name: </label><input type="Text" name="first_name" required value = '<?php echo ($name);?>' /><br><br>
							
					
					<label for "email">Email: </label><input type = "" name = "email" required value= '<?php echo ($email);?>'/><br><br>
					<div class = "type-course">
							<label for="course">Course: </label>
							<select name = "course">
									<option  value = "-----" >-----</option>
									<option  value = "FITNESS STUDIO" >FITNESS STUDIO</option> 
									<option  value = "LES MILLS CLASSES" >LES MILLS CLASSES</option>
									<option  value = "IMMERSIVE CLASSES" >IMMERSIVE CLASSES</option> 
									<option  value = "GRAVITY CLASSES" >GRAVITY CLASSES</option>
									<option  value = "TEEN CLASSES" >TEEN CLASSES</option> 
									<option  value = "POOL CLASSES" >POOL CLASSES</option>
									<option  value = "VIRTUAL CLASSES" >VIRTUAL CLASSES</option>
							</select><br><br>
					</div>
					<div class = "type-course">
						<label for="Category">Category: </label>
							<select name = "Category">
									<option  value = "-----" >-----</option>
									<option  value = "Kids" >Kids</option> 
									<option  value = "Teen" >Teen And Student</option>
									<option  value = "Adult" >Adult</option> 
									
							</select><br><br>
					</div>
			
					<button type="submit">Register</button>
			</div>
		</div>
	</form>
<!-- php validation -->
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
			$error_array = array();
		
		// name
		if (empty($_POST["first_name"])) {
			$error_array[] = "First Name is required";
		}
		else {
			$name =($_POST["first_name"]);
			}
		
		//email
		if (empty($_POST["email"])) {
			$error_array[] = "Email is required";
		}
		else{ 
			$email = ($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error_array[] = "Invalid email format";
			}
			
		}
		
		//course
		if (!empty($_POST["course"])) {
			$course = ($_POST['course']);
		}
		
		if (!empty($_POST["Category"])) {
			$category = ($_POST['Category']);
		}

		require('connect.php');
			
			$query = "INSERT INTO Course_register (email, first_name, course, type) VALUES ('$email','$name', '$course','$category')";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h4>Thank you for registering for this course. </h4>";
			}
			else{
				echo "<br>Error! ".mysqli_error($db_connection);
			}
			mysqli_close($db_connection);
			echo "<br><br>";
}	
?>
</div>
<?php
require('footer.html');
?>