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
      <a class="navbar-brand" href="agent.php">Agent Panel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="agent_manager.php">Manager Info</a></li>
        <li><a href="customer_info.php">Customer Info</a></li>
        <li><a href="customer_policy.php">Customer Policy Detail</a></li> 
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
<h3 align="center"><font color="sky blue"> Customer's Policy</font></h3><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center>Policy Holder </center> </th>
<th> <center>Policy name </center> </th>
<th> <center>Installment AMount </th>
<th> <center>Policy Term </th>
<th> <center>Profit Rate </th>

</tr>

<?php
$agent_name =$_SESSION['name'];
$qwery = "SELECT * from registration where agent_name='$agent_name'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

$Cname[]=$row['name'];

} 
    
    $qwery1 = "SELECT * from customer_policy where name='$Cname[0]' ";
$run1 = mysqli_query($con, $qwery1);

while ($row = mysqli_fetch_array($run1, MYSQLI_BOTH)) {

$name=$row['name'];
$Pname=$row['Pname'];
$InstallmentAmount=$row['InstallmentAmount'];
$PolicyTerm=$row['PolicyTerm'];
$ProfitRate=$row['ProfitRate'];

echo "
<tr>
      <td><center> $name </center></td>
      <td><center> $Pname </center></td>
      <td><center> Rs $InstallmentAmount </center></td>
      <td><center> $PolicyTerm Years</center></td>
      <td><center> $ProfitRate %</center></td>
";

} 

?>

</div>
</div>
</div><!--  ENd of Row 3 -->

</div>
</body>
</html>