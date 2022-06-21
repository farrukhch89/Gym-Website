
<?php
require('header1.html');
?>
<style>
#content{
	width:75%;
	margin:auto;	
	padding:1rem;
}
#content h1{
	text-align:center;
}

</style>
<div id = "content">
<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$Uname = ($_POST['uname']);
	$pass = ($_POST['psw']);
	$member = ($_POST['member']);
	
	require('connect.php');
	
	$query = "SELECT first_name, member FROM member WHERE username = '$Uname' AND password = '$pass'";
	$result = @mysqli_query($db_connection, $query);
	$successful_login = "Login is successful";	
	if(@mysqli_num_rows($result)>0){
		while($row = @mysqli_fetch_assoc($result)){
			
		$_SESSION["username"] = $row["first_name"];
	
		if($row['member'] == "Admin"){
			$_SESSION["memberType"] = $row["member"];
			header("Location:class.php");
			
		}
		if(!isset($_SESSION["username"])){
			header("Location:index.php");
		}
		else{
			header("Location:registration.php");
		
		} 
		}
		
	}

	else{
		require('login_page.php');
		
	}
		
} 
?>
</div>
<?php
require('footer.html');
?>