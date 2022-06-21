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
<!-- header image -->
 <div class = "heading">
	<img src="images/main8.jpg" alt="main-pic" width = "100%" >
</div> 

<div id = "content" >
	<h1>NEW MEMBER REGISTRATION</h1><BR>
	<?php
	 $name = $lname = $email = $address = $phone_num = $dob = $gender = $username ="" ;
	?>
	<form  method="POST" action ="save.php">
			<div class = "form">
				<div class="formToFill">
						

					
					<label for="first_name">First Name: </label><input type="Text" name="first_name" required value = '<?php echo ($name);?>' /><br><br>
							
					<label for="last_name">Last Name: </label><input type="Text" name="last_name" required value = '<?php echo ($lname);?>'/><br><br>
						
					<label for="address">Address: </label><input type="Text" name="address" value = '<?php echo ($address);?>' required /><br><br>
			
					<label for="phone">Mobile: </label><input type="Number" name="phone" maxlength="10" value = '<?php echo ($phone_num);?>' /><br><br>

					<label for="DOB">Date of Birth: </label><input type="date" name="DOB" required value = '<?php echo ($dob);?>' /><br><br>

					<div class = "gender">
						<label for="gender">Gender:</label><br>
						<label class="gender">Male
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?>  value = "Male"/>
						</label>
								
						<label class="gender">Female
						<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value = "Female"/>
						</label>
					</div><br><br>
					
					<label for "email">Email: </label><input type = "" name = "email" required value= '<?php echo ($email);?>'/><br><br>
					<div class = "type-member">
							<label for="member">Member Type: </label>
							<select name = "member">
									<option  value = "-----" >-----</option>
									<option  value = "Member" >Member</option> 
									<option  value = "Admin" >Admin</option>
							</select><br><br>
					</div>
					<label for "username">Username: </label><input type = "" name = "username" required value= '<?php echo ($Uname);?>' /><br><br>
					
					<label for "pass">Password: </label><input type = "" name = "pass" required min ="7"  /><br><br>
			
					<button type="submit">Register</button>
			</div>
		</div>
	</form>
</div>
<?php
require('footer.html');
?>