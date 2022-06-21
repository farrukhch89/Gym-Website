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

.txtb input,.txtb textarea{
	 width:100%;
	 border:none;
	 background:none;
	 outline:none;
	 font-size:18px;
	 margin-top:6px;
 }
 
 .btn{
	 display:inline-block;
	 background:#9b59b6;
	 padding:14px 0;
	 color:white;
	 text-transform:uppercase;
	 cursor:pointer;
	 margin-top:8px;
	 width:100%
 }
* {
  box-sizing: border-box;
}
.heading{
	position:relative;
	color:white;
}
.heading img{
	float:right;
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

/* Style inputs */
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

/* Style the container/contact section */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
.heading{
	position:relative;
	color:white;
}

</style>
<!-- header image -->
 <div class = "heading">
	<img src="images/5.jpg" alt="main-pic" width = "100%">  
</div> 
<!-- main content -->
<div id = "content"><br>

	<div class="container"><br><br>
	
	<h1>Contact Us</h1>
	  <div class="row">
		<div class="column">
		  <form action="contact_page.php" method = 'POST'>
			<label for="fname">First Name</label>
			<input type="text" id="fname" name="first_name" placeholder="Your name..">
			<label for="email">Email</label>
			<input type="text" id="email" name="email" placeholder="Your email..">
			<label for="contact">Contact No</label>
			<input type="number" id="contact" name = "contact"placeholder="Your Contact Number.."><br><br>
			<label for="message">Message</label>
			<textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
			<input type="submit" value="Submit">
		  </form>
		</div>
	  </div>
	</div>
</div>
<?php
require('footer.html');
?>