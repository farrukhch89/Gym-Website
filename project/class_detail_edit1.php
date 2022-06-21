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

 

</style>

<!-- bring the selected class information and display in form -->

<div id = "content">
	<?php
	 $title = $registerFees = $monthlyFees  = "" ;
 if($_SERVER['REQUEST_METHOD'] == "POST"){
		 $topic = ($_POST['course']);
	
	 
	?>
	
	
	<form  method="POST" action ="class_detail_edit2.php">
			<div class = "form">
				<div class="formToFill">

				<?php 
					require('connect.php');
	
					$query = "SELECT * FROM Class_table WHERE title = '$topic'";
					$result = @mysqli_query($db_connection, $query);
							
					if(@mysqli_num_rows($result)>0){
				 
						while($row = @mysqli_fetch_assoc($result)){
				?>
				  <div class ="txtb">
					 <label> Title </label>
					 <input type="text" name="title" value = '<?php echo $row['title'];?>'>
				  </div>
				  
				  <div class ="txtb">
					 <label> Paragraph </label>
					 <input type="text" name="paragraph" value= '<?php echo $row['paragraph'];?>'>
				  </div>
				  
				  <div class ="txtb">
					 <label> Link </label>
					 <input type="text" name="link" value= '<?php echo $row['link'];?>'>
				  </div>
					
				  <div class ="txtb">
					 <label> Image </label>
					 <input type="text" name="image"value = '<?php echo $row['image'];?>'>
				  </div><br>
				  
				  <div class ="txtb">
					 <label> Second Image  </label>
					 <input type="text" name="image2"value = '<?php echo $row['image2'];?>'>
				  </div><br>
				  
						<input type="submit" value="Submit">
						

			<?php }
					}
					?>
					
				</div>
			</div>
	</form>
<?php 
 } ?>


</div>
<?php
require('footer.html');
?>