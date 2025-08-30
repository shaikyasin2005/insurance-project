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


</head>
<body>
<div class="container" >
	
 


<div class="row">
<div class="col-sm-12" style="margin-top: 30px" >
<h3 align="center"><font color="sky blue"> Insurance Policies</font></h3><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center> Plan Name </center> </th>
<th> <center>Sum Assured </center> </th>
<th> <center>Premium Per year </center> </th>
<th> <center>Policy Category </center> </th>
<th> <center>Policy Term </center> </th>
<th> <center>Profit Rate </center> </th>
<th> <center>Installment Type </center> </th>
<th> <center>Installment Amount </center> </th>

</tr>

<?php
$id=$_GET['id'];
$qwery = "SELECT * from policy where id='$id'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

$row['id'];
$row['plan_name'];
$row['SumAssured'];
$row['PremiumPerYear'];
$row['PolicyCategory'];
$row['PolicyTerm'];
$row['ProfitRate'];
$row['InstallmentAmount'];
$row['InstallmentType'];

echo "<form action='update.php' method='POST'>
<tr>
      
<input type='hidden' name='id' value='$row[id]' > 
<td><input type='text' name='plan_name' value='$row[plan_name]' size='9'> </td>
<td><input type='text' name='SumAssured' value='$row[SumAssured]' size='7'> </td>
<td><input type='text' name='PremiumPerYear' value='$row[PremiumPerYear]' size='8'> </td>
<td><input type='text' name='PolicyCategory' value='$row[PolicyCategory]' size='4'> </td>
<td><input type='text' name='PolicyTerm' value='$row[PolicyTerm]' size='6'> </td>
<td><input type='text' name='ProfitRate' value='$row[ProfitRate]'  size='6'> </td>
<td><input type='text' name='InstallmentType' value='$row[InstallmentType]' size='4'> </td>
<td><input type='text' name='InstallmentAmount' value='$row[InstallmentAmount]' size='4'> </td><tr>
<tr align='center'>
<td colspan='8'><input type='submit' name='update' value='Update'> </td>


</tr>
";

}
  echo "</form></table>";   
?>

</div>
</div>
</div><!--  ENd of Row 3 -->

</div>
</body>
</html>

<?php
if (isset($_POST['update'])) {

$id=$_POST['id'];
$plan_name=$_POST['plan_name'];
$SumAssured=$_POST['SumAssured'];
$PremiumPerYear=$_POST['PremiumPerYear'];
$PolicyCategory=$_POST['PolicyCategory'];
$PolicyTerm=$_POST['PolicyTerm'];
$ProfitRate=$_POST['ProfitRate'];
$InstallmentAmount=$_POST['InstallmentAmount'];
$InstallmentType=$_POST['InstallmentType'];



$qwery4 = "UPDATE policy set plan_name='$plan_name', SumAssured='$SumAssured', PremiumPerYear='$PremiumPerYear', PolicyCategory='$PolicyCategory', PolicyTerm='$PolicyTerm', ProfitRate='$ProfitRate', InstallmentAmount='$InstallmentAmount', InstallmentType='$InstallmentType' WHERE id='$id'";

mysqli_query($con, $qwery4);

           echo("<script>location.href = 'policy.php';</script>");

}




 

?>

