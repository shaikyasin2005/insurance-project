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
<div class="container" >
	
 


<div class="row">
<div class="col-sm-12" style="margin-top: 30px" >
<h3 align="center"><font color="sky blue"> Insurance Policies<hr>
<?php echo @$_GET['remove']; ?></font></h3>
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
<th> <center>Update </center> </th>
<th> <center>Delete </center> </th>

</tr>

<?php
$qwery = "SELECT * from policy ";
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


echo " <tr>
<td> $row[plan_name] </td>
<td>Rs $row[SumAssured] </td>
<td>Rs $row[PremiumPerYear] </td>
<td> $row[PolicyCategory] </td>
<td> $row[PolicyTerm] Years</td>
<td> $row[ProfitRate] %</td>
<td>Rs $row[InstallmentAmount] </td>
<td> $row[InstallmentType] </td>
<td><a href='update.php?id=$row[id]'> <button>Update </a></button> </td>
<td><a href='policy_delete.php?idd=$row[id]'> <button>Delete </a></button> </td>

</tr>";

}
  echo "</table>";   
?>

</div>
</div>
</div><!--  ENd of Row 3 -->

<div class="row">
<div class="col-sm-12" style="margin-top: 30px">
<p align="center"><button type="button" class="btn btn-info" onclick="myFunction()" >Add New Policy</button></p>
  <div onload="visibility:hidden">
  <div id="myDIV" style="display:none" class="table-responsive">


<form action="policy.php"  method="POST"> 
  <table class="table table-hover "  border="2px solid green" style="border: 2px solid skyblue">
    <tbody>
  
  <tr>
    
<th> <center> Plan Name </center> </th>
<th> <center>Sum Assured </center> </th>
<th> <center>Premium Per year </center> </th>
<th> <center>Policy Category </center> </th>
<th> <center>Policy Term </center> </th>
<th> <center>Profit Rate </center> </th>
<th> <center>Installment Type </center> </th>
<th> <center>Installment Amount </center> </th>

        </tr> 
    <tr>
    

<td><input type='text' name='plan_name' size='9'> </td>
<td><input type='text' name='SumAssured' size='8'> </td>
<td><input type='text' name='PremiumPerYear' size='8'> </td>
<td><input type='text' name='PolicyCategory' size='7'> </td>
<td><input type='text' name='PolicyTerm' size='6'> </td>
<td><input type='text' name='ProfitRate' size='6'> </td>
<td><input type='text' name='InstallmentType' size='6'> </td>
<td><input type='text' name='InstallmentAmount' size='8'> </td>


    
    
     </tr>
    <tr>
    <br>
    <td colspan="8"style="text-align:center">
          
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
    

    $id=$_POST['id'];
$plan_name=$_POST['plan_name'];
$SumAssured=$_POST['SumAssured'];
$PremiumPerYear=$_POST['PremiumPerYear'];
$PolicyCategory=$_POST['PolicyCategory'];
$PolicyTerm=$_POST['PolicyTerm'];
$ProfitRate=$_POST['ProfitRate'];
$InstallmentAmount=$_POST['InstallmentAmount'];
$InstallmentType=$_POST['InstallmentType'];

        
 
    $query3 = "INSERT into policy set plan_name='$plan_name', SumAssured='$SumAssured', PremiumPerYear='$PremiumPerYear', PolicyCategory='$PolicyCategory', PolicyTerm='$PolicyTerm', ProfitRate='$ProfitRate', InstallmentAmount='$InstallmentAmount', InstallmentType='$InstallmentType' ";
      
      $result = mysqli_query($con, $query3);

      echo("<script>location.href = 'policy.php';</script>");
     

}

 if(isset($_POST['remove'])){
    

    $id=$_POST['id'];

    $qwery6 ="DELETE from policy where id='$id'";
    mysqli_query($con, $qwery6);
    echo("<script>location.href = 'policy.php';</script>");
  }



?>