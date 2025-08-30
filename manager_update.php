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
<h3 align="center"><font color="sky blue"> Manager's Info</font></h3><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center> Name </center> </th>
<th> <center>Email </center> </th>
<th> <center>Number </th>
<th> <center>Password </th>
<th> <center>Address </th>

</tr>

<?php
$id=$_GET['id'];
$qwery = "SELECT * from registration where id='$id'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {


echo "<form action='manager_update.php' method='POST'>
<tr>
      
<input type='hidden' name='uid' value='$row[id]' > 
<td><input type='text' name='uname' value='$row[name]' size='3'> </td>
<td><input type='text' name='uemail' value='$row[email]' size='10'> </td>
<td><input type='text' name='unumber' value='$row[num]' size='8'> </td>
<td><input type='text' name='upassword' value='$row[password]' size='4'> </td>
<td><input type='text' name='uaddress' value='$row[address]'> </td></tr>
<tr align='center'>
<td colspan='6'><input type='submit' name='update' value='Update'> </td>
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
  # code...

$uid=$_POST['uid'];
$uname=$_POST['uname'];
$uemail=$_POST['uemail'];
$unumber=$_POST['unumber'];
$upassword=$_POST['upassword'];
$uaddress=$_POST['uaddress'];

$qwery4 = "UPDATE registration set name='$uname', email='$uemail', num='$unumber', password='$upassword', address='$uaddress' WHERE id='$uid'";

mysqli_query($con, $qwery4);

     echo("<script>location.href = 'manager.php';</script>");
}
?>
