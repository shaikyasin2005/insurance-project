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
<div class="col-sm-12" style="margin-top: 30px">
 <h3 align="center"> <font color="sky blue"> Agents</h3>
 <h4 align="center"><?php echo @$_GET['Aremove']; ?></font></h4>
<div class="table-responsive">
  

  <table class="table table-hover table-bordered "  border="2px solid green" cellspacing="0px" cellpadding="10px" align="center">

<tr >

<th> <center>  Id </center> </th>
<th> <center>  Name </center> </th>
<th> <center> Email </center> </th>
<th> <center> Password </center> </th>
<th> <center> Number </center> </th>
<th> <center> Manager Name </center> </th>
 <th> <center> Update </center> </th>
<th> <center> Remove </center> </th>

</tr>

  <?php

$qwery = "SELECT * from registration where userType= 'agent'";

$run=mysqli_query($con, $qwery);

while ($roww = mysqli_fetch_array($run, MYSQLI_BOTH)) {

  

   echo " <form action='agent.php' method='POST'>
   <tr align='center'>
   <td> $roww[id] </td>
   <td> $roww[name] </td>
   <td> $roww[email] </td>
   <td> $roww[password] </td>
   <td> $roww[num] </td>
   <td> $roww[manager_name] </td>
   

<td><center><a href='agent_update.php?Aid=$roww[id]'> <button >Update </a></button> </center></td>
<td><center><a href='agent_delete.php?Aid=$roww[id]'> <button>Remove </a></button> </center></td>

   </tr>";

   


}
echo "</form></table>";

  ?>
</div></div></div>

<div class="row">
<div class="col-sm-12" style="margin-top: 30px">
<p align="center"><button type="button" class="btn btn-info" onclick="myFunction()" >Add Agent</button></p>
  <div onload="visibility:hidden">
  <div id="myDIV" style="display:none" class="table-responsive">


<form action="agent.php"  method="POST"> 
  <table class="table table-hover table-bordered">
    <tbody>
  
  <tr>
    
     <td align="center"><b> Name</b></td>
      <td align="center"><b> Email</b></td>
       <td align="center"><b> Password</b></td>
        <td align="center"><b> Number</b></td>
        </tr> 
    <tr>
    
    
    <td><input class="form-control" name="name" type="text" size="5" /></td>
    <td><input class="form-control" name="email" type="text" size="10" /></td>
    <td><input class="form-control" name="password" type="text" size="5" /></td>
    <td><input class="form-control" name="number" type="text" size="5" /></td>
    
    
      </tr>
    <tr>
    <br>
    <td colspan="6"style="text-align:center">
          
      <button  name="add" type="Submit" class="btn btn-success  ">
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
if (isset($_POST['Update'])) {

   $id= $_POST['id'];
   $name= $_POST['name'];
   $email= $_POST['email'];
   $password= $_POST['password'];
   $number= $_POST['number'];

 // mysqli_query($con, "Update registration set name='$name', email=$email', password='$password', number='$number' where id='$id'");
    $qwery1 = " UPDATE registration set name='$name', email='$email', password='$password', num='$number' WHERE id='$id' "  ;

   mysqli_query($con, $qwery1);

          echo("<script>location.href = 'agent.php';</script>");



}


?>

<?php

if (isset($_POST['Remove'])) {

   $id= $_POST['id'];
   
    $qwery2 = " DELETE from registration  WHERE id='$id' "  ;

   $aa= mysqli_query($con, $qwery2);

   echo("<script>location.href = 'agent.php';</script>");



    }

   ?>

   <?php
   $Mname = $_SESSION['name'];
  if(isset($_POST['add'])){
    

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['password'];  
    $number  = $_POST['number'];  
 

        
 
    $query3="INSERT into registration set name='$name', email='$email', password='$pass', num='$number', userType='agent', manager_name='$Mname' ";
      
      $result = mysqli_query($con, $query3);

     echo("<script>location.href = 'agent.php';</script>");

}


?>