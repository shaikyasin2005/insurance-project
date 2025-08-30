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
<h3 align="center"><font color="sky blue"> Customer's Info</font></h3><hr>
<h4 align="center"><font color="sky blue"> <?php echo @$_GET['delete']; ?> </font></h4><hr>
<div class="table-responsive">
<table class="table table-hover " border="2px solid green" cellspacing="0px" cellpadding="10px" align="center" style="border: 2px solid skyblue; font-family: comic; font-size: 13pt; ">
<tr >

<th> <center>Name </center> </th>
<th> <center>Email </center> </th>
<th> <center>Number </th>
<th> <center>Address </th>
<th> <center>Agent </th>
<th> <center>Password </th>
<th> <center>Delete </th>

</tr>

<?php

$qwery = "SELECT * from registration where userType='user'";
$run = mysqli_query($con, $qwery);

while ($row = mysqli_fetch_array($run, MYSQLI_BOTH)) {

$name=$row['name'];
$email=$row['email'];
$number=$row['num'];
$password=$row['password'];
$Address=$row['address'];
$agent_name=$row['agent_name'];

echo "
<tr>
      <td><center> $name </center></td>
      <td><center> $email </center></td>
      <td><center> $number </center></td>
      <td><center> $Address </center></td>
      <td><center> $agent_name </center></td>
      <td><center> $password </center></td>
      <td><center><a href='customer_Delete.php?Cid=$row[id]&CName=$row[name]'> <button >Delete </a></button> </center></td>

";

}
  echo "</table>";   
?>

</div>
</div>
</div><!--  ENd of Row 1 -->


</div>
</body>
</html>

