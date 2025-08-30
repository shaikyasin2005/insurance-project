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
<div class="container" >

<div class="row">
<div class="col-sm-12" style="margin-top: 30px" >
<h3 align="center"><font color="sky blue"> Manager's Info<hr>
<?php echo @$_GET['mremove']; ?></font></h3>

<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center> Name </center> </th>
<th> <center>Email </center> </th>
<th> <center>Number </th>
<th> <center>Password </th>
<th> <center>Address </th>
<th> <center>Update </th>
<th> <center>Remove </th>

</tr>

<?php
$qwery = "SELECT * from registration where userType='manager'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {


echo "<form action='manager.php' method='POST'>
<tr>
      
<td><center> $row[name]  </center></td>
<td><center> $row[email] </center></td>
<td><center> $row[num] </center></td>
<td><center> $row[password]</center> </td>
<td><center> $row[address] </center></td>
<td><center><a href='manager_update.php?id=$row[id]'> <button >Update </a></button> </center></td>
<td><center><a href='manager_delete.php?mid=$row[id]'> <button>Remove </a></button> </center></td>



";

}
  echo "</form></table>";   
?>

</div>
</div>
</div><!--  ENd of Row 1 -->


<div class="row">
<div class="col-sm-12" style="margin-top: 30px">
<p align="center"><button type="button" class="btn btn-info" onclick="myFunction()" >Add Manager</button></p>
  <div onload="visibility:hidden">
  <div id="myDIV" style="display:none" class="table-responsive">


<form action="manager.php"  method="POST"> 
  <table class="table table-hover "  border="2px solid green" style="border: 2px solid skyblue">
    <tbody>
  
  <tr>
    
     <td align="center"><b> Name</b></td>
      <td align="center"><b> Email</b></td>
       <td align="center"><b> Password</b></td>
        <td align="center"><b> Number</b></td>
        <td align="center"><b> Address</b></td>
        </tr> 
    <tr>
    
    
    <td><input class="form-control" name="name" type="text" size="5" /></td>
    <td><input class="form-control" name="email" type="text" size="10" /></td>
    <td><input class="form-control" name="password" type="text" size="5" /></td>
    <td><input class="form-control" name="number" type="text" size="5" /></td>
    <td><input class="form-control" name="address" type="text" size="5" /></td>
    
    
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



 </div></div></div></div> <!-- End Of Row 2 -->


</div>
</body>
</html>

  <?php

if (isset($_POST['Submit'])) {

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$number=$_POST['number'];
$address=$_POST['address'];

$query="INSERT into registration set name='$name', email='$email', password='$password', num='$number', address='$address', userType='manager' ";

mysqli_query($con, $query);

          echo("<script>location.href = 'manager.php';</script>");


}


 ?>