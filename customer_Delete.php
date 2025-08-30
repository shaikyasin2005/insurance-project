<?php
include "db.php";
$id=$_GET['Cid'];
$Name=$_GET['CName'];

$query="DELETE from registration where id='$id'";
$result=mysqli_query($con, $query);
header("refresh:0;url=registered_customers.php?delete=Profile deleted successfully");

?>