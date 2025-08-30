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

<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'block') {
        x.style.display = 'none';
    } else {
        x.style.display = 'block';
    }
}
</script>
<style type="text/css">
	
   .icon-bar {
    background-color: black;

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
      <a class="navbar-brand" href="manager.php">Manager Panel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="agent.php">Agent</a></li>
        <li><a href="manager_customer.php">Customer</a></li>
        <li><a href="customer_policy.php">Customer Policy</a></li> 
        <li><a href="policy_payment.php">Policy Payment</a></li> 
        <li><a href="insurance_policy.php">Insurance Policy </a></li> 
        <li><a href="feedback.php">Feedback</a></li> 
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
<h3 align="center"><font color="sky blue"> Customer's Info</font></h3><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center>  Id </center> </th>
<th> <center>  Name </center> </th>
<th> <center>Email </center> </th>
<th> <center>Password </th>
<th> <center>Number </th>
<th> <center>Manager </th>
<th> <center>Agent </th>

</tr>

<?php
$Cid = $_GET['Cid'];
$qwery = "SELECT * from registration where id='$Cid'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {


 echo " <form action='customer_update.php' method='POST'>
   <tr align='center'>
   <td><input type='text' name='id' value='$row[id]' size='2' readonly></td>
   <td><input type='text' name='name' value='$row[name]' size='3'></td>
   <td><input type='text' name='email' value='$row[email]'size='19'></td>
   <td><input type='text' name='password' value='$row[password]'size='10'></td>
   <td><input type='text' name='number' value='$row[num]'size='9'></td>
   <td><input type='text' name='Mname' value='$row[manager_name]'  size='4'></td>
   <td><input type='text' name='Aname' value='$row[agent_name]'  size='4'></td></tr>
   <tr align='center'>
   <td colspan='7'><input type='submit' name='Update' value='Update'> </td> </tr>";

}
  echo "</form</table>";   
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
   $Mname= $_POST['Mname'];
   $Aname= $_POST['Aname'];

    $qwery1 = " UPDATE registration set name='$name', email='$email', password='$password', num='$number', manager_name='$Mname', agent_name='$Aname' WHERE id='$id' "  ;

   mysqli_query($con, $qwery1);

          echo("<script>location.href = 'manager_customer.php';</script>");



}

?>