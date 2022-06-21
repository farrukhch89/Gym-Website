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

.formToFill{
	width:85%;
	max-width:600px;
	box-sizing:border-box;
	border-radius:8px;
	text-align:center;
	box-shadow: 0 0 20px #000000b3;
	background:#f1f1f1;
	padding:30px 40px;
}

.formToFill h1{
 margin-top:0;
 font-weight:200;
 
 }
 
 .txtb{
 border:1px solid gray;
 margin:8px 0;
 padding:12px 18px;
 border-radius:8px;
 }
 
 .txtb label{
 display:block;
 text-align:left;
 color:#333;
 text-transform:uppercase;
 font-size:14px;
 }
 
 
 .txtb input,.txtb textarea{
	 width:100%;
	 border:none;
	 background:none;
	 outline:none;
	 font-size:18px;
	 margin-top:6px;
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

</style>

<!-- update fees detail -->
<div id = "content">
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
			$error_array = array();
		
		// name
		if (empty($_POST["title"])) {
			$error_array[] = "Title is required";
		}
		else {
			$title =($_POST["title"]);
			}
		
		//registration fee
		if (empty($_POST["Rfees"])) {
			$error_array[] = "Registration fee is required";
		}
		else{ 
			$registerFees = ($_POST['Rfees']);
			
		}
		
		//monthly fee
		if (empty($_POST["Mfees"])) {
			$error_array[] = "MOnthly fee is required";
		}
		else{ 
			$monthlyFees = ($_POST['Mfees']);
			
		}

		require('connect.php');
			
			$query = "UPDATE Fees_table SET Rfees = '$registerFees', Mfees = '$monthlyFees' WHERE title = '$title'";
			$result = @mysqli_query($db_connection, $query);
			
			if($result){
				echo "<br><h4>The Prices has been changed. </h4>";
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
