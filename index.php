<?php

include "login/db.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Health Insurance System</title>

<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
<script src="js/jquery-3.1.1.min.js"  > </script>
<script type="text/javascript" src="js/bootstrapp.min.js"></script>

<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/cycle.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
		
		$('#sliderimage').cycle('fadeZoom');
		}
		
		
		);
		
		</script>
<style type="text/css">
	
	 .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
     
  }
   .icon-bar {
    background-color: black;

}

#sliderimage img {
	border: 3px solid grey;
	height: 300px;
	width: 500px;
	 
}

</style>
</head>
<body>
<div class="container" style="border: 2px solid #73EE13">
	<div class="row" style="border-bottom: 1px solid #73EE13">
		<div class="col-sm-4">
			<img src="images/logo.png" class="img-responsive" height="150px" width="200px">
		</div>
		<div class="col-sm-8" style="  margin-top: 30px; text-align: center ">
			<h2> <font color="#73EE13"> Health Insurance System </font>  </h2>
		</div>
		
	</div> <!-- End Of Row 1 -->
 
	<div class="row" style="border-bottom: 1px solid #73EE13">
		<div class="col-sm-12" style="margin-bottom: -15px; margin-top: 5px; ">
			<nav class="navbar navbar-fluid">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Health Insurance</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="other/plan.php">Insurance Plans</a></li>
        <li><a href="other/calculator.php">Premium Calculator</a></li> 
        <li><a href="other/about.php">About Us</a></li>
        <li><a href="other/contact.php">Contact Us</a></li> 
      </ul>
       
      <ul class="nav navbar-nav navbar-right">
       <?php 
	if(isset($_SESSION['name'])){

		$namee = $_SESSION['name'];


		$query="SELECT * from registration where name='$namee' ";
	$run=mysqli_query($con, $query) ;
	
	
	while ($roww = mysqli_fetch_array($run, MYSQLI_BOTH)) {


		
	
	
	                           
								$name = $roww['name'];
								$userType = $roww['userType'];
      switch ($userType) {
          
          case 'user':
              $redirect = 'user_profile/user_profile.php  ';
          break;
          case 'admin':
              $redirect = 'admin/admin.php';
          break;
          case 'manager':
              $redirect = 'manager/manager.php';
          break;
          case 'agent':
              $redirect = 'agent/agent.php';
          break;
                          
                          }
						  }

	
		?>
	 <li> <?php echo '<a href="' . $redirect . '">' ?> <?php echo strtoupper($_SESSION['name']); ?></a></li>
      <li><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php
}
else{
	echo "<li><a href='login/register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
	echo "      <li><a href='login/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
}

?> </ul>
    </div>
  </div>
</nav>
		</div>
	</div> <!--  ENd of Row 2 -->

	<div class="row">
		<div class="col-sm-12" align="center" style="padding-top: 20px; margin-top: 30px; padding-bottom: 20px;">
<!---------------------------END OF SLIDER---------------------------------- -->
		<div id="sliderimage" id="pic">


		<img src="images/1.jpg" class="img-responsive" />
		<img src="images/2.jpg"  class="img-responsive"/>
		<img src="images/3.jpg" class="img-responsive" />
		<img src="images/4.png" class="img-responsive"/> 	
		<img src="images/5.png" class="img-responsive"/> 	

		</div>
			
  

<!---------------------------END OF SLIDER---------------------------------- -->
		</div>
	</div><!--  ENd of Row 3 -->

<div class="row">
		<div class="col-sm-12" align="center" style="padding-top: 10px; margin-top: 50px; border-top: 2px solid #73EE13">

<p>Copyright © 2025 Health Insurance System . All Rights Reserved.</p>
		</div>
	</div><!--  ENd of Row 3 -->
 
</div>
</body>
</html>