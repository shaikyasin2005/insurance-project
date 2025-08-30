<?php
include "db.php";
$id=$_GET['idd'];

$query="DELETE from policy where id='$id'";
$result=mysqli_query($con, $query);
header("refresh:0;url=policy.php?remove=Policy deleted successfully");

?>