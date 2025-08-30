<?php
include "db.php";
$id=$_GET['mid'];

$query="DELETE from registration where id='$id'";
$result=mysqli_query($con, $query);
header("refresh:0;url=manager.php?mremove=Manager Removed !");

?>