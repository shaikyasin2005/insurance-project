<?php

include "db.php";
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
      <a class="navbar-brand" href="user_profile.php">User Panel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="user_agent.php">Agent Info</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="my_policy.php">My Policy</a></li> 
        <li><a href="policy_payment.php">Policy Payment</a></li> 
        <li><a href="../other/calculator.php">Premium Calculator</a></li> 
      </ul>
       
      <ul class="nav navbar-nav navbar-right">
       <?php 
	if(isset($_SESSION['name'])){

		
		?>
	 <li><a href="#"> <?php echo strtoupper($_SESSION['name']); ?></a></li>
      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
<div class="col-sm-12" style="margin-top: 30px" >

<h4 align="center"><font color="green"><?php echo @$_GET['msg']; ?></font></h4>
<h3 align="center"><font color="sky blue"> <?php echo ucfirst($_SESSION['name']); ?>'s Profile</font></h3><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">

<tr>
<th> <center> Name </center> </th>
<th> <center>Email </center> </th>
<th> <center>Password </center> </th>
<th> <center>Number </center></th>
<th> <center>Address </center></th>
<th> <center>Update </center></th>
</tr>

<?php

$namee = $_SESSION['name'];
$qwery = "SELECT * from registration where name='$namee'";
$run = mysqli_query($con, $qwery);

while ($roww = mysqli_fetch_array($run, MYSQLI_BOTH)) {



echo " <form action='profile.php' method='POST'>
   <tr align='center'>
   <input type='hidden' name='id' value='$roww[id]' size='2' readonly>
   <td><input type='text' name='name' value='$roww[name]' size='3' readonly></td>
   <td><input type='text' name='email' value='$roww[email]'size='15'></td>
   <td><input type='text' name='password' value='$roww[password]'size='10'></td>
   <td><input type='text' name='number' value='$roww[num]'size='9'></td>
   <td><input type='text' name='address' value='$roww[address]'size='13'></td>
   <td><center><button type='submit' class=' btn btn-success' name='Update'> <span class='glyphicon glyphicon-ok'></span> &nbsp; Update&nbsp;</button></td>

   </tr>";

}
?>

</div>
</div>
</div><!--  ENd of Row 3 -->

</div>
</body>
</html>
<?php
if (isset($_POST['Update'])) {

   $id= $_POST['id'];
   $name= $_POST['name'];
   $email= $_POST['email'];
   $password= $_POST['password'];
   $number= $_POST['number'];
   $address= $_POST['address'];

 // mysqli_query($con, "Update registration set name='$name', email=$email', password='$password', number='$number' where id='$id'");
    $qwery1 = " UPDATE registration set name='$name', email='$email', password='$password', num='$number', address='$address' WHERE id='$id' "  ;

   mysqli_query($con, $qwery1);

    header ('Location: profile.php?msg=Record Updated Successfully');


}


?>