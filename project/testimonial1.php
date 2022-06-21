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
	font-family: 'PT Sans', sans-serif;
}
#content h1{
	color:#990099;
}
.testimonials{
  padding: 20px 0;
  background: #f1f1f1;
  color: #434343;
}
.inner{
  max-width: 1200px;
  margin: auto;
  overflow: hidden;
  padding: 0 20px;
}

.border{
  width: 160px;
  height: 5px;
  background: #6ab04c;
  margin: 26px auto;
}

.row{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
 .col{
  flex: row;
  width:100%;
  box-sizing: border-box;
  padding: 15px;
} 
.testimonial{
  background: #fff;
  padding: 30px;
  border-radius:50px;
 
}
.name{
  font-size: 20px;
  text-transform: uppercase;
  margin: 20px 0;
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

</style>   
 <div class = "heading">
	<img src="images/11.jpg" alt="main-pic" width = "100%">  
	<div class = "writing">
	<p><strong>Sign up For Membership</strong></p>
	</div>
	<div class = "linkHead">	
		<a href = "signup-page.php"><strong>Sign up</strong> </a>
	</div>
</div> 

<div id = "content">
    <div class="testimonials">
      <div class="inner">
        <h1>Testimonials</h1>
        <div class="border"></div>

        <div class="row">
          <div class="col">
            <div class="testimonial">
              <div class="name">John Kelly</div>
             

				<p><strong> Review Date: </strong> 10/2/20<br>
				   <strong>Class: </strong> Kids fitness<br>
				   <strong> Message: </strong><br>
					"If you want a gym that is all about fitness and not running mindlessly for hours on a treadmill, a gym that is welcoming, friendly and fun to be in, then look no further! I couldn’t recommend Brainstrom enough! #aREALfitfam”
				</p>
            </div>
          </div>

          <div class="col">
            <div class="testimonial">
              <div class="name">Joseph steven</div>
              
				<p><strong> Review Date: </strong> 10/2/20<br>
				   <strong>Class: </strong> Kids fitness<br>
				   <strong> Message: </strong><br>
					"My son goes to the Kid's fitness programm every Sat morning and loves it. He has grown in confidence and has learned lots of gymnastic moves .I would highly recommend it! The Coach over there is brilliant with the kids and my son love her easygoing and kind nature. We are looking forward to it!"
				</p>
            </div>
          </div>

          <div class="col">
            <div class="testimonial">
              <div class="name">Gemma Der</div>
              

				<p><strong> Review Date: </strong> 10/2/20<br>
				   <strong>Class: </strong> Kids fitness<br>
				   <strong> Message: </strong><br>
					This gym has just what i need. I tend to work out in the morning. When it's not crowded. So i never had to wait for equipment. Additionally, i found the right trainer. Who helped me to reach my fitness goal for the month."
				</p>
            </div>
          </div>
		  <!-- testimonial that are approve to call it from database-->
		  <?php
		  	require('connect.php');
	
	$query = "SELECT * FROM Testimonial_table WHERE status = 'Approved'";
	$result = @mysqli_query($db_connection, $query);
			
	if(@mysqli_num_rows($result)>0){
 
		while($row = @mysqli_fetch_assoc($result)){
				$email = $row['email'];?>
			<div class="col">
				<div class="testimonial">
					<div class="name">
					   <?php echo $row['name']." <br>";?>
					</div>
					   <?php 
							 echo "<strong>Date: </strong>". $row['date'] . "<br> ";
							 echo "<strong>Class: </strong>". $row['class'] ."<br> ";
							 echo "<strong>Message: </strong><br>". $row['message'] . "<br><br> ";
							 
						?>
				</div>
			</div><br><br>
<?php
	}
	}
		?>
        </div>
      </div>
    </div>

</div>
<?php require('footer.html');
?>