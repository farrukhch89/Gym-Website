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
   *{
  font-family: "montserrat",sans-serif;
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
  flex: 33.33%;
  max-width: 33.33%;
  box-sizing: border-box;
  padding: 15px;
}
.testimonial{
  background: #fff;
  padding: 30px;
}
.testimonial img{
  width: 100px;
  height: 100px;
  border-radius: 50%;
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
  font-size:2rem;
  top: 50%;
  left: 40%;
  transform: translate(-50%, -50%);
  color: white;
}
/* .linkHead{
	border: 3px solid #f1f1f1;
	position: absolute;
    bottom: 30%;
    left: 30%;	
	backgroun
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
} */
</style> 
  
 <div class = "heading">
	<img src="images/11.jpg" alt="main-pic" width = "1250">
	<div class = "writing">
	<p></p>
	</div>
	<div class = "linkHead">	
	<p><a href = "classDetail.php"></a></p>
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
              <img src="images/p1.jpg" alt="">
              <div class="name">John Kelly</div>
             

              <p>
                "If you want a gym that is all about fitness and not running mindlessly for hours on a treadmill, a gym that is welcoming, friendly and fun to be in, then look no further! I couldn’t recommend Brainstrom enough! #aREALfitfam”
              </p><p>Date: 24/04/20</p><br><br>
            </div>
          </div>

          <div class="col">
            <div class="testimonial">
              <img src="images/p2.jpg" alt="">
              <div class="name">Joseph steven</div>
              

              <p>
                "My son goes to the Kid's fitness programm every Sat morning and loves it. He has grown in confidence and has learned lots of gymnastic moves .I would highly recommend it! The Coach over there is brilliant with the kids and my son love her easygoing and kind nature. We are looking forward to it!"
              </p><p>Date: 10/2/20</p>
            </div>
          </div>

          <div class="col">
            <div class="testimonial">
              <img src="images/p3.png" alt="">
              <div class="name">Gemma Der</div>
              

              <p>
                "This gym has just what i need. I tend to work out in the morning. When it's not crowded. So i never had to wait for equipment. Additionally, i found the right trainer. Who helped me to reach my fitness goal for the month."
              </p><p>Date: 18/01/20</p><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
<?php require('footer.html');
?>
