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

<th> <center>  Name </center> </th>
<th> <center>Email </center> </th>
<th> <center>Number </th>
<th> <center>Address </th>
<th> <center>Password </th>
<th> <center>Update </th>

</tr>

<?php
$agent_name =$_SESSION['name'];
$qwery = "SELECT * from registration where userType='user'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

$name=$row['name'];
$email=$row['email'];
$number=$row['num'];
$password=$row['password'];
$Address=$row['address'];

echo "
<tr>
      <td><center> $name </center></td>
      <td><center> $email </center></td>
      <td><center> $number </center></td>
      <td><center> $Address </center></td>
      <td><center> $password </center></td>
      <td><center><a href='customer_update.php?Cid=$row[id]'> <button >Update </a></button> </center></td>

";

}
  echo "</table>";   
?>

</div>
</div>
</div><!--  ENd of Row 3 -->

<div class="row">
<div class="col-sm-12" style="margin-top: 30px">
<p align="center"><button type="button" class="btn btn-info" onclick="myFunction()" >Add Customer</button></p>
  <div onload="visibility:hidden">
  <div id="myDIV" style="display:none" class="table-responsive">


<form action="manager_customer.php"  method="POST"> 
  <table class="table table-hover "  border="2px solid green" style="border: 2px solid skyblue">
    <tbody>
  
  <tr>
    
     <td align="center"><b> Name</b></td>
      <td align="center"><b> Email</b></td>
       <td align="center"><b> Password</b></td>
        <td align="center"><b> Number</b></td>
        <td align="center"><b> Address</b></td>
        <td align="center"><b> Agent Name</b></td>
        </tr> 
    <tr>
    
    
    <td><input class="form-control" name="name" type="text" size="5" /></td>
    <td><input class="form-control" name="email" type="text" size="10" /></td>
    <td><input class="form-control" name="password" type="text" size="5" /></td>
    <td><input class="form-control" name="number" type="text" size="5" /></td>
    <td><input class="form-control" name="address" type="text" size="5" /></td>
    <td><input class="form-control" name="agent_name" type="text" size="5" /></td>
    
    
      </tr>
    <tr>
    <br>
    <td colspan="6"style="text-align:center">
          
      <button  name="Submit" type="Submit" class="btn btn-success  ">
          <span class="glyphicon glyphicon-ok"></span>&nbsp; Submit
          </button>
      
        <button  name="Submit2" type="reset" class="btn  btn-danger">
          <span class="glyphicon glyphicon-refresh"></span>&nbsp; Reset
          </button>
  
     </td>   
    
    </tr>
    
   </tbody>
  </table>
  </form>



 </div></div></div></div>
</div>
</body>
</html>

 <?php
   $Mname = $_SESSION['name'];
  if(isset($_POST['Submit'])){
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];  
    $number  = $_POST['number'];  
    $address  = $_POST['address'];
    $Aname  = $_POST['agent_name'];
 

        
 
    $query3="INSERT into registration set name='$name', email='$email', password='$pass', num='$number', userType='user', agent_name='$Aname', address='$address' ";
      
      $result = mysqli_query($con, $query3);

          echo("<script>location.href = 'manager_customer.php';</script>");

     

}


?>