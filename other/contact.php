<?php

include "../login/db.php";
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Health Insurance System</title>

<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"/>
<script src="../js/jquery-3.1.1.min.js"  > </script>
<script type="text/javascript" src="../js/bootstrapp.min.js"></script>


<style type="text/css">

   .icon-bar {
    background-color: black;
  }
    
    #left{
      float: left;
      color: white;
    }

    #right{
      float: right;
    }

    #right input, input[placeholder], textarea[placeholder] {
    text-align:center;
     }

     select {
    padding-left: 35px;
    }



#myDIV {
    
    -webkit-animation: mymove 5s infinite; /* Chrome, Safari, Opera */
    animation: mymove 5s infinite;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes mymove {
    50% {border-top-right-radius: 50px;}
}


</style>
</head>
<body>
<div class="container" style="border: 2px solid #73EE13; min-height: 600px">
	<div class="row" style="border-bottom: 1px solid #73EE13">
		<div class="col-sm-4"><a href="../index.php">
			<img src="../images/logo.png" class="img-responsive" height="150px" width="200px"></a>
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
      <a class="navbar-brand" href="../index.php">Health Insurance</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="plan.php">Insurance Plans</a></li>
        <li><a href="calculator.php">Premium Calculator</a></li> 
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li> 
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
              $redirect = '../user_profile/user_profile.php  ';
          break;
          case 'admin':
              $redirect = '../admin/admin.php';
          break;
          case 'manager':
              $redirect = '../manager/manager.php';
          break;
          case 'agent':
              $redirect = '../agent/agent.php';
          break;
                          
                          }
						  }

	
		?>
	 <li> <?php echo '<a href="' . $redirect . '">' ?> <?php echo strtoupper($_SESSION['name']); ?></a></li>
      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    <?php
}
else{
	echo "<li><a href='../login/register.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>";
	echo "      <li><a href='../login/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
}

?> </ul>
    </div>
  </div>
</nav>
		</div>
	</div> <!--  ENd of Row 2 -->

	<div class="row" >
   <div class="col-sm-6" style="  margin-top: 30px; ">
   <h3><font color="#0D9F6D"> <span style="margin-left: 80px"><?php    echo @$_GET['msg']; ?></span></font></h3>
   <div class="col-sm-8" style="border: 1px solid #ccc; border-top-right-radius: 1em; margin-left: 30px; background-color: #0D9F6D; font-family: comic; font-weight: bold; margin-bottom: 30px;" align="center" id="myDIV">

   <form action="contact.php" method="POST">

   <br><label class="form-control" style="color: #0D9F6D"> Contact Us</label><br><br>

   <label id="left"> Name </label>
   <input type="text" name="name" placeholder="--Name--" id="right"><br><br>

   <label id="left">Email</label>
   <input type="text" name="email" placeholder="--Email--" id="right"><br><br>

   <label id="left">Comments</label>
   <textarea  placeholder="--Comments-- "  name="comment" id="right" style="width: 175px"></textarea><br><br><br>

   <label id="left">Forward to</label>
   <select name="receiver"  id="right" style="width: 175px; height: 25px">
     <option value="" selected disabled>--Select user--</option>
     <option value="admin">Admin</option>
     <option value="manager">Manager</option>
     <option value="agent">Agent</option>
   </select><br><br>



   <button name="submit" class="btn btn-info"> <span class="glyphicon glyphicon-ok"> Submit</span></button>&nbsp;&nbsp;
   <button name="reset" class="btn btn-danger"> <span class="glyphicon glyphicon-repeat"> Reset</span></button><br><br>


   <!-- <input type="submit" name="submit" value="Submit">
   <input type="reset" name="reset" value="&nbsp; Reset &nbsp;"><br><br>
 -->
     
     </form>

    </div>
   </div>
  </div>


 
</div>
</body>
</html>

<?php

if (isset($_POST['submit'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$receiver = $_POST['receiver'];


$qwery = "INSERT into feedback set name='$name', email='$email', comment='$comment', receiver='$receiver'";

mysqli_query($con, $qwery);

    header ('Location: contact.php?msg= Successfully Submitted');

}


?>