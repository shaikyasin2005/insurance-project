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

#results{
  font-weight: bold;
  color: red;
  text-align: center;
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
<h3 align="center"><font color="sky blue"> Policy payment Details</font></h3><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center>  Policy Holder</center> </th>
<th> <center>  Policy name </center> </th>
<th> <center>  Installment year </center>  </th>
<th> <center>  Installment Amount </center> </th>
<th> <center>  Profit  </center> </th>

</tr>

<?php
$name =$_SESSION['name'];

$qwery1 = "SELECT * from customer_policy where name='". trim($name) . "' ";
$run1 = mysqli_query($con, $qwery1);

while ($row1 = mysqli_fetch_array($run1, MYSQLI_BOTH)) {

$PolicyTerm=$row1['PolicyTerm'];
$ProfitRate=$row1['ProfitRate'];
$InstallmentAmount=$row1['InstallmentAmount'];
 $profit = $ProfitRate * $InstallmentAmount / 100 ;

}

$qwery = "SELECT * from policy_installment where Name='$name' ";
$run = mysqli_query($con, $qwery);
$cou= mysqli_num_rows($run);

$pSUm = @$profit * $cou;

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {
$Pholder=$row['Name'];
$Pname=$row['Pname'];
$InstallmentAmount=$row['InstallmentAmount'];
$InstallmentYear=$row['InstallmentYear'];

echo "
<tr>
      <td><center> $Pholder </center></td>
      <td><center> $Pname </center></td>
      <td><center> $InstallmentYear </center></td>
      <td><center> ". number_format($InstallmentAmount) . " </center></td>
      <td><center>". number_format($profit) . " </center></td>
</tr>";

} 


         $sql= "SELECT SUM(InstallmentAmount) as InstallmentAmount FROM policy_installment where name ='$name' "; 
         $res=mysqli_query($con, $sql); 
         $fin= mysqli_fetch_array($res, MYSQLI_BOTH);
         $sum=  $fin['InstallmentAmount'] ;


 echo "<tr>
      
       <td></td>
       <td></td>
       <td id='results'> Installment Paid $cou / $PolicyTerm </td>;
       <td id='results'>Total =  ". number_format($sum) . " Rs  </td>;
       <td id='results'>Total Profit = ". number_format($pSUm) . " Rs  </td></tr>; 
      </table>";

 
?>

</div>
</div>
</div><!--  ENd of Row 3 -->

<div class="row">
<div class="col-sm-12" style="margin-top: 30px">
<p align="center"><button type="button" class="btn btn-info" onclick="myFunction()" >Pay Installment</button></p>
  <div onload="visibility:hidden">
  <div id="myDIV" style="display:none" class="table-responsive">


  <table class="table table-hover "  border="2px solid green" style="border: 2px solid skyblue">
    <tbody>
  
 <tr>  
    <th> <center>  Policy Holder</center> </th>
    <th> <center>  Policy name </center> </th>
    <th> <center>  Installment year </center>  </th>
    <th> <center>  Installment Amount </center> </th>
 </tr> 
    <tr>
    </tr>

<?php
$name =$_SESSION['name'];

$qwery1 = "SELECT * from customer_policy where name='$name'";
$run1 = mysqli_query($con, $qwery1);

while ($row1 = mysqli_fetch_array($run1, MYSQLI_BOTH)) {

$PolicyTerm=$row1['PolicyTerm'];
$InstallmentAmount1=$row1['InstallmentAmount'];
$Pname=$row1['Pname'];


}
// $qwery = "SELECT * from policy_installment where name='$name'";
// $run = mysqli_query($con, $qwery);

// while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

// $Pname=$row['Pname'];
// $InstallmentYear=$row['InstallmentYear'];
// }

echo "<tr>
        
     <form action='policy_payment.php'  method='POST'> 
    <td><input name='name' type='text' value='$name' readonly /></td>
    <td><input name='Pname' type='text' value='$Pname'  /></td>
    <td><input name='year' type='date'  /></td>
    <td><input name='amount' type='text' value='$InstallmentAmount1'  readonly/></td>

    </tr>";
    
?>
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
  if(isset($_POST['Submit'])){
    

    $PHolder = $_POST['name'];
    $Pnamee = $_POST['Pname'];
    $Year  = $_POST['year'];  
    $Amount  = $_POST['amount']; 
 

      $query3="INSERT into policy_installment set name='$PHolder', Pname='$Pnamee', InstallmentAmount='$Amount', InstallmentYear='$Year' ";
      $result = mysqli_query($con, $query3);
      echo("<script>location.href = 'policy_payment.php';</script>");

     }

?>